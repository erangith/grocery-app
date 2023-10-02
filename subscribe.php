<?php
// Database connection settings
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the email address from the form
$email = $_POST['email'];

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
$stmt->bind_param("s", $email);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Thank you for subscribing to our newsletter!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and the connection
$stmt->close();
$conn->close();
?>


<form class="form-inline" action="subscribe.php" method="post">
    <div class="form-group mx-sm-3 mb-2">
        <input type="email" class="form-control" id="newsletterEmail" name="email" placeholder="Enter your email address" required>
    </div>
    <button type="submit" class="btn btn-light mb-2">Subscribe</button>
</form>