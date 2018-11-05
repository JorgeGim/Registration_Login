<?php 
	session_start();
	$db = pg_connect("host=localhost port=5434 dbname=users user=postgres password=12345")
		or die('Could not connect: ' . pg_last_error());
	
	$errors = array();
		
	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$password_1 = md5($_POST['password_1']);
		$password_2 = md5($_POST['password_2']);
		
		if(empty($username)){
			array_push($errors, "Username is required");
		}
		
		if(empty($name)){
			array_push($errors, "Name is required");
		}
		
		if(empty($lastname)){
			array_push($errors, "Lastname is required");
		}
		
		if(empty($password_1)){
			array_push($errors, "Password is required");
		}
		
		if($password_1 != $password_2){
			array_push($errors, "Passwords do not match");
		}
		
		if(count($errors) == 0){
			$query = "INSERT INTO USERS (username, name, lastname, password) VALUES ('$username', '$name', '$lastname', '$password')";
			$result =  pg_query($query) or die ('Query failed: ' . pg_last_error());
			
			pg_free_result();
			pg_close($db);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');			 
		}
	}
	
?>
