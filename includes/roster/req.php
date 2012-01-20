<?php
/*
 * Roster Requests
 * file: req.php
 * location: <document root>/includes/roster/
 * 
 * author: Cas van der Weegen
 */
class rosterRequest
{
	function reqUsername($USER_ID)
	{
		$database = new Database();
      if($result = $database->doRows("SELECT NAME FROM EMPLOYEE WHERE USER_ID='$USER_ID' LIMIT 1"))
		{
			return $result['0']['NAME'];
		}
	}
	
	function reqByID($ID)
	{
		$database = new Database();
      if($result = $database->doRows("SELECT * FROM USER_EXCEPTIONS WHERE EXCEPTION_ID='$ID' LIMIT 1"))
		{
			return $result['0'];
		}
	}
	
	function reqUserByID($ID)
	{
		$database = new Database();
      if($result = $database->doRows("SELECT USER_ID,NAME,SURNAME,DOB,PHONE,EMAIL,USERNAME,HOURS,ACTIVE,CONFIRMED FROM EMPLOYEE WHERE USER_ID='$ID' LIMIT 1"))
		{
			return $result['0'];
		}
	}
	
	function viewDayoff()
	{
		$database = new Database();
      if($result = $database->doRows("SELECT * FROM USER_EXCEPTIONS WHERE TYPE='Verlof' ORDER BY CONFIRMED"))
		{
			return $result;
		}
	}
	
	function viewHolidays()
	{
		$database = new Database();
      if($result = $database->doRows("SELECT * FROM USER_EXCEPTIONS WHERE TYPE='Vakantie' ORDER BY CONFIRMED"))
		{
			return $result;
		}
	}
	
	function viewUsers()
	{
		$database = new Database();
      if($result = $database->doRows("SELECT USER_ID,NAME,SURNAME,DOB,PHONE,EMAIL,USERNAME,HOURS,ACTIVE,CONFIRMED FROM EMPLOYEE ORDER BY CONFIRMED DESC"))
		{
			return $result;
		}
	}
	
	function checkDayoff()
	{
		$database = new Database();
      if($result = $database->doRows("SELECT * FROM USER_EXCEPTIONS WHERE CONFIRMED ='NO' AND TYPE ='Verlof'"))
		{
			echo "<p style=\"color: #FF0000;\">There are unconfirmed items!&nbsp;&nbsp;(".count($result).")</p>";
		}
		else
		{
			echo "<p>No unconfirmed items!</p>";
		}
	}
	
	function checkHoliday()
	{
		$database = new Database();
      if($result = $database->doRows("SELECT * FROM USER_EXCEPTIONS WHERE CONFIRMED ='NO' AND TYPE ='Vakantie'"))
		{
			echo "<p style=\"color: #FF0000;\">There are unconfirmed items!&nbsp;&nbsp;(".count($result).")</p>";
		}
		else
		{
			echo "<p>No unconfirmed items!</p>";
		}
	}
	
	function checkNewuser()
	{
		$database = new Database();
      if($result = $database->doRows("SELECT * FROM EMPLOYEE WHERE CONFIRMED ='NO'"))
		{
			echo "<p style=\"color: #FF0000;\">There are unconfirmed items!&nbsp;&nbsp;(".count($result).")</p>";
		}
		else
		{
			echo "<p>No unconfirmed items!</p>";
		}
	}
}
?>