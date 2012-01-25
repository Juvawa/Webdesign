// Determines if it is a leap-year.
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
        month=parseInt(strMonth);
        day=parseInt(strDay);
        year=parseInt(strYear);

        // indexOf return -1 if searchstring is not found.
        if (pos1 == -1 || pos2 == -1) {
                document.register.dob.style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Date does not match the DD-MM-YYYY format";
                return false;
        }
        if (strMonth.length < 1 || month < 1 || month > 12){
                document.register.dob.style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Date does not exist";
                return false;
        }
        if (strDay.length < 1 || day < 1 || day > 31 || (month == 2 && day > daysInFebruary(year)) || day > daysInMonth[month]){
                document.register.dob.style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Date does not exist";
                return false;
        }
        if (strYear.length != 4 || year == 0 || year < 1900 || year > 2012){
                document.register.dob.style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Fill in a date between the year 1900 and 2012 please";
                return false;
        }
        if (dobValue.indexOf("-", pos2 + 1) != -1) {
                document.register.dob.style.borderColor = "red";
                document.getElementById("div_dob").innerHTML = "Date does not match the DD-MM-YYYY format";
                return false;
        }
        document.register.dob.style.borderColor = "";
        document.getElementById("div_dob").innerHTML = "";
        return true;
}

function checkDob(){
        if (document.register.dob.value.length != 0) {
                if (!(isValid(document.register.dob.value))) {
                        return false;
                }
        }
    return true
 }