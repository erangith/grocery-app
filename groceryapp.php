<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Grocery App</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
	<style>
		/* Custom CSS */
		body {
			background-color: #f5f5f5;
		}

		.navbar {
			background-color: #2e7d32;
		}

		.navbar a.navbar-brand,
		.navbar a.nav-link {
			color: white;
		}

		.navbar a.nav-link:hover {
			color: #f8f9fa;
		}

		.container-fluid {
			background-color: #2e7d32;
		}

		.container {
			margin-top: 30px;
		}

		.btn-cart {
			background-color: #007bff;
			color: #fff;
			border: none;
			padding: 5px 10px;
			border-radius: 5px;
			cursor: pointer;
		}

		.btn-cart:hover {
			background-color: #0069d9;
		}

		.table thead {
			background-color: #2e7d32;
		}

		.table thead th {
			color: white;
		}
        body {
			background-color: #f8f9fa;
		}
		header {
			background-color: #006400;
		}
		.navbar-brand, .nav-link {
			color: green;
		}
		.container-fluid {
			background-color: #006400;
		}
		.container {
			margin-top: 30px;
		}
		.btn-cart {
			background-color: #006400;
			color: #fff;
			border: none;
			padding: 5px 10px;
			border-radius: 5px;
			cursor: pointer;
		}
		.btn-cart:hover {
			background-color: #004d00;
		}
		.thead-dark {
			background-color: #006400;
			color: white;
		}
	</style>
</head>
<body>
<header>
<?php include('navbar.php'); ?>
</header>
    
<div class="container">
    <h2>Our Products</h2>

    <!-- Add search bar -->
    <div class="form-group">
        <label for="searchBar">Search Products:</label>
        <input type="text" class="form-control" id="searchBar" onkeyup="searchProducts()" placeholder="Search for products">
    </div>

    <!-- Add category headings -->
    <div id="productsByCategory">
        <?php
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

        // Query to retrieve categories
        $sql_categories = "SELECT DISTINCT category_name FROM items ORDER BY category_name ASC";
        $result_categories = $conn->query($sql_categories);

        // Output data of each category
        while ($category = $result_categories->fetch_assoc()) {
            $category_name = $category["category_name"];
            echo "<div class='category-section'>";
            echo "<h3>" . $category_name . "</h3>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-hover'>";
            echo "<thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                  </thead>";
            echo "<tbody class='product-table'>";

            $sql_items = "SELECT id, item_name, brand_name, price, image_url FROM items WHERE category_name = '$category_name'";
            $result_items = $conn->query($sql_items);

            // Output data of each item
            while ($item = $result_items->fetch_assoc()) {
                echo "<tr class='product-row'>";
                echo "<td><img src='" . $item["image_url"] . "' width='100' height='100'></td>";
                echo "<td>" . $item["item_name"] . "</td>";
                echo "<td>" . $item["brand_name"] . "</td>";
                echo "<td>$" . $item["price"] . "</td>";
                echo "<td><button class='btn-cart' onclick='addToCart(" . $item["id"] . ", \"" . $item["item_name"] . "\", " . $item["price"] . ")'>Add to Cart</button></td>";
                echo "</tr>";
            }            

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
        }

        // Close connection
        $conn->close();
        ?>
    </div>

	<h2>Shopping Cart</h2>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="cartItems">
				<!-- Cart items will be appended here -->
			</tbody>
		</table>
	</div>
	<h3>Total: $<span id="totalPrice">0</span></h3>
    <!-- Add Check Out button (initially hidden) -->
    <button id="checkoutButton" class="btn btn-cart" onclick="goToCheckout()" style="display:none;">Check Out</button>

</div>

