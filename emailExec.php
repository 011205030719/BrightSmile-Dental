<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Function to send booking confirmation email
function sendBookingConfirmationEmail($recipientEmail, $name, $appointments, $doctorEmail, $isPatientEmail) {
    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    // Set up email content
    try {
        // Email server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'muijing0112@gmail.com'; 
        $mail->Password   = 'hkfculepnfbtoyfc'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587; 

        // Recipient
        $mail->setFrom('no-reply@brightsmile.com', 'Bright Smile Dental'); 
        $mail->addAddress($recipientEmail); // Add recipient's email

        // Content settings
        $mail->isHTML(true); 
        $mail->Subject = $isPatientEmail ? 'Appointment Confirmation' : 'New Patient Appointment';

        // Build appointment details
        // Build appointment details
        $appointmentDetails = '';
        foreach ($appointments as $appointment) {
            $appointmentDetails .= "
                <div class='appointment-details'>
                    <p><strong>Patient Name:</strong> {$appointment['patient_name']}</p>
                    <p><strong>Age:</strong> {$appointment['age']}</p>
                    <p><strong>Service:</strong> {$appointment['service_name']}</p>
                    <p><strong>Doctor:</strong> {$appointment['doctor_name']}</p>
                    <p><strong>Date:</strong> {$appointment['appt_date']}</p>
                    <p><strong>Time:</strong> {$appointment['appt_time']}</p>
                </div>
                <hr/>
            ";
        }


        $mail->Body = "
        <html>
        <head>
            <title>" . ($isPatientEmail ? 'Appointment Confirmation' : 'New Patient Appointment') . "</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8f9fa;
                    color: #333;
                    margin: 0;
                    padding: 20px;
                }
                .container {
                    max-width: 600px;
                    margin: auto;
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                }
                h1 {
                    color: #007BFF;
                }
                p {
                    line-height: 1.6;
                }
                .appointment-details {
                    margin-top: 20px;
                    padding: 15px;
                    background: #f1f1f1;
                    border-left: 5px solid #007BFF;
                }
                .footer {
                    margin-top: 20px;
                    text-align: center;
                    font-size: 0.9em;
                    color: #888;
                }
                @media (max-width: 600px) {
                    .container {
                        padding: 10px;
                    }
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>" . ($isPatientEmail ? 'Appointment Confirmation' : 'New Patient Appointment') . "</h1>
                <p>Dear " . ($isPatientEmail ? $name : "Doctor") . ",</p>
                <p>" . ($isPatientEmail ? "Your appointment has been successfully booked!" : "You have a new appointment!") . "</p>
                
                $appointmentDetails

                <p>Thank you for choosing our services. We look forward to seeing you!</p>
                <p>Best regards,</p>
                <p>Bright Smile Dental Team</p>
                <div class='footer'>
                    <p>&copy; " . date("Y") . " Bright Smile Dental. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
        ";

        $mail->send(); // Send the email
        return true; // Return success
    } catch (Exception $e) {
        return false; // Return failure
    }
}
?>
