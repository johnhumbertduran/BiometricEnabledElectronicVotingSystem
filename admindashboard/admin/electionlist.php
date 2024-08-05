<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
include("../bins/connections.php");

if (isset($_SESSION["username"])) {

    $session_user = $_SESSION["username"];

    $query_info = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user' ");
    $my_info = mysqli_fetch_assoc($query_info);
    $account_type = $my_info["account_type"];
    $admin_id = $my_info["id"];
    $admin_name = $my_info["firstname"];
    $admin_course = $my_info["course"];

    if ($account_type != 2) {
        header('Location: ../../forbidden.php');
    }
} else {
    header('Location: ../');
}
?>
<style>
    .election_card:hover {
        cursor: pointer;
    }
</style>



<div class="d-flex">
    <!-- Sidebar -->
    <?php
    include('bins/sidebar.php');
    ?>

    <!-- Main content -->
    <div class="flex-grow-1" style="margin-left: 250px; padding: 1rem;">
        <div class="row m-0">


            <?php
            $electionlists = mysqli_query($connections, "SELECT * FROM admintbl WHERE id='$admin_id' ORDER BY id DESC ");

            $countCreator = mysqli_num_rows($electionlists);

            if ($countCreator > 0) {


                while ($row_election_lists = mysqli_fetch_assoc($electionlists)) {


                    $id = $row_election_lists["id"];
                    $electionyear = $row_election_lists["electionyear"];
                    $title = $row_election_lists["electiontitle"];
                    $status = $row_election_lists["electionstatus"];
                    $firstname = $row_election_lists["firstname"];
                    $lastname = $row_election_lists["lastname"];
                    $createdby = $firstname . " " . $lastname;
            ?>
                    <div class="col-md-4">
                        <!-- <div class="card mb-4 <?php echo $status === '1' ? 'bg-success text-light' : ($status === '2' ? 'bg-warning' : ($status === '3' ? 'bg-danger text-light' : '')); ?> election_card editElectionButton" data-target="editelection.php?id=<?php echo $id; ?>"> -->
                        <div class="card mb-4 <?php echo $status === '1' ? 'bg-success text-light' : ($status === '2' ? 'bg-warning' : ($status === '3' ? 'bg-danger text-light' : '')); ?> election_card" id="electionResultsButton" data-target="electionresults.php">
                            <div class="card-body">
                                <h6 class="card-title"> Election Year: <?php echo $electionyear; ?></h6>
                                <h6 class="card-subtitle mb-2"> Title: <?php echo $title; ?></h6>
                                <p class="card-text"> Status: <?php echo $status === '1' ? 'Active' : ($status === '2' ? 'Pending' : ($status === '3' ? 'Close' : '')); ?> <br> Created By: <?php echo $createdby; ?></p>


                                <!-- <a href="#" class="button-red" id="title<?php echo $id; ?>" onclick="deleteThis<?php echo $id; ?>()">Delete</a> -->
                                <!-- <a href="#" class="button-green editElectionButton" data-target="editelection.php?id=<?php echo $id; ?>">Update</a> -->

                                <script>
                                    function deleteThis<?php echo $id; ?>() {

                                        var userDecision = confirm('Are you sure you want to remove <?php echo $title; ?>?');
                                        if (userDecision) {
                                            // alert('You chose yes.');
                                            // Add your code for the delete action here


                                            $.ajax({
                                                type: 'POST',
                                                url: 'deleteelection.php',
                                                data: {
                                                    id: <?php echo $id; ?>
                                                },
                                                success: function(response) {
                                                    if (response === 'success') {
                                                        alert('Item deleted successfully.');
                                                        $('main[role="main"]').load('electionlist.php');
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
                            </div>
                        </div>
                    </div>

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

        </div>

    </div>
</div>





<script>
    $(document).ready(function() {


        // Event handler for register candidates button
        $('#createElectionButton').click(function(e) {
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




        $('.editElectionButton').click(function(e) {
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


        // Event handler for election results button
        $('#electionResultsButton').click(function(e) {
            e.preventDefault(); // Prevent default link behavior
            var target = $(this).data('target'); // Get target from data attribute
            window.location.href = target; // Redirect to the target page
        });



    });
</script>


<?php
include('bins/footer.php');
?>