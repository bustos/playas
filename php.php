<html>
 <head>
  <title>PHP Test</title>
  
 </head>
 <body>
 
<?php
require("conection_info.php");

if ($result = $mysqli->query("SELECT code,NAME FROM country limit 200"))
{
		echo "<a name='top'>ciudades</a>"; 
		echo "<a href='#buttom'>buttom</a>";
	 	echo "<table border='1'>"; 
		echo "<tr>";
		echo " <td>CODE</td><td>NAME</td>"; 		   
		while ($row = $result->fetch_assoc()){
			echo "<tr>"; 		   
			foreach(($row) as $key => $line){
			   echo "<td>", $line,"</td>"; 		   
			}
		echo "</tr>"; 

	}
	$result->close(); 
}
echo "</table>"; 
echo "<a name='buttom'></a>"; 
echo "<a href='http://www.bustos.cixx6.com'>carlos</a>";
echo "<a href='#top'>top</a>";
    /* free result set */

$mysqli->close();
?>
  
 </body>
</html>





</BODY>
</HTML>

