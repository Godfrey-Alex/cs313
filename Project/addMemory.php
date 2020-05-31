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
  echo $_POST["mTitle"];
  echo $_POST["mDate"];
  echo $_POST["mText"];
  $query = 'INSERT INTO public.memory(memory_name, memory_date, memory_text) VALUES(:memory_name, :memory_date, :memory_text)';
  //$statement = $db->prepare($query);
  //$statement->bindValue(':memory_name', $_POST["mTitle"];
  //$statement->bindValue(':memory_date', $_POST["mDate"];
  //$statement->bindValue(':memory_text', $_POST["mText"];
  //$statement->execute();
 // $lastMemoryId = $db->lastInsertId("memory_id_seq");

  //$query1 = 'INSERT INTO public.memory_list (user_id, friend_id, memory_id) VALUES (:user_id,:friend_id, :memory_id)';
  //echo $query1;
  //$statement = $db->prepare($query1);
  //$statement->bindValue(':user_id', $_SESSION["currentUserId"];
  //$statement->bindValue(':friend_id', $_SESSION["viewFriendId"];
  //$statement->bindValue(':memory_id', $lastMemoryId;
  //$statement->execute();

  header("Location: https://young-hollows-53465.herokuapp.com/Project/home.php");
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