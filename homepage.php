<?php
require 'sendmail.php';

if (isset($_POST['submit'])) {

    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    if (!preg_match("/^[a-zA-Z ]{3,}$/", $name)) {
        header("Location: register.php?error=" . urlencode("Name must be at least 3 letters and spaces only."));
        exit;
    }

    if (!preg_match("/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $email)) {
        header("Location: register.php?error=" . urlencode("Invalid email format."));
        exit;
    }

    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*]{6,}$/", $password)) {
        header("Location: register.php?error=" . urlencode("Password must be at least 6 characters and contain a letter and a number."));
        exit;
    }

    if ($password !== $confirmPassword) {
        header("Location: register.php?error=" . urlencode("Passwords do not match."));
        exit;
    }




    // otherwise everything fine go for to insert in the database current user data
    //then will verify the user through email and otp

    // Generating Otp
    $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $otp_code = '';
    for ($i = 0; $i < 6; $i++) {
        $otp_code .= $chars[random_int(0, strlen($chars) - 1)];
    }


    // for activating account with link
    $activate_code = bin2hex(random_bytes(16));





    // saving the date to database


    // select Query
    $selectQuery = "SELECT * FROM `userinfoh` WHERE `email`='$email' ";

    // run the select Query
    $result = mysqli_query($conn, $selectQuery);


    // if true then email exist so check status
    
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        if ($row['Status'] == 'active') {
            header("Location: register.php?error=" . urlencode("Email already exists."));
            exit;
        } else {
            // If email exists but is inactive, resend the activation email


            $updateQuery = "UPDATE `userinfoh` SET `otp`='$otp_code', `activate_code`='$activate_code' WHERE `email`='$email'";

            $runQuery = mysqli_query($conn, $updateQuery);

            if ($runQuery) {
                $subject = 'Your OTP Code from Website';
                $body = "<b>Your OTP code is: $otp_code</b>";
                $result = sendMail($email, $subject, $body);

                if ($result == true) {
                    session_start();
                    $_SESSION['otp'] = $otp_code;
                    $_SESSION['email'] = $email;
                    header("Location: otp_page.php");
                    exit;
                } else {
                    header("Location: register.php?error=" . urlencode($result));
                    exit;
                }
            } else {
                header("Location: register.php?error=" . urlencode("Failed to update user."));
                exit;
            }
        }
    }















    // insert Query
    $insertQuery = "INSERT INTO `userinfoh`(`name`, `email`, `password`, `otp`, `activate_code`, `Status`,) VALUES ('$name','$email','$password','$otp_code','$activate_code','inactive')";




    









    if (mysqli_query($conn, $insertQuery)) {


        $subject = 'Your OTP Code from Website';
        $body = "<b>Your OTP code is: $otp_code</b>";
        $result = sendMail($email, $subject, $body);

        if ($result == true) {
            session_start();
            $_SESSION['otp'] = $otp_code;
            $_SESSION['email'] = $email;
            header("Location: otp_page.php");
            exit;
        } else {
            
                header("Location: register.php?error=" . urlencode($result));
                exit;
        }
    } else {
        header("Location: register.php?error=" . urlencode("Database error: " . mysqli_error($conn)));
        exit;
    }
}




else {
    header("Location: register.php?error=" . urlencode("Don't try to access from URL"));
    exit;
}
