<?php
	session_start();
	$username = $_GET['username'];
	//connect ke db
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	if (!$db){
		die('Couldnt connect:' . mysqli_error($db));
	}

	//retrieve username
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_num_rows($result);
	if ($row > 0){
		echo 1;
	}else {
		echo 0;
	}
	
?>