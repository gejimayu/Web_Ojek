function validateForms(){
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;;
		var checkUsername = true;
		var checkPassword = true;
		if (username==""){
			checkUsername = false;
		}
		if (password==""){
			checkPassword = false;
		}
		if (checkPassword&&checkUsername){
			return true;
		}else {
			alert ("email DAN password tidak boleh kosong");
			return false;
		}
		
}