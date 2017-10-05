<?php
	session_start();

	

	//register user
	if (isset($_POST['register'])){

		//connect ke db
		$db = mysqli_connect('localhost', 'root', '', 'registration');
		$username = $_POST['username'];
		$email = $_POST['email'];	
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
		$query2 = "SELECT * FROM users where username='$username'";
		$result = mysqli_query($db,$query2);
		$row = mysqli_fetch_assoc($result);
		$id = $row['id'];
		$success_message = 'Selamat anda terdaftar di layanan ini<br>';
		if ($box==1){
			//masuk ke profile
			header("Location:profile.php/id=". $id);	
		}else {//masuk ke order
			header("Location:order.php/id=". $id);
		}
			
		

	}

?>