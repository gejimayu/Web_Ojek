<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="driverHistory.css">
	<link rel="stylesheet" type="text/css" href="history.css">
	<title>History Driver</title>
	<script>
		driver_history
		date_order
	</script>
</head>
<body>

	<?php
		session_start();
		include '../db.php';
		include 'updateHistory.php';
		$db = new Database();
		$userid = 2;
		$_SESSION["userID"] = $userid;
		//fetching user data
		$results = $db -> select("SELECT * FROM user WHERE id_user = $userid");
		$name = $results[0]['name'];//nama driver
		echo
		'<div>
		<p id="hi_username">Hi, <b> '. $name . '</b> !</p>
		<h1 id="logo">
			<span id="labelgreen">PR</span>-<span id="labelred">OJEK</span>
		</h1>
		<a id="logout" href="#">Logout</a>
		<p id="extralogo">wush... wush... ngeeeeenggg...</p>
		</div>
		<table id="tableactivity">
		<tr>
			<td class="rest_activity">ORDER</td>
			<td id="current_activity">HISTORY</td>
			<td class="rest_activity">MY PROFILE</td>
		</tr>
		</table>

		<p id="transactionHistory" >TRANSACTION HISTORY</p>
			
		<table id="tabelOrder">
			<tr>
				<td id="previousOrder">MY PREVIOUS ORDER</th>
				<td id="driverHistory">DRIVER HISTORY</th>
			</tr>
		</table>';
		
		//$userid = $_GET['user_id'];
		$tanggal = "";
		$customerID = "";
		$customerName ="";
		$awal = "";
		$akhir ="";
		$rating = "";
		$comment = "";
		$profPictCustomer = "";
		$resultDriver = $db -> select("SELECT * FROM driver_history WHERE id_driver = '$userid'");
			foreach ($resultDriver as &$result) {
			$historyID = $result['id_history'];
			$customerID = $result['id_user'];
			$tanggal = $result['date_order'];
			$customerName = $result['customer_name'];
			$awal = $result['origin'];
			$akhir = $result['destination'];
			$rating = $result['rating'];
			$comment = $result['comment'];
			$hide = $result['hide'];
			$searchPP = $db -> select("SELECT prof_pic FROM user WHERE id_user = '$customerID'");
			$profPictCustomer = $searchPP[0]['prof_pic'];
			$_SESSION["historyID"] = $historyID;
			if (!$hide){

			echo 
			'<form method="post" action="driverHistory.php">
				<div id="divTabelProfile" >
					<table id="tabelProfile">
						<tr>
							<td id="profilePict" >
								<div class="containerPict">
									<img id="pictProfile" src= '. $profPictCustomer .  '>
								</div>
							</td>
							<td id="profileDll">
								<div id="currentDate">
									'.$tanggal.'
								</div>
								<div id="customerName">
									'. $customerName.'
								</div>
								<div id="tujuan">
									'. $awal.' -> '. $akhir. '
								</div>
								<div id="rating">
									gave <span id="colorRating">'.$rating .'</span> stars for this order
								</div>
								<div id="comment">
									and left comment: <br>
									   <span id="userComment"> '.$comment .'</span> 
								</div>
							</td>
							<td><button id="hideButton" type="submit" class="buttonHIDE" name="hide">HIDE</td>
						</tr>
					</table>
				</div>
			</form>';
			}
		}
	?>
</body>
</html>