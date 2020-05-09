<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Nerd Store</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();
print_r($_SESSION);
echo $_POST["name"];
$_SESSION["name"]=$_POST["name"];
echo $_SESSION["name"];
$_SESSION["email"]=$_POST["email"];
$_SESSION["address"]=$_POST["address"];
$_SESSION["city"]=$_POST["city"];
$_SESSION["zip"]=$_POST["zip"];
$_SESSION["state"]=$_POST["state"];
print_r($_SESSION);
?>

<h1>Thank you for your Purchase</h1>
<h2>
<?php
echo "Your order will shipped in 3-5 business days to the following
    information...<br>"
    . $_SESSION["name"] . "<br>"
    . $_SESSION["address"] . "<br>"
    . $_SESSION["city+"] . "<br>"
    . $_SESSION["zip"] . "<br>"
    . $_SESSION["state"] . "<br><br>You should have recieved an invoice at " . $_SESSION["email"] . "";

?>
</h2>

<form method="post">
<button type="submit" formaction="/03Prove/cart.php">Return to Cart</button>
<button type="submit" formaction="/03Prove/confirm.php">Buy Now</button>
</form>

<script src="cart.js"></script>
</body>
</html>