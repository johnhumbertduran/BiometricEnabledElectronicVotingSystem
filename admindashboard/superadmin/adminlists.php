<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
include("../bins/connections.php");

if (isset($_SESSION["username"])) {

    $session_user = $_SESSION["username"];

    $query_info = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user'");
    $my_info = mysqli_fetch_assoc($query_info);
    $admin_id = $my_info["id"];
    $account_type = $my_info["account_type"];
    $admin_first_name = $my_info["firstname"];
    $admin_last_name = $my_info["lastname"];
    $admin_course = $my_info["course"];

    if ($account_type != 1) {
        header('Location: ../../forbidden.php');
    }
} else {

    header('Location: ../');
}

$check_position = isset($_GET['position']) ? $_GET['position'] : 'all';

?>


<div class="d-flex">
    <!-- Sidebar -->
    <?php include('bins/sidebar.php'); ?>

    <!-- Main content -->
    <div class="flex-grow-1 d-flex justify-content-center" style="margin-left: 250px; padding: 1rem; min-height: 90vh;">
        <!-- <div class="flex-fill d-flex align-items-center justify-content-center">
            <img src="../../bins/img/logo.png" class="rounded-circle" width="200px" alt="Logo">
        </div> -->

        <div class="flex-fill">

            <!-- <nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
                <div class="container-fluid">
                    <ul class="navbar-nav" style="font-size: 11.6px;">
                        <?php
                        $positions = [
                            'all' => 'All',
                            'President' => 'President',
                            'Vice President' => 'Vice President',
                            'Secretary' => 'Secretary',
                            'Assistant Secretary' => 'Assistant Secretary',
                            'Treasurer' => 'Treasurer',
                            'Assistant Treasurer' => 'Assistant Treasurer',
                            'Auditor' => 'Auditor',
                            'Assistant Auditor' => 'Assistant Auditor',
                            'P.I.O.' => 'P.I.O.',
                            'Business Manager' => 'Business Manager',
                            'Layout Artist' => 'Layout Artist',
                            'Technical Support' => 'Technical Support'
                        ];

                        foreach ($positions as $key => $label) {
                            $activeClass = ($check_position == $key) ? 'active' : '';
                            echo "<li class='nav-item'>
                                <button class='nav-link nav-candidate nav-button $activeClass' data-target='candidatelist.php' data-position='$key'>$label</button>
                            </li>";
                        }
                        ?>
                    </ul>
                </div>
            </nav> -->
            <br>
            &nbsp;&nbsp; <button class="button-blue" id="registerAdminButton" data-target="registeradmin.php">+ Add Admin</button>

            <div id="adminResult">
                <?php
                // $adminlist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$course' AND status = 'Active' ");

                $adminlist = mysqli_query($connections, "SELECT * FROM admintbl WHERE account_type = '2' ");
                $count_admin = mysqli_num_rows($adminlist);

                if ($count_admin > 0) {

                ?>
                    <center>
                        <div class="table-responsive-sm col-md-11">
                            <table class="table table-hover table-striped mt-3">
                                <!-- <table class="table table-hover table-striped table-bordered border-primary mt-3"> -->
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
                                            <td class="text-center px-0">
                                                <a href="#" class="button-green updateAdminButton" data-target="editadmin.php?id=<?php echo $id; ?>">Update</a>&nbsp;
                                                <a href="#" class="button-red" id="admin<?php echo $id; ?>" onclick="deleteThisAdmin(<?php echo $id; ?>, '<?php echo $name; ?>', event)">Delete</a>
                                            </td>
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
            </div>


        </div>
    </div>
</div>
<br>
<br>

<script>
    function deleteThisAdmin(id, name, event) {
        event.preventDefault(); // Prevent the default action (e.g., page navigation)

        var userDecision = confirm('Are you sure you want to remove ' + name + ' from the admin\'s list?');
        if (userDecision) {
            $.ajax({
                type: 'POST',
                url: 'deleteadmin.php',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Admin deleted successfully.');
                        $('.nav-button.active').click(); // Refresh the list based on active button
                    } else {
                        alert('Failed to delete item.');
                    }
                },
                error: function() {
                    alert('Error occurred while deleting the item.');
                }
            });
        }
    }
    $(document).ready(function() {



        function loadAdminList() {
            $.ajax({
                url: 'adminlists.php',
                method: 'GET',
                data: {
                    position: $('.nav-button.active').data('position') || 'all'
                },
                success: function(data) {
                    console.log('test');
                    $('#adminResult').html($(data).find('#adminResult').html());
                },
                error: function() {
                    $('#adminResult').html('<p>Sorry, the content could not be loaded.</p>');
                }
            });
        }

        loadAdminList(); // Initial load

        setInterval(loadAdminList, 2000); // Refresh every 2 seconds


        // Event handler for register candidates button
        $('#registerAdminButton').click(function(e) {
            e.preventDefault(); // Prevent default button behavior
            var target = $(this).data('target'); // Get target from data attribute
            //console.log("Loading content from: " + target); // Log target for debugging
            window.location.href = target;
            // AJAX request to load content
            // $.ajax({
            //     url: target,
            //     method: 'GET',
            //     success: function(data) {
            //         console.log("Content loaded successfully."); // Log success
            //         $('main[role="main"]').html(data); // Load content into main area
            //     },
            //     error: function() {
            //         console.log("Error loading content."); // Log error
            //         $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>'); // Show error message
            //     }
            // });
        });


        $('.nav-button').click(function(e) {
            e.preventDefault();

            var position = $(this).data('position');
            var target = $(this).data('target');
            var url = target + '?position=' + position;

            $('.nav-button').removeClass('active');
            $(this).addClass('active');

            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    $('#adminResult').html($(data).find('#adminResult').html());
                },
                error: function() {
                    $('#adminResult').html('<p>Sorry, the content could not be loaded.</p>');
                }
            });
        });

        $(document).on('click', '.updateAdminButton', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            window.location.href = target
        });

    });
</script>


<?php
include('bins/footer.php');
?>