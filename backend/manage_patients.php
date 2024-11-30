<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../frontend/admin_login.html");
    exit();
}

require_once 'db_config.php';

$query = "SELECT * FROM Users"; 
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Patient ID: " . $row['patient_id'] . " - Name: " . $row['name'] . "<br>";
    }
} else {
    echo "No patients found.";
}

$conn->close();
?>
