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

$_SESSION['viewFriendId']=$_POST['radioFriendId'];

$friendButton = $_POST[''];


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

<h1>Hello Friend</h1>
<h2>
<?php
foreach ($db->query("SELECT display_name FROM public.friend WHERE id = '".$_SESSION["viewFriendId"]."'") as $row){
  //print '<p>'.'<a href="/Project/viewFriend.php">'.$row['display_name'].'</a>'.'</p>';
  echo '' . $row['display_name'];
  echo '<br/>';
}
?>
</h2>
<h3>Memories</h3>

<?php
$memoryIds = $db->query("SELECT memory_id from public.memory_list where user_id = '".$_SESSION["currentUserID"]."' and friend_id = '".$_SESSION["viewFriendId"]."'");
$memoryIdList='';
while ($row = $memoryIds->fetch(PDO::FETCH_ASSOC)){
  $memoryIdList .= $row['memory_id'] .=', ';
}
$memoryIdList .= '0';


foreach ($db->query("SELECT * FROM public.memory WHERE id IN (".$memoryIdList.")") as $row){
  print ''.$row['memory_name'].'<br>'.$row['memory_date'].'<br>'.$row['memory_text'].'<br><br>';
}

?>
<form method="post">
<button type="submit" formaction="/Project/addMemory.php">Add New Memory</button>
</form>
<script src="cart.js"></script>
</body>
</html> 