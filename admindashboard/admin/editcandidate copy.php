<?php
session_start();
include('../bins/connections.php');

if (isset($_SESSION['username'])) {

    $session_user = $_SESSION['username'];

    $query_info = mysqli_query($connections, "SELECT * FROM admintbl WHERE username='$session_user'");
    $my_info = mysqli_fetch_assoc($query_info);
    $admin_id = $my_info['id'];
    $account_type = $my_info['account_type'];
    $admin_first_name = $my_info['firstname'];
    $admin_last_name = $my_info['lastname'];
    $admin_course = $my_info['course'];


    $admin_name = $admin_first_name . " " . $admin_last_name;

    if ($account_type != 2) {
        header('Location: ../../forbidden.php');
    }
} else {

    header('Location: ../');
}


$get_id = '';


if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
}

$candidatelist = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE id='$get_id' ");

// if (!$candidatelist) {
//     // Query failed, handle the error
//     die("Error with the SQL query: " . mysqli_error($connections));
// }


$db_id =  $db_idnumber =  $db_firstname =  $db_middlename =  $db_lastname =  $db_course =  $db_year =  $db_position =  $db_party =  $db_img = "";

if (mysqli_num_rows($candidatelist) > 0) {

    $row_candidate_list = mysqli_fetch_assoc($candidatelist);
    $db_id = $row_candidate_list['id'];
    $db_idnumber = $row_candidate_list['idnumber'];
    $db_firstname = $row_candidate_list['firstname'];
    $db_middlename = $row_candidate_list['middlename'];
    $db_lastname = $row_candidate_list['lastname'];
    $db_course = $row_candidate_list['course'];
    $db_year = $row_candidate_list['year'];
    $db_position = $row_candidate_list['position'];
    $db_party = $row_candidate_list['party'];
    $db_img = $row_candidate_list['img'];

    $name = ucfirst($db_firstname) . " " . ucfirst($db_middlename[0]) . ". " . ucfirst($db_lastname);
}


// Define the target directory for image uploads
$targetDir = "../../bins/img/candidate_img/";

// Initialize for checking if upload is okay
$uploadOk = 1;

$student_no = $firstname = $middlename = $lastname = $year = $position = $party = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_no = $_POST["student_no"] ?? '';
    $firstname = $_POST["firstname"] ?? '';
    $middlename = $_POST["middlename"] ?? '';
    $lastname = $_POST["lastname"] ?? '';
    // $course = $_POST["course"] ?? '';
    $year = $_POST["year"] ?? '';
    $position = $_POST["position"] ?? '';
    $party = $_POST["party"] ?? '';
    $myid = $_POST["myid"] ?? '';

    $response = ['status' => '', 'message' => ''];

    // Generate a unique filename for the image
    $targetFile = $targetDir . uniqid() . '_' . basename($_FILES["post_image"]["name"]);

    if ($student_no && $firstname && $middlename && $lastname && $year && $position && $party) {
        if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $firstname)) {
            $response['status'] = 'error';
            $response['message'] = 'First Name should not have numbers or symbols.';
            echo json_encode($response);
            exit;
        } else {

            if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $middlename)) {
                $response['status'] = 'Error';
                $response['message'] = 'Middle Name should not have numbers or symbols.';
                echo json_encode($response);
                exit;
            } else {
                if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $lastname)) {
                    $response['status'] = 'Error';
                    $response['message'] = 'Last Name should not have numbers or symbols.';
                    echo json_encode($response);
                    exit;
                } else {
                    // if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $course)) {
                    //     $response['status'] = 'Error';
                    //     $response['message'] = 'Course should not have numbers or symbols.';
                    //     echo json_encode($response);
                    //     exit;
                    // } else {

                    if (isset($_FILES["post_image"]) && $_FILES["post_image"]["error"] == 0) {

                        if (file_exists($targetFile)) {
                            $targetFile = $target_dir . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . "_" . basename($_FILES["post_image"]["name"]);

                            $uploadOk = 1;
                        }

                        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

                        if ($_FILES["post_image"]["size"] > 1000000000000000000000000) {

                            // $uploadErr = "Sorry, your file is too large!";
                            echo "<script>alert('Sorry, your file is too large!');</script>";
                            $uploadOk = 0;
                        }

                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {

                            // $uploadErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed!";
                            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed!');</script>";
                            $uploadOk = 0;
                        }


                        if ($uploadOk == 1) {
                            // Move the uploaded file to the target directory
                            if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $targetFile)) {

                                // Perform database insert operation here if image is uploaded
                                $query = "UPDATE candidatestbl SET idnumber = '$student_no', firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', year = '$year', position = '$position', party = '$party', img = '$targetFile' WHERE id='$myid' ";
                                if (mysqli_query($connections, $query)) {
                                    $response['status'] = 'success';
                                    $response['message'] = 'Candidate updated successfully.';
                                } else {
                                    $response['status'] = 'error';
                                    $response['message'] = 'Database error. Please try again.';
                                }
                            } else {
                                // Display an error message if the file move fails
                                echo "Error uploading image.";
                            }
                        }
                    } else {
                        // Perform database insert operation here if image is NOT uploaded
                        $query = "UPDATE candidatestbl SET idnumber = '$student_no', firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', year = '$year', position = '$position', party = '$party' WHERE id='$myid' ";
                        if (mysqli_query($connections, $query)) {
                            $response['status'] = 'success';
                            $response['message'] = 'Candidate updated successfully. PLEASE NOTE THAT IMAGE WAS NOT UPLOADED. Student No: ' . $student_no . ' Firstname: ' . $firstname . ' Middlename: ' . $middlename . ' Lastname: ' . $lastname . ' Year: ' . $year . ' Position: ' . $position . ' Party: ' . $party . ' ID: ' . $get_id;
                        } else {
                            $response['status'] = 'error';
                            $response['message'] = 'Database error. Please try again.';
                        }
                    }
                    // }
                }
            }
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'All fields are required.';
    }
    echo json_encode($response);
    exit;
}


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $response['status'] = 'success';
//     $response['message'] = 'Candidate updated successfully. \n PLEASE NOTE THAT IMAGE WAS NOT UPLOADED.';

