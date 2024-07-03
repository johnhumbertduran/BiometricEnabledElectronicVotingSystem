<?php
include("../bins/connections.php");

$response = ['status' => '', 'message' => ''];
$firstname = $middlename = $lastname = $department = $schoolyear = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
    }
    if (!empty($_POST["middlename"])) {
        $middlename = $_POST["middlename"];
    }
    if (!empty($_POST["lastname"])) {
        $lastname = $_POST["lastname"];
    }
    if (!empty($_POST["department"])) {
        $department = $_POST["department"];
    }
    if (!empty($_POST["schoolyear"])) {
        $schoolyear = $_POST["schoolyear"];
    }

    if ($firstname && $middlename && $lastname && $department && $schoolyear) {
        if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $firstname)) {
            $response['status'] = 'error';
            $response['message'] = 'First Name should not have numbers or symbols.';
            echo json_encode($response);
            exit;
        } else {
            if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $middlename)) {
                $response['status'] = 'error';
                $response['message'] = 'Middle Name should not have numbers or symbols.';
                echo json_encode($response);
                exit;
            } else {
                if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $lastname)) {
                    $response['status'] = 'error';
                    $response['message'] = 'Last Name should not have numbers or symbols.';
                    echo json_encode($response);
                    exit;
                } else {
                    if (!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $department)) {
                        $response['status'] = 'error';
                        $response['message'] = 'Department should not have numbers or symbols.';
                        echo json_encode($response);
                        exit;
                    } else {
                        // Perform database insert operation here
                        $query = "INSERT INTO admintbl (firstname, middlename, lastname, department, schoolyear, account_type) VALUES ('$firstname', '$middlename', '$lastname', '$department', '$schoolyear', '2')";
                        if (mysqli_query($connections, $query)) {
                            $response['status'] = 'success';
                            $response['message'] = 'Admin added successfully.';
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
                    <td colspan="3"><input class="form-control" type="text" value="<?php echo $firstname; ?>" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" autofocus required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="middlename">Middle Name:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control" type="text" value="<?php echo $middlename; ?>" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off" required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="lastname">Last Name:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control" type="text" value="<?php echo $lastname; ?>" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="department">Department:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control" type="text" value="<?php echo $department; ?>" name="department" id="department" placeholder="Department" autocomplete="off" required></td>
                </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td class="label"><b><label for="schoolyear">School Year:<span style="color:red;"> *</span></label></b></td>
                    <td colspan="3"><input class="form-control" type="text" value="<?php echo $schoolyear; ?>" name="schoolyear" id="schoolyear" placeholder="School Year" autocomplete="off" required></td>
                </tr>
            </div>

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

<script>
    $(document).ready(function() {
        $('#registerAdminForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: 'registeradmin.php', // Change this to your actual form processing URL if needed
                type: 'POST',
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert(res.message);
                        // Use history.pushState to remain on the same view
                        history.pushState(null, '', 'registeradmin.php');
                        // Reload the form to clear fields
                        $('main[role="main"]').load('registeradmin.php');
                    } else {
                        alert('Error: ' + res.message);
                    }
                },
                error: function() {
                    console.log('Error submitting form.');
                    alert('Error adding admin. Please try again.');
                }
            });
        });
    });
</script>