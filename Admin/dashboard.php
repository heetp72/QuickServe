<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Container for sidebar and main content */
        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar styling */
        .sidebar {
            background-color: #2c3e50;
            width: 250px;
            color: white;
            padding: 20px;
        }

        .sidebar h1 {
            color: #fff;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 20px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        /* Main content */
        .main-content {
            flex-grow: 1;
            padding: 40px;
            background-color: #ecf0f1;
        }

        .main-content h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Cards layout */
        .cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            width: 30%;
            height: 80%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .card p {
            font-size: 14px;
            color: #888;
        }

        .card img {
            width: 100px;
            height: 100px;
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="sidebar">
        <div class="logo-container">
            <img src="Serve.png" height="30" alt="QuickServe Logo" class="logo">
        </div>
        <h2>QuickServe Admin Panel</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="user_management.php">User Management</a></li>
            <li><a href="service_management.php">Service Management</a></li>
            <li><a href="bookings.php">Bookings</a></li>
            <li><a href="payments.php">Payments</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>ADMIN | DASHBOARD</h1>
        <div class="cards">

            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "quickserve";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch the number of customers
            $customerQuery = "SELECT COUNT(*) AS total_customers FROM users";
            $customerResult = $conn->query($customerQuery);
            $customers = $customerResult->fetch_assoc()['total_customers'];

            // Fetch the number of service providers
            $providerQuery = "SELECT COUNT(*) AS total_providers FROM service_providers";
            $providerResult = $conn->query($providerQuery);
            $providers = $providerResult->fetch_assoc()['total_providers'];

            // Fetch the number of bookings
            $bookingQuery = "SELECT COUNT(*) AS total_bookings FROM bookings";
            $bookingResult = $conn->query($bookingQuery);
            $bookings = $bookingResult->fetch_assoc()['total_bookings'];

            ?>

            <div class="card">
                <h3>Manage Customers</h3>
                <p>Total Customers: <?php echo $customers; ?></p>
            </div>

            <div class="card">
                <h3>Manage Service Providers</h3>
                <p>Total Providers: <?php echo $providers; ?></p>
            </div>

            <div class="card">
                <h3>Bookings</h3>
                <p>Total Bookings: <?php echo $bookings; ?></p>
            </div>

        </div>
    </div>
    </div>
</body>
</html>
