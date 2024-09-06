<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Current Bookings</title>
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
        <h2>Current Bookings</h2>
        
        <!-- Table for displaying current bookings -->
        <table id="bookingTable">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to the database
                    $conn = new mysqli("localhost", "root", "", "quickserve");

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch current bookings from the database
                    $sql = "SELECT id, name, service_date FROM bookings ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data for each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["service_date"] . "</td>";
                           
                            echo "<td><a href='view_booking.php?id=" . $row["id"] . "'>View</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        // If no bookings are available, display a message
                        echo "<tr><td colspan='6'>No bookings available.</td></tr>";
                    }

                    // Close the connection
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
