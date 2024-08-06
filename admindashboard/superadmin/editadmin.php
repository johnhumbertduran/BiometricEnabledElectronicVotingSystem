<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
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


$get_id = '';


if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
}


$adminlist = mysqli_query($connections, "SELECT * FROM admintbl WHERE id='$get_id' ");

$db_id =  $db_firstname =  $db_middlename =  $db_lastname =  $db_course =  $db_year =  $db_position =  $db_party =  $db_img = "";

if (mysqli_num_rows($adminlist) > 0) {

    $row_admin_list = mysqli_fetch_assoc($adminlist);
    $db_id = $row_admin_list['id'];
    $db_firstname = $row_admin_list['firstname'];
    $db_middlename = $row_admin_list['middlename'];
    $db_lastname = $row_admin_list['lastname'];
    $db_course = $row_admin_list['course'];
    $db_username = $row_admin_list['username'];
    $db_password = $row_admin_list['password'];
    $db_electionyear = $row_admin_list['electionyear'];
    $db_electiontitle = $row_admin_list['electiontitle'];
    // $db_position = $row_admin_list['position'];
    // $db_party = $row_admin_list['party'];
    // $db_img = $row_admin_list['img'];

    $name = ucfirst($db_firstname) . " " . ucfirst($db_middlename[0]) . ". " . ucfirst($db_lastname);
}

$response = ['status' => '', 'message' => ''];
$firstname = $middlename = $lastname = $course = $electionyear = $electiontitle = $username = $password = $cpassword = "";

if (isset($_POST['submit'])) {

    $firstname = $_POST["firstname"] ?? '';
    $middlename = $_POST["middlename"] ?? '';
    $lastname = $_POST["lastname"] ?? '';
    $course = $_POST["course"] ?? '';
    $electionyear = $_POST["schoolyear"] ?? '';
    $electiontitle = $_POST["electiontitle"] ?? '';
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';
    $cpassword = $_POST["cpassword"] ?? '';

    // if (!empty($_POST["firstname"])) {
    //     $firstname = $_POST["firstname"];
    // }
    // if (!empty($_POST["middlename"])) {
    //     $middlename = $_POST["middlename"];
    // }
    // if (!empty($_POST["lastname"])) {
    //     $lastname = $_POST["lastname"];
    // }
    // if (!empty($_POST["course"])) {
    //     $course = $_POST["course"];
    // }
    // if (!empty($_POST["schoolyear"])) {
    //     $schoolyear = $_POST["schoolyear"];
    // }
    // if (!empty($_POST["electiontitle"])) {
    //     $electiontitle = $_POST["electiontitle"];
    // }
    // if (!empty($_POST["username"])) {
    //     $username = $_POST["username"];
    // }
    // if (!empty($_POST["password"])) {
    //     $password = $_POST["password"];
    // }
    // if (!empty($_POST["cpassword"])) {
    //     $cpassword = $_POST["cpassword"];
    // }

    if ($firstname && $middlename && $lastname && $course && $electionyear && $username) {
        // if ($firstname && $middlename && $lastname && $course && $schoolyear && $username && $password && $cpassword) {
        if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $firstname)) {
            // $response['status'] = 'Error';
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
                    if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $course)) {
                        // $response['status'] = 'Error';
                        // $response['message'] = 'Course should not have numbers or symbols.';
                        // echo json_encode($response);
                        // exit;
                        echo "<script>alert('Error: Course should not have numbers or symbols.');</script>";
                    } else {

                        if (strlen($username) <= 7) {
                            // $response['status'] = 'Error';
                            // $response['message'] = 'Username should have atleast 8 characters';
                            // echo json_encode($response);
                            // exit;
                            echo "<script>alert('Error: Username should have atleast 8 characters.');</script>";
                        } else {
                            // if (strlen($password) <= 7) {
                            // $response['status'] = 'Error';
                            // $response['message'] = 'Password should have atleast 8 characters';
                            // echo json_encode($response);
                            // exit;
                            //     echo "<script>alert('Error: Password should have atleast 8 characters.');</script>";
                            // } else {
                            // if (strlen($cpassword) <= 7) {
                            //     // $response['status'] = 'Error';
                            //     // $response['message'] = 'Confirm Password should have atleast 8 characters';
                            //     // echo json_encode($response);
                            //     // exit;
                            //     echo "<script>alert('Error: Confirm Password should have atleast 8 characters.');</script>";
                            // } else {
                            //     if ($cpassword != $password) {
                            //         // $response['status'] = 'Error';
                            //         // $response['message'] = 'Confirm Password should match the Password given';
                            //         // echo json_encode($response);
                            //         // exit;
                            //         echo "<script>alert('Error: Confirm Password should match the Password given.');</script>";
                            //     } else {
                            // Perform database insert operation here
                            // $query = "INSERT INTO admintbl (firstname, middlename, lastname, course, username, password, account_type, electionyear, electiontitle, electionstatus) VALUES ('$firstname', '$middlename', '$lastname', '$course', '$username', '$cpassword', '2', '$schoolyear', '$electiontitle', '2')";
                            $query = "UPDATE admintbl SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', course = '$course', username = '$username', electionyear = '$electionyear' WHERE id='$db_id' ";
                            if (mysqli_query($connections, $query)) {
                                // $response['status'] = 'Success';
                                // $response['message'] = 'Admin added successfully.';
                                echo "<script>alert('Admin updated successfully.');</script>";
                                echo "<script>window.location.href = 'adminlists.php';</script>";
                            } else {
                                // $response['status'] = 'Error';
                                // $response['message'] = 'Database error. Please try again.';
                                echo "<script>alert('Error: Database error. Please try again.');</script>";
                            }
                            // }
                            // }
                            // }
                        }
                    }
                }
            }
        }
    } else {
        // $response['status'] = 'Error';
        // $response['message'] = 'All fields are required.';
        echo "<script>alert('Error: All fields are required.');</script>";
    }
    // echo json_encode($response);
    // exit;
}
?>


