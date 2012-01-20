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
							<td style=\"text-align: center;\">".$result[$count]['DESCRIPTION']."</td>
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