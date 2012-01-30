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
		
	}
	else
	{
		
	}
}
else
{
	echo "dagweergave";
}
?>