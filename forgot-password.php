<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

require_once "db_connection.php";

$email = "";
$email_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate email
    if (empty($email_err)) {
        $sql = "SELECT id, username, firstname FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Generate a unique token
                    $token = bin2hex(random_bytes(32));

                    // Store the token and email in the password_reset table
                    $sql = "INSERT INTO password_reset (email, token) VALUES (?, ?)";
                    if ($stmt = mysqli_prepare($link, $sql)) {
                        mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_token);
                        $param_email = $email;
                        $param_token = $token;

                        if (mysqli_stmt_execute($stmt)) {
                            // Send the reset password link to the user's email
                            $to = $email;
                            $subject = "Reset Password";
                            $message = "Please click the following link to reset your password: http://yourdomain.com/reset-password.php?token=" . $token;
                            $headers = "From: yourname@yourdomain.com";

                            if (mail($to, $subject, $message, $headers)) {
                                // Redirect to the confirmation page
                                header("location: forgot-password-confirm.php");
                            } else {
                                $general_err = "Oops! Something went wrong. Please try again later.";
                            }
                        } else {
                            $general_err = "Oops! Something went wrong. Please try again later.";
                        }
                    } else {
                        $general_err = "Oops! Something went wrong. Please try again later.";
                    }
                } else {
                    $email_err = "No account found with that email address.";
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
    <title>Forgot Password</title>
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
                            <p class="forgot-password"><a href="#">Forgot Password?</a></p>
                            <?php if (!empty($general_err)) { ?>
                                <div class="general-error"><?php echo $general_err; ?></div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <p class="text-center">Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body