<?php
/*
 * User registration query
 * file: user_req.php
 * location: <document root>/
 * 
 * author: Justin van Wageningen
 */
 error_reporting(E_ALL);
 ini_set('display_errors', '1');
 
 
 require('includes/db/connect.php');
 require('includes/auth/dohash.php');
 
 $database = new Database();
 $hash = new doHash(); 
 
 $password = $hash -> hash($_POST['password']);
 var_dump($password);
 
 $database -> doQuery("INSERT INTO EMPLOYEE (USER_ID, NAME, SURNAME, DOB, PHONE, EMAIL, USERNAME, PASSWORD, HOURS, AREAS, ACTIVE, CONFIRMED) VALUES ('NULL','".$_POST['name']."','".$_POST['surname']."','1991-01-24','".$_POST['phone']."','".$_POST['email']."','".$_POST['username']."','".$password."', '0', '', 'NO', 'NO'");
 
 var_dump($_POST);
 echo "You have been succesfully registred";
 
 ?>