<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../frontend/admin_login.html");
    exit();
}

require_once 'db_config.php';

$query = "SELECT * FROM Appointments"; 
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Appointment ID: " . $row['appointment_id'] . " - Patient: " . $row['patient_name'] . " - Doctor: " . $row['doctor_name'] . "<br>";
    }
} else {
    echo "No appointments found.";
}

$conn->close();
?>
