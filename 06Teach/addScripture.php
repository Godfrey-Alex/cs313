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

<h1>Add a Scripture</h1>



<form action="/06Teach/scripture.php" method="post">
Book: <input type="text" name="book"><br>
Chapter: <input type="number" name="chapter"><br>
Verse: <input type="number" name="verse"><br>
Content:<br><textarea name="content" rows="10" cols="30"></textarea><br>
Topic:<br>
<?php
foreach ($db->query('SELECT name FROM public.topic') as $row)
{
  print '<input type="checkbox" id='.$row['name'].' name='.$row['name'].' value='.$row['name'].'>';
  print '<label for="vehicle1">'.$row['name'].'</label><br>';
}
?>

<input type="submit">
</form>





<script src="cart.js"></script>
</body>
</html>