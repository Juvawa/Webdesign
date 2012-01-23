<?php
	require('includes/firststage.php');
	
	$database = new Database();
	$result = $database -> doRows("SELECT USERNAME FROM EMPLOYEE");
	
	for($i = 0; $i < count($result); $i++) {
		echo $result[$i]['USERNAME'] . "\n";
	}

?>