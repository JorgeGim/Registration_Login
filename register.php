<?php include ('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<meta charset="UTF-8">
</head>
<body>
	<div class="header">
		<h2>Registration</h2>
	</div>

<form method="post" action="register.php" accept-charset="utf-8">
		<?php include ('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name">
		</div>

		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="lastname">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>

		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>

		<div class="input-group">
			<button type="submit" name="register" class="button">Register</button>
		</div>
		<p>
			Are you a member? <a href="login.php">Log in</a>
		</p>
</form>
</body>
</html>
