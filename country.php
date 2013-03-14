<html>
 <head>
  <title>PHP Test</title>
  
 </head>
 <body>
 
<?php
require("conection_info.php");

$fra=$_GET["code"];

$tmp="SELECT * from country where Name LIKE '%$fra%'";

if ($result = $mysqli->query($tmp))
{
		echo "<a name='top'></a>"; 
		echo "<a href='#buttom'>buttom</a>";
	 	 $finfo = $result->fetch_fields();
		echo "<font size=\"8\"><b>$fra</b></font>";
		echo "<a href='http://en.wikipedia.org/wiki/$fra'>Enlace a la wikipedia</a>"; 		  
		echo "<br>"; 
		$i=0;
		
		while ($row = $result->fetch_all()){	
			foreach(($row) as $line){   
			   foreach(($line) as $key ){
				$tmp=$finfo[$i]->name;
					echo "<font size=\"5\"><b>$tmp:  </b></font>";
					//echo  ."   -   ";
					$i++;
 						echo $key;
					echo "<br>"; 
				}
				
			}
		unset($tmp);
		unset($finfo);

	}
	$result->close(); 
}
echo "</table>"; 
echo "<a name='buttom'></a>"; 
echo "<a href='#top'>top</a>";
    /* free result set */
	echo "<br><a href='countrys.php?code=".$fra."'>Vuelta a la lista de paises</a>"; 		  

$mysqli->close();
?>
  
 </body>
</html>





</BODY>
</HTML>

