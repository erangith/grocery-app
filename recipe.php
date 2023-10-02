<!DOCTYPE html>
<html>
<head>
    <title>Recipes</title>
    <style>
        /* Global styles */
        body {
            background-color: #9CCC65;
            color: #333;
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        /* Header */
        header {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,.2);
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        /* Recipe cards */
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .recipe {
            margin-bottom: 50px;
        }

        .card {
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,.2);
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,.3);
        }

        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-subtitle {
            font-size: 1.2rem;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
        }

        
    </style> 
</head>
<?php include('navbar.php'); ?>
<body>
    <?php
        // Recipes array
        $recipes = [
            [
                "name" => "Spaghetti Carbonara",
                "ingredients" => ["spaghetti", "pancetta", "garlic", "eggs", "pecorino cheese", "black pepper", "salt"],
                "instructions" => "1. Cook spaghetti according to package instructions.<br>2. In a large pan, cook pancetta and garlic until crispy.<br>3. In a bowl, whisk eggs, pecorino cheese, and black pepper.<br>4. Drain spaghetti and add to the pan with pancetta and garlic. Remove from heat.<br>5. Quickly stir in egg mixture until spaghetti is coated. Serve immediately.",
                "image" => "https://tse3.mm.bing.net/th?id=OIP.Y9Ggv_GmsWWjWgnvJOc1XQHaHa&pid=Api&P=0"
            ],
            [
                "name" => "Chicken Parmesan",
                "ingredients" => ["chicken breasts", "breadcrumbs", "parmesan cheese", "mozzarella cheese", "marinara sauce", "olive oil", "salt", "pepper"],
                "instructions" => "1. Preheat oven to 375Â°F.<br>2. Season chicken breasts with salt and pepper.<br>3. In a shallow dish, mix breadcrumbs and parmesan cheese.<br>4. Coat chicken breasts with breadcrumb mixture.<br>5. In a large pan, heat olive oil and cook chicken breasts until golden brown.<br>6. In a baking dish, pour marinara sauce on the bottom. Add chicken breasts on top.<br>7. Cover chicken breasts with more marinara sauce.<br>8. Top with mozzarella cheese.<br>9. Bake in the oven for 25 minutes or until cheese is melted and bubbly.",
                "image" => "https://tse3.mm.bing.net/th?id=OIP.aqMrOim4LvX-K_ljKk1gggHaLH&pid=Api&P=0"
            ],
            [
                "name" => "Beef Stroganoff",
                "ingredients" => ["beef sirloin", "onion", "mushrooms", "beef broth", "sour cream", "egg noodles", "flour", "butter", "salt", "pepper"],
                "instructions" => "1. Cook egg noodles according to package instructions.<br>2. Season beef sirloin with salt and pepper. Dredge in flour.<br>3. In a large pan, melt butter and cook beef sirloin until browned on all sides.<br>4. Remove beef from pan and set aside. Add onions and mushrooms to the same pan and cook until softened.<br>5. Add beef broth and bring to a simmer. Add beef back to the pan.<br>6. Simmer for 10 minutes or until beef is cooked through.<br>7. Remove from heat and stir in sour cream.<br>8. Serve beef stroganoff over cooked egg noodles.",
                "image" => "https://tse4.mm.bing.net/th?id=OIP.rBxSVEgT5zpwOvkbvS4GWgHaHa&pid=Api&P=0"
            ],
        ];

        // Display the recipes
        echo '<div class="container">';
        echo '<div class="row">';
        foreach ($recipes as $recipe) {
            echo '<div class="col-sm-6 col-md-4">';
            echo '<div class="card mb-4">';
            echo '<img class="card-img-top" src="' . $recipe['image'] . '" alt="Card image cap">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $recipe['name'] . '</h5>';
            echo '<h6 class="card-subtitle mb-2 text-muted">Ingredients:</h6>';
            echo '<ul>';
            foreach ($recipe['ingredients'] as $ingredient) {
            echo '<li>' . $ingredient . '</li>';
            }
            echo '</ul>';
            echo '<h6 class="card-subtitle mb-2 text-muted">Instructions:</h6>';
            echo '<p class="card-text">' . nl2br($recipe['instructions']) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            }
            echo '</div>';
            echo '</div>';
            ?>
            <?php include('footer.php'); ?>
            </body>
            </html>