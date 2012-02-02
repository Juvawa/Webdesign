<?php
/*
 * Header
 * file: header.php
 * location: <document root>/includes/layout/
 * 
 * author: Cas van der Weegen & Casper van der Poll
 */
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html>
<head>
<link href=\"includes/layout/css/schedule_week.css\" rel=\"stylesheet\" type=\"text/css\" />
<script	type=\"text/javascript\" src=\"includes/layout/js/checkDob.js\"></script>
<script type=\"text/javascript\" src=\"includes/layout/js/checkForm.js\"></script>
<script type=\"text/javascript\" src=\"includes/layout/js/doUpdate.js\"></script>
<script type=\"text/javascript\" src=\"includes/layout/js/checkPreferences.js\"></script>
</head>
<title></title>
<body>
<div class=\"container\">

	<div class=\"header\">
		<div class=\"weeknr\">
			Week ".date('W')."
		</div>
		<div class=\"login\">
      ";
         include('loginbox.php');
      echo "
		</div><br />
		<div class=\"day\">
			".date('l \t\h\e jS')."
		</div>
	</div>

	<div class=\"body\">
	";
	if(isset($_SESSION['username']) && isset($_SESSION['userid']))
	{
		echo "
			<div style=\"text-align: right; margin-right: 1px;\" />
				<a href=\"index.php?page=view_roster.php&view=day\" alt=\"view per day\" /><img src=\"images/day_button.png\" alt=\"Per Day\" /></a>
				<a href=\"index.php?page=view_roster.php&view=week\" alt=\"view per week\" /><img src=\"images/week_button.png\" alt=\"Per Week\" /></a>
				<a href=\"index.php?page=view_roster.php&view=month\" alt=\"view per month\" /><img src=\"images/month_button.png\" alt=\"Per Month\" /></a>
				<a href=\"index.php?page=view_roster.php&view=personal\" alt=\"personal overview\" /><img src=\"images/personal_button.png\" alt=\"Personal\" /></a>
				";
			$checkButton = new checkAccess();
			$checkButton->adminButton();
		echo "
		</div>
			";
	}
?>