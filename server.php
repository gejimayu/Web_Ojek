<?php
	session_start();

	

	//register user
	if (isset($_POST['register'])){

		if($_POST['password'] != $_POST['password_confirm']){ 
		$error_message = 'Password harus = Confirm Password<br>'; 
		}
		//connect ke db
		$db = mysqli_connect('localhost', 'root', '', 'registration');
		$username = $_POST['username'];
		$email = $_POST['email'];
		$q = "SELECT * FROM users WHERE username='$username' OR email='$email'";
		$r = mysqli_query($db, $q);
		
		if (mysqli_num_rows($r)){//berarti udah kepake, username or email
			$error_message_udah = 'Email atau Password udah terpakai';
		}

		if((!isset($error_message)) && (!isset($error_message_udah))) {	
			$name = $_POST['name'];
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