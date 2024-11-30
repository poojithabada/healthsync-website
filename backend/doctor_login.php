<?php
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "Z@3L!k7jS9&^8lNq"; // Database password
$dbname = "USERS_INFO"; // Database name

// Create a new MySQL connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input from POST request
    $inputUsername = trim($_POST['username']);
    $inputPassword = $_POST['password'];

    // Validate input (make sure the username and password are not empty)
    if (empty($inputUsername) || empty($inputPassword)) {
        echo "Username and password are required.";
        exit();
    }

    // Use prepared statements to securely fetch doctor details from the database
    $stmt = $conn->prepare("SELECT * FROM Doctors WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the doctor exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($inputPassword, $row['password'])) {
            // Set session variables after successful login
            $_SESSION['doctor_id'] = $row['doctor_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = 'doctor';

            // Redirect to the after login page for doctors
            header("Location: ../frontend/afterloginpage.php");
            exit();
        } else {
            echo "<script>alert('Invalid password. Please try again.'); window.location.href='../frontend/doctorlogin.html';</script>";
        }
    } else {
        echo "<script>alert('No doctor found with the given username.'); window.location.href='../frontend/doctorlogin.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
