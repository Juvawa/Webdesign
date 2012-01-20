<?php
/*
 * Register Fields
 * file: register.php
 * location: <document root>/
 * 
 * author: Justin van Wageningen
 */

require('includes/directcall.php');

echo "
	<form name=\"register\" method=\"POST\" action=\"#\" onsubmit=\"return checkEmpty(this);\" >
		<table>
			<tr>
				<td class = \"register\">Name</td>
				<td></td>
			</tr>
			<tr>
				<td class = \"register\"><input type=\"text\" name=\"name\" id = \"name\" size=\"20\" maxlength=\"20\" onblur=\"return checkFname();\"/></td>
				<td><div id = \"div_name\"></div></td>
			</tr>
			
			<tr>
			</tr>
			
			<tr>
				<td class = \"register\">Surname</td>
				<td></td>
			</tr>
			<tr>
				<td class = \"register\"><input type=\"text\" name=\"surname\" id = \"surname\" size=\"20\" maxlength=\"20\" onblur=\"return checkSurname();\" /></td>
				<td><div id = \"div_surname\"></div></td>
			</tr>
						
			<tr>
			</tr>
			
			<tr>
				<td class = \"register\">Day of Birth (DD-MM-YYYY)</td>
				<td></td>
			</tr>
			<tr>
				<td class = \"register\"><input type=\"text\" name=\"dob\" id = \"dob\" size=\"10\" maxlength=\"10\" onblur=\"return checkDob();\" /></td>
				<td><div id = \"div_dob\"></div></td>
			</tr>
			<tr>
				<td class = \"register\">Phone number</td>
				<td></td>
			</tr>
			<tr>
				<td class = \"register\"><input type=\"text\" name=\"phone\" id = \"phone\" size=\"10\" maxlength=\"10\" onblur=\"return checkPhone();\" /></td>
				<td><div id = \"div_phone\"></div></td>
			</tr>
						
			<tr>
			</tr>
			
			<tr>
				<td class = \"register\">Username</td>
				<td></td>
			</tr>
			<tr>
				<td class = \"register\"><input type=\"text\" name=\"username\" id = \"username\" size=\"15\" maxlength=\"15\" /*onchange=\"return resetBorder()\"*/ onblur=\"return checkUsername();\" /></td>
				<td><div id = \"div_username\"></div></td>
			</tr>
						
			<tr>
			</tr>
			
			<tr>
				<td class = \"register\">Password</td>
				<td></td>
			</tr>
			<tr>
				<td class = \"register\"><input type=\"password\" name=\"password\" id = \"password\" size=\"15\" maxlength=\"15\" onblur=\"return checkPassword();\"/></td>
				<td></td>
			</tr>
						
			<tr>
			</tr>
			
			<tr>
				<td class = \"register\">Verify password</td>
				<td></td>
			</tr>
			<tr>
				<td class = \"register\"><input type=\"password\" name=\"repeatpassword\" id = \"repeatpassword\" size=\"15\" maxlength=\"15\" onblur=\"return checkPassword();\" /></td>
				<td><div id = \"div_password\"></div></td>
			</tr>
						
			<tr>
			</tr>
			
			<tr>
				<td class = \"register\">Email</td>
				<td></td>
			</tr>
			<tr>
				<td class = \"register\"><input type=\"text\" name=\"email\" id = \"email\" size=\"20\" maxlength=\"30\" onblur=\"return checkEmail();\" /></td>
				<td><div id = \"div_email\"></div></td>
			</tr>
						
			<tr>
			</tr>
			
			<tr>
				<td class = \"register\"><input type=\"submit\" value= \"submit\" name=\"reg\" /></td>
				<td></td>
			</tr>
		</table>
	</form>

";

?>


