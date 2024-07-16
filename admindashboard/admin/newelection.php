<?php
include("../bins/connections.php");

$response = ['status' => '', 'message' => ''];

$student_no = $firstname = $middlename = $lastname = $year = $course = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_no = $_POST["student_no"] ?? '';
    $firstname = $_POST["firstname"] ?? '';
    $middlename = $_POST["middlename"] ?? '';
    $lastname = $_POST["lastname"] ?? '';
    $year = $_POST["year"] ?? '';
    $course = $_POST["course"] ?? '';

    if ($student_no && $firstname && $middlename && $lastname && $year && $course) {
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
                        // Perform database insert operation here
                        $query = "INSERT INTO voterstbl (idNumber, firstName, middleName, lastName, year, course, status) VALUES ('$student_no', '$firstname', '$middlename', '$lastname', '$year', '$course', 'NotVoted')";
                        if (mysqli_query($connections, $query)) {
                            $response['status'] = 'success';
                            $response['message'] = 'Student added successfully.';
                        } else {
                            $response['status'] = 'error';
                            $response['message'] = 'Database error. Please try again.';
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
<div class="container d-flex align-items-center justify-content-center h-100">
    <form id="registerVotersForm" method="POST" enctype="multipart/form-data">

        <hr>
        <div class="row">

            <div class="col-md-5 form-group pb-3">
                <label for="electionyear"><b>Election Year:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php /* echo $electionyear; */ ?>" name="electionyear" id="electionyear" placeholder="Election Year" autocomplete="off" required>
            </div>
            <div class="col-2"></div>
            <div class="col-md-5 form-group pb-3">
                <label for="title"><b>Title:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php /* echo $title; */ ?>" name="title" id="title" placeholder="Title" autocomplete="off" required>
            </div>

            <div class="form-group pt-4">
                <input class="button-green float-end" type="submit" name="submit" value="Save">
            </div>

        </div>
        <hr>
    </form>

</div>

<script>
    $(document).ready(function() {
        $('#registerVotersForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: 'registervoters.php', // Change this to your actual form processing URL if needed
                type: 'POST',
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert(res.message);
                        // Use history.pushState to remain on the same view
                        // history.pushState(null, '', 'registervoters.php');
                        // Reload the form to clear fields
                        $('main[role="main"]').load('registervoters.php');
                    } else {
                        alert('Error: ' + res.message);
                    }
                },
                error: function() {
                    console.log('Error submitting form.');
                    alert('Error adding student. Please try again.');
                }
            });
        });
    });
</script>