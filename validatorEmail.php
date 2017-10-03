<?php
	session_start();
	$email = $_GET['email'];
	//connect ke db
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	if (!$db){
		die('Couldnt connect:' . mysqli_error($db));
	}

	//retrieve username
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_num_rows($result);
	if ($row > 0){
		echo 1;
	}else {
		echo 0;
	}
	
?>