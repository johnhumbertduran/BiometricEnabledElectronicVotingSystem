<?php
session_start();
include("../admindashboard/bins/connections.php");

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


if (isset($_GET['president'])) {
    // echo $_GET['president'];
    $president = $_GET['president'];
    $presidentlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$president' AND status = 'Active' ");
    $countpresident = mysqli_num_rows($presidentlists);

    if ($countpresident > 0) {
        while ($row_president_lists = mysqli_fetch_assoc($presidentlists)) {


            $presidentid = $row_president_lists["id"];
            $presidentidnumber = $row_president_lists["idnumber"];
            $presidentfirstname = $row_president_lists["firstname"];
            $presidentmiddlename = $row_president_lists["middlename"];
            $presidentlastname = $row_president_lists["lastname"];

            $presidentname = ucfirst($presidentfirstname) . " " . ucfirst($presidentmiddlename[0]) . ". " . ucfirst($presidentlastname);
        }
    }
}

if (isset($_GET['vicepresident'])) {
    // echo $_GET['vicepresident'];
    $vicepresident = $_GET['vicepresident'];
    $vicepresidentlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$vicepresident' AND status = 'Active' ");
    $countvicepresident = mysqli_num_rows($vicepresidentlists);

    if ($countvicepresident > 0) {
        while ($row_vicepresident_lists = mysqli_fetch_assoc($vicepresidentlists)) {


            $vicepresidentid = $row_vicepresident_lists["id"];
            $vicepresidentidnumber = $row_vicepresident_lists["idnumber"];
            $vicepresidentfirstname = $row_vicepresident_lists["firstname"];
            $vicepresidentmiddlename = $row_vicepresident_lists["middlename"];
            $vicepresidentlastname = $row_vicepresident_lists["lastname"];

            $vicepresidentname = ucfirst($vicepresidentfirstname) . " " . ucfirst($vicepresidentmiddlename[0]) . ". " . ucfirst($vicepresidentlastname);
        }
    }
}

