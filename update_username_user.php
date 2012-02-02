<?php
	require('includes/firststage.php');
	
	$database = new Database();
	$result = $database -> doRows("SELECT USERNAME FROM EMPLOYEE");
	$result2 = $database -> doQuery("SELECT USERNAME FROM EMPLOYEE WHERE USER_ID = '".$_SESSION['userid']."' LIMIT 1");
	
	for($i = 0; $i < count($result); $i++) {
		if($result[$i]['USERNAME'] == $_GET['username'] && ($result2['USERNAME'] != $_GET['username'])) {
			echo "This username is already in use";
		}
	}

?>