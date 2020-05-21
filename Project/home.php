<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Scriptures</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();
include '/Project/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($name)) {
        echo "No username was entered";
    } else {
        echo $username;
    }

    if (empty($password)) {
        echo "No password was entered";
    } else {
        echo $username;
    }
}

/*try
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
}*/

?>

<h1>Behold your friends:</h1>






<script src="cart.js"></script>
</body>
</html>