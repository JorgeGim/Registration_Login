<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="header">
		<h2>Change password</h2>
	</div>

<form method="post" action="changepassword.php">
	    <?php include ('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		
		<div class="input-group">
			<label>New Password</label>
			<input type="password" name="newpassword">
		</div>

		<div class="input-group">
			<button type="submit" name="newpasswordButton" class="button">Change password</button>
		</div>
</form>
</body>

	



</html>
