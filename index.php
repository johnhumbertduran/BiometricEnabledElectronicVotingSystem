<?php
include('bins/header.php');
include('bins/navigation.php');

// Set the time zone
date_default_timezone_set('Asia/Manila');

$date_now = date("m/d/Y");
$time_now = date("h:i a");

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

            <br>
            <div class="container col-8">
                <div class="row">
                    <div class="input-group mb-3 col-2">
                        <span class="input-group-text">ID Number</span>
                        <input type="text" class="form-control" placeholder="Please input your ID Number">
                    </div>
                </div>
                <br>
                <button type="submit" class="button-blue text-white">Login</button>

                <br>
                <br>
                <div class="container textred">
                    <p><span class="textredbold">Note: </span><br> - Please check ID Number <br> - You can only vote once</p>
                </div>
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