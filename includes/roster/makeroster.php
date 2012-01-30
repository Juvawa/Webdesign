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
/*
for($c = 0; $c < count($prefs); $c++)
{
	echo $prefs[$c]['USER_ID'] . " " . $prefs[$c]['DAY'] . " " . $prefs[$c]['TIME_START'] . " " . $prefs[$c]['TIME_END'] . " " . $prefs[$c]['AVAILABLE'] . "<br />";
}

$exceptions = $roster->getExceptions();
for($c = 0; $c < count($exceptions); $c++)
{
	echo $exceptions[$c]['USER_ID'] . " " . $exceptions[$c]['DATE_START'] . " " . $exceptions[$c]['DATE_END'] . " " . $exceptions[$c]['TYPE'] . " " . $exceptions[$c]['CONFIRMED'] . "<br />";
}
*/
$users = $roster->getUsers();
for($c = 0; $c < count($users); $c++)
{
	if(strpos($users[$c]['AREAS'],','))
	{
		$new = explode(",",$users[$c]['AREAS']);
		$users[$c]['AREAS'] = $new;
	}
	echo $users[$c]['NAME'] . " " . $users[$c]['USER_ID'] . " " . $users[$c]['HOURS'] . " " . $users[$c]['AREAS'] . " " . $users[$c]['ACTIVE'] . " " . $users[$c]['CONFIRMED'] . "<br />";
}
// HIERONDER GAAN WE PROBEREN DE CODE TE REALISEREN
$shifts = $roster->getShifts();

// START PREPARING THE ARRAY
$employeesworking = 0;

for($c = 0; $c < count($shifts); $c++)
{
	$shifts[$c]['TIME_SORT'] = $roster->returnHour($shifts[$c]['TIME_START']);
	
	if($shifts[$c]['EMPLOYEES_WORKING'] > $employeesworking)
	{
		$employeesworking = $shifts[$c]['EMPLOYEES_WORKING'];
	}
	if($shifts[$c]['SHIFT_DAY'] == "MONDAY"){$shifts[$c]['SHIFT_DAY_SORT'] = 0;}
	elseif($shifts[$c]['SHIFT_DAY'] == "TUESDAY"){$shifts[$c]['SHIFT_DAY_SORT'] = 1;}
	elseif($shifts[$c]['SHIFT_DAY'] == "WEDNESDAY"){$shifts[$c]['SHIFT_DAY_SORT'] = 2;}
	elseif($shifts[$c]['SHIFT_DAY'] == "THURSDAY"){$shifts[$c]['SHIFT_DAY_SORT'] = 3;}
	elseif($shifts[$c]['SHIFT_DAY'] == "FRIDAY"){$shifts[$c]['SHIFT_DAY_SORT'] = 4;}
	elseif($shifts[$c]['SHIFT_DAY'] == "SATURDAY"){$shifts[$c]['SHIFT_DAY_SORT'] = 5;}
	elseif($shifts[$c]['SHIFT_DAY'] == "SUNDAY"){$shifts[$c]['SHIFT_DAY_SORT'] = 6;}
}

// SORT ACCORDING TO $shifts[$c]['TIME_SORT']
$sorter = new Sorter();
$shifts = $sorter->sort($shifts, 'SHIFT_DAY_SORT', 'TIME_SORT');

echo "<table border=\"1\" style=\"border-style: solid; border-width: 1px; width: 800px;\" />
			<tr><td colspan=\"".($employeesworking + 1)."\"/>ROOSTER</td></tr>";

$days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY');
foreach($days as &$day)
{
	echo "<tr><td style=\"width: 150px;\">".$day."</td>";
	for($c = 0; $c < $employeesworking; $c++)
	{
		echo "<td>";
		$roster->makeDropdown($day, $c);
		echo "</td>";
	}
	echo "</tr>";
}

echo "</table>";
echo "<br /><table border=\"1\" style=\"border-style: solid; border-width: 1px;\" /><tr>";
$day = "MONDAY";
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
			" . $shifts[$c]['SHIFT_ID'] . "
			</td>";
	
	if($c+1 == count($shifts))
	{
		echo "</tr>";
	}
}
echo "</table>";
?>