<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
    exit();
}

function get_user_data($email) {
    // Replace the following with your actual database connection credentials.
    $host = "localhost";
    $dbname = "users";
    $user = "root";
    $password = "mysql";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user_data;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}

// Fetch user data from the database using the email in the session.
// You will need to create a function called 'get_user_data' that accepts the email address and returns an associative array with user data.
$user_data = get_user_data($_SESSION['email']);

// Display user data.
echo "Name: " . htmlspecialchars($user_data['name']) . "<br>";
echo "Email: " . htmlspecialchars($user_data['email']) . "<br>";
// Add more fields as needed.

// Display the Sign Out button.
echo '<a href="signout.php">Sign Out</a>';
?>

