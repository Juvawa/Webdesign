<?php
/*
 * Schedule Personal Buildup
 * file: schedule_week_personal.php
 * location: <document root>/includes/roster/schedule_week_personal.php
 * 
 * author: Casper van der Poll
 */
?>
		<div class="day_week">
			<table class="week_table">
				<tr>
					<td class="day_td_monday">maandag</td><td class="day_td">dinsdag</td><td class="day_td">woensdag</td><td class="day_td">donderdag</td><td class="day_td">vrijdag</td><td class="day_td">zaterdag</td><td class="day_td_sunday">zondag</td>
				</tr>
			</table>
		</div>
		<?php
			require('schedule.php');
			$day = date('l');
			if($day == "Monday"){
				$test1 = new Schedule();
				$date = date("Y-m-d");
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+6, date("Y")));
				$result = $test1 -> personalQuery($date);
				$result1 = $test1 -> personalQuery($date1);
				$result2 = $test1 -> personalQuery($date2);
				$result3 = $test1 -> personalQuery($date3);
				$result4 = $test1 -> personalQuery($date4);
				$result5 = $test1 -> personalQuery($date5);
				$result6 = $test1 -> personalQuery($date6);
				echo "<div class=\"grid\">
						<div class=\"monday_solid\"><div class=\"monday_personal\">".$result."</div></div>
						<div class=\"tuesday_solid\"><div class=\"tuesday_personal\">".$result1."</div></div>
						<div class=\"wednesday_solid\"><div class=\"wednesday_personal\">".$result2."</div></div>
						<div class=\"thursday_solid\"><div class=\"thursday_personal\">".$result3."</div></div>
						<div class=\"friday_solid\"><div class=\"friday_personal\">".$result4."</div></div>
						<div class=\"saturday_solid\"><div class=\"saturday_personal\">".$result5."</div></div>
						<div class=\"sunday_solid\"><div class=\"sunday_personal\">".$result6."</div></div>			
					</div>";
				
			}
			if($day == "Tuesday"){
				$test1 = new Schedule();								
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")));
				$result = $test1 -> personalQuery($date);
				$result1 = $test1 -> personalQuery($date1);
				$result2 = $test1 -> personalQuery($date2);
				$result3 = $test1 -> personalQuery($date3);
				$result4 = $test1 -> personalQuery($date4);
				$result5 = $test1 -> personalQuery($date5);
				$result6 = $test1 -> personalQuery($date6);
				echo "<div class=\"grid\">
						<div class=\"monday_solid\"><div class=\"monday_personal\">".$result."</div></div>
						<div class=\"tuesday_solid\"><div class=\"tuesday_personal\">".$result1."</div></div>
						<div class=\"wednesday_solid\"><div class=\"wednesday_personal\">".$result2."</div></div>
						<div class=\"thursday_solid\"><div class=\"thursday_personal\">".$result3."</div></div>
						<div class=\"friday_solid\"><div class=\"friday_personal\">".$result4."</div></div>
						<div class=\"saturday_solid\"><div class=\"saturday_personal\">".$result5."</div></div>
						<div class=\"sunday_solid\"><div class=\"sunday_personal\">".$result6."</div></div>			
					</div>";
							
			}
			if($day == "Wednesday"){
				$test1 = new Schedule();				
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")));
				$result = $test1 -> personalQuery($date);
				$result1 = $test1 -> personalQuery($date1);
				$result2 = $test1 -> personalQuery($date2);
				$result3 = $test1 -> personalQuery($date3);
				$result4 = $test1 -> personalQuery($date4);
				$result5 = $test1 -> personalQuery($date5);
				$result6 = $test1 -> personalQuery($date6);
				echo "<div class=\"grid\">
						<div class=\"monday_solid\"><div class=\"monday_personal\">".$result."</div></div>
						<div class=\"tuesday_solid\"><div class=\"tuesday_personal\">".$result1."</div></div>
						<div class=\"wednesday_solid\"><div class=\"wednesday_personal\">".$result2."</div></div>
						<div class=\"thursday_solid\"><div class=\"thursday_personal\">".$result3."</div></div>
						<div class=\"friday_solid\"><div class=\"friday_personal\">".$result4."</div></div>
						<div class=\"saturday_solid\"><div class=\"saturday_personal\">".$result5."</div></div>
						<div class=\"sunday_solid\"><div class=\"sunday_personal\">".$result6."</div></div>			
					</div>";
			}
			if($day == "Thursday"){
			require('test.php');
				$test1 = new Schedule();
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
				$result = $test1 -> personalQuery($date);
				$result1 = $test1 -> personalQuery($date1);
				$result2 = $test1 -> personalQuery($date2);
				$result3 = $test1 -> personalQuery($date3);
				$result4 = $test1 -> personalQuery($date4);
				$result5 = $test1 -> personalQuery($date5);
				$result6 = $test1 -> personalQuery($date6);
				echo "<div class=\"grid\">
						<div class=\"monday_solid\"><div class=\"monday_personal\">".$result."</div></div>
						<div class=\"tuesday_solid\"><div class=\"tuesday_personal\">".$result1."</div></div>
						<div class=\"wednesday_solid\"><div class=\"wednesday_personal\">".$result2."</div></div>
						<div class=\"thursday_solid\"><div class=\"thursday_personal\">".$result3."</div></div>
						<div class=\"friday_solid\"><div class=\"friday_personal\">".$result4."</div></div>
						<div class=\"saturday_solid\"><div class=\"saturday_personal\">".$result5."</div></div>
						<div class=\"sunday_solid\"><div class=\"sunday_personal\">".$result6."</div></div>			
					</div>";
			}
			if($day == "Friday"){
				$test1 = new Schedule();
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-4, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
				$result = $test1 -> personalQuery($date);
				$result1 = $test1 -> personalQuery($date1);
				$result2 = $test1 -> personalQuery($date2);
				$result3 = $test1 -> personalQuery($date3);
				$result4 = $test1 -> personalQuery($date4);
				$result5 = $test1 -> personalQuery($date5);
				$result6 = $test1 -> personalQuery($date6);
				echo "<div class=\"grid\">
						<div class=\"monday_solid\"><div class=\"monday_personal\">".$result."</div></div>
						<div class=\"tuesday_solid\"><div class=\"tuesday_personal\">".$result1."</div></div>
						<div class=\"wednesday_solid\"><div class=\"wednesday_personal\">".$result2."</div></div>
						<div class=\"thursday_solid\"><div class=\"thursday_personal\">".$result3."</div></div>
						<div class=\"friday_solid\"><div class=\"friday_personal\">".$result4."</div></div>
						<div class=\"saturday_solid\"><div class=\"saturday_personal\">".$result5."</div></div>
						<div class=\"sunday_solid\"><div class=\"sunday_personal\">".$result6."</div></div>			
					</div>";
				
			}
			if($day == "Saturday"){
				$test1 = new Schedule();
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-5, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-4, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
				$result = $test1 -> personalQuery($date);
				$result1 = $test1 -> personalQuery($date1);
				$result2 = $test1 -> personalQuery($date2);
				$result3 = $test1 -> personalQuery($date3);
				$result4 = $test1 -> personalQuery($date4);
				$result5 = $test1 -> personalQuery($date5);
				$result6 = $test1 -> personalQuery($date6);
				echo "<div class=\"grid\">
						<div class=\"monday_solid\"><div class=\"monday_personal\">".$result."</div></div>
						<div class=\"tuesday_solid\"><div class=\"tuesday_personal\">".$result1."</div></div>
						<div class=\"wednesday_solid\"><div class=\"wednesday_personal\">".$result2."</div></div>
						<div class=\"thursday_solid\"><div class=\"thursday_personal\">".$result3."</div></div>
						<div class=\"friday_solid\"><div class=\"friday_personal\">".$result4."</div></div>
						<div class=\"saturday_solid\"><div class=\"saturday_personal\">".$result5."</div></div>
						<div class=\"sunday_solid\"><div class=\"sunday_personal\">".$result6."</div></div>			
					</div>";
				
			}
			if($day == "Sunday"){
				$test1 = new Schedule();
				$date =  date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-6, date("Y")));
				$date1 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-5, date("Y")));
				$date2 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-4, date("Y")));
				$date3 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
				$date4 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
				$date5 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
				$date6 = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				$result = $test1 -> personalQuery($date);
				$result1 = $test1 -> personalQuery($date1);
				$result2 = $test1 -> personalQuery($date2);
				$result3 = $test1 -> personalQuery($date3);
				$result4 = $test1 -> personalQuery($date4);
				$result5 = $test1 -> personalQuery($date5);
				$result6 = $test1 -> personalQuery($date6);
				echo "<div class=\"grid\">
						<div class=\"monday_solid\"><div class=\"monday_personal\">".$result."</div></div>
						<div class=\"tuesday_solid\"><div class=\"tuesday_personal\">".$result1."</div></div>
						<div class=\"wednesday_solid\"><div class=\"wednesday_personal\">".$result2."</div></div>
						<div class=\"thursday_solid\"><div class=\"thursday_personal\">".$result3."</div></div>
						<div class=\"friday_solid\"><div class=\"friday_personal\">".$result4."</div></div>
						<div class=\"saturday_solid\"><div class=\"saturday_personal\">".$result5."</div></div>
						<div class=\"sunday_solid\"><div class=\"sunday_personal\">".$result6."</div></div>			
					</div>";
				
			}		
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