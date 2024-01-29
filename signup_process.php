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
$mobile = $_POST['mobile_number'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if the username is already taken
$checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
$checkUsernameResult = $conn->query($checkUsernameQuery);

if ($checkUsernameResult->num_rows > 0) {
    echo "Username already taken. Please choose a different one.";
} else {
    // Insert user data into the database
    $signupQuery = "INSERT INTO users (username, mobile_number, email, dob, password) VALUES ('$username', '$mobile_number', '$email', '$dob', '$password')";

    if ($conn->query($signupQuery) === TRUE) {
        // Set session variables
        $_SESSION['username'] = $username;

        // Redirect to the homepage after successful signup
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $signupQuery . "<br>" . $conn->error;
    }
}

$conn->close();
?>