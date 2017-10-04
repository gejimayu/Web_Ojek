<?php
	session_start();

	//jika tombol GO! ditekan
	if (isset($_POST['login'])){
		//connect ke db
		$db = mysqli_connect('localhost', 'root', '', 'registration');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db,$query);
		
		//ada berarti
		if(mysqli_num_rows($result))
		{	
	    	$row = mysqli_fetch_assoc($result);
	    	$id = $row['id'];
	    	$ide = intval($id);
	    	header("Location:tes.html?id=". $id);
		}else {//belom daftar
			$error = "Anda belum mendaftar";
		}
	}



?>
