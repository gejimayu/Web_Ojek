<!DOCTYPE html>
<html>
	<head>
		<title>MyProfile</title>
		<link rel="stylesheet" href="showprofile.css">
	</head>
	<body>
		<?php
			include 'db.php';
			include 'authenticate.php';
			$db = new Database();
			$userid = $_SESSION['user_id'];
			// PROFILE PIC
			if(isset($_POST["submit"]) && $_POST["submit"] == "SAVE") {
				if (isset($_FILES['inputAva']) && $_FILES['inputAva']['name'] != false) {
					$target_dir = "img/";
					$target_file = $target_dir . basename($_FILES["inputAva"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

					// Check uploaded image file type
					$image = getimagesize($_FILES["inputAva"]["tmp_name"]);
					if ($image) {
						move_uploaded_file($_FILES["inputAva"]["tmp_name"], $target_file);
						$inputAva = $db -> escapeStr($target_file);
						$rowAva = $db -> query("UPDATE user SET prof_pic=".$inputAva." WHERE id_user=$userid");
					} else {
						echo "File upload error!";
					}
				}
				// USER'S INFO
				if (isset($_POST['inputName']) && $_POST['inputName'] != false) {
					$inputName = $db -> escapeStr($_POST['inputName']);
					$rowName = $db -> query("UPDATE user SET name=".$inputName." WHERE id_user=$userid");
				} 
				if (isset($_POST['inputPhone']) && $_POST['inputPhone'] != false) {
					$inputPhone = $db -> escapeStr($_POST['inputPhone']);
					$rowPhone = $db -> query("UPDATE user SET phone_number=".$inputPhone." WHERE id_user=$userid");
				} 
				if (isset($_POST['statDriver']) && $_POST['statDriver'] == 'on')
					$statDriver = "true";
				else
					$statDriver = "false";
				$statDriver = $db -> escapeStr($statDriver);
				$rowStat = $db -> query("UPDATE user SET driver_status=".$statDriver." WHERE id_user=$userid");
			}
			// FETCH USER'S INFO
			$rows = $db -> select("SELECT * FROM user WHERE id_user=$userid");
			$rowsdriver = $db -> select("SELECT * FROM driver WHERE id_driver=$userid");
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
		<div class="show_content">
			<div class="heading_info">
				<h2>MY PROFILE</h2>
				<form action="editprofile.php" method="POST">
					<input type="image" id="pencil1" src="vstock/pencil.png">
				</form>
			</div>
			<div class="show_info">
				<img id="user" src=<?php echo $rows[0]['prof_pic'] ?>  alt="avatar"><br/>
				<span>@<?php echo $rows[0]['username']?></span>
				<div class="usersInfo">
					<?php echo $rows[0]['name']?> <br/>
					<?php if ($rows[0]['driver_status'] == 'true') {
						echo 'Driver | ';
						echo '<label class="star"> ☆'.
						$rowsdriver[0]['avgrating'].
						'</label> (' . $rowsdriver[0]['num_votes'].') <br/>';
					} else {
						echo 'User <br/>';
					}?>
					✉ <?php echo $rows[0]['email']?> <br/>
					☏ <?php echo $rows[0]['phone_number']?> <br/>
				</div>
			</div>
			<?php
				$locs = $db -> select("SELECT * FROM pref_location WHERE id_driver=$userid");
				if ($rows[0]['driver_status'] == 'true'){
					echo
					'<div class="heading_loc">
						<h3>PREFERRED LOCATIONS:</h3>
						<form action="edit_pref_loc.php" method="POST">
							<input type="image" id="pencil2" src="vstock/pencil.png">
						</form>
					</div>';

					echo '<div class="pref_loc">';
					$count = 0;
					foreach ($locs as &$location) {
						echo '<div style="margin-left: '.$count.'px">
									<span id="triangle">▸</span>
									<span id="loc1">'.$location["location"].'</span><br/> 
							  </div>';
						$count = $count + 50;
					}  
					echo '</div>';
				}	
			?>
		</div>
	</body>
</html>