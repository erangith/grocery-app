<?php
session_start();

if (isset($_POST['add']) && isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['quantity'])) {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $quantity = $_POST['quantity'];

    // If the cart doesn't exist yet, create it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // If the product is already in the cart, update its quantity
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else { // Otherwise, add the product to the cart
        require_once('db_connection.php');

        // Retrieve product details from the database
        $query = "SELECT * FROM products WHERE id=$id";
        $result = mysqli_query($connection, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $product = mysqli_fetch_assoc($result);

                // Add the product to the cart
                $_SESSION['cart'][$id] = array(
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $quantity
                );

                echo "success";
            } else {
                // Handle the case where the product couldn't be retrieved from the database
                die("Error: Product not found in database.");
            }
        } else {
            // Handle the case where the query fails
            die("Error: " . mysqli_error($connection));
        }

        mysqli_free_result($result);
        mysqli_close($connection);
    }
} else {
    echo "error";
}

// Add this line to check the contents of $_SESSION['cart']
echo "Cart contents: " . print_r($_SESSION['cart'], true);
print_r($_SESSION['cart']);
?>
