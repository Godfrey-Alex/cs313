<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Friend</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();
$friendId = $_POST['name'];
echo $friendId;


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






<script src="cart.js"></script>
</body>
</html> 