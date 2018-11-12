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

			$finalQuery = "Select u.username as username1, us.username as username2 from users u left join users us on u.id_u != us.id_u where u.id_u < us.id_u
					EXCEPT
					select distinct u1.username, u2.username from users u1, users u2
						where exists(select id_pelicula from pelis_que_vio where id_usuario = u1.id_u
								EXCEPT
							select id_pelicula from pelis_que_vio where id_usuario = u2.id_u)
		
						or exists(select id_pelicula from pelis_que_vio, users as u1 where id_usuario = u2.id_u
								EXCEPT
							select id_pelicula from pelis_que_vio where id_usuario = u1.id_u) 	";
			
			$result2 = pg_query($finalQuery);
			echo "<table border='1'>\n";
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
