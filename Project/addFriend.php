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

<h1>Please give the name of your new friend.</h1>

<?php
$nfDisplay_name = 'Scott Sprague';
$query = 'INSERT INTO friend2(display_name) VALUES(:display_name)';
$statement = $db->prepare($query);

// Now we bind the values to the placeholders. This does some nice things
// including sanitizing the input with regard to sql commands.
$statement->bindValue(':display_name', $nfDisplay_name);
$statement->execute();
$lastFriendId = $db->lastInsertId("friend2_id_seq");
echo $lastFriendId;
?>

<form action="/Project/home.php" method="post">
New Friend Name: <input type="text" name="nfDisplay_name"><br>
<input type="submit" value="Add Friend" name="addNewFriend">
</form>



<script src="cart.js"></script>
</body>
</html>