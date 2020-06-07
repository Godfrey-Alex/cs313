<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Scriptures</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();

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

if(!isset($_SESSION['currentUserID'])){
  header("Location: https://young-hollows-53465.herokuapp.com/Project/login.php");
}


if(array_key_exists('logout', $_POST)) {
  unset($_SESSION["currentUserID"]);
  header("Location: https://young-hollows-53465.herokuapp.com/Project/login.php");
}
?>

<form method="post">    
<input type="submit" class="button" name="logout" value="Logout" /><br><br>
</form>

<div class="topnav">
  <a href="https://young-hollows-53465.herokuapp.com/Project/home.php">Home</a>
</div>

<h1>
<?php

?>
</h1>



<h3>Behold your friends:</h3>

<?php
$friendids = $db->query("SELECT friend_id from public.user_friend_list where user_id = '".$_SESSION['currentUserID']."'");
$friendIdList;
while ($row = $friendids->fetch(PDO::FETCH_ASSOC)){
  $friendIdList .= $row['friend_id'] .=', ';
}
$friendIdList .= '0';
?>


<form action="/Project/viewFriend.php" method="POST" id="form1">
<?php
foreach ($db->query("SELECT * FROM public.friend WHERE id IN (".$friendIdList.")") as $row){
  
  print '<input type="radio" id="radioFriendId" name="radioFriendId" value="'.$row['id'].'">
         <label for="radioFriendId">'.$row['display_name'].'</label><br>';
}



?>
<br><input type="submit" value="View Friend">
</form>
<br><br>

<form action="/Project/addFriend.php">
    <input type="submit" value="Add new friend" />
</form>

<script src="cart.js"></script>
</body>
</html>