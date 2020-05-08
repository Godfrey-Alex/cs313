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

<h1>Welcome to your Cart</h1>

<form method="post">
<button type="submit" formaction="/03Prove/login.php">Continue Shopping</button>
<button type="submit" formaction="/03Prove/checkout.php">Checkout</button>
</form>

<div>
   

<?php
    
for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
    echo $_SESSION["cart"][$i];
    //echo " " . $_SESSION["prices"][$i] .;
    //<br>
}
?>
    
    
</div>

<script src="cart.js"></script>
</body>
</html>