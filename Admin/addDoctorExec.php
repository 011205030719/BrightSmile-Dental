<?php
include('../inc/dbCon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $role = 'doctor';


$query = "INSERT INTO user (fullname, email, gender, status, role) 
          VALUES ('$name', '$email', '$gender', '$status', '$role')";
if (mysqli_query($db, $query)) {
    $user_id = mysqli_insert_id($db);

    if (!empty($_POST['txtService'])) {
        foreach ($_POST['txtService'] as $service_id) {
            $service_id = mysqli_real_escape_string($db, $service_id);

            // Fetch the service_name based on the service_id
            $service_query = "SELECT service_name FROM services WHERE id = '$service_id'";
            $service_result = mysqli_query($db, $service_query);

            if ($service_row = mysqli_fetch_assoc($service_result)) {
                $service_name = mysqli_real_escape_string($db, $service_row['service_name']);

                // Insert the service_name into the services table for the user
                $insert_service_query = "INSERT INTO services (user_id, service_name) 
                                          VALUES ('$user_id', '$service_name')";
                mysqli_query($db, $insert_service_query);
            }
        }
    }

    echo "New doctor added successfully.";
    header("Location: adminDashDoctors.php");
} else {
    echo "Error: " . mysqli_error($db);
}

}
?>
