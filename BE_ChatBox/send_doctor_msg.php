<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_POST['message'], $_POST['receiver'], $_POST['sender'])) {
    echo "Invalid parameters.";
    exit();
}

$conn = new mysqli("localhost", "brightsmile", "brightsmile@2024", "brightsmile");
$query = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("iis", $_POST['sender'], $_POST['receiver'], $_POST['message']);

if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error sending message: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
