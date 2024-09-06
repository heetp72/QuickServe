<?php
session_start();
// Destroy all sessions and redirect to login page
if(session_destroy()) {
    header("Location: ../index.php"); // Redirecting to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Logout</title>
</head>
<body>
    <div class="sidebar">
        <h2>QuickServe Provider</h2>
        <ul>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="bookings.php">Current Bookings</a></li>
            <li><a href="history.php">Booking History</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h2>Logout</h2>
        <p>You have been logged out. <a href="../index.php">Click here</a> to login again.</p>
    </div>
</body>
</html>
