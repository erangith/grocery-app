<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast N Fresh - About Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .banner {
            background-color: #28a745;
            color: white;
            padding: 50px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <?php include('navbar.php'); ?>

    <!-- Banner -->
    <section class="banner">
        <div class="container">
            <h1>About Us</h1>
            <p>Learn more about Fast N Fresh and our mission</p>
        </div>
    </section>

    <!-- About Us Content -->
    <section class="about-us py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Story</h2>
                    <p>"Fast N Fresh was born out of a shared passion for technology and a desire to make a difference in people's lives. The idea first came to Thanuka Mabulage Don, Lokitha Nilaweera, and Poorna Dadayakkara dewege while studying software engineering at Acadia University in 2022.

                        As students, they often struggled with balancing coursework, part-time jobs, and grocery shopping. They realized that there had to be a better way to get groceries, one that would save time and eliminate the stress of navigating crowded aisles and long checkout lines.</p>

                    <p>    They began developing their idea for a fast and fresh grocery delivery service, combining their knowledge of software engineering with their understanding of the industry. Over time, the concept evolved, and they realized that they could use their skills to create an entirely new shopping experience.

                        Since then, they've been working tirelessly to bring Fast N Fresh to life, building a team of experienced professionals, sourcing the freshest produce, and developing a seamless ordering and delivery system.

                        At Fast N Fresh, they're committed to providing customers with the highest quality products at competitive prices, delivered right to their doorstep. They believe that grocery shopping should be easy, fast, and enjoyable, and they're dedicated to making that a reality for everyone.

                        Join Fast N Fresh on their journey to revolutionize the grocery shopping experience and make fresh, healthy, and affordable groceries accessible to all."</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img src="logo.png" alt="Fast N Fresh" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <h2>Our Mission</h2>
                    <p>Our mission is to revolutionize the way people shop for groceries by offering a convenient and user-friendly platform that brings the best products and deals directly to our customers. We aim to create a sustainable and eco-friendly shopping experience that benefits both our customers and the environment.</p>
                </div>
                <div class="col-md-6">
                    <h2>Our Vision</h2>
                    <p>At Fast N Fresh, we envision a world where grocery shopping is a seamless and enjoyable experience for everyone. We aim to continuously innovate and adapt to the ever-changing needs of our customers while maintaining our commitment to sustainability and exceptional customer service.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>