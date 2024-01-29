<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Reservation</title>
    <link rel="stylesheet" href="restaurants.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .logo {
            font-size: 1.8em;
            margin-right: 20px;
        }

        .header-right a, .username {
            color: #fff;
            text-decoration: none;
            margin-left: auto;
        }

        main {
            padding: 20px;
            background-color: #f8f8f8; /* Add a background color to the main content */
        }

        .town-name {
            margin-bottom: 20px;
        }

        .booking-options {
            display: flex;
            gap: 20px;
        }

        .ratings-filter,
        .search-button {
            display: flex;
            align-items: center;
        }

        .ratings-filter label {
            margin-right: 10px;
        }

        .ratings-filter select,
        .search-button button {
            padding: 10px;
        }

        .restaurant-list {
            display: flex;
            flex-wrap: wrap;
            gap: 1px;
            justify-content: space-evenly;
        }

        .restaurant {
            width: calc(22% - 20px);
            box-sizing: border-box;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
        }

        .restaurant:hover {
            transform: scale(1.05);
        }

        .restaurant-image img {
            width: 100%;
            height: auto;
            cursor: pointer;
        }

        .restaurant-details {
            text-align: center;
            padding: 10px;
        }

        .timings {
            margin-top: 7px;
        }

        .menu-btn, .reserve-btn {
            display: block;
            margin: 10px auto;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .menu-btn:hover, .reserve-btn:hover {
            background-color: #555;
        }

        /* Add the modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            overflow-y: scroll;
        }

        .modal-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            box-sizing: border-box;
        }

        .menu-container {
            width: 80%;
            max-height: 80%;
            overflow-y: auto;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
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
        <div class="town-name">
            <span>Destination:</span>
            <span class="town-name-display">Vijayawada</span><br>
            <p>Restaurants</p>
        </div>


        <div class="restaurant-list">
            <!-- Repeat the following structure for more restaurants -->
            <!-- Repeat the following structure for more restaurants -->
            <div class="restaurant" data-ratings="4.5">
                <div class="restaurant-image">
                    <img src="silver dum biryani.png" alt="Restaurant 1" onclick="showMenu(['sdb menu1.png', 'sdb menu 2.png'])">
                </div>
                <div class="restaurant-details">
                    <h3>Silver Dum biryani</h3>
                    <div class="ratings">Ratings: 4.0</div>
                    <div class="address">Vaishnavi Plaza, Panta Kaluva Rd, near NTR Circle, New Postal Colony-2, Patamata, Benz Circle, Vijayawada</div>
                    <div class="timings">Timings: 12:00 PM - 11:00 PM</div>
                    <button type="button" class="menu-btn" onclick="showMenu(['sdb menu1.png', 'sdb menu 2.png'])">Menu</button>
                    <a href="tablereservation.html" class="reserve-btn">Reserve a Table</a>
                </div>
            </div>
            <div class="restaurant" data-ratings="4.5">
                <div class="restaurant-image">
                    <img src="verandah coffee.png" alt="Restaurant 1" onclick="showMenu(['verandah menu1.jpg', 'verandah menu2.jpg'])">
                </div>
                <div class="restaurant-details">
                    <h3>Verandah Coffee Roasters and Café</h3>
                    <div class="ratings">Ratings: 4.7</div>
                    <div class="address">54-20-6, Ground floor, Road # 1, Kanaka Durga Gazetted Officers Colony, Guru Nanak Colony, Vijayawada</div>
                    <div class="timings">Timings: 10:00 AM - 10:00 PM</div>
                    <button type="button" class="menu-btn" onclick="showMenu(['verandah menu1.jpg', 'verandah menu2.jpg'])">Menu</button>
                    <a href="tablereservation.html" class="reserve-btn">Reserve a Table</a>
                </div>
            </div>
            <div class="restaurant" data-ratings="4.5">
                <div class="restaurant-image">
                    <img src="minerva .jpg" alt="Restaurant 1" onclick="showMenu(['minerva menu1.jpg', 'minerva menu2.jpg'])">
                </div>
                <div class="restaurant-details">
                    <h3>Minerva Grand restaurant</h3>
                    <div class="ratings">Ratings: 3.5</div>
                    <div class="address">Hotel Minerva Grand, 5th Floor, Terrace Garden, 40-7-11C, Opp. PVP Mall, MG Rd, Sidhartha Nagar, Labbipet, Vijayawada</div>
                    <div class="timings">Timings: 7:00 AM - 11:00 PM</div>
                    <button type="button" class="menu-btn" onclick="showMenu(['minerva menu1.jpg', 'minerva menu2.jpg'])">Menu</button>
                    <a href="tablereservation.html" class="reserve-btn">Reserve a Table</a>
                </div>
            </div>
            <div class="restaurant" data-ratings="4.5">
                <div class="restaurant-image">
                    <img src="ironhill1.jpg" alt="Restaurant 1" onclick="showMenu(['ironhill menu1.png', 'ironhill menu2.png'])">
                </div>
                <div class="restaurant-details">
                    <h3>Ironhill</h3>
                    <div class="ratings">Ratings: 3.2</div>
                    <div class="address">40-7-6 Gowriah Street, Mogalrajapuram, Labbipet, Vijayawada</div>
                    <div class="timings">Timings: 11:00 AM - 11:00 PM</div>
                    <button type="button" class="menu-btn" onclick="showMenu(['ironhill menu1.png', 'ironhill menu2.png'])">Menu</button>
                    <a href="tablereservation.html" class="reserve-btn">Reserve a Table</a>
                </div>
            </div>
            <!-- ... (unchanged restaurant entries) ... -->
            <!-- End of repeated structure -->
        </div>
    </main>

    <!-- Add the modal structure at the end of the body -->
    <div id="menuModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeMenuModal()">&times;</span>
            <div class="menu-container"> <!-- Removed onClick event for the next page -->
                <!-- Add your initial menu image here -->
            </div>
        </div>
    </div>
    <script>
        const searchBtn = document.getElementById("search-btn");
const ratingsSelect = document.getElementById("ratings");
const restaurantList = document.querySelectorAll(".restaurant");

searchBtn.addEventListener("click", () => {
    const selectedRatings = parseFloat(ratingsSelect.value);

    restaurantList.forEach((restaurant) => {
        const ratings = parseFloat(restaurant.getAttribute("data-ratings"));

        if (!isNaN(ratings) && ratings >= selectedRatings) {
            restaurant.style.display = "flex";
        } else {
            restaurant.style.display = "none";
        }
    });
});

        function showMenu(menuImageUrls) {
            const menuModal = document.getElementById("menuModal");
            const modalContent = document.querySelector(".modal-content");

            // Set the content of the modal to the menu images
            const menuContainer = modalContent.querySelector(".menu-container");
            menuContainer.innerHTML = '';

            menuImageUrls.forEach((imageUrl) => {
                const menuImage = document.createElement("img");
                menuImage.src = imageUrl;
                menuImage.alt = "Menu";
                menuContainer.appendChild(menuImage);
            });

            // Display the modal
            menuModal.style.display = "flex";
        }

        function closeMenuModal() {
            const menuModal = document.getElementById("menuModal");

            // Hide the modal
            menuModal.style.display = "none";
        }
    </script>
    <footer>
    &copy; 2023 Town Guide
  </footer>
</body>
</html>
