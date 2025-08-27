<?php
session_start();
include 'connection.php'; 


if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    header("Location: register.php?error=" . urlencode("Unauthorized access."));
    exit;
}


$isSuccess = htmlspecialchars($_GET['success']);
$activationCode = htmlspecialchars($_GET['activate_code']);


if ((!isset($isSuccess)  || !isset($activationCode))) {
    header("Location: register.php?error=" . urlencode("Please verify your email."));
    exit;
}

// Fetch user info from DB
$query = "SELECT * FROM `userinfoh` WHERE `activate_code` = '$activationCode'";

$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
if (!$result) {
    header("Location: register.php?error=" . urlencode("Database query failed."));
    exit;
} else {
    if (!$user) {
        header("Location: register.php?error=" . urlencode("User not found."));
        exit;
    }
}


include 'navbar.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body text-center p-4">
                 
                    <img src="https://i.pravatar.cc/150?img=68" alt="User Avatar" class="rounded-circle mb-3" width="120" height="120">

                    <h3 class="card-title mb-3">
                        Welcome, <?= $user['name'] ?>!
                    </h3>

                    <p class="text-muted mb-4">Your account details are shown below:</p>

                    <table class="table table-striped text-start">
                        <tr>
                            <th scope="row">Name</th>
                            <td><?= $user['name'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?= $user['email'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td><span class="badge bg-success"><?= $user['Status'] ?></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Activation Code</th>
                            <td><?= $user['activate_code'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Registered At</th>
                            <td><?= $user['created_at'] ?? 'N/A' ?></td>
                        </tr>
                    </table>

                    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
