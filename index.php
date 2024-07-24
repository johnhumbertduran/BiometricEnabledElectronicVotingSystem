<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
include("admindashboard/bins/connections.php");

// Set the time zone
date_default_timezone_set('Asia/Manila');

$date_now = date("m/d/Y");
$time_now = date("h:i a");

$session_id_number = "";

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
}

if (isset($_POST['login'])) {
    // echo 'clicked';

    if (!empty($_POST["idnumber"])) {
        $session_id_number = $_POST["idnumber"];
    }

    if ($session_id_number) {
        $voterCheck = mysqli_query($connections, "SELECT * FROM voterstbl WHERE idnumber='$session_id_number' ");

        $voterRow = mysqli_num_rows($voterCheck);

        if ($voterRow > 0) {
            $fetch_voter = mysqli_fetch_assoc($voterCheck);
            $fetch_voter_status = $fetch_voter["status"];

            if ($fetch_voter_status == "0") {
                $_SESSION["idnumber"] = $session_id_number;
                header('Location: election/');
            } else {
                $session_id_number = "";
                echo "<script>alert('You can only vote once');</script>";
            }
        } else {
            $session_id_number = "";
            echo "<script>alert('Please check ID Number');</script>";
        }
    }
    // echo $idnumber;
}

?>

<style>
    .full-height {
        height: 70vh;
    }

    .borderblue {
        border: 1px solid blue;
        /* Example border style */
    }

    .flex-column {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
</style>


<br>



<div class="container d-flex align-items-center justify-content-center full-height">
    <div class="row d-flex align-items-stretch equal-height justify-content-center w-100">
        <div class="col-md-5 borderblue flex-column">
            <div class="row flex-grow-1">
                <div class="col-md-6 px-3 py-3">
                    <h2>Mission</h2>
                    <p>"WVSU COMMITS TO DEVELOP LIFE-LONG LEARNERS EMPOWERED TO GENERATE KNOWLEDGE AND TECHNOLOGY, AND TRANSFORM COMMUNITIES AS AGENTS OF CHANGE"</p>
                </div>
                <div class="col-md-6 px-3 py-3">
                    <h2>Vision</h2>
                    <p>"A RESEARCH UNIVERSITY ADVANCING QUALITY EDUCATION TOWARDS SOCIETAL TRANSFORMATION AND GLOBAL RECOGNITION"</p>
                </div>
            </div>
        </div>

        <!-- Spacer -->
        <div class="col-md-1"></div>

        <div class="col-md-5 borderblue flex-column">
            <div>
                <h2 class="text-center">Login</h2>
                <br>
                <form method="POST">
                    <div class="container col-10">
                        <div class="row">
                            <div class="input-group mb-3 col-2">
                                <span class="input-group-text">ID Number</span>
                                <input type="text" name="idnumber" class="form-control" value="<?php echo $session_id_number; ?>" placeholder="Please input your ID Number" required autocomplete="off">
                            </div>
                        </div>
                        <input type="submit" name="login" value="Login" class="button-blue">
                        <!-- <div class="container textred">
                            <p><span class="textredbold">Note: </span><br> - Please check ID Number <br> - You can only vote once</p>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<br>
<br>
<br>

<?php
include('bins/footer.php');
?>