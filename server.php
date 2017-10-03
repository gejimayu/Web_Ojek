<?php
	session_start();

	//connect ke db
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	//register user
	if (isset($_POST['register'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];

		$query = "INSERT INTO users (name, username, email, password, phone) VALUES('$name','$username','$email','$password','$phone')";

		mysqli_query($db,$query);
	}

?>