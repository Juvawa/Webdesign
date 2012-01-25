<?php

class Testen{	
	function createWeek($date){
		$we = "";
		$functie = $this -> getEmployees($date);
		//var_dump($result);
		$functie2 = $this -> getTimes($functie, $date);
		//var_dump($result2);
		$functie3 = $this -> createGrid($functie2);
		return $functie3;
	}
	
	function getEmployees($date){
		//var_dump($date);
		$database = new Database();
		$result = $database -> doRows("SELECT USER_ID FROM SCHEDULE_DAYS WHERE DATE ='".$date."'");
		return $result;
	}
	
	function getTimes($result, $date){
		$database = new Database();
		$worktimes = array();
		$counter = 0;
		$worktimes = array();
		for($count = 0; $count < count($result); $count++){
			$values = array();
			$result3 = $database -> doQuery("SELECT NAME FROM EMPLOYEE WHERE USER_ID =".$result[$count]['USER_ID']);
			$result2 = $database -> doQuery("SELECT * FROM SCHEDULE_HOURS WHERE USER_ID =".$result[$count]['USER_ID']." AND DATE ='".$date."'");
			$values['NAME'] = $result3['NAME'];
			$values['HEIGHT'] = $this->barHeight($result2['TIME_START'], $result2['TIME_END']);
			var_dump($result2['TIME_START']
			$values['MARGIN'] = $this->marginTop($result2['TIME_START']);
			$worktimes[$count] = $values;
			$counter++;
		}
		$worktimes['WIDTH'] = 100 / $counter;
		return $worktimes;		
	}
	
	function marginTop($start){
		return ($start - 16) * 40;
	}
	
	function barHeight($start, $end) {
		if($end == "01:00:00") {
			$end = 25;
		} else if ($end == "02:00:00") {
			$end = 26;
		}
		return ($end - $start) * 40;
	}
	function createGrid($worktimes){
	
	(string)$var= " ";
	for($count = 0; $count < (count($worktimes)-1); $count++){
			$var = $var . ($this->createDiv($worktimes[$count], $worktimes['WIDTH']));
			echo $var;
		}
		//var_dump($var);
		return $var;
	}
	function createDiv($worktimes, $width) {
		(string)$result = "<div class=\"work\" style=\"height: ".$worktimes['HEIGHT']."px; width: ".$width."px; margin-top: ".$worktimes['MARGIN']."px;\">".$worktimes['NAME']."</div>";
		echo $result;
		print_r($result);
		
		return $result;
	}
				
		
}	
?>
