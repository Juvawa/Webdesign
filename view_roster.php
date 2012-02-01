<?php
/*
 * Roster View Selection
 * file: view_roster.php
 * location: <document root>/
 * 
 * author: Cas van der Weegen
 */
require('includes/directcall.php');

if(isset($_GET['view']))
{
	if($_GET['view'] == "week")
	{
		include('includes/roster/schedule_week.php');
	}
	elseif($_GET['view'] == "month")
	{
		
	}
	elseif($_GET['view'] == "day")
	{
		include('includes/roster/schedule_day.php');
	}
	elseif($_GET['view'] == "personal")
	{
		include('includes/roster/schedule_week_personal.php');
	}
	else{
	
	}
}
else
{
	echo "dagweergave";
}
?>