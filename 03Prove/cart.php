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
$_SESSION["total"] = 0;
?>

<h1>Welcome to your Cart</h1>

<form method="post">
<button type="submit" formaction="/03Prove/login.php">Continue Shopping</button>
<button type="submit" formaction="/03Prove/checkout.php">Checkout</button><br><br>
</form>

<div>
   

<?php
    
for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
    $_SESSION["total"] = $_SESSION["total"]+$_SESSION["prices"][$i];
    echo " " . $_SESSION["cart"][$i] . " $" . $_SESSION["prices"][$i] . "";    
    echo "<br>";
}
    echo "<br>Total $" . $_SESSION["total"]. "";

?>
    
    
</div>

<script src="cart.js"></script>
</body>
</html>