if (isset($_GET['secretary'])) {
    // echo $_GET['secretary'];
    $secretary = $_GET['secretary'];
    $secretarylists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$secretary' AND status = 'Active' ");
    $countsecretary = mysqli_num_rows($secretarylists);

    if ($countsecretary > 0) {
        while ($row_secretary_lists = mysqli_fetch_assoc($secretarylists)) {


            $secretaryid = $row_secretary_lists["id"];
            $secretaryidnumber = $row_secretary_lists["idnumber"];
            $secretaryfirstname = $row_secretary_lists["firstname"];
            $secretarymiddlename = $row_secretary_lists["middlename"];
            $secretarylastname = $row_secretary_lists["lastname"];

            $secretaryname = ucfirst($secretaryfirstname) . " " . ucfirst($secretarymiddlename[0]) . ". " . ucfirst($secretarylastname);
        }
    }
}
if (isset($_GET['assistantsecretary'])) {
    // echo $_GET['assistantsecretary'];
    $assistantsecretary = $_GET['assistantsecretary'];
    $assistantsecretarylists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$assistantsecretary' AND status = 'Active' ");
    $countassistantsecretary = mysqli_num_rows($assistantsecretarylists);

    if ($countassistantsecretary > 0) {
        while ($row_assistantsecretary_lists = mysqli_fetch_assoc($assistantsecretarylists)) {


            $assistantsecretaryid = $row_assistantsecretary_lists["id"];
            $assistantsecretaryidnumber = $row_assistantsecretary_lists["idnumber"];
            $assistantsecretaryfirstname = $row_assistantsecretary_lists["firstname"];
            $assistantsecretarymiddlename = $row_assistantsecretary_lists["middlename"];
            $assistantsecretarylastname = $row_assistantsecretary_lists["lastname"];

            $assistantsecretaryname = ucfirst($assistantsecretaryfirstname) . " " . ucfirst($assistantsecretarymiddlename[0]) . ". " . ucfirst($assistantsecretarylastname);
        }
    }
}
if (isset($_GET['treasurer'])) {
    // echo $_GET['treasurer'];
    $treasurer = $_GET['treasurer'];
    $treasurerlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$treasurer' AND status = 'Active' ");
    $counttreasurer = mysqli_num_rows($treasurerlists);

    if ($counttreasurer > 0) {
        while ($row_treasurer_lists = mysqli_fetch_assoc($treasurerlists)) {


            $treasurerid = $row_treasurer_lists["id"];
            $treasureridnumber = $row_treasurer_lists["idnumber"];
            $treasurerfirstname = $row_treasurer_lists["firstname"];
            $treasurermiddlename = $row_treasurer_lists["middlename"];
            $treasurerlastname = $row_treasurer_lists["lastname"];

            $treasurername = ucfirst($treasurerfirstname) . " " . ucfirst($treasurermiddlename[0]) . ". " . ucfirst($treasurerlastname);
        }
    }
}
if (isset($_GET['assistanttreasurer'])) {
    // echo $_GET['assistanttreasurer'];
    $assistanttreasurer = $_GET['assistanttreasurer'];
    $assistanttreasurerlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$assistanttreasurer' AND status = 'Active' ");
    $countassistanttreasurer = mysqli_num_rows($assistanttreasurerlists);

    if ($countassistanttreasurer > 0) {
        while ($row_assistanttreasurer_lists = mysqli_fetch_assoc($assistanttreasurerlists)) {


            $assistanttreasurerid = $row_assistanttreasurer_lists["id"];
            $assistanttreasureridnumber = $row_assistanttreasurer_lists["idnumber"];
            $assistanttreasurerfirstname = $row_assistanttreasurer_lists["firstname"];
            $assistanttreasurermiddlename = $row_assistanttreasurer_lists["middlename"];
            $assistanttreasurerlastname = $row_assistanttreasurer_lists["lastname"];

            $assistanttreasurername = ucfirst($assistanttreasurerfirstname) . " " . ucfirst($assistanttreasurermiddlename[0]) . ". " . ucfirst($assistanttreasurerlastname);
        }
    }
}
if (isset($_GET['auditor'])) {
    // echo $_GET['auditor'];
    $auditor = $_GET['auditor'];
    $auditorlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$auditor' AND status = 'Active' ");
    $countauditor = mysqli_num_rows($auditorlists);

    if ($countauditor > 0) {
        while ($row_auditor_lists = mysqli_fetch_assoc($auditorlists)) {


            $auditorid = $row_auditor_lists["id"];
            $auditoridnumber = $row_auditor_lists["idnumber"];
            $auditorfirstname = $row_auditor_lists["firstname"];
            $auditormiddlename = $row_auditor_lists["middlename"];
            $auditorlastname = $row_auditor_lists["lastname"];

            $auditorname = ucfirst($auditorfirstname) . " " . ucfirst($auditormiddlename[0]) . ". " . ucfirst($auditorlastname);
        }
    }
}
if (isset($_GET['assistantauditor'])) {
    // echo $_GET['assistantauditor'];
    $assistantauditor = $_GET['assistantauditor'];
    $assistantauditorlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$assistantauditor' AND status = 'Active' ");
    $countassistantauditor = mysqli_num_rows($assistantauditorlists);

    if ($countassistantauditor > 0) {
        while ($row_assistantauditor_lists = mysqli_fetch_assoc($assistantauditorlists)) {


            $assistantauditorid = $row_assistantauditor_lists["id"];
            $assistantauditoridnumber = $row_assistantauditor_lists["idnumber"];
            $assistantauditorfirstname = $row_assistantauditor_lists["firstname"];
            $assistantauditormiddlename = $row_assistantauditor_lists["middlename"];
            $assistantauditorlastname = $row_assistantauditor_lists["lastname"];

            $assistantauditorname = ucfirst($assistantauditorfirstname) . " " . ucfirst($assistantauditormiddlename[0]) . ". " . ucfirst($assistantauditorlastname);
        }
    }
}
if (isset($_GET['pio1'])) {
    // echo $_GET['pio1'];
    $pio1 = $_GET['pio1'];
    $pio1lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$pio1' AND status = 'Active' ");
    $countpio1 = mysqli_num_rows($pio1lists);

    if ($countpio1 > 0) {
        while ($row_pio1_lists = mysqli_fetch_assoc($pio1lists)) {


            $pio1id = $row_pio1_lists["id"];
            $pio1idnumber = $row_pio1_lists["idnumber"];
            $pio1firstname = $row_pio1_lists["firstname"];
            $pio1middlename = $row_pio1_lists["middlename"];
            $pio1lastname = $row_pio1_lists["lastname"];

            $pio1name = ucfirst($pio1firstname) . " " . ucfirst($pio1middlename[0]) . ". " . ucfirst($pio1lastname);
        }
    }
}
if (isset($_GET['pio2'])) {
    // echo $_GET['pio2'];
    $pio2 = $_GET['pio2'];
    $pio2lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$pio2' AND status = 'Active' ");
    $countpio2 = mysqli_num_rows($pio2lists);

    if ($countpio2 > 0) {
        while ($row_pio2_lists = mysqli_fetch_assoc($pio2lists)) {


            $pio2id = $row_pio2_lists["id"];
            $pio2idnumber = $row_pio2_lists["idnumber"];
            $pio2firstname = $row_pio2_lists["firstname"];
            $pio2middlename = $row_pio2_lists["middlename"];
            $pio2lastname = $row_pio2_lists["lastname"];

            $pio2name = ucfirst($pio2firstname) . " " . ucfirst($pio2middlename[0]) . ". " . ucfirst($pio2lastname);
        }
    }
}
if (isset($_GET['businessmanager'])) {
    // echo $_GET['businessmanager'];
    $businessmanager = $_GET['businessmanager'];
    $businessmanagerlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$businessmanager' AND status = 'Active' ");
    $countbusinessmanager = mysqli_num_rows($businessmanagerlists);

    if ($countbusinessmanager > 0) {
        while ($row_businessmanager_lists = mysqli_fetch_assoc($businessmanagerlists)) {


            $businessmanagerid = $row_businessmanager_lists["id"];
            $businessmanageridnumber = $row_businessmanager_lists["idnumber"];
            $businessmanagerfirstname = $row_businessmanager_lists["firstname"];
            $businessmanagermiddlename = $row_businessmanager_lists["middlename"];
            $businessmanagerlastname = $row_businessmanager_lists["lastname"];

            $businessmanagername = ucfirst($businessmanagerfirstname) . " " . ucfirst($businessmanagermiddlename[0]) . ". " . ucfirst($businessmanagerlastname);
        }
    }
}
if (isset($_GET['layoutartist1'])) {
    // echo $_GET['layoutartist1'];
    $layoutartist1 = $_GET['layoutartist1'];
    $layoutartist1lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$layoutartist1' AND status = 'Active' ");
    $countlayoutartist1 = mysqli_num_rows($layoutartist1lists);

    if ($countlayoutartist1 > 0) {
        while ($row_layoutartist1_lists = mysqli_fetch_assoc($layoutartist1lists)) {


            $layoutartist1id = $row_layoutartist1_lists["id"];
            $layoutartist1idnumber = $row_layoutartist1_lists["idnumber"];
            $layoutartist1firstname = $row_layoutartist1_lists["firstname"];
            $layoutartist1middlename = $row_layoutartist1_lists["middlename"];
            $layoutartist1lastname = $row_layoutartist1_lists["lastname"];

            $layoutartist1name = ucfirst($layoutartist1firstname) . " " . ucfirst($layoutartist1middlename[0]) . ". " . ucfirst($layoutartist1lastname);
        }
    }
}
if (isset($_GET['layoutartist2'])) {
    // echo $_GET['layoutartist2'];
    $layoutartist2 = $_GET['layoutartist2'];
    $layoutartist2lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$layoutartist2' AND status = 'Active' ");
    $countlayoutartist2 = mysqli_num_rows($layoutartist2lists);

    if ($countlayoutartist2 > 0) {
        while ($row_layoutartist2_lists = mysqli_fetch_assoc($layoutartist2lists)) {


            $layoutartist2id = $row_layoutartist2_lists["id"];
            $layoutartist2idnumber = $row_layoutartist2_lists["idnumber"];
            $layoutartist2firstname = $row_layoutartist2_lists["firstname"];
            $layoutartist2middlename = $row_layoutartist2_lists["middlename"];
            $layoutartist2lastname = $row_layoutartist2_lists["lastname"];

            $layoutartist2name = ucfirst($layoutartist2firstname) . " " . ucfirst($layoutartist2middlename[0]) . ". " . ucfirst($layoutartist2lastname);
        }
    }
}
if (isset($_GET['technicalsupport1'])) {
    // echo $_GET['technicalsupport1'];
    $technicalsupport1 = $_GET['technicalsupport1'];
    $technicalsupport1lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$technicalsupport1' AND status = 'Active' ");
    $counttechnicalsupport1 = mysqli_num_rows($technicalsupport1lists);

    if ($counttechnicalsupport1 > 0) {
        while ($row_technicalsupport1_lists = mysqli_fetch_assoc($technicalsupport1lists)) {


            $technicalsupport1id = $row_technicalsupport1_lists["id"];
            $technicalsupport1idnumber = $row_technicalsupport1_lists["idnumber"];
            $technicalsupport1firstname = $row_technicalsupport1_lists["firstname"];
            $technicalsupport1middlename = $row_technicalsupport1_lists["middlename"];
            $technicalsupport1lastname = $row_technicalsupport1_lists["lastname"];

            $technicalsupport1name = ucfirst($technicalsupport1firstname) . " " . ucfirst($technicalsupport1middlename[0]) . ". " . ucfirst($technicalsupport1lastname);
        }
    }
}
if (isset($_GET['technicalsupport2'])) {
    // echo $_GET['technicalsupport2'];
    $technicalsupport2 = $_GET['technicalsupport2'];
    $technicalsupport2lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$technicalsupport2' AND status = 'Active' ");
    $counttechnicalsupport2 = mysqli_num_rows($technicalsupport2lists);

    if ($counttechnicalsupport2 > 0) {
        while ($row_technicalsupport2_lists = mysqli_fetch_assoc($technicalsupport2lists)) {


            $technicalsupport2id = $row_technicalsupport2_lists["id"];
            $technicalsupport2idnumber = $row_technicalsupport2_lists["idnumber"];
            $technicalsupport2firstname = $row_technicalsupport2_lists["firstname"];
            $technicalsupport2middlename = $row_technicalsupport2_lists["middlename"];
            $technicalsupport2lastname = $row_technicalsupport2_lists["lastname"];

            $technicalsupport2name = ucfirst($technicalsupport2firstname) . " " . ucfirst($technicalsupport2middlename[0]) . ". " . ucfirst($technicalsupport2lastname);
        }
    }
}


