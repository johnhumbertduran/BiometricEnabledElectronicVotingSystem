<?php
include('bins/header.php');
include('bins/navigation.php');

// Set the time zone
date_default_timezone_set('Asia/Manila');

$date_now = date("m/d/Y");
$time_now = date("h:i a");

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
                                <input type="text" class="form-control" placeholder="Please input your ID Number">
                            </div>
                        </div>
                        <input type="submit" class="button-blue" name="login" value="Login">
                        <div class="container textred">
                            <p><span class="textredbold">Note: </span><br> - Please check ID Number <br> - You can only vote once</p>
                        </div>
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