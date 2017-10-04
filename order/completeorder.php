<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/header.css">
	<link rel="stylesheet" type="text/css" href="../style/completeorder.css">
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

	<h2 id="howwasit">HOW WAS IT?</h2>

	<img src="../img/Pika1.png">
	<p>@bomratata</p>
	<div class="rating">
		<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
	</div>
	<form>
		<textarea placeholder="Your comment..."></textarea>
		<button>Complete<br>Order</button>
	</form>

</body>
</html>