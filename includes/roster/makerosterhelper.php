<?php
/*
 * Make Rosters (class & functions)
 * file: makerosterhelper.php
 * location: <document root>/includes/roster/
 * 
 * author: Cas van der Weegen
 */
class Roster
{
	function getPreferences()
	{
		$preferences = new Database();
		if($prefs = $preferences->doRows("SELECT * FROM `USER_PREFERENCES` ORDER BY USER_ID, AVAILABLE"))
		{
			return $prefs;
		}
		else
		{
			return NULL;
		}
	}
	
	function getExceptions()
	{
		$exceptions = new Database();
		if($prefs = $exceptions->doRows("SELECT USER_ID,DATE_START,DATE_END,TYPE,CONFIRMED FROM `USER_EXCEPTIONS` ORDER BY USER_ID, CONFIRMED, TYPE"))
		{
			return $prefs;
		}
		else
		{
			return NULL;
		}
	}
	
	function getUsers()
	{
		$users = new Database();
		if($prefs = $users->doRows("SELECT USER_ID,NAME,HOURS,AREAS,ACTIVE,CONFIRMED FROM `EMPLOYEE` ORDER BY ACTIVE desc, HOURS desc, USER_ID, CONFIRMED"))
		{
			return $prefs;
		}
		else
		{
			return NULL;
		}
	}
	
	function getShifts()
	{
		$shifts = new Database();
		if($prefs = $shifts->doRows("SELECT * FROM `SCHEDULE_SHIFTS` ORDER BY SHIFT_DAY"))
		{
			return $prefs;
		}
		else
		{
			return NULL;
		}
	}
	
	function calcTime($start, $end, $format = "%H:%M:%S", $debug = FALSE, $return = 'H')
	{
		$startshift = strptime($start, $format);
		$endshift = strptime($end, $format);
		
		if($debug == TRUE)
		{
			echo "Start: " . $start ." <br />";
			echo "Eind: " . $end ." <br /><br />";
			echo "Start Sec: " . $startshift['tm_sec'] ." <br />";
			echo "Start Min: " . $startshift['tm_min'] ." <br />";
			echo "Start Uur: " . $startshift['tm_hour'] ." <br />";
			echo "Eind Sec: " . $endshift['tm_sec'] ." <br />";
			echo "Eind Min: " . $endshift['tm_min'] ." <br />";
			echo "Eind Uur: " . $endshift['tm_hour'] ." <br />";
		}
		
		if($endshift['tm_hour'] > 0 && $endshift['tm_hour'] < 7) /* 7 is hier het omslagpunt,
																					 * evt in de database stoppen en
																					 * configureerbaar maken?
																					 */
		{
			$endshift['tm_hour'] = $endshift['tm_hour'] + 24; 
		}
		(int)$workhour = $endshift['tm_hour'] - $startshift['tm_hour'];
		
		/* Start Defining different possibilities */
		if($startshift['tm_min'] == 0 && $endshift['tm_min'] > 0)
		{
			(int)$workminute = 60-$endshift['tm_min'];
		}
		elseif($startshift['tm_min'] > 0 && $startshift['tm_min'] < $endshift['tm_min'])
		{
			(int)$workminute = abs($startshift['tm_min'] - $endshift['tm_min']);
		}
		elseif($startshift['tm_min'] > 0 && $startshift > $endshift['tm_min'])
		{
			$workhour = $workhour - 1;
			(int)$workminute = 60 - ($startshift['tm_min'] - $endshift['tm_min']);
		}
		elseif($startshift['tm_min'] > 0 && $endshift['tm_min'] == 0)
		{
			(int)$workminute = $startshift['tm_min'];
		}
		elseif($startshift['tm_min'] == $endshift['tm_min'])
		{
			(int)$workminute = 0;
		}
		
		$totalminutes = ($workhour * 60) + $workminute;
		
		if($debug == TRUE)
		{
			echo "<br />Aantal te werken uren: " . $workhour;
			echo "<br />Aantal te werken minuten: " . $workminute;
			echo "<br />Totaal gewerkte minuten: ". $totalminutes;
		}
		
		if($return = 'H' && $workminute == 0)
		{
			return $workhour;
		}
		elseif($return = 'TM')
		{
			return $totalminutes;
		}
		elseif($return == 'M')
		{
			return $workminute;
		}
		else
		{
			return NULL;
		}
	}
	
	function makeDropdown($day, $c)
	{
		$users = new Database();
		if($available = $users->doRows("SELECT * FROM `USER_PREFERENCES` WHERE DAY='".$day."' AND AVAILABLE='YES'"))
		{
			echo "<select name=\"".$day . $c ."\">";
			for($c = 0; $c < count($available); $c++)
			{
				echo "<option value=\"".$available[$c]['USER_ID']."\">".$this->getNamebyID($available[$c]['USER_ID'])."</option>";
			}
			
			echo "</select>";
		}
		else
		{
			echo "<select><option>No Employees Available</option></select>";
		}
	}
	
	private function getNamebyID($id)
	{
		$users = new Database();
		$return = $users->doQuery("SELECT Name FROM `EMPLOYEE` WHERE USER_ID='".$id."' LIMIT 1");
		return $return['0'];
	}
	
	function returnHour($time, $format = "%H:%M:%S")
	{
		$shift = strptime($time, $format);
		if($shift['tm_hour'] >= 0 && $shift['tm_hour'] < 7)
		{
			(int)$return = $shift['tm_hour'] + 24;
		}
		else
		{
			(int)$return = $shift['tm_hour'];
		}
		return $return;
	}
}

class Sorter
{
  var $sort_fields;
  var $backwards = false;
  var $numeric = false;

	function sort()
	{
		$args = func_get_args();
		$array = $args[0];
		
		if (!$array) return array();
			$this->sort_fields = array_slice($args, 1);
			if (!$this->sort_fields) return $array();

		if ($this->numeric)
		{
			usort($array, array($this, 'numericCompare'));
		}
		else
		{
			usort($array, array($this, 'stringCompare'));
		}
		return $array;
	}

	function numericCompare($a, $b)
	{
		foreach($this->sort_fields as $sort_field)
		{
			if ($a[$sort_field] == $b[$sort_field])
			{
				continue;
			}
			return ($a[$sort_field] < $b[$sort_field]) ? ($this->backwards ? 1 : -1) : ($this->backwards ? -1 : 1);
		}
		return 0;
	}

	function stringCompare($a, $b)
	{
		foreach($this->sort_fields as $sort_field)
		{
			$cmp_result = strcasecmp($a[$sort_field], $b[$sort_field]);
		if ($cmp_result == 0) continue;

      return ($this->backwards ? -$cmp_result : $cmp_result);
		}
		return 0;
	}
}


?>