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
	    	$_SESSION['user_id'] = $id;
	    	session_regenerate_id();
	    	$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT'] . 's3cr3t_k3y');
	    	header("Location:/wbdojek/order/pickdestination.php");
		}
	}
?>
