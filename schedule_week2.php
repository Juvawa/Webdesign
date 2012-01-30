<?php require('includes/firststage.php'); ?>
<html>
<head>
<link href="/includes/layout/css/schedule_week.css" rel="stylesheet" type="text/css" />
</head>
<title></title>
<body>
<div class="container">

	<div class="header">
		<div class="weeknr">
			week 40
		</div>
		<div class="login">
			<form>
				gebruikersnaam :<input type="text" name="firstname" /><br />
				wachtwoord :<input type="text" name="lastname" />
			</form>
		</div>
		<div class="day">
			maandag 11-11-11
		</div>
	</div>

	<div class="body">
		
		<div class="day_week">
			<table class="week_table">
				<tr>
					<td class="day_td_monday">maandag</td><td class="day_td">dinsdag</td><td class="day_td">woensdag</td><td class="day_td">donderdag</td><td class="day_td">vrijdag</td><td class="day_td">zaterdag</td><td class="day_td_sunday">zondag</td>
				</tr>
			</table>
		</div>
		<?php
			
			$day = date('l');
			/*if($day == "Monday"){
				$date = date("Y-m-d");
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+6, date("Y")));
				$result1 = $test1 -> getEmployees($date);
				echo "<div class=\"grid\">
						<div class=\"monday\">".$result."</div>
						<div class=\"tuesday\">".getEmployees($date1)."</div>
						<div class=\"wednesday\">".getEmployees($date2)."</div>
						<div class=\"thursday\">".getEmployees($date3)."</div>
						<div class=\"friday\">".getEmployees($date4)."</div>
						<div class=\"saturday\">".getEmployees($date5)."</div>
						<div class=\"sunday\">".getEmployees($date6)."</div>						
					</div>";
		
			}
			if($day == "Tuesday"){
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")));
				echo "<div class=\"grid\">
						<div class=\"monday\">".getEmployees($date)."</div>
						<div class=\"tuesday\">".getEmployees($date1)."</div>
						<div class=\"wednesday\">".getEmployees($date2)."</div>
						<div class=\"thursday\">".getEmployees($date3)."</div>
						<div class=\"friday\">".getEmployees($date4)."</div>
						<div class=\"saturday\">".getEmployees($date5)."</div>
						<div class=\"sunday\">".getEmployees($date6)."</div>						
					</div>";
			
			}*/
			if($day == "Wednesday"){
				require('test.php');
				$test1 = new Testen();				
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")));
				$result = $test1 -> createWeek($date);
				$result1 = $test1 -> createWeek($date1);
				$result2 = $test1 -> createWeek($date2);
				$result3 = $test1 -> createWeek($date3);
				$result4 = $test1 -> createWeek($date4);
				$result5 = $test1 -> createWeek($date5);
				$result6 = $test1 -> createWeek($date6);
				echo "<div class=\"grid\">
						<div class=\"monday_solid\"><div class=\"monday\">".$result."</div></div>
						<div class=\"tuesday_solid\"><div class=\"tuesday\">".$result1."</div></div>
						<div class=\"wednesday_solid\"><div class=\"wednesday\">".$result2."</div></div>
						<div class=\"thursday_solid\"><div class=\"thursday\">".$result3."</div></div>
						<div class=\"friday_solid\"><div class=\"friday\">".$result4."</div></div>
						<div class=\"saturday_solid\"><div class=\"saturday\">".$result5."</div></div>
						<div class=\"sunday_solid\"><div class=\"sunday\">".$result6."</div></div>			
					</div>";
			
			}
			if($day == "Thursday"){
				require('test.php');
				$test1 = new Testen();
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
				$result = $test1 -> createWeek($date);
				$result1 = $test1 -> createWeek($date1);
				$result2 = $test1 -> createWeek($date2);
				$result3 = $test1 -> createWeek($date3);
				$result4 = $test1 -> createWeek($date4);
				$result5 = $test1 -> createWeek($date5);
				$result6 = $test1 -> createWeek($date6);
				echo "<div class=\"grid\">
						<div class=\"monday_solid\"><div class=\"monday\">".$result."</div></div>
						<div class=\"tuesday_solid\"><div class=\"tuesday\">".$result1."</div></div>
						<div class=\"wednesday_solid\"><div class=\"wednesday\">".$result2."</div></div>
						<div class=\"thursday_solid\"><div class=\"thursday\">".$result3."</div></div>
						<div class=\"friday_solid\"><div class=\"friday\">".$result4."</div></div>
						<div class=\"saturday_solid\"><div class=\"saturday\">".$result5."</div></div>
						<div class=\"sunday_solid\"><div class=\"sunday\">".$result6."</div></div>			
					</div>";
			
			
			}
			if($day == "Friday"){
				require('test.php');
				$test1 = new Testen();
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-4, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$result = $test1 -> createWeek($date);
				$result1 = $test1 -> createWeek($date1);
				$result2 = $test1 -> createWeek($date2);
				$result3 = $test1 -> createWeek($date3);
				$result4 = $test1 -> createWeek($date4);
				$result5 = $test1 -> createWeek($date5);
				$result6 = $test1 -> createWeek($date6);
				echo "<div class=\"grid\">
						<div class=\"monday\">".$result."</div>
						<div class=\"tuesday\">".$result1."</div>
						<div class=\"wednesday\">".$result2."</div>
						<div class=\"thursday\">".$result3."</div>
						<div class=\"friday\">".$result4."</div>
						<div class=\"saturday\">".$result5."</div>
						<div class=\"sunday\">".$result6."</div>						
					</div>";
			
			}/*
			if($day == "Saturday"){
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-5, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-4, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				echo "<div class=\"grid\">
						<div class=\"monday\">".getEmployees($date)."</div>
						<div class=\"tuesday\">".getEmployees($date1)."</div>
						<div class=\"wednesday\">".getEmployees($date2)."</div>
						<div class=\"thursday\">".getEmployees($date3)."</div>
						<div class=\"friday\">".getEmployees($date4)."</div>
						<div class=\"saturday\">".getEmployees($date5)."</div>
						<div class=\"sunday\">".getEmployees($date6)."</div>						
					</div>";
			
			}
			if($day == "Sunday"){
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-6, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-5, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-4, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				echo "<div class=\"grid\">
						<div class=\"monday\">".getEmployees($date)."</div>
						<div class=\"tuesday\">".getEmployees($date1)."</div>
						<div class=\"wednesday\">".getEmployees($date2)."</div>
						<div class=\"thursday\">".getEmployees($date3)."</div>
						<div class=\"friday\">".getEmployees($date4)."</div>
						<div class=\"saturday\">".getEmployees($date5)."</div>
						<div class=\"sunday\">".getEmployees($date6)."</div>						
					</div>";
			}*/		
		?>
		<div class="time">
			16:00<br />
			<br />
			------<br />
			<br />
			18:00<br />
			<br />
			------<br />
			<br />
			20:00<br />
			<br />
			------<br />
			<br />
			22:00<br />
			<br />
			------<br />
			<br />
			00:00<br />
			<br />
			------<br />	
			<br />
			02:00<br />
		</div>
			
	</div>
</div>
</body>
</html>