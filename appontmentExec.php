<?php
session_start();
include("inc/dbCon.php");
include("emailExec.php");

$servicesQuery = "SELECT id, service_name FROM services";
$servicesResult = mysqli_query($db, $servicesQuery);
$services = [];
while ($row = mysqli_fetch_assoc($servicesResult)) {
    $services[$row['id']] = $row['service_name']; // Store service name by ID
}

// Fetch doctors with their emails
$doctorsQuery = "SELECT id, email, fullname FROM user WHERE role='doctor'";
$doctorsResult = mysqli_query($db, $doctorsQuery);
$doctors = [];
while ($row = mysqli_fetch_assoc($doctorsResult)) {
    $doctors[$row['id']] = $row; // Store doctor data by ID
}

if (isset($_POST['btnAppt'])) {
    $name = mysqli_real_escape_string($db, $_POST['contactName']);
    $phone_number = mysqli_real_escape_string($db, $_POST['contactPhone']);
    $email = mysqli_real_escape_string($db, $_POST['contactEmail']);
    
    // Insert contact information
    $insertContactQuery = "INSERT INTO contact_info (name, phone_number, email) 
                           VALUES ('$name', '$phone_number', '$email')";
    $contactResult = mysqli_query($db, $insertContactQuery);

    if ($contactResult) {
        $contact_info_id = mysqli_insert_id($db); 

        $appointmentsByDoctor = [];
        $allAppointments = [];
        
        foreach ($_POST['txtPatientName'] as $index => $patient_name) {
            $age = mysqli_real_escape_string($db, $_POST['txtAge'][$index]);
            $gender = isset($_POST['txtGender'][$index]) ? mysqli_real_escape_string($db, $_POST['txtGender'][$index]) : null;
            $service_id = mysqli_real_escape_string($db, $_POST['txtService'][$index]);
            $doctor_id = mysqli_real_escape_string($db, $_POST['txtDoctor'][$index]); // Use doctor ID
            $appt_date = mysqli_real_escape_string($db, $_POST['txtDate'][$index]);
            $appt_time = mysqli_real_escape_string($db, $_POST['txtTime'][$index]);
        
            if ($gender === null) {
                echo "<script>alert('Please select a gender for all appointments.');</script>"; 
                echo "<script>setTimeout(function(){ window.location.href = 'appointment.html'; }, 600);</script>";
                exit();
            }
            if (!isset($name) || !preg_match("/^[a-zA-Z\s]+$/", $name)) {
                die("Invalid name. Please enter a valid name.");
            }
            
            if (!isset($phone_number) || !is_numeric($phone_number) || strlen($phone_number) > 11) {
                die("Invalid phone number. Please enter a number up to 11 digits.");
            }

            // Fetch service name using the service_id
            $serviceQuery = "SELECT service_name FROM services WHERE id = '$service_id'";
            $serviceResult = mysqli_query($db, $serviceQuery);
            $serviceRow = mysqli_fetch_assoc($serviceResult);
            $service_name = $serviceRow['service_name'] ?? 'Unknown Service';
        
            // Fetch doctor name using the doctor_id
            $doctorName = $doctors[$doctor_id]['fullname'] ?? 'Unknown Doctor';
        
            $appointmentDetails = [
                'patient_name' => $patient_name,
                'age' => $age,
                'gender' => $gender,
                'service_name' => $service_name,
                'doctor_name' => $doctorName,
                'appt_date' => $appt_date,
                'appt_time' => $appt_time,
            ];
        
            // Insert appointment information
            $insertAppointmentQuery = "INSERT INTO appointment (contact_info_id, patient_name, age, gender, services, doctor, appt_date, appt_time) 
                                       VALUES ('$contact_info_id', '$patient_name', '$age', '$gender', '$service_id', '$doctor_id', '$appt_date', '$appt_time')";
            $appointmentResult = mysqli_query($db, $insertAppointmentQuery);
        
            if (!$appointmentResult) {
                $error = "Appointment failed! Please try again.";
                echo "<script>alert('{$error}');</script>"; 
                echo "<script>setTimeout(function(){ window.location.href = 'appointment.php'; }, 600);</script>";
                exit();
            }
        
            // Group appointments by doctor
            if (!isset($appointmentsByDoctor[$doctor_id])) {
                $appointmentsByDoctor[$doctor_id] = [];
            }
            $appointmentsByDoctor[$doctor_id][] = $appointmentDetails;
        
            // Collect all appointments for the patient
            $allAppointments[] = $appointmentDetails;
        }
        
        // Send email to doctors
        foreach ($appointmentsByDoctor as $doctor_id => $appointments) {
            if (isset($doctors[$doctor_id])) {
                $doctorEmail = $doctors[$doctor_id]['email'];
                $doctorName = $doctors[$doctor_id]['fullname'];
                $emailSent = sendBookingConfirmationEmail($doctorEmail, $doctorName, $appointments, $doctorEmail, false);
                if (!$emailSent) {
                    echo "<script>alert('Appointment completed, but unable to send confirmation email to $doctorName.');</script>"; 
                }
            }
        }

        // Send email to patient
        $emailSent = sendBookingConfirmationEmail($email, $name, $allAppointments, $email, true);

        if (!$emailSent) {
            echo "<script>alert('Appointment completed, but unable to send confirmation email.');</script>"; 
        } else {
            echo "<script>alert('Confirmation email sent successfully!');</script>"; 
        }

        echo "<script>alert('Appointment successful!');</script>"; 
        echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 600);</script>";
        exit();
    } else {
        $error = "Failed to insert contact information. Please try again!";
        echo "<script>alert('{$error}');</script>"; 
        echo "<script>setTimeout(function(){ window.location.href = 'appointment.php'; }, 600);</script>";
        exit();
    }
}

?>
