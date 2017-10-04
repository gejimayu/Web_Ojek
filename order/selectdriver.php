<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/pickdestination.css">
	<title>Order</title>
</head>
<body>
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
		<tr>
			<td><div class="circle">1</div></td>
			<td class="titleorder">Select<br>Destination</td>
		</tr>
	</table>

	<table class="tableorder">
		<tr id="current_order">
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

	<div class="driverblock">
		<h2>PREFERRED DRIVERS:</h2>
		<!-- <?php
			include '../db.php';
			$db = new Database();
			$pickingpoint = $db -> escapeStr($_GET['picking_point']);
			$destination = $db -> escapeStr($_GET['destination']);

			$results = $db -> select("SELECT * FROM driver NATURAL JOIN pref_location join user
										WHERE id_user = id_driver AND 
												( ". $pickingpoint . " = location OR " . $destination . " = location)");
			if ($results == false)
				echo "no result";
			else {
				foreach ($results as &$result)
					echo $result['name'] . "<br>";
			}
		?> -->
		<div>
			<table>
				<tr>
					<td><img src="../img/pika1.png"></td>
					<td>
						Pikachu!!!<br>
						☆ 4.5 (28 votes) <br>
						<button>I CHOOSE YOU!</button>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="driverblock">
		<h2>OTHER DRIVERS:</h2>
	</div>
</body>
</html>