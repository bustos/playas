<html>
 <head>
  <title>PHP Test</title>
  
 </head>
 <body>
 
<?php
require("conection_info.php");

$fra=$_GET["code"];
$tmp="SELECT * from city order by name";// where Name LIKE '%$fra%'";

if ($result = $mysqli->query($tmp))
{
		echo "<a name='top'>Ciudades</a>"; 
		echo "<a href='#buttom'>buttom</a>";
	 	echo "<table border='1'>"; 
		echo "<tr>";
		echo " <td>CODE</td><td>NAME</td>"; 		   
		while ($row = $result->fetch_array()){
			echo "<tr>"; 	
			$name=$row["Name"];
			$id=$row["ID"];
			echo "<td><a name='$name'>"; 		  
			echo "<a href='ciudades.php?code=$id'>$name</a></td>"; 		  
			for($i=2;$i<5;$i++){   
			   echo "<td>".$row[$i]."</td>"; 		   
			}
			echo "<a href='ciudades.php?code=$id'>Wikipedia</a></td>"; 		  
		echo "</tr>"; 

	}
	$result->close(); 
}
echo "</table>"; 
echo "<a name='buttom'></a>"; 
echo "<a href='#top'>top</a>";
    /* free result set */

$mysqli->close();
?>
  
 </body>
</html>





</BODY>
</HTML>

