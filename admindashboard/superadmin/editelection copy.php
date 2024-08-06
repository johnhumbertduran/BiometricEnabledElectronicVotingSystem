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

$get_id = "";
if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
}




$response = ['status' => '', 'message' => ''];

$election_year = $title = $id = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $election_year = $_POST["electionyear"] ?? '';
    $title = $_POST["title"] ?? '';
    $id = $_POST["id"] ?? '';

    $db_electionyear = $election_year;
    $db_title = $title;
    $db_id = $id;

    if ($election_year && $title) {
        // Perform database insert operation here
        // mysqli_query($connections, "UPDATE requestertbl SET reqName = '$db_Name',room = '$db_Room', dateTimeNeeded = '$db_DateNeed', /* dateSubmitted = '$db_DateSub', */ telNo = '$db_Tel' WHERE rollNo = '$roll' ");

        $query = "UPDATE admintbl SET electionyear = '$db_electionyear', electiontitle = '$db_title' WHERE id='$db_id' ";
        if (mysqli_query($connections, $query)) {
            $response['status'] = 'success';
            $response['message'] = 'Student added successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Database error. Please try again.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'All fields are required.';
    }
    echo json_encode($response);
    exit;
}

$electionlists = mysqli_query($connections, "SELECT * FROM admintbl WHERE id='$get_id' ");


$row_election_lists = mysqli_fetch_assoc($electionlists);
$db_id = $row_election_lists["id"];
$db_electionyear = $row_election_lists["electionyear"];
$db_title = $row_election_lists["electiontitle"];
$db_status = $row_election_lists["electionstatus"];
?>
<div class="container d-flex align-items-center justify-content-center h-100">
    <form id="editElectionForm" method="POST">

        <h3>Edit Election</h3>
        <hr>
        <div class="row">

            <div class="col-md-5 form-group pb-3">
                <label for="electionyear"><b>Election Year:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php echo $db_electionyear; ?>" name="electionyear" id="electionyear" placeholder="Election Year" autocomplete="off" required>
            </div>
            <div class="col-2"></div>
            <div class="col-md-5 form-group pb-3">
                <label for="title"><b>Title:<span style="color:red;"> *</span></b></label>
                <input class="form-control" type="text" value="<?php echo $db_title;  ?>" name="title" id="title" placeholder="Title" autocomplete="off" required>
                <input type="hidden" value="<?php echo $db_id; ?>" name="id">
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
        $('#editElectionForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: 'editelection.php', // Change this to your actual form processing URL if needed
                type: 'POST',
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert(res.message);
                        // Use history.pushState to remain on the same view
                        // history.pushState(null, '', 'editelection.php');
                        // Reload the form to clear fields
                        $('main[role="main"]').load('electionlist.php');
                    } else {
                        alert('Error: ' + res.message);
                    }
                },
                error: function() {
                    console.log('Error submitting form.');
                    alert('Error adding election. Please try again.');
                }
            });
        });
    });
</script>