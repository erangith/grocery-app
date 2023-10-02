<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

require_once "db_connection.php";

$username = $password = "";
$username_err = $password_err = $general_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter your username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, username, password, firstname FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $firstname);

                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["firstname"] = $firstname;
                            $_SESSION['email'] = $email;

                            header("location: welcome.php");
                        } else {
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    $username_err = "No account found with that username.";
                }
            } else {
                $general_err = "Oops! Something went wrong. Please try again later.";
            }
        } else {
            $general_err = "Oops! Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In/Sign Up</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom styles -->
    <style>
        body {
            background-color: #f5f5f5;
        }
        .card {
            margin-top: 60px;
            margin-bottom: 60px;
            box-shadow: 0 0 40px rgba(0,0,0,.05);
            border: none;
        }
        .card-header {
            background-color: #fff;
            border-bottom: none;
        }
        .card-body {
            padding: 30px;
        }
        .form-group label {
            font-weight: 500;
            font-size: 16px;
            color: #555;
            margin-bottom: 5px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #80bdff;
        }
       
        .form-control::-webkit-input-placeholder {
            color: #bbb;
        }
        .form-control::-moz-placeholder {
            color: #bbb;
        }
        .form-control:-ms-input-placeholder {
            color: #bbb;
        }
        .btn {
            font-size: 16px;
            font-weight: 500;
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 16px;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .btn:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .forgot-password {
            font-size: 14px;
            text-align: right;
        }
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        .general-error {
            color: #dc3545;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php include('navbar.php'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Sign In</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <div class="form-group forgot-password">
                                <a href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <?php if (!empty($general_err)) { ?>
                                <div class="form-group">
                                    <p class="general-error"><?php echo $general_err; ?></p>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <div class="text-center">
                    <p>Don't have an account? <a href="register.php">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include('footer.php'); ?>
</body>
</html>