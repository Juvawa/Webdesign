<?php
   $start = "16:05:00";
   $end = "01:45:00";
	$format = "%H:%M:%S";
	$startshift = strptime($start, $format);
	$endshift = strptime($end, $format);
	
	echo "Start: " . $start ." <br />";
	echo "Eind: " . $end ." <br /><br />";
	echo "Start Sec: " . $startshift['tm_sec'] ." <br />";
	echo "Start Min: " . $startshift['tm_min'] ." <br />";
	echo "Start Uur: " . $startshift['tm_hour'] ." <br />";
	echo "Eind Sec: " . $endshift['tm_sec'] ." <br />";
	echo "Eind Min: " . $endshift['tm_min'] ." <br />";
	echo "Eind Uur: " . $endshift['tm_hour'] ." <br />";
	
	if($endshift['tm_hour'] > 0 && $endshift['tm_hour'] < 7) /* 7 is hier het omslagpunt,
																				 * evt in de database stoppen en
																				 * configureerbaar maken?
																				 */
	{
		$endshift['tm_hour'] = $endshift['tm_hour'] + 24; 
	}
	(int)$workhour = $endshift['tm_hour'] - $startshift['tm_hour'];
	
	/* Start Defining different possibilities */
	if($startshift['tm_min'] == 0 && $endshift['tm_min'] > 0)
	{
		(int)$workminute = 60-$endshift['tm_min'];
	}
	elseif($startshift['tm_min'] > 0 && $startshift['tm_min'] < $endshift['tm_min'])
	{
		(int)$workminute = abs($startshift['tm_min'] - $endshift['tm_min']);
	}
	elseif($startshift['tm_min'] > 0 && $startshift > $endshift['tm_min'])
	{
		$workhour = $workhour - 1;
		(int)$workminute = 60 - ($startshift['tm_min'] - $endshift['tm_min']);
	}
	elseif($startshift['tm_min'] > 0 && $endshift['tm_min'] == 0)
	{
		(int)$workminute = $startshift['tm_min'];
	}
	elseif($startshift['tm_min'] == $endshift['tm_min'])
	{
		(int)$workminute = 0;
	}
	
	$totalminutes = ($workhour * 60) + $workminute;
	
	echo "<br />Aantal te werken uren: " . $workhour;
	echo "<br />Aantal te werken minuten: " . $workminute;
	echo "<br />Totaal gewerkte minuten: ". $totalminutes;
?>
