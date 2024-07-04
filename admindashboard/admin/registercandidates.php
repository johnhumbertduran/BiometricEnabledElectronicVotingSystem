<?php
include("../bins/connections.php");

$response = ['status' => '', 'message' => ''];
$student_no = $firstname = $middlename = $lastname = $course = $year = $position = $party = "";

// Define the target directory for image uploads
$targetDir = "../../bins/img/candidate_img/";

// Initialize for checking if upload is okay
$uploadOk = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_no = $_POST["student_no"] ?? '';
    $firstname = $_POST["firstname"] ?? '';
    $middlename = $_POST["middlename"] ?? '';
    $lastname = $_POST["lastname"] ?? '';
    $course = $_POST["course"] ?? '';
    $year = $_POST["year"] ?? '';
    $position = $_POST["position"] ?? '';
    $party = $_POST["party"] ?? '';

    // Generate a unique filename for the image
    $targetFile = $targetDir . uniqid() . '_' . basename($_FILES["post_image"]["name"]);

    if ($student_no && $firstname && $middlename && $lastname && $course && $year && $position && $party) {
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
                    if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $course)) {
                        $response['status'] = 'Error';
                        $response['message'] = 'Course should not have numbers or symbols.';
                        echo json_encode($response);
                        exit;
                    } else {

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
                                    $query = "INSERT INTO candidatestbl (idNumber, firstName, middleName, lastName, course, year, position, party, img) VALUES ('$student_no', '$firstname', '$middlename', '$lastname', '$course', '$year', '$position', '$party','$targetFile')";
                                    if (mysqli_query($connections, $query)) {
                                        $response['status'] = 'success';
                                        $response['message'] = 'Candidate added successfully.';
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
                            $query = "INSERT INTO candidatestbl (idNumber, firstName, middleName, lastName, course, year, position, party) VALUES ('$student_no', '$firstname', '$middlename', '$lastname', '$course', '$year', '$position', '$party')";
                            if (mysqli_query($connections, $query)) {
                                $response['status'] = 'success';
                                $response['message'] = 'Candidate added successfully. \n PLEASE NOTE THAT IMAGE WAS NOT UPLOADED.';
                            } else {
                                $response['status'] = 'error';
                                $response['message'] = 'Database error. Please try again.';
                            }
                        }
                    }
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
<div class="container col-md-10">
    <form id="registerCandidateForm" method="POST" enctype="multipart/form-data">
        <hr>
        <div class="row">
            <div class="col-md-12 form-group pb-3">
                <label for="student_no"><b>ID Number:<span style="color:red;"> *</span></b></label>
                <input class="form-control txt_input" type="text" value="<?php echo $student_no; ?>" name="student_no" id="student_no" placeholder="ID Number" autocomplete="off" autofocus required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="firstname"><b>First Name:<span style="color:red;"> *</span></b></label>
                <input class="form-control txt_input" type="text" value="<?php echo $firstname; ?>" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="middlename"><b>Middle Name:<span style="color:red;"> *</span></b></label>
                <input class="form-control txt_input" type="text" value="<?php echo $middlename; ?>" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="lastname"><b>Last Name:<span style="color:red;"> *</span></b></label>
                <input class="form-control txt_input" type="text" value="<?php echo $lastname; ?>" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="course"><b>Course:<span style="color:red;"> *</span></b></label>
                <input class="form-control txt_input" type="text" value="<?php echo $course; ?>" name="course" id="course" placeholder="Course" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="year"><b>Year:<span style="color:red;"> *</span></b></label>
                <input class="form-control txt_input" type="text" value="<?php echo $year; ?>" name="year" id="year" placeholder="Year" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="position"><b>Position:<span style="color:red;"> *</span></b></label>
                <input class="form-control txt_input" type="text" value="<?php echo $position; ?>" name="position" id="position" autocomplete="off" placeholder="Position" required>
            </div>

            <div class="col-md-4 form-group pb-4">
                <label for="party"><b>Party:<span style="color:red;"> *</span></b></label>
                <input class="form-control txt_input" type="text" value="<?php echo $party; ?>" name="party" id="party" autocomplete="off" placeholder="Party" required>
            </div>

            <div class="col-md-4 form-group">
                <label for="post_image" class="post-image-preview-cursor">
                    <div id="preview" class="center-container">
                        <i class="fa-solid fa-camera-retro fa-2xl" id="camera-icon" style="color: #82b0eb; font-size:5em;"></i>
                        <button type="button" class="btn-close close-upload-btn" id="close-upload-btn" onclick="removePreview();"></button>
                    </div>
                </label>
                <label for="post_image" class="custom_file_upload button-blue">
                    <i class="fa-solid fa-file-image" style="color: #ffffff;"></i>
                    <span>Add Photo</span>
                    <input type="file" name="post_image" class="btn btn-info" id="post_image" onchange="displayPreview(this.files);" accept="image/*">
                </label>
            </div>

            <div class="col-md-4 form-group">
                <input style="float:right;" class="button-green" type="submit" name="submit" value="Save">
            </div>
        </div>

        <hr>
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
        $('#registerCandidateForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            //var formData = $(this).serialize(); // Serialize form data
            var formData = new FormData(this); // Use FormData to handle form data

            $.ajax({
                url: 'registercandidates.php', // Change this to your actual form processing URL if needed
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert(res.message);
                        // Use history.pushState to remain on the same view
                        // history.pushState(null, '', 'registercandidates.php');
                        // Reload the form to clear fields
                        $('main[role="main"]').load('registercandidates.php');
                    } else {
                        alert('Error: ' + res.message);
                    }
                },
                error: function() {
                    console.log('Error submitting form.');
                    alert('Error adding candidate. Please try again.');
                }
            });
        });
    });
</script>