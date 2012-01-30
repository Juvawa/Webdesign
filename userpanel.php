<?php
/*  
 *  User interface
 *  file: userpanel.php
 *  location: <document root>/
 *  
 *  Author: Justin van Wageningen
 */ 
 
require('includes/directcall.php');
require('includes/user/user_req.php');

$doUserRequest = new userRequest();

echo "<h1 style=\"text-align: center\"> User panel </h1>";

if(isset($_GET['userpage']))
{
	if($_GET['userpage'] == "details")
	{
		$details = $doUserRequest -> reqUserDetails($_SESSION['userid']);
		echo "<h2 style=\"text-align: center;\"> Change personal details </h2>";
		
		echo "
		<center>
		<form name=\"details\" mothod=\"POST\" action=\"update_details.php\">
			<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
				<tr>
					<td style=\"width: 150px;\">Name:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"name\" id=\"name\" value=\"".$details['NAME']."\" onblur=\"return checkFname();\" /></td><td><div id=\"div_name\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Surname:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"surname\" id=\"surname\" value=\"".$details['SURNAME']."\" onblur=\"return checkSurname();\" /></td><td><div id=\"div_surname\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Date of Birth:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"dob\" id=\"dob\" value=\"".$details['DOB']."\" onblur=\"return checkDob();\" /></td><td><div id=\"div_dob\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Phone:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"phone\" id=\"phone\" value=\"0".$details['PHONE']."\" onblur=\"return checkPhone();\" /></td><td><div id=\"div_phone\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Email:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"email\" id=\"email\" value=\"".$details['EMAIL']."\" /></td><td><div id=\"div_email\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td colspan=\"3\" style=\"text-align: center;\"><input type=\"submit\" value=\"Submit\" alt=\" Submit\" /></td>
				</tr>
			</table>
		</form>
		</center>	
		";
	}
	elseif($_GET['userpage'] == "login")
	{
		$login = $doUserRequest -> reqLoginDetails($_SESSION['userid']);
		echo "<h2 style=\"text-align: center;\"> Change login details </h2>";
		
		echo "
		<center>
		<form name=\"login_details\" mothod=\"POST\" action=\"update_login_details.php\">
			<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
				<tr>
					<td style=\"width: 150px;\">Username:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"name\" id=\"name\" value=\"".$login['USERNAME']."\" onblur=\"return checkFname();\" /></td><td><div id=\"div_name\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Old password:</td><td style=\"width: 150px;\"><input type=\"password\" name=\"oldpassword\" id=\"oldpassword\" value=\"".$login['USERNAME']."\" onblur=\"return checkSurname();\" /></td><td><div id=\"div_surname\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">New password:</td><td style=\"width: 150px;\"><input type=\"password\" name=\"password\" id=\"password\" value=\"".$login['USERNAME']."\" onblur=\"return checkSurname();\" /></td><td><div id=\"div_surname\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Repeat new password:</td><td style=\"width: 150px;\"><input type=\"password\" name=\"repeatpassword\" id=\"repeatpassword\" value=\"".$login['USERNAME']."\" onblur=\"return checkSurname();\" /></td><td><div id=\"div_surname\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td colspan=\"3\" style=\"text-align: center;\"><input type=\"submit\" value=\"Submit\" alt=\" Submit\" /></td>
				</tr>
			</table>
		</form>
		</center>	
		";
	}
	elseif($_GET['userpage'] == "preferences") 
	{
		$preferences = $doUserRequest -> reqShifts();
		var_dump($preferences);
		
		echo "<h2 style=\"text-align: center;\"> Change roster preferences </h2>";
	}
}
else 
{
	echo "<h2 style=\"text-align: center\"> Personal details </h2>";

	$userDetails = $doUserRequest -> reqUserDetails($_SESSION['userid']);

	echo "
		<center>
			<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
				<tr>
					<td style=\"width: 150px;\">Name:</td><td>".$userDetails['NAME']."</td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Surname:</td><td>".$userDetails['SURNAME']."</td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Date of Birth:</td><td>".$userDetails['DOB']."</td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Phone:</td><td>0".$userDetails['PHONE']."</td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Email:</td><td>".$userDetails['EMAIL']."</td>
				</tr>
				<tr>
					<td colspan=\"2\" style=\"text-align: center;\"><a href=\"index.php?page=userpanel.php&userpage=details\">CHANGE PERSONAL DETAILS</a></td>
				</tr>
			</table>
		</center>	
		";
		
	$userLoginDetails = $doUserRequest -> reqLoginDetails($_SESSION['userid']);

	echo "<h2 style=\"text-align: center;\"> Login details </h2>";

	echo "
		<center>
			<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
				<tr>
					<td style=\"width: 150px;\">Username:</td><td style=\"width: 150px;\">".$userLoginDetails['USERNAME']."</td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Password:</td><td style=\"width: 150px;\">**********</td>
				</tr>
				<tr>
					<td colspan =\"2\" style=\"text-align: center;\"><a href=\"index.php?page=userpanel.php&userpage=login\">CHANGE LOGIN DETAILS</a></td>
				</tr>
			</table>
		</center>
	";

	$userPreferences = $doUserRequest -> reqUserPreferences($_SESSION['userid']);

	echo "<h2 style=\"text-align: center;\"> Roster preferences </h2>";

	echo "
		<center>
			<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
				<tr>
					<td style=\"width: 125px;\">Monday</td><td style=\"width: 125px;\">Tuesday</td><td style=\"width: 125px;\">Wednesday</td><td style=\"width: 125px;\">Thursday</td><td style=\"width: 125px;\">Friday</td><td style=\"width: 125px;\">Saturday</td><td style=\"width: 125px;\">Sunday</td>
				</tr>
				<tr>";

				$count = 0;
				if($count < 8) {
					if($userPreferences[$count]['DAY'] == "MONDAY" && $userPreferences[$count]['AVAILABLE'] == "NO") 
					{
						echo"<td style=\"width: 125px;\"></td>";
						$count++;
					} 
					elseif($userPreferences[$count]['DAY'] == "MONDAY" && $userPreferences[$count]['AVAILABLE'] == "YES")
					{
						echo"<td style=\"width: 125px;\">".$userPreferences[$count]['TIME_START']."-".$userPreferences[$count]['TIME_END']."</td>";
						$count++;
					}
					
					if($userPreferences[$count]['DAY'] == "TUESDAY" && $userPreferences[$count]['AVAILABLE'] == "NO")
					{
						echo"<td style=\"width: 125px;\"></td>";
						$count++;
					} 
					elseif($userPreferences[$count]['DAY'] == "TUESDAY" && $userPreferences[$count]['AVAILABLE'] == "YES")
					{
						echo"<td style=\"width: 125px;\">".$userPreferences[$count]['TIME_START']."-".$userPreferences[$count]['TIME_END']."</td>";
						$count++;
					}
					
					if($userPreferences[$count]['DAY'] == "WEDNESDAY" && $userPreferences[$count]['AVAILABLE'] == "NO") 
					{
						echo"<td style=\"width: 125px;\"></td>";
						$count++;
					} 
					elseif($userPreferences[$count]['DAY'] == "WEDNESDAY" && $userPreferences[$count]['AVAILABLE'] == "YES")
					{
						echo"<td style=\"width: 125px;\">".$userPreferences[$count]['TIME_START']."-".$userPreferences[$count]['TIME_END']."</td>";
						$count++;
					}
					
					if($userPreferences[$count]['DAY'] == "THURSDAY" && $userPreferences[$count]['AVAILABLE'] == "NO") 
					{
						echo"<td style=\"width: 125px;\"></td>";
						$count++;
					} 
					elseif($userPreferences[$count]['DAY'] == "THURSDAY" && $userPreferences[$count]['AVAILABLE'] == "YES") 
					{
						echo"<td style=\"width: 125px;\">".$userPreferences[$count]['TIME_START']."-".$userPreferences[$count]['TIME_END']."</td>";
						$count++;
					}
					
					if($userPreferences[$count]['DAY'] == "FRIDAY" && $userPreferences[$count]['AVAILABLE'] == "NO")
					{
						echo"<td style=\"width: 125px;\"></td>";
						$count++;
					} 
					elseif($userPreferences[$count]['DAY'] == "FRIDAY" && $userPreferences[$count]['AVAILABLE'] == "YES") 
					{
						echo"<td style=\"width: 125px;\">".$userPreferences[$count]['TIME_START']."-".$userPreferences[$count]['TIME_END']."</td>";
						$count++;
					}
					
					if($userPreferences[$count]['DAY'] == "SATURDAY" && $userPreferences[$count]['AVAILABLE'] == "NO") 
					{
						echo"<td style=\"width: 125px;\"></td>";
						$count++;
					} 
					elseif($userPreferences[$count]['DAY'] == "SATURDAY" && $userPreferences[$count]['AVAILABLE'] == "YES")
					{
						echo"<td style=\"width: 125px;\">".$userPreferences[$count]['TIME_START']."-".$userPreferences[$count]['TIME_END']."</td>";
						$count++;
					}
					
					if($userPreferences[$count]['DAY'] == "SUNDAY" && $userPreferences[$count]['AVAILABLE'] == "NO") 
					{
						echo"<td style=\"width: 125px;\"></td>";
						$count++;
					} 
					elseif($userPreferences[$count]['DAY'] == "SUNDAY" && $userPreferences[$count]['AVAILABLE'] == "YES")
					{
						echo"<td style=\"width: 125px;\">".$userPreferences[$count]['TIME_START']."-".$userPreferences[$count]['TIME_END']."</td>";
						$count++;
					}
				}
				
			echo" </tr>
				<tr>
					<td colspan=\"7\" style=\"text-align: center;\"><a href=\"index.php?page=userpanel.php&userpage=preferences\">CHANGE ROSTER PREFERENCES</a></td>
				</tr>
			</table>
		</center>
		<br />
	";
}
 ?>