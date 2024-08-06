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
?>
<!-- 
<style>
    /* Add this CSS to your stylesheet or inside a <style> tag */

    .nav-link {
        padding: 10px;
        transition: background-color 0.3s;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        /* Adjust hover background color */
    }

    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.3);
        /* Adjust active background color */
        /* font-weight: bold; */
    }
</style> -->

<div class="d-flex">
    <!-- Sidebar -->
    <?php include('bins/sidebar.php'); ?>

    <!-- Main content -->
    <div class="flex-grow-1 d-flex justify-content-center" style="margin-left: 250px; padding: 1rem; min-height: 90vh;">
        <div class="flex-fill d-flex align-items-center justify-content-center">
            <img src="../../bins/img/logo.png" class="rounded-circle" width="200px" alt="Logo">
        </div>

        <div class="flex-fill d-flex align-items-center justify-content-center">
            <h2 class="text-center">Campus Student Council Election</h2>
        </div>
    </div>
</div>


<!-- <script>
    $(document).ready(function() {
        //console.log("Document is ready."); // Check if document is ready

        // Function to update main class based on the target URL
        function updateMainClass(target) {

            var mainElement = $('main[role="main"]');
            if ((target === 'home.php') || (target === 'newelection.php')) {
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
                },
                error: function() {
                    console.log("Error loading content."); // Log error
                    $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>'); // Show error message
                }
            });
        }

        // Function to set active link
        function setActiveLink(target) {
            $('.nav-link').removeClass('active'); // Remove active class from all links
            $('.nav-link[data-target="' + target + '"]').addClass('active'); // Add active class to the current link
        }

        // Load home.php initially on document ready
        loadHomePage();

        // Event handler for navigation links
        $('.nav-link').click(function(e) {
            e.preventDefault(); // Prevent default link behavior
            var target = $(this).data('target'); // Get target from data attribute
            //console.log("Loading content from: " + target); // Log target for debugging

            // AJAX request to load content
            $.ajax({
                url: target,
                method: 'GET',
                success: function(data) {
                    //console.log("Content loaded successfully."); // Log success
                    $('main[role="main"]').html(data); // Load content into main area
                    setActiveLink(target); // Set active link
                    updateMainClass(target); // Update main class
                },
                error: function() {
                    console.log("Error loading content."); // Log error
                    $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>'); // Show error message
                }
            });
        });
    });
</script> -->

<?php
include('bins/footer.php');
?>