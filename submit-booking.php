<?php
// Include the database configuration file
// Database configuration
$host = "localhost";  // Database host
$username = "root";   // Database username
$password = "";       // Database password (leave blank for XAMPP)
$dbname = "quickserve"; // Database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data and sanitize inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $service_date = mysqli_real_escape_string($conn, $_POST['service_date']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    // SQL query to insert data into the 'bookings' table
    $stmt = "INSERT INTO bookings (name, phone, email, address, service_date, details) 
            VALUES ('$name', '$phone', '$email', '$address', '$service_date', '$details')";
    
    if ($conn->query($stmt) === TRUE) {
       header("Location: /quickserve/plumbing.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
