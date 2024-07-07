<?php
// Set the time zone
date_default_timezone_set('Asia/Manila');

$date_now = date("m/d/Y");
$time_now = date("h:i a");
?>
<nav class="navbar navbar-expand-sm navbar-dark bgmainblue">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)"><img src="bins/img/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <div class="navbar-nav me-auto text-white">
                WVSU - HCC Chain Vote <br>
                West Visayas State University Himalayan City Campus
            </div>

            <div class="d-flex text-white">
                Time: <?php echo $date_now; ?><br>
                Date: <?php echo $time_now; ?>
            </div>

        </div>
    </div>
</nav>