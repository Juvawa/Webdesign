<?php
/*
 * Footer
 * file: footer.php
 * location: <document root>/includes/layout/
 * 
 * author: Cas van der Weegen
 */
if(date('Y') >= 2012)
{
   $year1 = "2011 - ";
   $year2 = date('Y');
   $year = $year1 . $year2;
}
else
{
   $year = date('Y');
}

echo "
	</div>
   	<div class=\"footer\">
        ".$year." &#169; VDWEEGEN Automatisering & Justin van Wageningen & Casper van der Poll
	</div>
</div>
</body>
</html>
"
?>