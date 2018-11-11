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
		
		<?php if(isset($_SESSION["queryTest"])) { ?>
	
			<?php $db = pg_connect("host=localhost port=5434 dbname=users user=postgres password=12345")
			or die('Could not connect: ' . pg_last_error());
			
			//esto va a servir para la query final
			$username = $_SESSION['username'];
			
			$queryTest = "SELECT name FROM users WHERE username = '$username'";
			$result2 = pg_query($queryTest);
			echo "<table>\n";
			while ($line = pg_fetch_array($result2, null, PGSQL_ASSOC)) {
			echo "\t<tr>\n";
			foreach ($line as $col_value) {
			echo "\t\t<td>$col_value</td>\n";
			}
			echo "\t</tr>\n";
			}
			echo "</table>\n";
			
			?>
			
		<?php } ?>
		<p>
			<a href="changepassword.php">Change password</a>
		</p>
	</div>
</body>
</html>
