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

?>

<h1>Please Log In</h1>

<?php
foreach ($db->query('SELECT * FROM public.scriptures') as $row)
{
  echo '' . $row['book'];
  echo ' ' . $row['chapter'];
  echo ':' . $row['verse'];
  echo ' - "' . $row['content'];
  echo '"';
  echo '<br/>';
}
?>

<form action="/Project/home.php" method="post">
username: <input type="text" name="username"><br>
password: <input type="password" name="password"><br>
<input type="submit">
</form>



<script src="cart.js"></script>
</body>
</html>