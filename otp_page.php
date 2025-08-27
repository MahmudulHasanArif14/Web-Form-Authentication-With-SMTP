<?php
include 'connection.php';
session_start();


$activationCode = htmlspecialchars($_REQUEST['activate_code']);

if (!isset($_SESSION['otp']) || !isset($activationCode)) {
    header("Location: register.php?error=" . urlencode("Invalid access."));
    exit;
}

$success = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['verify'])) {
        $user_otp = $_POST['otp'];
        if ($user_otp == $_SESSION['otp']) {
            $success = "OTP verified successfully!";
            unset($_SESSION['otp']);
            $_SESSION['otp_verified'] = true;

            // Activate the user account
            $updateQuery = "UPDATE `userinfoh` SET `Status`='active' WHERE `activate_code`='$activationCode'";
            mysqli_query($con, $updateQuery);

            header("Location: dashboard.php?success=" . urlencode($success)."&activate_code=" . urlencode($activationCode));
            exit;
        } else {
            $error = "Invalid OTP. Please try again.";
        }
    } else {
        $error = "Please enter the OTP.";
    }
}



include 'navbar.php';

?>


<div class="otp-container">
    <h3 class="text-center">OTP Verification</h3>


    <?php if($error): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form method="post" class="text-center">
        <input type="text" name="otp" class="form-control otp-input mb-4" maxlength="6" placeholder="------" required>
        <button type="submit" name="verify" class="btn btn-primary btn-lg w-100">Verify OTP</button>
    </form>
</div>

<?php 

include 'footer.php';

?>