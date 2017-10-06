<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="historyStyle.css">
	<title>History Driver</title>
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
			<td class="rest_activity">ORDER</td>
			<td id="current_activity">HISTORY</td>
			<td class="rest_activity">MY PROFILE</td>
		</tr>
	</table>

	<p id="transactionHistory">TRANSACTION HISTORY</p>
		
	<table style="border-style: solid; margin-bottom: 40px;" id="tabelOrder">
		<tr>
			<td id="previousOrder">MY PREVIOUS ORDER</th>
			<td id="driverHistory">DRIVER HISTORY</th>
		</tr>
	</table>

	<div id="divTabelProfile" style="border-style: solid; height: 160px;">
		<table style="width: 100%;" id="tabelProfile">
			<tr>
				<td id="profilePict" style="border-style: solid; width: 20%; height: 100px;">Profile Pict here</td>
				<td style="border-style: solid; width: 60%; padding-left: 50px;">	Profile dll</td>
				<td><button style="margin-left: 73px; margin-bottom: 80px; width: 80px; height: 35px; background-color: #DA0026; border-radius: 10px; border-color: #000000;" type="submit" class="buttonHIDE" name="hide">HIDE</button></td>
			</tr>
		</table>
	</div>

	<!-- my previous order sama driver history -->
		
</body>
</html>