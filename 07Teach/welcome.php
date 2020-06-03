<!DOCTYPE html>
<html lang = "en">   
<head>
<title>Login</title>
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

  if(isset($_SESSION['currentUserID'])){
      echo 'hello';
    $userDisplayNameResult = $db->query("SELECT display_name from public.teach_user where id = '".$_SESSION['currentUserID']."'");
    while ($row = $userDisplayNameResult->fetch(PDO::FETCH_ASSOC)){
      //echo $row['id'];
      $userDisplayName = $row['display_name'];    
    }
  }else{
    header("Location: https://young-hollows-53465.herokuapp.com/07Teach/login.php");
    exit();
  }
  

?>

<h1>Welcome to your site 
<?php
echo $userDisplayName;
?>
</h1>



<form method="post">
username: <input type="text" name="username"><br>
password: <input type="password" name="password"><br>
<input type="submit" class="button" name="loginPost" value="Login"/><br>
<input type="submit" class="button" name="SignUp" value="Sign Up"/><br>
</form>



<script src="cart.js"></script>
</body>
</html>