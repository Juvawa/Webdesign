<?php
/*
 * Index
 * file: index.php
 * location: <document root>/
 * 
 * author: Cas van der Weegen
 */
require('includes/firststage.php');
include('includes/layout/header.php');
if(isset($_GET['page']))
{
   $page = $_GET['page'];
}
else
{
   $page = NULL;
}
if(isset($_SESSION['username']) && isset($_SESSION['userid']) || $page == 'register.php' || $page == 'login.php')
{
   if(isset($_GET['page']))
   {
      include($_GET['page']);
   }
   else
   {
      echo "Welcome!<br /><br />";
   }
}
else
{  
   echo "
   <div class=\"bodynotloggedin\" />
   You must be logged in to view this page
   </div>
   ";  
}


include('includes/layout/footer.php');
?>