<?php
session_start();

if (!isset($_SESSION['cart'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5HQz5FnMyAt2mB+5lD8pDj+mUigz6+GcIvfjcV6D" crossorigin="anonymous"></script>
<?php include('navbar.php'); ?>
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalPrice = 0;
                    foreach ($_SESSION['cart'] as $id => $item) {
                        echo "<tr>";
                        echo "<td>" . $item['name'] . "</td>";
                        echo "<td>" . $item['quantity'] . "</td>";
                        echo "<td>$" . $item['price'] * $item['quantity'] . "</td>";
                        echo "</tr>";
                        $totalPrice += $item['price'] * $item['quantity'];
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <h3>Total: $<?php echo number_format($totalPrice, 2); ?></h3>

        <button id="confirmCheckoutButton" class="btn btn-cart">Check Out</button>
        <button id="goBackButton" class="btn btn-cart" onclick="location.href='index.php'">Go Back</button>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>

<script>
    let cart = JSON.parse(localStorage.getItem('cart')) || {};

    $(document).ready(function() {
        $("#confirmCheckoutButton").on("click", function() {
            console.log("Checkout button clicked"); // Add this line
            $.ajax({
                type: "POST",
                url: "save_shopping_history.php",
                data: {cart: JSON.stringify(cart)},
                success: function(response) {
                    console.log("AJAX response:", response); // Add this line
                    if (response === "success") {
                        alert("Your order has been placed successfully!");
                        location.href = "index.php";
                    } else {
                        alert("An error occurred while processing your order. Please try again.");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) { // Add this block
                    console.log("AJAX error:", textStatus, errorThrown);
                }
            });
        });
    });

</script>
