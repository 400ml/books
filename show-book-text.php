<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Chapter</title>
</head>

<body>

<?php
$connection = mysql_connect("localhost","root","5326282");
$db = mysql_select_db("book");

if(!$connection || !$db)
{
	exit(mysql_error());
}
$id = $_GET['id'];
$result = mysql_query("SELECT title FROM book WHERE id=$id");



$row = mysql_fetch_array($result);

?>

<h1> <?php echo $row['title']; ?> </h1>
<p>
Here is a text from the <?php echo $row['title']; ?>
</p>

<?php

mysql_close();
?>

<p>
<a href="show-list.php">Back to the show-author.php</a>
</p>

</body>

</html>