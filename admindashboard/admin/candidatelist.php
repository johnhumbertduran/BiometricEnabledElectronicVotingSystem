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

?>
<nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
    <div class="container-fluid">
        <ul class="navbar-nav" style="font-size: 12px;">
            <li class="nav-item">
                <!-- <a class="nav-link active" href="#">All</a> -->
                <button class="nav-link active" id="allCandidate" data-target="candidatelist.php">All</button>
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
&nbsp;&nbsp; <button class="button-blue" id="registerCandidatesButton" data-target="registercandidates.php">+ Add Candidates</button>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>Position</th>
            <th>Party</th>
            <th>Election Year</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $candidatelists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE course='$admin_course' ");

        $countCandidate = mysqli_num_rows($candidatelists);

        if ($countCandidate > 0) {


            while ($row_candidate_lists = mysqli_fetch_assoc($candidatelists)) {


                $id = $row_candidate_lists["id"];
                $firstname = $row_candidate_lists["firstName"];
                $middlename = $row_candidate_lists["middleName"];
                $lastname = $row_candidate_lists["lastName"];
                $course = $row_candidate_lists["course"];
                $year = $row_candidate_lists["year"];
                $position = $row_candidate_lists["position"];
                $party = $row_candidate_lists["party"];
                $electionyear = $row_candidate_lists["electionYear"];

                $name = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname)
        ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $course; ?></td>
                    <td><?php echo $year; ?></td>
                    <td><?php echo $position; ?></td>
                    <td><?php echo $party; ?></td>
                    <td><?php echo $electionyear; ?></td>
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

<div>

</div>


<script>
    $(document).ready(function() {
        // Event handler for register candidates button
        $('#registerCandidatesButton').click(function(e) {
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



        // Event handler for register candidates button
        $('#registerCandidatesButton').click(function(e) {
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