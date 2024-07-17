<?php
include("../bins/connections.php");
?>
<style>
    .election_card:hover {
        cursor: pointer;
    }
</style>
<!-- <nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
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
</nav> -->
<br>
&nbsp;&nbsp; <button class="button-blue sticky-top" id="createElectionButton" data-target="newelection.php">+ Create New Election</button>

<br>
<br>
<div class="row m-0">

    <?php
    $electionlists = mysqli_query($connections, "SELECT * FROM electionyeartbl ");


    while ($row_election_lists = mysqli_fetch_assoc($electionlists)) {
        $id = $row_election_lists["id"];
        $electionyear = $row_election_lists["electionyear"];
        $title = $row_election_lists["title"];
        $status = $row_election_lists["status"];
        $createdby = $row_election_lists["createdby"];
    ?>
        <div class="col-md-4">
            <!-- <div class="card mb-4 <?php echo $status === '1' ? 'bg-success text-light' : ($status === '2' ? 'bg-warning' : ($status === '3' ? 'bg-danger text-light' : '')); ?> election_card editElectionButton" data-target="editelection.php?id=<?php echo $id; ?>"> -->
            <div class="card mb-4 <?php echo $status === '1' ? 'bg-success text-light' : ($status === '2' ? 'bg-warning' : ($status === '3' ? 'bg-danger text-light' : '')); ?> election_card">
                <div class="card-body">
                    <h6 class="card-title"> Election Year: <?php echo $electionyear; ?></h6>
                    <h6 class="card-subtitle mb-2"> Title: <?php echo $title; ?></h6>
                    <p class="card-text"> Status: <?php echo $status === '1' ? 'Active' : ($status === '2' ? 'Pending' : ($status === '3' ? 'Close' : '')); ?> <br> Created By: <?php echo $createdby; ?></p>


                    <a href="#" class="button-red" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $id; ?>">Delete</a>
                    <a href="#" class="button-green editElectionButton" data-target="editelection.php?id=<?php echo $id; ?>">Update</a>
                </div>
            </div>
        </div>
        <!-- The Modal For Delete -->
        <div class="modal fade" id="deleteModal<?php echo $id; ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">
                            <font color="red">Delete Data</font>
                        </h6>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>
                            Remove <font color="green"><?php echo $title; ?></font>? <br><br>This action cannot be undone.
                        </h5>
                        <form method="post">
                            <input type="hidden" name="yes_remove" value="<?php echo $id; ?>">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>

                        <input type="submit" value="Yes" name="remove_yes" class="btn btn-success">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- End Modal For Delete -->
    <?php
    }
    ?>
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
    });
</script>