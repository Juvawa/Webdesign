<?php
/*
 * User details Request
 * file: user_req.php
 * location: <document root>/includes/user/user_req.php
 * 
 * author: Justin van Wageningen
 */
 
 class userRequest
 {
	function reqUserDetails($id)
	{
		$database = new Database();
		$result = $database -> doQuery("SELECT NAME,SURNAME,DOB,PHONE,EMAIL FROM EMPLOYEE WHERE USER_ID = '$id'");
		return $result;
	}
	
	function reqLoginDetails($id)
	{
		$database = new Database();
		$result = $database -> doQuery("SELECT USERNAME FROM EMPLOYEE WHERE USER_ID = '$id'");
		return $result;
	}
	
	function reqUserPreferences($id)
	{
		$database = new Database();
		if($result = $database -> doRows("SELECT DAY, TIME_START, TIME_END, AVAILABLE FROM USER_PREFERENCES WHERE USER_ID = '$id' ORDER BY DAY ASC"))
		{
		  return $result;		  
		}
		else
		{
		  return NULL;
		}
	}
	
	function reqShifts()
	{
		$database = new Database();
		$result = $database -> doRows("SELECT * FROM SCHEDULE_SHIFTS ORDER BY SHIFT_ID ASC");
		return $result;
	}
}