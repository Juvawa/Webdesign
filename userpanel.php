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
		$dob_uncut = $details['DOB'];
		$dob_array = explode("-", $dob_uncut);
		$dob = $dob_array[2] . "-" . $dob_array[1] . "-" . $dob_array[0];

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
					<td style=\"width: 150px;\">Date of Birth:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"dob\" id=\"dob\" value=\"".$dob."\" onblur=\"return checkDob();\" /></td><td><div id=\"div_dob\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Phone:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"phone\" id=\"phone\" value=\"0".$details['PHONE']."\" onblur=\"return checkPhone();\" /></td><td><div id=\"div_phone\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Email:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"email\" id=\"email\" value=\"".$details['EMAIL']."\" onblur=\"return checkEmailUser();\" /></td><td><div id=\"div_email\" style=\"width: 250px;\"></div></td>
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
		<form name=\"login_details\" method=\"POST\" action=\"update_login_details.php\">
			<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
				<tr>
					<td style=\"width: 150px;\">Username:</td><td style=\"width: 150px;\"><input type=\"text\" name=\"username\" id=\"username\" value=\"".$login['USERNAME']."\" onblur=\"return checkUsernameUser();\" /></td><td><div id=\"div_username\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Old password:</td><td style=\"width: 150px;\"><input type=\"password\" name=\"oldpassword\" id=\"oldpassword\" onblur=\"return checkOldPassword();\" /></td><td><div id=\"div_oldpassword\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">New password:</td><td style=\"width: 150px;\"><input type=\"password\" name=\"password\" id=\"password\" onblur=\"return checkPassword();\" /></td><td><div style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td style=\"width: 150px;\">Repeat new password:</td><td style=\"width: 150px;\"><input type=\"password\" name=\"repeatpassword\" id=\"repeatpassword\" onblur=\"return checkPassword();\" /></td><td><div id=\"div_password\" style=\"width: 250px;\"></div></td>
				</tr>
				<tr>
					<td colspan=\"3\" style=\"text-align: center;\"><input type=\"hidden\" value=\"".$_SESSION['userid']."\" name=\"userid\" /><input type=\"submit\" value=\"Submit\" alt=\" Submit\" /></td>
				</tr>
			</table>
		</form>
		</center>	
		";
	}
	elseif($_GET['userpage'] == "preferences") 
	{
		$preferences = $doUserRequest -> reqUserPreferences($_SESSION['userid']);
		
		echo "<h2 style=\"text-align: center;\"> Change roster preferences </h2>";
		
		echo "
			<center>
				<font style=\"color: red;\">Make sure you enter whole hours, half hours etc will not be accepted</font>
				<form name=\"preferences\" method=\"POST\" action=\"update_preferences.php\">
				<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
					<tr>
						<td style=\"width: 100px;\"></td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td><td>Sunday</td>
					</tr>
					<tr>
						<td style=\"width: 100px;\">Start Time</td>";
					for($count = 0; $count < count($preferences); $count++) {
						if($preferences[$count]['AVAILABLE'] == "YES") 
						{
							echo"<td style=\"width: 130px;\"><center><input type=\"text\" name=\"startday".$count."\" id=\"startday".$count."\" value=\"".$preferences[$count]['TIME_START']."\" size=\"8\" maxlength=\"8\" onblur=\"return checkPreferences();\" /></center></td>";
						}
						elseif($preferences[$count]['AVAILABLE'] == "NO") {
							echo"<td style=\"width: 130px;\"><center><input type=\"text\" name=\"startday".$count."\" id=\"startday".$count."\" value=\"".$preferences[$count]['TIME_START']."\" size=\"8\" maxlength=\"8\" onblur=\"return checkPreferences();\" /></center></td>";
						}
					}
						
		echo"		</tr>
					<tr>
						<td style=\"width: 100px;\">End time</td>
					";
					
					for($count = 0; $count < count($preferences); $count++) {
						if($preferences[$count]['AVAILABLE'] == "YES") 
						{
							echo"<td style=\"width: 130px;\"><center><input type=\"text\" name=\"endday".$count."\" id=\"endday".$count."\" value=\"".$preferences[$count]['TIME_END']."\" size=\"8\" maxlength=\"8\" onblur=\"return checkPreferences();\" /></center></td>";
						}
						elseif($preferences[$count]['AVAILABLE'] == "NO") {
							echo"<td style=\"width: 130px;\"><center><input type=\"text\" name=\"endday".$count."\" id=\"endday".$count."\" value=\"".$preferences[$count]['TIME_END']."\" size=\"8\" maxlength=\"8\" onblur=\"return checkPreferences();\" /></center></td>";
						}
					}

		echo"		</tr>
					<tr>
						<td style=\"width: 100px;\">Available</td>
					";
					for($count = 0; $count < count($preferences); $count++) {
						if($preferences[$count]['AVAILABLE'] == "YES") 
						{
							echo"<td style=\"width: 130px;\"><center><input type=\"radio\" name=\"radio".$count."\" id=\"radioyes".$count."\" value=\"YES\" checked />YES<br /> <input type=\"radio\" name=\"radio".$count."\" id=\"radiono".$count."\" value=\"NO\" onclick=\"disableInput();\" />NO</center></td>";
						}
						elseif($preferences[$count]['AVAILABLE'] == "NO") {
							echo"<td style=\"width: 130px;\"><center><input type=\"radio\" name=\"radio".$count."\" id=\"radioyes".$count."\" value=\"YES\" />YES<br /> <input type=\"radio\" name=\"radio".$count."\" id=\"radiono".$count."\" value=\"NO\" onclick=\"disableInput();\" checked/>NO</center></td>";
						}
					}
		echo"			</tr>
					<tr>
						<td colspan=\"8\" style=\"text-align: center;\"><input type=\"hidden\" name=\"userid\" value=\"".$_SESSION['userid']."\" /><input type=\"submit\" value=\"Submit\" alt=\"Submit\" /></td>
					</tr>
				</table>
			</form>
			</center>
		";
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

	echo "<h2 style=\"text-align: center;\"> Availability</h2>";

	echo "
		<center>
			<table border=\"1\" style=\"border-style: solid; border-width: 1px;\">
				<tr>
					<td style=\"width: 125px;\">Monday</td><td style=\"width: 125px;\">Tuesday</td><td style=\"width: 125px;\">Wednesday</td><td style=\"width: 125px;\">Thursday</td><td style=\"width: 125px;\">Friday</td><td style=\"width: 125px;\">Saturday</td><td style=\"width: 125px;\">Sunday</td>
				</tr>
				<tr>";
					for($count = 0; $count < count($userPreferences); $count++) {
						if($userPreferences[$count]['AVAILABLE'] == "YES") 
						{
							echo"<td style=\"width: 130\">".$userPreferences[$count]['TIME_START']." - ".$userPreferences[$count]['TIME_END']."</td>";
						}
						elseif($userPreferences[$count]['AVAILABLE'] == "NO") {
							echo"<td style=\"width: 130\">".$userPreferences[$count]['TIME_START']." - ".$userPreferences[$count]['TIME_END']."</td>";
						}
					}
			
			echo" </tr>
				<tr>
					<td colspan=\"7\" style=\"text-align: center;\"><a href=\"index.php?page=userpanel.php&userpage=preferences\">CHANGE AVAILABILITY</a></td>
				</tr>
			</table>
		</center>
		<br />
	";
}
 ?>