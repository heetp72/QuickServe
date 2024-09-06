<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Existing CSS styles */
        .stats-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .stats-box {
            background-color: #394a81;
            color: white;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            flex: 1;
            min-width: 250px;
        }

        .stats-box h3 {
            margin-top: 0;
            font-size: 24px;
        }

        .stats-box p {
            font-size: 30px;
            margin: 10px 0 0 0;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #394a81;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Sidebar and main-content styles (assuming they are not in styles.css) */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
        }

        .sidebar {
            width: 20%;
            background-color: #2c3e50;
            padding: 20px;
            box-sizing: border-box;
            color: white;
            height: 100vh;
            position: fixed;
        }

        .sidebar h2 {
            color: #ecf0f1;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #ecf0f1;
        }

        .main-content {
            margin-left: 20%;
            padding: 20px;
            box-sizing: border-box;
            width: 80%;
        }
    </style>
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
        <h2>Booking History</h2>

        <?php
            // Connect to the database
            $conn = new mysqli("localhost", "root", "", "quickserve_db");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Initialize variables
            $todays_bookings = 0;
            $total_bookings = 0;
            $total_income = 0.00;
            $booking_history = [];

            // Get today's date
            $today = date('Y-m-d');

            // Fetch today's bookings count
            $sql_today = "SELECT COUNT(*) as count FROM bookings WHERE date = '$today'";
            $result_today = $conn->query($sql_today);
            if ($result_today->num_rows > 0) {
                $row_today = $result_today->fetch_assoc();
                $todays_bookings = $row_today['count'];
            }

            // Fetch total bookings count and total income
            $sql_total = "SELECT COUNT(*) as count, SUM(amount) as income FROM bookings";
            $result_total = $conn->query($sql_total);
            if ($result_total->num_rows > 0) {
                $row_total = $result_total->fetch_assoc();
                $total_bookings = $row_total['count'];
                $total_income = $row_total['income'] ?? 0.00;
            }

            // Fetch booking history
            $sql_history = "SELECT booking_id, customer_name, service, date, status, amount FROM bookings ORDER BY date DESC";
            $result_history = $conn->query($sql_history);
            if ($result_history->num_rows > 0) {
                while ($row = $result_history->fetch_assoc()) {
                    $booking_history[] = $row;
                }
            }

            // Close the connection
            $conn->close();
        ?>

        <!-- Stats boxes -->
        <div class="stats-container">
            <div class="stats-box">
                <h3>Today's Bookings</h3>
                <p id="todays-bookings"><?php echo $todays_bookings; ?></p>
            </div>
            <div class="stats-box">
                <h3>Total Bookings</h3>
                <p id="total-bookings"><?php echo $total_bookings; ?></p>
            </div>
            <div class="stats-box">
                <h3>Total Income</h3>
                <p id="total-income">Rs <?php echo number_format($total_income, 2); ?></p>
            </div>
        </div>

        <!-- Booking history table -->
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Customer Name</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Amount (Rs)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($booking_history)): ?>
                    <?php foreach ($booking_history as $booking): ?>
                        <tr>
                            <td><?php echo $booking['booking_id']; ?></td>
                            <td><?php echo $booking['customer_name']; ?></td>
                            <td><?php echo $booking['service']; ?></td>
                            <td><?php echo $booking['date']; ?></td>
                            <td><?php echo $booking['status']; ?></td>
                            <td><?php echo number_format($booking['amount'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No booking history available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
