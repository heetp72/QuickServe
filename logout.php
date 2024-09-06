<?php
session_start();
session_unset();
session_destroy();
header("Location:/quickserve/landing.html"); // Redirect to login page after logout
exit;
?>