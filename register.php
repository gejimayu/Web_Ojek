<?php include('validateRegister.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script type="text/javascript" src="validasi.js"></script>
</head>
<body>
	<div class="header">
		<div id="signup">SIGN UP</div>
	</div>
	<form method="post" action="register.php" name="form" onsubmit="return validateForm()">
		<div class="form-element">
			<table>
				<tr>
					<th><label id="yournameLabel" for="name">Yourname</label></th>
					<th><input type="text" name="name" id="name"  placeholder="your fullname" /></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="usernameLabel"for="username">Username</label></th>
					<th><input placeholder="your username" type="text" name="username" id="username" onkeyup="validateUsername(this.value)" /></th>
					<th><img src="" id="oke"></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="emailLabel" for="email">Email</label></th>
					<th><input placeholder="aa@aa.aa" type="text" name="email" id="email" onkeyup="validateEmail(this.value)"  /></th>
					<th><img id="okee" src=""></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="passwordLabel" for="password">Password</label></th>
					<th><input placeholder="your password" type="password" name="password" id="password"  /></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="confirmLabel" for="password_confirm">Confirm password</label></th>
					<th><input placeholder="confirm your password" type="password" name="password_confirm" id="password_confirm"  /></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="phoneLabel" for="phone">Phone Number</label></th>
					<th><input placeholder="your phone number" type="text" name="phone" id="phone"  /></th>
				</tr>
			</table>
		</div>
		<div class="box">
			<table>
				<tr>
					<th class="checkbox"><input type="checkbox" name="box" id="box" value="ok"></th>
					<th class="driveralso">Also sign me up as a driver!<br></th>
				</tr>
			</table>
			
		</div>
		<div class="no_account">
			<a href="login.php">already have an account?</a>
		</div>
		<button type="submit" class="buttonGO" name="register">REGISTER</button>
	</form>
</body>
</html>