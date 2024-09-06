<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reports</title>
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
        <h1>ADMIN | REPORTS</h1>
        <div class="content-placeholder">
            <label for="report-type">Report Type:</label>
            <select id="report-type" name="report-type" required>
                <option value="" disabled selected>Select a report type</option>
                <option value="earnings">Earnings</option>
                <option value="bookings">Bookings</option>
                <option value="users">Users</option>
            </select>
        <br>
        <br>

        
            <label for="date-range">Date Range:</label>
            <input type="date" id="start-date" name="start-date" required>
            <input type="date" id="end-date" name="end-date" required>
       <br>
       <br><button type="submit" class="btn" width="10px">Generate Report</button> 
    </div>

        
            </section>
            <style>
                #reports {
                    background-color: #f9f9f9;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    max-width: 600px;
                    margin: 0 auto;
                    margin-top: 40px;
                }
            
                #reports h2 {
                    text-align: center;
                    font-size: 24px;
                    margin-bottom: 20px;
                    color: #34495e;
                }
            
                .form-group {
                    margin-bottom: 20px;
                }
            
                .form-group label {
                    display: block;
                    margin-bottom: 10px;
                    font-size: 16px;
                    color: #2c3e50;
                }
            
                .form-group select, .form-group input[type="date"] {
                    width: 100%;
                    padding: 10px;
                    font-size: 16px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
                }
            
                .form-group select:focus, .form-group input[type="date"]:focus {
                    outline: none;
                    border-color: #3498db;
                    box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
                }
            
                .btn {
                    display: block;
                    padding: 12px;
                    font-size: 16px;
                    background-color: #3498db;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }
            
                .btn:hover {
                    background-color: #2980b9;
                }
            </style>
        </div>
    </div>
</body>
</html>
