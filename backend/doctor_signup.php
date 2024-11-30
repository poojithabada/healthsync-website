<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Z@3L!k7jS9&^8lNq"; 
$dbname = "USERS_INFO";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];  // Plain text password
    $specialization = $_POST['specialization'];

    // No hashing, store the password as entered (plain text)
    
    // Insert doctor details into the database
    $stmt = $conn->prepare("INSERT INTO Doctors (name, email, username, password, specialization) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $username, $password, $specialization);  // Bind plain text password

    if ($stmt->execute()) {
        // After successful signup, set the session
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'doctor';
        $_SESSION['email'] = $email;
        
        // Redirect to the after-login page (handles redirection based on role)
        header("Location: /SE Project/frontend/afterloginpage.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
