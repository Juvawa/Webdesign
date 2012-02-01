<?php
	require('includes/firststage.php');
	
	$database = new Database();
	$result = $database -> doRows("SELECT EMAIL FROM EMPLOYEE");
	$result2 = $database -> doQuery("SELECT EMAIL FROM EMPLOYEE WHERE USER_ID = '".$_SESSION['userid']."' LIMIT 1");
	
	for($i = 0; $i < count($result); $i++) {
		if($result[$i]['EMAIL'] == $_GET['email'] && ($_GET['email'] != $result2['0'])) {
			echo "This email is already in use";
		}
	}

?>