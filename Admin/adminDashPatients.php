<?php
session_start();
include("../inc/dbCon.php"); 
$doctorQuery = "SELECT id, fullname FROM user WHERE role = 'doctor'";
$doctorResult = $db->query($doctorQuery);
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="../css/dashboard.css">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        

        <title>AdminHub</title>
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

            .status.upcoming {
                background-color: #28a745; 
            }

            .status.completed {
                background-color: #007bff; 
            }

            .status.cancelled {
                background-color: #dc3545; 
            }

            .actions {
                text-align: center;
            }

            .actions a {
                text-decoration: none;
                padding: 8px 12px;
                color: #fff;
                border-radius: 5px;
                margin-right: 5px;
                font-size: 14px;
                transition: background-color 0.3s, transform 0.2s; 
            }

            .actions a.btn-edit {
                background-color: #007bff; 
            }

            .actions a.btn-edit:hover {
                background-color: #0056b3; 
                transform: scale(1.05); 
            }

            .actions a.btn-delete {
                background-color: #dc3545;
            }

            .actions a.btn-delete:hover {
                background-color: #c82333;
                transform: scale(1.05); 
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

            .form-group select {
                border: 1px solid #ccc; 
                border-radius: 4px;
                padding: 8px;
                width: 100%; 
            }

            .form-group label {
                display: block; 
                margin-bottom: 5px;
                font-weight: bold;
            }


            /* Media Queries for responsiveness */
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
                <span class="text">AdminHub</span>
            </div>
            <ul class="side-menu top">
                <li>
                    <a href="../Admin/adminDashboard.php">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="active">
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
                <li>
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
        <!-- SIDEBAR -->
        <section id="content">
            <!-- NAVBAR -->
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
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="appointment-table-body">
                            <?php
                                $statusArray = ['0' => 'upcoming', '1' => 'completed', '2' => 'cancelled'];
                                $genderArray = ['0' => 'Female', '1' => 'Male'];

                                $query = "SELECT appointment.id, appointment.patient_name, appointment.appt_date, appointment.appt_time, 
                                                appointment.age, appointment.gender, services.service_name AS service_name, 
                                                user.fullname AS doctor_name, appointment.status
                                        FROM appointment 
                                        LEFT JOIN services ON appointment.services = services.id 
                                        LEFT JOIN user ON appointment.doctor = user.id";
                                $result = $db->query($query);
                                $counter = 1;

                                while ($appointment = $result->fetch_assoc()) {
                                    $apptTime = DateTime::createFromFormat('H:i:s', $appointment['appt_time']);
                                    $formattedTime = $apptTime ? $apptTime->format('h:i A') : '';

                                    $gender = $genderArray[$appointment['gender']] ?? 'Unknown';
                                    $status = $statusArray[$appointment['status']] ?? 'Unknown';

                                    echo "<tr>
                                        <td>{$counter}</td>
                                        <td>{$appointment['patient_name']}</td>
                                        <td>{$appointment['appt_date']}</td>
                                        <td>{$formattedTime}</td>
                                        <td>{$appointment['age']}</td>
                                        <td>{$gender}</td>
                                        <td>{$appointment['service_name']}</td>
                                        <td>" . ($appointment['doctor_name'] ?? 'Not assigned') . "</td>
                                        <td><span class='status-" . strtolower($status) . "'>{$status}</span></td>
                                        <td>
                                            <button class='btn btn-primary' data-toggle='modal' data-target='#editPatientModal' 
                                            data-id='{$appointment['id']}' 
                                            data-name='{$appointment['patient_name']}' 
                                            data-date='{$appointment['appt_date']}' 
                                            data-time='{$appointment['appt_time']}' 
                                            data-status='{$status}' 
                                            data-doctor='" . ($appointment['doctor_name'] ?? 'Not assigned') . "'>
                                            <i class='bi bi-pencil-square'></i></button>
                                        </td>
                                    </tr>";
                                    $counter++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Modal to Edit Appointment -->
        <div class="modal fade" id="editPatientModal" tabindex="-1" role="dialog" aria-labelledby="editPatientModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPatientModalLabel">Edit Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editAppointmentForm">
                            <div class="form-group">
                                <label for="patientName">Patient Name</label>
                                <input type="text" class="form-control" id="patientName" name="patient_name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="apptDate">Appointment Date</label>
                                <input type="date" class="form-control" id="apptDate" name="appt_date" readonly>
                            </div>
                            <div class="form-group">
                                <label for="apptTime">Appointment Time</label>
                                <input type="time" class="form-control" id="apptTime" name="appt_time" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" value={selectedPatient.status} onChange={handleStatusChange}>
                                    <option value="0">Up Coming</option>
                                    <option value="1">Completed</option>
                                    <option value="2">Cancelled</option>
                                </select>
                                <input type="hidden" id="appointmentId" name="appointment_id">
                            </div>
                            <div class="form-group">
                                <label for="doctor">Doctor</label>
                                <input type="text" class="form-control" id="doctor" name="doctor" readonly>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="saveChangesButton" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#editPatientModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); 
                    var status = button.data('status'); 
                    var statusMap = {
                        'upcoming': 0,
                        'completed': 1,
                        'cancelled': 2
                    };

                    $('#status').val(statusMap[status]); 
                });
            });

        </script>
        <script>
        $('#editPatientModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var date = button.data('date');
            var time = button.data('time');
            var status = button.data('status');
            var doctor = button.data('doctor');

            var modal = $(this);
            modal.find('#appointmentId').val(id);
            modal.find('#patientName').val(name);
            modal.find('#apptDate').val(date);
            modal.find('#apptTime').val(time);
            modal.find('#status').val(status);
            modal.find('#doctor').val(doctor);
        });
        </script>
        <script>
            $(document).ready(function() {
                $('#saveChangesButton').click(function() {
                    const formData = $('#editAppointmentForm').serialize();
                    
                    $.ajax({
                        url: '../Admin/adminUpdate_patients.php', 
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            $('#editPatientModal').modal('hide');
                            alert("Appointment updated successfully!");
                            location.reload(); 
                        },
                        error: function(xhr, status, error) {
                            console.error("Error: " + error);
                            alert("An error occurred. Please try again.");
                        }
                    });
                });
            });
        </script>
    </body>
</html>