<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Nerd Store</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();
//print_r($_SESSION);
?>

<h1>Checkout</h1>

<form method="post">
<button type="submit" formaction="/03Prove/cart.php">Return to Cart</button><br><br>
<!--<button type="submit" formaction="/03Prove/confirm.php">Buy Now</button>-->
</form>

<form action="/03Prove/confirm.php" method="POST">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Street Address: <input type="text" name="address"><br>
City: <input type="text" name="city"><br>
Zip: <input type="text" name="zip"><br>
State: <input type="text" name="state"><br>

<input type="submit">
</form>

<script src="cart.js"></script>
</body>
</html>