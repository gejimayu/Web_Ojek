<?php 
	include 'db.php';
	$db = new Database();
	session_start();

	if (isset($_POST['hide'])){//kalo dipencet hide
		$history_id = $_SESSION["historyID"];
		$id = $_SESSION["userID"];
		$resultUpdate = $db -> query("UPDATE driver_history SET hide=1 WHERE id_history=$history_id");
		header("Location:driverHistory.php?user_id=". $id);
	}

?>