<nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
    <div class="container-fluid">
        <ul class="navbar-nav" style="font-size: 12px;">
            <li class="nav-item">
                <a class="nav-link active" href="#">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Voted Voters</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Unvoted Voters</a>
            </li>
        </ul>
    </div>
</nav>
<br>
&nbsp;&nbsp; <button class="button-blue" id="registerVoterButton" data-target="registervoters.php">+ Add Voters</button>
<button class="button-blue">Download Excel File</button>

<div>

</div>


<script>
    $(document).ready(function() {

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
    });
</script>