<?php
session_start();

if (!isset($_SESSION['otp'])) {
    header("Location: register.php?error=" . urlencode("Invalid access."));
    exit;
}

$success = '';
$error = '';
if (isset($_POST['verify'])) {
    $user_otp = $_POST['otp'];

    if ($user_otp == $_SESSION['otp']) {
        $success .= "OTP verified successfully!";
        unset($_SESSION['otp']);
         $_SESSION['otp_verified'] = true;
    } else {
        $error .= "Invalid OTP. Please try again.";
    }
}else{
    $error .= "Please enter the OTP.";
    header("Location: otp_page.php");
    exit;
}


include 'navbar.php';

?>


<div class="otp-container">
    <h3 class="text-center">OTP Verification</h3>

    <?php if($success): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <!-- shorthand for printing php var -->
            <?= $success ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php elseif($error): ?>
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