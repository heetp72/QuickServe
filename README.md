QuickServe 🛠️

QuickServe is a web-based platform that helps users find and book nearby service professionals such as electricians, plumbers, carpenters, and other home service experts.

The system is built using HTML, CSS, JavaScript, PHP, and Bootstrap, and hosted on XAMPP server with MySQL as the database. QuickServe provides a simple and secure way for users to sign up, log in, and book services.

🚀 Features

User Authentication

Signup with full name, email, and password

Secure login and password confirmation

Service Booking

Browse available local services

Book a professional directly

Responsive UI (Bootstrap)

Clean and modern landing page

Pop-up modal forms for Signup & Login

Database Integration

MySQL for user and service data storage

Configured with PHP for backend operations

📸 Screenshots

Signup Page

Login Page

Landing Page (Home)

(Screenshots can be placed inside a /screenshots folder and linked here)

🛠️ Tech Stack

Frontend: HTML, CSS, JavaScript, Bootstrap

Backend: PHP

Database: MySQL

Server: XAMPP (Apache + MySQL)

⚙️ Installation & Setup

Clone the repository:

git clone https://github.com/your-username/quickserve.git
cd quickserve


Move project to XAMPP server:

Copy the project folder into:

C:\xampp\htdocs\quickserve


Setup Database:

Start Apache and MySQL from XAMPP Control Panel

Open phpMyAdmin:

http://localhost/phpmyadmin


Create a new database (e.g., quickserve)

Import the provided SQL file (quickserve.sql)

Configure Database Connection:

Open config.php (or your DB connection file)

Update credentials:

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "quickserve";


Run the Project:

Open in browser:

http://localhost/quickserve/LANDING.HTML

🔮 Future Enhancements

Add real-time location tracking (Google Maps API)

Integrate payment gateway for secure transactions

Implement ratings & reviews for services

Add admin dashboard for managing services & users

👨‍💻 Author

Heet Vijaykumar Kapatel
📧 Email: heetp726@gmail.com