<script>
	let cart = {};

    function getCartFromSession() {
        $.ajax({
            type: "GET",
            url: "get_cart.php",
            dataType: "json",
            success: function(response) {
                if (response && Object.keys(response).length > 0) {
                    cart = response;
                    displayCart();
                    updateCartCounter();
                }
            }
        });
    }

    
    function updateCartCounter() {
        let totalItems = 0;
        for (let id in cart) {
            totalItems += cart[id].quantity;
        }
        document.getElementById("cartCounter").textContent = totalItems;
    }
	
    
    function addToCart(id, name, price) {
		if (cart[id]) {
			cart[id].quantity++;
		} else {
			cart[id] = {
				name: name,
				price: price,
				quantity: 1
			};
		}
		displayCart();
        updateCartCounter();
	}

	function removeFromCart(id) {
		if (cart[id].quantity > 1) {
			cart[id].quantity--;
		} else {
			delete cart[id];
		}
		displayCart();
        updateCartCounter();
	}

	function displayCart() {
		let cartItems = $("#cartItems");
		cartItems.empty();
		let totalPrice = 0;

		for (let id in cart) {
			let item = cart[id];
            let row = $("<tr></tr>");
            row.append("<td>" + item.name + "</td>");
            row.append("<td>" + item.quantity + "</td>");
            row.append("<td>$" + item.price * item.quantity + "</td>");
            row.append("<td><button class='btn btn-cart' onclick='removeFromCart(" + id + ")'>Remove</button></td>");
            cartItems.append(row);
            totalPrice += item.price * item.quantity;
        }

        $("#totalPrice").text(totalPrice.toFixed(2));

        // Show or hide the Check Out button
        if (totalPrice > 0) {
            $("#checkoutButton").show();
        } else {
            $("#checkoutButton").hide();
        }

        // Save cart to session
        $.ajax({
            type: "POST",
            url: "save_cart.php",
            data: {cart: JSON.stringify(cart)},
            success: function(response) {
                console.log("Cart saved.");
            }
        });
    }

    function searchProducts() {
        let input = document.getElementById("searchBar");
        let filter = input.value.toUpperCase();
        let productTables = document.getElementsByClassName("product-table");

        for (let i = 0; i < productTables.length; i++) {
            let table = productTables[i];
            let productRows = table.getElementsByClassName("product-row");
            let categoryHasMatches = false;

            for (let j = 0; j < productRows.length; j++) {
                let productNameCell = productRows[j].getElementsByTagName("td")[1];
                let productName = productNameCell.textContent || productNameCell.innerText;

                if (filter === "" || productName.toUpperCase().indexOf(filter) > -1) {
                    productRows[j].style.display = "";
                    categoryHasMatches = true;
                } else {
                    productRows[j].style.display = "none";
                }
            }

            let categorySection = table.parentElement.parentElement.parentElement; // Update this line
            if (categoryHasMatches) {
                categorySection.style.display = "";
            } else {
                categorySection.style.display = "none";
            }
        }
    }

    function goToCheckout() {
        let cartJson = JSON.stringify(cart);
        localStorage.setItem('cart', cartJson);
        window.location.href = 'checkout.php';
    }


$(document).ready(searchProducts);
$(document).ready(function() {
    searchProducts();
    getCartFromSession();
    updateCartCounter();
    $(".add-to-cart").click(function() {
        var product_id = $(this).data("id");
        var product_name = $(this).data("name");
        var product_price = $(this).data("price");
        var quantity = $("#quantity-" + product_id).val();

        console.log(`product_id: ${product_id}, product_name: ${product_name}, product_price: ${product_price}, quantity: ${quantity}`);

        $.ajax({
            url: "add_to_cart.php",
            type: "POST",
            data: {
                add: 1,
                product_id: product_id,
                product_name: product_name,
                product_price: product_price,
                quantity: quantity
            },
            success: function(response) {
                console.log("AJAX success:", response); // Add this line
                load_cart_items(); // Reload cart items
                alert(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX error:", textStatus, errorThrown); // Add this line
                alert("Error adding to cart. Please try again.");
            }
        });
    });
});


</script>
<?php include('footer.php'); ?>
<!-- Add jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Add custom JS file -->
<script src="scripts.js"></script>
</body>
</html>