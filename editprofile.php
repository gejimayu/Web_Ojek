<!DOCTYPE html>
<html>
	<head>
		<title> Edit Profile </title>
			<link rel="stylesheet" href="editprofilelayout.css">
			<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet'>
	</head>
	<body>
		<?php
			include 'db.php';
			$db = new Database();
			$rows = $db -> select("SELECT * FROM user WHERE id_user=4");
			$rowsdriver = $db -> select("SELECT * FROM driver WHERE id_driver=4");
		?>	
		<div>
			<p id="hi_username">Hi, <b><?php echo $rows[0]['name'] ?></b>!</p>
			<h1 id="logo">
				<span id="labelgreen">PR</span>-<span id="labelred">OJEK</span>
			</h1>
			<a id="logout" href="#">Logout</a>
			<p id="extralogo">wush... wush... ngeeeeenggg...<p/>
		</div>
		<table id="tableactivity">
			<tr>
				<td>ORDER</td>
				<td>HISTORY</td>
				<td id="current_activity">MY PROFILE</td>
			</tr>
		</table>
		<h3>EDIT PROFILE INFORMATION</h3>
			<img id="ava" src="vstock/blank_ava.png" alt="avatar">
			<div class="edit_ava">
				<h2>Update profile picture</h2>
					<input id="avaBox" type="text" name="inputAva" disabled>
					<input class="upload" id="browseButton" type="file" 
    onchange="document.getElementById('ava').src = window.URL.createObjectURL(this.files[0])">
			</div>
		<div class="edit_profile">
			<form action="showprofile.php" method="POST">
				<table id="tableUser">
					<tr>
						<td class="labelTabel">Your Name</td>
						<td><input class="box" type="text" name="inputName"></td>
					</tr>
					<tr>
						<td class="labelTabel">Phone</td>
						<td><input class="box" type="number" name="inputPhone"></td>
					</tr>
					<tr>
						<td class="labelTabel">Status Driver</td>
						<td>
							<label class="switch">
								<input type="checkbox" name="statDriver">
								<span class="slider round"></span>
							</label>
						</td>
					</tr>
				</table>
				<input id="backButton" type="submit" value="BACK">
				<input id="saveButton" type="submit" value="SAVE">
			</form>
		</div>
	</body>
</html>