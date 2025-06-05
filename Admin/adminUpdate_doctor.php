<?php
session_start();
include("../inc/dbCon.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the form
    $doctorId = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];

    error_log("Received data: ID=$doctorId, Name=$fullname, Email=$email, Gender=$gender, Status=$status");

    $query = "UPDATE user SET fullname = ?, email = ?, gender = ?, status = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("sssii", $fullname, $email, $gender, $status, $doctorId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }
}
?>
