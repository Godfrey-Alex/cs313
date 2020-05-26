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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $book= $_POST['book'];
  $chapter= $_POST['chapter'];
  $verse= $_POST['verse'];
  $content= $_POST['content'];
  $faith = $_POST['Faith'];
  $sacrifice = $_POST['Sacrifice'];
  $charity = $_POST['Charity'];
  $topic = '';
  if (!empty($faith)) {
    $topic =1;
  } 
  if (!empty($sacrifice)) {
    $topic = 2;
  }
  if (!empty($charity)) {
    $topic = 3;
  }

  try
  {
    // Add the Scripture
  
    // We do this by preparing the query with placeholder values
    $query = 'INSERT INTO scriptures(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';
    $statement = $db->prepare($query);
  
    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
    $statement->bindValue(':book', $book);
    $statement->bindValue(':chapter', $chapter);
    $statement->bindValue(':verse', $verse);
    $statement->bindValue(':content', $content);
  
    $statement->execute();
  
    // get the new id
    //$scriptureId = $db->lastInsertId();
    $scriptureId=0;
    echo $scriptureId;
    //echo ''.$scriptureId;
    foreach ($db->query('SELECT MAX(id) FROM public.scriptures') as $row)
{
  $scriptureId = $row['id'];
  echo $scriptureId;
}
  
    // Now go through each topic id in the list from the user's checkboxes
    
      echo "ScriptureId: $scriptureId, topicId: $topic";
  
      // Again, first prepare the statement
      $statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES(:scriptureId, :topicId)');
  
      // Then, bind the values
      $statement->bindValue(':scriptureId', $scriptureId);
      $statement->bindValue(':topicId', $topic);
  
      $statement->execute();
    
  }
  catch (Exception $ex)
  {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
  }

}

?>

<h1>Behold my Scriptures:</h1>

<?php

foreach ($db->query('SELECT * FROM public.scriptures') as $row)
{
  echo '' . $row['book'];
  echo ' ' . $row['chapter'];
  echo ':' . $row['verse'];
  echo ' - "' . $row['content'];
  echo '"';
  echo '<br/>';
}


?>



<script src="cart.js"></script>
</body>
</html>