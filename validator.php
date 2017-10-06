<?php
	include 'db.php';
	$db = new Database();
	$username = $_GET['username'];

	//retrieve username
	$sql = "SELECT * FROM user WHERE username='$username'";
	$results = $db -> select($sql);
	if ($results == false)
		echo 0;
	else
		echo 1;
?>