<?php
/*
 * Make Rosters
 * file: makeroster.php
 * location: <document root>/includes/roster/
 * 
 * author: Cas van der Weegen
 */
require('makerosterhelper.php');

$roster = new Roster;
$prefs = $roster->getPreferences();
for($c = 0; $c < count($prefs); $c++)
{
	echo $prefs[$c]['USER_ID'] . " " . $prefs[$c]['DAY'] . " " . $prefs[$c]['TIME_START'] . " " . $prefs[$c]['TIME_END'] . " " . $prefs[$c]['AVAILABLE'] . "<br />";
}

$exceptions = $roster->getExceptions();
for($c = 0; $c < count($exceptions); $c++)
{
	echo $exceptions[$c]['USER_ID'] . " " . $exceptions[$c]['DATE_START'] . " " . $exceptions[$c]['DATE_END'] . " " . $exceptions[$c]['TYPE'] . " " . $exceptions[$c]['CONFIRMED'] . "<br />";
}

$users = $roster->getUsers();
for($c = 0; $c < count($users); $c++)
{
	if(strpos($users[$c]['AREAS'],','))
	{
		$new = explode(",",$users[$c]['AREAS']);
		$users[$c]['AREAS'] = $new;
	}
	echo $users[$c]['USER_ID'] . " " . $users[$c]['HOURS'] . " " . $users[$c]['AREAS'] . " " . $users[$c]['ACTIVE'] . " " . $users[$c]['CONFIRMED'] . "<br />";
}
// HIERONDER GAAN WE PROBEREN DE CODE TE REALISEREN

echo "<table border=\"1\" style=\"border-style: solid; border-width: 1px;\" /><tr>";
$day = "MONDAY";
$shifts = $roster->getShifts();
for($c = 0; $c < count($shifts); $c++)
{
	if($shifts[$c]['SHIFT_DAY'] != $day)
	{
		echo "</tr><tr>";
		$day = $shifts[$c]['SHIFT_DAY'];
	}
	
	echo "<td>
			" . $shifts[$c]['SHIFT_DAY'] . "
			" . $shifts[$c]['EMPLOYEES_WORKING'] . "
			" . $shifts[$c]['TIME_START'] . "
			" . $shifts[$c]['TIME_END']. "
			</td>";
			
	$format = "%H:%M:%S";
	strptime($shifts[$c]['TIME_START'], $format);
	strptime($shifts[$c]['TIME_END'], $format);
	
	if($c+1 == count($shifts))
	{
		echo "</tr>";
	}
}

echo "</table>";
?>