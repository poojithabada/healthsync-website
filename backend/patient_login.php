<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "Z@3L!k7jS9&^8lNq"; 
$dbname = "USERS_INFO";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Form Submitted via POST<br>";  // Debugging message

    // Collect the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if form data is received
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";

    // Prepare SQL query to check the username and password
    $stmt = $conn->prepare("SELECT * FROM Users WHERE username = ? AND role = 'patient'");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the username exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();

        // Verify the password (no hashing for simplicity here)
        if ($password == $user['password']) {
            // If credentials are correct, start session and store user info
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = 'patient';
            
            // Redirect to the after login page
            header("Location: /SE%20Project/frontend/afterloginpage.php");
            exit();
        } else {
            echo "<p style='color: red;'>Incorrect password.</p>";
        }
    } else {
        // Username not found
        echo "<p style='color: red;'>Username not found.</p>";
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    echo "<p style='color: red;'>Please submit the form.</p>";
}
?>
