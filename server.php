<?php
	//register user
	if (isset($_POST['register'])){

		include 'db.php';
		$db = new Database();

		$username = $_POST['username'];
		$email = $_POST['email'];	
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		if (isset($_POST['box'])){
			$box = "true";
		}else {
			$box = "false";
		}
		$profpicdefault = "img/naruto1.png";
		//inserting data regis to db
		$query = "INSERT INTO user (name, username, prof_pic, email, password, phone_number, driver_status) 
					VALUES('$name', '$username', '$profpicdefault', '$email', '$password', '$phone', '$box')";
		$db -> query($query);
		//fetching user id
		$query = "SELECT * FROM user where username='$username'";
		$rows = $db -> select($query);
		$id = $rows[0]['id_user'];
		$success_message = 'Selamat anda terdaftar di layanan ini<br>';
		if ($box=="true"){
			//masuk ke profile
			header("Location:profile.php/user_id=$id");	
		}else {
			//masuk ke order
			header("Location:pickdestination.php/user_id=$id");
		}
			
		

	}

?>