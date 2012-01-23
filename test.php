<?php
	require('includes/firststage.php');
	$database = new Database();
	
	$worktime = array();
	$user_id = "1";
	$week_nr = date('W');
	
	$result = $database -> doRows("SELECT * FROM SCHEDULE_DAYS, SCHEDULE_HOURS WHERE SCHEDULE_DAYS.WEEK_NR =" .$week_nr);
	$name = $database -> doQuery("SELECT NAME FROM EMPLOYEE WHERE USER_ID =" .$user_id);
		
	barHeight($result, "2012-01-20");
	
	function barHeight($result, $date) {
		$counter = 0;
		for($count = 0 ; $count < count($result); $count++) {
			$values = array();
			if($result[$count]['DATE'] == $date) {
				$start = $result[$count]['TIME_START'];
				$end = $result[$count]['TIME_END'];
				$values['0'] = ($end - $start) * 40;
				$values['1'] = $name;
				$worktime['$counter'] = $values;	
				$counter++;		
			}
		}	
		$worktime['width'] = 100 / $counter;	
		return $worktime;
	}

	//var_dump($worktime);
	

?>