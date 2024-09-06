<?php
session_start(); // Start the session at the top of the page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Provider Registration - QuicServe</title>
    <link rel="stylesheet" href="booking-form.css">
</head>
<body>
    <header>
        <nav class="main-nav">
            <div class="logo"><img src="logo.jpg" width="150" alt=""></div>
            <ul class="main-nav-links ">
                <li><a href="/quickserve/LANDING.HTML" class="list">Home</a></li>
             
            </ul>
      
        
            <nav class="navigation">
                <ul>
                <?php if (isset($_SESSION['user_name'])): ?>
                <!-- If the user is logged in, display their name -->
                <li><a href="#" class="btn">Welcome  <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
                <li><a href="logout.php" class="btn">Logout</a></li>
            <?php else: ?>
                <!-- If the user is not logged in, display Login and Signup -->
                <li><a href="login.php" id="loginBtn" class="btn">Login</a></li>
                <li><a href="signup.php" id="signupBtn" class="btn">Signup</a></li>
            <?php endif; ?>
        </ul>
            </nav>
        </nav>
    </header>


    <div class="container">
        <!-- Left Side with Full-Width Logo Background -->
        <div class="left-side">
            <div class="logo-box">
                <h1>QuickServe</h1>
                <p>Join as a Service Provider</p>
            </div>
        </div>

        <!-- Right Side with Registration Form -->
        <div class="right-side">
            <div class="form-box">
                <h2>Book a Electrical Service</h2>
    <form action="/submit-booking" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="service-date">Preferred Date:</label>
        <input type="date" id="service-date" name="service_date" required>

        <label for="details">Additional Details:</label>
        <textarea id="details" name="details"></textarea>

        <button type="submit" class="btn-submit">Submit Booking</button>
    </form>
         </div>
        </div>
    </div>

    <!-- Sign-In Pop-up Modal -->
    <div id="signInModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Sign In</h2>
            <form id="signInForm" action="signin_provider.php" method="POST">
                <label for="signInEmail">Email:</label>
                <input type="email" id="signInEmail" name="signInEmail" placeholder="Enter your email" required>

                <label for="signInPassword">Password:</label>
                <input type="password" id="signInPassword" name="signInPassword" placeholder="Enter your password" required>

                <button type="submit" class="btn-submit">Sign In</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
            </div>
        </div>
    </div>

    <footer>
        <div class="container1">
            <p>&copy; 2024 Local Services. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
