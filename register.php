<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="border:2px solid black;">
	<div class="header">
		<h1>Sign Up</h1>
		<h2 id="disini"> </h2>	
		<h2 class="disana"> </h2>
	</div>
	<form method="post" action="register.php"">
		<div class="form-element">
			<table>
				<tr>
					<th><label for="name">Yourname</label></th>
					<th><input type="text" name="name" id="name" /></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label for="username">username</label></th>
					<th><input style="width: 120px;" type="text" name="username" id="username" onkeyup="validateUsername(this.value)"/></th>
					<th><img src="" id="oke" style="width: 25px;"></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label for="email">email</label></th>
					<th><input style="width: 120px;" type="text" name="email" id="email" /></th>
					<th><img style="width: 25px;"src="download.png"></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label for="password">password</label></th>
					<th><input type="text" name="password" id="password" /></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label for="password_confirm">Confirm password</label></th>
					<th><input type="text" name="password_confirm" id="password_confirm" /></th>
				</tr>
			</table>
		</div>
		<div class="form-element">
			<table>
				<tr>
					<th><label for="phone">phone</label></th>
					<th><input type="text" name="phone" id="phone" /></th>
				</tr>
			</table>
		</div>
		<div class="box">
			<table>
				<tr>
					<th class="checkbox"><input type="checkbox" name="box"></th>
					<th class="driveralso">Also sign me up as a driver!<br></th>
				</tr>
			</table>
			
		</div>
		<div class="no_account">
			<a href="login.html">Don't have an account?</a>
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
        xmlhttp.open("GET", "validator.php?q=" + str, true);
        xmlhttp.send();
    
    //untuk validasi email


	}
</script>
</body>
</html>