<?php
session_start();

$servername = "localhost";
$username = "brightsmile";
$password = "brightsmile@2024";
$dbname = "brightsmile";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['admin']) && isset($_GET['doctor'])) {
    $adminId = intval($_GET['admin']);
    $doctorId = intval($_GET['doctor']);

    $query = "SELECT message, sender_id, created_at 
              FROM messages 
              WHERE (sender_id = ? AND receiver_id = ?) 
                 OR (sender_id = ? AND receiver_id = ?) 
              ORDER BY created_at ASC";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("iiii", $adminId, $doctorId, $doctorId, $adminId);
    $stmt->execute();
    $result = $stmt->get_result();

    $lastDate = '';

    while ($row = $result->fetch_assoc()) {
        // Convert the timestamp to a 12-hour AM/PM format
        $formattedTime = date("g:i A", strtotime($row['created_at']));

        // Get the date part (Day/Month/Year) of created_at
        $currentDate = date("d/m/Y", strtotime($row['created_at']));

        // Check if the date has changed and if so, display it
        if ($currentDate !== $lastDate) {
            echo "<div class='date-separator'>----------------- $currentDate ------------------</div>";
            $lastDate = $currentDate;
        }

        // Message output without sender/receiver labels
        $messageClass = ($row['sender_id'] == $adminId) ? 'sent' : 'received';
        echo "<div class='message $messageClass'>
                <span class='message-text'>{$row['message']}</span>
                <span class='message-time'>$formattedTime</span>
              </div>";
    }

    $stmt->close();
} else {
    echo "Invalid parameters.";
}

$mysqli->close();
?>
