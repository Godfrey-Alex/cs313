<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Login</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();

//print_r($_SESSION);

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

if(array_key_exists('loginPost', $_POST)) { 
  echo 'you hit login';
}else if(array_key_exists('SignUp', $_POST)){
  echo 'you hit sign up';
}

?>

<h1>Please Log In</h1>



<form method="post">
username: <input type="text" name="username"><br>
password: <input type="password" name="password"><br>
<input type="login" value="Login" name="loginPost">
<button type="SignUp" value="SignUp">Sign Up</button>
</form>



<script src="cart.js"></script>
</body>
</html>