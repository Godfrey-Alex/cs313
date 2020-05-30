<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Scriptures</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();
$_SESSION["username"];
$_SESSION["password"];
$_SESSION["authenticated"] = false;
$_SESSION["currentUserId"] = '';
$_SESSION["viewFriendId"]=1;


/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        //echo "No username was entered";
    } else {
        //echo $username;
    }
    if (empty($password)) {
        //echo "No password was entered";
    } else {
        //echo $password;
    }
}
*/
if(isset($_POST["loginPost"])){
  $_SESSION["username"] = $_POST['username'];
  $_SESSION["password"] = $_POST['password'];
  if (empty($username)) {
      //echo "No username was entered";
  } else {
      //echo $username;
  }
  if (empty($password)) {
      //echo "No password was entered";
  } else {
      //echo $password;
  }
}

if(isset($_POST["addNewFriend"])){
  echo "you just added a friend";
}

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

<h1>
<?php
foreach ($db->query("SELECT * FROM public.user WHERE username ='".$_SESSION["username"]."' and password = '".$_SESSION["password"]."'") as $row){
  echo 'Welcome ' . $row['display_name'];
  $_SESSION["currentUserId"] = $row['id'];
  //echo '' . $_SESSION["currentUserId"];  
  echo '<br/>';
}
?>
</h1>

<h3>Behold your friends:</h3>

<?php
$friendids = $db->query("SELECT friend_id from public.user_friend_list where user_id = '".$_SESSION["currentUserId"]."'");
$friendIdList;
while ($row = $friendids->fetch(PDO::FETCH_ASSOC)){
  $friendIdList .= $row['friend_id'] .=', ';
}
$friendIdList .= '0';
?>


<form action="/Project/viewFriend.php" method="POST" id="form1">
<?php
//echo ''.$friendIdList;


//$friendRows = $db->query("SELECT display_name FROM public.friend WHERE id IN (".$friendIdList.")");


foreach ($db->query("SELECT * FROM public.friend WHERE id IN (".$friendIdList.")") as $row){
  //print '<p>'.'<a href="/Project/viewFriend.php">'.$row['display_name'].'</a>'.'</p>';
  //print '<input type="submit" name="'.$row['id'].'" value="'.$row['display_name'].'"/>';
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