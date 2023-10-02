<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_POST['cart'])) {
    echo "error";
    exit;
}

$cart = json_decode($_POST['cart'], true);
$user_id = $_SESSION['user_id'];
$purchase_date = date("Y-m-d H:i:s");

// Database connection settings
$servername = "localhost";
$username = "grocery_user";
$password = "passw0rd";
$dbname = "groceryapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Calculate final total
$final_total = 0;
foreach ($cart as $item) {
    $final_total += $item['price'] * $item['quantity'];
}

// Insert shopping history record
$sql = "INSERT INTO shoppinghistory (user_id, purchase_date, product_details, final_total) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $user_id, $purchase_date, json_encode($cart), $final_total);

if ($stmt->execute()) {
    echo "success";
    unset($_SESSION['cart']);
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>