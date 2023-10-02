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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = !empty($_POST["email"]) ? trim($_POST["email"]) : $userDetails["email"];
    $address = !empty($_POST["address"]) ? trim($_POST["address"]) : $userDetails["address"];
    $phonenumber = !empty($_POST["phonenumber"]) ? trim($_POST["phonenumber"]) : $userDetails["phonenumber"];
    $creditcard = !empty($_POST["creditcard"]) ? trim($_POST["creditcard"]) : $userDetails["creditcard"];

    $sql = "UPDATE users SET email = ?, address = ?, phonenumber = ?, creditcard = ? WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ssssi", $email, $address, $phonenumber, $creditcard, $_SESSION["id"]);
        if ($stmt->execute()) {
            header("location: welcome.php");
        } else {
            echo "Something went wrong. Please try again later.";
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
    <title>Edit User Details</title>
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
        <h2>Edit User Details</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($userDetails["email"]); ?>">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($userDetails["address"]); ?>">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phonenumber" class="form-control" value="<?php echo htmlspecialchars($userDetails["phonenumber"]); ?>">
            </div>
            <div class="form-group">
                <label>Credit Card</label>
                <input type="text" name="creditcard" class="form-control" value="<?php echo htmlspecialchars($userDetails["creditcard"]); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="welcome.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
<?php include("footer.php"); ?>
</body>
</html>