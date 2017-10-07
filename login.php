<?php include('validateLogin.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style/login.css">
</head>
<body>
	<div class="content">
		<div class="header">
			<h1 id="title">── LOGIN ──</h1>
		</div>
		<?php if(!empty($error)) { ?>	
			<div id="error"><?php echo $error; ?></div>
		<?php } ?>
		<form method="post" action="login.php" onsubmit="return validateForms()">
			<table>
				<tr>
					<td><label id="inputLabel" for="username">Username</label></td>
					<td><input id="box" placeholder="Insert Your Username" type="text" name="username" id="username"  /></td>
				</tr>
				<tr>
					<td><label id="inputLabel" for="password">Password</label></td>
					<td><input id="box" placeholder="Insert Your Password" type="password" name="password" id="password" /></td>
				</tr>
			</table>
			<div class="bottom">
				<a id="no_account" href="register.php">Don't have an account?</a>
				<button type="submit" class="buttonGO" name="login">GO!</button>
			</div>
		</form>
	</div>		
</body>
</html>
