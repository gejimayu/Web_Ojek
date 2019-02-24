<!DOCTYPE html>
<html>
	<head>
		<title> Edit Profile </title>
			<link rel="stylesheet" href="editprofilelayout.css">
	</head>
	<body>
		<?php
			include 'db.php';
			session_start();
			$db = new Database();
			$userid = $_SESSION['user_id'];
			$rows = $db -> select("SELECT * FROM user WHERE id_user=$userid");
		?>	
		<div>
			<p id="hi_username">Hi, <b><?php echo $rows[0]['name'] ?></b>!</p>
			<h1 id="logo">
				<span id="labelgreen">PR</span>-<span id="labelred">OJEK</span>
			</h1>
			<a id="logout" href="logout.php">Logout</a>
			<p id="extralogo">wush... wush... ngeeeeenggg...<p/>
		</div>
		<table id="tableactivity">
			<tr>
				<td class="rest_activity"><a href="order/pickdestination.php">ORDER</a></td>
				<td class="rest_activity"><a href="userHistory.php">HISTORY</a></td>
				<td id="current_activity"><a href="showprofile.php">MY PROFILE</a></td>
			</tr>
		</table>
		<div style="margin: 0 20px">
			<h3>EDIT PROFILE INFORMATION</h3>
			<form action="showprofile.php" method="POST" enctype="multipart/form-data">
				<img id="ava" src=<?php echo $rows[0]['prof_pic']?> alt="avatar">
				<div class="edit_ava">
					<h2>Update profile picture</h2>
						<input id="avaBox" type="text" disabled>
						<label for="file-upload" class="custom-file-upload">
    						<span id="browseOverlay"> Browse... </span>
						</label>
						<input name="inputAva" class="upload" id="browseButton" type="file"
	    onchange="document.getElementById('ava').src = window.URL.createObjectURL(this.files[0])">
				</div>	
				<div class="edit_profile">
						<table id="tableUser">
							<tr>
								<td class="labelTabel">Your Name</td>
								<td><input class="box" type="text" name="inputName" value=<?php echo $rows[0]['name']?>></td>
							</tr>
							<tr>
								<td class="labelTabel">Phone</td>
								<td><input class="box" type="number" name="inputPhone" value=<?php echo $rows[0]['phone_number']?>></td>
							</tr>
							<tr>
								<td class="labelTabel">Status Driver</td>
								<td>
									<label class="switch">
										<?php
											if ($rows[0]['driver_status'] == 'true')
												echo '<input type="checkbox" name="statDriver" checked>';
											else
												echo '<input type="checkbox" name="statDriver" >';
										?>
										<span class="slider round"></span>
									</label>
								</td>
							</tr>
						</table>
						<input id="saveButton" type="submit" value="SAVE" name="submit">
				</div>
			</form>
			<form action="showprofile.php" method="POST">
				<input id="backButton" type="submit" value="BACK">
			</form>
		</div>
	</body>
</html>