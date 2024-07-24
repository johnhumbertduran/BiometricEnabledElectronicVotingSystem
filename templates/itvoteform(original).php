<?php
include("../admindashboard/bins/connections.php");
?>
<div class="container px-5">

    <form method="POST">

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

                            $id = $president_data["idnumber"];
                            $firstname = $president_data["firstname"];
                            $middlename = $president_data["middlename"];
                            $lastname = $president_data["lastname"];
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

                            $id = $vice_president_data["idnumber"];
                            $firstname = $vice_president_data["firstname"];
                            $middlename = $vice_president_data["middlename"];
                            $lastname = $vice_president_data["lastname"];
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


            <hr>
            <br>
            <div class="col-md-6 mb-3">
                <label for="secretary" class="form-label">Secretary:</label>
                <select class="form-select form-select-sm" id="secretary">
                    <option value="1">Select Secretary</option>
                    <?php
                    $secretary_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Secretary' AND course='BSIT' AND status='Active' ");

                    $count_secretary_qry = mysqli_num_rows($secretary_qry);

                    if ($count_secretary_qry > 0) {

                        while ($secretary_data = mysqli_fetch_assoc($secretary_qry)) {

                            $id = $secretary_data["idnumber"];
                            $firstname = $secretary_data["firstname"];
                            $middlename = $secretary_data["middlename"];
                            $lastname = $secretary_data["lastname"];
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

                            $id = $assistant_secretary_data["idnumber"];
                            $firstname = $assistant_secretary_data["firstname"];
                            $middlename = $assistant_secretary_data["middlename"];
                            $lastname = $assistant_secretary_data["lastname"];
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



            <hr>
            <br>



            <div class="col-md-6 mb-3">
                <label for="treasurer" class="form-label">Treasurer:</label>
                <select class="form-select form-select-sm" id="treasurer">
                    <option value="1">Select Treasurer</option>
                    <?php
                    $treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Treasurer' AND course='BSIT' AND status='Active' ");

                    $count_treasurer_qry = mysqli_num_rows($treasurer_qry);

                    if ($count_treasurer_qry > 0) {

                        while ($treasurer_data = mysqli_fetch_assoc($treasurer_qry)) {

                            $id = $treasurer_data["idnumber"];
                            $firstname = $treasurer_data["firstname"];
                            $middlename = $treasurer_data["middlename"];
                            $lastname = $treasurer_data["lastname"];
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

                            $id = $assistant_treasurer_data["idnumber"];
                            $firstname = $assistant_treasurer_data["firstname"];
                            $middlename = $assistant_treasurer_data["middlename"];
                            $lastname = $assistant_treasurer_data["lastname"];
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


            <hr>
            <br>


            <div class="col-md-6 mb-3">
                <label for="auditor" class="form-label">Auditor:</label>
                <select class="form-select form-select-sm" id="auditor">
                    <option value="1">Select Auditor</option>
                    <?php
                    $auditor_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Auditor' AND course='BSIT' AND status='Active' ");

                    $count_auditor_qry = mysqli_num_rows($auditor_qry);

                    if ($count_auditor_qry > 0) {

                        while ($auditor_data = mysqli_fetch_assoc($auditor_qry)) {

                            $id = $auditor_data["idnumber"];
                            $firstname = $auditor_data["firstname"];
                            $middlename = $auditor_data["middlename"];
                            $lastname = $auditor_data["lastname"];
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

                            $id = $assistant_auditor_data["idnumber"];
                            $firstname = $assistant_auditor_data["firstname"];
                            $middlename = $assistant_auditor_data["middlename"];
                            $lastname = $assistant_auditor_data["lastname"];
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


            <hr>
            <br>


            <div class="col-md-6 mb-3">
                <label for="pio1" class="form-label">P.I.O.:</label>
                <select class="form-select form-select-sm" id="pio1">
                    <option value="1">Select P.I.O.</option>
                    <?php
                    $pio_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='P.I.O.' AND course='BSIT' AND status='Active' ");

                    $count_pio_qry = mysqli_num_rows($pio_qry);

                    if ($count_pio_qry > 0) {

                        while ($pio_data = mysqli_fetch_assoc($pio_qry)) {

                            $id = $pio_data["idnumber"];
                            $firstname = $pio_data["firstname"];
                            $middlename = $pio_data["middlename"];
                            $lastname = $pio_data["lastname"];
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
                <label for="pio2" class="form-label">P.I.O.:</label>
                <select class="form-select form-select-sm" id="pio2" disabled>
                    <option value="1">Select P.I.O.</option>
                    <?php
                    $pio_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='P.I.O.' AND course='BSIT' AND status='Active' ");

                    $count_pio_qry = mysqli_num_rows($pio_qry);

                    if ($count_pio_qry > 0) {

                        while ($pio_data = mysqli_fetch_assoc($pio_qry)) {

                            $id = $pio_data["idnumber"];
                            $firstname = $pio_data["firstname"];
                            $middlename = $pio_data["middlename"];
                            $lastname = $pio_data["lastname"];
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

            <hr>
            <br>


            <div class="col-md-6 mb-3">
                <label for="businessmanager" class="form-label">Business Manager:</label>
                <select class="form-select form-select-sm" id="businessmanager">
                    <option value="1">Select Business Manager</option>
                    <?php
                    $business_manager_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Business Manager' AND course='BSIT' AND status='Active' ");

                    $count_business_manager_qry = mysqli_num_rows($business_manager_qry);

                    if ($count_business_manager_qry > 0) {

                        while ($business_manager_data = mysqli_fetch_assoc($business_manager_qry)) {

                            $id = $business_manager_data["idnumber"];
                            $firstname = $business_manager_data["firstname"];
                            $middlename = $business_manager_data["middlename"];
                            $lastname = $business_manager_data["lastname"];
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


            <hr>
            <br>


            <div class="col-md-6 mb-3">
                <label for="layoutartist1" class="form-label">Layout Artist:</label>
                <select class="form-select form-select-sm" id="layoutartist1">
                    <option value="1">Select Layout Artist</option>
                    <?php
                    $layout_artist_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Layout Artist' AND course='BSIT' AND status='Active' ");

                    $count_layout_artist_qry = mysqli_num_rows($layout_artist_qry);

                    if ($count_layout_artist_qry > 0) {

                        while ($layout_artist_data = mysqli_fetch_assoc($layout_artist_qry)) {

                            $id = $layout_artist_data["idnumber"];
                            $firstname = $layout_artist_data["firstname"];
                            $middlename = $layout_artist_data["middlename"];
                            $lastname = $layout_artist_data["lastname"];
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
                <label for="layoutartist2" class="form-label">Layout Artist:</label>
                <select class="form-select form-select-sm" id="layoutartist2" disabled>
                    <option value="1">Select Layout Artist</option>
                    <?php
                    $layout_artist_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Layout Artist' AND course='BSIT' AND status='Active' ");

                    $count_layout_artist_qry = mysqli_num_rows($layout_artist_qry);

                    if ($count_layout_artist_qry > 0) {

                        while ($layout_artist_data = mysqli_fetch_assoc($layout_artist_qry)) {

                            $id = $layout_artist_data["idnumber"];
                            $firstname = $layout_artist_data["firstname"];
                            $middlename = $layout_artist_data["middlename"];
                            $lastname = $layout_artist_data["lastname"];
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


            <hr>
            <br>



            <div class="col-md-6 mb-3">
                <label for="technicalsupport1" class="form-label">Technical Support:</label>
                <select class="form-select form-select-sm" id="technicalsupport1">
                    <option value="1">Select Technical Support</option>
                    <?php
                    $technical_support_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Technical Support' AND course='BSIT' AND status='Active' ");

                    $count_technical_support_qry = mysqli_num_rows($technical_support_qry);

                    if ($count_technical_support_qry > 0) {

                        while ($technical_support_data = mysqli_fetch_assoc($technical_support_qry)) {

                            $id = $technical_support_data["idnumber"];
                            $firstname = $technical_support_data["firstname"];
                            $middlename = $technical_support_data["middlename"];
                            $lastname = $technical_support_data["lastname"];
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


            <div class="col-md-6 mb-3">
                <label for="technicalsupport2" class="form-label">Technical Support:</label>
                <select class="form-select form-select-sm" id="technicalsupport2" disabled>
                    <option value="1">Select Technical Support</option>
                    <?php
                    $technical_support_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Technical Support' AND course='BSIT' AND status='Active' ");

                    $count_technical_support_qry = mysqli_num_rows($technical_support_qry);

                    if ($count_technical_support_qry > 0) {

                        while ($technical_support_data = mysqli_fetch_assoc($technical_support_qry)) {

                            $id = $technical_support_data["idnumber"];
                            $firstname = $technical_support_data["firstname"];
                            $middlename = $technical_support_data["middlename"];
                            $lastname = $technical_support_data["lastname"];
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
        <button class="button-green submit-link mb-3 float-end" id="submitButton" data-target="submit.php">Submit</button>
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

        // Event handler for register candidates button
        $('#submitButton').click(function(e) {
            e.preventDefault(); // Prevent default button behavior
            var target = $(this).data('target'); // Get target from data attribute
            //console.log("Loading content from: " + target); // Log target for debugging

            // AJAX request to load content
            $.ajax({
                url: target,
                method: 'GET',
                success: function(data) {
                    //console.log("Content loaded successfully."); // Log success
                    $('main[role="main"]').html(data); // Load content into main area
                    $('main[role="main"]').scrollTop(0); // Scroll to top
                },
                error: function() {
                    //console.log("Error loading content."); // Log error
                    $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>'); // Show error message
                }
            });
            // return true;
        });

    });
</script>