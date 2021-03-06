	var checkUsername = true;
	var checkEmail = true;
	
	//AJAX
	//untuk validasi username
	function validateUsername(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	if (this.responseText === "reject"){//salah
            		document.getElementById("checked1").innerHTML = "X";
            		checkUsername = false;
            	}else {//lolos
            		document.getElementById("checked1").innerHTML = "✔";
            		checkUsername = true;
            	}
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
            	if (this.responseText === "reject" || !validEmail(str)){//salah
            		checkEmail = false;
            		document.getElementById("checked2").innerHTML = "X";
            	}else {//ada
            		document.getElementById("checked2").innerHTML = "✔";
            		checkEmail = true;
            	}
            }
        };
        xmlhttp.open("GET", "validatorEmail.php?email=" + str, true);
        xmlhttp.send();
    }

	//untuk validasi email,username, dan phone number menggunakan javascript
	function validateForm(){
		var name = document.form.name.value;
		var username = document.form.username.value;
		var email = document.form.email.value;
		var password = document.form.password.value;
		var password_confirm = document.form.password_confirm.value;
		var phone = document.form.phone.value;
		var check = true;
		//semua field ga boleh kosong
		if (!validateName(name)){
			alert ("nama ko kosong?");
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
		return (check && checkUsername && checkEmail);
	}

	//untuk validasi format email
	function validEmail(e) {
    	var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    	return String(e).search (filter) != -1;
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