<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Scriptures</title>
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
  //echo 'you hit login '.$_POST["username"];
  //$query = "SELECT id from public.teach_user where username = '".$_POST["username"]."' and password = '".$_POST["password"]."'";
  //echo $query;
  $userIdResult = $db->query("SELECT id from public.user where username = '".$_POST["username"]."' and password = '".$_POST["password"]."'");
  while ($row = $userIdResult->fetch(PDO::FETCH_ASSOC)){
    echo $row['id'];
    $_SESSION['currentUserID'] = $row['id'];    
  }
  //header("Location: https://young-hollows-53465.herokuapp.com/Project/home.php");
    exit();
}else if(array_key_exists('SignUp', $_POST)){
  header("Location: https://young-hollows-53465.herokuapp.com/Project/signUp.php");
    exit();
}

?>

<h1>Please Log In</h1>

<?php
/*foreach ($db->query('SELECT * FROM public.scriptures') as $row)
{
  echo '' . $row['book'];
  echo ' ' . $row['chapter'];
  echo ':' . $row['verse'];
  echo ' - "' . $row['content'];
  echo '"';
  echo '<br/>';
}
*/
?>

<form method="post">
username: <input type="text" name="username"><br>
password: <input type="password" name="password"><br>
<input type="submit" class="button" name="loginPost" value="Login"/><br>
<input type="submit" class="button" name="SignUp" value="Sign Up"/><br>
</form>



<script src="cart.js"></script>
</body>
</html>