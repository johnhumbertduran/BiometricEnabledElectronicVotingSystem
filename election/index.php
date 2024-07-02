<?php
include('bins/header.php');
include('bins/navigation.php');
?>


<div class="container my-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-inline-flex align-items-center">
            <a class="">
                <img src="bins/sampleLogo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
            </a>
            <div class="mx-3">
                <span>Campus Student Council Election</span>
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-center">
            <div class="dropdown mx-3">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Party List</label>
                        <select class="form-control custom-select-border  form-select-sm" id="exampleFormControlSelect1">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="mx-3">
                <a href="#" class="text-decoration-none">Help</a>
            </div>
        </div>
    </div>
</div>


<!-- Next container -->

<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="pt-2 borderblue">
                <h2 class="text-center">Candidates</h2>
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div>

        </div>




        <div class="col-md-6 borderblue" style="max-height: 350px; overflow-y: auto;">

            <br>
            <h2 class="text-center">Vote Here</h2>

            <br>
        </div>
    </div>
    <br>
    <div class="container d-flex justify-content-between">
        <button class="button-green" type="button">Back</button>
        <button class="button-green" type="button">Submit</button>
    </div>




</div>



<?php
include('bins/footer.php');
?>