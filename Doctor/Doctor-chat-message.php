<?php
session_start();

// Check if the user is logged in and has the correct role (doctor)
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'doctor') {
    header("Location: loginPage.html");
    exit(); 
}

$doctorId = $_SESSION['id'];

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
            width:1230px;
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
            align-items: center;
        }
        .icon-container {
            position: relative;
            margin-right: 10px;
            cursor: pointer;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            display: none; 
            position: absolute;
            top: -40px;
            left: 0;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px 0;
            z-index: 10;
        }

        .dropdown-item {
            display: block;
            padding: 8px 15px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }
        .plus-icon {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            cursor: pointer;
        }

        /* Plus Icon Style */
        .plus-icon i {
            font-size: 20px;
            color: #0084ff;
        }

        .plus-icon:hover .link-icons {
            display: flex;
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
                        <a href="../Doctor/doctorDashboard.php">
                            <i class='bx bxs-dashboard' ></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="../Doctor/doctorDashPatients.php">
                            <i class='bx bxs-shopping-bag-alt' ></i>
                            <span class="text">Patients</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="../Doctor/Doctor-chat-message.php">
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
                <!-- MAIN -->
                <div class="chat-container">
                    <header class="chat-header"><h2>Chat with Admin</h2></header>
                    <div id="chatBox" class="chat-box">
                        <!---Backend will fill-in it---->
                    </div>
                    <div class="chat-input-area">
                        <div class="icon-container" id="iconContainer">
                            <i class="bx bx-plus" id="plusIcon"></i>
                            <div class="dropdown-menu" id="dropdownMenu">
                                <a href="https://wa.me/1234567890" class="dropdown-item">WhatsApp</a>
                                <a href="mailto:someone@example.com" class="dropdown-item">Email</a>
                            </div>
                        </div>
                        <input type="text" id="messageInput" placeholder="Type a message" />
                        <button id="sendBtn">Send</button>
                    </div>
                </div>
            </section>
            

            <script>
                let senderId = <?php echo $_SESSION['id']; ?>;
                let receiverId = 1; //Admin id

                function loadMessages() {
                    fetch(`../BE_ChatBox/getMessages.php?sender=${senderId}&receiver=${receiverId}`)
                        .then(response => response.text())
                        .then(data => {
                            const chatBox = document.getElementById('chatBox');
                            chatBox.innerHTML = data; // Update chatBox with the messages
                        })
                        .catch(error => {
                            console.error("Error fetching messages:", error);
                        });
                }

                document.getElementById('sendBtn').addEventListener('click', () => {
                    const message = document.getElementById('messageInput').value;
                    if (message.trim() !== "") {
                        fetch('../BE_ChatBox/sendMessage.php', {
                            method: 'POST',
                            body: new URLSearchParams({
                                message: message,
                                sender: senderId,
                                receiver: receiverId
                            }),
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        })
                        .then(response => response.text())
                        .then(data => {
                            console.log(data);
                            loadMessages(); // Reload messages after sending a new one
                            document.getElementById('messageInput').value = ''; // Clear the message input field
                        })
                        .catch(error => {
                            console.error("Error sending message:", error);
                        });
                    }
                });

                // Load messages when the page loads
                loadMessages();
            </script>

            <script> 
                document.getElementById('plusIcon').addEventListener('click', function(event) {
                    const dropdownMenu = document.getElementById('dropdownMenu');
                    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
                    
                    event.stopPropagation();
                });

                document.addEventListener('click', function(event) {
                    const dropdownMenu = document.getElementById('dropdownMenu');
                    const iconContainer = document.getElementById('iconContainer');
                    
                    if (!iconContainer.contains(event.target)) {
                        dropdownMenu.style.display = 'none';
                    }
                });

                document.getElementById('iconContainer').addEventListener('mouseleave', function() {
                    const dropdownMenu = document.getElementById('dropdownMenu');
                    dropdownMenu.style.display = 'none';
                });
            </script>
        </body>
    </html>