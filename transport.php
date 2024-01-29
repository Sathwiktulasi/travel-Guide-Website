<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Town Guide - Transportation</title>
  <style>
    /* Reset some default styles for consistency */
    body, h1, h2, h3, p, ul, li {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Arial', sans-serif;
        line-height: 1.6;
        background-color: #f5f5f5;
    }

    header {
        background-color: #3498db;
        color: white;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    h1 {
        margin: 0;
    }

    nav {
        text-align: center;
    }

    main {
        padding: 20px;
    }

    .transportation-listings {
        margin-bottom: 40px;
    }

    .transportation-option {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden;
        transition: box-shadow 0.3s, transform 0.3s; /* Added transition for smoother hover effect */
    }

    .transportation-option:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Apply box shadow on hover */
        transform: scale(1.05); /* Slightly increase size on hover */
    }

    .transportation-frame {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 150px; /* Set a fixed height for consistency */
        overflow: hidden; /* Hide overflow to ensure consistent size */
    }

    .transportation-frame img {
        width: 120%; /* Slightly increase the image size */
        height: 100%; /* Maintain aspect ratio */
        object-fit: cover; /* Use "cover" to maintain aspect ratio and cover the container */
    }

    .transportation-details {
        padding: 20px;
    }

    h3 {
        color: #3498db;
    }

    p {
        color: #666;
    }

    .book-now-button {
        margin-top: 15px;
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }

    .book-now-button a {
        color: white;
        text-decoration: none;
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
    <section class="transportation-listings">
      <h2>Transportation Options</h2>
      <div class="transportation-option" style="display: flex; flex-direction: row;" id="Flight">
        <div class="transportation-frame">
          <img src="airport.jpg" alt="Airport">
        </div>
        <div id="flights" class="transportation-details" style="padding-left: 20px;">
          <h3>Vijayawada International Airport</h3>
          <p>Book a flight to your destination from/to Vijayawada.</p>
          <button class="book-now-button">
            <a href="https://www.makemytrip.com/" target="_blank">Book Now</a>
          </button>
        </div>
      </div>

      <div class="transportation-option" style="display: flex; flex-direction: row;">
        <div class="transportation-frame">
          <img src="railwaystation.jpg" alt="Train">
        </div>
        <div id="trains"class="transportation-details" style="padding-left: 20px;">
          <h3>Vijayawada Junction</h3>
          <p>Ride the train for convenient transportation.</p>
          <button class="book-now-button">
            <a href="https://www.irctc.co.in/" target="_blank">Book Now</a>
          </button>
        </div>
      </div>

      <div class="transportation-option" style="display: flex; flex-direction: row;">
        <div class="transportation-frame">
          <img src="bustand.png" alt="Bus">
        </div>
        <div id="buses"class="transportation-details" style="padding-left: 20px;">
          <h3>Pandit Nehru Bus Station</h3>
          <p>Biggest bus terminal in Asia.</p>
          <button class="book-now-button">
            <a href="https://www.makemytrip.com/bus-tickets/" target="_blank">Book Now</a>
          </button>
        </div>
      </div>
    </section>

    <section id="local" class="transportation-listings">
      <h2>Local Transport</h2>

      <div class="transportation-option" style="display: flex; flex-direction: row;">
        <div class="transportation-frame">
          <img src="localbus.jpg" alt="City Bus">
        </div>
        <div class="transportation-details" style="padding-left: 20px;">
          <h3>City/Local Bus</h3>
          <p>Explore the town with city bus services.</p>
        </div>
      </div>

      <div class="transportation-option" style="display: flex; flex-direction: row;">
        <div class="transportation-frame">
          <img src="auto.jpg" alt="Auto Rickshaw">
        </div>
        <div class="transportation-details" style="padding-left: 20px;">
          <h3>Auto Rickshaw</h3>
          <p>Hail an auto rickshaw for a local ride.</p>
        </div>
      </div>
    </section>
  </main>
  <footer>
    &copy; 2023 Town Guide
  </footer>
  <script>
    function scrollToSection(sectionId) {
        const targetSection = document.getElementById(sectionId);
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
  </script>
</body>
</html>
