<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Book and Review</title>
	<link rel="stylesheet" href="/assets/stylesheets/style.css">
</head>
<body>
	<ul id="add-head">
		<li><a href="/welcomes/books">Home</a></li>
		<li><a href="/welcomes/destroy">Logout</a></li>
	</ul>
<?= $authors ?>
	<h3>Add a New Book Title and a Review:</h3>
	<form action="/welcomes/add_review">
		<p>
			<label for="title">Book Title: </label>
			<input type="text" name="title">
		</p>
		<p>
			<label for="author">Author: </label>
			<ul>
				<li>Choose from the list: <select name="author">
<?php
	foreach($author as $auth) {
		echo "<option value='".$auth."'>".$auth."</option>";
	}
?>
				</select></li>
			</ul>
		</p>
	</form>
</body>
</html>