//     $response['status'] = 'error';
//     $response['message'] = 'All fields are required.';
//     echo json_encode($response);
//     exit;
// }
?>
<style>
    /* Add your styling here */
    .custom_file_upload {
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        /* background-color: #297c2c; this is green */
        background-color: #004ba6;
        color: #fff;
        border: none;
        /* border-radius: 4px; */
        margin-top: 10px;
    }

    .custom_file_upload #post_image {
        display: none;
    }

    .post-image-preview-cursor {
        cursor: pointer;
    }

    #preview {
        position: relative;
        /* background-color: #f1f1f1; this is gray */
        background-color: #d8e6f8;
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 10px;
    }

    #preview img {
        width: 100%;
        /* Make the image cover the entire width of the container */
        height: 100%;
        /* Make the image cover the entire height of the container */
        object-fit: cover;
        /* Maintain aspect ratio while covering the container */
        display: block;
    }

    /* Centering container */
    .center-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* Adjust as needed */
    }

    #preview .close-upload-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        color: transparent !important;
        background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ff0000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
        border: none !important;
        /* Override Bootstrap styles */
        background-color: #363636;
        display: none;
    }

    .btn-close {
        color: #c025c0 !important;
    }
</style>
<h3 class="text-center bgmainblue sticky-top text-white">Update Candididate</h3>
<div class="container col-md-10">
    <form id="updateCandidateForm" method="POST" enctype="multipart/form-data">
        <!-- <hr> -->
        <div class="row mt-4">
            <div class="col-md-12 form-group pb-3">
                <label for="student_no"><b>ID Number:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php echo $db_idnumber; ?>" name="student_no" id="student_no" placeholder="ID Number" autocomplete="off" autofocus required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="firstname"><b>First Name:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php echo $db_firstname; ?>" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="middlename"><b>Middle Name:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php echo $db_middlename; ?>" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="lastname"><b>Last Name:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php echo $db_lastname; ?>" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required>
            </div>

            <!-- <div class="col-md-4 form-group pb-4">
                <label for="course"><b>Course:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php echo $course; ?>" name="course" id="course" placeholder="Course" autocomplete="off" required>
            </div> -->

            <div class="col-md-4 form-group pb-4">
                <label for="year"><b>Year:<span style="color:red;"> *</span></b></label>
                <select class="form-select form-control form-select" name="year" id="year">
                    <option name="year" value="1st Year" <?php if ($db_year == "1st Year") {
                                                                echo "selected";
                                                            } ?>>First Year</option>
                    <option name="year" value="2nd Year" <?php if ($db_year == "2nd Year") {
                                                                echo "selected";
                                                            } ?>>Second Year</option>
                    <option name="year" value="3rd Year" <?php if ($db_year == "3rd Year") {
                                                                echo "selected";
                                                            } ?>>Third Year</option>
                    <option name="year" value="4th Year" <?php if ($db_year == "4th Year") {
                                                                echo "selected";
                                                            } ?>>Fourth Year</option>
                </select>
                <!-- <label for="year"><b>Year:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php //echo $year; 
                                                                ?>" name="year" id="year" placeholder="Year" autocomplete="off" required> -->
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="position"><b>Position:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php echo $db_position; ?>" name="position" id="position" autocomplete="off" placeholder="Position" required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="party"><b>Party:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php echo $db_party; ?>" name="party" id="party" autocomplete="off" placeholder="Party" required>
                <input type="hidden" name="myid" value="<?php echo $_GET['id']; ?>">
            </div>

            <div class="col-md-12 form-group">
                <div class="d-flex align-items-start">
                    <div class="d-flex flex-column align-items-center me-3" id="db_img">
                        <img class="mb-2" src="<?php echo $db_img; ?>" alt="<?php echo $name; ?>" width="100px" height="100px" style="object-fit: cover; border-radius:10px;">
                        <button class="button-green" id="updateimg">Update Image</button>
                    </div>


                    <div class="d-flex flex-column align-items-center d-none" id="preview_img">
                        <label for="post_image" class="post-image-preview-cursor">
                            <div id="preview" class="center-container">
                                <i class="fa-solid fa-camera-retro fa-2xl" id="camera-icon" style="color: #82b0eb; font-size:5em;"></i>
                                <button type="button" class="btn-close close-upload-btn" id="close-upload-btn" onclick="removePreview();"></button>
                            </div>
                        </label>
                        <label for="post_image" class="custom_file_upload button-blue w-100">
                            <i class="fa-solid fa-file-image" style="color: #ffffff;"></i>
                            <span>Add Photo</span>
                            <input type="file" name="post_image" class="btn btn-info" id="post_image" onchange="displayPreview(this.files);" accept="image/*">
                        </label>
                    </div>
                    <input class="float-end button-green ms-auto align-self-end" type="submit" name="submit" value="Save">
                </div>
            </div>


            <!-- <div class="col-md-12 form-group">

            </div> -->
        </div>

        <!-- <hr> -->
    </form>
