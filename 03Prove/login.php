<?php
session_start();
?>

<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Nerd Store</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
$_SESSION["favcolor"] = "Red";
$_SESSION["favanimal"] = "Honey Badger";
$_SESSION["cart"] = array();
echo "Session variables are set.";
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
echo "I have " . $_SESSION['cart'][1] . ", " . $_SESSION['cart'][2] . " and " . $_SESSION['cart'][0] . " in my cart.";

function clearCart() {
  unset($_SESSION["cart"]); // $foo is gone
  $_SESSION["cart"] = array();
}
function addR2cart() {
  //echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  array_push($_SESSION['cart'],"R2D2");

}
function addATSTcart() {
  array_push($_SESSION['cart'],"ATST");
}
function addVadercart() {
  array_push($_SESSION['cart'],"VADER");
}
function addLightSabercart() {
  array_push($_SESSION['cart'],"LSABER");
}

if(array_key_exists('clear', $_POST)) { 
  clearCart(); 
} 
else if(array_key_exists('artoo', $_POST)) { 
  addR2cart(); 
}
else if(array_key_exists('atst', $_POST)) { 
  addATSTcart(); 
}
else if(array_key_exists('vader', $_POST)) { 
  addVadercart(); 
}
else if(array_key_exists('saber', $_POST)) { 
  addLightSabercart(); 
} 
print_r($_SESSION);

?>

<br>
<br>
<?php //phpAlert("Hello world!\\n\\nPHP has got an Alert Box");  ?>

<form method="post">
<img src="images/Artoo.PNG" alt="Artoo" height=25% width=auto><br>
  <p>Remote Control R2-D2<br>$29.99</p>
  <input type="submit" class="button" name="artoo" value="Add to Cart" /><br><br>

  <img src="images/ATST.PNG" alt="AT-ST" height=25% width=auto><br>
  <p>Model AT-ST<br>$45.99</p>
  <input type="submit" class="button" name="atst" value="Add to Cart"/><br><br>

  <img src="images/DarthVader.PNG" alt="Darth Vader" height=25% width=auto><br>
  <p>Darth Vader Mask<br>$59.99</p>
  <input type="submit" class="button" name="vader" value="Add to Cart"/><br><br>

  <img src="images/lightSaber.PNG" alt="Light Saber" height=25% width=auto><br>
  <p>LightSaber Collection Set<br>$129.99</p>
  <input type="submit" class="button" name="saber" value="Add to Cart"/><br><br>
  <input type="submit" class="button" name="clear" value="Clear Cart"/><br><br>
  </form>
<br>
<br>

<script src="cart.js"></script>
</body>
</html>