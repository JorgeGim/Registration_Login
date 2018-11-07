<?php 
	mb_internal_encoding("UTF-8");
	//echo mb_internal_encoding();
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
			$query = "INSERT INTO USERS (username, name, lastname, password) VALUES ('$username', '$name', '$lastname', '$password_2')";
			$result =  pg_query($query) or die ('Query failed: ' . pg_last_error());
					
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('Location: index.php');
			pg_close($db);			 
		}
	}
	
	//log user from login page
	if(isset($_POST['login_'])){
		$username = $_POST['username'];	
		$password = $_POST['password'];
		
		if(empty($username)){
			array_push($errors, "Username is required");
		}
		
		if(empty($password)){
			array_push($errors, "Password is required");
		}
		
		$password = md5($_POST['password']);
		//array_push($errors, $password);
		
		if(count($errors) == 0){
			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$query2 = "SELECT password FROM users WHERE username = '$username'";
			$result = pg_query($query);
			array_push($errors, $query);
			
			if(pg_num_rows($result) == 1){
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('Location: index.php');
			}else{
				array_push($errors, "Wrong username/password combination ");
				}
			}   
	}
	
	//logout
	if(isset($_GET['logout'])){
			session_destroy();
			unset($_SESSION['username']);
			header('Location: login.php');
	}
	
	//change password
	if(isset($_POST['newpasswordButton'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$newPassword = md5($_POST['newpassword']);
		
		if(empty($username)){
			array_push($errors, "Username is required");
		}
		
		if(empty($password)){
			array_push($errors, "Password is required");
		}
		
		$password = md5($_POST['password']);
		
		if($password == $newPassword){
			array_push($errors, "It is the same password");
		}
			
		if(count($errors) == 0){
			array_push($errors, $password);
			$query = "UPDATE users SET password = '$newPassword' WHERE username = '$username' and password = '$password'";
			$result = pg_query($query);
			header('Location: login.php');
		}
	}
?>
