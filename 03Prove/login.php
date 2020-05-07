<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Login</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
$_SESSION["cart"] = array("vader", "lightsaber", "ATST");
echo "Session variables are set.";
?>

<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
echo "I have " . $_SESSION['cart'][1] . ", " . $_SESSION['cart'][2] . " and " . $_SESSION['cart'][0] . " in my cart.";
?>
<br>
<br>

<?php
function alert() {
  echo "Added Artoo to cart";
}

alert(); // call the function
?>

<img src="images/Artoo.PNG" alt="Artoo" height=25% width=auto><br>
  <p>Remote Control R2-D2<br>$29.99</p>
  <input type="checkbox" name="item[]" value="R2-D2"> Add to cart<br>
  <button onclick="addArtoo()">Add to cart</button>
  <button onclick="addATST()">Add to cart</button>
  <button onclick="addArtoo()">Add to cart</button>
<br>
<br>

<form action="login.php" method="post" id="frmLogin">
  <div><label for="login">Username</label></div>
  <div><input name="user_name" type="text"></div>
  <br>
  <img src="images/Artoo.PNG" alt="Artoo" height=25% width=auto><br>
  <p>Remote Control R2-D2<br>$29.99</p>
  <input type="checkbox" name="item[]" value="R2-D2"> Add to cart<br>
  <img src="images/ATST.PNG" alt="AT-ST" height=25% width=auto><br>
  <p>Model AT-ST<br>$45.99</p>
  <input type="checkbox" name="item[]" value="AT-ST"> Add to cart<br>
  <img src="images/DarthVader.PNG" alt="Darth Vader" height=25% width=auto><br>
  <p>Darth Vader Mask<br>$59.99</p>
  <input type="checkbox" name="item[]" value="DarthVader Helmet"> Add to cart<br>
  <img src="images/lightSaber.PNG" alt="Light Saber" height=25% width=auto><br>
  <p>LightSaber Collection Set<br>$129.99</p>
  <input type="checkbox" name="item[]" value="Light Saber"> Add to cart<br>




  <div><input type="submit" name="login" value="go to cart"></span></div>  
</form>

<script src="cart.js"></script>
</body>
</html>