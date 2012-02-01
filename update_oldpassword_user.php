<?php
	require('includes/firststage.php');
	
	$database = new Database();
	$result = $database -> doQuery("SELECT PASSWORD FROM EMPLOYEE WHERE USER_ID = '".$_SESSION['userid']."' LIMIT 1");
	
	for($i = 0; $i < count($result); $i++) {
		if($result['PASSWORD'] == $_GET['oldpassword']) {
			echo "Given password does not match the database";
		}
	}

?>