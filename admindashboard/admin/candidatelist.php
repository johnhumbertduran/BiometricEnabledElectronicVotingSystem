<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
include("../bins/connections.php");

// Check if the user is logged in and get their information
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
        exit(); // Make sure to exit after redirect
    }
}

// Set the default or current position
$check_position = isset($_GET['position']) ? $_GET['position'] : 'all';
?>

<style>
    .nav-candidate {
        padding: 10px;
        transition: background-color 0.3s;
    }

    .nav-candidate:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .nav-candidate.active {
        background-color: rgba(255, 255, 255, 0.3);
    }
</style>

<div class="d-flex">
    <!-- Sidebar -->
    <?php include('bins/sidebar.php'); ?>

    <!-- Main content -->
    <div class="flex-grow-1" style="margin-left: 250px; padding: 1rem;">
        <nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
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
        </nav>
        <br>
        &nbsp;&nbsp; <button class="button-blue" id="registerCandidatesButton" data-target="registercandidates.php">+ Add Candidates</button>

        <div id="candidatesResult">
            <?php
            $query = ($check_position === 'all') ?
                "SELECT * FROM candidatestbl WHERE course = '$admin_course' AND status = 'Active'" :
                "SELECT * FROM candidatestbl WHERE course = '$admin_course' AND position = '$check_position' AND status = 'Active'";

            $candidatelists = mysqli_query($connections, $query);
            $countCandidate = mysqli_num_rows($candidatelists);

            if ($countCandidate > 0) {
            ?>
                <center>
                    <div class="table-responsive-md col-md-11">
                        <table class="table table-hover table-striped mt-3">
                            <!-- <table class="table table-hover table-striped table-bordered border-primary mt-3"> -->
                            <thead>
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Position</th>
                                    <th>Party</th>
                                    <th>Election Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row_candidate_lists = mysqli_fetch_assoc($candidatelists)) {
                                    $id = $row_candidate_lists["id"];
                                    $name = ucfirst($row_candidate_lists["firstname"]) . " " . ucfirst($row_candidate_lists["middlename"][0]) . ". " . ucfirst($row_candidate_lists["lastname"]);
                                ?>
                                    <tr class="text-center">
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $row_candidate_lists["course"]; ?></td>
                                        <td><?php echo $row_candidate_lists["year"]; ?></td>
                                        <td><?php echo $row_candidate_lists["position"]; ?></td>
                                        <td><?php echo $row_candidate_lists["party"]; ?></td>
                                        <td><?php echo $election_year; ?></td>
                                        <td>
                                            <a href="#" class="button-green updateCandidateButton" data-target="editcandidate.php?id=<?php echo $id; ?>">Update</a>&nbsp;
                                            <a href="#" class="button-red" id="title<?php echo $id; ?>" onclick="deleteThisCandidate(<?php echo $id; ?>, '<?php echo $name; ?>', event)">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </center>
            <?php
            } else {
            ?>
                <center>
                    <h4>No Records Found!</h4>
                </center>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<br>
<br>

<script>
    function deleteThisCandidate(id, name, event) {
        event.preventDefault(); // Prevent the default action (e.g., page navigation)

        var userDecision = confirm('Are you sure you want to remove ' + name + ' from the candidate\'s list?');
        if (userDecision) {
            $.ajax({
                type: 'POST',
                url: 'deletecandidate.php',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Candidate deleted successfully.');
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

        function loadCandidatesList() {
            var position = $('.nav-button.active').data('position') || 'all';
            $.ajax({
                url: 'candidatelist.php',
                method: 'GET',
                data: {
                    position: position
                },
                success: function(data) {
                    // console.log(position);
                    $('#candidatesResult').html($(data).find('#candidatesResult').html());
                },
                error: function() {
                    $('#candidatesResult').html('<p>Sorry, the content could not be loaded.</p>');
                }
            });
        }

        loadCandidatesList(); // Initial load

        setInterval(loadCandidatesList, 2000); // Refresh every 2 seconds

        $('#registerCandidatesButton').click(function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            window.location.href = target;
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
                    $('#candidatesResult').html($(data).find('#candidatesResult').html());
                },
                error: function() {
                    $('#candidatesResult').html('<p>Sorry, the content could not be loaded.</p>');
                }
            });
        });

        $(document).on('click', '.updateCandidateButton', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            window.location.href = target;

            // $.ajax({
            //     url: target,
            //     method: 'GET',
            //     success: function(data) {
            //         $('main[role="main"]').html(data);
            //     },
            //     error: function() {
            //         $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>');
            //     }
            // });
        });


    });
</script>

<?php include('bins/footer.php'); ?>