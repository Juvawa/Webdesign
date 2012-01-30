function checkFname() {
        if(document.getElementById("name").value.length != 0) {
                var c = document.getElementById("name").value.split("");
                for(i = 0; i < c.length; i++) {
                        if(!isNaN(c[i])) {
                                document.getElementById("name").style.borderColor = "red";
                                document.getElementById("div_name").innerHTML = "Invalid name";
                                return false;
                        }
                }
        }
        document.getElementById("name").style.borderColor = "";
        document.getElementById("div_name").innerHTML = "";
        return true;
}

function checkSurname() {
        if(document.getElementById("surname").value.length != 0) {
                var c = document.getElementById("surname").value.split("");
                var k = 0;
                for(i = 0; i < c.length; i++) {
                        if(c[i] == " ") {
                                k = i + 1;
                                for(j = i; j < c.length - 1; j++) {
                                        c[j] = c[j+1];
                                        k++;
                                }
                                c.length = c.length - 1;
                        }
                }
                for(i = 0; i < c.length; i++) {
                        if(!isNaN(c[i])) {
                                document.getElementById("surname").style.borderColor = "red";
                                document.getElementById("div_surname").innerHTML = "Invalid surname";
                                return false;
                        } 
                }
        }
        document.getElementById("surname").style.borderColor = "";
        document.getElementById("div_surname").innerHTML = "";
        return true;
}

function checkPhone() {
        var regex_phone = /^(((00|\+)\d{2}|0)[ |-]?((\d{2}[ |-]?\d{7})|(\d{3}[ |-]?\d{6})|(6[ |-]?\d{8})))$/;
        if(document.getElementById("phone").value.length != 0) {
                if(!regex_phone.test(document.getElementById("phone").value)) {
                        document.getElementById("phone").style.borderColor = "red";
                        document.getElementById("div_phone").innerHTML = "Invalid phone number";
                        return false;
                }
        }
        document.getElementById("phone").style.borderColor = "";
        document.getElementById("div_phone").innerHTML = "";
        return true;
}

function checkUsername() {
	var xmlhttp;
	var username = document.getElementById("username").value;
	if (document.getElementById("username").value.length != 0) {
			if(document.getElementById("username").value.length < 5) {
				document.getElementById("div_username").innerHTML = "Username must be longer than 4 characters";
				document.getElementById("username").style.borderColor = "red";
				return false;
			} else {
				document.getElementById("username").style.borderColor = "";
			}
				
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function() {
			var result = xmlhttp.responseText;
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("div_username").innerHTML = result;
				if(result.length != "0") {
					document.getElementById("username").style.borderColor = "red";
				}
			}
		}
		xmlhttp.open("GET", "user_test.php?username=" + username, true);
		xmlhttp.send();
	}
}

function checkPassword() {
        if(document.getElementById("repeatpassword").value.length != 0 && document.getElementById("password").value.length != 0) {
                if(document.getElementById("password").value != document.getElementById("repeatpassword").value) {
                        document.getElementById("repeatpassword").style.borderColor = "red";
                        document.getElementById("password").style.borderColor = "red";
                        document.getElementById("div_password").innerHTML = "Passwords don't match";
                        return false;
                }
        }
        document.getElementById("password").style.borderColor = "";
        document.getElementById("repeatpassword").style.borderColor = "";
        document.getElementById("div_password").innerHTML = "";
        return true;
}

function checkEmail() {
        var regex_email = /^(\w+\.)*\w+@(\w+\.)+[A-Za-z]+$/;
		var email = document.getElementById("email").value;
        if(document.getElementById("email").length != 0) {
			if(!regex_email.test(document.getElementById("email").value)) {
					document.getElementById("email").style.borderColor = "red";
					document.getElementById("div_email").innerHTML = "Email doesn't have the right syntax";
					return false;
			}
			
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
	
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var result = xmlhttp.responseText;
					document.getElementById("div_email").innerHTML = result;
					if(result.length != "0") {
						document.getElementById("email").style.borderColor = "red";
					}
				}
			}
			xmlhttp.open("GET", "email_test.php?email=" + email, true);
			xmlhttp.send();
        }
        document.getElementById("email").style.borderColor = "";
        document.getElementById("div_email").innerHTML = "";
        return true;
}

function checkEmpty(form) {				
        for(i = 0; i < 12; i++) {
                box = form.elements[i];
                if(!box.value) {
                        box.style.borderColor = "red";
                        return false;
                }
                if(box.value.length != 0) {
                        box.style.borderColor = "";
                }
        }
        return true;
}

function disableInput()
{
	if(document.getElementById("radiono1").checked == true) 
	{
		document.getElementById("startday1").readonly = true;
		document.getElementById("endday1").readonly = true;
		alert(document.getElementById("startday1").readonly);
	}
	else if(document.getElementById("radioyes1").checked == true)
	{
		document.getElementById.("startday1").readonly = false;
		document.getElementById("endday1").readonly = false;
	}

}