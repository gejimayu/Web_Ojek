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
			$driver = "true";
		}else {
			$driver = "false";
		}
		$profpicdefault = "img/blank_ava.png";
		//inserting data regis to db
		$query = "INSERT INTO user (name, username, prof_pic, email, password, phone_number, driver_status) 
					VALUES('$name', '$username', '$profpicdefault', '$email', '$password', '$phone', '$driver')";
		$db -> query($query);

		//fetching user id
		$query = "SELECT * FROM user where username='$username'";
		$rows = $db -> select($query);
		$id = $rows[0]['id_user'];
		
		session_start();
		session_regenerate_id();
	  $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT'] . 's3cr3t_k3y');
    // Ending a session in 30 minutes from the starting time.
  	$_SESSION['expire'] = time() + (30 * 60);
		$_SESSION['user_id'] = $id;

		if ($driver === "true") {
			//inserting data to driver table
			$query = "INSERT INTO driver VALUES($id, 0, 0)";
			$db -> query($query);
		}

		$success_message = 'Selamat anda terdaftar di layanan ini<br>';
		if ($driver=="true"){
			//masuk ke profile
			header("Location:showprofile.php");	
		}
		else {
			//masuk ke order
			header("Location:order/pickdestination.php");
		}
	}
?>