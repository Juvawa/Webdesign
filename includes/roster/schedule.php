<?php

class Schedule{
	
	function createWeek($date){
		$we = "";
		$functie = $this -> getEmployees($date);
		//var_dump($result);
		$functie2 = $this -> getTimes($functie, $date);
		//var_dump($result2);
		$functie3 = $this -> createGrid($functie2);
		return $functie3;
	}
	function createDay($date){
		$functie = dayQuery($date);
	}
	
	function dayQuery($date){
		$database = new Database();
		$result = $database -> doRows("SELECT * FROM SCHEDULE_HOURS WHERE SCHEDULE_HOURS.DATE = '".$date."'");
		$values = array();
		(string)$table1 = "";
		(string)$table = "";
		for($count = 0; $count < count($result); $count++){
			$naam = $database -> doQuery("SELECT NAME FROM EMPLOYEE WHERE USER_ID = '".$result[$count]['USER_ID']."'");
			$end = substr($result[$count]['TIME_END'], 0, -3);
			$start = substr($result[$count]['TIME_START'], 0, -3);
			$values['START'] = $start;
			$values['END'] = $end;
			$values['NAME'] = $naam['NAME'];
			$values['MARGIN'] = $this -> marginLeft($result[$count]['TIME_START']);
			$values['LENGTH'] = $this -> barLength($result[$count]['TIME_START'],  $result[$count]['TIME_END']);
			$table = $table.$this -> dayDiv($values);
		}
		return $table;
	}
	
	function marginLeft($start){
		return (($start - 16) * 67 )+ 67;
	}
	
	function barLength($start, $end){
		if($end == "01:00:00") {
			$end = 25;
		} else if ($end == "02:00:00") {
			$end = 26;
		} else if ($end == "00:00:00"){
			$end = 24;
		}
		
		return ($end - $start) * 68;
	}
	
	function dayDiv($workers){
		
		(string)$result = "<tr><td><div class=\"work_day\" style=\"float: left; margin-left: ".$workers['MARGIN']."px; width: ".$workers['LENGTH']."px; font-family: arial; font-size: 20px;\">".$workers['NAME']."  ".$workers['START']." - ".$workers['END']."</div></td></tr>";
		return $result;
		
	}
	
