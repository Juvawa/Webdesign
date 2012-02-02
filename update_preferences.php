<?php
/*
 * Administrator exception confirmation
 * file: confirm_exception.php
 * location: <document root>/
 * 
 * author: Justin van Wageningen
 */

require('includes/db/connect.php');
require('includes/db/config.php');
 
$db = new Database();
 
$con = $db -> connect($host, $username, $password);
mysql_select_db($database, $con);

$days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY');
$count = 0;

foreach($days as $value)
{
	$start_counter = "startday"  . $count;
	$end_counter = "endday" . $count;
	$radio_counter = "radio" . $count;
	print_r($_POST[$start_counter] . "-" . $_POST[$end_counter] . "-" . $_POST[$radio_counter] . "-");
	mysql_query("UPDATE USER_PREFERENCES SET TIME_START='".$_POST[$start_counter]."', TIME_END='".$_POST[$end_counter]."', AVAILABLE='".$_POST[$radio_counter]."' WHERE USER_ID = '".$_POST['userid']."' AND DAY='$value'");
	$count++;
}

$db -> disconnect($con);
 
?>