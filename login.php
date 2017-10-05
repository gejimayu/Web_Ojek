<?php include('validateLogin.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN!!!!</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="validasiLogin.js"></script>
</head>
<body>
	<div class="header">
		<h1>LOGIN</h1>
	</div>
	<?php if(!empty($error)) { ?>	
	<div id="error"><?php echo $error; ?></div>
	<?php } ?>
	<form method="post" action="login.php" onsubmit="return validateForms()">
		<div class="form-element">
			<table>
				<tr>
					<th><label id="usernameLabel" for="username">Username</label></th>
					<th><input placeholder="Insert Your Username" type="text" name="username" id="username"  /></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="passwordLabel" for="password">Password</label></th>
					<th><input placeholder="Insert Your Password"type="password" name="password" id="password" /></th>
				</tr>
			</table>
		</div>
		<div class="no_account">
			<a href="register.php">Don't have an account?</a>
		</div>
		<button type="submit" class="buttonGO" name="login">GO!</button>
	</form>
		
</body>
</html>
