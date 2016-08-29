<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>List</title>
</head>

<body>


<?php
$connection = mysql_connect("localhost","root","5326282");
$db = mysql_select_db("book");

if(!$connection || !$db)
{
	exit(mysql_error());
}

$result = mysql_query("SELECT a.author_name AS author, b.title AS book, l.id AS id, l.book_id AS book_id
                         FROM author AS a
						 JOIN link AS l ON l.author_id = a.id
						 JOIN book AS b ON l.book_id = b.id
						 ORDER BY author");
?>
<table>
<th><td>Author</td> <td>Book</td></th>

</table>
<?php
 while ($row = mysql_fetch_array($result))
 { ?>

<table>
<tr>
<td><a href="show-author.php?id=<?php echo $row['id']; ?>"><?php echo $row['author']; ?></a> </td> 
<td><a href="show-book.php?id=<?php echo $row['id']; ?>"><?php echo $row['book']; ?></a></td>
</tr>
</table>
	 
 <?php }

mysql_close();
?>

<p>
<a href="index.php">Back to the index.php</a>
</p>
</body>

</html>