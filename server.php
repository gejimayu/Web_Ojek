<?php
	session_start();

	

	//register user
	if (isset($_POST['register'])){

		if($_POST['password'] != $_POST['password_confirm']){ 
		$error_message = 'Password harus = Confirm Password<br>'; 
		}	
		if(!isset($error_message)) {
			//connect ke db
			$db = mysqli_connect('localhost', 'root', '', 'registration');
			$name = $_POST['name'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			if (isset($_POST['box'])){
				$box = 1;
			}else {
				$box = 0;
			}

			$query = "INSERT INTO users (name, username, email, password, phone, isDriver) VALUES('$name','$username','$email','$password','$phone','$box')";

			mysqli_query($db,$query);
			$success_message = 'Selamat anda terdaftar di layanan ini<br>';
		}

	}

?>