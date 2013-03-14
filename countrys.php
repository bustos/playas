<html>
 <head>
  <title>PHP Test</title>
  
 </head>
 <body>
 
<?php
require("conection_info.php");
$fra=$_GET["code"]; //dfhg
$tmp="SELECT * from country order by name";// where Name LIKE '%$fra%'";

if ($result = $mysqli->query($tmp))
{
		echo "<a name='top'>Paises</a>"; 
		echo "<a href='#buttom'>buttom</a>";
	 	echo "<table border='1'>"; 
		echo "<tr>";
		echo " <td>CODE</td><td>NAME</td>"; 		   
		while ($row = $result->fetch_array()){
			echo "<tr>"; 	
			$name=$row["Name"];
			echo "<td><a name='$name'>"; 		  
			echo "<a href='country.php?code=$name'>$name</a></td>"; 		  
			for($i=2;$i<14;$i++){   
			   echo "<td>".$row[$i]."</td>"; 		   
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

