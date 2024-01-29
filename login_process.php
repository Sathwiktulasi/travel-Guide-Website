<?php
// Start the session
session_start();

// Connect to the database (Update these with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "town_guide_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Check user credentials
$loginQuery = "SELECT * FROM users WHERE username='$username'";
$loginResult = $conn->query($loginQuery);

if ($loginResult->num_rows > 0) {
    $row = $loginResult->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Set session variables
        $_SESSION['username'] = $username;

        // Redirect to the homepage after successful login
        header("Location: homepage.php");
        exit();
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

$conn->close();
?>