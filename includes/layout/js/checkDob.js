/*
 * Date of Birth validator
 * file: checkDob.js
 * location: <document root>/includes/layout/
 * 
 * author: Justin van Wageningen
 */

// Determines if it is a leap-strYear.
function daysInFebruary (year){
        if(((year % 4 == 0) && (!(year % 100 == 0)) || (year % 400 == 0))) {
                return 29;
        }
        return 28;
}

function isValid (dobValue) {
        var daysInMonth = new Array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        var pos1 = dobValue.indexOf("-");
        var pos2 = dobValue.indexOf("-", pos1 + 1);
        var strDay = dobValue.substring(0, pos1);
        var strMonth = dobValue.substring(pos1 + 1, pos2);
        var strYear = dobValue.substring(pos2 + 1);

        // indexOf return -1 if searchstring is not found.
        if (pos1 == -1 || pos2 == -1) {
                document.getElementById("dob").style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Date does not match the DD-MM-YYYY format";
                return false;
        }
        if (strMonth.length < 1 || strMonth < 1 || strMonth > 12){
                document.getElementById("dob").style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Month < 0 and > 12 do not exist.";
                return false;
        }
        if (strDay.length < 1 || strDay < 1 || strDay > 31 || (strMonth == 2 && strDay > daysInFebruary(strYear)) || strDay > daysInMonth[strMonth]){
                document.getElementById("dob").style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Date does not exist";
                return false;
        }
        if (strYear.length != 4 || strYear == 0 || strYear < 1900 || strYear > 2012){
                document.getElementById("dob").style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Fill in a date between the year 1900 and 2012 please";
                return false;
        }
        if (dobValue.indexOf("-", pos2 + 1) != -1) {
                document.getElementById("dob").style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Date does not match the DD-MM-YYYY format";
                return false;
        }
        document.getElementById("dob").style.borderColor = "";
        document.getElementById("div_dob").innerHTML = "";
        return true;
}

function checkDob(){
	if (document.getElementById("dob").value.length != 0) {
			if (!(isValid(document.getElementById("dob").value))) {
					return false;
			}
	}
    return true
 }