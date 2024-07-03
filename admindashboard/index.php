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
            echo "<script>alert('Sorry, the User Name you entered is not registered.');</script>";
        }
    }
}

?>

<br>
<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="pt-2 borderblue">
                <h2 class="text-center">Logo of All Organization</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="bins/sampleLogo.png" class="img-fluid" alt="Logo 1">
                        </div>
                        <div class="col-md-3">
                            <img src="bins/sampleLogo.png" class="img-fluid" alt="Logo 2">
                        </div>
                        <div class="col-md-3">
                            <img src="bins/sampleLogo.png" class="img-fluid" alt="Logo 3">
                        </div>
                        <div class="col-md-3">
                            <img src="bins/sampleLogo.png" class="img-fluid" alt="Logo 4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="bins/sampleLogo.png" class="img-fluid" alt="Logo 5">
                        </div>
                        <div class="col-md-3">
                            <img src="bins/sampleLogo.png" class="img-fluid" alt="Logo 6">
                        </div>
                        <div class="col-md-3">
                            <img src="bins/sampleLogo.png" class="img-fluid" alt="Logo 7">
                        </div>
                        <div class="col-md-3">
                            <img src="bins/sampleLogo.png" class="img-fluid" alt="Logo 8">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="container pt-2 mt-2 borderblue">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Mission</h2>
                            <p>"WVSU COMMITS TO DEVELOP LIFE-LONG LEARNERS EMPOWERED TO GENERATE KNOWLEDGE AND TECHNOLOGY, AND TRANSFORM COMMUNITIES AS AGENTS OF CHANGE"</p>
                        </div>
                        <div class="col-md-6">
                            <h2>Vision</h2>
                            <p>"A RESEARCH UNIVERSITY ADVANCING QUALITY EDUCATION TOWARDS SOCIETAL TRANSFORMATION AND GLOBAL RECOGNITION"</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-md-6 borderblue" style="max-height: 350px; overflow-y: auto;">

            <br>
            <h2 class="text-center">Login</h2>
            <form method="POST">
                <br>
                <div class="container col-8">
                    <div class="row">
                        <div class="input-group mb-3 col-2">
                            <span class="input-group-text">Username</span>
                            <input type="text" class="form-control" value="<?php echo $session_user; ?>" name="username" autocomplete="off" placeholder="Username" required>
                        </div>
                        <div class="input-group mb-3 col-2">
                            <span class="input-group-text">Password</span>
                            <input type="password" class="form-control" value="<?php echo $session_pass; ?>" name="password" autocomplete="off" placeholder="Password" required>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="button-blue text-white" name="login" value="Login">
            </form>
            <br>
            <br>
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