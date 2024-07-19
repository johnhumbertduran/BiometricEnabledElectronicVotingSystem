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
    $admin_name = $my_info["firstName"];
    $admin_course = $my_info["course"];

    if ($account_type != 2) {
        header('Location: ../../forbidden.php');
    }
} else {
    header('Location: ../');
}
?>
<style>
    /* Add this CSS to your stylesheet or inside a <style> tag */

    .nav-index {
        padding: 10px;
        transition: background-color 0.3s;
    }

    .nav-index:hover {
        background-color: rgba(255, 255, 255, 0.2);
        /* Adjust hover background color */
    }

    .nav-index.active {
        background-color: rgba(255, 255, 255, 0.3);
        /* Adjust active background color */
        /* font-weight: bold; */
    }
</style>
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
        <nav id="sidebarMenu" class="col-md-2 d-md-block bgmainblue sidebar" style="height: 100%;">
            <div class="d-flex flex-column h-100">
                <br>
                <h3 class="text-white">Welcome - <?php echo $admin_name; ?></h3>
                <div class="sidebar-sticky">
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-index text-white active" href="#" data-target="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-index text-white" href="#" data-target="electionlist.php">Election List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-index text-white" href="#" data-target="candidatelist.php">Candidate's List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-index text-white" href="#" data-target="voterslist.php">Voter's List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-index text-white" href="#" data-target="canvassreport.php">Canvassing Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-index text-white" href="#" data-target="historylog.php">History Log</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-index text-white" href="#" data-target="about.php">About</a>
                        </li>
                    </ul>
                </div>

                <div class="mt-auto text-center">
                    <a href="logout.php" class="button-blue border border-light">Logout</a>
                </div>
                <br>
            </div>
        </nav>

        <!-- Spacer -->
        <!-- <div class="col-md-1"></div> -->

        <!-- Main Content Area -->
        <main role="main" class="col-md-8 ml-auto px-md-4 border-blue overflow-y-scroll d-flex align-items-center flex-fill" style="padding: 0 !important; height: 100%;">
            <!-- Your PHP content goes here -->
        </main>

    </div>
</div>

<script>
    $(document).ready(function() {
        //console.log("Document is ready."); // Check if document is ready

        // Function to update main class based on the target URL
        function updateMainClass(target) {

            var mainElement = $('main[role="main"]');
            if ((target === 'registervoters.php') || (target === 'home.php') || (target === 'newelection.php')) {
                mainElement.addClass('d-flex align-items-center justify-content-center');
            } else {
                mainElement.removeClass('d-flex align-items-center justify-content-center');
            }
        }

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
                    setActiveLink('home.php'); // Set active link

                    //updateMainClass('home.php'); // Update main class
                },
                error: function() {
                    console.log("Error loading content."); // Log error
                    $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>'); // Show error message
                }
            });
        }

        // Function to set active link
        function setActiveLink(target) {
            $('.nav-index').removeClass('active'); // Remove active class from all links
            $('.nav-index[data-target="' + target + '"]').addClass('active'); // Add active class to the current link
        }


        // Load home.php initially on document ready
        loadHomePage();

        // Event handler for navigation links
        $('.nav-link').click(function(e) {
            e.preventDefault(); // Prevent default link behavior
            var target = $(this).data('target'); // Get target from data attribute
            //console.log("Loading content from(NavLinkCode): " + target); // Log target for debugging

            // AJAX request to load content
            $.ajax({
                url: target,
                method: 'GET',
                success: function(data) {
                    //console.log("Content loaded successfully."); // Log success
                    $('main[role="main"]').html(data); // Load content into main area
                    setActiveLink(target); // Set active link
                    //console.log("check target here:" + target);
                    updateMainClass(target); // Update main class
                },
                error: function() {
                    //console.log("Error loading content."); // Log error
                    $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>'); // Show error message
                }
            });
        });
    });
</script>

<?php
include('bins/footer.php');
?>