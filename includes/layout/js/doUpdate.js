/*
 * Roster Form Updater
 * file: doUpdate.js
 * location: <document root>/includes/layout/js/
 * 
 * author: Cas van der Weegen
 */
function change(id, day)
{
   var starttime = new String();
   var endtime = new String();
   starttime = document.getElementById(day + '_start').value;
   eindtime = document.getElementById(day + '_end').value;
   document.getElementById('hours_' + id).innerHTML = eindtime;
   
   var day2 = day.substring(0, day.length-1);
   for(i=0; i<=3; i++) document.getElementById(day2 + i + id).style.display = 'none';
   document.getElementById(day + id).style.display = 'inline';

}
