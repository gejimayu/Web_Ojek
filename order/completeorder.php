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
		<tr>
			<td><div class="circle">2</div></td>
			<td class="titleorder">Select a<br>Driver</td>
		</tr>
	</table>

	<table class="tableorder">
		<tr id="current_order">
			<td><div class="circle">3</div></td>
			<td class="titleorder">Complete<br>your Order</td>
		</tr>
	</table>

	<h2 id="howwasit">HOW WAS IT?</h2>

	<div id="ordercontent">
		<img src="../img/Pika1.png">
		<p id="username">@bomratata</p>
		<p id="name">Bombaratatatatat ratatatata</p>

		<form action="#" method="GET">
		    <div class="rate">
		        <input type="radio" id="star5" name="rate" value="5" /><label for="star5" title="text">5 stars</label>
		        <input type="radio" id="star4" name="rate" value="4" /><label for="star4" title="text">4 stars</label>
		        <input type="radio" id="star3" name="rate" value="3" /><label for="star3" title="text">3 stars</label>
		        <input type="radio" id="star2" name="rate" value="2" /><label for="star2" title="text">2 stars</label>
		        <input type="radio" id="star1" name="rate" value="1" /><label for="star1" title="text">1 star</label>
		    </div>
			<textarea name="comment" placeholder="Your comment..."></textarea>
			<button>Complete<br>Order</button>
		</form>
	</div>
		
</body>
</html>