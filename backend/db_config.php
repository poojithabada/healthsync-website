<?php
$servername = "localhost";
$username = "root";
$password = "Z@3L!k7jS9&^8lNq";
$dbname = "USERS_INFO";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
