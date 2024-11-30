<?php
$servername = "localhost"; 
$username = "root"; 
$password = "Z@3L!k7jS9&^8lNq";
$dbname = "USERS_INFO"; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $department = $conn->real_escape_string($_POST['department']);
    $doctor = $conn->real_escape_string($_POST['doctor']);
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);

    $sql = "INSERT INTO appointments (name, email, phone, department, doctor, date, time) 
            VALUES ('$name', '$email', '$phone', '$department', '$doctor', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Appointment booked successfully!');
                window.location.href='patientdashboard.html';
              </script>";
    } else {
        echo "<script>
                alert('Error booking appointment: " . $conn->error . "');
                window.history.back();
              </script>";
    }
}

// Close the connection
$conn->close();
?>
