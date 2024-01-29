<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Town Attractions</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            background-image: url('background-image.jpg'); /* Add your background image path */
            background-size: cover;
            background-repeat: no-repeat;
            color: #333;
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
            font-size: 1.5em;
            margin-right: 20px;
        }

        .search-bar {
            margin-right: 20px;
        }

        .header-right a {
            color: rgb(222, 99, 99);
            text-decoration: none;
            margin-left: auto;
        }

        main {
            padding: 20px;
        }

        .town-name {
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.5em;
            color: #333;
        }

        .attraction-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-evenly;
        }

        .attraction {
            width: calc(25% - 20px); /* Adjusted to display four places in one row */
            box-sizing: border-box;
            margin-bottom: 20px;
            border: 2px solid #931818;
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .attraction-image {
            max-height: none;
            overflow: hidden;
            border-bottom: 1px solid #ccc;
        }

        .attraction-image img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .attraction:hover .attraction-image img {
            transform: scale(1.1);
        }

        .attraction-details {
            text-align: center;
            padding: 20px;
        }

        .ratings {
            margin-top: 10px;
            color: #da6363;
            font-weight: bold;
        }

        .review {
            margin-top: 15px;
            font-style: italic;
            color: #555;
        }

        .map-link {
            margin-top: 15px;
            display: block;
            background-color: #4caf50;
            color: white;
            padding: 12px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }

        .map-link:hover {
            background-color: #45a049;
        }

        @keyframes changeContent {
            0%, 100% {
                opacity: 1;
            }
            20%, 80% {
                opacity: 0;
            }
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
    </header>

    <main>
        <div class="town-name">
            <span>Explore the Attractions in:</span>
            <span class="town-name-display">Vijayawada</span>
        </div>

        <div class="attraction-list" id="attraction-list">
            <!-- Attraction elements will be dynamically added here -->
        </div>
    </main>

    <script>
        const attractionsData = [
            {
                name: 'Kanaka Durga Temple',
                description: 'The Kanaka Durga Temple is a famous shrine dedicated to the Goddess Durga. Located in Vijayawada district of Andhra Pradesh, this astounding architecture is built in Dravidian fashion. The temple is surrounded by the hills of Inrakeeladri, right along the banks of the Krishna River.',
                ratings: '4.1',
                images: ['kanaka-durga-temple-place1.jpg', 'kanaka-durga-temple2.jpg', 'kanaka-durga-temple3.jpg'],
                reviews: ['IT is very accurate and the detail explanation is very good, as the guidance is also good to reach the temple and the places for visiting and staying it is helpful for me like a scripture writing people. To know about the more join with us at "link hidden"-Sathwik', 'Its peaceful and has a good view of Vijayawada from the top of the hill- Nithin'],
                latitude: 16.5079,
                longitude: 80.6460
            },
            {
                name: 'Undavalli Caves',
                description: 'A monolithic example of Indian rock-cut architecture, the Undavalli Caves are located in the city of Guntur, Andhra Pradesh. Carved out of a solid sandstone on a hillside, these caves date back to the 4th to 5th centuries and is a paradise for history lovers. One of the preserved monuments of national importance, this attraction was originally the Jain caves and was later converted into a Hindu temple.',
                ratings: '4.2',
                images: ['undavalli-caves-place2.jpg', 'undavalli-caves2.jpg', 'undavalli-caves3.jpg'],
                reviews: ['A must visit for those interested in history, art and architecture - Raja', 'These were quite old and three floor structure. Nothing special in the cave. A temple inside having Padmaswamy statue adds to the attraction. Dont recommend going there specifically, can check out if near to this place - Sharvya'],
                latitude: 16.4970,
                longitude: 80.6515
            },
            {
                name: ' Bhavani Island',
                description: 'Bhavani island is one of the largest islands on a river and is located over the Krishna river at Vijayawada. The vast expanse of the island proves to be the perfect place for a relaxing weekend. If you are one for adventure sports and water slides, this is an exhilarating place to visit! It is named after the Goddess Bhavani or Kanaka Durga whose temple is on the Indrakeeladri hill close to the island. Bhavani island can be reached by boat from the banks of Krishna river.',
                ratings: '4.0',
                images: ['Bhavaniisland -place5.jpg', 'bhavani-island2.jpg', 'bhavani-island3.jpg'],
                reviews: ['Great island. If you are staying in the island, exploring the island before at dawn or dusk is really satisfying. If you can get your food, that will improve your experience here. The attractions really keep the kids engaged and are good though could definitely be maintained much better - Tanishq', 'We can plan a dayout either with family or with friends, both ways we can enjoy the place, food is also available here but its quality is not as per the remaining hotels in vijayawada , better to take food along with you if you are travelling to this place with kids - Kesav'],
                latitude: 16.523615693409607, 
                longitude: 80.57313221235103,
            },
            {
                name: 'Prakasam Barrage',
                description: 'Standing on a whopping 160 pillars and offering an astounding view of the holy River Krishna, the Prakasam Barrage does a lot more than just looking majestic. This bridge connects the Kolkata-Chennai highway and facilitates the irrigation of over 1.2 acres of farm land. The entire bridge is lit up with soft yellow lights and is an amazing sight to witness.',
                ratings: '4.2',
                images: ['prakasam-barrage-place3.jpg', 'prakasam-barrage2.jpg', 'prakasam-barrage3.jpg'],
                reviews: ['this is amazing place where we can enjoy and relax. we can enjoy the atmosphere with fresh air, colourful the scenery, and water waves etc. we can enjoy street side food also atleast every family member can visit once at ant time- Nuthan', 'this is amazing place where we can enjoy and relax. we can enjoy the atmosphere with fresh air, colourful the scenery, and water waves etc. we can enjoy street side food also atleast every family member can visit once at ant time - Prudhvi'],
                latitude: 16.50764277648985,
                longitude: 80.60527021261989,
            },
            {
                name: 'Hinkar Thirtha',
                description: 'One of the most renowned Jain temples, this structure houses the only Jain Shrine in the area. Adorned with the Jain style of architecture, this is also one of the most beautiful structures in town.',
                ratings: '4.2',
                images: ['jain temple place 7.jpg', 'hinkar-thirtha-jain-temple3.jpg', 'hinkar-thirtha-jain-temple2.jpg'],
                reviews: ['Very powerful temple i visited twice very nice atmosphere also i suggest to visit with family here not to visit in sunny period - Vaishnavi', 'The Hinkar Tirtha is a Jain temple, which is based on the main highway out of Vijaywada. The place is clean and peaceful and is beautifully built, especially the carvings- Mayur'],
                latitude: 16.377888347775123,
                longitude:  80.51967152241356,
            },
           
            // Add more objects for each attraction with its images and reviews
        ];

        function createAttractionElement(attraction) {
            const attractionElement = document.createElement('div');
            attractionElement.classList.add('attraction');
            attractionElement.setAttribute('data-ratings', attraction.ratings);

            const imageBox = document.createElement('div');
            imageBox.classList.add('attraction-image', 'image-box');
            attractionElement.appendChild(imageBox);

            const detailsBox = document.createElement('div');
            detailsBox.classList.add('attraction-details');
            attractionElement.appendChild(detailsBox);

            const header = document.createElement('h3');
            header.textContent = attraction.name;
            detailsBox.appendChild(header);

            const description = document.createElement('p');
            description.textContent = attraction.description;
            detailsBox.appendChild(description);

            const ratings = document.createElement('div');
            ratings.classList.add('ratings');
            ratings.textContent = 'Ratings: ' + attraction.ratings;
            detailsBox.appendChild(ratings);

            const reviewsBox = document.createElement('div');
            reviewsBox.classList.add('review');
            reviewsBox.id = 'reviews-box';
            detailsBox.appendChild(reviewsBox);

            const mapLink = document.createElement('a');
            mapLink.href = `https://www.google.com/maps?q=${attraction.latitude},${attraction.longitude}`;
            mapLink.target = '_blank';
            mapLink.classList.add('map-link');
            mapLink.textContent = 'View on Map';
            detailsBox.appendChild(mapLink);

            document.getElementById('attraction-list').appendChild(attractionElement);

            return { imageBox, reviewsBox };
        }

        function changeContent(attractionIndex) {
            const currentAttraction = attractionsData[attractionIndex];
            const { imageBox, reviewsBox } = createAttractionElement(currentAttraction);

            let imageIndex = 0;
            let reviewIndex = 0;

            function changeAttractionContent() {
                imageBox.innerHTML = `<img src="${currentAttraction.images[imageIndex]}" alt="Attraction Image">`;
                reviewsBox.innerHTML = `<span>${currentAttraction.reviews[reviewIndex]}</span>`;

                imageIndex = (imageIndex + 1) % currentAttraction.images.length;
                reviewIndex = (reviewIndex + 1) % currentAttraction.reviews.length;

                setTimeout(changeAttractionContent, 3000);
            }

            changeAttractionContent();
        }

        for (let i = 0; i < attractionsData.length; i++) {
            changeContent(i);
        }
    </script>
    <footer>
    &copy; 2023 Town Guide
  </footer>
</body>

</html>
