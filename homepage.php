<?php
// Start the session at the very beginning
session_start();

// Your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "town_guide_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$welcomeMessage = '';
$loginSignupLink = '<a id="login-signup-link" onclick="openLoginModal()">Login/Signup <i class="fas fa-user"></i></a>';

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $welcomeMessage = "Welcome, " . $_SESSION['username'] . "!";
    $loginSignupLink = ''; // Hide the login/signup link when the user is logged in
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Town Guide</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        #login-signup {
            display: flex;
            align-items: center;
        }

        #login-signup-link {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
            cursor: pointer;
        }

        #login-signup-link i {
            margin-left: 5px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        .button:hover {
            background-color: #555;
        }

        .description {
            text-align: center;
            margin: 20px;
        }


        .image-gallery {
            text-align: center;
        }

        .image-gallery img {
            margin: 10px;
            max-width: 20%;
            height: auto;
        }

        .show-more-link {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        .social-media {
            text-align: center;
            margin: 20px;
        }

        .social-media a {
            display: inline-block;
            margin: 0 10px;
            font-size: 20px;
            color: #333;
            text-decoration: none;
        }

        .box-container {
            display: flex;
            justify-content: center;
            margin: 20px auto;
        }

        .box {
            flex: 1;
            border: 10px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            max-width: 100%;
            margin: 20px 20px; /* Add margin to both sides */
        }

        .box img {
            width: 65%;
            height: 400px;
            display: block;
            margin-bottom: 1px;
            margin-right: 50px; /* Add margin between each image */
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            width: 80%;
            max-width: 400px;
            position: relative;
            border-radius: 5px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .box-title {
            font-size: 30px;
            margin-bottom: 0px;
            text-align: center;
            padding: 10px;
        }

        /* Additional styles for the modifications */
        #town-name {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        #explore-title {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            width: 80%;
            max-width: 400px;
            position: relative;
            border-radius: 5px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
        .town-images-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
            margin: 20px 0;
        }

        .town-image {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .town-image:hover {
            transform: scale(1.1);
        }

        .town-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        footer {
        background-color: #3498db;
        color: white;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>
    <header>
        <h1>Town Guide</h1>
        <div id="login-signup">
        <?php echo $welcomeMessage; ?>
        <?php
        // Check if the user is logged in and display appropriate button
        if (isset($_SESSION['username'])) {
            echo '<button onclick="logout()">Logout <i class="fas fa-sign-out-alt"></i></button>';
        } else {
            echo '<button onclick="redirectLogin()">Login/Signup <i class="fas fa-user"></i></button>';
        }
        ?>
        <a href="about_us.html" class="button">About Us</a>
    </div>
    </header>

    <!-- New Town Name Section -->
    <div id="town-name">
        <p>Explore the Beauty of VIjayawada</p>
    </div>

    <!-- Existing Town Description -->
    <div class="description">
        <p>Nestled on the banks of River Krishna in the state of Andhra Pradesh, Vijayawada is the second-largest populated city in the state. Known as the ‘commercial, political and media capital of Andhra Pradesh’, the city is one of the most rapidly growing urban cities in India. Covered by hills and canals, Vijayawada is also home to numerous caves and rock-cut temples carved out of these caves.

Vijayawada is an amalgamation of the old world and the new; the air echoes with the clanking of temple bells mixed with the cacophony of traffic, the ancient monuments stand in perfect harmony with the modern architecture of the metro city. Among the most popular places to visit in Vijayawada are Bhavani Island, Victoria Museum, Hazratbal Mosque, Rajiv Gandhi Park, and Kolleru Lake etc., in addition to the host of temples and several caves. Other than this, the city is mostly a base to explore the nearby attractions like the Undavalli Caves, Kondapalli Fort, and Mangalagiri Hill etc. </p>
    </div>

    <!-- Scrolling Images of the Town -->
<div class="scrolling-images-container">
    <div class="masonry-layout">
    <div class="town-images-container">
        <div class="town-image">
            <img src="town image1.jpg" alt="Town 1">
        </div>
        <div class="town-image">
            <img src="town2.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town3.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town11.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town5.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town6.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town7.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town8.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town9.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town10.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town image1.jpg" alt="Town 1">
        </div>
        <div class="town-image">
            <img src="town2.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town3.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town11.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town6.jpg" alt="Town 2">
        </div>
        <div class="town-image">
            <img src="town7.jpg" alt="Town 2">
        </div>
        <!-- Add more images as needed -->
    </div>
</div>


<!-- Explore Section Title -->
<div id="explore-title">
    <p>Things to Do and Explore</p>
</div>

<!-- Existing Boxes (Hotels, Visiting Places, Transport, Theatres, Restaurants) -->
<!-- Hotels Box -->
<div class="box" onclick="openPage('hotels.php')">
    <div class="box-title">Hotels</div>
    <div class="box-container">
        <img src="Lemon tree premier-hotel1.jpg" alt="Hotel 1">
        <img src="manorama-hotel4.jpg" alt="Hotel 2">
        <img src="Novotel vijayawada varun-hotel3.jpg" alt="Hotel 3">
    </div>
</div>
<br>
<!-- Visiting Places Box -->
<div class="box" onclick="openPage('places.php')">
    <div class="box-title">Visiting Places</div>
    <div class="box-container">
        <img src="kanaka-durga-temple-place1.jpg" alt="Place 1">
        <img src="prakasam-barrage-place3.jpg" alt="Place 2">
        <img src="mangalagiri-place 4.jpg" alt="Place 3">
    </div>
</div>
<br>
<!-- Transport Box -->
<div class="box" onclick="openPage('transport.php')">
    <div class="box-title">Transport</div>
    <div class="box-container">
        <img src="airport.jpg" alt="Transport 1">
        <img src="railwaystation.jpg" alt="Transport 2">
        <img src="localbus.jpg" alt="Transport 3">
    </div>
</div>
<br>
<!-- Theatres Box -->
<div class="box" onclick="openPage('Entertainment.php')">
    <div class="box-title">Entertainment</div>
    <div class="box-container">
        <img src="ripples mall.jpg" alt="Theatre 1">
        <img src="eat street .png" alt="Theatre 2">
        <img src="ironhill.png" alt="Theatre 3">
    </div>
</div>
<br>
<div class="box" onclick="openPage('Restaurants.php')">
    <div class="box-title">Restaurants</div>
    <div class="box-container">
        <img src="verandah coffee.png" alt="Restaurant 1">
        <img src="vault - pub and restaurant.png" alt="Restaurant 2">
        <img src="minerva .jpg" alt="Restaurant 3">
    </div>
</div>

<script>
    function openPage(page) {
        // You can add additional logic here if needed
        window.location.href = page;
    }

    function showMoreImages() {
        // Add logic for showing more images
    }
</script>
    <!-- Signup Modal -->
    <div id="signupModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeSignupModal()">&times;</span>
            <h2>Sign Up</h2>
            <form action="signup_process.php" method="post" id="signupForm">
                <!-- Your existing signup form fields -->
                <label for="username">Username:</label>
                <input type="text" name="username" required>

                <label for="mobile">Mobile Number:</label>
                <input type="text" name="mobile" pattern="[0-9]+" title="Please enter only numeric values" required>

                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" required>

                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

    <!-- Login/Signup Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeLoginModal()">&times;</span>
            <h2>Login/Signup</h2>
            <div id="login-form-container">
                <!-- Your existing login form fields -->
                <!-- ... -->
            </div>
            <div id="signup-form-container">
                <!-- Your existing signup form fields -->
                <!-- ... -->
            </div>
        </div>
    </div>

    <!-- Your existing JavaScript code -->
    <script src="signup_validation.js"></script>
    <script>
        // Function to close the signup modal
        function closeSignupModal() {
            const signupModal = document.getElementById("signupModal");
            signupModal.style.display = "none";
        }

        // Function to close the login modal
        function closeLoginModal() {
            const loginModal = document.getElementById("loginModal");
            loginModal.style.display = "none";
        }

        // Function to handle logout
        function logout() {
            // Implement your logout logic here
            // For example, redirect the user to the logout endpoint
            window.location.href = "logout.php";
        }

        function redirectLogin() {
        // Redirect to the login page
        window.location.href = "login.html";
    }
    function logout() {
        // Implement your logout logic here
        // For example, redirect the user to the logout endpoint
        window.location.href = "logout.php";
    }
    </script>
    <footer>
    &copy; 2023 Town Guide
  </footer>
</body>

</html>