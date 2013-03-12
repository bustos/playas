<html>
 <head>
  <title>PHP Test</title>
  
 </head>
 <body>
 
<?php
require("conection_info.php");
$fra=$_GET["code"];
$tmp="SELECT * from city where name LIKE '%$fra%'";
echo htmlspecialchars($_COOKIE["Cj"]) ;
if ($result = $mysqli->query($tmp))
{
		echo "<a name='top'>ciudades</a>"; 
		echo "<a href='#buttom'>buttom</a>";
	 	echo "<table border='1'>"; 
		echo "<tr>";
		echo " <td>CODE</td><td>NAME</td>"; 		   
		while ($row = $result->fetch_assoc()){
			echo "<tr>"; 	
			$name=$row["CountryCode"];
			echo "<td><a href='country.php?code=$name'>Pais</a></td>"; 		  
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

