<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.1);
        }
        .btn-green {
            background-color: rgba(0, 121, 4, 0.8);
            border-color: rgba(0, 121, 4, 0.8);
        }
        .btn-green:hover {
            background-color: rgba(0, 121, 4, 1);
            border-color: rgba(0, 121, 4, 1);
        }
    </style>
</head>
<body>
<?php include('navbar.php'); ?>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Create an Account</h2>
            <form action="register_process.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-green btn-block">Register</button>
            </form>
        </div>
    </div>
<?php include('footer.php'); ?>
</body>
</html>