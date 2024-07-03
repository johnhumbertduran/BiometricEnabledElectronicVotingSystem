<?php
include('bins/header.php');
include('bins/navigation.php');
?>
<br>
<div class="container-fluid px-5">
    <div class="row" style="height: 70vh;">

        <!-- Button to toggle sidebar -->
        <nav class="navbar navbar-dark bgmainblue col-md-2 d-md-none">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <!-- Vertical Navigation Bar -->
        <nav id="sidebarMenu" class="col-md-3 d-md-block bgmainblue sidebar" style="height: 100%;">
            <div class="d-flex flex-column h-100">

                <br>
                <h3 class="text-white">Welcome - Admin</h3>
                <div class="sidebar-sticky">
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="#" data-target="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" data-target="adminlists.php">Admin List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" data-target="candidatelist.php">Candidate's List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" data-target="voterslist.php">Voter's List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" data-target="canvassreport.php">Canvassing Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" data-target="historylog.php">History Log</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" data-target="about.php">About</a>
                        </li>
                    </ul>
                </div>

                <div class="mt-auto text-center">
                    <button class="button-blue border border-light">Logout</button>
                </div>
                <br>
            </div>
        </nav>

        <!-- Spacer -->
        <div class="col-md-1"></div>

        <!-- Main Content Area -->
        <main role="main" class="col-md-8 ml-auto px-md-4 border-blue" style="padding: 0 !important;">

        </main>
    </div>
</div>



<script>
    $(document).ready(function() {
        console.log("Document is ready."); // Check if document is ready

        // Function to load home.php initially
        function loadHomePage() {
            var target = 'home.php'; // Set the target to home.php

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
        }

        // Load home.php initially on document ready
        loadHomePage();

        // Event handler for navigation links
        $('.nav-link').click(function(e) {
            e.preventDefault(); // Prevent default link behavior
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

<?php
include('bins/footer.php');
?>