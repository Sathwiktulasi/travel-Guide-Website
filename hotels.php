<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your existing head content here -->
    <!-- ... -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="hotelscss.css">
    <style>
        /* Add the modified styles here */

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #3498db;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-right: 20px;
        }

        .search-bar {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .header-right a {
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            background-color: #2980b9;
        }

        main {
            padding: 20px;
        }

        .town-name {
            margin-bottom: 20px;
        }

        .town-name span {
            font-size: 20px;
            font-weight: bold;
            margin-right: 10px;
        }

        .town-name-display {
            font-size: 20px;
        }

        .booking-options {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .price-filter,
        .ratings-filter,
        .filter-button {
            flex: 1;
            margin-right: 10px;
        }

        .price-filter label,
        .ratings-filter label {
            display: block;
            margin-bottom: 5px;
            color: #3498db;
        }

        .price-inputs {
            display: flex;
            margin-bottom: 10px;
        }

        .price-inputs input {
            margin-right: 10px;
            flex: 1;
            padding: 8px;
            border: 1px solid #3498db;
            border-radius: 5px;
            font-size: 14px;
        }

        .ratings-filter select {
            width: 100%;
            padding: 8px;
            border: 1px solid #3498db;
            border-radius: 5px;
            font-size: 14px;
        }

        .filter-button button {
            width: 100%;
            padding: 8px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .filter-button button:hover {
            background-color: #2980b9;
        }

        .hotel-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .hotel-container {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            box-sizing: border-box;
            flex-grow: 1;
            transition: transform 0.3s ease-in-out;
        }

        .hotel-container:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .hotel-container {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .hotel-container {
                width: 100%;
            }
        }

        .hotel {
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
        }

        .hotel img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .hotel-details {
            padding: 20px;
        }

        .hotel h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #3498db;
        }

        .ratings,
        .address,
        .price {
            margin-bottom: 10px;
        }

        .ratings {
            color: #f39c12;
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
        <div class="header-left">
            <span class="logo">Town Guide</span>
            <input type="text" placeholder="Search" class="search-bar">
        </div>
        <div class="header-right">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<span class="username">Welcome, ' . $_SESSION['username'] . '!</span>';
            } else {
                echo '<button onclick="redirectLogin()">Login/Signup <i class="fas fa-user"></i></button>';
        }
            ?>
        </div>
    </header>

    <!-- Add the rest of your existing HTML content here -->
    <!-- ... -->
    <main>
        <div class="town-name">
            <span>Destination:</span>
            <span class="town-name-display">Town Name</span>
        </div>

        <div class="booking-options">
            <div class="price-filter">
                <label for="price-min">Price Range:</label>
                <div class="price-inputs">
                    <input type="number" id="price-min" placeholder="Min">
                    <input type="number" id="price-max" placeholder="Max">
                </div>
            </div>

            <div class="ratings-filter">
                <label for="ratings">Ratings:</label>
                <select id="ratings">
                    <option value="4">4+</option>
                    <option value="3">3+</option>
                    <option value="2">2+</option>
                    <option value="1">1+</option>
                </select>
            </div>

            <div class="filter-button">
                <button type="button" class="search-btn" id="search-btn">Filter</button>
            </div>
        </div>

        <div class="hotel-list">
            <!-- Your hotel containers go here -->
            <!-- Example hotel container -->
            <div class="hotel-container">
                <div class="hotel" data-price="5525" data-ratings="5.0">
                    <a href="hotel1.php" class="hotel-link">
                        <img src="Lemon tree premier-hotel1.jpg" alt="Hotel 1">
                    </a>
                    <div class="hotel-details">
                        <a href="hotel1.php" class="hotel-link">
                            <h3>Lemon Tree Premier</h3>
                        </a>
                        <div class="ratings">Ratings: 5.0</div>
                        <div class="address">MG Road Opp. Sub Collector Office, Vijayawada 520002 India</div>
                        <div class="price">Rs.5525 per night</div>
                    </div>
                </div>
            </div>
            <div class="hotel-container">
                <div class="hotel" data-price="3200" data-ratings="4.5">
                    <a href="hotel2.php" class="hotel-link">
                        <img src="red fox-hotel2.jpg" alt="Hotel 2">
                    </a>
                    <div class="hotel-details">
                        <a href="hotel2.php" class="hotel-link">
                            <h3>Red Fox hotel</h3>
                        </a>
                        <div class="ratings">Ratings: 4.5</div>
                        <div class="address">D Number 27 - 44 - 8 Patibandavari Street M. G. Road, Vijayawada 520002 India</div>
                        <div class="price">Rs.3200 per night</div>
                    </div>
                </div>
            </div><div class="hotel-container">
                <div class="hotel" data-price="7615" data-ratings="5.0">
                    <a href="hotel3.php" class="hotel-link">
                        <img src="Novotel vijayawada varun-hotel3.jpg" alt="Hotel 3">
                    </a>
                    <div class="hotel-details">
                        <a href="hotel3.php" class="hotel-link">
                            <h3>Novotel Vijayawada</h3>
                        </a>
                        <div class="ratings">Ratings: 5.0</div>
                        <div class="address">Bharthi Nagar, Vijayawada 520008 India</div>
                        <div class="price">Rs.7615 per night</div>
                    </div>
                </div>
            </div><div class="hotel-container">
                <div class="hotel" data-price="2500" data-ratings="3.0">
                    <a href="hotel4.php" class="hotel-link">
                        <img src="hyatt-place-hotel6.jpg" alt="Hotel 4">
                    </a>
                    <div class="hotel-details">
                        <a href="hotel4.php" class="hotel-link">
                            <h3>Hyatt Place</h3>
                        </a>
                        <div class="ratings">Ratings: 3.0</div>
                        <div class="address">48-12-13, ESI Bus stop, Eluru road, Gunadala, Vijayawada 520004 India</div>
                        <div class="price">Rs.2500 per night</div>
                    </div>
                </div>
            </div><div class="hotel-container">
                <div class="hotel" data-price="3000" data-ratings="4.0">
                    <a href="hotel5.php" class="hotel-link">
                        <img src="manorama-hotel4.jpg" alt="Hotel 5">
                    </a>
                    <div class="hotel-details">
                        <a href="hotel5.php" class="hotel-link">
                            <h3>Manorama Hotel</h3>
                        </a>
                        <div class="ratings">Ratings: 4.0</div>
                        <div class="address">M.G. Road, near Old Bus Stand Governorpet, Vijayawada 520002 India</div>
                        <div class="price">Rs.3000 per night</div>
                    </div>
                </div>
            </div>
            <!-- Repeat the above structure for more hotels -->
        </div>
    </main>
    <!-- Your existing JavaScript code -->
    <script>
        const searchBtn = document.getElementById("search-btn");
        const priceMinInput = document.getElementById("price-min");
        const priceMaxInput = document.getElementById("price-max");
        const ratingsSelect = document.getElementById("ratings");
        const hotelList = document.querySelectorAll(".hotel");

        searchBtn.addEventListener("click", () => {
            const priceMin = parseFloat(priceMinInput.value);
            const priceMax = parseFloat(priceMaxInput.value);
            const selectedRatings = parseFloat(ratingsSelect.value);

            hotelList.forEach((hotel) => {
                const price = parseFloat(hotel.getAttribute("data-price"));
                const ratings = parseFloat(hotel.getAttribute("data-ratings"));

                if (
                    (!priceMin || price >= priceMin) &&
                    (!priceMax || price <= priceMax) &&
                    ratings >= selectedRatings
                ) {
                    hotel.style.display = "block";
                } else {
                    hotel.style.display = "none";
                }
            });
        });
        function redirectLogin() {
        // Redirect to the login page
        window.location.href = "login.html";}
    </script>
    <footer>
    &copy; 2023 Town Guide
  </footer>
</body>

</html>