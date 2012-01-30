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
		if($prefs = $users->doRows("SELECT USER_ID,HOURS,AREAS,ACTIVE,CONFIRMED FROM `EMPLOYEE` ORDER BY ACTIVE desc, HOURS desc, USER_ID, CONFIRMED"))
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
}

?>