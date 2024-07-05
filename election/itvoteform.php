<?php
include('bins/header.php');
?>
<div>
    <h3>Vote here</h3>

    <div class="container col-md-6">
        <form id="registerVotersForm" method="POST" enctype="multipart/form-data">
            NOTE!: Put Biometrics after
            <hr>
            <div class="row">
                <div class="col-md-12 form-group pb-3">
                    <label for="student_no"><b>ID Number:<span style="color:red;"> *</span></b></label>
                    <input class="form-control txt_input" type="text" value="<?php echo $student_no; ?>" name="student_no" id="student_no" placeholder="ID Number" autocomplete="off" autofocus required>
                </div>

                <div class="col-md-6 form-group pb-3">
                    <label for="firstname"><b>First Name:<span style="color:red;"> *</span></b></label>
                    <input class="form-control txt_input" type="text" value="<?php echo $firstname; ?>" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" required>
                </div>

                <div class="col-md-6 form-group pb-3">
                    <label for="middlename"><b>Middle Name:<span style="color:red;"> *</span></b></label>
                    <input class="form-control txt_input" type="text" value="<?php echo $middlename; ?>" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off" required>
                </div>

                <div class="col-md-6 form-group pb-3">
                    <label for="lastname"><b>Last Name:<span style="color:red;"> *</span></b></label>
                    <input class="form-control txt_input" type="text" value="<?php echo $lastname; ?>" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required>
                </div>

                <div class="col-md-6 form-group pb-3">
                    <label for="year"><b>Year:<span style="color:red;"> *</span></b></label>
                    <input class="form-control txt_input" type="text" value="<?php echo $year; ?>" name="year" id="year" placeholder="Year" autocomplete="off" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="course"><b>Course:<span style="color:red;"> *</span></b></label>
                    <input class="form-control txt_input" type="text" value="<?php echo $course; ?>" name="course" id="course" placeholder="Course" autocomplete="off" required>
                </div>

                <div class="col-md-6 form-group pt-4">
                    <input style="float:right;" class="button-green" type="submit" name="submit" value="Save">
                </div>
            </div>
            <hr>
        </form>
    </div>
</div>

<?php
include('bins/footer_plain.php');
?>