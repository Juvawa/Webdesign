<?php
   $start = "16:00:00";
   $end = "01:00:00";
	$format = "%H:%M:%S";
	$startshift = strptime($start, $format);
	$endshift = strptime($end, $format);
	
	echo $startshift['tm_sec'] ." <br />";
	echo $startshift['tm_min'] ." <br />";
	echo $startshift['tm_hour'] ." <br />";
	echo $endshift['tm_sec'] ." <br />";
	echo $endshift['tm_min'] ." <br />";
	
	if($endshift['tm_hour'] > 0 && $endshift['tm_hour'] < 7)
	{
		$endshift['tm_hour'] = $endshift['tm_hour'] + 24; 
	}
	echo $endshift['tm_hour'] ." <br />";
	(int)$work = $endshift['tm_hour'] - $startshift['tm_hour'];
	echo "Aantal te werken uren: " . $work;
?>