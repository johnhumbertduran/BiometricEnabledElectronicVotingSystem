<?php
session_start();
include("../bins/connections.php");

if (isset($_SESSION["username"])) {

    $session_user = $_SESSION["username"];

    $query_info = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user'");
    $my_info = mysqli_fetch_assoc($query_info);
    $account_type = $my_info["account_type"];
    $admin_id = $my_info["id"];
    $admin_name = $my_info["firstname"];
    $admin_course = $my_info["course"];
    $election_year = $my_info["electionyear"];

    if ($account_type != 2) {
        header('Location: ../../forbidden.php');
    }
}

$check_vote = isset($_GET['status']) ? $_GET['status'] : 'all';

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
                <button class="nav-link nav-voter nav-button <?php echo ($check_vote == 'all') ? 'active' : ''; ?>" data-target="voterslist.php" data-status="all">All</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-voter nav-button <?php echo ($check_vote == '1') ? 'active' : ''; ?>" data-target="voterslist.php" data-status="1">Voted Voters</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-voter nav-button <?php echo ($check_vote == '0') ? 'active' : ''; ?>" data-target="voterslist.php" data-status="0">Unvoted Voters</button>
            </li>
        </ul>
    </div>
</nav>
<br>
&nbsp;&nbsp; <button class="button-blue" id="registerVoterButton" data-target="registervoters.php">+ Add Voters</button>
<button class="button-blue">Download Excel File</button>

<div id="voters-table">
    <?php
    $status = isset($_GET['status']) ? $_GET['status'] : 'all';

    if ($status === 'all') {
        $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course' ");
    } else {
        $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course' AND status = '$status' ");
    }


    $countVoters = mysqli_num_rows($voterslist);

    if ($countVoters > 0) {

        echo '<center>';
        echo '<div class="table-responsive-md col-md-11">';
        echo '<table class="table table-hover table-striped table-bordered border-primary mt-3">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th>Course</th>';
        echo '<th>Year</th>';
        echo '<th>Election Year</th>';
        echo '<th>Status</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row_voters_list = mysqli_fetch_assoc($voterslist)) {

            $idnumber = $row_voters_list["idnumber"];
            $firstname = $row_voters_list["firstname"];
            $middlename = $row_voters_list["middlename"];
            $lastname = $row_voters_list["lastname"];
            $year = $row_voters_list["year"];
            $course = $row_voters_list["course"];
            $status = $row_voters_list["status"];

            $name = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);
            echo '<tr>';
            echo '<td>' . $name . '</td>';
            echo '<td>' . $course . '</td>';
            echo '<td>' . $year . '</td>';
            echo '<td>' . $election_year . '</td>';
            echo '<td>' . ($status == "0" ? "Not Voted" : "Voted") . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<center><h4>No Records Found!</h4></center>';
    }
    echo '</center>';

    ?>

</div>
<script>
    $(document).ready(function() {

        // var currentStatus = '<?php echo $check_vote; ?>';

        // function refreshVotersList() {
        //     var url = 'voterslist.php?status=' + currentStatus + ' #voters-table';
        //     $('#voters-table').load(url);
        //     console.log("URL: " + url);
        // }

        // setInterval(refreshVotersList, 2000);

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
            var status = $(this).data('status'); // Get status from data attribute
            var url = target + '?status=' + status; // Construct URL with query parameter
            //console.log("Loading content from: " + url); // Log URL for debugging

            console.log(url);
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