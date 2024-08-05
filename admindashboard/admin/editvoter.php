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

$get_id = '';


if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
}


$voterlist = mysqli_query($connections, "SELECT * FROM voterstbl WHERE id='$get_id' ");

// if (!$candidatelist) {
//     // Query failed, handle the error
//     die("Error with the SQL query: " . mysqli_error($connections));
// }


$db_id =  $db_idnumber =  $db_firstname =  $db_middlename =  $db_lastname =  $db_course =  $db_year =  $db_position =  $db_party =  $db_img = "";

if (mysqli_num_rows($voterlist) > 0) {

    $row_voter_list = mysqli_fetch_assoc($voterlist);
    $db_id = $row_voter_list['id'];
    $db_idnumber = $row_voter_list['idnumber'];
    $db_firstname = $row_voter_list['firstname'];
    $db_middlename = $row_voter_list['middlename'];
    $db_lastname = $row_voter_list['lastname'];
    $db_year = $row_voter_list['year'];
    $db_course = $row_voter_list['course'];
    // $db_position = $row_voter_list['position'];
    // $db_party = $row_voter_list['party'];
    // $db_img = $row_voter_list['img'];

    $name = ucfirst($db_firstname) . " " . ucfirst($db_middlename[0]) . ". " . ucfirst($db_lastname);
}


// $response = ['status' => '', 'message' => ''];

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
                    $query = "UPDATE voterstbl SET idnumber = '$student_no', firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', year = '$year' WHERE id='$db_id' ";
                    if (mysqli_query($connections, $query)) {
                        // $response['status'] = 'success';
                        // $response['message'] = 'Student added successfully.';
                        echo "<script>alert('Student updated successfully.');</script>";
                        echo "<script>window.location.href = 'voterslist.php';</script>";
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

        <div class="container d-flex align-items-center col-md-6" style="height: 100%;">
            <form method="POST">
                <!-- NOTE!: Put Biometrics after -->
                <hr>
                <div class="row">
                    <div class="col-md-12 form-group pb-3">
                        <label for="student_no"><b>ID Number:<span style="color:red;"> *</span></b></label>
                        <input class="form-control txt_input" type="text" value="<?php echo $db_idnumber; ?>" name="student_no" id="student_no" placeholder="ID Number" autocomplete="off" autofocus required>
                    </div>

                    <div class="col-md-6 form-group pb-3">
                        <label for="firstname"><b>First Name:<span style="color:red;"> *</span></b></label>
                        <input class="form-control txt_input" type="text" value="<?php echo $db_firstname; ?>" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" required>
                    </div>

                    <div class="col-md-6 form-group pb-3">
                        <label for="middlename"><b>Middle Name:<span style="color:red;"> *</span></b></label>
                        <input class="form-control txt_input" type="text" value="<?php echo $db_middlename; ?>" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off" required>
                    </div>

                    <div class="col-md-6 form-group pb-3">
                        <label for="lastname"><b>Last Name:<span style="color:red;"> *</span></b></label>
                        <input class="form-control txt_input" type="text" value="<?php echo $db_lastname; ?>" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required>
                    </div>

                    <div class="col-md-6 form-group pb-3">
                        <label for="year"><b>Year:<span style="color:red;"> *</span></b></label>
                        <input class="form-control txt_input" type="text" value="<?php echo $db_year; ?>" name="year" id="year" placeholder="Year" autocomplete="off" required>
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


<?php
include('bins/footer.php');
?>