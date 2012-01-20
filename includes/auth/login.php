<?php
/*
 * Login Handling
 * file: login.php
 * location: <document root>/includes/auth/
 * 
 * author: Cas van der Weegen
 */
class loginProcess
{   
   function doProcess($username, $password)
   {
      error_reporting(E_ALL);
      ini_set('display_errors', '1');
      
      if(!empty($username) && !empty($password))
      {
         require('dohash.php');
         
            if(empty($username))
            {
               echo "Please enter an username!";
            }
            else
            {
               if(empty($password))
               {
                  echo "Please enter a password!";
               }
               else
               {              
                  $database = new Database();
                  
                  if($result = $database->doQuery("SELECT NAME,SURNAME,USERNAME,PASSWORD,USER_ID,ACTIVE,CONFIRMED FROM EMPLOYEE WHERE USERNAME ='$username'"))
                  {
                     $count = (count($result) / 10);
                     if(round($count)==1)
                     {
                        $newpass = new doHash();
                        $toCheck = $newpass->hash($password);
                                 
                        if($result['PASSWORD'] == $toCheck)
                        {
                           if($result['ACTIVE'] != "YES")
                           {
                              echo "
                              <html>
                              <head>
                              <script type=\"text/javascript\">
                              alert(\"Your account has been suspended, contact the system administrator.\");
                              location = \"index.php\";
                              </script>
                              </head>
                              <body>
                              </body>
                              </html>
                              ";
                              exit;
                           }
                           elseif($result['CONFIRMED'] != "YES")
                           {
                              echo "
                              <html>
                              <head>
                              <script type=\"text/javascript\">
                              alert(\"Your account has not yet been approved by a moderator, please come back later!\");
                              location = \"index.php\";
                              </script>
                              </head>
                              <body>
                              </body>
                              </html>
                              ";
                              exit;
                           }
                           else
                           {
                              // Inlogroutine schrijven                                 
                              if(!isset($_SESSION['userid']))
                              {
                              session_start();
                              }
                              
                              $_SESSION["userid"] = $result['USER_ID'];
                              $_SESSION["username"] = $result['USERNAME'];
                              
                              header("location:index.php");
                           }
                        }
                        else
                        {
                           echo "Incorrect username and/or password";
                        }
                     }
                     else
                     {
                        echo "An unknown error has occurred!";
                     }
                  }
                  else
                  {
                     echo "Incorrect username and/or password";
                  }
               }
            }
      }
      else
      {
         echo "<font style=\"color: #FF0000;\" />Please enter your credentials</font><br />";
         include('includes/layout/loginbox.php');
      }
   }
}
?>