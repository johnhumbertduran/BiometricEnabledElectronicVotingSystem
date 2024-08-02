<?php
session_start();
include("../bins/connections.php");
if (isset($_SESSION["username"])) {

    $session_user = $_SESSION["username"];

    $query_info = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user'");
    $my_info = mysqli_fetch_assoc($query_info);
    $account_type = $my_info["account_type"];
    $admin_name = $my_info["firstname"];
    $admin_course = $my_info["course"];
    $electiontitle = $my_info["electiontitle"];
}
?>
<div class="container">
    <div class="d-flex">

        <div class="flex-fill d-flex align-items-center justify-content-center">
            <img src="../../bins/img/logo.png" class="rounded-circle" width="200px" alt="Logo">
        </div>

        <div class="flex-fill d-flex align-items-center">
            <h2 class="text-center"><?php echo $electiontitle; ?></h2>
        </div>

    </div>
</div>