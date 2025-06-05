<?php
session_start();
include("inc/dbCon.php");

// var_dump($_SESSION);  // This will print the contents of the session to help debug

if (isset($_POST['btnFormSubmit'])) {
    if (empty($_POST['txtEmail']) || empty($_POST['txtUsername'])) {
        $error = "Invalid username or email! Please provide both details to proceed!";
        echo "<script>alert('{$error}');</script>";
    } else {
        $email = mysqli_real_escape_string($db, $_POST['txtEmail']); 
        $fullname = mysqli_real_escape_string($db, $_POST['txtUsername']); 

        $query_user = mysqli_query($db, "SELECT * FROM user WHERE email='$email' AND fullname='$fullname'");                 
        $login_user = mysqli_fetch_array($query_user, MYSQLI_ASSOC);

        if ($login_user) {
            $_SESSION['name'] = $login_user['fullname'];
            $_SESSION['email'] = $login_user['email'];
            $_SESSION['role'] = $login_user['role'];
            $_SESSION['id'] = $login_user['id'];  //add this part

            if ($_SESSION['role'] === 'doctor') {
                header('Location: Doctor/doctorDashboard.php');
                exit();
            } else if ($_SESSION['role'] === 'admin') {
                header('Location: Admin/adminDashboard.php');
                exit();
            } else {
                $error = "Unauthorized role!";
                echo "<script>alert('{$error}');</script>";
            }
        } else {
            $error = "Invalid username or email, please try again!";
            echo "<script>alert('{$error}');</script>"; 
            echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 600);</script>";
            exit();
        }
    }
}

?>
