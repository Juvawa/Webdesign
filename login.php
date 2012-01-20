<?php
/*
 * Login
 * file: login.php
 * location: <document root>/
 * 
 * author: Cas van der Weegen
 */
if($_SERVER['PHP_SELF'] != '/index.php')
{
		require('includes/firststage.php');		
}

if(isset($_POST["username"]) && isset($_POST["password"]))
{
		if(empty($_POST["username"]) && empty($_POST["password"]))
		{
				header('location:index.php?page=login.php');
		}
		else
		{
				$newlogin = new loginProcess();
				$newlogin->doProcess($_POST["username"], $_POST["password"]);	
		}
		
}
else
{
		echo "<div style=\"vertical-align: middle; text-align: center;\"Please enter your credentials<br /><br />";
		require('includes/layout/loginbox.php');
		echo "</div>";
}
?>