	function personalQuery($date){
		$id = $_SESSION['userid'];
		$database = new Database();
		$worktimes = array();
		$result2 = $database -> doQuery("SELECT * FROM SCHEDULE_HOURS WHERE SCHEDULE_HOURS.DATE = '".$date."' AND SCHEDULE_HOURS.USER_ID = '".$id."'");
		$end = substr($result2['TIME_END'], 0, -3);
		$start = substr($result2['TIME_START'], 0, -3);	
		$worktimes['END'] = $end;
		$worktimes['START'] = $start;
		$worktimes['MARGIN'] = $this -> marginTop($result2['TIME_START']);
		$worktimes['HEIGHT'] = $this -> barHeight($result2['TIME_START'],$result2['TIME_END']);
		$test =  $database -> doQuery("SELECT NAME FROM EMPLOYEE WHERE USER_ID = '".$id."'");
		$worktimes['NAME'] = $test['NAME'];
		$width = "90";
		$div = $this -> createDiv($worktimes, $width);
		return $div;
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
			$result3 = $database -> doQuery("SELECT NAME FROM EMPLOYEE WHERE USER_ID ='".$result[$count]['USER_ID']."'");
			$result2 = $database -> doQuery("SELECT * FROM SCHEDULE_HOURS WHERE USER_ID ='".$result[$count]['USER_ID']."' AND DATE ='".$date."'");
			$values['NAME'] = $result3['NAME'];
			$values['HEIGHT'] = $this->barHeight($result2['TIME_START'], $result2['TIME_END']);
			$values['MARGIN'] = $this->marginTop($result2['TIME_START']);
			$worktimes[$count] = $values;
			$counter++;
		}
		$worktimes['WIDTH'] = (90 / $counter)-2;
		return $worktimes;		
	}
	
	function marginTop($start){
		return ($start-16) * 40;
	}
	
	function barHeight($start, $end) {
		if($end == "01:00:00") {
			$end = 25;
		} else if ($end == "02:00:00") {
			$end = 26;
		} else if ($end == "00:00:00"){
			$end = 24;
		}
		
		return ($end - $start) * 40;
	}
	function createGrid($worktimes){
	
	(string)$var= " ";
	for($count = 0; $count < (count($worktimes)-1); $count++){
			$var = $var . ($this->createDiv($worktimes[$count], $worktimes['WIDTH']));
		}
		//var_dump($var);
		return $var;
	}
	function createDiv($worktimes, $width) {
		if($width != 90){
			(string)$result = "<div class=\"work_week\" style=\"float: left;height: ".$worktimes['HEIGHT']."px; width: ".$width."px; margin-top: ".$worktimes['MARGIN']."px;\"><div class=\"vflip\">".$worktimes['NAME']."</div></div>";
		}
		else{
			(string)$result = "<div class=\"work_week\" style=\"float: left;height: ".$worktimes['HEIGHT']."px; width: ".$width."px; margin-top: ".$worktimes['MARGIN']."px; font-family: arial; font-size: 20px;\">".$worktimes['NAME']."<br />".$worktimes['START']."<br />".$worktimes['END']."</div>";

		}
		return $result;
	}
	function createTd($week){
		
		$database = new Database();
		$currentweek = (int)date("W");
		$compareweek = (int)$week;
		(string)$header = '<tr><td></td><td class="day_td">Week '.$week.'</td><td class="day_td">CLEMENS</td><td class="day_td">PIJKE</td><td class="day_td">JEROEN</td><td class="day_td">ROY</td><td class="day_td">PATRICIA</td><td class="day_td">AMBULANT</td><td class="day_td">AMBULANT</td></tr>';		
		$days = array();
		
		if(($currentweek - $compareweek) == 1){
			for($count = 0; $count < 7; $count++){
				$days[$count] = -7;
			}
		}
		else if(($currentweek - $compareweek) == 0){
			for($count = 0; $count < 7; $count++){
				$days[$count] = 0;
			}}
		else if(($currentweek - $compareweek) == 2){
			for($count = 0; $count < 7; $count++){
				$days[$count] = -14;
			}}
		else if(($currentweek - $compareweek) == 3){
			for($count = 0; $count < 7; $count++){
				$days[$count] = -21;
			}}
		else if(($currentweek - $compareweek) == -1){
			for($count = 0; $count < 7; $count++){
				$days[$count] = +7;
			}
			}
		else if(($currentweek - $compareweek) == -2){
			for($count = 0; $count < 7; $count++){
				$days[$count] = +14;
			}
		}
		else if(($currentweek - $compareweek) == 3){
			for($count = 0; $count < 7; $count++){
				$days[$count] = +21;
			}
		}
		
		
		$dotw = date('l');
		$dag = array();
		if($dotw == "Monday"){ 
			$dag[0] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[0]), date("Y")));
			$dag[1] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[1] + 1), date("Y")));
			$dag[2] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[2] + 2), date("Y")));
			$dag[3] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[3] + 3), date("Y")));
			$dag[4] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[4] + 4), date("Y")));
			$dag[5] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[5] + 5), date("Y")));
			$dag[6] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[6] + 6), date("Y")));
		}
		if($dotw == "Tuesday"){ 
			$dag[0] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[0] - 1), date("Y")));
			$dag[1] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[1]), date("Y")));
			$dag[2] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[2] + 1), date("Y")));
			$dag[3] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[3] + 2), date("Y")));
			$dag[4] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[4] + 3), date("Y")));
			$dag[5] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[5] + 4), date("Y")));
			$dag[6] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[6] + 5), date("Y")));
		}
		if($dotw == "Wednesday"){ 
			$dag[0] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[0] - 2), date("Y")));
			$dag[1] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[1] - 1), date("Y")));
			$dag[2] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[2]), date("Y")));
			$dag[3] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[3] + 1), date("Y")));
			$dag[4] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[4] + 2), date("Y")));
			$dag[5] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[5] + 3), date("Y")));
			$dag[6] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[6] + 4), date("Y")));
		}
		else if($dotw == "Thursday"){
			$dag[0] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[0] - 3), date("Y")));
			$dag[1] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[1] - 2), date("Y")));
			$dag[2] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[2] - 1), date("Y")));
			$dag[3] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[3]), date("Y")));
			$dag[4] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[4] + 0), date("Y")));
			$dag[5] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[5] + 1), date("Y")));
			$dag[6] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[6] + 2), date("Y")));
		}
		else if($dotw == "Friday"){
			$dag[0] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[0] - 4), date("Y")));
			$dag[1] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[1] - 3), date("Y")));
			$dag[2] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[2] - 2), date("Y")));
			$dag[3] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[3] - 1), date("Y")));
			$dag[4] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[4]), date("Y")));
			$dag[5] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[5] + 1), date("Y")));
			$dag[6] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[6] + 2), date("Y")));
		}
		else if($dotw == "Saturday"){
			$dag[0] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[0] - 5), date("Y")));
			$dag[1] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[1] - 4), date("Y")));
			$dag[2] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[2] - 3), date("Y")));
			$dag[3] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[3] - 2), date("Y")));
			$dag[4] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[4] - 1), date("Y")));
			$dag[5] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[5]), date("Y")));
			$dag[6] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[6] + 1), date("Y")));
		}
		else if($dotw == "Sunday"){
			$dag[0] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[0] - 6), date("Y")));
			$dag[1] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[1] - 5), date("Y")));
			$dag[2] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[2] - 4), date("Y")));
			$dag[3] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[3] - 3), date("Y")));
			$dag[4] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[4] - 2), date("Y")));
			$dag[5] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[5] - 1), date("Y")));
			$dag[6] = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+($days[6]), date("Y")));
		}
		
		$week1 = (int)$week;
		$workers = array();
		$result = $database -> doRows("SELECT * FROM SCHEDULE_DAYS WHERE WEEK_NR = '".$week1."'");
		for($count = 0; $count < count($result); $count++){
			$values['DATUM'] = $result[$count]['DATE'];
			$start = $database -> doQuery("SELECT TIME_START FROM SCHEDULE_HOURS WHERE DATE = '".$result[$count]['DATE']."' AND USER_ID = '".$result[$count]['USER_ID']."'");
			$values['START'] = $start['TIME_START'];
			$einde = $database -> doQuery("SELECT TIME_END FROM SCHEDULE_HOURS WHERE DATE = '".$result[$count]['DATE']."' AND USER_ID = '".$result[$count]['USER_ID']."'"); 
			$values['EIND'] = $einde['TIME_END'];
			$values['NAME'] = $database -> doQuery("SELECT NAME FROM EMPLOYEE WHERE USER_ID = '".$result[$count]['USER_ID']."'");
			var_dump($values);
			$workers[$count] = $values;
		}
		(string)$clemens = '<td class="day_td"></td>';
		(string)$pijke = '<td class="day_td"></td>';
		(string)$jeroen = '<td class="day_td"></td>';
		(string)$roy = '<td class="day_td"></td>';
		(string)$patricia = '<td class="day_td"></td>';
		$amb1 = "";
		$amb2 = "";
		  
		for($count = 0; $count < count($workers); $count++){
			var_dump($workers[$count]);
			echo "<br />".$workers[$count]['DATUM'];
			$table = '';
			$table1 = '';
			$table2 = '';
			$table3 = '';
			$table4 = '';
			$table5 = '';
			$table6 = '';			
			if($dag[0] == $workers[$count]['DATUM']){	
				echo "1";
				if($workers[$count]['NAME'] == "Clemens"){
					$clemens = '<td class="day_td">'.$workers[$count]["START"].'</td>';
				}
				if($workers[$count]['NAME'] == "Pijke"){
					$pijke = '<td class="day_td">'.$workers[$count]["START"].'</td>';					
				}
				if($workers[$count]['NAME'] == "Jeroen"){
					$jeroen ='<td class="day_td">'.$workers[$count]["START"].'</td>';					
				}
				if($workers[$count]['NAME'] == "Roy"){
					$roy = '<td class="day_td">'.$workers[$count]["START"].'</td>';					
				}
				if($workers[$count]['NAME'] == "Patricia"){
					$patricia = '<td class="day_td">'.$workers[$count]["START"].'</td>';					
				}
				if($count = count($workers)){
					$table = $header.'<tr><td class="date_td">'.$dag[0].'</td><td class="day_td">maandag</td>'.$clemens.$pijke.$jeroen.$roy.$patricia.'<td class="day_td"></td><td class="day_td"></td></tr>';

				}
				
			}
			else if($dag[1] == $workers[$count]['DATUM']){
				echo "2";
				if($workers[$count]['NAME'] == "Clemens"){
					$clemens = '<td class="day_td">'.$workers[$count]["START"].'</td>';
				}
				if($workers[$count]['NAME'] == "Pijke"){
					$pijke = '<td class="day_td">'.$workers[$count]["START"].'</td>';					
				}
				if($workers[$count]['NAME'] == "Jeroen"){
					$jeroen ='<td class="day_td">'.$workers[$count]["START"].'</td>';					
				}
				if($workers[$count]['NAME'] == "Roy"){
					$roy = '<td class="day_td">'.$workers[$count]["START"].'</td>';					
				}
				if($workers[$count]['NAME'] == "Patricia"){
					$patricia = '<td class="day_td">'.$workers[$count]["START"].'</td>';					
				}
				if($count = count($workers)){
					$table1 = $header.'<tr><td class="date_td">'.$dag[1].'</td><td class="day_td">dinsdag</td>'.$clemens.$pijke.$jeroen.$roy.$patricia.'<td class="day_td"></td><td class="day_td"></td></tr>';

				}
				
			}
			
			
		}
			/*
			<tr>
				<td class="date_td">'.$dag[1].'</td>
				<td class="day_td">dinsdag</td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>				
			</tr>
			<tr>
				<td class="date_td">'.$dag[2].'</td>
				<td class="day_td">woensdag</td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>				
			</tr>
			<tr>
				<td class="date_td">'.$dag[3].'</td>
				<td class="day_td">donderdag</td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>				
			</tr>
			<tr>
				<td class="date_td">'.$dag[4].'</td>
				<td class="day_td">vrijdag</td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>				
			</tr>
			<tr>
				<td class="date_td">'.$dag[5].'</td>
				<td class="day_td">zaterdag</td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>				
			</tr>
			<tr>
				<td class="date_td">'.$dag[6].'</td>
				<td class="day_td">zondag</td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>
				<td class="day_td"></td>				
			</tr>';*/
			(string)$return_table = $table.$table1;
			echo $table;
			echo "<br />";
			echo $table1;
			echo "<br />";
			echo $return_table;
			return $return_table;
		
	}
				
		
}	
?>
