<?php
	include 'db.php';
	$db = new Database();
	$email = $_GET['email'];

	//retrieve email
	$sql = "SELECT * FROM user WHERE email='$email'";
	$results = $db -> select($sql);
	if ($results == false) //found same email
		echo "acc";
	else
		echo "reject";

?>