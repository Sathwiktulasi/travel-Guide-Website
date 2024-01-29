<!-- about_us.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Town Guide</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Town Guide</h1>
        <div id="login-signup">
            <?php echo $welcomeMessage; ?>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<button onclick="logout()">Logout <i class="fas fa-sign-out-alt"></i></button>';
            } else {
                echo '<button onclick="redirectLogin()">Login/Signup <i class="fas fa-user"></i></button>';
            }
            ?>
        </div>
    </header>

    <div id="town-name">
        <p>About Us</p>
    </div>

    <div class="description">
        <p>Welcome to Town Guide, your ultimate destination for exploring the beauty and charm of Vijayawada! We strive to provide you with comprehensive information about the city's attractions, hotels, places to visit, and much more.

        Town Guide is developed by Sathwik and Thatwik, passionate individuals dedicated to showcasing the rich cultural heritage and modern allure of Vijayawada. Our platform aims to make your journey through this vibrant city seamless and memorable.

        Explore the various sections of our website to discover the hidden gems, plan your stay at top-notch hotels, and indulge in the diverse entertainment options Vijayawada has to offer.

        Thank you for choosing Town Guide as your travel companion. Happy exploring!</p>
    </div>

    <footer>
        &copy; 2023 Town Guide | Developed by Sathwik and Thatwik
    </footer>
</body>

</html>
