<?php
/*
 * Admin Page
 * file: admin.php
 * location: <document root>/
 * 
 * author: Cas van der Weegen
 */
require('includes/directcall.php');

$doCheck = new checkAccess();
$doCheck->checkLevel('10');	// DEFINE ACCESS LEVEL REQUIRED TO ACCESS THIS PAGE

require('includes/roster/req.php');
echo "
<h1 style=\"text-align: center;\"> Administration Page </h1>
";
if(isset($_GET['adminpage']))
{
	if($_GET['adminpage'] == "users")
	{
		echo "<h2 style=\"text-align: center;\">Approve / Moderate Users</h2>";
		
		$rosterCheck = new rosterRequest();
		if(isset($_GET['confirmid']) || isset($_GET['disableid']) || isset($_GET['enableid']))
		{
			if(isset($_GET['confirmid'])){ $id = $_GET['confirmid']; }
			elseif(isset($_GET['enableid'])){ $id = $_GET['enableid']; }
			elseif(isset($_GET['disableid'])){ $id = $_GET['disableid']; }
			else{$id = NULL;}
			
			echo "<center><p style=\"color: #FF0000;\" />Are you sure you want to ";
			if(isset($_GET['confirmid'])){ echo "confirm"; }
			elseif(isset($_GET['enableid'])){ echo "enable"; }
			elseif(isset($_GET['disableid'])){ echo "disable"; }
			echo " the folowing user</p>";
			$result = $rosterCheck->reqUserByID($id);
			echo "
				<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
					<tr>
						<td>Username</td><td>".$result['USERNAME']."</td>
					</tr>
					<tr>
						<td>Name</td><td>".$result['NAME']."</td>
					</tr>
					<tr>
						<td>Surname</td><td>".$result['SURNAME']."</td>
					</tr>
					<tr>
						<td>Date of Birth</td><td>".$result['DOB']."</td>
					</tr>
					<tr>
						<td>E-Mail</td><td>".$result['EMAIL']."</td>
					</tr>
					<tr>
						<td>Phone</td><td>".$result['PHONE']."</td>
					</tr>
					<tr>
						<td>Hours</td><td>".$result['HOURS']."</td>
					</tr>
					<tr>
						<td colspan=\"2\" style=\"text-align: center;\"> Click to ";
						if(isset($_GET['confirmid'])){ echo "confirm"; }
						elseif(isset($_GET['enableid'])){ echo "enable"; }
						elseif(isset($_GET['disableid'])){ echo "disable"; }
						echo "</td>
					</tr>
				</table>
				</center>
					";
		}
		else
		{
			$result = $rosterCheck->viewUsers();
				
			echo "
			<table align=\"center\" border=\"1\" style=\"border-style: solid; border-width: 1px; width: 700px;\">
			<tr>
				<td>Username</td><td>Name</td><td>Surname</td><td>Date of Birth</td><td>E-Mail</td><td>Phone</td><td>Hours on Contract</td><td>Active?</td><td>Confirmed?</td>
			</tr>
			";
			for($count = 0; $count < count($result); $count++)
			{
				echo "<tr style=\"background-color: "; if($result[$count]['CONFIRMED'] == "NO"){echo "#FF0000;\"";}elseif($result[$count]['ACTIVE'] == "NO"){echo "#FFCC00;\"";}else{echo "#33FF00;\"";} echo ">
							<td style=\"text-align: center;\">".$result[$count]['USERNAME']."</td>
							<td style=\"text-align: center;\">".$result[$count]['NAME']."</td>
							<td style=\"text-align: center;\">".$result[$count]['SURNAME']."</td>
							<td style=\"text-align: center;\">".$result[$count]['DOB']."</td>
							<td style=\"text-align: center;\">".$result[$count]['EMAIL']."</td>
							<td style=\"text-align: center;\">0".$result[$count]['PHONE']."</td>
							<td style=\"text-align: center;\">".$result[$count]['HOURS']."</td>
							<td style=\"text-align: center;\">";
							if($result[$count]['ACTIVE'] == "YES")
							{
								echo $result[$count]['ACTIVE'] . " (<a href=\"index.php?page=".$_GET['page']."&adminpage=".$_GET['adminpage']."&disableid=".$result[$count]['USER_ID']."\" />DISABLE?</a>)";
							}
							elseif($result[$count]['ACTIVE'] == "NO")
							{
								echo $result[$count]['ACTIVE'] . " (<a href=\"index.php?page=".$_GET['page']."&adminpage=".$_GET['adminpage']."&enableid=".$result[$count]['USER_ID']."\" />ENABLE?</a>)";
							}
				echo "</td>
							<td style=\"text-align: center;\">";
							if($result[$count]['CONFIRMED'] == "YES")
							{
								echo $result[$count]['CONFIRMED'];
							}
							elseif($result[$count]['CONFIRMED'] == "NO")
							{
								echo $result[$count]['CONFIRMED'] . " (<a href=\"index.php?page=".$_GET['page']."&adminpage=".$_GET['adminpage']."&confirmid=".$result[$count]['USER_ID']."\" />CONFIRM?</a>)";
							}
				echo "</td>
						</tr>
						";
			}
			echo "</table>";
		}
	}
	elseif($_GET['adminpage'] == "rosters")
	{
		echo "<h2 style=\"text-align: center;\">Approve / Moderate Rosters</h2>";
	}
	elseif($_GET['adminpage'] == "daysoff")
	{	
		echo "<h2 style=\"text-align: center;\">Approve / Moderate Days-off</h2>";
		
		$rosterCheck = new rosterRequest();
		
		if(isset($_GET['confirmid']))
		{
			echo "<center><p style=\"color: #FF0000;\" />Are you sure you want to confirm the folowing Day-off?</p>";
			$result = $rosterCheck->reqByID($_GET['confirmid']);
			echo "
				<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
					<tr>
						<td>Name</td><td>".$rosterCheck->reqUsername($result['USER_ID'])."</td>
					</tr>
					<tr>
						<td>Date</td><td>".$result['DATE_START']."</td>
					</tr>
					<tr>
						<td>Type</td><td>".$result['TYPE']."</td>
					</tr>
					<tr>
						<td>Date Submitted</td><td>".$result['DATE_SUBMITTED']."</td>
					</tr>
					<tr>
						<td>Description</td><td>".$result['DESCRIPTION']."</td>
					</tr>
					<tr>
						<td colspan=\"2\" style=\"text-align: center;\"> Click to Confirm </td>
					</tr>
				</table>
				</center>
					";
		}
		else
		{
			
			$result = $rosterCheck->viewDayoff();
			
			echo "
			<table align=\"center\" border=\"1\" style=\"border-style: solid; border-width: 1px; width: 700px;\">
			<tr>
				<td>Name</td><td>Date</td><td>Type</td><td>Date Submitted</td><td>Description</td><td>Confirmed?</td>
			</tr>
			";
			for($count = 0; $count < count($result); $count++)
			{
				echo "<tr>
							<td style=\"text-align: center;\">".$rosterCheck->reqUsername($result[$count]['USER_ID'])."</td>
							<td style=\"text-align: center;\">".$result[$count]['DATE_START']."</td>
							<td style=\"text-align: center;\">".$result[$count]['TYPE']."</td>
							<td style=\"text-align: center;\">".$result[$count]['DATE_SUBMITTED']."</td>
							<td style=\"text-align: center;\">";
								if(empty($result[$count]['DESCRIPTION']))
								{
									echo "no description";
								}
								else
								{
									echo "<a href=\"\" onClick=\"alert('".$result[$count]['DESCRIPTION']."')\";>view description</a>";
								}
							echo "</td>
							<td style=\"text-align: center;\">";
							if($result[$count]['CONFIRMED'] == "YES")
							{
								echo $result[$count]['CONFIRMED'];
							}
							elseif($result[$count]['CONFIRMED'] == "NO")
							{
								echo $result[$count]['CONFIRMED'] . " (<a href=\"index.php?page=".$_GET['page']."&adminpage=".$_GET['adminpage']."&confirmid=".$result[$count]['EXCEPTION_ID']."\" />CONFIRM?</a>)";
							}
				echo "</td>
						</tr>
						";
			}
			echo "</table>";	
		}
	}
	elseif($_GET['adminpage'] == "holidays")
	{
		echo "<h2 style=\"text-align: center;\">Approve / Moderate Holidays</h2>";
		$rosterCheck = new rosterRequest();
		
		if(isset($_GET['confirmid']))
		{
			echo "<center><p style=\"color: #FF0000;\" />Are you sure you want to confirm the folowing Holiday?</p>";
			$result = $rosterCheck->reqByID($_GET['confirmid']);
			echo "
				<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
					<tr>
						<td>Name</td><td>".$rosterCheck->reqUsername($result['USER_ID'])."</td>
					</tr>
					<tr>
						<td>Date</td><td>".$result['DATE_START']." to ".$result['DATE_END']."</td>
					</tr>
					<tr>
						<td>Date Submitted</td><td>".$result['DATE_SUBMITTED']."</td>
					</tr>
					<tr>
						<td>Description</td><td>".$result['DESCRIPTION']."</td>
					</tr>
					<tr>
						<td colspan=\"2\" style=\"text-align: center;\"> Click to Confirm </td>
					</tr>
				</table>
				</center>
					";
		}
		else
		{
			
			$result = $rosterCheck->viewHolidays();
			
			echo "
			<table align=\"center\" border=\"1\" style=\"border-style: solid; border-width: 1px; width: 700px;\">
			<tr>
				<td>Name</td><td>Date</td><td>Type</td><td>Date Submitted</td><td>Description</td><td>Confirmed?</td>
			</tr>
			";
			for($count = 0; $count < count($result); $count++)
			{
				echo "<tr>
							<td style=\"text-align: center;\">".$rosterCheck->reqUsername($result[$count]['USER_ID'])."</td>
							<td style=\"text-align: center;\">".$result[$count]['DATE_START']." to ".$result[$count]['DATE_END']."</td>
							<td style=\"text-align: center;\">".$result[$count]['TYPE']."</td>
							<td style=\"text-align: center;\">".$result[$count]['DATE_SUBMITTED']."</td>
							<td style=\"text-align: center;\">";
								if(empty($result[$count]['DESCRIPTION']))
								{
									echo "no description";
								}
								else
								{
									echo "<a href=\"\" onClick=\"alert('".$result[$count]['DESCRIPTION']."')\";>view description</a>";
								}
							echo "
							</td>
							<td style=\"text-align: center;\">";
							if($result[$count]['CONFIRMED'] == "YES")
							{
								echo $result[$count]['CONFIRMED'];
							}
							elseif($result[$count]['CONFIRMED'] == "NO")
							{
								echo $result[$count]['CONFIRMED'] . " (<a href=\"index.php?page=".$_GET['page']."&adminpage=".$_GET['adminpage']."&confirmid=".$result[$count]['EXCEPTION_ID']."\" />CONFIRM?</a>)";
							}
				echo "</td>
						</tr>
						";
			}
			echo "</table>";
		}
	}
	else
	{
		echo "<h2 style=\"text-align: center;\">You made a Boo-hoo!</h2>";
	}
	
	echo "
	<p style=\"text-size: x-small;\"><a href=\"javascript:javascript:history.go(-1)\" /><< Back</a></p>
	";
}
else
{
	echo "
	<center>
	<table border=\"1\" style=\" width: 500px; border-style: none; border-width: 1px; margin: 5px 5px 5px 5px; text-align: center;\">
		<tr>
			<td>
				<a href=\"?page=admin.php&adminpage=users\" />Moderate / Approve Users</a>
			</td>
				<td>";
					$rosterCheck = new rosterRequest();
					$rosterCheck->checkNewuser();
					echo "
				</td>
		</tr>
		<tr>
			<td>
				<a href=\"?page=admin.php&adminpage=rosters\" />Moderate / Approve Rosters</a>
			</td>
			<td>
				<p>
					&nbsp;
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<a href=\"?page=admin.php&adminpage=daysoff\" />Moderate / Approve Days-off</a>
			</td>
				<td>";
					$rosterCheck = new rosterRequest();
					$rosterCheck->checkDayoff();
					echo "
				</td>
		</tr>
		<tr>
			<td>
				<a href=\"?page=admin.php&adminpage=holidays\" />Moderate / Approve Holidays</a>
			</td>
					<td>";
						$rosterCheck = new rosterRequest();
						$rosterCheck->checkHoliday();
						echo "
					</td>
		</tr>
	</table>
	</center>
	";
}
?>