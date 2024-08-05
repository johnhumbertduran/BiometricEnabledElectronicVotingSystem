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

$check_position = isset($_GET['position']) ? $_GET['position'] : 'all';
// $check_position = "";
// if (isset($_GET['position'])) {
//     $check_position = $_GET['position'];
// } else {
//     $check_position = "all";
// }


?>
<style>
    /* Add this CSS to your stylesheet or inside a <style> tag */

    .nav-candidate {
        padding: 10px;
        transition: background-color 0.3s;
    }

    .nav-candidate:hover {
        background-color: rgba(255, 255, 255, 0.2);
        /* Adjust hover background color */
    }

    .nav-candidate.active {
        background-color: rgba(255, 255, 255, 0.3);
        /* Adjust active background color */
        /* font-weight: bold; */
    }

    #candidateimg {
        /* width: 100%; */
        /* Make the image cover the entire width of the container */
        /* height: 100%; */
        /* Make the image cover the entire height of the container */
        object-fit: cover;
        border-radius: 50%;
        /* Maintain aspect ratio while covering the container */
        /* display: block; */
    }
</style>
<nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
    <div class="container-fluid">
        <ul class="navbar-nav" style="font-size: 11.6px;">
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'all') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="all">All</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'President') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="President">President</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Vice President') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="Vice President">Vice President</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Secretary') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="Secretary">Secretary</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Assistant Secretary') ? 'active' : ''; ?>" data-target=" electionresults.php" data-position="Assistant Secretary">Assistant Secretary</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Treasurer') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="Treasurer">Treasurer</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Assistant Treasurer') ? 'active' : ''; ?>" data-target=" electionresults.php" data-position="Assistant Treasurer">Assistant Treasurer</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Auditor') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="Auditor">Auditor</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Assistant Auditor') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="Assistant Auditor">Assistant Auditor</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'P.I.O.') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="P.I.O.">P.I.O.</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Business Manager') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="Business Manager">Business Manager</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Layout Artist') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="Layout Artist">Layout Artist</button>
            </li>
            <li class="nav-item">
                <button class="nav-link nav-candidate nav-button <?php echo ($check_position == 'Technical Support') ? 'active' : ''; ?>" data-target="electionresults.php" data-position="Technical Support">Technical Support</button>
            </li>
        </ul>
    </div>
</nav>
<br>
<!-- &nbsp;&nbsp; <button class="button-blue" id="registerCandidatesButton" data-target="registercandidates.php">+ Add Candidates</button> -->


<?php



$position = isset($_GET['position']) ? $_GET['position'] : 'all';

if ($position === 'all') {
    $candidatelists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE course = '$admin_course' AND status = 'Active' AND electionid = '$admin_id' ");
} else {
    $candidatelists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE course = '$admin_course' AND position = '$position' AND status = 'Active' AND electionid = '$admin_id' ");
}


$countCandidate = mysqli_num_rows($candidatelists);

if ($countCandidate > 0) {

?>
    <center>
        <h4>Results</h4>
        <div class="table-responsive-md col-md-11">
            <table class="table table-hover table-striped table-bordered border-primary mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Position</th>
                        <th>Party</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>

                    <?php





                    while ($row_candidate_lists = mysqli_fetch_assoc($candidatelists)) {


                        $candidateid = $row_candidate_lists["id"];
                        $candidateidnumber = $row_candidate_lists["idnumber"];
                        $candidatefirstname = $row_candidate_lists["firstname"];
                        $candidatemiddlename = $row_candidate_lists["middlename"];
                        $candidatelastname = $row_candidate_lists["lastname"];
                        $candidatecourse = $row_candidate_lists["course"];
                        $candidateyear = $row_candidate_lists["year"];
                        $candidateposition = $row_candidate_lists["position"];
                        $candidateparty = $row_candidate_lists["party"];
                        $candidateimg = $row_candidate_lists["img"];
                        // $electionyear = $row_candidate_lists["electionid"];

                        $candidatename = ucfirst($candidatefirstname) . " " . ucfirst($candidatemiddlename[0]) . ". " . ucfirst($candidatelastname);



                    ?>
                        <tr>
                            <td> <img src="<?php echo $candidateimg; ?>" alt="<?php echo $candidateimg; ?>" width="50px" height="50px" id="candidateimg"> &nbsp;<?php echo $candidatename; ?></td>
                            <td><?php echo $candidatecourse; ?></td>
                            <td><?php echo $candidateyear; ?></td>
                            <td><?php echo $candidateposition; ?></td>
                            <td><?php echo $candidateparty; ?></td>
                            <td><?php
                                $votelist = mysqli_query($connections, "SELECT * FROM votestbl WHERE electionid = '$admin_id' AND candidatevoted = '$candidateidnumber' ");
                                if ($row_vote_list = mysqli_fetch_assoc($votelist)) {

                                    $id = $row_vote_list["id"];
                                    $voteridnumber = $row_vote_list["voteridnumber"];
                                    $electionid = $row_vote_list["electionid"];
                                    $position = $row_vote_list["position"];
                                    $candidatevoted = $row_vote_list["candidatevoted"];

                                    if ($candidateidnumber == $candidatevoted) {;

                                        $count_votes = mysqli_query($connections, "SELECT * FROM votestbl WHERE candidatevoted =  '$candidatevoted'");
                                        $row_count_vote = mysqli_num_rows($count_votes);
                                        // $mycount = $row_count_vote['candidatevoted'];
                                        echo $row_count_vote;
                                    }
                                } else {
                                    echo "0";
                                }


                                ?></td>

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
            $('#registerCandidatesButton').click(function(e) {
                e.preventDefault(); // Prevent default button behavior
                var target = $(this).data('target'); // Get target from data attribute
                //console.log("Loading content from: " + target); // Log target for debugging

                // AJAX request to load content
                $.ajax({
                    url: target,
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