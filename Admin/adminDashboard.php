<?php
session_start();
$newOrdersCount = isset($_SESSION['newOrdersCount']) ? $_SESSION['newOrdersCount'] : 0;
$visitorsCount = isset($_SESSION['visitorsCount']) ? $_SESSION['visitorsCount'] : 0;
$totalSalesCount = isset($_SESSION['totalSalesCount']) ? $_SESSION['totalSalesCount'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Boxicons -->
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<!-- My CSS -->
		<link rel="stylesheet" href="../css/dashboard.css">

		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js"></script>
		<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
		<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script> 
		<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
		<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

		<title>AdminHub</title>
		<style>
			.no-appointments {
				text-align: center;      
				color: #ccc;             
				font-style: italic;      
				font-size: 16px;         
				padding: 20px 0;         
				background-color: #f9f9f9; 
			}
		</style>
	</head>
	<body>
		<section id="sidebar">
			<div class="brand">
				<i class='bx bxs-smile'></i>
				<span class="text">AdminHub</span>
			</div>

			<ul class="side-menu top">
				<li class="active">
					<a href="#">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="adminDashPatients.php">
						<i class='bx bxs-shopping-bag-alt' ></i>
						<span class="text">Patients</span>
					</a>
				</li>
				<li>
					<a href="adminDashDoctors.php">
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
		<!-- CONTENT -->
		<section id="content">
			<!-- NAVBAR -->
			<nav>
				<i class='bx bx-menu' ></i>
				<a href="#" class="nav-link">Categories</a>
			</nav>
			<main>
				<div class="head-title">
					<div class="left">
						<h1>Dashboard</h1>
					</div>
				</div>

				<ul class="box-info">
					<li>
						<i class='bx bxs-calendar-check'></i>
						<span class="text">
							<h3 id="totalUpcomingPatients"><?= $newOrdersCount ?></h3>
							<p>Total Upcoming Patients</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-group'></i>
						<span class="text">
							<h3 id="totalPatients"><?= $visitorsCount ?></h3>
							<p>Total Patients</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-dollar-circle'></i>
						<span class="text">
							<h3 id="totalBooked">$<?= $totalSalesCount ?></h3>
							<p>Total Booked</p>
						</span>
					</li>
				</ul>

				<div class="table-data">
					<div class="order" style="flex-basis: 400px; font-size:14px;">
						<div class="head">
							<h3>Up Coming Appointments</h3>
							<i class='bx bx-search' ></i>
							<i class='bx bx-filter' ></i>
						</div>
						<table>
							<thead>
								<tr>
									<th>Patients</th>
									<th>Date</th>
									<th>Time</th>
									<th>Doctor</th>
									<th>Services</th>
								</tr>
							</thead>
							<tbody>
								<!---js fill in here--->
							</tbody>
						</table>
					</div>
					<div class="todo" style="flex-basis: 230px;">
						<div class="head">
							<h3>Calendar</h3>
							<i class='bx bx-calendar'></i>
						</div>
						<div class="calendar" id="calendar"></div>
					</div>
				</div>
			</main>
		</section>

		<script src="../js/dashboard.js"></script>
		<script>
			fetch('adminDashExec.php') 
				.then(response => response.json())
				.then(data => {
					document.getElementById('totalUpcomingPatients').textContent = data.totalUpcomingPatients;
					document.getElementById('totalPatients').textContent = data.totalPatients;
					document.getElementById('totalBooked').textContent = `$${data.totalBooked}`;

					const appointmentsTableBody = document.querySelector('tbody'); 
					appointmentsTableBody.innerHTML = '';

					if (data.todayAppointments.length === 0) {
						const row = document.createElement('tr');
						row.innerHTML = `
							<td colspan="5" class="no-appointments">No appointments today</td>
						`;
						appointmentsTableBody.appendChild(row);
					} else {
						data.todayAppointments.forEach(appointment => {
							const row = document.createElement('tr');
							row.innerHTML = `
								<td>
									<p>${appointment.patient_name}</p> 
								</td>
								<td>${appointment.appt_date}</td>
								<td>${appointment.appt_time}</td> 
								<td>${appointment.doctor_name}</td> 
								<td>${appointment.service_name}</td> 
							`;
							appointmentsTableBody.appendChild(row);
						});
					}
				})
				.catch(error => console.error('Error fetching data:', error));
		</script>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				var calendarEl = document.getElementById('calendar');

				var calendar = new FullCalendar.Calendar(calendarEl, {
					initialView: 'dayGridMonth',
				});

				calendar.render();
			});
		</script>
	</body>
</html>