<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Service Management</title>
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            color: #888;
        }

        .card img {
            width: 50px;
            height: 50px;
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
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
        <h1>ADMIN | SERVICE MANAGEMENT</h1>
        <div class="content-placeholder">
            <section id="service-management"></section>
                <h2>All Services</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Service ID</th>
                            <th> Provider Name</th>
                            <th>Service Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Fetch users from the database
                    $conn = new mysqli("localhost", "root", "", "quickserve");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM service_providers";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['service_type']} </td>
                            <td>{$row['email']} </td>
                            <td>{$row['phone']} </td>
                            <td>Active</td>
                            <td><button>Edit</button> <button>Delete</button></td>
                        </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No users available</td></tr>";
                    }

                    $conn->close();
                    ?>
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>
