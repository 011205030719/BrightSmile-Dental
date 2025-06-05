<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginPage.html");
    exit();
}

$adminId = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat Messages</title>
        <link rel="stylesheet" href="../css/dashboard.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
    </head>
    <style>
    .date-separator {
        text-align: center;
        color: #888;
        font-size: 14px; 
        margin: 10px 0;
        font-weight: bold; 
    }

    .chat-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        /* background-color: #f4f4f9; */
        border-bottom: 2px solid #ddd;
        margin-bottom: 10px;
    }

    .chat-header h2 {
        font-size: 1.5rem;
        color: #333;
    }

    .chat-header #doctorName {
        color: #007bff;
        font-weight: bold;
    }

    .doctor-select-container {
        margin-left: auto;
    }

    #doctorSelect {
        padding: 8px 12px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s;
        color:#000000;
    }
    select {
        color: black; 
        background-color: white;
        border: 1px solid #ccc; 
        font-size: 16px; 
    }

    option {
        color: black;
        background-color: white;
    }

    #doctorSelect:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        color:#000000;
    }

    #doctorSelect:hover {
        cursor: pointer;
        border-color: #007bff;
    }

    /* Chat Container */
    .chat-container {
        width: 100%;
        max-width: 400px;
        /* background-color: #ffffff; */
        /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        height:638px;
    }

    /* Chat Header */
    .chat-header {
        /* background-color: #0084ff; */
        color: #ffffff;
        padding: 15px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        text-align: center;
        width:1180px;
        color:#000000;
    }

    /* Chat Box */
    .chat-box {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
        /* background-color: #f9f9f9; */
        width:1155px;
    }

    /* Message Styles */
    .message {
        max-width: 75%;
        padding: 10px 15px;
        border-radius: 20px;
        position: relative;
        font-size: 13px;
        line-height: 1.5;
        display: inline-block;
        word-wrap: break-word;
    }

    /* Sent Messages */
    .message.sent {
        background-color: #0084ff;
        color: #ffffff;
        align-self: flex-end;
    }

    /* Received Messages */
    .message.received {
        background-color: #e4e6eb;
        color: #000000;
        align-self: flex-start;
    }

    /* Message Timestamp */
    .message-time {
        display: block;
        margin-top: 5px;
        font-size: 10px;
        opacity: 0.7;
        text-align: right;
    }

    /* Chat Input Area */
    .chat-input-area {
        display: flex;
        padding: 10px;
        border-top: 1px solid #ddd;
        background-color: #f1f1f1;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        width:1155px;
    }

    /* Input Field */
    .chat-input-area input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 20px;
        font-size: 14px;
        outline: none;
    }

    /* Send Button */
    .chat-input-area button {
        margin-left: 10px;
        padding: 10px 20px;
        background-color: #0084ff;
        color: #ffffff;
        border: none;
        border-radius: 20px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .chat-input-area button:hover {
        background-color: #005bb5;
    }

    </style>
    <body>
        <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bxs-smile'></i>
                <span class="text">DoctorHub</span>
            </a>
            <ul class="side-menu top">
                <li>
                    <a href="../Admin/adminDashboard.php">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../Admin/adminDashPatients.php">
                        <i class='bx bxs-shopping-bag-alt' ></i>
                        <span class="text">Patients</span>
                    </a>
                </li>
                <li>
                    <a href="../Admin/adminDashDoctors.php">
                        <i class='bx bxs-group' ></i>
                        <span class="text">Team</span>
                    </a>
                </li>
                <li class="active">
                    <a href="../Admin/Admin-chat-message.php">
                        <i class='bx bx-chat' ></i>
                        <span class="text">Chat</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="../logoutExec.php" class="logout">
                        <i class='bx bxs-log-out-circle' ></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </section>

        <section id="content">
            <!-- NAVBAR -->
            <nav>
                <i class='bx bx-menu' ></i>
                <a href="#" class="nav-link">Categories</a>
            </nav>
            <!-- NAVBAR -->
        
            <!-- MAIN -->
            <div class="chat-container">
                <header class="chat-header">
                    <h2>Chat with: <span id="doctorName">--</span></h2>
                    <div class="doctor-select-container">
                        <select id="doctorSelect" onchange="updateChatDoctor()">
                            <option value="">-- Select Doctor --</option>
                            <?php
                                $servername = "localhost";
                                $username = "brightsmile";
                                $password = "brightsmile@2024";
                                $dbname = "brightsmile";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $result = $conn->query("SELECT * FROM user WHERE role = 'doctor';");

                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id']}'>{$row['fullname']}</option>";

                                }

                                $conn->close();
                            ?>
                        </select>
                    </div>
                </header>
                <div id="chatBox" class="chat-box"><!---Backend will fill in----------></div>
                <div class="chat-input-area">
                    <input type="text" id="messageInput" placeholder="Type a message" />
                    <button id="sendBtn">Send</button>
                </div>
            </div>
        </section>

        <script>
            let adminId = 1;
            let selectedDoctorId = null;

            function loadMessages() {
                const doctorSelect = document.getElementById("doctorSelect");
                    selectedDoctorId = doctorSelect.value;

                const chatInputArea = document.querySelector(".chat-input-area");
                    if (!selectedDoctorId) {
                        document.getElementById("chatBox").innerHTML = "<p>Please select a doctor to view messages.</p>";
                        chatInputArea.style.display = "none";
                        return;
                    }

                    chatInputArea.style.display = "flex"; 

                    fetch(`../BE_ChatBox/get_doctor_msg.php?admin=${adminId}&doctor=${selectedDoctorId}`)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById("chatBox").innerHTML = data;
                        })
                        .catch(error => console.error("Error loading messages:", error));
                    }

                    document.getElementById("sendBtn").addEventListener("click", () => {
                        const message = document.getElementById("messageInput").value;

                        if (message.trim() !== "" && selectedDoctorId) {
                            fetch("../BE_ChatBox/send_doctor_msg.php", {
                                method: "POST",
                                body: new URLSearchParams({
                                    message: message,
                                    sender: adminId,
                                    receiver: selectedDoctorId
                                }),
                                headers: {
                                    "Content-Type": "application/x-www-form-urlencoded"
                                }
                            })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data);
                                loadMessages();
                                document.getElementById("messageInput").value = "";
                            })
                            .catch(error => console.error("Error sending message:", error));
                        } else {
                            alert("Please select a doctor and type a message.");
                        }
                    });
        </script>
        <script>
            function updateChatDoctor() {
                const doctorSelect = document.getElementById("doctorSelect");
                const selectedDoctorId = doctorSelect.value;
                const selectedDoctorName = doctorSelect.options[doctorSelect.selectedIndex].text;
                const doctorNameDisplay = document.getElementById("doctorName");

                if (selectedDoctorId) {
                    doctorNameDisplay.textContent = selectedDoctorName;
                    loadMessages();
                } else {
                    doctorNameDisplay.textContent = "--";
                    document.getElementById("chatBox").innerHTML = "<p>Please select a doctor to view messages.</p>";
                }
            }
        </script>
    </body>
</html>