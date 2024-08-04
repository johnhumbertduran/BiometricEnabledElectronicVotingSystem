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

if ($check_vote === 'all') {
    $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course' ");


    $countVoters = mysqli_num_rows($voterslist);

    if ($countVoters > 0) {

        echo '<div id="allvoters">';
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
    echo '</div>';
} else if ($check_vote === '1') {
    $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course' AND status = '1' ");


    $countVoters = mysqli_num_rows($voterslist);

    if ($countVoters > 0) {

        echo '<div id="votedvoters">';
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
    echo '</div>';
} else if ($check_vote === '0') {
    $voterslist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE course = '$admin_course' AND status = '0' ");


    $countVoters = mysqli_num_rows($voterslist);

    if ($countVoters > 0) {

        echo '<div id="notvotedvoters">';
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
    echo '</div>';
}

?>


<input type="hidden" value="<?php echo $check_vote; ?>" id="votestatus">

<script>
    $(document).ready(function() {

        var currentStatus = document.getElementById('votestatus').value;


        function checkVoteStatus() {
            if (currentStatus == 'all') {

                function refreshAllVotersList() {
                    var url = 'voterslist.php?status=' + currentStatus + ' #allvoters';
                    $('#allvoters').load(url);
                }

                setInterval(refreshAllVotersList, 2000);
            } else if (currentStatus == '1') {

                function refreshVotedVotersList() {
                    var url = 'voterslist.php?status=' + currentStatus + ' #votedvoters';
                    $('#votedvoters').load(url);
                }

                setInterval(refreshVotedVotersList, 2000);
            } else if (currentStatus == '0') {

                function refreshNotVotedVotersList() {
                    var url = 'voterslist.php?status=' + currentStatus + ' #notvotedvoters';
                    $('#notvotedvoters').load(url);
                }

                setInterval(refreshNotVotedVotersList, 2000);
            }
        }

        checkVoteStatus();

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

            // console.log(url);
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











<!-- ##################################################### -->
<!-- THIS ONE IS THE SHORTER CODE FOR THE ONE ON THE TOP -->

<?php

function displayVotersList($voterslist, $divId, $election_year)
{
    $countVoters = mysqli_num_rows($voterslist);

    if ($countVoters > 0) {
        echo '<div id="' . $divId . '">';
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
                  <a href="#" class="button-red" id="title' . $id . '" onclick="deleteThisVoter' . $id . '()">Delete</a>&nbsp;
                  <a href="#" class="button-green updateVoterButton" data-target="editvoter.php?id=' . $id . '">Update</a>
                  </td>';
?>
            <script>
                function deleteThisVoter<?php echo $id; ?>() {

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

<!-- END CODE HERE -->
<!-- ##################################################### -->





<!-- ##################################################### -->
<!-- THIS ONE IS THE SHORTER CODE FOR THE ONE ON THE TOP -->

<script>
    var currentStatus = $('#votestatus').val();

    function checkVoteStatus() {
        if (currentStatus == 'all') {
            // setInterval(function() {
            // $('#allvoters').load('voterslist.php?status=all #allvoters');
            // }, 5000);
            var url = 'voterslist.php?status=all #allvoters';
            $('#allvoters').load(url, function() {
                // Schedule the next execution after this one completes
                console.log("All");
                setTimeout(checkVoteStatus, 5000);
            });
        } else if (currentStatus == '1') {
            // setInterval(function() {
            // $('#votedvoters').load('voterslist.php?status=1 #votedvoters');
            // }, 5000);
            var url = 'voterslist.php?status=1 #votedvoters';
            $('#votedvoters').load(url, function() {
                // Schedule the next execution after this one completes
                console.log("Voted");
                setTimeout(checkVoteStatus, 5000);
            });
        } else if (currentStatus == '0') {
            // setInterval(function() {
            // $('#notvotedvoters').load('voterslist.php?status=0 #notvotedvoters');
            // }, 5000);
            var url = 'voterslist.php?status=0 #notvotedvoters';
            $('#notvotedvoters').load(url, function() {
                // Schedule the next execution after this one completes
                console.log("Not Voted");
                setTimeout(checkVoteStatus, 5000);
            });
        }
    }

    checkVoteStatus();
</script>

<!-- END CODE HERE -->
<!-- ##################################################### -->