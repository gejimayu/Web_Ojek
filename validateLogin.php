<?php
	session_start();

	//jika tombol GO! ditekan
	if (isset($_POST['login'])){
		include 'db.php';
		$db = new Database();

		$username = $db -> escapeStr($_POST['username']);
		$password = $db -> escapeStr($_POST['password']);
		$query = "SELECT * FROM user WHERE username=".$username." AND password=".$password;
		$rows = $db -> select ($query);
		
		//ada berarti
		if ($rows == false) {
			$error = "Anda belum mendaftar";
		}
		else {	
	    	$id = $rows[0]['id_user'];
	    	header("Location:/wbdojek/order/pickdestination.php?user_id=$id");
		}
	}
?>
