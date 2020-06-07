<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Scriptures</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();
echo $_SESSION["currentUserId"];
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
print_r($_SESSION);

if(array_key_exists('addFriend', $_POST)) { 
  echo $_POST['nfDisplay_name'];
  $nFriend = $_POST['nfDisplay_name'];
  $query = 'INSERT INTO public.friend(display_name) VALUES(:display_name)';
  $statement = $db->prepare($query);
  $statement->bindValue(':display_name', $nFriend);
  $statement->execute();
  $lastFriendId = $db->lastInsertId("friend_id_seq");


  echo 'last friend id: '.$lastFriendId;
  $query1 = 'INSERT INTO public.user_friend_list (user_id, friend_id) VALUES (:user_id, :friend_id)';
  echo $query1;
  $statement = $db->prepare($query1);
  $statement->bindValue(':user_id', $_SESSION["currentUserID"]);
  $statement->bindValue(':friend_id', $lastFriendId);
  $statement->execute();

  header("Location: https://young-hollows-53465.herokuapp.com/Project/home.php");
  } 
?>

<h1>Please give the name of your new friend.</h1>



<!--<form action="/Project/home.php" method="post">
New Friend Name: <input type="text" name="nfDisplay_name"><br>
<input type="submit" value="Add Friend" name="addNewFriend">
</form>
-->

<form method="post">  
New Friend Name: <input type="text" name="nfDisplay_name"><br>  
<input type="submit" class="button" name="addFriend" value="Add Memory" /><br><br>
</form>



<script src="cart.js"></script>
</body>
</html>