<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);



    $selectQuery = "SELECT * FROM userinfoh WHERE email = '$email'";

    $result=mysqli_query($con,$selectQuery);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        if($user['password']==$password && $user['Status']=='active'){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['otp_verified'] = true;
            $success = "Login successful!";
            $activationCode = $user['activate_code'];
            header("Location: dashboard.php?success=" . urlencode($success)."&activate_code=" . urlencode($activationCode));
            exit;
        } else {
            echo '
            <script>
            alert("Invalid email or password.");
            location.href = "login.php";
            </script>';
        }
    } else {
        // User not found
        echo '
         <script>
        alert("User Not Exist Register the user");
        location.href = "login.php";
        </script>';
    }




}
?>

