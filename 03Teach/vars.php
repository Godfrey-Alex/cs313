<?php
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['emailAddress']);
$major = htmlspecialchars($_POST['major']);
$comments = htmlspecialchars($_POST['comments']);
$continents = ($_POST['Continents']);
?>

<!DOCTYPE html>
<html>
<head>
</head>

<body>
<h1> Welcome user: <?php echo $username; ?></h1>
<h1> mailto: <a href="mailto:<?=$email ?>"><?=$email ?></a></h1>
<h1> Major: <?php echo $major; ?></h1>
<h1> Continents Visited:</h1>
<ul>
<?
foreach ($continents as $continents){
    $_continents=htmlspecialchars($continents);
    echo "<li><p>$_continents</p></li>";
}
?>
</ul>
<h1> Comments: <?php echo $comments; ?></h1>

</body>

</html>
