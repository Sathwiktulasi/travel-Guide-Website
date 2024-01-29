<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Town Guide - Entertainment</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-content {
            display: flex;
            align-items: center;
        }

        .search-bar {
            flex: 1;
            margin: 0 20px;
        }

        .profile-link {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 50px;
            background-color: #555;
        }

        main {
            padding: 20px;
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        .venue {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .venue:hover {
            transform: scale(1.05);
        }

        .venue img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
        }

        .mall-container,
        .event-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .mall-box
        {
            flex: 0 0 calc(22% - 20px); /* 4 items per row, adjust as needed */
            margin-bottom: 20px;
        }
        .event-box {
            flex: 0 0 calc(25% - 20px); /* 4 items per row, adjust as needed */
            margin-bottom: 20px;
        }
        .event-box {
            margin-bottom: 10px; /* Adjust the margin as needed */
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-content">
            <h1>Town Guide</h1>
            <div class="search-bar">
       
            </div>
        </div>
        <div class="header-right">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<span class="username">Welcome, ' . $_SESSION['username'] . '!</span>';
            } else {
                echo '<a href="#" class="signup-login-link">Sign Up/Login</a>';
            }
            ?>
        </div>
    </header>

    <main>
        <h1>Entertainment in Town</h1>

        <div class="button-container">
            <a href="#mall-multiplex-section" class="button">Malls/Multiplexes</a>
            <a href="#eateries-parks-section" class="button">Eateries and Parks in town</a>
            <a href="#events-section" class="button">Events in Town</a>
        </div>

        <section id="mall-multiplex-section" class="mall-multiplex-listings">
            <h2>Malls and Multiplexes</h2>
            <div class="mall-container">
                <div class="venue mall-box">
                    <img src="ripples mall.jpg" alt="Mall 1 Image">
                    <h3>PVR Ripples mall</h3>
                    <p>Ratings: 4.8/5</p>
                    <p>Timings: 10:00 AM - 10:00 PM</p>
                    <p>Location: M.G Road, Labbipet, Vijayawada</p>
                    <!-- Add map here -->
                </div>
                <div class="venue mall-box">
                    <img src="Trendset mall.jpg" alt="Mall 2 Image">
                    <h3>Trendset mall</h3>
                    <p>Ratings: 5/5</p>
                    <p>Timings: 10:00 AM - 11:00 PM</p>
                    <p>Location: MG Road, Sai Nagar, Kala Nagar, Benz Circle, Vijayawada</p>
                    <!-- Add map here -->
                </div>
                <div class="venue mall-box">
                    <img src="PVPSquare.jpeg" alt="Mall 2 Image">
                    <h3>PVP Square</h3>
                    <p>Ratings: 4.9/5</p>
                    <p>Timings: 10:00 AM - 10:00 PM</p>
                    <p>Location: Mogalrajapuram, Labbipet, Vijayawada</p>
                    <!-- Add map here -->
                </div>
                <div class="venue mall-box">
                    <img src="Lepl centro.jpg" alt="Mall 2 Image">
                    <h3>LEPL centro</h3>
                    <p>Ratings: 4.3/5</p>
                    <p>Timings: 10:00 AM - 10:00 PM</p>
                    <p>Location: Opp Murali Fortune, MG Rd, Vijayawada</p>
                    <!-- Add map here -->
                </div>
                <!-- Add more malls/multiplexes as needed -->
            </div>
        </section>

        <section id="eateries-parks-section" class="eateries-parks-listings">
            <h2>Eateries and Parks in Town</h2>
            <div class="mall-container">
                <div class="venue mall-box">
                    <img src="eat street .png" alt="Eatery 1 Image">
                    <h3>Eat Street - Vijayawada</h3>
                    <p>Ratings: 4.2/5</p>
                    <p>Timings: 6:00 AM - 10:00 PM</p>
                    <p>Location: Park Street, Vijayawada</p>
                    <!-- Add map here -->
                </div>
                <div class="venue mall-box">
                    <img src="ironhill.png" alt="Eatery 2 Image">
                    <h3>Ironhill Brewery</h3>
                    <p>Ratings: 4.2/5</p>
                    <p>Timings: 12:00 PM - 11:00 PM</p>
                    <p>Location:Gowriah Street, Mogalrajapuram, Labbipet, Vijayawada</p>
                    <!-- Add map here -->
                </div>
                <div class="venue mall-box">
                    <img src="vault - pub and restaurant.png" alt="Park 1 Image">
                    <h3>Vault-Pub and restaurant</h3>
                    <p>Ratings: 4.1/5</p>
                    <p>Timings: 11:00 AM - 11:00 PM</p>
                    <p>Location:VSN Mall, Gayatri Nagar, Vijayawada</p>
                    <!-- Add map here -->
                </div>
                <div class="venue mall-box">
                    <img src="rajiv gandhi park.png" alt="Park 2 Image">
                    <h3>Rajiv Gandhi park</h3>
                    <p>Ratings: 3.8/5</p>
                    <p>Timings: 9:00 AM - 10:00 PM</p>
                    <p>Location: NH 65, Krishnalanka, Vijayawada</p>
                    <!-- Add map here -->
                </div>
                <!-- Add more eateries/parks as needed -->
            </div>
        </section>

        <section id="events-section" class="concerts-events-listings">
            <h2>Concerts and Events</h2>
            <div class="event-container">
                <div class="venue event-box">
                    <img src="standup comedy.png" alt="Event 1 Image">
                    <h3>Saikiran Pure veg jokes</h3>
                    <h4>Standup comedy</h4>
                    <p>Place: Hotel Vdara</p>
                    <p>Date: SUN , December 17, 2023</p>
                    <p>Time: 7:00 PM</p>
                    <p>From Rs.499</p>
                    <!-- Add map here -->
                </div>
                <div class="venue event-box">
                    <img src="boat tour.png" alt="Event 2 Image">
                    <h3>Boat Tour @ Amaravati Boating Club</h3>
                    <p>Place: The AMaravati boating club - Durga Ghat</p>
                    <p>Date: SUN , november 19,2023</p>
                    <p>Time: 7:00 AM</p>
                    <p>From Rs.400 </p>
                    <!-- Add map here -->
                </div>
                <div class="venue event-box">
                    
                    <h3>NO more Events </h3>
                    
                </div>

                <!-- Add more concerts/events as needed -->
            </div>
        </section>

    </main>
    <footer>
        &copy; 2023 Town Guide
    </footer>
</body>
</html>