<?php
include('bins/header.php');
?>
<div class="container">
    <br>
    <h3 class="text-center">KamFil</h3>
    <br>
    <div class="row d-flex">

        <hr>

        <?php
        $pangulo_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Pangulo' AND course='Filipino' AND status='Active' ");
        $count_pangulo_qry = mysqli_num_rows($pangulo_qry);

        if ($count_pangulo_qry > 0) {

            while ($pangulo_data = mysqli_fetch_assoc($pangulo_qry)) {

                $id = $pangulo_data["id"];
                $firstname = $pangulo_data["firstname"];
                $middlename = $pangulo_data["middlename"];
                $lastname = $pangulo_data["lastname"];
                $party = $pangulo_data["party"];
                $img = $pangulo_data["img"];

                $pangulo = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $pangulo; ?> <br>Pangulo</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Pangulo</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $pangalawang_pangulo_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Pangalawang Pangulo' AND course='Filipino' AND status='Active' ");
        $count_pangalawang_pangulo_qry = mysqli_num_rows($pangalawang_pangulo_qry);

        if ($count_pangalawang_pangulo_qry > 0) {

            while ($pangalawang_pangulo_data = mysqli_fetch_assoc($pangalawang_pangulo_qry)) {

                $id = $pangalawang_pangulo_data["id"];
                $firstname = $pangalawang_pangulo_data["firstname"];
                $middlename = $pangalawang_pangulo_data["middlename"];
                $lastname = $pangalawang_pangulo_data["lastname"];
                $party = $pangalawang_pangulo_data["party"];
                $img = $pangalawang_pangulo_data["img"];

                $pangalawang_pangulo = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $pangalawang_pangulo; ?> <br>Pangalawang Pangulo</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Pangalawang Pangulo</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $kalihim_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Kalihim' AND course='Filipino' AND status='Active' ");
        $count_kalihim_qry = mysqli_num_rows($kalihim_qry);

        if ($count_kalihim_qry > 0) {

            while ($kalihim_data = mysqli_fetch_assoc($kalihim_qry)) {

                $id = $kalihim_data["id"];
                $firstname = $kalihim_data["firstname"];
                $middlename = $kalihim_data["middlename"];
                $lastname = $kalihim_data["lastname"];
                $party = $kalihim_data["party"];
                $img = $kalihim_data["img"];

                $kalihim = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $kalihim; ?> <br>Kalihim</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Kalihim</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $ikalawang_kalihim_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Ikalawang Kalihim' AND course='Filipino' AND status='Active' ");
        $count_ikalawang_kalihim_qry = mysqli_num_rows($ikalawang_kalihim_qry);

        if ($count_ikalawang_kalihim_qry > 0) {

            while ($ikalawang_kalihim_data = mysqli_fetch_assoc($ikalawang_kalihim_qry)) {

                $id = $ikalawang_kalihim_data["id"];
                $firstname = $ikalawang_kalihim_data["firstname"];
                $middlename = $ikalawang_kalihim_data["middlename"];
                $lastname = $ikalawang_kalihim_data["lastname"];
                $party = $ikalawang_kalihim_data["party"];
                $img = $ikalawang_kalihim_data["img"];

                $ikalawang_kalihim = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $ikalawang_kalihim; ?> <br>Ikalawang Kalihim</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Ikalawang Kalihim</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $taga_ingat_yaman_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Taga-ingat Yaman' AND course='Filipino' AND status='Active' ");
        $count_taga_ingat_yaman_qry = mysqli_num_rows($taga_ingat_yaman_qry);

        if ($count_taga_ingat_yaman_qry > 0) {

            while ($taga_ingat_yaman_data = mysqli_fetch_assoc($taga_ingat_yaman_qry)) {

                $id = $taga_ingat_yaman_data["id"];
                $firstname = $taga_ingat_yaman_data["firstname"];
                $middlename = $taga_ingat_yaman_data["middlename"];
                $lastname = $taga_ingat_yaman_data["lastname"];
                $party = $taga_ingat_yaman_data["party"];
                $img = $taga_ingat_yaman_data["img"];

                $taga_ingat_yaman = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $taga_ingat_yaman; ?> <br>Taga-ingat Yaman</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Taga-ingat Yaman</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $ikalawang_taga_ingat_yaman_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Ikalawang Taga-ingat Yaman' AND course='Filipino' AND status='Active' ");
        $count_ikalawang_taga_ingat_yaman_qry = mysqli_num_rows($ikalawang_taga_ingat_yaman_qry);

        if ($count_ikalawang_taga_ingat_yaman_qry > 0) {

            while ($ikalawang_taga_ingat_yaman_data = mysqli_fetch_assoc($ikalawang_taga_ingat_yaman_qry)) {

                $id = $ikalawang_taga_ingat_yaman_data["id"];
                $firstname = $ikalawang_taga_ingat_yaman_data["firstname"];
                $middlename = $ikalawang_taga_ingat_yaman_data["middlename"];
                $lastname = $ikalawang_taga_ingat_yaman_data["lastname"];
                $party = $ikalawang_taga_ingat_yaman_data["party"];
                $img = $ikalawang_taga_ingat_yaman_data["img"];

                $ikalawang_taga_ingat_yaman = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $ikalawang_taga_ingat_yaman; ?> <br>Ikalawang Taga-ingat Yaman</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Ikalawang Taga-ingat Yaman</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $tagasuri_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Tagasuri' AND course='Filipino' AND status='Active' ");
        $count_tagasuri_qry = mysqli_num_rows($tagasuri_qry);

        if ($count_tagasuri_qry > 0) {

            while ($tagasuri_data = mysqli_fetch_assoc($tagasuri_qry)) {

                $id = $tagasuri_data["id"];
                $firstname = $tagasuri_data["firstname"];
                $middlename = $tagasuri_data["middlename"];
                $lastname = $tagasuri_data["lastname"];
                $party = $tagasuri_data["party"];
                $img = $tagasuri_data["img"];

                $tagasuri = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $tagasuri; ?> <br>Tagasuri</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Tagasuri</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $ikalawang_tagasuri_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Ikalawang Tagasuri' AND course='Filipino' AND status='Active' ");
        $count_ikalawang_tagasuri_qry = mysqli_num_rows($ikalawang_tagasuri_qry);

        if ($count_ikalawang_tagasuri_qry > 0) {

            while ($ikalawang_tagasuri_data = mysqli_fetch_assoc($ikalawang_tagasuri_qry)) {

                $id = $ikalawang_tagasuri_data["id"];
                $firstname = $ikalawang_tagasuri_data["firstname"];
                $middlename = $ikalawang_tagasuri_data["middlename"];
                $lastname = $ikalawang_tagasuri_data["lastname"];
                $party = $ikalawang_tagasuri_data["party"];
                $img = $ikalawang_tagasuri_data["img"];

                $ikalawang_tagasuri = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $ikalawang_tagasuri; ?> <br>Ikalawang Tagasuri</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Ikalawang Tagasuri</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $taga_pamalita_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Taga Pamalita' AND course='Filipino' AND status='Active' ");
        $count_taga_pamalita_qry = mysqli_num_rows($taga_pamalita_qry);

        if ($count_taga_pamalita_qry > 0) {

            while ($taga_pamalita_data = mysqli_fetch_assoc($taga_pamalita_qry)) {

                $id = $taga_pamalita_data["id"];
                $firstname = $taga_pamalita_data["firstname"];
                $middlename = $taga_pamalita_data["middlename"];
                $lastname = $taga_pamalita_data["lastname"];
                $party = $taga_pamalita_data["party"];
                $img = $taga_pamalita_data["img"];

                $taga_pamalita = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $taga_pamalita; ?> <br>Taga Pamalita</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Taga Pamalita</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $ikalawang_taga_pamalita_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Ikalawang Taga Pamalita' AND course='Filipino' AND status='Active' ");
        $count_ikalawang_taga_pamalita_qry = mysqli_num_rows($ikalawang_taga_pamalita_qry);

        if ($count_ikalawang_taga_pamalita_qry > 0) {

            while ($ikalawang_taga_pamalita_data = mysqli_fetch_assoc($ikalawang_taga_pamalita_qry)) {

                $id = $ikalawang_taga_pamalita_data["id"];
                $firstname = $ikalawang_taga_pamalita_data["firstname"];
                $middlename = $ikalawang_taga_pamalita_data["middlename"];
                $lastname = $ikalawang_taga_pamalita_data["lastname"];
                $party = $ikalawang_taga_pamalita_data["party"];
                $img = $ikalawang_taga_pamalita_data["img"];

                $ikalawang_taga_pamalita = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $ikalawang_taga_pamalita; ?> <br>Ikalawang Taga Pamalita</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Ikalawang Taga Pamalita</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $tagapangalakal_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Tagapangalakal' AND course='Filipino' AND status='Active' ");
        $count_tagapangalakal_qry = mysqli_num_rows($tagapangalakal_qry);

        if ($count_tagapangalakal_qry > 0) {

            while ($tagapangalakal_data = mysqli_fetch_assoc($tagapangalakal_qry)) {

                $id = $tagapangalakal_data["id"];
                $firstname = $tagapangalakal_data["firstname"];
                $middlename = $tagapangalakal_data["middlename"];
                $lastname = $tagapangalakal_data["lastname"];
                $party = $tagapangalakal_data["party"];
                $img = $tagapangalakal_data["img"];

                $tagapangalakal = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $tagapangalakal; ?> <br>Tagapangalakal</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Tagapangalakal</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $ikalawang_tagapangalakal_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Ikalawang Tagapangalakal' AND course='Filipino' AND status='Active' ");
        $count_ikalawang_tagapangalakal_qry = mysqli_num_rows($ikalawang_tagapangalakal_qry);

        if ($count_ikalawang_tagapangalakal_qry > 0) {

            while ($ikalawang_tagapangalakal_data = mysqli_fetch_assoc($ikalawang_tagapangalakal_qry)) {

                $id = $ikalawang_tagapangalakal_data["id"];
                $firstname = $ikalawang_tagapangalakal_data["firstname"];
                $middlename = $ikalawang_tagapangalakal_data["middlename"];
                $lastname = $ikalawang_tagapangalakal_data["lastname"];
                $party = $ikalawang_tagapangalakal_data["party"];
                $img = $ikalawang_tagapangalakal_data["img"];

                $ikalawang_tagapangalakal = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $ikalawang_tagapangalakal; ?> <br>Ikalawang Tagapangalakal</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Ikalawang Tagapangalakal</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $unang_kinatawan_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Unang Kinatawan' AND course='Filipino' AND status='Active' ");
        $count_unang_kinatawan_qry = mysqli_num_rows($unang_kinatawan_qry);

        if ($count_unang_kinatawan_qry > 0) {

            while ($unang_kinatawan_data = mysqli_fetch_assoc($unang_kinatawan_qry)) {

                $id = $unang_kinatawan_data["id"];
                $firstname = $unang_kinatawan_data["firstname"];
                $middlename = $unang_kinatawan_data["middlename"];
                $lastname = $unang_kinatawan_data["lastname"];
                $party = $unang_kinatawan_data["party"];
                $img = $unang_kinatawan_data["img"];

                $unang_kinatawan = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $unang_kinatawan; ?> <br>Unang Kinatawan</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Unang Kinatawan</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $ikalawang_kinatawan_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Ikalawang Kinatawan' AND course='Filipino' AND status='Active' ");
        $count_ikalawang_kinatawan_qry = mysqli_num_rows($ikalawang_kinatawan_qry);

        if ($count_ikalawang_kinatawan_qry > 0) {

            while ($ikalawang_kinatawan_data = mysqli_fetch_assoc($ikalawang_kinatawan_qry)) {

                $id = $ikalawang_kinatawan_data["id"];
                $firstname = $ikalawang_kinatawan_data["firstname"];
                $middlename = $ikalawang_kinatawan_data["middlename"];
                $lastname = $ikalawang_kinatawan_data["lastname"];
                $party = $ikalawang_kinatawan_data["party"];
                $img = $ikalawang_kinatawan_data["img"];

                $ikalawang_kinatawan = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $ikalawang_kinatawan; ?> <br>Ikalawang Kinatawan</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Ikalawang Kinatawan</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $ikatlong_kinatawan_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Ikatlong Kinatawan' AND course='Filipino' AND status='Active' ");
        $count_ikatlong_kinatawan_qry = mysqli_num_rows($ikatlong_kinatawan_qry);

        if ($count_ikatlong_kinatawan_qry > 0) {

            while ($ikatlong_kinatawan_data = mysqli_fetch_assoc($ikatlong_kinatawan_qry)) {

                $id = $ikatlong_kinatawan_data["id"];
                $firstname = $ikatlong_kinatawan_data["firstname"];
                $middlename = $ikatlong_kinatawan_data["middlename"];
                $lastname = $ikatlong_kinatawan_data["lastname"];
                $party = $ikatlong_kinatawan_data["party"];
                $img = $ikatlong_kinatawan_data["img"];

                $ikatlong_kinatawan = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $ikatlong_kinatawan; ?> <br>Ikatlong Kinatawan</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Ikatlong Kinatawan</h5>
                </div>
            </div>
        <?php
        }
        ?>

        <hr>

        <?php
        $ikaapat_na_kinatawan_qry = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE position='Ikaapat na Kinatawan' AND course='Filipino' AND status='Active' ");
        $count_ikaapat_na_kinatawan_qry = mysqli_num_rows($ikaapat_na_kinatawan_qry);

        if ($count_ikaapat_na_kinatawan_qry > 0) {

            while ($ikaapat_na_kinatawan_data = mysqli_fetch_assoc($ikaapat_na_kinatawan_qry)) {

                $id = $ikaapat_na_kinatawan_data["id"];
                $firstname = $ikaapat_na_kinatawan_data["firstname"];
                $middlename = $ikaapat_na_kinatawan_data["middlename"];
                $lastname = $ikaapat_na_kinatawan_data["lastname"];
                $party = $ikaapat_na_kinatawan_data["party"];
                $img = $ikaapat_na_kinatawan_data["img"];

                $ikaapat_na_kinatawan = ucfirst($firstname) . " " . ucfirst($middlename[0]) . ". " . ucfirst($lastname);

                $img_dir = substr($img, 3);

        ?>
                <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
                    <div class="candidate-img">
                        <h6><?php echo $party; ?></h6>
                        <img src="<?php echo $img_dir; ?>" class="default-img rounded-circle" alt="<?php echo $img_dir; ?>">
                        <p class="mt-2"><?php echo $ikaapat_na_kinatawan; ?> <br>Ikaapat na Kinatawan</p>
                    </div>
                </div>
            <?php
            }
        } else {

            ?>
            <div class="col-md-6 text-center">
                <div class="candidate-img">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="default-img rounded-circle" alt="Default Image">
                    <h5 class="mt-2">Ikaapat na Kinatawan</h5>
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