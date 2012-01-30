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
			if($day == "Monday"){
			}
			if($day == "Tuesday"){
							
			}
			if($day == "Wednesday"){
				
				
			}
			if($day == "Thursday"){
			require('test.php');
				$test1 = new Testen();
				$result = $test1 -> createWeekPersonal();
				
			}
			if($day == "Friday"){
				
			}
			if($day == "Saturday"){
				
			}
			if($day == "Sunday"){
				
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
			
	</div>
</div>
</body>
</html>