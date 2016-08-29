<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Author</title>
</head>

<body>

<p>
<?php
$connection = mysql_connect("localhost","root","5326282");
$db = mysql_select_db("book");

if(!$connection || !$db)
{
	exit(mysql_error());
}
$id = $_GET['id'];
$result = mysql_query("SELECT author_name FROM author WHERE id = $id");
$row = mysql_fetch_array($result)
?>

<h1> <?php echo $row['author_name']; ?> </h1>
<p>
Here is a biography of the <?php echo $row['author_name']; ?>
</p>
	 
 <?php 

mysql_close();
?>
</p>

<p>
<a href="show-list.php">Back to the show-list.php</a>
</p>


</body>

</html>