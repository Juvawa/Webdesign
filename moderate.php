<?php

require('includes/directcall.php');

$database = new Database();

$name = $_POST['name'];
$surname = $_POST['surname'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$hours = $_POST['hours'];

$result = $database -> doQuery("UPDATE `EMPLOYEE` SET `NAME`='$name',`SURNAME`='$surname,`DOB`='$dob',`PHONE`='$phone',`EMAIL`='$email',`USERNAME`='$username',`PASSWORD`='$password',`HOURS`='$hours\' WHERE USER_ID = ".$_SESSION['userid']."\"");

?>