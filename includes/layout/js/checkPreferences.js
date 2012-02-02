/*
 * Gives the preferences the right syntax
 * file: checkPreferences.js
 * location: <document root>/includes/js/
 * 
 * author: Justin van Wageningen
 */
 
 function checkPreferences()
 {
	var start = new Array("startday0", "startday1", "startday2", "startday3", "startday4", "startday5", "startday6":7);
	var end = new Array("endday0", "endday1", "endday2", "endday3", "endday4", "endday5", "endday6");
	var regex_time = /^(0[0-9]|1[0-9]|2[0-3]):(\d{2}):(\d{2})$/;
	var value = document.preferences.start[1].value;
	alert(value);
	
}