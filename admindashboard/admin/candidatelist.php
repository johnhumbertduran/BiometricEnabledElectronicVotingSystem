<nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
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
</nav>
<br>
&nbsp;&nbsp; <button class="button-blue" id="registerCandidatesButton" data-target="registercandidates.php">+ Add Candidates</button>

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
    });
</script>