<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Books Home</title>
	<link rel="stylesheet" href="/assets/stylesheets/style.css">
</head>
<body>
	<div id='book-head'>
		<p>Welcome, <?= $name ?>!</p>
		<a href="/welcomes/add">Add Book and Review</a>
		<a href="/welcomes/destroy" id="logout">Logout</a>
	</div>
</body>
</html>