<?php
/*
 * Update login details by User
 * file: update_login_details.php
 * location: <document root>/
 * 
 * author: Justin van Wageningen
 */
 
require('includes/db/connect.php');
require('includes/db/config.php');
 
$db = new Database();
 
$con = $db -> connect($host, $username, $password);
mysql_select_db($database, $con);

$id = $_POST['userid'];
$username = $_POST['username'];
$pw = $_POST['password'];
$hashpassword = sha1($pw);

mysql_query("UPDATE `EMPLOYEE` SET USERNAME='$username', PASSWORD='$hashpassword' WHERE `USER_ID` = '$id'") or die(mysql_error());

$db -> disconnect($con);
 
 ?>