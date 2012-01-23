<?php
	require('includes/firststage.php');
	
	$database = new Database();
	$result = $database -> doRows("SELECT EMAIL FROM EMPLOYEE");
	
	for($i = 0; $i < count($result); $i++) {
		if($result[$i]['EMAIL'] == $_GET['email']) {
			echo "This email is already in use";
		}
	}

?>