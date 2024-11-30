<?php
session_start();

// Admin credentials
$adminUsername = "admin";
$adminPassword = "admin123"; // Use a secure password or hash it

// Database connection
require_once 'db_config.php'; // Include your database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $adminUsername && $password === $adminPassword) {
        // Set session variables
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = $adminUsername;

        // Redirect to the admin dashboard
        header("Location: ../frontend/admin_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid credentials'); window.location.href='../frontend/admin_login.html';</script>";
    }
}
?>
