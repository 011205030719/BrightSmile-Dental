<?php
session_start();
include("../inc/dbCon.php");
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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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

            .form-select {
                border: none; 
                background: transparent; 
                font-size: 16px; 
                color: #333; 
                appearance: none; 
                padding: 5px 10px; 
                cursor: pointer;
            }

            .form-select:focus {
                outline: none; 
                box-shadow: none; 
            }

            .form-select option {
                color: #333; 
            }

            .select-wrapper {
                position: relative;
                display: inline-block;
            }

            .select-wrapper::after {
                content: '▾'; 
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                pointer-events: none;
                font-size: 12px;
                color: #999;
            }

            .form-select {
                border: none;
                background: transparent;
                font-size: 16px;
                color: #333;
                appearance: none;
                padding: 5px 30px 5px 10px; 
                cursor: pointer;
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

            .form {
                display: block;
                width: 100%;
                height: calc(1.5em + .75rem + 2px);
                padding: .375rem .75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                border-radius: .25rem;
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
                <li>
                    <a href="../Admin/adminDashPatients.php">
                        <i class='bx bxs-shopping-bag-alt' ></i>
                        <span class="text">Patients</span>
                    </a>
                </li>
                <li class="active">
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

        <section id="content">
            <!-- NAVBAR -->
            <nav>
                <i class='bx bx-menu' ></i>
                <a href="#" class="nav-link">Categories</a>
            </nav>
            <div class="background-cover">
                <div class="container">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h2 style="flex: 1; text-align: center;">Doctors</h2>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal" style="margin-right: 5%;">Add New Doctor</button>
                        <!-- Modal -->
                        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createModalTitle">Create New Doctor</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            &times; 
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../Admin/addDoctorExec.php" method="POST"> <!-- Form submission to PHP script -->
                                            <div class="row" style="text-align: start;">
                                                <div class="col-6 form-group mb-2">
                                                    <label for="name" style="font-weight: 500;" class="mb-2">Name</label>
                                                    <input required type="text" id="name" class="form-control" name="name" placeholder="Enter User name">
                                                </div>
                                                <div class="col-6 form-group mb-2">
                                                    <label for="email" style="font-weight: 500;" class="mb-2">Email</label>
                                                    <input required type="email" id="email" class="form-control" name="email" placeholder="Enter Email">
                                                </div>
                                                <div class="col-6 form-group mb-2">
                                                    <label for="gender" style="font-weight: 500;" class="mb-2">Gender</label>
                                                    <select name="gender" id="gender" class="form form-select" style="border: 1px solid #ccc; padding: 8px;">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 form-group mb-2">
                                                    <label for="service_id" class="mb-2">Services</label>
                                                    <?php
                                                    $servicesResult = mysqli_query($db, "SELECT DISTINCT service_name FROM services");
                                                    
                                                    $displayed_services = [];

                                                    while ($service = mysqli_fetch_assoc($servicesResult)) {
                                                        if (!in_array($service['service_name'], $displayed_services)) {
                                                            $displayed_services[] = $service['service_name'];
                                                            
                                                            $service_id_query = "SELECT id FROM services WHERE service_name = '{$service['service_name']}' LIMIT 1";
                                                            $service_id_result = mysqli_query($db, $service_id_query);
                                                            $service_id_row = mysqli_fetch_assoc($service_id_result);
                                                            $service_id = $service_id_row['id'];

                                                            echo "<div class=\"form-check\">";
                                                            echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"txtService[]\" value=\"{$service_id}\" id=\"service{$service_id}\" style=\"border: 1px solid #ccc;\">";
                                                            echo "<label class=\"form-check-label\" for=\"service{$service_id}\" style=\"font-weight: normal;\">{$service['service_name']}</label>";
                                                            echo "</div>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-6 form-group mb-2">
                                                    <label for="status" style="font-weight: 500;" class="mb-2">Status</label>
                                                    <select name="status" id="status" class="form form-select" style="border: 1px solid #ccc; padding: 8px;">
                                                        <option value="0">Active</option>
                                                        <option value="1">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Doctor Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Provide Services</th>
                                <th>Status</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="doctor-table-body">
                            <?php
                                $query = "SELECT u.id AS user_id, u.fullname AS doctor_name, u.email, u.gender, u.status 
                                        FROM user u
                                        WHERE u.role = 'doctor'";
                                $result = $db->query($query);

                                if ($result) {
                                    $no = 1;
                                    while ($doctor = $result->fetch_assoc()) {
                                        $doctorId = $doctor['user_id'];
                                        $doctorName = $doctor['doctor_name'];
                                        $doctorEmail = $doctor['email'];
                                        $doctorGender = $doctor['gender'];
                                        $doctorStatus = $doctor['status'] == 0 ? 'Active' : 'Inactive'; 
                                        $statusClass = $doctor['status'] == 0 ? 'badge bg-success' : 'badge bg-danger';

                                        $serviceQuery = "SELECT service_name FROM services WHERE user_id = $doctorId";
                                        $serviceResult = $db->query($serviceQuery);
                                        $services = [];
                                        while ($serviceRow = $serviceResult->fetch_assoc()) {
                                            $services[] = $serviceRow['service_name'];
                                        }
                            ?>
                            <tr class="table_row">
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $doctorName ?></td>
                                <td><?= $doctorGender ?></td>
                                <td><?= $doctorEmail ?></td>
                                <td>
                                    <select class="form-select">
                                        <?php foreach ($services as $service) { ?>
                                            <option><?= $service ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><span class="<?= $statusClass ?> text-white"><?= $doctorStatus ?></span></td>
                                <td class="actions">
                                    <a href="#" class="btn btn-edit" data-bs-toggle="modal" 
                                    data-bs-target="#editDoctorModal" 
                                    data-id="<?= $doctorId ?>" 
                                    data-name="<?= $doctorName ?>" 
                                    data-email="<?= $doctorEmail ?>" 
                                    data-gender="<?= $doctorGender ?>" 
                                    data-status="<?= $doctor['status'] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                                        
                    <!-- Modal -->
                    <div class="modal fade" id="editDoctorModal" tabindex="-1" aria-labelledby="editDoctorModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editDoctorModalLabel">Edit Doctor Information</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editDoctorForm">
                                        <div class="mb-3">
                                            <label for="doctorName" class="form-label">Doctor Name</label>
                                            <input type="text" class="form-control" id="doctorName" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="doctorEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="doctorEmail" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 form-group mb-2">
                                                <label for="doctorStatus" class="form-label" style="font-weight: 500;">Status</label>
                                                <select name="status" id="doctorStatus" class="form">
                                                    <option value="0">Active</option>
                                                    <option value="1">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="col-6 form-group mb-2">
                                                <label for="doctorGender" class="form-label" style="font-weight: 500;">Gender</label>
                                                <select name="gender" id="doctorGender" class="form">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/dashboard.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll('.btn-edit').forEach(function(button) {
                    button.addEventListener('click', function(event) {
                        const doctorId = event.target.closest('a').getAttribute('data-id');
                        const doctorName = event.target.closest('a').getAttribute('data-name');
                        const doctorEmail = event.target.closest('a').getAttribute('data-email');
                        const doctorGender = event.target.closest('a').getAttribute('data-gender');
                        const doctorStatus = event.target.closest('a').getAttribute('data-status');

                        document.getElementById('doctorName').value = doctorName;
                        document.getElementById('doctorEmail').value = doctorEmail;
                        document.getElementById('doctorGender').value = doctorGender;
                        document.getElementById('doctorStatus').value = doctorStatus;

                        const form = document.getElementById('editDoctorForm');
                        form.onsubmit = function(event) {
                            event.preventDefault();
                            updateDoctorInfo(doctorId);
                        };
                    });
                });
            });

            function updateDoctorInfo(doctorId) {
                const doctorName = document.getElementById('doctorName').value;
                const doctorEmail = document.getElementById('doctorEmail').value;
                const doctorGender = document.getElementById('doctorGender').value;
                const doctorStatus = document.getElementById('doctorStatus').value;

                const formData = new FormData();
                formData.append('id', doctorId);
                formData.append('fullname', doctorName);
                formData.append('email', doctorEmail);
                formData.append('gender', doctorGender);
                formData.append('status', doctorStatus);

                fetch('../Admin/adminUpdate_doctor.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Doctor information updated successfully!');
                        window.location.reload();  
                    } else {
                        alert('Failed to update doctor information');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        </script>

    </body>
</html>
