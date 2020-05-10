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

function clearSession(){
    session_destroy();
}

if(array_key_exists('clearSession', $_POST)) { 
    clearSession(); 
}

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
    . htmlspecialchars($_SESSION["name"]) . "<br>"
    . htmlspecialchars($_SESSION["address"]) . "<br>"
    . htmlspecialchars($_SESSION["city"]) . "<br>"
    . htmlspecialchars($_SESSION["zip"]) . "<br>"
    . htmlspecialchars($_SESSION["state"]) . "<br><br>You should have recieved an invoice at " . $_SESSION["email"] . "";

?>
</h2>

<form method="post">
<button type="submit" name="clearSession" value="Return to Browsing" formaction="/03Prove/login.php">Return to Browsing</button>
</form>

<script src="cart.js"></script>

<?php
unset($_SESSION["cart"]); 
$_SESSION["cart"] = array();
unset($_SESSION["prices"]); 
$_SESSION["prices"] = array();
unset($_SESSION["name"]);
unset($_SESSION["address"]);
unset($_SESSION["city"]);
unset($_SESSION["zip"]);
unset($_SESSION["state"]);

?>
</body>
</html>