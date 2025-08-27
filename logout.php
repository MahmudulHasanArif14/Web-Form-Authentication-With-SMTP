<?php
session_start();

// Clear all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect with JS alert
echo '
<script>
    alert("You have been logged out successfully.");
    window.location.href = "login.php";
</script>
';
exit;
?>
