<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/header.css">
	<link rel="stylesheet" type="text/css" href="style/edit_pref_loc.css">
	<title>Order</title>
</head>
<body>
	<?php
		include 'db.php';
		$db = new Database();

		$userid = $_GET['user_id'];

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
		$results = $db -> select("SELECT * FROM user JOIN driver NATURAL JOIN pref_location WHERE id_user = $userid AND id_user = id_driver");
		$name = $results[0]['name'];
	?>
	<div>
		<p id="hi_username">Hi, <b><?php echo $name?></b> !</p>
		<h1 id="logo">
			<span id="labelgreen">PR</span>-<span id="labelred">OJEK</span>
		</h1>
		<a id="logout" href="#">Logout</a>
		<p id="extralogo">wush... wush... ngeeeeenggg...</p>
	</div>

	<table id="tableactivity">
		<tr>
			<td class="rest_activity">ORDER</td>
			<td class="rest_activity">HISTORY</td>
			<td id="current_activity">MY PROFILE</td>
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
							<form id='xmarkform' action='edit_pref_loc.php?user_id=$userid' method='POST'>
								<input id='xmark' type='image' name='delete' value='". $location ."' src='vstock/forbidden-mark.png'/>
							</form>
						</td>
					</tr>
				";
			}
		?>
	</table>

	<p id="addnewloc">ADD NEW LOCATION:</p>

	<form id="addnewloc" action="edit_pref_loc.php?user_id=<?php echo $userid ?>" method="POST">
		<input type="text" name="loc">
		<button>ADD</button>
	</form>

	<form action="#">
	    <input id="back" type="submit" value="BACK" />
	</form>
</body>
</html>