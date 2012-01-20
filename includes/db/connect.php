<?php
/*
 * Database Handling
 * file: connect.php
 * location: <document root>/includes/db/
 * 
 * author: Cas van der Weegen
 */
class Database
{
   function connect($host, $username, $password)
   {      
      if($conn = mysql_connect($host, $username, $password))
      {}
      else
      {
         die('Error connecting to MySQL');
      }
      
      return $conn;
   }
   
   function disconnect($conn)
   {
      if(mysql_close($conn))
      {}
      else
      {
         die('Unable to close connection to MySQL');
      }
   }
   
   function doQuery($query)
   {
      require('config.php');
      $conn = $this->connect($host, $username, $password);
      
		mysql_select_db($database, $conn);
		// check if we need to fetch an array
      if((strpos($query,'DELETE') === false) &&
			(strpos($query,'UPDATE') === false) &&
			(strpos($query,'INSERT') === false))
		{
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
		}
		else
		{
			$row = true;
			mysql_query($query);
		}
      $this->disconnect($conn);
      return $row;
   }
	
      function doRows($query)
      {
			require('config.php');
			$conn = $this->connect($host, $username, $password);
			
			mysql_select_db($database, $conn);
	
			$result = mysql_query($query);
			
			$rowcount = 0;		
			while($temprow = mysql_fetch_array($result))
			{
				$row[$rowcount] = $temprow;
				$rowcount++;
			}
			
			$this->disconnect($conn);
			$rowcount = 0;
			
			if(!isset($row))
			{
				$row =false;
			}
			
			return $row;		
		}
   }
?>