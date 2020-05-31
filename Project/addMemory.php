<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Friend</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();
$friendId = $_POST['radioFriendId'];
$_SESSION["viewFriendId"]=$_POST['radioFriendId'];
//echo 'friend id: '.$friendId;
$friendButton = $_POST[''];
//echo 'current user id: ' .$_SESSION["currentUserId"];

print_r($_SESSION);
echo $_SESSION["currentUserId"];

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

if(array_key_exists('addMemory', $_POST)) { 
  echo 'it worked';
  echo $_POST["mTitle"]);
  //$query = 'INSERT INTO friend(display_name) VALUES(:display_name)';
  //$statement = $db->prepare($query);
  //$statement->bindValue(':display_name', $_POST["nfDisplay_name"]);
  //$statement->execute();
  //$lastFriendId = $db->lastInsertId("friend_id_seq");
  //echo $lastFriendId;
  } 

?>

<h1>New Memory</h1>
<h3>Please tell about a memory with your friend</h3>

<form method="post">  
  <label for="mTitle">Memory Title:</label><br>
  <input type="text" id="mTitle" name="mTitle"><br>
  <label for="mDate">Memory Date:</label><br>
  <input type="date" id="mDate" name="mDate"><br><br>

  <textarea id="mText" name="mText" rows="4" cols="50">
   Tell about your memory...
  </textarea><br><br>
  <input type="submit" class="button" name="addMemory" value="Add Memory" /><br><br>
  </form>

<script src="cart.js"></script>
</body>
</html> 