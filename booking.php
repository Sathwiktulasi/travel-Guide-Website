<?php
// Ensure that the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];
    $numGuests = $_POST['numGuests'];

    // Validate and sanitize data if necessary

    // Perform database operations
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "town_guide_db";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to insert data into the database
    $sql = "INSERT INTO bookings (fullname, email, phone, checkInDate, checkOutDate, numGuests)
            VALUES ('$fullName', '$email', '$phone', '$checkInDate', '$checkOutDate', $numGuests)";

    if ($conn->query($sql) === TRUE) {
        // Close the database connection
        $conn->close();

        // Redirect to the confirmation page
        header("Location: confirmation.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Redirect back to the form page
    header("Location: index.html");
    exit();
}
?>

 