<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'fastnfresh23@gmail.com';
    $mail->Password = 'FASTNFRESH@2023';
    $mail->SMTPSecure = 'tls';

    $mail->setFrom($email, $name);
    $mail->addAddress('fastnfresh23@gmail.com');
    $mail->Subject = 'New Contact Message';
    $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if ($mail->send()) {
        $successMessage = "Thank you very much for your message, we will get back to you as soon as possible";
    } else {
        $errorMessage = "There was an error sending your message. Please try again. Error details: " . $mail->ErrorInfo;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Fast N Fresh</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS -->
    <style>
        body {
            background-color: #ffffff;
        }
        .contact-info {
            margin-bottom: 30px;
        }
        .contact-info h3 {
            color: #2E8B57;
            margin-bottom: 10px;
        }
        .contact-info p {
            color: #333333;
        }
        .contact-form {
            margin-bottom: 50px;
        }
        .contact-form label {
            color: #2E8B57;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1 class="my-5 text-center" style="color: #2E8B57;">Contact Us</h1>
        <div class="row">
            <div class="col-md-6 contact-info">
                <h3>Our Location</h3>
                <iframe src="https://maps.google.com/maps?q=15%20University%20Ave%2C%20Wolfville%20Nova%20Scotia&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 250px;" allowfullscreen=""></iframe>
                <h3>Contact Details</h3>
                <p>Email: info@fastnfresh.com</p>
                <p>Phone: +1 (555) 123-4567</p>
            </div>
            <div class="col-md-6">
                <form class="contact-form" method="post" action="contact.php">
                <?php if (isset($successMessage)): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $successMessage ?>
                    </div>
                <?php elseif (isset($errorMessage)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $errorMessage ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="6" placeholder="Your Message"></textarea>
                </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #2E8B57; border: none;">Submit</button>
                </form>
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
