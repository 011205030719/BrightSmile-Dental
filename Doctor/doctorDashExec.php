<?php
session_start();
include("../inc/dbCon.php");

$newOrdersQuery = "
    SELECT COUNT(*) as count 
    FROM appointment 
    WHERE appt_date > CURDATE() AND doctor = '{$_SESSION['id']}'
";
$newOrdersResult = mysqli_query($db, $newOrdersQuery);
$newOrdersRow = mysqli_fetch_assoc($newOrdersResult);
$_SESSION['newOrdersCount'] = $newOrdersRow['count']; 

$user_id = $_SESSION['id']; 
$patientsQuery = "
    SELECT COUNT(*) as count 
    FROM appointment a
    WHERE a.doctor = '$user_id'
";
$patientsResult = mysqli_query($db, $patientsQuery);
$patientsRow = mysqli_fetch_assoc($patientsResult);
$_SESSION['totalPatients'] = $patientsRow['count']; 

$todayAppointmentsQuery = "
    SELECT a.*, u.fullname AS doctor_name, s.service_name
    FROM appointment a
    JOIN user u ON a.doctor = u.id
    JOIN services s ON a.services = s.id
    WHERE a.appt_date = CURDATE() AND a.doctor = '$user_id'
";
$todayAppointmentsResult = mysqli_query($db, $todayAppointmentsQuery);
$todayAppointments = [];
while ($row = mysqli_fetch_assoc($todayAppointmentsResult)) {
    $todayAppointments[] = $row;
}

$upcomingAppointmentsQuery = "
    SELECT a.*, u.fullname AS doctor_name, s.service_name
    FROM appointment a
    JOIN user u ON a.doctor = u.id
    JOIN services s ON a.services = s.id
    WHERE a.appt_date > CURDATE() AND a.doctor = '$user_id'
";
$upcomingAppointmentsResult = mysqli_query($db, $upcomingAppointmentsQuery);
$upcomingAppointments = [];
while ($row = mysqli_fetch_assoc($upcomingAppointmentsResult)) {
    $upcomingAppointments[] = $row;
}

header('Content-Type: application/json');
echo json_encode([
    'totalUpcomingPatients' => $_SESSION['newOrdersCount'],
    'totalPatients' => $_SESSION['totalPatients'], 
    'todayAppointments' => $todayAppointments, 
    'upcomingAppointments' => $upcomingAppointments 
]);
exit();
?>
