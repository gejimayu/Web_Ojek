<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="driverHistory.css">
	<link rel="stylesheet" type="text/css" href="history.css">
	<title>History Driver</title>
</head>
<body>

	<?php
		include 'db.php';
		include 'authenticate.php';
		$db = new Database();
		$userid = $_SESSION['user_id'];

		//jika terdapat post request dari hide button
		if (isset($_POST['hide'])){
			$history_id = $_POST['hide'];
			$resultUpdate = $db -> query("UPDATE driver_history SET hide=1 WHERE id_history=$history_id");
		}

		//fetching user data
		$results = $db -> select("SELECT * FROM user WHERE id_user = $userid");
		$name = $results[0]['name'];//nama driver
		echo
		'<div>
		<p id="hi_username">Hi, <b> '. $name . '</b> !</p>
		<h1 id="logo">
			<span id="labelgreen">PR</span>-<span id="labelred">OJEK</span>
		</h1>
		<a id="logout" href="logout.php">Logout</a>
		<p id="extralogo">wush... wush... ngeeeeenggg...</p>
		</div>
		<table id="tableactivity">
			<tr>
				<td class="rest_activity"><a href="order/pickdestination.php">ORDER</a></td>
				<td id="current_activity"><a href="userHistory.php">HISTORY</a></td>
				<td class="rest_activity"><a href="showprofile.php">MY PROFILE</a></td>
			</tr>
		</table>

		<p id="transactionHistory" >TRANSACTION HISTORY</p>
			
		<table id="tabelOrder">
			<tr>
				<td id="previousOrder"><a href="userHistory.php">MY PREVIOUS ORDER</a></th>
				<td id="driverHistory"><a href=""driverHistory.php">DRIVER HISTORY</a></th>
			</tr>
		</table>';

		if ($results[0]['driver_status'] == 'true') {
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

				if (!$hide){
					echo 
					'<form method="post" action="driverHistory.php">
						<div class="divTabelProfile" >
							<table class="tabelProfile">
								<tr>
									<td class="profilePict" >
										<div class="containerPict">
											<img class="pictProfile" src= '. $profPictCustomer .  '>
										</div>
									</td>
									<td class="profileDll">
										<div class="currentDate">
											'.$tanggal.'
										</div>
										<div class="customerName">
											'. $customerName.'
										</div>
										<div class="tujuan">
											'. $awal.' -> '. $akhir. '
										</div>
										<div class="rating">
											gave <span class="colorRating">'.$rating .'</span> stars for this order
										</div>
										<div class="comment">
											and left comment: <br>
											   <span class="userComment"> '.$comment .'</span> 
										</div>
									</td>
									<td class="profileButton"><button class="hideButton" type="submit" name="hide" value="'.$historyID.'">HIDE</td>
								</tr>
							</table>
						</div>
					</form>';
				}
			}
		}
	?>
</body>
</html>