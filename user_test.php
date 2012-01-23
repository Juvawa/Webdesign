<?php
	require('includes/firststage.php');
	
	$database = new Database();
	$result = $database -> doRows("SELECT USERNAME FROM EMPLOYEE");
	
	for($i = 0; $i < count($result); $i++) {
		if($result[$i]['USERNAME'] == $_GET['username']) {
			echo "This username is already in use";
		}
	}

?>