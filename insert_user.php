<?php
/*
 * User registration query
 * file: insert_user.php
 * location: <document root>/
 * 
 * author: Justin van Wageningen
 */
require('includes/db/connect.php');
require('includes/db/config.php');

$db = new Database();

$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$loginname = $_POST['username'];
$pw = $_POST['password'];
$hashpassword = sha1($pw);

//DATE IN SQL FORMAT (DD-MM-YYYY -> YYYY-MM-DD)
$dob_uncut = $_POST['dob'];
$dob_array = explode("-", $dob_uncut);
$dob = $dob_array[2] . "-" . $dob_array[1] . "-" . $dob_array[0];

//CONNECT TO INSERT
$con = $db -> connect($host, $username, $password);
mysql_select_db($database, $con);

mysql_query("INSERT INTO EMPLOYEE VALUES (NULL, '$name', '$surname', '$dob', '$phone', '$email', '$loginname', '$hashpassword', '0', NULL, 'NO', 'NO')");

$db -> disconnect($con);
//DISCONNECT AFTER INSERT

//GET USER_ID FROM THE JUST REGISTRED USER
$userid = $db -> doQuery("SELECT USER_ID FROM EMPLOYEE WHERE USERNAME = '$loginname'");

//CONNECT TO INSERT DEFAULT PREFERENCES
$con = $db -> connect($host, $username, $password);
mysql_select_db($database, $con);

$days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY');

foreach($days as $value)
{
	mysql_query("INSERT INTO USER_PREFERENCES VALUES('".$userid['0']."', '$value', '00:00:00', '00:00:00', 'NO')");
}
$db -> disconnect($con);
//DISCONNECT AFTER INSERT
?>