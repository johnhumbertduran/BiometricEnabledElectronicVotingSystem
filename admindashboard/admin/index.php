<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
include("../bins/connections.php");

if (isset($_SESSION["username"])) {

    $session_user = $_SESSION["username"];

    $query_info = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user'");
    $my_info = mysqli_fetch_assoc($query_info);
    $account_type = $my_info["account_type"];
    $admin_name = $my_info["firstname"];
    $admin_course = $my_info["course"];
    $electiontitle = $my_info["electiontitle"];

    if ($account_type != 2) {
        header('Location: ../../forbidden.php');
    }
} else {
    header('Location: ../');
}
?>


<div class="d-flex">
    <!-- Sidebar -->
    <?php include('bins/sidebar.php'); ?>

    <!-- Main content -->
    <div class="flex-grow-1 d-flex justify-content-center" style="margin-left: 250px; padding: 1rem; min-height: 90vh;">
        <div class="flex-fill d-flex align-items-center justify-content-center">
            <img src="../../bins/img/logo.png" class="rounded-circle" width="200px" alt="Logo">
        </div>

        <div class="flex-fill d-flex align-items-center justify-content-center">
            <h2 class="text-center"><?php echo $electiontitle; ?></h2>
        </div>
    </div>
</div>



<?php
include('bins/footer.php');
?>