function checkFname() {
        document.getElementById("div_name").innerHTML = "";
        if(document.register.name.value.length != 0) {
                var c = document.register.name.value.split("");
                for(i = 0; i < c.length; i++) {
                        if(!isNaN(c[i])) {
                                document.register.name.style.borderColor = "red";
                                document.getElementById("div_name").innerHTML = "Invalid name";
                                return false;
                        }
                }
        }
        document.register.name.style.borderColor = "";
        document.getElementById("div_name").innerHTML = "";
        return true;
}

function checkSurname() {
        if(document.register.surname.value.length != 0) {
                var c = document.register.surname.value.split("");
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
                                document.register.surname.style.borderColor = "red";
                                document.getElementById("div_surname").innerHTML = "Invalid surname";
                                return false;
                        } 
                }
        }
        document.register.surname.style.borderColor = "";
        document.getElementById("div_surname").innerHTML = "";
        return true;
}

function checkPhone() {
        var regex_phone = /^(((00|\+)\d{2}|0)[ |-]?((\d{2}[ |-]?\d{7})|(\d{3}[ |-]?\d{6})|(6[ |-]?\d{8})))$/;
        if(document.register.phone.value.length != 0) {
                if(!regex_phone.test(document.register.phone.value)) {
                        document.register.phone.style.borderColor = "red";
                        document.getElementById("div_phone").innerHTML = "Invalid phone number";
                        return false;
                }
        }
        document.register.phone.style.borderColor = "";
        document.getElementById("div_phone").innerHTML = "";
        return true;
}

function checkUsername() {
        var xmlhttp;
        if (document.register.username.value.length != 0) {
                if(document.register.username.value.length < 4) {
                        document.getElementById("div_username").innerHTML="";
                        return;
                }
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
                        document.getElementById("div_username").innerHTML = xmlhttp.responseText;
                }
        }
        xmlhttp.open("GET", "getusername.asp?username=" + str, true);
        xmlhttp.send();
}

function checkPassword() {
        if(document.register.repeatpassword.value.length != 0 && document.register.password.value.length != 0) {
                if(document.register.password.value != document.register.repeatpassword.value) {
                        document.register.repeatpassword.style.borderColor = "red";
                        document.register.password.style.borderColor = "red";
                        document.getElementById("div_password").innerHTML = "Passwords don't match";
                        return false;
                }
        }
        document.register.password.style.borderColor = "";
        document.register.repeatpassword.style.borderColor = "";
        document.getElementById("div_password").innerHTML = "";
        return true;
}

function checkEmail() {
        var regex_email = /^(\w+\.)*\w+@(\w+\.)+[A-Za-z]+$/;
        if(document.register.email.value.length != 0) {
                if(!regex_email.test(document.register.email.value)) {
                        document.register.email.style.borderColor = "red";
                        document.getElementById("div_email").innerHTML = "Email doesn't have the right syntax";
                        return false;
                }
        }
        document.register.email.style.borderColor = "";
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

function resetBorder(){
        if(document.register.username.value.length != 0) {
                document.register.username.style.borderColor = "";
        }
}
