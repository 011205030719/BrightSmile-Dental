<?php
include("inc/dbCon.php");

if (isset($_POST['service_id'])) {
    $service_id = mysqli_real_escape_string($db, $_POST['service_id']);
    
    $serviceQuery = "SELECT service_name FROM services WHERE id = '$service_id'";
    $serviceResult = mysqli_query($db, $serviceQuery);
    
    if ($serviceResult && mysqli_num_rows($serviceResult) > 0) {
        $service = mysqli_fetch_assoc($serviceResult);
        $service_name = $service['service_name'];
        
        $doctorsQuery = "
            SELECT u.id, u.fullname 
            FROM user u 
            JOIN services s ON u.id = s.user_id 
            WHERE s.service_name = '$service_name' AND u.role = 'doctor' AND u.status = 0
        ";

        $doctorsResult = mysqli_query($db, $doctorsQuery);
        
        if ($doctorsResult) {
            if (mysqli_num_rows($doctorsResult) > 0) {
                $options = "";
                while ($doctor = mysqli_fetch_assoc($doctorsResult)) {
                    $options .= "<option value=\"{$doctor['id']}\">{$doctor['fullname']}</option>";
                }
                echo $options; 
            } else {
                echo "<option value=\"\">No doctors available</option>";
            }
        } else {
            echo "<option value=\"\">Query error: " . mysqli_error($db) . "</option>";
        }
    } else {
        echo "<option value=\"\">Service not found</option>";
    }
}
?>
