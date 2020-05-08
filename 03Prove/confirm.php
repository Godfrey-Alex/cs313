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

<h1>Thank you for your Purchase</h1>

<form method="post">
<button type="submit" formaction="/03Prove/cart.php">Return to Cart</button>
<button type="submit" formaction="/03Prove/confirm.php">Buy Now</button>
</form>

<script src="cart.js"></script>
</body>
</html>