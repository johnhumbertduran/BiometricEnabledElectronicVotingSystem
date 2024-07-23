<?php
session_start();
include("../bins/connections.php");

if (isset($_SESSION["username"])) {

    $session_user = $_SESSION["username"];

    $query_info = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user'");
    $my_info = mysqli_fetch_assoc($query_info);
    $admin_id = $my_info["id"];
    $account_type = $my_info["account_type"];
    $admin_first_name = $my_info["firstname"];
    $admin_last_name = $my_info["lastname"];
    $admin_course = $my_info["course"];


    $admin_name = $admin_first_name . " " . $admin_last_name;

    if ($account_type != 1) {
        header('Location: ../../forbidden.php');
    }
} else {

    header('Location: ../');
}
?>
<div class="container col-md-6">

    <form method="POST">
        <table border="0" width="100%">
            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>
            <!-- <p>dash sa input butangan dahil sa validation</p> -->
            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="student_no">Student ID:</label></b></td>
                    <td colspan="3"><input class="form-control txt_input" type="text" value="" name="student_no" class="warningColor" id="student_no" autocomplete="off" disabled></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="firstname">First Name:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control txt_input" type="text" value="" name="firstname" class="err" id="firstname" placeholder="First Name" autocomplete="off" required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="middlename">Middle Name:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control txt_input" type="text" value="" name="middlename" class="err" id="middlename" placeholder="Middle Name" autocomplete="off" required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="lastname">Last Name:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control txt_input" type="text" value="" name="lastname" class="warningColor" id="lastname" placeholder="Last Name" autocomplete="off" autofocus required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="course">Course:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control txt_input" type="text" value="" name="course" class="err" id="course" placeholder="Course" autocomplete="off" required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="year">Year:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control txt_input" type="text" value="" name="year" class="err" id="year" placeholder="Year" autocomplete="off" maxlength="4" onkeypress='return isNumberKey(event)' required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="year">Section:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control txt_input" type="text" value="" name="year" class="err" id="year" placeholder="Section" autocomplete="off" maxlength="4" onkeypress='return isNumberKey(event)' required></td>
                </tr>
            </div>


            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="username">Position:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control txt_input" type="text" value="" name="uname" id="Position" autocomplete="off" placeholder="Username" required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="initial_password">Party:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control txt_input" type="text" value="" name="initial_password" id="initial_password" autocomplete="off" placeholder="Party" required></td>
                </tr>
            </div>

            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>

            <tr>
                <td colspan="4"><input style="float:right;" class="btn btn-success" type="submit" name="submit" value="Save"></td>
            </tr>

        </table>
    </form>
</div>