<div class="d-flex">
    <!-- Sidebar -->
    <?php include('bins/sidebar.php'); ?>

    <!-- Main content -->
    <div class="flex-grow-1 d-flex justify-content-center" style="margin-left: 250px; padding: 1rem; min-height: 80vh;">

        <div class="flex-fill d-flex align-items-center justify-content-center">

            <div class="container col-md-8">
                <form id="registerAdminForm" method="POST">
                    <table border="0" width="100%">

                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>

                        <div class="form-group">
                            <tr>
                                <td class="label"><b><label for="firstname">First Name:<span style="color:red;"> *</span></label></b></td>
                                <td colspan="3"><input class="form-control" type="text" value="<?php echo $db_firstname; ?>" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" autofocus required></td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <td class="label"><b><label for="middlename">Middle Name:<span style="color:red;"> *</span></label></b></td>
                                <td colspan="3"><input class="form-control" type="text" value="<?php echo $db_middlename; ?>" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off" required></td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <td class="label"><b><label for="lastname">Last Name:<span style="color:red;"> *</span></label></b></td>
                                <td colspan="3"><input class="form-control" type="text" value="<?php echo $db_lastname; ?>" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required></td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <td class="label"><b><label for="course">Course:<span style="color:red;"> *</span></label></b></td>
                                <td colspan="3"><input class="form-control" type="text" value="<?php echo $db_course; ?>" name="course" id="course" placeholder="Course" autocomplete="off" required></td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <td class="label"><b><label for="schoolyear">Election Year:<span style="color:red;"> *</span></label></b></td>
                                <td colspan="3"><input class="form-control" type="text" value="<?php echo $db_electionyear; ?>" name="schoolyear" id="schoolyear" placeholder="Election Year" autocomplete="off" required></td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <td class="label"><b><label for="electiontitle">Election Title:<span style="color:red;"> *</span></label></b></td>
                                <td colspan="3"><input class="form-control" type="text" value="<?php echo $db_electiontitle; ?>" name="electiontitle" id="electiontitle" placeholder="Election Title" autocomplete="off" required></td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <td class="label"><b><label for="username">Username:<span style="color:red;"> *</span></label></b></td>
                                <td colspan="3"><input class="form-control" type="text" value="<?php echo $db_username; ?>" name="username" id="username" placeholder="Username" autocomplete="off" required></td>
                            </tr>
                        </div>

                        <!-- <div class="form-group">
                            <tr>
                                <td class="label"><b><label for="password">Password:<span style="color:red;"> *</span></label></b></td>
                                <td colspan="3"><input class="form-control" type="password" value="<?php echo $password; ?>" name="password" id="password" placeholder="Password" autocomplete="off" required></td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <td class="label"><b><label for="cpassword">Confirm Password:<span style="color:red;"> *</span></label></b></td>
                                <td colspan="3"><input class="form-control" type="password" value="<?php echo $cpassword; ?>" name="cpassword" id="cpassword" placeholder="Confirm Password" autocomplete="off" required></td>
                            </tr>
                        </div> -->

                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4"><input style="float:right;" class="button-green" type="submit" name="submit" value="Save"></td>
                        </tr>

                    </table>
                </form>
            </div>
            <!-- </div> -->
        </div>
    </div>


    <script>
        $(document).ready(function() {
            // $('#registerAdminForm').submit(function(e) {
            //     e.preventDefault(); // Prevent default form submission
            //     var formData = $(this).serialize(); // Serialize form data

            //     $.ajax({
            //         url: 'registeradmin.php', // Change this to your actual form processing URL if needed
            //         type: 'POST',
            //         data: formData,
            //         success: function(response) {
            //             var res = JSON.parse(response);
            //             if (res.status === 'Success') {
            //                 alert(res.message);
            //                 // Use history.pushState to remain on the same view
            //                 // history.pushState(null, '', 'registeradmin.php');
            //                 // Reload the form to clear fields
            //                 $('main[role="main"]').load('registeradmin.php');
            //             } else {
            //                 alert('Error: ' + res.message);
            //             }
            //         },
            //         error: function() {
            //             console.log('Error submitting form.');
            //             alert('Error adding admin. Please try again.');
            //         }
            //     });
            // });
        });
    </script>


    <?php
    include('bins/footer.php');
    ?>