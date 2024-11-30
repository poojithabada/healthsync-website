<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: admin_login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin2.css">
<div class="container">
    <h1>Welcome Admin</h1>
    <a href="../backend/manage_patients.php">View Patients</a><br>
    <a href="../backend/manage_doctors.php">View Doctors</a><br>
    <a href="../backend/manage_appointments.php">View Appointments</a><br>
    <a href="../backend/admin_logout.php">Logout</a>
</div>