</div>


<script>
    var _URL = window.URL || window.webkitURL;
    var prev = document.getElementById("preview");
    var img = new Image();


    // display the preview here
    function displayPreview(files) {

        var file = files[0];
        var sizeKB = file.size / 1024;

        if (prev == "") {

        } else {

            img.onload = function() {
                $('#preview').append(img);
                $("#close-upload-btn").css("display", "block");
                $("#camera-icon").css("display", "none");
            }
            img.classList.add("post_img");
            img.src = _URL.createObjectURL(file);
        }
    }

    // remove the preview here with the close button
    function removePreview() {
        // Remove the dynamically appended image
        $('#preview').find('img').remove();
        // Optionally hide the close button
        $("#close-upload-btn").css("display", "none");
        $("#camera-icon").css("display", "block");
    }


    $(document).ready(function() {
        var dbimg = document.getElementById("db_img");
        var previmg = document.getElementById("preview_img");

        $('#updateimg').on('click', function() {
            event.preventDefault(); // Prevent default form submission behavior
            update_img();
        });

        function update_img() {
            $("#db_img").addClass("d-none"); // Hide the db_img
            $("#preview_img").removeClass("d-none"); // Show the preview_img
        }




        // $('#updateCandidateForm').submit(function(e) {
        //     e.preventDefault(); // Prevent default form submission
        //     var formData = $(this).serialize(); // Serialize form data

        //     $.ajax({
        //         url: 'editcandidate.php', // Change this to your actual form processing URL if needed
        //         type: 'POST',
        //         data: formData,
        //         success: function(response) {
        //             var res = JSON.parse(response);
        //             if (res.status === 'success') {
        //                 alert(res.message);
        //                 // Use history.pushState to remain on the same view
        //                 // history.pushState(null, '', 'editelection.php');
        //                 // Reload the form to clear fields
        //                 $('main[role="main"]').load('candidatelist.php');
        //             } else {
        //                 alert('Error: ' + res.message);
        //             }
        //         },
        //         error: function() {
        //             console.log('Error submitting form.');
        //             alert('Error adding election. Please try again.');
        //         }
        //     });
        // });



        $('#updateCandidateForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            //var formData = $(this).serialize(); // Serialize form data
            var formData = new FormData(this); // Use FormData to handle form data

            $.ajax({
                url: 'editcandidate.php', // Change this to your actual form processing URL if needed
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert(res.message);
                        // Use history.pushState to remain on the same view
                        // history.pushState(null, '', 'candidatelist.php');
                        // Reload the form to clear fields
                        $('main[role="main"]').load('candidatelist.php');
                    } else {
                        alert('Error: ' + res.message);
                    }
                },
                error: function(xhr, status, error) {

                    console.log('Error status:', status);
                    console.log('Error message:', error);
                    console.log('Response:', xhr.responseText);

                    console.log('Error submitting form.');
                    alert('Error adding candidate. Please try again.');
                }
            });
        });




    });
</script>