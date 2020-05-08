<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Nerd Store</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
print_r($_SESSION);
?>

<h1>Welcome to your Cart</h1>

<form method="post">
<button type="submit" formaction="/03Prove/login.php">Continue Shopping</button>
<button type="submit" formaction="/03Prove/checkout.php">Checkout</button>
</form>

<script src="cart.js"></script>
</body>
</html>