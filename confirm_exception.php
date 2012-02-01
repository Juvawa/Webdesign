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

$confirmid = $_POST['confirmid'];
mysql_query("UPDATE `webdb1229`.`USER_EXCEPTIONS` SET `CONFIRMED` = 'YES' WHERE `USER_EXCEPTIONS`.`EXCEPTION_ID` = '$confirmid[0]'") or die(mysql_error());

$db -> disconnect($con);
 
?>