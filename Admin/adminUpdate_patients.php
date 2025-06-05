<?php
include("../inc/dbCon.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointmentId = $_POST['appointment_id'];
    $status = $_POST['status'];

    $query = "UPDATE appointment SET status = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ii', $status, $appointmentId);


    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
