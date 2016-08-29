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
$result = mysql_query("SELECT a.author_name AS author_name, l.author_id AS author_id
                         FROM author AS a, link AS l 
						WHERE book_id = (SELECT book_id 
						                     FROM link 
											WHERE id = $id)
						AND l.author_id = a.id
					  ");





?>
<p>
This author has written such books:
</p>
<?php
 while ($row = mysql_fetch_array($result))
 { ?>
<p>
<a href="show-author-biography.php?id=<?php echo $row['author_id']; ?>"><?php echo $row['author_name']; ?></a>

</p>


<?php }

mysql_close();
?>

<p>
<a href="show-list.php">Back to the show-list.php</a>
</p>

</body>

</html>