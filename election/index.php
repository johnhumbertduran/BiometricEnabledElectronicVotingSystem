<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
include("../admindashboard/bins/connections.php");

// $voter_course = "";
if (isset($_SESSION["idnumber"])) {

    $session_id_number = $_SESSION["idnumber"];
    $check_voter_id_number = mysqli_query($connections, "SELECT * FROM voterstbl WHERE idnumber='$session_id_number'");
    $get_voter_id_number = mysqli_fetch_assoc($check_voter_id_number);
    $voter_firstName = $get_voter_id_number["firstname"];
    $voter_middleName = $get_voter_id_number["middlename"];
    $voter_lastName = $get_voter_id_number["lastname"];
    $voter_year = $get_voter_id_number["year"];
    $voter_course = $get_voter_id_number["course"];
    $voter_biometric = $get_voter_id_number["biometric"];
    $voter_status = $get_voter_id_number["status"];

    $name = ucfirst($voter_firstName) . " " . ucfirst($voter_middleName[0]) . ". " . ucfirst($voter_lastName);

    if ($voter_status == 0) {
        // header('Location: election/');
    } elseif ($voter_status == 1) {

        header('Location: ../forbidden');
    }
}

// echo $voter_course;

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
                <a href="logout.php" class="text-decoration-none px-2 py-1 link-button-blue-border">Logout</a>
            </div>
        </div>
    </div>
</div>



<!-- Next container -->

<div class="container-fluid">

    <!-- Select Party Dropdown -->
    <!-- <div class="custom-select-container sticky-top pb-1" id="select_party">
        <div class="select-selected">Select Party</div>
        <div class="select-items">
            <a href="?party=party1" class='select-item'>Party 1</a>
            <a href="?party=party2" class='select-item'>Party 2</a>
            <a href="?party=party3" class='select-item'>Party 3</a>
            <a href="?party=party4" class='select-item'>Party 4</a>
        </div>
    </div> -->

    <h5> Welcome, <?php echo $name; ?></h5>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class=" borderblue overflow-auto" style="height: 55vh;">
                <h3 class="text-center bgmainblue text-white sticky-top py-2" style="z-index: 1;">Candidates</h3>
                <!-- check Department then ibutang iya ru Department -->
                <div class="container">
                    <div class="row">

                        <?php
                        if ($voter_course == "BEED") {
                            include('beed.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "English") {
                            include('english.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "Filipino") {
                            include('filipino.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "BSIT") {
                            include('it.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "Math") {
                            include('math.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "Social Study") {
                            include('socialstudy.php');
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>



        <div class="col-md-6">
            <main role="main" class="borderblue overflow-auto" style="padding: 0 !important; height: 55vh;">
                <!-- <div class=" borderblue overflow-auto" style="height: 55vh;"> -->


                <!-- check Department then ibutang iya ru Department -->
                <div class="container">
                    <div class="row">

                        <?php
                        if ($voter_course == "BEED") {
                            include('beedvoteform.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "English") {
                            include('englishvoteform.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "Filipino") {
                            include('filipinovoteform.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "BSIT") {
                            include('itvoteform.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "Math") {
                            include('mathvoteform.php');
                        }
                        ?>
                        <?php
                        if ($voter_course == "Social Study") {
                            include('socialstudyvoteform.php');
                        }
                        ?>

                    </div>
                </div>
                <!-- </div> -->
            </main>

        </div>


        <div class="container d-flex justify-content-between pt-2">
            <button class="button-green" type="button">Back</button>
            <!-- <button class="button-green" type="button">Submit</button> -->
        </div>
    </div>




</div>


<?php
include('bins/footer.php');
?>