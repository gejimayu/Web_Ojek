<?php
	include 'db.php';
	$db = new Database();
	$username = $_GET['username'];
	$check = true;

	//check if username is not filled
	if ($username == "")
		$check = false;

	//check if username is used
	$sql = "SELECT * FROM user WHERE username='$username'";
	$results = $db -> select($sql);
	if ($results != false) //found same username
		$check = false;

	if (!$check)
		echo "reject";
	else
		echo "acc";
?>