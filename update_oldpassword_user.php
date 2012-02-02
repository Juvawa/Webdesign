<?php
	require('includes/firststage.php');
	
	$database = new Database();
	$result = $database -> doQuery("SELECT PASSWORD FROM EMPLOYEE WHERE USER_ID = '".$_SESSION['userid']."' LIMIT 1");
	
	if($result['PASSWORD'] != sha1($_GET['oldpassword'])) {
		echo "Password does not match the database";
	}

?>