<?php
// register_provider.php

// Start session to store success or error messages
session_start();

// Database connection details
$servername = "localhost";  // Replace with your database host
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "quickserve";  // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form inputs  
    $name = $_POST['name'];
    $serviceType = $_POST['serviceType'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate passwords match
    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: form.html");
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query to insert the data
    $stmt = $conn->prepare("INSERT INTO service_providers (name, service_type, email, phone, password) VALUES (?, ?, ?, ?, ?)");

    // Bind the form data to the query
    $stmt->bind_param("sssss", $name, $serviceType, $email, $phone, $hashedPassword);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        
        // Optionally, redirect the user to a thank you or login page
         header("Location: /quickserve/provider/form.html");
    } else {
        echo "Error: " . $stmt->error;
    }


    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
