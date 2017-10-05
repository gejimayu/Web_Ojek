<!DOCTYPE html>
<html>
	<head>
		<title>MyProfile</title>
		<link rel="stylesheet" href="showprofile.css">
		<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet'>
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
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
				<td>MY PROFILE</td>
			</tr>
		</table>
		<div class="show_content">
			<div class="heading_info">
				<h2>MY PROFILE</h2>
				<img id ="pencil" src="vstock/pencil.png">
			</div>
			<div class="show_info">
				<img id="user" src=<?php echo $rows[0]['prof_pic'] ?>  alt="avatar"><br/>
				<span>@<?php echo $rows[0]['username']?></span>
				<div class="usersInfo">
					<?php echo $rows[0]['name']?> <br/>
					<?php if ($rows[0]['driver_status']) {
						echo 'Driver ';
						echo '|';
						echo '<label class="star"> ☆'.
						$rowsdriver[0]['avgrating'].
						'</label>(1728 votes) <br/>';
					} else {
						echo 'User';
					}?>
					✉ <?php echo $rows[0]['email']?> <br/>
					☏ <?php echo $rows[0]['phone_number']?> <br/>
				</div>
			</div>
			<div class="heading_loc">
				<h3>PREFERRED LOCATIONS:</h3>
				<img id ="pencil" src="vstock/pencil.png">
			</div>
			<div class="pref_loc">
				<div class="info_1">
					<span id="triangle1">▸</span>
					<span id="loc1">Pewter City</span><br/> 
				</div>
				<div class="info_2">
					<span id="triangle2">▸</span>
					<span id="loc2">Saffron City</span><br/>
				</div>
				<div class="info_3">
					<span id="triangle3">▸</span>
					<span id="loc3">Skypillar Tower</span><br/>
				</div>  
			</div>
		</div>
	</body>
</html>