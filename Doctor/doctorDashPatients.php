<?php
session_start();
include("../inc/dbCon.php");

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'doctor') {
    header("Location: loginPage.html");
    exit();
}

$doctorId = $_SESSION['id'];

$query = "
    SELECT 
        appointment.id, 
        appointment.patient_name, 
        appointment.appt_date, 
        appointment.appt_time, 
        appointment.age, 
        appointment.gender, 
        appointment.status,
        services.service_name AS service_name,
        user.fullname AS doctor_name
    FROM appointment 
    LEFT JOIN services ON appointment.services = services.id
    LEFT JOIN user ON appointment.doctor = user.id
    WHERE appointment.doctor = ?";

$stmt = $db->prepare($query);
$stmt->bind_param("i", $doctorId);
$stmt->execute();
$result = $stmt->get_result();

$statusArray = ['0' => 'Upcoming', '1' => 'Completed', '2' => 'Cancelled'];
$genderArray = ['0' => 'Female', '1' => 'Male'];
?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Appointment Schedule</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <link rel="stylesheet" href="../css/dashboard.css">
            <link rel="icon" href="../favicon.ico" type="image/x-icon">
            

            <title>DoctorHub</title>
            <style>
                /* CONTENT */
                #content {
                    position: relative;
                    width: calc(100% - 280px);
                    left: 280px;
                    transition: .3s ease;
                }

                #sidebar.hide ~ #content {
                    width: calc(100% - 60px);
                    left: 60px;
                }

                /* Container styles */
                .container {
                    margin: 20px;
                    padding: 10px;
                    background-color: rgba(255, 255, 255, 0.8);
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
                    border-radius: 8px; 
                    max-width: 100%; 
                    height: 780px; 
                    overflow-y: auto; 
                }

                h2 {
                    text-align: center;
                    margin-bottom: 20px;
                    color: #333;
                }

                /* Table styles */
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                table thead {
                    background-color: #f8f8f8;
                }

                table thead th {
                    padding: 10px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                    font-size: 16px;
                }

                table tbody tr {
                    border-bottom: 1px solid #ddd;
                }
                table tbody tr:hover {
                    background-color: #f1f1f1;
                }


                table tbody td {
                    font-size: 16px; 
                    line-height: 1.5; 
                }

                .status {
                    padding: 5px 10px;
                    border-radius: 5px;
                    color: #fff;
                    font-weight: bold;
                    display: inline-block;
                    font-size: 13px;
                }

                .status-upcoming {
                    background-color: #007bff; 
                    color: #ffffff; 
                    padding: 5px 10px; 
                    border-radius: 5px; 
                    border: 1px solid #007bff; 
                    font-size: 14px; 
                }

                .status-completed {
                    background-color: #28a745; 
                    color: #ffffff;
                    padding: 5px 10px;
                    border-radius: 5px;
                    border: 1px solid #28a745;
                    font-size: 14px; 
                }

                .status-cancelled {
                    background-color: #dc3545;
                    color: #ffffff;
                    padding: 5px 10px;
                    border-radius: 5px;
                    border: 1px solid #dc3545;
                    font-size: 14px; 
                }


                @media (max-width: 768px) {
                    table, th, td {
                        font-size: 12px;
                    }

                    .container {
                        margin: 10px;
                        padding: 5px;
                    }

                    .actions a {
                        font-size: 12px;
                    }
                }

            </style>
        </head>
        <body>
            <!-- SIDEBAR -->
            <section id="sidebar">
                <div class="brand">
                    <i class='bx bxs-smile'></i>
                    <span class="text">DoctorHub</span>
                </div>
                <ul class="side-menu top">
                    <li>
                        <a href="../Doctor/doctorDashboard.php">
                            <i class='bx bxs-dashboard' ></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="../Doctor/doctorDashPatients.php">
                            <i class='bx bxs-shopping-bag-alt' ></i>
                            <span class="text">Patients</span>
                        </a>
                    </li>
                    <li>
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
                <nav>
                    <i class='bx bx-menu' ></i>
                    <a href="#" class="nav-link">Categories</a>
                </nav>
                <div class="background-cover">
                    <div class="container">
                        <h2>Patients Appointment</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Patient Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Service</th>
                                    <th>Doctor</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $counter = 1;
                                    while ($appointment = $result->fetch_assoc()) {
                                        $statusKey = $statusArray[$appointment['status']] ?? 'unknown';
                                        $statusClass = 'status-' . strtolower($statusKey);

                                        echo "<tr>";
                                        echo "<td>" . $counter++ . "</td>";
                                        echo "<td>" . $appointment['patient_name'] . "</td>";
                                        echo "<td>" . $appointment['appt_date'] . "</td>";
                                        echo "<td>" . date("h:i A", strtotime($appointment['appt_time'])) . "</td>";
                                        echo "<td>" . $appointment['age'] . "</td>";
                                        echo "<td>" . ($genderArray[$appointment['gender']] ?? 'Unknown') . "</td>";
                                        echo "<td>" . ($appointment['service_name'] ?? 'Not Specified') . "</td>";
                                        echo "<td>" . $appointment['doctor_name'] . "</td>";
                                        echo "<td><span class='status $statusClass'>" . ucfirst($statusKey) . "</span></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </body>
    </html>