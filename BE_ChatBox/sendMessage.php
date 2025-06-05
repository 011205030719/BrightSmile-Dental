<?php
session_start(); 
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'doctor') {
    header("Location: loginPage.html");
    exit();
}

if (isset($_POST['message']) && isset($_POST['receiver'])) {
    $senderId = $_SESSION['id']; 
    $receiverId = $_POST['receiver'];
    $message = $_POST['message'];  

    $servername = "localhost";
    $username = "brightsmile";
    $password = "brightsmile";
    $dbname = "brightsmile";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $senderId, $receiverId, $message);
    
    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        echo "Error sending message: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid parameters.";
}
?>
