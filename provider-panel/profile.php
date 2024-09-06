<?php
// Start PHP session
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    
    // Here you can add code to process or save the data, e.g., to a database
    
    // For demonstration, we'll just display a success message
    $success_message = "Profile updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>My Profile</title>
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
        <h2>My Profile</h2>
        
        <?php if (isset($success_message)): ?>
            <p><?php echo $success_message; ?></p>
        <?php endif; ?>
        
        <form method="post" action="profile.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            
            <label for="service">Service:</label>
            <input type="text" id="service" name="service" placeholder="Enter your service">
            
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
