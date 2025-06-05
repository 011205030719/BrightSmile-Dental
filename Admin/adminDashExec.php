<?php
session_start();
include("../inc/dbCon.php");

$newOrdersQuery = "SELECT COUNT(*) as count FROM appointment WHERE appt_date >= CURDATE()";
$newOrdersResult = mysqli_query($db, $newOrdersQuery);
$newOrdersRow = mysqli_fetch_assoc($newOrdersResult);
$_SESSION['newOrdersCount'] = $newOrdersRow['count'];

$visitorsQuery = "SELECT COUNT(*) as count FROM contact_info";
$visitorsResult = mysqli_query($db, $visitorsQuery);
$visitorsRow = mysqli_fetch_assoc($visitorsResult);
$_SESSION['visitorsCount'] = $visitorsRow['count'];

$totalSalesQuery = "SELECT COUNT(*) as count FROM appointment";
$totalSalesResult = mysqli_query($db, $totalSalesQuery);
$totalSalesRow = mysqli_fetch_assoc($totalSalesResult);
$_SESSION['totalSalesCount'] = $totalSalesRow['count'];

$todayAppointmentsQuery = "
    SELECT a.*, u.fullname AS doctor_name, s.service_name
    FROM appointment a
    JOIN user u ON a.doctor = u.id
    JOIN services s ON a.services = s.id
    WHERE a.appt_date = CURDATE()
";

$todayAppointmentsResult = mysqli_query($db, $todayAppointmentsQuery);
$todayAppointments = [];
while ($row = mysqli_fetch_assoc($todayAppointmentsResult)) {
    $todayAppointments[] = $row;
}

header('Content-Type: application/json');
echo json_encode([
    'totalUpcomingPatients' => $_SESSION['newOrdersCount'],
    'totalPatients' => $_SESSION['visitorsCount'],
    'totalBooked' => $_SESSION['totalSalesCount'],
    'todayAppointments' => $todayAppointments 
]);
exit();
?>
