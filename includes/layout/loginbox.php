<?php
/*
 * Loginbox HTML
 * file: loginbox.php
 * location: <document root>/includes/layout/
 * 
 * author: Cas van der Weegen
 */
if(isset($_SESSION["username"]))
{ 
   echo " Welkom <a href=\"userpanel.php\" target=\"_self\" />" . $_SESSION["username"] ."</a>&nbsp;<br /><a href=\"logout.php\" style=\"font-size: small; text-decoration: none;\">logout</a>&nbsp;";
}
else
{
?>
<div class="loginheader">     
	<form action="login.php" method="post" >
	Username: &nbsp;<input type="text" name="username" /><br /> Password: &nbsp;<input type="password" name="password" /><br />
	<input type="image" src="images/login_button.png" height="18" width="45" alt="Login" />&nbsp;<a href="register.php" style="font-size: small; text-decoration: none;">Register?</a>&nbsp;
	</form>
</div>
<?php
}
?>