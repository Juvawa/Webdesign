<?php
/*
 * Schedule Personal Buildup
 * file: schedule_week_personal.php
 * location: <document root>/includes/roster/schedule_week_personal.php
 * 
 * author: Casper van der Poll
 */
?>
<div class="grid2">
	
	<?php
		
		require('schedule.php');
		$schedule = new Schedule();
		$week = date("W");
		if(($week % 4) == 0){
			$week1 = date('W', mktime(0, 0, 0, date("m")  , date("d")+7, date("Y")));
			$week2 = date('W', mktime(0, 0, 0, date("m")  , date("d")+14, date("Y")));
			$week3 = date('W', mktime(0, 0, 0, date("m")  , date("d")+21, date("Y")));
			echo "<table>".$schedule->createTd($week)."</table>";
			echo "<table>".$schedule->createTd($week1)."</table>";
			echo "<table>".$schedule->createTd($week2)."</table>";
			echo "<table>".$schedule->createTd($week3)."</table>";
		
		}else if(($week % 4) == 2){
			$week1 = date('W', mktime(0, 0, 0, date("m")  , date("d")-7, date("Y")));
			$week2 = date('W', mktime(0, 0, 0, date("m")  , date("d")+7, date("Y")));
			$week3 = date('W', mktime(0, 0, 0, date("m")  , date("d")+14, date("Y")));
			echo "<table>".$schedule->createTd($week1)."</table>";
			echo "<table>".$schedule->createTd($week)."</table>";
			echo "<table>".$schedule->createTd($week2)."</table>";
			echo "<table>".$schedule->createTd($week3)."</table>";
		
		}else if(($week % 4) == 3){
			$week1 = date('W', mktime(0, 0, 0, date("m")  , date("d")-14, date("Y")));
			$week2 = date('W', mktime(0, 0, 0, date("m")  , date("d")-7, date("Y")));
			$week3 = date('W', mktime(0, 0, 0, date("m")  , date("d")+7, date("Y")));

			echo "<table>".$schedule->createTd($week1)."</table>";
			echo "<table>".$schedule->createTd($week2)."</table>";
			echo "<table>".$schedule->createTd($week)."</table>";
			echo "<table>".$schedule->createTd($week3)."</table>";
		
		}
		else if(($week % 4) == 1){
			$week1 = date('W', mktime(0, 0, 0, date("m")  , date("d")-21, date("Y")));
			$week2 = date('W', mktime(0, 0, 0, date("m")  , date("d")-14, date("Y")));
			$week3 = date('W', mktime(0, 0, 0, date("m")  , date("d")-7, date("Y")));
			echo "<table>".$schedule->createTd($week1)."</table>";
			echo "<table>".$schedule->createTd($week2)."</table>";
			echo "<table>".$schedule->createTd($week3)."</table>";
			echo "<table>".$schedule->createTd($week)."</table>";
		
		}
		
		
		
	?>
	</div>