<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/kepala.css">
	<link rel="stylesheet" type="text/css" href="../style/selectdriver.css">
	<title>Order</title>
</head>
<body>
	<?php
		include '../db.php';
		$db = new Database();
		$userid = $_GET['user_id'];

		//fetching user data
		$results = $db -> select("SELECT * FROM user WHERE id_user = $userid");
		$name = $results[0]['name'];
	?>

	<div>
		<p id="hi_username">Hi, <b><?php echo $name	?></b> !</p>
		<h1 id="logo">
			<span id="labelgreen">PR</span>-<span id="labelred">OJEK</span>
		</h1>
		<a id="logout" href="../login.php">Logout</a>
		<p id="extralogo">wush... wush... ngeeeeenggg...</p>
	</div>

	<table id="tableactivity">
		<tr>
			<td id="current_activity"><a href="pickdestination.php?user_id=<?php echo $userid?>">ORDER</a></td>
			<td class="rest_activity"><a href="../userHistory.php?user_id=<?php echo $userid?>">HISTORY</a></td>
			<td class="rest_activity"><a href="../showprofile.php?user_id=<?php echo $userid?>">MY PROFILE</a></td>
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
		<h2 class="title_driver">PREFERRED DRIVERS:</h2>
		<div class="chosen_driver">
			<?php
				session_start();
				if (isset($_POST['picking_point']))
					$pickingpoint = $db -> escapeStr($_POST['picking_point']);
				if (isset($_POST['destination']))
					$destination = $db -> escapeStr($_POST['destination']);
				if (isset($_POST['preferred_driver']))
					$preferred = $db -> escapeStr($_POST['preferred_driver']);
				//save data to session
				$_SESSION['picking_point'] = $_POST['picking_point'];
				$_SESSION['destination'] = $_POST['destination'];
				
				if (isset($preferred)) {
					$results = $db -> select("SELECT * FROM driver join user
											WHERE id_user = id_driver AND name = " . $preferred);
					if ($results == false)
						echo "<p>Nothing to display :(</p>";
					else {
						foreach ($results as &$result) {
							echo "<table>
									<tr>
										<td><img src='../" . $result['prof_pic'] . "'></td>
										<td id='driver_identification'>
											<span id='driver_name'>" . $result['name'] . "</span><br>
											<span id='driver_rating'>☆ ". $result['avgrating'] ."</span> (". $result['num_votes'] ." votes) <br>
											<form action='completeorder.php?user_id=$userid' method='POST'>
												<button name='driverid' value='". $result['id_driver'] ."'>I CHOOSE YOU!</button>
											</form>
										</td>
									</tr>
								</table>";
						}
					}
				}
				else {
					echo "<p>Nothing to display :(</p>";
				}
			?>
		</div>
	</div>	

	<div class="driverblock">
		<h2 class="title_driver">OTHER DRIVERS:</h2>
		<div class="chosen_driver">
			<?php
				if (!isset($_POST['picking_point']) || !isset($_POST['destination'])) {
					echo "<p>Nothing to display :(</p>";
				}
				else {
					$results = $db -> select("SELECT DISTINCT name, prof_pic, avgrating, id_driver, num_votes 
											FROM driver NATURAL JOIN pref_location join user
											WHERE id_user <> $userid AND id_user = id_driver AND 
											( ". $pickingpoint . " = location OR " . $destination . " = location)");
					if ($results == false)
						echo "<p>Nothing to display :(</p>";
					else {
						foreach ($results as &$result) {
							echo "<table>
									<tr>
										<td><img src='../" . $result['prof_pic'] . "'></td>
										<td id='driver_identification'>
											<span id='driver_name'>" . $result['name'] . "</span><br>
											<span id='driver_rating'>☆ ". $result['avgrating'] ."</span> (". $result['num_votes'] ." votes) <br>
											<form id='asd' action='completeorder.php?user_id=$userid' method='POST'>
												<button name='driverid' value='". $result['id_driver'] ."'>I CHOOSE YOU!</button>
											</form>
										</td>
									</tr>
								</table>";
						}
					}
				}
			?>
		</div>
	</div>
</body>
</html>