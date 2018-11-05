<?php 
	
	
	
	$db = pg_connect("host=localhost port=5434 dbname=users user=postgres password=12345")
		or die('Could not connec: ' . pg_last_error());
		
	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$password = md5($_POST['password']);
		
		$query = "INSERT INTO USERS (username, name, lastname, password) VALUES ('$username', '$name', '$lastname', '$password')";
		$result =  pg_query($query) or die ('Query failed: ' . pg_last_error());
		
		pg_free_result();
		pg_close($db);
	}
		



?>
