<?php
/*
 * Password Encrypting
 * file: dohash.php
 * location: <document root>/includes/auth/
 * 
 * author: Cas van der Weegen
 */
class doHash
{
   function hash($password)
   {
      $encrypted = sha1($password);
      
      return $encrypted;
   }
}
?>