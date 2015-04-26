<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
</head>
<body>
	<h1><?= $title ?></h1>
	<p>Author: <?= $author ?></p>
	<h2>Reviews: </h2>
<?php
	if($reviews) {
		foreach($reviews as $review) {
			//echo the review info
		}
	}
?>
</body>
</html>