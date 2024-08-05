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
    $admin_id = $my_info["id"];
    $admin_name = $my_info["firstname"];
    $admin_course = $my_info["course"];

    if ($account_type != 2) {
        header('Location: ../../forbidden.php');
    }
}

$response = ['status' => '', 'message' => ''];

$student_no = $firstname = $middlename = $lastname = $year = "";

if (isset($_POST['submit'])) {
    $student_no = $_POST["student_no"] ?? '';
    $firstname = $_POST["firstname"] ?? '';
    $middlename = $_POST["middlename"] ?? '';
    $lastname = $_POST["lastname"] ?? '';
    $year = $_POST["year"] ?? '';

    if ($student_no && $firstname && $middlename && $lastname && $year) {
        if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $firstname)) {
            // $response['status'] = 'error';
            // $response['message'] = 'First Name should not have numbers or symbols.';
            // echo json_encode($response);
            // exit;
            echo "<script>alert('Error: First Name should not have numbers or symbols.');</script>";
        } else {
            if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $middlename)) {
                // $response['status'] = 'Error';
                // $response['message'] = 'Middle Name should not have numbers or symbols.';
                // echo json_encode($response);
                // exit;
                echo "<script>alert('Error: Middle Name should not have numbers or symbols.');</script>";
            } else {
                if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $lastname)) {
                    // $response['status'] = 'Error';
                    // $response['message'] = 'Last Name should not have numbers or symbols.';
                    // echo json_encode($response);
                    // exit;
                    echo "<script>alert('Error: Last Name should not have numbers or symbols.');</script>";
                } else {
                    // Perform database insert operation here
                    $query = "INSERT INTO voterstbl (idnumber, firstname, middlename, lastname, year, course, electionid, status) VALUES ('$student_no', '$firstname', '$middlename', '$lastname', '$year', '$admin_course', '$admin_id', '0')";
                    if (mysqli_query($connections, $query)) {
                        // $response['status'] = 'success';
                        // $response['message'] = 'Student added successfully.';
                        echo "<script>alert('Student added successfully.');</script>";
                        echo "<script>window.location.href = 'registervoters.php';</script>";
                    } else {
                        // $response['status'] = 'error';
                        // $response['message'] = 'Database error. Please try again.';
                        echo "<script>alert('Error: Database error. Please try again.');</script>";
                    }
                }
            }
        }
    } else {
        // $response['status'] = 'error';
        // $response['message'] = 'All fields are required.';
        echo "<script>alert('Error: All fields are required.');</script>";
    }
    // echo json_encode($response);
    // exit;
}
?>

<div class="d-flex">
    <!-- Sidebar -->
    <?php
    include('bins/sidebar.php');
    ?>

    <!-- Main content -->
    <div class="flex-grow-1" style="margin-left: 250px; padding: 1rem;">

        <div class="container col-md-6">
            <form method="POST">
                <!-- NOTE!: Put Biometrics after -->
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
                        <!-- <label for="year"><b>Year:<span style="color:red;"> *</span></b></label>
                        <input class="form-control txt_input" type="text" value="<?php echo $year; ?>" name="year" id="year" placeholder="Year" autocomplete="off" required> -->
                        <label for="year"><b>Year:<span style="color:red;"> *</span></b></label>
                        <select class="form-select form-control form-select" name="year" id="year">
                            <option name="year" value="1st Year" <?php if ($year == "1st Year") {
                                                                        echo "selected";
                                                                    } ?>>First Year</option>
                            <option name="year" value="2nd Year" <?php if ($year == "2nd Year") {
                                                                        echo "selected";
                                                                    } ?>>Second Year</option>
                            <option name="year" value="3rd Year" <?php if ($year == "3rd Year") {
                                                                        echo "selected";
                                                                    } ?>>Third Year</option>
                            <option name="year" value="4th Year" <?php if ($year == "4th Year") {
                                                                        echo "selected";
                                                                    } ?>>Fourth Year</option>
                        </select>
                    </div>


                    <div class="col-md-12 form-group pt-4">
                        <input style="float:right;" class="button-green" type="submit" name="submit" value="Save">
                    </div>
                </div>
                <hr>
            </form>
        </div>
    </div>
</div>


<script>
    // $(document).ready(function() {
    //     $('#registerVotersForm').submit(function(e) {
    //         e.preventDefault(); // Prevent default form submission
    //         var formData = $(this).serialize(); // Serialize form data

    //         $.ajax({
    //             url: 'registervoters.php', // Change this to your actual form processing URL if needed
    //             type: 'POST',
    //             data: formData,
    //             success: function(response) {
    //                 var res = JSON.parse(response);
    //                 if (res.status === 'success') {
    //                     alert(res.message);
    //                     // Use history.pushState to remain on the same view
    //                     // history.pushState(null, '', 'registervoters.php');
    //                     // Reload the form to clear fields
    //                     $('main[role="main"]').load('registervoters.php');
    //                 } else {
    //                     alert('Error: ' + res.message);
    //                 }
    //             },
    //             error: function() {
    //                 console.log('Error submitting form.');
    //                 alert('Error adding student. Please try again.');
    //             }
    //         });
    //     });
    // });
</script>


<?php
include('bins/footer.php');
?>