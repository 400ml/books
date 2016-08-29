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
				$result = mysql_query("SELECT b.title AS book_title, l.book_id AS book_id
										 FROM book AS b, link AS l 
										WHERE author_id = (SELECT author_id 
															 FROM link 
															WHERE id = $id)
										AND l.book_id = b.id
									  ");
			?>
			<p>
			This author has written such books:
			</p>
			<?php
				while ($row = mysql_fetch_array($result))
				{ ?>
				<p>
					<a href="show-book-text.php?id=<?php echo $row['book_id']; ?>"><?php echo $row['book_title']; ?></a>
				</p>				 
				<?php }
			mysql_close();
			?>
		</p>

		<p>
		<a href="show-list.php">Back to the show-list.php</a>
		</p>

	</body>

</html>