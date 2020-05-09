<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Nerd Store</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();
$_SESSION["name"]=$_POST["name"];
$_SESSION["email"]=$_POST["email"];
$_SESSION["address"]=$_POST["address"];
$_SESSION["city"]=$_POST["city"];
$_SESSION["zip"]=$_POST["zip"];
$_SESSION["state"]=$_POST["state"];
//unset($_SESSION["cart"]); 
  //$_SESSION["cart"] = array();
  //unset($_SESSION["prices"]); 
  //$_SESSION["prices"] = array();
print_r($_SESSION);
?>

<h1>Thank you for your Purchase</h1>
<h2>
<?php

for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
    $_SESSION["total"] = $_SESSION["total"]+$_SESSION["prices"][$i];
    echo " " . $_SESSION["cart"][$i] . " $" . $_SESSION["prices"][$i] . "";    
    echo "<br>";
}
    echo "<br>Total $" . $_SESSION["total"]. "<br><br>";

echo "Your order will shipped in 3-5 business days to the following
    information...<br>"
    . $_SESSION["name"] . "<br>"
    . $_SESSION["address"] . "<br>"
    . $_SESSION["city"] . "<br>"
    . $_SESSION["zip"] . "<br>"
    . $_SESSION["state"] . "<br><br>You should have recieved an invoice at " . $_SESSION["email"] . "";

?>
</h2>

<form method="post">
<button type="submit" formaction="/03Prove/login.php">Return to Browsing</button>
</form>

<script src="cart.js"></script>
</body>
</html>