<?php
// Connection details (same as in your previous code)
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

// Retrieve booking details from the database based on the latest entry
$sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

echo "<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }

        header {
            background-color: #3498db;
            padding: 10px;
            color: white;
            text-align: left;
        }

        header h1 {
            margin: 0;
        }

        section {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #3498db;
            text-align: center;
        }

        p {
            margin: 10px 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js'></script>
</head>
<body>";

if ($result->num_rows > 0) {
    // Fetch and display booking details
    $row = $result->fetch_assoc();

    // Fetching individual values with isset checks
    $fullName = isset($row['fullName']) ? $row['fullName'] : '';
    $email = isset($row['email']) ? $row['email'] : '';
    $phone = isset($row['phone']) ? $row['phone'] : '';
    $checkInDate = isset($row['checkInDate']) ? $row['checkInDate'] : '';
    $checkOutDate = isset($row['checkOutDate']) ? $row['checkOutDate'] : '';
    $numGuests = isset($row['numGuests']) ? $row['numGuests'] : '';

    // Get the hotel name from the booking form (Assuming it's in the session, adjust as needed)
    $hotelName = isset($_SESSION['hotelName']) ? $_SESSION['hotelName'] : '';

    // Display details
    echo "<header><h1>Town Guide</h1></header>";
    echo "<section>";
    echo "<h2>Booking Confirmation</h2>";
    echo "<p>Full Name: $fullName</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone: $phone</p>";
    echo "<p>Check-In Date: $checkInDate</p>";
    echo "<p>Check-Out Date: $checkOutDate</p>";
    echo "<p>Number of Guests: $numGuests</p>";
    echo "<button id='downloadBtn'>Download as PDF</button>";
    echo "</section>";

    // Add an option to download details as PDF
    echo "<script>
        function downloadAsPDF() {
            const element = document.body;
            html2pdf(element);
        }

        document.getElementById('downloadBtn').addEventListener('click', downloadAsPDF);
    </script>";
} else {
    echo "No booking details found.";
}

echo "</body>
</html>";

// Close the database connection
$conn->close();
?>
