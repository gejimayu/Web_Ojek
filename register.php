<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>

	<?php if(!empty($success_message)) { ?>
	<meta http-equiv="refresh" content="3;url=login.php" />
	<?php } ?>

	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
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
	<?php if(!empty($error_message_udah)) { ?>	
		<div id="error-message-udah"><?php if(isset($error_message_udah)) echo $error_message_udah; ?></div>
	<?php } ?>

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

	<script>
	var check = true;
	//untuk validasi email,username, dan phone number menggunakan javascript
	function validateForm(){
		var name = document.form.name.value;
		var username = document.form.username.value;
		var email = document.form.email.value;
		var password = document.form.password.value;
		var password_confirm = document.form.password_confirm.value;
		var phone = document.form.phone.value;
		//semua field ga boleh kosong
		if (!validateName(name)){
			alert ("nama ko kosong?");
			check = false;
		}
		if (username==""){
			alert("username tidak boleh kosong");
			check = false;
		}
		if (!isPasswordSame(password,password_confirm)){
			alert ("Password harus sama dengan Confirm Password");
			check = false;
		}
		if (!validatePhone(phone)){
			alert ("Nomor telepon tidak sesuai format");
			check = false;
		}
		return check;
		

	}
	//untuk validasi format email
	function validateEmail(email) 
	{
    	var re = /\S+@\S+\.\S+/;
    	return re.test(email);
	}
	//validasi name, max 20. tidak boleh kosong
	function validateName(name){
		if (name==null || name==""){
			//kosong
			return false;
		}else if (name.length > 20){
			//max 20
			return false;
		}else {
			//tidak kosong, <=20
			return true;
		}
	}

	//untuk validasi phone number pengguna, 9 <= x <= 12
	//cek masukkan berupa numeric atatu bukan
	function isNumeric(n) {
  		return !isNaN(parseFloat(n)) && isFinite(n);
	}
	function validatePhone(phone){
		if (isNumeric(phone)){
			//numeric, cek panjangnya
			return (phone.length>=9 && phone.length<=12);
		}else {
			return false;
		}
	}

	//Confirm password harus sama denga  password
	function isPasswordSame(password, conPass){
		if (password=="" || conPass==""){
			return false;
		}else {
			return (password===conPass);	
		}
		
	}


	//AJAX
	//untuk validasi username
	function validateUsername(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	if (this.responseText == 1){//salah

            		document.getElementById("oke").src = "salah.jpg";
            		check = false;
            	}else {//ada
            		document.getElementById("oke").src = "download.png";
            		check = true;
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
            		check = false;
            		document.getElementById("okee").src = "salah.jpg";
            	}else {//ada
            		document.getElementById("okee").src = "download.png";
            		check = true;
            	}
            }
        };
        xmlhttp.open("GET", "validatorEmail.php?email=" + str, true);
        xmlhttp.send();
    }

    

	
</script>
</body>
</html>