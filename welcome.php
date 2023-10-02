<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: signin.php");
    exit;
}

include("navbar.php");

require_once "config.php";

$userDetails = [];
if (isset($_SESSION["id"])) {
    $sql = "SELECT email, address, phonenumber, creditcard FROM users WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $_SESSION["id"]);
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($email, $address, $phonenumber, $creditcard);
                $stmt->fetch();
                $userDetails = [
                    "email" => $email,
                    "address" => $address,
                    "phonenumber" => $phonenumber,
                    "creditcard" => $creditcard,
                ];
            }
        }
        $stmt->close();
    }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($userDetails["email"]); ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo htmlspecialchars($userDetails["address"]); ?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?php echo htmlspecialchars($userDetails["phonenumber"]); ?></td>
            </tr>
            <tr>
                <th>Credit Card</th>
                <td><?php echo htmlspecialchars($userDetails["creditcard"]); ?></td>
            </tr>
        </table>
        <a class="btn btn-primary" href="edit_user.php">Edit</a>
    </div>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome, <?php echo htmlspecialchars($_SESSION["firstname"]); ?>!</h1>
            <p class="lead">You have successfully logged in.</p>
            <hr class="my-4">
            <p>Explore our website and enjoy shopping.</p>
            <a class="btn btn-primary btn-lg" href="home.php" role="button">Go to Home</a>
            <a class="btn btn-secondary btn-lg" href="signout.php" role="button">Sign Out</a>
        </div>
    </div>
<?php include("footer.php"); ?>
</body>
</html>
