<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast N Fresh</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #2ecc71;
        }

        .navbar-brand, .nav-link {
            color: #fff;
        }

        .nav-link:hover {
            color: #ecf0f1;
        }

        .header {
            background-color: #2ecc71;
            color: #fff;
            padding: 2rem 0;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .footer {
            background-color: #2ecc71;
            color: #fff;
            padding: 2rem 0;
        }

        a {
            color: #fff;
        }

        a:hover {
            color: #ecf0f1;
            text-decoration: none;
        }

        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
            filter: blur(5px); /* Add blur effect */
        }

        .video-background video {
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Gray color with 50% opacity */
            z-index: 1; /* Overlay positioned above the video */
        }

        .fixed-height {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-img-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-img-container img {
            width: 100%;
            height: auto;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .card-footer {
            display: flex;
            justify-content: flex-end;
        }

        .testimonial-author {
            text-align: center;
        }

        .testimonial-author img {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .testimonial {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .testimonial blockquote {
            flex-grow: 1;
        }

        .testimonial-author {
            text-align: center;
        }

        .testimonial-author img {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

    </style>
</head>
<body>
<?php include('navbar.php'); ?>
    <header class="header">
        <div class="container text-center">
            <h1>Welcome to Fast N Fresh</h1>
            <p>Your one-stop solution for fresh, healthy, and delicious meals.</p>
        </div>
    </header>
    <main>
        <section class="container my-5">
        <div class="video-background">
            <video src="videoIntro.mp4" autoplay loop muted></video>
            <div class="overlay"></div>
        </div>
            <div class="row">
                <div class="col-md-4 d-flex">
                    <div class="card">
                        <div class="card fixed-height">
                            <img src="https://cdn.statefoodsafety.com/blog/2017/09/Is_Fresh_Produce_Safe_to_Eat_Small-compressor.jpeg?odnHeight=150&odnWidth=350&odnBg=ffffff" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Fresh Produce</h5>
                                <p class="card-text">We source the freshest fruits and vegetables from local farms to ensure the highest quality.</p>
                                <a href="groceryapp.php" class="btn btn-success">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="card">
                        <div class="card fixed-height">
                            <img src="https://www.petersimoons.com/wp-content/uploads/2017/03/personal-alliances.png?odnHeight=150&odnWidth=350&odnBg=ffffff" class="card-img-top" alt="...">
                            <div class="card-body">
                                <br></br>
                                <h5 class="card-title">Alliance</h5>
                                <p class="card-text">We're proud to partner with Walmart, Sobeys, and Atlantic Superstore, allowing us to offer top-notch and fresh products to our customers.</p>
                                <a href="suppliers.php" class="btn btn-success">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="card fixed-height">
                        <div class="card">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkF-cLxy2X85ysaVQUHCnxw-ADec9zowq8Zg&usqp=CAU" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Ready-to-Cook Meals</h5> 
                                <p class="card-text">Try our delicious and easy-to-prepare ready-to-cook meal kits that save you time and effort.</p>
                                <a href="recipe.php" class="btn btn-success">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials -->
<section class="testimonials bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">What Our Customers Say</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial d-flex flex-column h-100">
                    <blockquote>
                        <p>"Fast N Fresh's carefully selected high-quality produce and top-notch delivery service make for delicious and nutrient-packed meals. Highly recommended for those in search of excellent fresh products and delivery service."</p>
                    </blockquote>
                    <div class="testimonial-author">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.MXrAs1fKp_OGx0U97-HPoQHaHa%26pid%3DApi&f=1&ipt=9b285655a1647cdbec82de48db8e1963524e29c6998d818b303f3fc0797983c4&ipo=images"  width="100px" height="100px"   alt="Author" class="rounded-circle">
                        <h5>Sofia Smith</h5>
                        <p>Customer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial d-flex flex-column h-100">
                    <blockquote>
                        <p>"The organic selection is fantastic, and their delivery service is fast and reliable. I highly recommend Fast N Fresh for your grocery needs."</p>
                    </blockquote>
                    <div class="testimonial-author">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.explicit.bing.net%2Fth%3Fid%3DOIP.ueWoSOP2NBNORHxxLiuXxQHaHa%26pid%3DApi&f=1&ipt=4f06f4a83a27df9a07c19506608ac33085a7841af66735c0a1338dc60b5a2f30&ipo=images" width="100px" height="100px" alt="Author" class="rounded-circle">
                        <h5>John Doe</h5>
                        <p>Customer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial d-flex flex-column h-100">
                    <blockquote>
                        <p>"I've been using Fast N Fresh for a while now, and I must say that their customer service is top-notch. Whenever I have questions, they are always ready to help."</p>
                    </blockquote>
                    <div class="testimonial-author">
                        <img src="https://cdn.cliqueinc.com/posts/275525/places-to-shop-for-clothes-in-your-30s-275525-1613696764900-square.700x0c.jpg" width="100px" height="100px" alt="Author" class="rounded-circle">
                        <h5>Susan Brown</h5>
                        <p>Customer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Subscription -->
<section class="newsletter py-5" style="background-color: #28a745;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-white mb-4">Subscribe to Our Newsletter</h2>
                <p class="text-white">Stay updated on our latest offers, promotions, and news by subscribing to our newsletter. Don't miss out!</p>
            </div>
            <div class="col-md-6">
                <form class="form-inline">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="email" class="form-control" id="newsletterEmail" placeholder="Enter your email address">
                    </div>
                    <button type="submit" class="btn btn-light mb-2">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>


    </main>
    <?php include('footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>