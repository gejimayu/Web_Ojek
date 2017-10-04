<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<?php if(!empty($success_message)) { ?>
	<meta http-equiv="refresh" content="3;url=login.php" />
	<?php } ?>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<div id="signup">SIGN UP</div>
	</div>
	<?php if(!empty($success_message)) { ?>	
		<div id="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
	<?php } ?>
	<?php if(!empty($error_message)) { ?>	
		<div id="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
	<?php } ?>
	<form method="post" action="register.php">
		<div class="form-element">
			<table>
				<tr>
					<th><label id="yournameLabel" for="name">Yourname</label></th>
					<th><input type="text" name="name" id="name"  placeholder="your fullname" required/></th>
					
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="usernameLabel"for="username">Username</label></th>
					<th><input placeholder="your username" type="text" name="username" id="username" onkeyup="validateUsername(this.value)" required/></th>
					<th><img src="" id="oke"></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="emailLabel" for="email">Email</label></th>
					<th><input placeholder="your email" type="email" name="email" id="email" onkeyup="validateEmail(this.value)" required /></th>
					<th><img id="okee" src=""></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="passwordLabel" for="password">Password</label></th>
					<th><input placeholder="your password"type="password" name="password" id="password" required /></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="confirmLabel" for="password_confirm">Confirm password</label></th>
					<th><input placeholder="confirm your password" type="password" name="password_confirm" id="password_confirm" required /></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label id="phoneLabel" for="phone">Phone Number</label></th>
					<th><input placeholder="your phone number"type="text" name="phone" id="phone" required /></th>
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

	<script>
	//untuk validasi username
	function validateUsername(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	if (this.responseText == 1){//salah

            		document.getElementById("oke").src = "salah.jpg";
            	}else {//ada
            		document.getElementById("oke").src = "download.png";
            	}
                //document.getElementById("username").innerHTML = 
            }
        };
        xmlhttp.open("GET", "validator.php?username=" + str, true);
        xmlhttp.send();
    }
    
    //untuk validasi email
	function validateEmail(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	if (this.responseText == 1){//salah

            		document.getElementById("okee").src = "salah.jpg";
            	}else {//ada
            		document.getElementById("okee").src = "download.png";
            	}
            }
        };
        xmlhttp.open("GET", "validatorEmail.php?email=" + str, true);
        xmlhttp.send();
    }

    

	
</script>
</body>
</html>