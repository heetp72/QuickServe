<?php
// Start a new session
session_start();
// Database connection details
$servername = "localhost"; // Change to your database host
$username = "root";        // Change to your database username
$password = "";            // Change to your database password
$dbname = "quickserve"; // Change to your database name
$_SESSION['user_name'] =  $user['name'];
// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

// Include the database configuration file
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data and sanitize inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL query to fetch the user with the provided email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    // Check if a user with the provided email exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();

        // Verify the entered password against the stored hash
        if (password_verify($password, $user['password'])) {
            // Store user data in the session and redirect to dashboard
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect to a dashboard or home page
            header("Location: /quickserve/dashboard.php");
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No account found with that email!";
    }
}
?>