if (isset($_POST['submit'])) {
    // echo "<script>alert('test');</script>";
    if ($_POST['president']) {
        $savepresident = $_POST['president'];
    }
    if ($_POST['vicepresident']) {
        $savevicepresident = $_POST['vicepresident'];
    }
    if ($_POST['secretary']) {
        $savesecretary = $_POST['secretary'];
    }
    if ($_POST['assistantsecretary']) {
        $saveassistantsecretary = $_POST['assistantsecretary'];
    }
    if ($_POST['treasurer']) {
        $savetreasurer = $_POST['treasurer'];
    }
    if ($_POST['assistanttreasurer']) {
        $saveassistanttreasurer = $_POST['assistanttreasurer'];
    }
    if ($_POST['auditor']) {
        $saveauditor = $_POST['auditor'];
    }
    if ($_POST['assistantauditor']) {
        $saveassistantauditor = $_POST['assistantauditor'];
    }
    if ($_POST['pio1']) {
        $savepio1 = $_POST['pio1'];
    }
    if ($_POST['pio2']) {
        $savepio2 = $_POST['pio2'];
    }
    if ($_POST['businessmanager']) {
        $savebusinessmanager = $_POST['businessmanager'];
    }
    if ($_POST['layoutartist1']) {
        $savelayoutartist1 = $_POST['layoutartist1'];
    }
    if ($_POST['layoutartist2']) {
        $savelayoutartist2 = $_POST['layoutartist2'];
    }
    if ($_POST['technicalsupport1']) {
        $savetechnicalsupport1 = $_POST['technicalsupport1'];
    }
    if ($_POST['technicalsupport2']) {
        $savetechnicalsupport2 = $_POST['technicalsupport2'];
    }

    if (
        $savepresident && $savevicepresident && $savesecretary && $saveassistantsecretary
        && $savetreasurer && $saveassistanttreasurer && $saveauditor && $saveassistantauditor
        && $savepio1 && $savepio2 && $savebusinessmanager && $savelayoutartist1 && $savelayoutartist2
        && $savetechnicalsupport1 && $savetechnicalsupport2
    ) {
        // echo "<script>console.log('good');</script>";
        $query = "INSERT INTO candidatestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$firstname', '$middlename', '$lastname', '$course', '$year', '$position', '$party', 'Active', '$targetFile')";
        if (mysqli_query($connections, $query)) {
        }
    }
}
?>
<!-- <h1>Submit Vote</h1> -->
<h3 class="text-center bgmainblue text-white sticky-top py-2" style="z-index: 1;">Submit Vote</h3>
<div class="px-5">

    <form method="POST">
        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">President:</h6>
            <p class="mb-0"><?php echo $presidentname; ?></p>
            <input type="text" id="president" name="president" value="<?php echo $presidentidnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Vice President:</h6>
            <p class="mb-0"><?php echo $vicepresidentname; ?></p>
            <input type="text" id="vicepresident" name="vicepresident" value="<?php echo $vicepresidentidnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Secretary:</h6>
            <p class="mb-0"><?php echo $secretaryname; ?></p>
            <input type="text" id="secretary" name="secretary" value="<?php echo $secretaryidnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Assistant Secretary:</h6>
            <p class="mb-0"><?php echo $assistantsecretaryname; ?></p>
            <input type="text" id="assistantsecretary" name="assistantsecretary" value="<?php echo $assistantsecretaryidnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Treasurer:</h6>
            <p class="mb-0"><?php echo $treasurername; ?></p>
            <input type="text" id="treasurer" name="treasurer" value="<?php echo $treasureridnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Assistant Treasurer:</h6>
            <p class="mb-0"><?php echo $assistanttreasurername; ?></p>
            <input type="text" id="assistanttreasurer" name="assistanttreasurer" value="<?php echo $assistanttreasureridnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Auditor:</h6>
            <p class="mb-0"><?php echo $auditorname; ?></p>
            <input type="text" id="auditor" name="auditor" value="<?php echo $auditoridnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Assistant Auditor:</h6>
            <p class="mb-0"><?php echo $assistantauditorname; ?></p>
            <input type="text" id="assistantauditor" name="assistantauditor" value="<?php echo $assistantauditoridnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">P.I.O.:</h6>
            <p class="mb-0"><?php echo $pio1name; ?></p>
            <p class="mb-0"><?php echo $pio2name; ?></p>
            <input type="text" id="pio1" name="pio1" value="<?php echo $pio1idnumber; ?>">
            <input type="text" id="pio2" name="pio2" value="<?php echo $pio2idnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Business Manager:</h6>
            <p class="mb-0"><?php echo $businessmanagername; ?></p>
            <input type="text" id="businessmanager" name="businessmanager" value="<?php echo $businessmanageridnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Layout Artist:</h6>
            <p class="mb-0"><?php echo $layoutartist1name; ?></p>
            <p class="mb-0"><?php echo $layoutartist2name; ?></p>
            <input type="text" id="layoutartist1" name="layoutartist1" value="<?php echo $layoutartist1idnumber; ?>">
            <input type="text" id="layoutartist2" name="layoutartist2" value="<?php echo $layoutartist2idnumber; ?>">
        </div>

        <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0 me-2">Technical Support:</h6>
            <p class="mb-0"><?php echo $technicalsupport1name; ?></p>
            <p class="mb-0"><?php echo $technicalsupport2name; ?></p>
            <input type="text" id="technicalsupport1" name="technicalsupport1" value="<?php echo $technicalsupport1idnumber; ?>">
            <input type="text" id="technicalsupport2" name="technicalsupport2" value="<?php echo $technicalsupport2idnumber; ?>">
        </div>


        <button class="button-green mb-3" id="backButton" data-target="itvoteform.php">Back</button>
        <input type="submit" name="submit" class="button-green mb-3 float-end" value="Submit">
    </form>
