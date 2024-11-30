<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Z@3L!k7jS9&^8lNq"; 
$dbname = "USERS_INFO";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];  // No hashing here
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact_info = $_POST['contact_info'];

    // Insert patient details into the database (without password hashing)
    $stmt = $conn->prepare("INSERT INTO Users (name, email, username, password, age, gender, contact_info) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $name, $email, $username, $password, $age, $gender, $contact_info);

    if ($stmt->execute()) {
        // After successful signup, set the session
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'patient';
        $_SESSION['email'] = $email;
        
        // Redirect to the after-login page (handles redirection based on role)
        header("Location: /SE%20Project/frontend/afterloginpage.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
