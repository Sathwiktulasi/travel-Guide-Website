<?php

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['party_size'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $party_size = $_POST['party_size'];

    // Connect to the database using the provided credentials
    $db = new mysqli('localhost', 'root', '', 'town_guide_db');

    // Check for database connection errors
    if ($db->connect_error) {
        die('Database connection failed: ' . $db->connect_error);
    }

    // Prepare the SQL query to insert reservation details into the 'reservations' table
    $sql = "INSERT INTO reservations (name, email, phone, date, time, party_size) VALUES ('$name', '$email', '$phone', '$date', '$time', '$party_size')";

    // Execute the SQL query and check for errors
    if ($db->query($sql) === TRUE) {
        // Redirect to confirmation page with reservation ID
        $reservation_id = $db->insert_id;
        header("Location: tableconfirmation.php?id=$reservation_id");
        exit;
    } else {
        // Error inserting reservation details, display an error message
        echo '<p style="color: red;">Error making reservation: ' . $db->error . '</p>';
    }

    // Close the database connection
    $db->close();
} else {
    // Form data not submitted, display an error message
    echo '<p style="color: red;">Please fill out all required fields.</p>';
}

?>
