<?php
include('bins/header.php');
include("../admindashboard/bins/connections.php");
?>
<div class="container">
    <br>
    <h3 class="text-center">IT Department</h3>
    <br>
    <div class="row d-flex">

        <!-- OLD STATIC DESIGN FOR REFERENCE PURPOSES ONLY -->
        <!-- 
        <div class=" text-center">
            <div class="candidate-img">
                <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img" alt="Default Image">
                <h5 class="mt-2">President</h5>
            </div>
        </div>
        -->

        <!-- 
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img" alt="">
                    <h5>Layout Artist</h5>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img" alt="">
                    <h5>Layout Artist</h5>
                </div>
            </div>
        </div>
         -->

        <!-- END FOR REFERENCE PURPOSES -->


        <hr>

        <?php
        $president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='President' AND course='BSIT' AND status='Active' ");
        $count_president_qry = mysqli_num_rows($president_qry);

        if ($count_president_qry > 0) {

            while ($president_data = mysqli_fetch_assoc($president_qry)) {

                $id = $president_data["id"];
                $firstname = $president_data["firstname"];
                $middlename = $president_data["middlename"];
                $lastname = $president_data["lastname"];
                $party = $president_data["party"];
                $img = $president_data["img"];

                $president = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $president; ?> <br>President</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">President</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $vice_president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Vice President' AND course='BSIT' AND status='Active' ");
        $count_vice_president_qry = mysqli_num_rows($vice_president_qry);

        if ($count_vice_president_qry > 0) {

            while ($vice_president_data = mysqli_fetch_assoc($vice_president_qry)) {

                $id = $vice_president_data["id"];
                $firstname = $vice_president_data["firstname"];
                $middlename = $vice_president_data["middlename"];
                $lastname = $vice_president_data["lastname"];
                $party = $vice_president_data["party"];
                $img = $vice_president_data["img"];

                $vice_president = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $vice_president; ?> <br>Vice President</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Vice President</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $secretary_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Secretary' AND course='BSIT' AND status='Active' ");
        $count_secretary_qry = mysqli_num_rows($secretary_qry);

        if ($count_secretary_qry > 0) {

            while ($secretary_data = mysqli_fetch_assoc($secretary_qry)) {

                $id = $secretary_data["id"];
                $firstname = $secretary_data["firstname"];
                $middlename = $secretary_data["middlename"];
                $lastname = $secretary_data["lastname"];
                $party = $secretary_data["party"];
                $img = $secretary_data["img"];

                $secretary = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $secretary; ?> <br>Secretary</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img" alt="Default Image">
                    <h5 class="mt-2">Secretary</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $assistant_secretary_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Secretary' AND course='BSIT' AND status='Active' ");
        $count_assistant_secretary_qry = mysqli_num_rows($assistant_secretary_qry);

        if ($count_assistant_secretary_qry > 0) {

            while ($assistant_data = mysqli_fetch_assoc($assistant_secretary_qry)) {

                $id = $assistant_data["id"];
                $firstname = $assistant_data["firstname"];
                $middlename = $assistant_data["middlename"];
                $lastname = $assistant_data["lastname"];
                $party = $assistant_data["party"];
                $img = $assistant_data["img"];

                $assistant = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $assistant; ?> <br>Assistant Secretary</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img" alt="Default Image">
                    <h5 class="mt-2">Assistant Secretary</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Treasurer' AND course='BSIT' AND status='Active' ");
        $count_treasurer_qry = mysqli_num_rows($treasurer_qry);

        if ($count_treasurer_qry > 0) {

            while ($treasurer_data = mysqli_fetch_assoc($treasurer_qry)) {

                $id = $treasurer_data["id"];
                $firstname = $treasurer_data["firstname"];
                $middlename = $treasurer_data["middlename"];
                $lastname = $treasurer_data["lastname"];
                $party = $treasurer_data["party"];
                $img = $treasurer_data["img"];

                $treasurer = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $treasurer; ?> <br>Treasurer</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Treasurer</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $assistant_treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Treasurer' AND course='BSIT' AND status='Active' ");
        $count_assistant_treasurer_qry = mysqli_num_rows($assistant_treasurer_qry);

        if ($count_assistant_treasurer_qry > 0) {

            while ($assistant_treasurer_data = mysqli_fetch_assoc($assistant_treasurer_qry)) {

                $id = $assistant_treasurer_data["id"];
                $firstname = $assistant_treasurer_data["firstname"];
                $middlename = $assistant_treasurer_data["middlename"];
                $lastname = $assistant_treasurer_data["lastname"];
                $party = $assistant_treasurer_data["party"];
                $img = $assistant_treasurer_data["img"];

                $assistant_treasurer = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $assistant_treasurer; ?> <br>Assistant Treasurer</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Assistant Treasurer</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $auditor_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Auditor' AND course='BSIT' AND status='Active' ");
        $count_auditor_qry = mysqli_num_rows($auditor_qry);

        if ($count_auditor_qry > 0) {

            while ($auditor_data = mysqli_fetch_assoc($auditor_qry)) {

                $id = $auditor_data["id"];
                $firstname = $auditor_data["firstname"];
                $middlename = $auditor_data["middlename"];
                $lastname = $auditor_data["lastname"];
                $party = $auditor_data["party"];
                $img = $auditor_data["img"];

                $auditor = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $auditor; ?> <br>Auditor</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Auditor</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $assistant_auditor_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Auditor' AND course='BSIT' AND status='Active' ");
        $count_assistant_auditor_qry = mysqli_num_rows($assistant_auditor_qry);

        if ($count_assistant_auditor_qry > 0) {

            while ($assistant_auditor_data = mysqli_fetch_assoc($assistant_auditor_qry)) {

                $id = $assistant_auditor_data["id"];
                $firstname = $assistant_auditor_data["firstname"];
                $middlename = $assistant_auditor_data["middlename"];
                $lastname = $assistant_auditor_data["lastname"];
                $party = $assistant_auditor_data["party"];
                $img = $assistant_auditor_data["img"];

                $assistant_auditor = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $assistant_auditor; ?> <br>Assistant Auditor</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Assistant Auditor</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $pio_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='P.I.O.' AND course='BSIT' AND status='Active' ");
        $count_pio_qry = mysqli_num_rows($pio_qry);

        if ($count_pio_qry > 0) {

            while ($pio_data = mysqli_fetch_assoc($pio_qry)) {

                $id = $pio_data["id"];
                $firstname = $pio_data["firstname"];
                $middlename = $pio_data["middlename"];
                $lastname = $pio_data["lastname"];
                $party = $pio_data["party"];
                $img = $pio_data["img"];

                $pio = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $pio; ?> <br>P.I.O.</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-3 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">P.I.O.</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $business_manager_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Business Manager' AND course='BSIT' AND status='Active' ");
        $count_business_manager_qry = mysqli_num_rows($business_manager_qry);

        if ($count_business_manager_qry > 0) {

            while ($business_manager_data = mysqli_fetch_assoc($business_manager_qry)) {

                $id = $business_manager_data["id"];
                $firstname = $business_manager_data["firstname"];
                $middlename = $business_manager_data["middlename"];
                $lastname = $business_manager_data["lastname"];
                $party = $business_manager_data["party"];
                $img = $business_manager_data["img"];

                $business_manager = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $business_manager; ?> <br>Business Manager</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Business Manager</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $layout_artist_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Layout Artist' AND course='BSIT' AND status='Active' ");
        $count_layout_artist_qry = mysqli_num_rows($layout_artist_qry);

        if ($count_layout_artist_qry > 0) {

            while ($layout_artist_data = mysqli_fetch_assoc($layout_artist_qry)) {

                $id = $layout_artist_data["id"];
                $firstname = $layout_artist_data["firstname"];
                $middlename = $layout_artist_data["middlename"];
                $lastname = $layout_artist_data["lastname"];
                $party = $layout_artist_data["party"];
                $img = $layout_artist_data["img"];

                $layout_artist = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $layout_artist; ?> <br>Layout Artist</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-3 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Layout Artist</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $technical_support_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Technical Support' AND course='BSIT' AND status='Active' ");
        $count_technical_support_qry = mysqli_num_rows($technical_support_qry);

        if ($count_technical_support_qry > 0) {

            while ($technical_support_data = mysqli_fetch_assoc($technical_support_qry)) {

                $id = $technical_support_data["id"];
                $firstname = $technical_support_data["firstname"];
                $middlename = $technical_support_data["middlename"];
                $lastname = $technical_support_data["lastname"];
                $party = $technical_support_data["party"];
                $img = $technical_support_data["img"];

                $technical_support = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $technical_support; ?> <br>Technical Support</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-3 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Technical Support</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>


        <!-- <div class="row justify-content-center mt-4">
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img" alt="">
                    <h5>Technical1</h5>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img" alt="">
                    <h5>Technical2</h5>
                </div>
            </div>
        </div> -->
    </div>
</div>




<?php
include('bins/footer_plain.php');
?>