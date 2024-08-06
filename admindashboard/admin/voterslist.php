<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
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

// $check_vote = isset($_GET['status']) ? $_GET['status'] : 'all';
$check_vote = '';

if (isset($_GET['status'])) {
    $check_vote = $_GET['status'];
} else {
    $check_vote = 'all';
}


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


<div class="d-flex">
    <!-- Sidebar -->
    <?php
    include('bins/sidebar.php');
    ?>

    <!-- Main content -->
    <div class="flex-grow-1" style="margin-left: 250px; padding: 1rem;">

        <nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
            <div class="container-fluid">
                <ul class="navbar-nav" style="font-size: 12px;">
                    <li class="nav-item">
                        <button class="nav-link nav-voter nav-button <?php echo ($check_vote == 'all') ? 'active' : ' '; ?>" data-target="voterslist.php" data-status="all">All</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link nav-voter nav-button <?php echo ($check_vote == '1') ? 'active' : ' '; ?>" data-target="voterslist.php" data-status="1">Voted Voters</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link nav-voter nav-button <?php echo ($check_vote == '0') ? 'active' : ' '; ?>" data-target="voterslist.php" data-status="0">Unvoted Voters</button>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        &nbsp;&nbsp; <button class="button-blue" id="registerVoterButton" data-target="registervoters.php">+ Add Voters</button>
        <button class="button-blue">Download Excel File</button>

        <?php

        echo '<div id="votersList">';

        function displayVotersList($voterslist, $divId, $election_year)
        {
            $countVoters = mysqli_num_rows($voterslist);

            if ($countVoters > 0) {
                echo '<div id="' . $divId . '">';
                echo '<center>';
                echo '<div class="table-responsive-md col-md-11">';
                echo '<table class="table table-hover table-striped mt-3">';
                // echo '<table class="table table-hover table-striped table-bordered border-primary mt-3">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Name</th>';
                echo '<th>Course</th>';
                echo '<th>Year</th>';
                echo '<th>Election Year</th>';
                echo '<th>Status</th>';
                echo '<th>Action</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row_voters_list = mysqli_fetch_assoc($voterslist)) {
                    $id = $row_voters_list["id"];
                    $name = ucfirst($row_voters_list["firstname"]) . " " . ucfirst($row_voters_list["middlename"][0]) . ". " . ucfirst($row_voters_list["lastname"]);
                    echo '<tr>';
                    echo '<td>' . $name . '</td>';
                    echo '<td>' . $row_voters_list["course"] . '</td>';
                    echo '<td>' . $row_voters_list["year"] . '</td>';
                    echo '<td>' . $election_year . '</td>';
                    echo '<td>' . ($row_voters_list["status"] == "0" ? "Not Voted" : "Voted") . '</td>';
                    echo '<td>
                    <a href="#" class="button-green updateVoterButton" data-target="editvoter.php?id=' . $id . '">Update</a>&nbsp;
                  <a href="#" class="button-red" id="title' . $id . '" onclick="deleteThisVoter' . $id . '(event)">Delete</a>
                  </td>';
        ?>
                    <script>
                        function deleteThisVoter<?php echo $id; ?>(event) {
                            event.preventDefault(); // Prevent default button behavior

                            var userDecision = confirm('Are you sure you want to remove <?php echo $name; ?> from the voter\'s list ? ');
                            if (userDecision) {
                                // alert('You chose yes.');
                                // Add your code for the delete action here


                                $.ajax({
                                    type: 'POST',
                                    url: 'deletevoter.php',
                                    data: {
                                        id: <?php echo $id; ?>
                                    },
                                    success: function(response) {
                                        if (response === 'success') {
                                            alert('Voter deleted successfully.');
                                            $('main[role="main"]').load('voterslist.php');
                                        } else {
                                            alert('Failed to delete item.');
                                        }
                                    },
                                    error: function() {
                                        alert('Error occurred while deleting the item.');
                                    }
                                });


                            } else {
                                // alert('You chose no.');
                                // Add your code for the cancel action here
                            }

                        }
                    </script>

        <?php
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '</center>';
                echo '</div>';
            } else {
                echo '<center><h4>No Records Found!</h4></center>';
            }
        }

        if ($check_vote === 'all') {
            $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course'");
            displayVotersList($voterslist, "allvoters", $election_year);
        } elseif ($check_vote === '1') {
            $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course' AND status = '1'");
            displayVotersList($voterslist, "votedvoters", $election_year);
        } elseif ($check_vote === '0') {
            $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course' AND status = '0'");
            displayVotersList($voterslist, "notvotedvoters", $election_year);
        }

        ?>


        <input type="hidden" value="<?php echo $check_vote; ?>" id="votestatus">
        <?php
        echo '</div>';
        ?>
    </div>
</div>

<br>
<br>

<script>
    $(document).ready(function() {

        function fetchVotersList(status) {
            $.ajax({
                type: 'GET',
                url: 'voterslist.php',
                data: {
                    status: status
                },
                success: function(data) {
                    $('#votersList').html($(data).find('#votersList').html());
                },
                error: function() {
                    $('#votersList').html('<p>Sorry, the content could not be loaded.</p>');
                }
            });
        }

        // Set interval to refresh data every 2 seconds
        setInterval(function() {
            var status = $('#votestatus').val();
            console.log(status);
            fetchVotersList(status);
        }, 2000);

        // Event handler for navigation buttons
        $('.nav-button').click(function(e) {
            e.preventDefault(); // Prevent default button behavior

            var status = $(this).data('status'); // Get status from data attribute

            // Update hidden input value
            $('#votestatus').val(status);

            // Remove active class from all buttons and add to the clicked one
            $('.nav-button').removeClass('active');
            $(this).addClass('active');

            // Fetch and update the voters list
            fetchVotersList(status);
        });


        // Event handler for update buttons
        $(document).on('click', '.updateVoterButton', function(e) {
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

        // Event handler for register voters button
        $(document).on('click', '#registerVoterButton', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            window.location.href = target;
            // $.ajax({
            //     url: target,
            //     method: 'GET',
            //     success: function(data) {
            //         $('main[role="main"]').html(data);
            //         updateMainClass(target);
            //     },
            //     error: function() {
            //         $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>');
            //     }
            // });
        });



    });
</script>



<?php
include('bins/footer.php');
?>