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

    if ($account_type != 1) {
        header('Location: ../../forbidden.php');
    }
} else {

    header('Location: ../');
}

$check_position = isset($_GET['position']) ? $_GET['position'] : 'all';

?>
<nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
    <div class="container-fluid">
        <ul class="navbar-nav" style="font-size: 12px;">
            <li class="nav-item">
                <a class="nav-link active" href="#">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Chairperson</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Vice-Chairperson</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Councilor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SPE-Representative</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SICT-Representative</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SBM-Representative</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SOE-Representative</a>
            </li>
        </ul>
    </div>
</nav>
<br>
&nbsp;&nbsp; <button class="button-blue" id="registerAdminButton" data-target="registeradmin.php">+ Add Admin</button>

<?php
// $adminlist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$course' AND status = 'Active' ");

$adminlist = mysqli_query($connections, "SELECT * FROM admintbl WHERE account_type = '2' ");
$count_admin = mysqli_num_rows($adminlist);

if ($count_admin > 0) {

?>
    <center>
        <div class="table-responsive-sm col-md-11">
            <table class="table table-hover table-striped table-bordered border-primary mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th class="text-center px-0">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php



                    while ($row_admin_list = mysqli_fetch_assoc($adminlist)) {

                        $id = $row_admin_list["id"];
                        $firstname = $row_admin_list["firstname"];
                        $middlename = $row_admin_list["middlename"];
                        $lastname = $row_admin_list["lastname"];
                        $course = $row_admin_list["course"];
                        $year = $row_admin_list["electionyear"];

                        $name = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname)
                    ?>
                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $course; ?></td>
                            <td><?php echo $year; ?></td>
                            <td class="text-center px-0"><a href="#" class="button-green">Update</a>&nbsp;&nbsp;<a href="#" class="button-red">Delete</a></td>
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
    </center>


    <script>
        $(document).ready(function() {
            // Event handler for register candidates button
            $('#registerAdminButton').click(function(e) {
                e.preventDefault(); // Prevent default button behavior
                var target = $(this).data('target'); // Get target from data attribute
                console.log("Loading content from: " + target); // Log target for debugging

                // AJAX request to load content
                $.ajax({
                    url: target,
                    method: 'GET',
                    success: function(data) {
                        console.log("Content loaded successfully."); // Log success
                        $('main[role="main"]').html(data); // Load content into main area
                    },
                    error: function() {
                        console.log("Error loading content."); // Log error
                        $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>'); // Show error message
                    }
                });
            });
        });
    </script>