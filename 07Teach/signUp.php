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

if(array_key_exists('SignUp', $_POST)) { 
    $query = 'INSERT INTO public.teach_user(username, password, display_name) VALUES(:username, :password, :display_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $_POST['username']);
    $statement->bindValue(':password', $_POST['password']);
    $statement->bindValue(':display_name', $_POST['displayName']);
    $statement->execute();
    
    header("Location: https://young-hollows-53465.herokuapp.com/07Teach/login.php");
    exit();
}

?>

<h1>Please Create an Account</h1>



<form method="post">
Display Name: <input type="text" name="displayName"><br>
username: <input type="text" name="username"><br>
password: <input type="password" name="password"><br>
<input type="submit" class="button" name="SignUp" value="Sign Up"/><br>
</form>



<script src="cart.js"></script>
</body>
</html>