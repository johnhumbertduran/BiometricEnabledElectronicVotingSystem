<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
include("bins/connections.php");

$session_user = $session_pass = "";
// Set the time zone
date_default_timezone_set('Asia/Manila');

$date_now = date("m/d/Y");
$time_now = date("h:i a");

if (isset($_SESSION["username"])) {

    $session_user = $_SESSION["username"];
    $check_account_type = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user'");
    $get_account_type = mysqli_fetch_assoc($check_account_type);
    $account_type = $get_account_type["account_type"];

    if ($account_type == 1) {

        header('Location: superadmin/');
    } elseif ($account_type == 2) {

        header('Location: admin/');
    }
}


// Log in Here
if (isset($_POST["login"])) {


    if (empty($_POST["password"]) && empty($_POST["username"])) {
        echo "<script>alert('User Name and Password are empty');</script>";
    } else {

        if (empty($_POST["username"])) {
            echo "<script>alert('User Name is empty');</script>";
        } else {
            $session_user = $_POST["username"];
        }

        if (empty($_POST["password"])) {
            echo "<script>alert('Password is empty');</script>";
        } else {
            $session_pass = $_POST["password"];
        }
    }





    if ($session_user && $session_pass) {

        $userCheck = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user' ");
        $userRow = mysqli_num_rows($userCheck);

        if ($userRow > 0) {

            $fetch = mysqli_fetch_assoc($userCheck);
            $db_pass = $fetch["password"];

            $account_type = $fetch["account_type"];

            if ($account_type == "1") {


                if ($db_pass == $session_pass) {

                    $_SESSION["username"] = $session_user;

                    header('Location: superadmin/');
                } else {

                    $session_pass = "";
                    echo "<script>alert('Your Password is incorrect!');</script>";
                }
            } elseif ($account_type == "2") {

                if ($db_pass == $session_pass) {

                    $_SESSION["username"] = $session_user;

                    header('Location: admin/');
                } else {

                    $session_pass = "";
                    echo "<script>alert('Your Password is incorrect!');</script>";
                }
            }
        } else {

            $session_user = "";
            echo "<script>alert('Sorry, the Username you entered is not registered.');</script>";
        }
    }
}

?>
<style>
    .full-height {
        height: 60vh;
    }

    .borderblue {
        border: 1px solid blue;
        border-radius: 10px;
        /* Example border style */
    }

    .flex-column {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
</style>

<br>

<h2 class="text-center">Login</h2>
<br>
<div class="container d-flex align-items-center justify-content-center">
    <!-- <div class="row d-flex align-items-stretch equal-height justify-content-center w-100"> -->
    <!-- <div class="col-md-5 borderblue flex-column">
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
        </div> -->

    <!-- Spacer -->
    <!-- <div class="col-md-1"></div> -->

    <div class="col-md-5 borderblue flex-column full-height">

        <center>
            <img src="../bins/img/wvsulogo.png" alt="Western Visayas State University Logo" width="100px">

            <h5 class="mt-3">Western Visayas State University </br> Himalayan Campus</h5>
        </center>

        <br>
        <form method="POST">
            <div class="container col-8">
                <div class="row">
                    <div class="input-group mb-3 col-12">
                        <span class="input-group-text">Username</span>
                        <input type="text" class="form-control" name="username" autocomplete="off" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3 col-12">
                        <span class="input-group-text">Password</span>
                        <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password" required>
                    </div>
                </div>
                <input type="submit" class="button-blue" name="login" value="Login">
            </div>
        </form>
    </div>
</div>


<br>
<br>
<br>

<?php
include('bins/footer.php');
?>