<html>
<body>

<form action="insert.php" method="post">
<?php
require("conection_info.php");
$code=$_GET["code"];


//$code=$_POST["code"];
	$con=mysqli_connect("localhost","root","123","world");
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$tmp = "SELECT * FROM City where id=".$code;
	$tmp2="SELECT Code,Name FROM Country";
	$resultc = mysqli_query($con,$tmp);
	$resultp = mysqli_query($con,$tmp2);
	
	while($rowciudad = mysqli_fetch_array($resultc)){
		$ciudad=$rowciudad['CountryCode'];
	
	echo "Ciudad: <input type='text' name='ciudad' value=".$rowciudad['Name']."><br>";
		echo "Distrito: <input type='text' name='distrito' value=".$rowciudad['District']."><br>";
		echo "Poblacion: <input type='text' name='poblacion' value=".$rowciudad['Population']."><br>";
		echo "codigo pais: <input type='text' name='code' value=".$ciudad."><br>";
	}
	echo "Paises: <select name='menu1'>";
	while($row = mysqli_fetch_array($resultp)){
		$ciudad2=$row['Code'];
		if ($ciudad==$ciudad2) echo "<option value='".$row['Name']."' selected>".$row['Name']."</option>";	
		else echo "<option value='".$row['Name']."'>".$row['Name']."</option>";	
		
	}
	echo "</select><br>";

	echo "<INPUT TYPE='button' value='submit' onClick=\"parent.location='exito.php?code=".$code."'\">";	
	echo "<INPUT TYPE='button' value='borra' onClick=\"parent.location='borra.php?code=".$code."'\">";
	


	
?>
<INPUT TYPE='submit' value='Insertar'>
 





</form>

</body>
</html>