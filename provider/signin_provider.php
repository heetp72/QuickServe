<?php
// Start session to use session variables
session_start();

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

// Include your database configuration file
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password entered by the user
    $email = $_POST['signInEmail'];
    $password = $_POST['signInPassword'];

    // Prepare SQL query to fetch user details based on email
    $stmt = $conn->prepare("SELECT id, name, email, password FROM service_providers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    // Store the result
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Fetch the user record
        $user = $result->fetch_assoc();

        // Verify password (assuming the password is hashed using password_hash())
        if (password_verify($password, $user['password'])) {
            // Set session variables for the logged-in user
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            // Redirect to the service provider dashboard
            header("Location: provider_dashboard.php");
            exit;
        } else {
            // Incorrect password
            $_SESSION['error'] = "Invalid password. Please try again.";
            header("Location: login.php"); // Redirect back to login page with an error
            exit;
        }
    } else {
        // No user found with this email
        $_SESSION['error'] = "No account found with that email. Please try again.";
        header("Location: login.php"); // Redirect back to login page with an error
        exit;
    }
}
?>
