<?php 
	include '../db.php';
	session_start();

	if (isset($_POST['hide'])){//kalo dipencet hide
		$db2 = new Database();
		$history_id = $_SESSION["historyID"];
		$id = $_SESSION["userID"];
		$resultUpdate = $db -> query("UPDATE driver_history SET hide='true' WHERE id_history='$history_id'");
		header("Location:driverHistory.php?id=". $id);
	}

?>