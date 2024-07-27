<?php
include("../admindashboard/bins/connections.php");

?>
<h3 class="text-center bgmainblue text-white sticky-top py-2" style="z-index: 1;">Vote Here</h3>
<div class="container px-5">

    <form method="POST">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="president" class="form-label">President:</label>
                <select class="form-select form-select-sm" id="president" required>
                    <option value="1">Select President</option>
                    <?php
                    $president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='President' AND course='BSIT' AND status='Active' ");

                    $count_president_qry = mysqli_num_rows($president_qry);

                    if ($count_president_qry > 0) {

                        while ($president_data = mysqli_fetch_assoc($president_qry)) {

                            $presidentid = $president_data["idnumber"];
                            $presidentfirstname = $president_data["firstname"];
                            $presidentmiddlename = $president_data["middlename"];
                            $presidentlastname = $president_data["lastname"];

                            $president = ucfirst($presidentfirstname) . " " . ucfirst($presidentmiddlename[0]) . ". " . ucfirst($presidentlastname);


                    ?>
                            <option value="<?php echo $presidentid; ?>" name="president"><?php echo $president; ?></option>
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
                <select class="form-select form-select-sm" id="vicepresident" required>
                    <option value="1">Select Vice President</option>
                    <?php
                    $vice_president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Vice President' AND course='BSIT' AND status='Active' ");

                    $count_vice_president_qry = mysqli_num_rows($vice_president_qry);

                    if ($count_vice_president_qry > 0) {

                        while ($vice_president_data = mysqli_fetch_assoc($vice_president_qry)) {

                            $vicepresidentid = $vice_president_data["idnumber"];
                            $vicepresidentfirstname = $vice_president_data["firstname"];
                            $vicepresidentmiddlename = $vice_president_data["middlename"];
                            $vicepresidentlastname = $vice_president_data["lastname"];

                            $vice_president = ucfirst($vicepresidentfirstname) . " " . ucfirst($vicepresidentmiddlename[0]) . ". " . ucfirst($vicepresidentlastname);


                    ?>
                            <option value="<?php echo $vicepresidentid; ?>" name="vicepresident"><?php echo $vice_president; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <hr>
            <br>
            <div class="col-md-6 mb-3">
                <label for="secretary" class="form-label">Secretary:</label>
                <select class="form-select form-select-sm" id="secretary" required>
                    <option value="1">Select Secretary</option>
                    <?php
                    $secretary_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Secretary' AND course='BSIT' AND status='Active' ");

                    $count_secretary_qry = mysqli_num_rows($secretary_qry);

                    if ($count_secretary_qry > 0) {

                        while ($secretary_data = mysqli_fetch_assoc($secretary_qry)) {

                            $secretaryid = $secretary_data["idnumber"];
                            $secretaryfirstname = $secretary_data["firstname"];
                            $secretarymiddlename = $secretary_data["middlename"];
                            $secretarylastname = $secretary_data["lastname"];

                            $secretary = ucfirst($secretaryfirstname) . " " . ucfirst($secretarymiddlename[0]) . ". " . ucfirst($secretarylastname);


                    ?>
                            <option value="<?php echo $secretaryid; ?>" name="secretary"><?php echo $secretary; ?></option>

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
                <select class="form-select form-select-sm" id="assistantsecretary" required>
                    <option value="1">Select Assistant Secretary</option>
                    <?php
                    $assistant_secretary_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Secretary' AND course='BSIT' AND status='Active' ");

                    $count_assistant_secretary_qry = mysqli_num_rows($assistant_secretary_qry);

                    if ($count_assistant_secretary_qry > 0) {

                        while ($assistant_secretary_data = mysqli_fetch_assoc($assistant_secretary_qry)) {

                            $assistantsecretaryid = $assistant_secretary_data["idnumber"];
                            $assistantsecretaryfirstname = $assistant_secretary_data["firstname"];
                            $assistantsecretarymiddlename = $assistant_secretary_data["middlename"];
                            $assistantsecretarylastname = $assistant_secretary_data["lastname"];

                            $assistant_secretary = ucfirst($assistantsecretaryfirstname) . " " . ucfirst($assistantsecretarymiddlename[0]) . ". " . ucfirst($assistantsecretarylastname);


                    ?>
                            <option value="<?php echo $assistantsecretaryid; ?>" name="assistantsecretary"><?php echo $assistant_secretary; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>



            <hr>
            <br>



            <div class="col-md-6 mb-3">
                <label for="treasurer" class="form-label">Treasurer:</label>
                <select class="form-select form-select-sm" id="treasurer" required>
                    <option value="1">Select Treasurer</option>
                    <?php
                    $treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Treasurer' AND course='BSIT' AND status='Active' ");

                    $count_treasurer_qry = mysqli_num_rows($treasurer_qry);

                    if ($count_treasurer_qry > 0) {

                        while ($treasurer_data = mysqli_fetch_assoc($treasurer_qry)) {

                            $treasurerid = $treasurer_data["idnumber"];
                            $treasurerfirstname = $treasurer_data["firstname"];
                            $treasurermiddlename = $treasurer_data["middlename"];
                            $treasurerlastname = $treasurer_data["lastname"];

                            $treasurer = ucfirst($treasurerfirstname) . " " . ucfirst($treasurermiddlename[0]) . ". " . ucfirst($treasurerlastname);

                    ?>
                            <option value="<?php echo $treasurerid; ?>" name="treasurer"><?php echo $treasurer; ?></option>

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
                <select class="form-select form-select-sm" id="assistanttreasurer" required>
                    <option value="1">Select Assistant Treasurer</option>
                    <?php
                    $assistant_treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Treasurer' AND course='BSIT' AND status='Active' ");

                    $count_assistant_treasurer_qry = mysqli_num_rows($assistant_treasurer_qry);

                    if ($count_assistant_treasurer_qry > 0) {

                        while ($assistant_treasurer_data = mysqli_fetch_assoc($assistant_treasurer_qry)) {

                            $assistanttreasurerid = $assistant_treasurer_data["idnumber"];
                            $assistanttreasurerfirstname = $assistant_treasurer_data["firstname"];
                            $assistanttreasurermiddlename = $assistant_treasurer_data["middlename"];
                            $assistanttreasurerlastname = $assistant_treasurer_data["lastname"];

                            $assistant_treasurer = ucfirst($assistanttreasurerfirstname) . " " . ucfirst($assistanttreasurermiddlename[0]) . ". " . ucfirst($assistanttreasurerlastname);

                    ?>
                            <option value="<?php echo $assistanttreasurerid; ?>" name="assistanttreasurer"><?php echo $assistant_treasurer; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <hr>
            <br>


            <div class="col-md-6 mb-3">
                <label for="auditor" class="form-label">Auditor:</label>
                <select class="form-select form-select-sm" id="auditor" required>
                    <option value="1">Select Auditor</option>
                    <?php
                    $auditor_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Auditor' AND course='BSIT' AND status='Active' ");

                    $count_auditor_qry = mysqli_num_rows($auditor_qry);

                    if ($count_auditor_qry > 0) {

                        while ($auditor_data = mysqli_fetch_assoc($auditor_qry)) {

                            $auditorid = $auditor_data["idnumber"];
                            $auditorfirstname = $auditor_data["firstname"];
                            $auditormiddlename = $auditor_data["middlename"];
                            $auditorlastname = $auditor_data["lastname"];

                            $auditor = ucfirst($auditorfirstname) . " " . ucfirst($auditormiddlename[0]) . ". " . ucfirst($auditorlastname);

                    ?>
                            <option value="<?php echo $auditorid; ?>" name="auditor"><?php echo $auditor; ?></option>

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
                <select class="form-select form-select-sm" id="assistantauditor" required>
                    <option value="1">Select Assistant Auditor</option>
                    <?php
                    $assistant_auditor_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Auditor' AND course='BSIT' AND status='Active' ");

                    $count_assistant_auditor_qry = mysqli_num_rows($assistant_auditor_qry);

                    if ($count_assistant_auditor_qry > 0) {

                        while ($assistant_auditor_data = mysqli_fetch_assoc($assistant_auditor_qry)) {

                            $assistantauditorid = $assistant_auditor_data["idnumber"];
                            $assistantauditorfirstname = $assistant_auditor_data["firstname"];
                            $assistantauditormiddlename = $assistant_auditor_data["middlename"];
                            $assistantauditorlastname = $assistant_auditor_data["lastname"];

                            $assistant_auditor = ucfirst($assistantauditorfirstname) . " " . ucfirst($assistantauditormiddlename[0]) . ". " . ucfirst($assistantauditorlastname);

                    ?>
                            <option value="<?php echo $assistantauditorid; ?>" name="assistantauditor"><?php echo $assistant_auditor; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <hr>
            <br>


            <div class="col-md-6 mb-3">
                <label for="pio1" class="form-label">P.I.O.:</label>
                <select class="form-select form-select-sm" id="pio1" required>
                    <option value="1">Select P.I.O.</option>
                    <?php
                    $pio_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='P.I.O.' AND course='BSIT' AND status='Active' ");

                    $count_pio_qry = mysqli_num_rows($pio_qry);

                    if ($count_pio_qry > 0) {

                        while ($pio_data = mysqli_fetch_assoc($pio_qry)) {

                            $pio1id = $pio_data["idnumber"];
                            $pio1firstname = $pio_data["firstname"];
                            $pio1middlename = $pio_data["middlename"];
                            $pio1lastname = $pio_data["lastname"];

                            $pio = ucfirst($pio1firstname) . " " . ucfirst($pio1middlename[0]) . ". " . ucfirst($pio1lastname);

                    ?>
                            <option value="<?php echo $pio1id; ?>" name="pio1"><?php echo $pio; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="pio2" class="form-label">P.I.O.:</label>
                <select class="form-select form-select-sm" id="pio2" required disabled>
                    <option value="1">Select P.I.O.</option>
                    <?php
                    $pio_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='P.I.O.' AND course='BSIT' AND status='Active' ");

                    $count_pio_qry = mysqli_num_rows($pio_qry);

                    if ($count_pio_qry > 0) {

                        while ($pio_data = mysqli_fetch_assoc($pio_qry)) {

                            $pio2id = $pio_data["idnumber"];
                            $pio2firstname = $pio_data["firstname"];
                            $pio2middlename = $pio_data["middlename"];
                            $pio2lastname = $pio_data["lastname"];

                            $pio = ucfirst($pio2firstname) . " " . ucfirst($pio2middlename[0]) . ". " . ucfirst($pio2lastname);

                    ?>
                            <option value="<?php echo $pio2id; ?>" name="pio2"><?php echo $pio; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>

            <hr>
            <br>


            <div class="col-md-6 mb-3">
                <label for="businessmanager" class="form-label">Business Manager:</label>
                <select class="form-select form-select-sm" id="businessmanager" required>
                    <option value="1">Select Business Manager</option>
                    <?php
                    $business_manager_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Business Manager' AND course='BSIT' AND status='Active' ");

                    $count_business_manager_qry = mysqli_num_rows($business_manager_qry);

                    if ($count_business_manager_qry > 0) {

                        while ($business_manager_data = mysqli_fetch_assoc($business_manager_qry)) {

                            $businessmanagerid = $business_manager_data["idnumber"];
                            $businessmanagerfirstname = $business_manager_data["firstname"];
                            $businessmanagermiddlename = $business_manager_data["middlename"];
                            $businessmanagerlastname = $business_manager_data["lastname"];

                            $business_manager = ucfirst($businessmanagerfirstname) . " " . ucfirst($businessmanagermiddlename[0]) . ". " . ucfirst($businessmanagerlastname);

                    ?>
                            <option value="<?php echo $businessmanagerid; ?>" name="businessmanager"><?php echo $business_manager; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <hr>
            <br>


            <div class="col-md-6 mb-3">
                <label for="layoutartist1" class="form-label">Layout Artist:</label>
                <select class="form-select form-select-sm" id="layoutartist1" required>
                    <option value="1">Select Layout Artist</option>
                    <?php
                    $layout_artist_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Layout Artist' AND course='BSIT' AND status='Active' ");

                    $count_layout_artist_qry = mysqli_num_rows($layout_artist_qry);

                    if ($count_layout_artist_qry > 0) {

                        while ($layout_artist_data = mysqli_fetch_assoc($layout_artist_qry)) {

                            $layoutartist1id = $layout_artist_data["idnumber"];
                            $layoutartist1firstname = $layout_artist_data["firstname"];
                            $layoutartist1middlename = $layout_artist_data["middlename"];
                            $layoutartist1lastname = $layout_artist_data["lastname"];

                            $layout_artist = ucfirst($layoutartist1firstname) . " " . ucfirst($layoutartist1middlename[0]) . ". " . ucfirst($layoutartist1lastname);

                    ?>
                            <option value="<?php echo $layoutartist1id; ?>" name="layoutartist1"><?php echo $layout_artist; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="layoutartist2" class="form-label">Layout Artist:</label>
                <select class="form-select form-select-sm" id="layoutartist2" required disabled>
                    <option value="1">Select Layout Artist</option>
                    <?php
                    $layout_artist_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Layout Artist' AND course='BSIT' AND status='Active' ");

                    $count_layout_artist_qry = mysqli_num_rows($layout_artist_qry);

                    if ($count_layout_artist_qry > 0) {

                        while ($layout_artist_data = mysqli_fetch_assoc($layout_artist_qry)) {

                            $layoutartist2id = $layout_artist_data["idnumber"];
                            $layoutartist2firstname = $layout_artist_data["firstname"];
                            $layoutartist2middlename = $layout_artist_data["middlename"];
                            $layoutartist2lastname = $layout_artist_data["lastname"];

                            $layout_artist = ucfirst($layoutartist2firstname) . " " . ucfirst($layoutartist2middlename[0]) . ". " . ucfirst($layoutartist2lastname);

                    ?>
                            <option value="<?php echo $layoutartist2id; ?>" name="layoutartist2"><?php echo $layout_artist; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <hr>
            <br>



            <div class="col-md-6 mb-3">
                <label for="technicalsupport1" class="form-label">Technical Support:</label>
                <select class="form-select form-select-sm" id="technicalsupport1" required>
                    <option value="1">Select Technical Support</option>
                    <?php
                    $technical_support_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Technical Support' AND course='BSIT' AND status='Active' ");

                    $count_technical_support_qry = mysqli_num_rows($technical_support_qry);

                    if ($count_technical_support_qry > 0) {

                        while ($technical_support_data = mysqli_fetch_assoc($technical_support_qry)) {

                            $technicalsupport1id = $technical_support_data["idnumber"];
                            $technicalsupport1firstname = $technical_support_data["firstname"];
                            $technicalsupport1middlename = $technical_support_data["middlename"];
                            $technicalsupport1lastname = $technical_support_data["lastname"];

                            $technical_support = ucfirst($technicalsupport1firstname) . " " . ucfirst($technicalsupport1middlename[0]) . ". " . ucfirst($technicalsupport1lastname);

                    ?>
                            <option value="<?php echo $technicalsupport1id; ?>" name="technicalsupport1"><?php echo $technical_support; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="technicalsupport2" class="form-label">Technical Support:</label>
                <select class="form-select form-select-sm" id="technicalsupport2" required disabled>
                    <option value="1">Select Technical Support</option>
                    <?php
                    if (isset($_GET['technicalsupport1'])) {
                        $techsup = $_GET['technicalsupport1'];
                        echo $techsup;
                    }
                    $technical_support_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Technical Support' AND course='BSIT' AND status='Active' ");

                    $count_technical_support_qry = mysqli_num_rows($technical_support_qry);

                    if ($count_technical_support_qry > 0) {

                        while ($technical_support_data = mysqli_fetch_assoc($technical_support_qry)) {

                            $technicalsupport2id = $technical_support_data["idnumber"];
                            $technicalsupport2firstname = $technical_support_data["firstname"];
                            $technicalsupport2middlename = $technical_support_data["middlename"];
                            $technicalsupport2lastname = $technical_support_data["lastname"];

                            $technical_support = ucfirst($technicalsupport2firstname) . " " . ucfirst($technicalsupport2middlename[0]) . ". " . ucfirst($technicalsupport2lastname);

                    ?>
                            <option value="<?php echo $technicalsupport2id; ?>" name="technicalsupport2"><?php echo $technical_support; ?></option>

                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </select>
            </div>



        </div>

        <button class="button-green mb-3 float-end" id="submitButton" data-target="submit.php">Submit</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../bins/jquery-3.7.1/jquery-3.7.1.min.js"></script> <!-- jQuery for offline -->

<script>
    $(document).ready(function() {


        $('#pio1').change(function() {
            var selectedPio1 = $(this).val();
            $('#pio2').prop('disabled', false);
            $('#pio2 option').each(function() {
                if ($(this).val() == selectedPio1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

        $('#pio2').change(function() {
            var selectedPio2 = $(this).val();
            $('#pio1').prop('disabled', false);
            $('#pio1 option').each(function() {
                if ($(this).val() == selectedPio2) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });



        $('#layoutartist1').change(function() {
            var selectedLayoutArtist1 = $(this).val();
            $('#layoutartist2').prop('disabled', false);
            $('#layoutartist2 option').each(function() {
                if ($(this).val() == selectedLayoutArtist1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

        $('#layoutartist2').change(function() {
            var selectedLayoutArtist2 = $(this).val();
            $('#layoutartist1').prop('disabled', false);
            $('#layoutartist1 option').each(function() {
                if ($(this).val() == selectedLayoutArtist2) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });



        $('#technicalsupport1').change(function() {
            var selectedTechnicalSupport1 = $(this).val();
            $('#technicalsupport2').prop('disabled', false);
            $('#technicalsupport2 option').each(function() {
                if ($(this).val() == selectedTechnicalSupport1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

        $('#technicalsupport2').change(function() {
            var selectedTechnicalSupport2 = $(this).val();
            $('#technicalsupport1').prop('disabled', false);
            $('#technicalsupport1 option').each(function() {
                if ($(this).val() == selectedTechnicalSupport2) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

        // Function to update the submit button's data-target attribute
        function updateSubmitButtonUrl() {
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
            var targetUrl = 'submit.php?president=' + encodeURIComponent(president) +
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

            // Update the data-target attribute of the submit button
            $('#submitButton').data('target', targetUrl);
        }

        // Call updateSubmitButtonUrl when any select value changes
        $('select').change(function() {
            updateSubmitButtonUrl();
        });

        // Function to validate required fields
        function validateForm() {
            var isValid = true;

            // Check if each required field is filled
            $('select[required]').each(function() {
                if ($(this).val() == '1') {
                    isValid = false;
                    $(this).addClass('is-invalid'); // Add a class for invalid fields
                } else {
                    $(this).removeClass('is-invalid'); // Remove the class if valid
                }
            });

            return isValid;
        }

        // Remove is-invalid class when a valid option is selected
        $('select[required]').change(function() {
            if ($(this).val() != '1') {
                $(this).removeClass('is-invalid');
            }
        });

        $('#submitButton').click(function(e) {
            e.preventDefault(); // Prevent default button behavior

            if (validateForm()) { // Check if form is valid
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
            } else {
                alert('Please fill out all required fields.'); // Show a general alert if form is invalid
            }
        });

    });
</script>