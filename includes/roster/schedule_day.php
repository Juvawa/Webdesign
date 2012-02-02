<?php
/*
 * Schedule Personal Buildup
 * file: schedule_week_personal.php
 * location: <document root>/includes/roster/schedule_week_personal.php
 * 
 * author: Casper van der Poll
 */
?>
	
	<div class="horizontal_time">
		<table width="100%" class="horizontal_time_table">
			<tr>
				<td>16:00</td>
				<td>17:00</td>
				<td>18:00</td>
				<td>19:00</td>
				<td>20:00</td>
				<td>21:00</td>
				<td>22:00</td>
				<td>23:00</td>
				<td>00:00</td>
				<td>01:00</td>
				<td>02:00</td>
			</tr>
		</table>
	</div>
	<div class="grid2">
	<?php
		require('schedule.php');
		$schedule = new Schedule();
		$date = date("Y-m-d");
		$table = $schedule->dayQuery($date);
		echo "<table>".$table."</table>"
	?>
	</div>