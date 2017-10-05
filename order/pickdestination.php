<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/pickdestination.css">
	<link rel="stylesheet" type="text/css" href="../style/header.css">
	<title>Order</title>
	<script src="validateform.js"></script>
</head>
<body>
	<?php
		session_start();
		if (isset($_SESSION['picking_point']) && isset($_SESSION['destination']) && isset($_SESSION['driverid'])) {
			
		}
		session_destroy(); 

	?>

	<div>
		<p id="hi_username">Hi, <b>pikachu</b> !</p>
		<h1 id="logo">
			<span id="labelgreen">PR</span>-<span id="labelred">OJEK</span>
		</h1>
		<a id="logout" href="#">Logout</a>
		<p id="extralogo">wush... wush... ngeeeeenggg...</p>
	</div>

	<table id="tableactivity">
		<tr>
			<td id="current_activity">ORDER</td>
			<td class="rest_activity">HISTORY</td>
			<td class="rest_activity">MY PROFILE</td>
		</tr>
	</table>

	<p id="makeanorder">MAKE AN ORDER</p>
		
	<table class="tableorder">
		<tr id="current_order">
			<td><div class="circle">1</div></td>
			<td class="titleorder">Select<br>Destination</td>
		</tr>
	</table>

	<table class="tableorder">
		<tr>
			<td><div class="circle">2</div></td>
			<td class="titleorder">Select a<br>Driver</td>
		</tr>
	</table>

	<table class="tableorder">
		<tr>
			<td><div class="circle">3</div></td>
			<td class="titleorder">Complete<br>your Order</td>
		</tr>
	</table>

	<form action="selectdriver.php" method="GET" onsubmit="return validateForm()">
		<table id="table_form">
			<tr>
				<td class="inputlabel">Picking Point</td>
				<td><input id="picking_point" type="text" name="picking_point"</td>
				<td id="pick_req" class="required"></td>
			</tr>
			<tr>
				<td class="inputlabel">Destination</td>
				<td><input id="destination" type="text" name="destination"></td>
				<td id="dest_req" class="required"></td>
			</tr>
			<tr>
				<td class="inputlabel">Preferred Driver</td>
				<td><input type="text" name="preferred_driver" placeholder="Optional"></td>
			</tr>
		</table>
		<button id="next">NEXT</button>
	</form>

</body>
</html>