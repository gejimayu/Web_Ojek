<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/pickdestination.css">
	<link rel="stylesheet" type="text/css" href="../style/kepala.css">
	<title>Order</title>
	<script src="validateform.js"></script>
</head>
<body>
	<?php
		include '../db.php';
		session_start();
		$db = new Database();
		$userid = $_SESSION['user_id'];

		//fetching user data
		$results = $db -> select("SELECT * FROM user WHERE id_user = $userid");
		$name = $results[0]['name'];

		if (isset($_SESSION['picking_point']) && isset($_SESSION['destination']) && isset($_SESSION['driverid'])) {

			//fetching data from session and post request
			$id_driver = $_SESSION['driverid'];
			$picking_point = $db -> escapeStr($_SESSION['picking_point']);
			$destination = $db -> escapeStr($_SESSION['destination']);
			$rating = $_POST['rate'];
			$comment = $db -> escapeStr( $_POST['comment']);
			$datenow = $db -> escapeStr(date("Y-m-d"));

			//fetching drivername
			$drivername = $db -> select("SELECT * from user join driver WHERE id_user = $id_driver");
			$drivername = $drivername[0]['name'];
			
			//format
			$nameofuser = "'" . $name . "'";
			$drivername = "'" . $drivername . "'";

			//insert order data
			$db -> query("INSERT INTO order_data(id_driver, id_user, date_order, origin, destination, rating, comment)
							VALUES ($id_driver, $userid, ".$datenow.", ".$picking_point.", ".$destination.", 
							$rating, ". $comment . ")");

			//update rating driver and votes
			$result = $db -> select("SELECT * from driver WHERE id_driver = $id_driver");
			$votes = $result[0]['num_votes'] + 1;
			$avgrating = (($result[0]['avgrating'] * $result[0]['num_votes']) + $rating) / $votes;
			$db -> query("UPDATE driver SET avgrating=$avgrating, num_votes=$votes WHERE id_driver=$id_driver");

			//insert history data
			$check = $db -> query("INSERT INTO driver_history(id_driver, id_user, date_order, customer_name,
														origin, destination, rating, comment, hide)
							VALUES ($id_driver, $userid, ".$datenow.", ".$nameofuser.", ".$picking_point.", ".$destination.", 
							$rating, ".$comment.", 0)");
			$check = $db -> query("INSERT INTO user_history(id_user, id_driver, date_order, customer_name,
														origin, destination, rating, comment, hide)
							VALUES ($userid, $id_driver, ".$datenow.", ".$drivername.", ".$picking_point.", ".$destination.", 
							$rating, ".$comment.", 0)");

			if ($check == false)
				echo $db -> error();
		}
	?>

	<div>
		<p id="hi_username">Hi, <b><?php echo $name ?></b> !</p>
		<h1 id="logo">
			<span id="labelgreen">PR</span>-<span id="labelred">OJEK</span>
		</h1>
		<a id="logout" href="../login.php">Logout</a>
		<p id="extralogo">wush... wush... ngeeeeenggg...</p>
	</div>

	<table id="tableactivity">
		<tr>
			<td id="current_activity"><a href="pickdestination.php">ORDER</a></td>
			<td class="rest_activity"><a href="../userHistory.php">HISTORY</a></td>
			<td class="rest_activity"><a href="../showprofile.php">MY PROFILE</a></td>
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

	<form action="selectdriver.php" method="POST" onsubmit="return validateForm()">
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