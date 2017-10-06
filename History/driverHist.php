<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="driverHist.css">
	<link rel="stylesheet" type="text/css" href="history.css">
	<title>History Driver</title>
</head>
<body>

	<?php
		include '../db.php';
		$db = new Database();
		//$userid = $_GET['user_id'];
		$userid = 3;

		//fetching user data
		$results = $db -> select("SELECT * FROM user WHERE id_user = $userid");
		$name = $results[0]['name'];
	?>

	<div>
		<p id="hi_username">Hi, <b><?php echo $name ?></b> !</p>
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
		
	<table style="border-style: solid; margin-bottom: 40px;" id="tabelOrder">
		<tr>
			<td id="previousOrder">MY PREVIOUS ORDER</th>
			<td id="driverHistory">DRIVER HISTORY</th>
		</tr>
	</table>

	<div class="divTabelProfile">
		<table style="width: 100%;" id="tabelProfile">
			<tr>
				<td id="profilePict">Profile Pict here</td>
				<td id="profileDll">
					<div id="currentDate">
						Tanggal disini
					</div>
					<div id="customerName">
						Nama Customer
					</div>
					<div id="tujuan">
						Awal Tujuan - Akhir Tujuan
					</div>
					<div id="rating">
						gave <span id="colorRating"><?php echo "warna" ?></span> stars for this order
					</div>
					<div id="comment">
						and left comment: <br>
						   <span id="userComment"> You're my best friend</span> 
					</div>
				</td>
				<td><button id="hideButton" type="submit" class="buttonHIDE" name="hide">HIDE</button></td>
			</tr>
		</table>
	</div>

	<!-- my previous order sama driver history -->
		
</body>
</html>