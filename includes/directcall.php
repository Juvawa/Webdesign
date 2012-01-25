<?php
/*
 * Direct Call Fetch
 * file: directcall.php
 * location: <document root>/includes/
 * 
 * author: Cas van der Weegen
 */
if($_SERVER['PHP_SELF'] != '/index.php')
{
   $location = trim($_SERVER['PHP_SELF'], '/');
   header("location:index.php?page=$location");
}
?>