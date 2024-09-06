<!-- select_provider.php -->
<?php
session_start();
require 'db_connect.php'; // Your DB connection file

// Fetch service providers based on service type (e.g., plumbing)
$query = "SELECT id, name, service_type, phone, email, rating FROM service_providers WHERE service_type = 'plumbing'";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Service Provider</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Select a Service Provider</h1>
    </header>

    <section>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Service Type</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['service_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['rating']); ?></td>
                    <td>
                        <form action="confirm_booking.php" method="POST">
                            <input type="hidden" name="provider_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn-select">Select</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 QuickServe. All rights reserved.</p>
    </footer>
</body>
</html>
