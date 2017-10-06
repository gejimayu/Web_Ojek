<?php
	include 'db.php';
	$db = new Database();
	$email = $_GET['email'];

	//retrieve username
	$sql = "SELECT * FROM user WHERE email='$email'";
	$results = $db -> select($sql);
	if ($results == false)
		echo 0;
	else
		echo 1;
	
?>