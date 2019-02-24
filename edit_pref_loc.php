<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/kepala.css">
	<link rel="stylesheet" type="text/css" href="style/edit_pref_loc.css">
	<script src="confirmationdelete.js"></script>
	<title>Order</title>
</head>
<body>
	<?php
		include 'db.php';
		session_start();
		$db = new Database();

		$userid = $_SESSION['user_id'];

		//if there is a post request, insert to db
		if (isset($_POST['loc'])) {
			$loc = $db -> escapeStr($_POST['loc']);
			$check = $db -> query("INSERT INTO pref_location(id_driver, location) VALUES ($userid, ". $loc .")");
		}
		if (isset($_POST['delete'])) {
			$tobedeleted = $db -> escapeStr($_POST['delete']);
			$check = $db -> query("DELETE FROM pref_location WHERE id_driver = $userid AND location = ". $tobedeleted);
		}

		//fetching user data
		$results = $db -> select("SELECT * FROM user WHERE id_user = $userid");
		$name = $results[0]['name'];
		$results = $db -> select("SELECT * FROM pref_location WHERE id_driver = $userid");
	?>
	<div>
		<p id="hi_username">Hi, <b><?php echo $name?></b> !</p>
		<h1 id="logo">
			<span id="labelgreen">PR</span>-<span id="labelred">OJEK</span>
		</h1>
		<a id="logout" href="logout.php">Logout</a>
		<p id="extralogo">wush... wush... ngeeeeenggg...</p>
	</div>

	<table id="tableactivity">
			<tr>
				<td class="rest_activity"><a href="order/pickdestination.php">ORDER</a></td>
				<td class="rest_activity"><a href="userHistory.php">HISTORY</a></td>
				<td id="current_activity"><a href="showprofile.php">MY PROFILE</a></td>
			</tr>
		</table>

	<p id="editprefloc">EDIT PREFERRED LOCATIONS</p>

	<table id="tableprefloc">
		<tr id="titlecolumn">
			<td>No</td>
			<td>Location</td>
			<td>Actions</td>
		</tr>
		<?php
			if ($results != false) {
				$cnt = 0;
				foreach ($results as &$result) {
					$cnt = $cnt + 1;
					$location = $result['location'];
					echo "
						<tr>
							<td>$cnt</td>
							<td id='city'>$location</td>
							<td id='editbutton'>
								<img id='pencil' src='vstock/pencil.png'>
								<form id='xmarkform' action='edit_pref_loc.php' method='POST' 
										onsubmit='return onConfirm()'>
									<input id='xmark' type='image' name='delete' value='". $location ."' src='vstock/forbidden-mark.png'/>
								</form>
							</td>
						</tr>
					";
				}
			}
		?>
	</table>

	<p id="addnewloc">ADD NEW LOCATION:</p>

	<form id="addnewloc" action="edit_pref_loc.php" method="POST">
		<input type="text" name="loc">
		<button>ADD</button>
	</form>

	<form action="showprofile.php" method="POST">
	    <input id="back" type="submit" value="BACK" />
	</form>
</body>
</html>