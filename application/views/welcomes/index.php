<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" href="/assets/stylesheets/style.css">
</head>
<body>
	<h1>Welcome!</h1>
	<div id='register'>
<?php 
	if($this->session->flashdata('errors')) {
		foreach($this->session->flashdata('errors') as $errors) {
			echo '<span class="error">'.$errors.'</span>';
		}
	} 
?>
		<h3>Register</h3>
		<form action="/welcomes/validate" method="post">
			<p><label for="name">Name: </label>
			<input type="text" name="name"></p>
			<p><label for="alias">Alias: </label>
			<input type="text" name="alias"></p>
			<p><label for="email">Email: </label>
			<input type="text" name="email"></p>
			<p><label for="password">Password: </label>
			<input type="password" name="password"></p>
			<p>*Password should be at least 8 characters</p>
			<p><label for="confirm_pass">Confirm PW: </label>
			<input type="password" name="confirm_pass"></p>
			<input type="hidden" name="reg" value="yes">
			<input type="submit" value="Register">
		</form>
	</div>
	<div id='login'>
<?php
	if($this->session->flashdata('log_errors')) {
		foreach($this->session->flashdata('log_errors') as $log_errors) {
			echo '<span class="error">'.$log_errors.'</span>';
		} 
	}
?>
		<h3>Login</h3>
		<form action="/welcomes/validate" method="post">
			<p><label for="email">Email: </label>
			<input type="text" name="email"></p>
			<p><label for="password">Password: </label>
			<input type="password" name="password"></p>
			<input type="hidden" name="log" value="yes">
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>
