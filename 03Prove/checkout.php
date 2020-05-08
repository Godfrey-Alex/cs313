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
?>

<h1>Checkout</h1>

<form method="post">
<button type="submit" formaction="/03Prove/cart.php">Return to Cart</button><br>
<!--<button type="submit" formaction="/03Prove/confirm.php">Buy Now</button>-->
</form>

<form action="confirm.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br><br>
<input type="submit">
</form>

<script src="cart.js"></script>
</body>
</html>