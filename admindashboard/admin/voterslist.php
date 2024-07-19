<?php
session_start();
include("../bins/connections.php");

if (isset($_SESSION["username"])) {

    $session_user = $_SESSION["username"];

    $query_info = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user'");
    $my_info = mysqli_fetch_assoc($query_info);
    $account_type = $my_info["account_type"];
    $admin_id = $my_info["id"];
    $admin_name = $my_info["firstName"];
    $admin_course = $my_info["course"];

    if ($account_type != 2) {
        header('Location: ../../forbidden.php');
    }
}

$check_vote = isset($_GET['position']) ? $_GET['position'] : 'all';

?>
<style>
    /* Add this CSS to your stylesheet or inside a <style> tag */

    .nav-voter {
        padding: 10px;
        transition: background-color 0.3s;
    }

    .nav-voter:hover {
        background-color: rgba(255, 255, 255, 0.2);
        /* Adjust hover background color */
    }

    .nav-voter.active {
        background-color: rgba(255, 255, 255, 0.3);
        /* Adjust active background color */
        /* font-weight: bold; */
    }
</style>
<nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
    <div class="container-fluid">
        <ul class="navbar-nav" style="font-size: 12px;">
            <li class="nav-item">
                <button class="nav-link nav-voter nav-button <?php echo ($check_vote == 'all') ? 'active' : ''; ?>" data-target="voterslist.php" data-position="all">All</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-voter nav-button <?php echo ($check_vote == 'Voted') ? 'active' : ''; ?>" data-target="voterslist.php" data-position="Voted">Voted Voters</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-voter nav-button <?php echo ($check_vote == 'NotVoted') ? 'active' : ''; ?>" data-target="voterslist.php" data-position="NotVoted">Unvoted Voters</button>
            </li>
        </ul>
    </div>
</nav>
<br>
&nbsp;&nbsp; <button class="button-blue" id="registerVoterButton" data-target="registervoters.php">+ Add Voters</button>
<button class="button-blue">Download Excel File</button>


<?php
$status = isset($_GET['status']) ? $_GET['status'] : 'all';

if ($status === 'all') {
    $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course' ");
} else {
    $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course' AND status = '$status' ");
}


$countVoters = mysqli_num_rows($voterslist);

if ($countVoters > 0) {

?>
    <div class="table-responsive-md">
        <table class="table table-hover table-striped table-bordered border-primary mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Position</th>
                    <th>Party</th>
                </tr>
            </thead>
            <tbody>

                <?php



                while ($row_voters_list = mysqli_fetch_assoc($voterslist)) {

                    $idnumber = $row_voters_list["idNumber"];
                    $firstname = $row_voters_list["firstName"];
                    $middlename = $row_voters_list["middleName"];
                    $lastname = $row_voters_list["lastName"];
                    $year = $row_voters_list["year"];
                    $course = $row_voters_list["course"];
                    $status = $row_voters_list["status"];

                    $name = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname)
                ?>
                    <tr>
                        <td><?php echo $idnumber; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $year; ?></td>
                        <td><?php echo $course; ?></td>
                        <td><?php echo $status; ?></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <center>
                    <h4>No Records Found!</h4>
                </center>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>



    <script>
        $(document).ready(function() {

            // Function to update main class based on the target URL
            function updateMainClass(target) {

                var mainElement = $('main[role="main"]');
                if (target === 'registervoters.php') {
                    mainElement.addClass('d-flex align-items-center justify-content-center');
                } else {
                    mainElement.removeClass('d-flex align-items-center justify-content-center');
                }
            }

            // Event handler for register candidates button
            $('#registerVoterButton').click(function(e) {
                e.preventDefault(); // Prevent default button behavior
                var target = $(this).data('target'); // Get target from data attribute
                console.log("Loading content from(registerVoterButton.phpCode): " + target); // Log target for debugging

                // AJAX request to load content
                $.ajax({
                    url: target,
                    method: 'GET',
                    success: function(data) {
                        console.log("Content loaded successfully."); // Log success
                        $('main[role="main"]').html(data); // Load content into main area
                        updateMainClass(target); // Update main class
                    },
                    error: function() {
                        console.log("Error loading content."); // Log error
                        $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>'); // Show error message
                    }
                });
            });

            // Event handler for navigation buttons
            $('.nav-button').click(function(e) {
                e.preventDefault(); // Prevent default button behavior
                var target = $(this).data('target'); // Get target from data attribute
                var position = $(this).data('position'); // Get position from data attribute
                var url = target + '?position=' + position; // Construct URL with query parameter
                //console.log("Loading content from: " + url); // Log URL for debugging

                // AJAX request to load content
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                        //console.log("Content loaded successfully."); // Log success
                        $('main[role="main"]').html(data); // Load content into main area
                    },
                    error: function() {
                        //console.log("Error loading content."); // Log error
                        $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>'); // Show error message
                    }
                });
            });

        });
    </script>