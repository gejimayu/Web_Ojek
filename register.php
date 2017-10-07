<?php include('validateRegister.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up Page</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<script type="text/javascript" src="validasi.js"></script>
	</head>
	<body>
		<div class="content">

			<h1 id="title">── SIGN UP ──</h1>

			<form method="POST" name="form" action="register.php" onsubmit="return validateForm()">
				<table>
					<tr>
						<td><label class="userLabel" for="name">Yourname</label></td>
						<td><input type="text" name="name" id="box"  placeholder="your fullname" /></td>
					</tr>
					<tr>
						<td><label class="userLabel" for="username">Username</label></td>
						<td><input placeholder="your username" type="text" name="username" id="boxbeda" onkeyup="validateUsername(this.value)" /></td>
						<td><span class="checked" id="checked1"></span></td>
					</tr>
					<tr>
						<td><label class="userLabel" for="email">Email</label></td>
						<td><input placeholder="aa@aa.aa" type="text" name="email" id="boxbeda" onkeyup="validateEmail(this.value)"  /></td>
						<td><span class="checked" id="checked2"></span></td>
					</tr>
					<tr>
						<td><label class="userLabel" for="password">Password</label></td>
						<td><input placeholder="your password" type="password" name="password" id="box"  /></td>
					</tr>
					<tr>
						<td><label class="userLabel" for="password_confirm">Confirm password</label></td>
						<td><input placeholder="confirm your password" type="password" name="password_confirm" id="box"  /></td>
					</tr>
					<tr>
						<td><label class="userLabel" for="phone">Phone Number</label></td>
						<td><input placeholder="your phone number" type="text" name="phone" id="box"  /></td>
					</tr>
				</table>
				<div class="also2">
					<input id="checkbox" type="checkbox" name="box" value="ok">
					<span id="also">Also sign me up as a driver!</span><br/>
				</div>
				<div id="already">
					<a href="login.php">Already have an account?</a>
				</div>
				<button type="submit" id="register" name="register">REGISTER</button>
			</form>
		</div>
	</body>
</html>