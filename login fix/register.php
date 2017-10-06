<?php include('validateRegister.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<?php if(!empty($success_message)) { ?>
		<meta http-equiv="refresh" content="3;url=login.php" />
		<?php } ?>

		<title>Sign Up Page</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet'>
	</head>
	<body>
		<div class="content">
			<h1 id="title">── SIGN UP ──</h1>
			<?php if(!empty($success_message)) { ?>	
				<div id="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
			<?php } ?>
			<?php if(!empty($error_message)) { ?>	
				<div id="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
			<?php } ?>
			<?php if(!empty($error_message_udah)) { ?>	
				<div id="error-message-udah"><?php if(isset($error_message_udah)) echo $error_message_udah; ?></div>
			<?php } ?>

			<form metdod="post" action="register.php" name="form" onsubmit="return validateForm()">
				<table>
					<tr>
						<td><label class="userLabel" for="name">Yourname</label></td>
						<td><input type="text" name="name" id="box"  placeholder="your fullname" /></td>
					</tr>
					<tr>
						<td><label class="userLabel" for="username">Username</label></td>
						<td><input placeholder="your username" type="text" name="username" id="boxbeda" onkeyup="validateUsername(tdis.value)" /></td>
						<td><span id="checked">✔</span></td>
					</tr>
					<tr>
						<td><label class="userLabel" for="email">Email</label></td>
						<td><input placeholder="aa@aa.aa" type="text" name="email" id="boxbeda" onkeyup="validateEmail(tdis.value)"  /></td>
						<td><span id="checked">✔</span></td>
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