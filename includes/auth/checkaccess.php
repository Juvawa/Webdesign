<?php
/*
 * Check Required User Accesslevel
 * file: checkaccess.php
 * location: <document root>/includes/auth/
 * 
 * author: Cas van der Weegen
 */
class checkAccess
{
	function checkLevel($level)
	{
		if(isset($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			echo "
			<html>
			<head>
			<script type=\"text/javascript\">
			alert(\"An unknown error occurred!, please contact the system administrator.\");
			location = \"index.php\";
			</script>
			</head>
			<body>
			</body>
			</html>
			";
			exit;
		}
		
		$database = new Database();
      if($result = $database->doQuery("SELECT LEVEL FROM CLEARANCE WHERE USER_ID ='$userid' LIMIT 1"))
      {
			if($level >= $result['LEVEL'])
			{}
			else
			{	
				echo "
				<html>
				<head>
				<script type=\"text/javascript\">
				alert(\"You do not have sufficient clearance to access this page!, please contact the system administrator.\");
				location = \"index.php\";
				</script>
				</head>
				<body>
				</body>
				</html>
				";
				exit;
			}
		}
		else
		{
			echo "
				<html>
				<head>
				<script type=\"text/javascript\">
				alert(\"You do not have sufficient clearance to access this page!, please contact the system administrator.\");
				location = \"index.php\";
				</script>
				</head>
				<body>
				</body>
				</html>
				";
				exit;
		}
	}
	
	function adminButton()
	{
		if(isset($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = NULL;
		}
		$database = new Database();
      if($result = $database->doQuery("SELECT LEVEL FROM CLEARANCE WHERE USER_ID ='$userid' LIMIT 1"))
      {
			echo "<a href=\"admin.php\" /><img src=\"images/admin_button.png\" alt=\"Admin Page\" /></a>";
		}
	}
}
?>