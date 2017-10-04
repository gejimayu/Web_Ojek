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

	<form action="selectdriver.php" method="GET">
		<table id="table_form">
			<tr>
				<td class="inputlabel">Picking Point</td>
				<td><input type="text" name="picking_point"</td>
			</tr>
			<tr>
				<td class="inputlabel">Destination</td>
				<td><input type="text" name="destination"></td>
			</tr>
			<tr>
				<td class="inputlabel">Preferred Driver</td>
				<td><input type="text" name="preferred_driver" placeholder="Optional"></td>
			</tr>
		</table>
		<button>NEXT</button>
	</form>

</body>
</html>