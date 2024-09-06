<?php
// signup.php

// Start session to show success or error messages
session_start();

// Database connection details
$servername = "localhost"; // Change to your database host
$username = "root";        // Change to your database username
$password = "";            // Change to your database password
$dbname = "quickserve"; // Change to your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: signup.html");
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    // Try to execute the query
    if ($stmt->execute()) {
        $_SESSION['success'] = "Signup successful! You can now log in.";
        header("Location: /quickserve/landing.html"); // Redirect to success page
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
        header("Location: signup.html"); // Redirect back to signup page
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
