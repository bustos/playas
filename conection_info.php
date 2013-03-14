<html>
 <head>
  <title>PHP Test</title>
  
 </head>
 <body>
 
<?php
require("menu.php");
$mysqli = new mysqli("localhost", "root", "123", "world");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

	 
    
?>
  
 </body>
</html>





</BODY>
</HTML>

