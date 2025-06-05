<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost";
$username = "brightsmile";
$password = "brightsmile@2024";
$dbname = "brightsmile";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_SESSION['id'])) {
    echo "Error: User is not logged in.";
    exit();
}

$doctorId = $_SESSION['id'];

$query = "SELECT message, sender_id, created_at FROM messages 
          WHERE sender_id = ? OR receiver_id = ? 
          ORDER BY created_at ASC";

$stmt = $mysqli->prepare($query);

if ($stmt === false) {
    echo "Error: Could not prepare query.";
    exit();
}

// Bind parameters and execute
$stmt->bind_param("ii", $doctorId, $doctorId);
$stmt->execute();
$result = $stmt->get_result();

// Prepare a variable to store the last date to check when it changes
$lastDate = '';

while ($row = $result->fetch_assoc()) {
    $message = $row['message'];
    $senderId = $row['sender_id'];
    $timestamp = $row['created_at'];

    // Convert the timestamp to 12-hour AM/PM format
    $formattedTime = date("g:i A", strtotime($timestamp));

    // Get the date part (Day/Month/Year) from the timestamp
    $currentDate = date("d/m/Y", strtotime($timestamp));

    // Check if the date has changed and if so, display it as a separator
    if ($currentDate !== $lastDate) {
        echo "<div class='date-separator'>----------------- $currentDate ------------------</div>";
        $lastDate = $currentDate;  // Update the last date to the current one
    }

    // Display the message with the formatted time
    $messageClass = ($senderId == $doctorId) ? 'sent' : 'received'; // Message sender determination
    echo "<div class='message $messageClass'>
            <span class='message-text'>$message</span>
            <span class='message-time'>$formattedTime</span>
          </div>";
}
?>