</div>


<script>
    $(document).ready(function() {

        // Function to update the submit button's data-target attribute
        function updateBackButtonUrl() {
            var president = $('#president').val();
            var vicePresident = $('#vicepresident').val();
            var secretary = $('#secretary').val();
            var assistantSecretary = $('#assistantsecretary').val();
            var treasurer = $('#treasurer').val();
            var assistantTreasurer = $('#assistanttreasurer').val();
            var auditor = $('#auditor').val();
            var assistantAuditor = $('#assistantauditor').val();
            var pio1 = $('#pio1').val();
            var pio2 = $('#pio2').val();
            var businessManager = $('#businessmanager').val();
            var layoutArtist1 = $('#layoutartist1').val();
            var layoutArtist2 = $('#layoutartist2').val();
            var technicalSupport1 = $('#technicalsupport1').val();
            var technicalSupport2 = $('#technicalsupport2').val();

            // Construct the new URL with selected values
            var targetUrl = 'itvoteform.php?president=' + encodeURIComponent(president) +
                '&vicepresident=' + encodeURIComponent(vicePresident) +
                '&secretary=' + encodeURIComponent(secretary) +
                '&assistantsecretary=' + encodeURIComponent(assistantSecretary) +
                '&treasurer=' + encodeURIComponent(treasurer) +
                '&assistanttreasurer=' + encodeURIComponent(assistantTreasurer) +
                '&auditor=' + encodeURIComponent(auditor) +
                '&assistantauditor=' + encodeURIComponent(assistantAuditor) +
                '&pio1=' + encodeURIComponent(pio1) +
                '&pio2=' + encodeURIComponent(pio2) +
                '&businessmanager=' + encodeURIComponent(businessManager) +
                '&layoutartist1=' + encodeURIComponent(layoutArtist1) +
                '&layoutartist2=' + encodeURIComponent(layoutArtist2) +
                '&technicalsupport1=' + encodeURIComponent(technicalSupport1) +
                '&technicalsupport2=' + encodeURIComponent(technicalSupport2);

            console.log("Before Click: " + targetUrl);
            // Update the data-target attribute of the submit button
            $('#backButton').data('target', targetUrl);
            console.log("After Click: " + targetUrl);
        }

        $('#backButton').click(function(e) {
            e.preventDefault(); // Prevent default button behavior
            updateBackButtonUrl();

            var target = $(this).data('target'); // Get target from data attribute

            // AJAX request to load content
            $.ajax({
                url: target,
                method: 'GET',
                success: function(data) {
                    // Load content into main area
                    $('main[role="main"]').html(data);
                    $('main[role="main"]').scrollTop(0); // Scroll to top
                },
                error: function() {
                    // Show error message
                    $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>');
                }
            });

        });

    });
</script>