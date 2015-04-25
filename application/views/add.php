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
	<h3>Add a New Book Title and a Review:</h3>
	<form action="/welcomes/add_review" method="post">
		<p>
			<label for="title">Book Title: </label>
			<input type="text" name="title">
		</p>
		<p>
			<label for="author">Author: </label>
			<ul id='add-author'>
				<li>Choose from the list: <select name="author">
<?php
	foreach($author as $auth) {
		foreach($auth as $a) {
			echo "<option value='".$a."'>".$a."</option>";
		}
	}
?>
				</select></li>
				<li>Or add a new author: <input type="text" name="add_author"></li>
			</ul>
		</p>
		<p>
			<label for="review">Review: </label>
			<textarea name="review"></textarea>
		</p>
		<p>
			<label for="stars">Rating: </label>
			<select name="stars">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</p>
		<input type="submit" value="Add Book and Review">
	</form>
</body>
</html>