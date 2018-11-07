<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<meta charset="utf-8">
</head>
<body>
	
	<div class="header">
		<h2>Home page</h2>
	</div>
	
	<div class="content">
		<?php if(isset($_SESSION['sucess'])){ ?>
			<div class="error success"> 
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php } ?>
		
		<?php if(isset($_SESSION["username"])){ ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
		
		<?php } ?>
		<p>
			<a href="changepassword.php">Change password</a>
		</p>
	</div>
</body>
</html>
