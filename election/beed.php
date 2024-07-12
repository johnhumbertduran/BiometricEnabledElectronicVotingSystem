<?php
include('bins/header.php');
include("../admindashboard/bins/connections.php");
?>
<div class="container">
    <br>
    <h3 class="text-center">Young Educators' League</h3>
    <br>
    <div class="row d-flex">
        <!-- <div class=" text-center">
            <div class="candidate-img">
                <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img" alt="Default Image">
                <h5 class="mt-2">President</h5>
            </div>
        </div> -->

        <hr>

        <?php
        $president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='President' AND course='BSED' AND status='Active' ");
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
        $vice_president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Vice President ' AND course='BSED' AND status='Active' ");
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
        $secretary_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Secretary' AND course='BSED' AND status='Active' ");
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
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Secretary</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Treasurer' AND course='BSED' AND status='Active' ");
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
        $assistant_treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Treasurer' AND course='BSED' AND status='Active' ");
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
        $auditor_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Auditor' AND course='BSED' AND status='Active' ");
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
        $pio_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='P.I.O.' AND course='BSED' AND status='Active' ");
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
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
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
            <div class="col-md-6 text-center">
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
        $business_manager_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Business Manager' AND course='BSED' AND status='Active' ");
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
        $assistant_business_manager_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Assistant Business Manager' AND course='BSED' AND status='Active' ");
        $count_assistant_business_manager_qry = mysqli_num_rows($assistant_business_manager_qry);

        if ($count_assistant_business_manager_qry > 0) {

            while ($assistant_business_manager_data = mysqli_fetch_assoc($assistant_business_manager_qry)) {

                $id = $assistant_business_manager_data["id"];
                $firstname = $assistant_business_manager_data["firstName"];
                $middlename = $assistant_business_manager_data["middleName"];
                $lastname = $assistant_business_manager_data["lastName"];
                $party = $assistant_business_manager_data["party"];
                $img = $assistant_business_manager_data["img"];

                $assistant_business_manager = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $assistant_business_manager; ?> <br>Assistant Business Manager</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Assistant Business Manager</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $first_year_representative_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='First Year Representative' AND course='BSED' AND status='Active' ");
        $count_first_year_representative_qry = mysqli_num_rows($first_year_representative_qry);

        if ($count_first_year_representative_qry > 0) {

            while ($first_year_representative_data = mysqli_fetch_assoc($first_year_representative_qry)) {

                $id = $first_year_representative_data["id"];
                $firstname = $first_year_representative_data["firstName"];
                $middlename = $first_year_representative_data["middleName"];
                $lastname = $first_year_representative_data["lastName"];
                $party = $first_year_representative_data["party"];
                $img = $first_year_representative_data["img"];

                $first_year_representative = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $first_year_representative; ?> <br>First Year Representative</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">First Year Representative</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $second_year_representative_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Second Year Representative' AND course='BSED' AND status='Active' ");
        $count_second_year_representative_qry = mysqli_num_rows($second_year_representative_qry);

        if ($count_second_year_representative_qry > 0) {

            while ($second_year_representative_data = mysqli_fetch_assoc($second_year_representative_qry)) {

                $id = $second_year_representative_data["id"];
                $firstname = $second_year_representative_data["firstName"];
                $middlename = $second_year_representative_data["middleName"];
                $lastname = $second_year_representative_data["lastName"];
                $party = $second_year_representative_data["party"];
                $img = $second_year_representative_data["img"];

                $second_year_representative = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $second_year_representative; ?> <br>Second Year Representative</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Second Year Representative</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $third_year_representative_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Third Year Representative' AND course='BSED' AND status='Active' ");
        $count_third_year_representative_qry = mysqli_num_rows($third_year_representative_qry);

        if ($count_third_year_representative_qry > 0) {

            while ($third_year_representative_data = mysqli_fetch_assoc($third_year_representative_qry)) {

                $id = $third_year_representative_data["id"];
                $firstname = $third_year_representative_data["firstName"];
                $middlename = $third_year_representative_data["middleName"];
                $lastname = $third_year_representative_data["lastName"];
                $party = $third_year_representative_data["party"];
                $img = $third_year_representative_data["img"];

                $third_year_representative = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $third_year_representative; ?> <br>Third Year Representative</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Third Year Representative</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $fourth_year_representative_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Fourth Year Representative' AND course='BSED' AND status='Active' ");
        $count_fourth_year_representative_qry = mysqli_num_rows($fourth_year_representative_qry);

        if ($count_fourth_year_representative_qry > 0) {

            while ($fourth_year_representative_data = mysqli_fetch_assoc($fourth_year_representative_qry)) {

                $id = $fourth_year_representative_data["id"];
                $firstname = $fourth_year_representative_data["firstName"];
                $middlename = $fourth_year_representative_data["middleName"];
                $lastname = $fourth_year_representative_data["lastName"];
                $party = $fourth_year_representative_data["party"];
                $img = $fourth_year_representative_data["img"];

                $fourth_year_representative = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $fourth_year_representative; ?> <br>Fourth Year Representative</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Fourth Year Representative</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

    </div>
</div>




<?php
include('bins/footer_plain.php');
?>