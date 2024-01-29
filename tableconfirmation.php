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
$sql = "SELECT * FROM reservations ORDER BY reservation_id DESC LIMIT 1";
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
            width: 27%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 auto; /* Center the button */
            display: block; /* Make it a block element to center it */
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
    $name = isset($row['name']) ? $row['name'] : '';
    $email = isset($row['email']) ? $row['email'] : '';
    $phone = isset($row['phone']) ? $row['phone'] : '';
    $date = isset($row['date']) ? $row['date'] : '';
    $time = isset($row['time']) ? $row['time'] : '';
    $party_size = isset($row['party_size']) ? $row['party_size'] : '';

    // Display details
    echo "<header><h1>Town Guide</h1></header>";
    echo "<section id='pdfContent'>";
    echo "<h2>Booking Confirmation</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone: $phone</p>";
    echo "<p>Date: $date</p>";
    echo "<p>Time: $time</p>";
    echo "<p>Party Size: $party_size</p>";
    echo "</section>";
    echo "<button id='downloadBtn'>Download as PDF</button>";

    // Add an option to download details as PDF
    echo "<script>
        function downloadAsPDF() {
            const element = document.getElementById('pdfContent');
            html2pdf(element);
        }

        document.getElementById('downloadBtn').addEventListener('click', downloadAsPDF);
    </script>";
} else {
    echo "<header><h1>Town Guide</h1></header>";
    echo "<section>";
    echo "<h2>No booking details found</h2>";
    echo "</section>";
}

echo "</body>
</html>";

// Close the database connection
$conn->close();
?>
