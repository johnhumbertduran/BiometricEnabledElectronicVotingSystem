<?php
include("../admindashboard/bins/connections.php");
?>
<div class="container mt-5 px-5">

    <form>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="president" class="form-label">President:</label>
                <select class="form-select form-select-sm" id="president">
                    <option value="1">Select President</option>
                    <?php
                    $president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='President' AND course='BSIT' AND status='Active' ");

                    $count_president_qry = mysqli_num_rows($president_qry);

                    if ($count_president_qry > 0) {

                        while ($president_data = mysqli_fetch_assoc($president_qry)) {

                            $id = $president_data["id"];
                            $firstname = $president_data["firstName"];
                            $middlename = $president_data["middleName"];
                            $lastname = $president_data["lastName"];
                            $party = $president_data["party"];
                            $img = $president_data["img"];

                            $president = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $president; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>

                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="vicepresident" class="form-label">Vice President:</label>
                <select class="form-select form-select-sm" id="vicepresident">
                    <option value="1">Select Vice President</option>
                    <?php
                    $vice_president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Vice President' AND course='BSIT' AND status='Active' ");

                    $count_vice_president_qry = mysqli_num_rows($vice_president_qry);

                    if ($count_vice_president_qry > 0) {

                        while ($vice_president_data = mysqli_fetch_assoc($vice_president_qry)) {

                            $id = $vice_president_data["id"];
                            $firstname = $vice_president_data["firstName"];
                            $middlename = $vice_president_data["middleName"];
                            $lastname = $vice_president_data["lastName"];
                            $party = $vice_president_data["party"];
                            $img = $vice_president_data["img"];

                            $vice_president = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $vice_president; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="secretary" class="form-label">Secretary:</label>
                <select class="form-select form-select-sm" id="secretary">
                    <option value="1">Select Secretary</option>
                    <?php
                    $secretary_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Secretary' AND course='BSIT' AND status='Active' ");

                    $count_secretary_qry = mysqli_num_rows($secretary_qry);

                    if ($count_secretary_qry > 0) {

                        while ($secretary_data = mysqli_fetch_assoc($secretary_qry)) {

                            $id = $secretary_data["id"];
                            $firstname = $secretary_data["firstName"];
                            $middlename = $secretary_data["middleName"];
                            $lastname = $secretary_data["lastName"];
                            $party = $secretary_data["party"];
                            $img = $secretary_data["img"];

                            $secretary = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $secretary; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="assistantsecretary" class="form-label">Assistant Secretary:</label>
                <select class="form-select form-select-sm" id="assistantsecretary">
                    <option value="1">Select Assistant Secretary</option>
                    <?php
                    $assistant_secretary_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Secretary' AND course='BSIT' AND status='Active' ");

                    $count_assistant_secretary_qry = mysqli_num_rows($assistant_secretary_qry);

                    if ($count_assistant_secretary_qry > 0) {

                        while ($assistant_secretary_data = mysqli_fetch_assoc($assistant_secretary_qry)) {

                            $id = $assistant_secretary_data["id"];
                            $firstname = $assistant_secretary_data["firstName"];
                            $middlename = $assistant_secretary_data["middleName"];
                            $lastname = $assistant_secretary_data["lastName"];
                            $party = $assistant_secretary_data["party"];
                            $img = $assistant_secretary_data["img"];

                            $assistant_secretary = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $assistant_secretary; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="treasurer" class="form-label">Treasurer:</label>
                <select class="form-select form-select-sm" id="treasurer">
                    <option value="1">Select Treasurer</option>
                    <?php
                    $treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Treasurer' AND course='BSIT' AND status='Active' ");

                    $count_treasurer_qry = mysqli_num_rows($treasurer_qry);

                    if ($count_treasurer_qry > 0) {

                        while ($treasurer_data = mysqli_fetch_assoc($treasurer_qry)) {

                            $id = $treasurer_data["id"];
                            $firstname = $treasurer_data["firstName"];
                            $middlename = $treasurer_data["middleName"];
                            $lastname = $treasurer_data["lastName"];
                            $party = $treasurer_data["party"];
                            $img = $treasurer_data["img"];

                            $treasurer = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $treasurer; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="assistanttreasurer" class="form-label">Assistant Treasurer:</label>
                <select class="form-select form-select-sm" id="assistanttreasurer">
                    <option value="1">Select Assistant Treasurer</option>
                    <?php
                    $assistant_treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Treasurer' AND course='BSIT' AND status='Active' ");

                    $count_assistant_treasurer_qry = mysqli_num_rows($assistant_treasurer_qry);

                    if ($count_assistant_treasurer_qry > 0) {

                        while ($assistant_treasurer_data = mysqli_fetch_assoc($assistant_treasurer_qry)) {

                            $id = $assistant_treasurer_data["id"];
                            $firstname = $assistant_treasurer_data["firstName"];
                            $middlename = $assistant_treasurer_data["middleName"];
                            $lastname = $assistant_treasurer_data["lastName"];
                            $party = $assistant_treasurer_data["party"];
                            $img = $assistant_treasurer_data["img"];

                            $assistant_treasurer = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $assistant_treasurer; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="auditor" class="form-label">Auditor:</label>
                <select class="form-select form-select-sm" id="auditor">
                    <option value="1">Select Auditor</option>
                    <?php
                    $auditor_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Auditor' AND course='BSIT' AND status='Active' ");

                    $count_auditor_qry = mysqli_num_rows($auditor_qry);

                    if ($count_auditor_qry > 0) {

                        while ($auditor_data = mysqli_fetch_assoc($auditor_qry)) {

                            $id = $auditor_data["id"];
                            $firstname = $auditor_data["firstName"];
                            $middlename = $auditor_data["middleName"];
                            $lastname = $auditor_data["lastName"];
                            $party = $auditor_data["party"];
                            $img = $auditor_data["img"];

                            $auditor = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $auditor; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="assistantauditor" class="form-label">Assistant Auditor:</label>
                <select class="form-select form-select-sm" id="assistantauditor">
                    <option value="1">Select Assistant Auditor</option>
                    <?php
                    $assistant_auditor_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Auditor' AND course='BSIT' AND status='Active' ");

                    $count_assistant_auditor_qry = mysqli_num_rows($assistant_auditor_qry);

                    if ($count_assistant_auditor_qry > 0) {

                        while ($assistant_auditor_data = mysqli_fetch_assoc($assistant_auditor_qry)) {

                            $id = $assistant_auditor_data["id"];
                            $firstname = $assistant_auditor_data["firstName"];
                            $middlename = $assistant_auditor_data["middleName"];
                            $lastname = $assistant_auditor_data["lastName"];
                            $party = $assistant_auditor_data["party"];
                            $img = $assistant_auditor_data["img"];

                            $assistant_auditor = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $assistant_auditor; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="pio" class="form-label">P.I.O.:</label>
                <select class="form-select form-select-sm" id="pio">
                    <option value="1">Select P.I.O.</option>
                    <?php
                    $pio_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='P.I.O.' AND course='BSIT' AND status='Active' ");

                    $count_pio_qry = mysqli_num_rows($pio_qry);

                    if ($count_pio_qry > 0) {

                        while ($pio_data = mysqli_fetch_assoc($pio_qry)) {

                            $id = $pio_data["id"];
                            $firstname = $pio_data["firstName"];
                            $middlename = $pio_data["middleName"];
                            $lastname = $pio_data["lastName"];
                            $party = $pio_data["party"];
                            $img = $pio_data["img"];

                            $pio = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $pio; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="businessmanager" class="form-label">Business Manager:</label>
                <select class="form-select form-select-sm" id="businessmanager">
                    <option value="1">Select Business Manager</option>
                    <?php
                    $business_manager_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Business Manager' AND course='BSIT' AND status='Active' ");

                    $count_business_manager_qry = mysqli_num_rows($business_manager_qry);

                    if ($count_business_manager_qry > 0) {

                        while ($business_manager_data = mysqli_fetch_assoc($business_manager_qry)) {

                            $id = $business_manager_data["id"];
                            $firstname = $business_manager_data["firstName"];
                            $middlename = $business_manager_data["middleName"];
                            $lastname = $business_manager_data["lastName"];
                            $party = $business_manager_data["party"];
                            $img = $business_manager_data["img"];

                            $business_manager = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $business_manager; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="layoutartist" class="form-label">Layout Artist:</label>
                <select class="form-select form-select-sm" id="layoutartist">
                    <option value="1">Select Layout Artist</option>
                    <?php
                    $layout_artist_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Layout Artist' AND course='BSIT' AND status='Active' ");

                    $count_layout_artist_qry = mysqli_num_rows($layout_artist_qry);

                    if ($count_layout_artist_qry > 0) {

                        while ($layout_artist_data = mysqli_fetch_assoc($layout_artist_qry)) {

                            $id = $layout_artist_data["id"];
                            $firstname = $layout_artist_data["firstName"];
                            $middlename = $layout_artist_data["middleName"];
                            $lastname = $layout_artist_data["lastName"];
                            $party = $layout_artist_data["party"];
                            $img = $layout_artist_data["img"];

                            $layout_artist = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $layout_artist; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="technicalsupport" class="form-label">Technical Support:</label>
                <select class="form-select form-select-sm" id="technicalsupport">
                    <option value="1">Select Technical Support</option>
                    <?php
                    $technical_support_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Technical Support' AND course='BSIT' AND status='Active' ");

                    $count_technical_support_qry = mysqli_num_rows($technical_support_qry);

                    if ($count_technical_support_qry > 0) {

                        while ($technical_support_data = mysqli_fetch_assoc($technical_support_qry)) {

                            $id = $technical_support_data["id"];
                            $firstname = $technical_support_data["firstName"];
                            $middlename = $technical_support_data["middleName"];
                            $lastname = $technical_support_data["lastName"];
                            $party = $technical_support_data["party"];
                            $img = $technical_support_data["img"];

                            $technical_support = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                            $img_dir = substr($img, 3);

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $technical_support; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>

        </div>
    </form>
</div>