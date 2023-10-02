<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Suppliers - Fast N Fresh</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS -->
    <style>
    body {
        background-color: #9CCC65 !important; /* Light green */
    }

    .supplier {
        margin-bottom: 50px;
    }

    .supplier img {
        max-width: 200px;
        height: auto;
        margin-bottom: 15px;
        display: block;
        margin: 0 auto;
    }

    .supplier h3 {
        color: #2E7D32; /* Dark green */
        margin-bottom: 10px;
        text-align: center;
    }

    .supplier p {
        color: #333333;
        text-align: justify;
    }
</style>

</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1 class="my-5 text-center" style="color: #2E8B57;">Our Suppliers</h1>
        <div class="row">
            <div class="col-md-4 supplier">
                <img src="https://cdn.mos.cms.futurecdn.net/5StAbRHLA4ZdyzQZVivm2c.jpg" alt="Walmart logo">
                <br>
                <h3>Walmart</h3>
                <p>Walmart is one of our major suppliers, providing a wide variety of products at affordable prices. With their commitment to sustainability and offering an extensive range of products, we can ensure our customers receive quality items while supporting the environment.</p>
            </div>
            <div class="col-md-4 supplier">
                <img src="data:image/png;base64,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" alt="Atlantic Superstore logo">
                <br>
                <h3>Atlantic Superstore</h3>
                <p>Atlantic Superstore is a well-known Canadian supermarket chain that focuses on fresh, local, and high-quality products. We partner with them to bring the best in groceries and household items to our customers. Their support for local suppliers helps us provide unique products from various regions.</p>
            </div>
            <div class="col-md-4 supplier">
                <img src="data:image/png;base64,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" alt="Sobeys logo">
                <br>
                <h3>Sobeys</h3>
                <p>Sobeys is a leading Canadian grocery store that offers a diverse selection of products, including fresh produce, bakery, and meat products. Their dedication to quality and sustainability ensures that our customers enjoy a wide variety of choices while contributing to a greener future.</p>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- Add jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>