/*
 * Roster Form Updater
 * file: doUpdate.js
 * location: <document root>/includes/layout/js/
 * 
 * author: Cas van der Weegen
 */
function change(day)
{
   var starttime;
   var endtime;
   var id;
   var total;
   var oldcurrent;
   var current;
   var oldstart;
   var oldend;
   var olduser;
   var difstart;
   var difend;
   
   id = document.getElementById(day).value;
   starttime = parseInt(document.getElementById(day + '_start').value);
   endtime = parseInt(document.getElementById(day + '_end').value);
   
   if(isNaN(parseInt(document.getElementById(day + '_start').oldstart)) == false)
   {
      oldstart = parseInt(document.getElementById(day + '_start').oldstart)
   }
   
   if(isNaN(parseInt(document.getElementById(day + '_end').oldend)) == false)
   {
      oldend = parseInt(document.getElementById(day + '_end').oldend)
   }
   
   if(isNaN(parseInt(document.getElementById(day).olduser)) == false)
   {
      olduser = parseInt(document.getElementById(day).olduser)
   }
   
   current = parseInt(document.getElementById('hours_' + id).innerHTML);
   
   if((isNaN(oldstart) == false) && (isNaN(oldend) == false))
   {
      if(oldstart != starttime)
      {
         total = oldstart - starttime;
      }
      
      if(oldend != endtime)
      {
         total = endtime - oldend;
      }
   }
   else
   {
      if(endtime >= 0 && endtime < 7)
      {
         endtime = endtime+24;
      }
      total = endtime - starttime;
   }
   if(olduser != id)
   {
      if(isNaN(endtime) == false && isNaN(starttime) == false)
      {
         if(endtime >= 0 && endtime < 7)
         {
            endtime = endtime+24;
         }
         oldcurrent = parseInt(document.getElementById('hours_' + olduser).innerHTML);
         total = endtime - starttime;
         document.getElementById('hours_' + olduser).innerHTML = oldcurrent - total;
         document.getElementById('hours_' + id).innerHTML = total + current;
         
      }  
   }
   else
   {
      if(isNaN(endtime) == false && isNaN(starttime) == false)
      {
         document.getElementById('hours_' + id).innerHTML = total + current;
      }  
   }
   //var day2 = day.substring(0, day.length-1);
   //for(i=0; i<=3; i++) document.getElementById(day2 + i + id).style.display = 'none';
   //document.getElementById(day + id).style.display = 'inline';

}
