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
$_SESSION["cart"] = array("vader", "lightsaber", "ATST");
echo "Session variables are set.";
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
echo "I have " . $_SESSION['cart'][1] . ", " . $_SESSION['cart'][2] . " and " . $_SESSION['cart'][0] . " in my cart.";

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function addR2cart() {
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function addATSTcart() {
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function addVadercart() {
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function addLightSabercart() {
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if(array_key_exists('Alert', $_POST)) { 
  phpAlert("test"); 
} 
else if(array_key_exists('artoo', $_POST)) { 
  phpAlert("Artoo added to cart"); 
}
else if(array_key_exists('atst', $_POST)) { 
  phpAlert("AT-ST added to cart"); 
}
else if(array_key_exists('vader', $_POST)) { 
  phpAlert("Vader added to cart"); 
}
else if(array_key_exists('saber', $_POST)) { 
  phpAlert("Sabers added to cart"); 
} 
?>

<br>
<br>
<?php //phpAlert("Hello world!\\n\\nPHP has got an Alert Box");  ?>

<form method="post">
<img src="images/Artoo.PNG" alt="Artoo" height=25% width=auto><br>
  <p>Remote Control R2-D2<br>$29.99</p><br>
  <input type="submit" class="button" name="artoo" value="Add to Cart" /><br>

  <img src="images/ATST.PNG" alt="AT-ST" height=25% width=auto><br>
  <p>Model AT-ST<br>$45.99</p><br>
  <input type="submit" class="button" name="atst" value="Add to Cart"/><br>

  <img src="images/DarthVader.PNG" alt="Darth Vader" height=25% width=auto><br>
  <p>Darth Vader Mask<br>$59.99</p><br>
  <input type="submit" class="button" name="vader" value="Add to Cart"/><br>

  <img src="images/lightSaber.PNG" alt="Light Saber" height=25% width=auto><br>
  <p>LightSaber Collection Set<br>$129.99</p><br>
  <input type="submit" class="button" name="saber" value="Add to Cart"/><br>
  </form>
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