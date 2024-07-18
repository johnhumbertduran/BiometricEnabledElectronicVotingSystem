<?php
include("../bins/connections.php");
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    // Perform your delete operation here
    // Example: $result = deleteFromDatabase($id);
    // Assuming you have a function deleteFromDatabase($id) that performs the deletion
    //$result = true; // Replace with actual deletion result

    $query = "UPDATE electionyeartbl SET status = '2' WHERE id='$id' ";

    if (mysqli_query($connections, $query)) {
        echo 'success';
    } else {
        echo 'failure';
    }
} else {
    echo 'no id';
}
