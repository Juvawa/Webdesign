<?php
/*
 * Update user details by Administrator
 * file: update_user_details_admin.php
 * location: <document root>/
 * 
 * author: Justin van Wageningen
 */

require('includes/db/connect.php');
require('includes/db/config.php');
require('includes/roster/req.php');

$db = new Database();

$name = $_POST['name'];
$surname = $_POST['surname'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$hours = $_POST['hours'];
$active = $_POST['active'];
$confirmed = $_POST['confirmed'];
$id = $_POST['userid'];

//REQUIRED TO DETERMINE WHICH AREAS ARE SET
$rosterRequest = new rosterRequest();
$nr_of_areas = $rosterRequest -> reqAreas();

$areas = 0;
$number = 1;
for($c = 0; $c < count($nr_of_areas); $c++)
{
	$counter = "check" . $number;
	if(isset($_POST[$counter]))
	{
		$areas = $areas + $_POST[$counter];
		$number = $number * 2;
	}
	else
	{
		$number = $number * 2;
	}
}
//END OF DETERMINATION

//CONNECT TO UPDATE USER DETAILS 
$con = $db -> connect($host, $username, $password);
mysql_select_db($database, $con);

mysql_query("UPDATE EMPLOYEE SET NAME = '$name', SURNAME = '$surname', DOB='$dob', PHONE='$phone', HOURS='$hours', AREAS='$areas', ACTIVE='$active', CONFIRMED='$confirmed' WHERE USER_ID='$id'");

$db -> disconnect($con);
//DISCONNECT AFTER UPDATE
?>