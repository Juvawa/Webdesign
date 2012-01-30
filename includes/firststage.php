<?php
/*
 * First Stage
 * file: firststage.php
 * location: <document root>/includes/
 * 
 * author: Cas van der Weegen
 */
// ENABLE ERROR REPORTING
error_reporting(E_ALL);
ini_set('display_errors', '1');

// FORCE HTTPS   
if($_SERVER["HTTPS"] != "on")
{
   header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
   exit();
}
   
// INITIATE FIRST STAGE INCLUDES
   // DATABASE
   require('includes/db/connect.php');
   
   // AUTHENTICATION
   require('includes/auth/login.php');
   
   // INCLUDE ADMIN
   require('includes/auth/checkaccess.php');
   
   // CHECK IF SESSION IS STARTED
   if(!isset($_SESSION['username']) && !isset($_SESSION['userid']))
   {
   session_start();
   }
   
// OTHER INCLUDES
   // ROSTER DISPLAY
  // require('includes/roster/views.php');

?>