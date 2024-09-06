<?php
session_start(); // Start the session at the top of the page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickServe - Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav class="main-nav">
            <div class="logo"><img src="logo.jpg" width="150" alt=""></div>
            <ul class="main-nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact</a></li>
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

    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to QuickServe</h1>
            <h2>Your One-Stop Solution for All Local Services</h2>
            <a href="#" class="btn-primary">Book Now</a>
        </div>
    </section>

    <section class="location-search">
        <div class="search-box">
            <input type="text" placeholder="Search for Services">
            <button>Search</button>
        </div>
    </section>

     <!-- About Section -->
     <section id="about" class="about">
        <div class="container">
            <h2>About Us</h2>
            <p>We are a team of dedicated professionals offering top-notch services to our local community. With years of experience and a commitment to quality, we are your go-to experts for all your needs.</p>
        </div>
    </section>

    <section id="services" class="services">
        <h2>Our Services</h2>
        <div class="services-grid">
            <div class="service-item">
                <a href="plumbing.php">
                    <img src="plumber.jpg" alt="Plumbing">
                    <h3>Plumbing</h3>
                    
                </a>
            </div>
            <div class="service-item">
                <a href="electrical.php">
                    <img src="electrician.jpg" alt="Electrical">
                    <h3>Electrical</h3>
                </a>
            </div>
            <div class="service-item">
                <a href="gas-repair.php">
                    <img src="gas-repair.jpg" alt="Cleaning">
                    <h3>Gas Repair</h3>
                </a>
            </div>
            <div class="service-item">
                <a href="gardening.php">
                    <img src="gardening.jpg" alt="Gardening">
                    <h3>Gardening</h3>
                </a>
            </div>
            <div class="service-item">
                <a href="painting.php">
                    <img src="painting.jpg" alt="Painting">
                    <h3>Painting</h3>
                </a>
            </div>
            <div class="service-item">
                <a href="carpentry.php">
                    <img src="carpenter.jpg" alt="Carpentry">
                    <h3>Carpentry</h3>
                </a>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Local Services. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
