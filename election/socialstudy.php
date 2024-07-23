<?php
include('bins/header.php');
?>
<div class="container">
    <br>
    <h3 class="text-center">Social Studies</h3>
    <br>
    <div class="row d-flex">

        <hr>

        <?php
        $president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='President' AND course='Social Study' AND status='Active' ");
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
        $vice_president_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Vice President' AND course='Social Study' AND status='Active' ");
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
        $secretary_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Secretary' AND course='Social Study' AND status='Active' ");
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
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Secretary</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $treasurer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Treasurer' AND course='Social Study' AND status='Active' ");
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
        $auditor_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Auditor' AND course='Social Study' AND status='Active' ");
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
        $pio_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Public Information Officer' AND course='Social Study' AND status='Active' ");
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
                        <p class="mt-2"><?php echo $pio; ?> <br>Public Information Officer</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Public Information Officer</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $business_manager_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Business Manager' AND course='Social Study' AND status='Active' ");
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
                <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
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
        $peace_officer_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Peace Officer' AND course='Social Study' AND status='Active' ");
        $count_peace_officer_qry = mysqli_num_rows($peace_officer_qry);

        if ($count_peace_officer_qry > 0) {

            while ($peace_officer_data = mysqli_fetch_assoc($peace_officer_qry)) {

                $id = $peace_officer_data["id"];
                $firstname = $peace_officer_data["firstname"];
                $middlename = $peace_officer_data["middlename"];
                $lastname = $peace_officer_data["lastname"];
                $party = $peace_officer_data["party"];
                $img = $peace_officer_data["img"];

                $peace_officer = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $peace_officer; ?> <br>Peace Officer</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Peace Officer</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $escort_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Escort' AND course='Social Study' AND status='Active' ");
        $count_escort_qry = mysqli_num_rows($escort_qry);

        if ($count_escort_qry > 0) {

            while ($escort_data = mysqli_fetch_assoc($escort_qry)) {

                $id = $escort_data["id"];
                $firstname = $escort_data["firstname"];
                $middlename = $escort_data["middlename"];
                $lastname = $escort_data["lastname"];
                $party = $escort_data["party"];
                $img = $escort_data["img"];

                $escort = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $escort; ?> <br>Escort</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Escort</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $muse_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Muse' AND course='Social Study' AND status='Active' ");
        $count_muse_qry = mysqli_num_rows($muse_qry);

        if ($count_muse_qry > 0) {

            while ($muse_data = mysqli_fetch_assoc($muse_qry)) {

                $id = $muse_data["id"];
                $firstname = $muse_data["firstname"];
                $middlename = $muse_data["middlename"];
                $lastname = $muse_data["lastname"];
                $party = $muse_data["party"];
                $img = $muse_data["img"];

                $muse = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $muse; ?> <br>Muse</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Muse</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $first_year_representative_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='First Year Representative ' AND course='Social Study' AND status='Active' ");
        $count_first_year_representative_qry = mysqli_num_rows($first_year_representative_qry);

        if ($count_first_year_representative_qry > 0) {

            while ($first_year_representative_data = mysqli_fetch_assoc($first_year_representative_qry)) {

                $id = $first_year_representative_data["id"];
                $firstname = $first_year_representative_data["firstname"];
                $middlename = $first_year_representative_data["middlename"];
                $lastname = $first_year_representative_data["lastname"];
                $party = $first_year_representative_data["party"];
                $img = $first_year_representative_data["img"];

                $first_year_representative = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $first_year_representative; ?> <br>First Year Representative </p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">First Year Representative </h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $second_year_representative_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Second Year Representative ' AND course='Social Study' AND status='Active' ");
        $count_second_year_representative_qry = mysqli_num_rows($second_year_representative_qry);

        if ($count_second_year_representative_qry > 0) {

            while ($second_year_representative_data = mysqli_fetch_assoc($second_year_representative_qry)) {

                $id = $second_year_representative_data["id"];
                $firstname = $second_year_representative_data["firstname"];
                $middlename = $second_year_representative_data["middlename"];
                $lastname = $second_year_representative_data["lastname"];
                $party = $second_year_representative_data["party"];
                $img = $second_year_representative_data["img"];

                $second_year_representative = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $second_year_representative; ?> <br>Second Year Representative </p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Second Year Representative </h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $third_year_representative_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Third Year Representative ' AND course='Social Study' AND status='Active' ");
        $count_third_year_representative_qry = mysqli_num_rows($third_year_representative_qry);

        if ($count_third_year_representative_qry > 0) {

            while ($third_year_representative_data = mysqli_fetch_assoc($third_year_representative_qry)) {

                $id = $third_year_representative_data["id"];
                $firstname = $third_year_representative_data["firstname"];
                $middlename = $third_year_representative_data["middlename"];
                $lastname = $third_year_representative_data["lastname"];
                $party = $third_year_representative_data["party"];
                $img = $third_year_representative_data["img"];

                $third_year_representative = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $third_year_representative; ?> <br>Third Year Representative </p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Third Year Representative </h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $fourth_year_representative_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Fourth Year Representative ' AND course='Social Study' AND status='Active' ");
        $count_fourth_year_representative_qry = mysqli_num_rows($fourth_year_representative_qry);

        if ($count_fourth_year_representative_qry > 0) {

            while ($fourth_year_representative_data = mysqli_fetch_assoc($fourth_year_representative_qry)) {

                $id = $fourth_year_representative_data["id"];
                $firstname = $fourth_year_representative_data["firstname"];
                $middlename = $fourth_year_representative_data["middlename"];
                $lastname = $fourth_year_representative_data["lastname"];
                $party = $fourth_year_representative_data["party"];
                $img = $fourth_year_representative_data["img"];

                $fourth_year_representative = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $fourth_year_representative; ?> <br>Fourth Year Representative </p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Fourth Year Representative </h5>
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