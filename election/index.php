<?php
include('bins/header.php');
include('bins/navigation.php');
include("../admindashboard/bins/connections.php");


// Get the selected value from the query string or set a default value
$selectedParty = isset($_GET['redir']) ? $_GET['redir'] : 'select_party';

// Map for displaying text based on value
$partyOptions = [
    'select_party' => 'Select Party',
    'party1' => 'Party 1',
    'party2' => 'Party 2',
    'party3' => 'Party 3',
    'party4' => 'Party 4'
];
$selectedPartyText = isset($partyOptions[$selectedParty]) ? $partyOptions[$selectedParty] : 'Select Party';

?>


<div class="container my-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-inline-flex align-items-center">
            <a class="">
                <img src="../bins/img/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
            </a>
            <div class="mx-3">
                <h2>Campus Student Council Election</h2>
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-center">
            <!-- <div class="dropdown mx-3">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Party List</label>
                        <select class="form-control custom-select-border  form-select-sm" id="exampleFormControlSelect1">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </div>
                </form>
            </div> -->
            <div class="mx-3">
                <a href="#" class="text-decoration-none px-2 py-1 link-button-blue-border">Help</a>
            </div>
        </div>
    </div>
</div>



<!-- Next container -->

<div class="container-fluid">

    <!-- Select Party Dropdown -->
    <div class="custom-select-container sticky-top pb-1" id="select_party">
        <div class="select-selected">Select Party</div>
        <div class="select-items">
            <a href="?party=party1" class='select-item'>Party 1</a>
            <a href="?party=party2" class='select-item'>Party 2</a>
            <a href="?party=party3" class='select-item'>Party 3</a>
            <a href="?party=party4" class='select-item'>Party 4</a>
        </div>
    </div>


    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class=" borderblue overflow-auto" style="height: 55vh;">
                <h3 class="text-center bgmainblue text-white sticky-top py-2" style="z-index: 1;">Candidates</h3>
                <!-- check Department then ibutang iya ru Department -->
                <div class="container">
                    <div class="row">

                        <?php
                        include('beed.php');
                        ?>
                        <?php
                        //  include('english.php'); 
                        ?>
                        <?php
                        //  include('filipino.php'); 
                        ?>
                        <?php
                        // include('it.php');
                        ?>
                        <?php
                        //  include('math.php'); 
                        ?>
                        <?php
                        //  include('socialstudy.php'); 
                        ?>
                    </div>
                </div>
            </div>

        </div>



        <div class="col-md-6">
            <div class=" borderblue overflow-auto" style="height: 55vh;">
                <h3 class="text-center bgmainblue text-white sticky-top py-2" style="z-index: 1;">Vote Here</h3>

                <!-- check Department then ibutang iya ru Department -->
                <div class="container">
                    <div class="row">

                        <?php
                        // include('beedvoteform.php');
                        ?>
                        <?php
                        // include('englishvoteform.php');
                        ?>
                        <?php
                        // include('filipinovoteform.php');
                        ?>
                        <?php
                        // include('itvoteform.php');
                        ?>
                        <?php
                        include('mathvoteform.php');
                        ?>
                        <?php
                        // include('socialstudyvoteform.php');
                        ?>

                    </div>
                </div>
            </div>

        </div>



        <div class="container d-flex justify-content-between pt-2">
            <button class="button-green" type="button">Back</button>
            <button class="button-green" type="button">Submit</button>
        </div>
    </div>




</div>

<script>
    // JavaScript for making the dropdown clickable
    document.addEventListener("DOMContentLoaded", function() {
        var selected = document.querySelector(".select-selected");
        var items = document.querySelectorAll(".select-item");

        // Function to handle click on each item
        function handleItemClick(item) {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                var selectedText = item.textContent;
                var partyParam = item.getAttribute("href").split('=')[1];

                // Update selected text
                selected.textContent = selectedText;

                // Redirect to the new URL with party parameter
                window.location.href = window.location.pathname + "?" + partyParam;
            });
        }

        // Toggle the dropdown visibility
        selected.addEventListener("click", function() {
            document.querySelector(".select-items").classList.toggle("active");
        });

        // Attach click event listener to each item
        items.forEach(function(item) {
            handleItemClick(item);
        });

        // Close the dropdown if the user clicks outside of it
        document.addEventListener("click", function(e) {
            if (!selected.contains(e.target)) {
                document.querySelector(".select-items").classList.remove("active");
            }
        });
    });
</script>

<?php
include('bins/footer.php');
?>