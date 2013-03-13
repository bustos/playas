<html>
<body>

<form action="exito.php" method="post">
<?php
$code=$_POST["code"];


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
		echo "Ciudad: <input type='text' name=' Ciudad' value=".$rowciudad['Name']."><br>";
		echo "Distrito: <input type='text' name=' Ciudad' value=".$rowciudad['District']."><br>";
		echo "Poblacion: <input type='text' name=' Ciudad' value=".$rowciudad['Population']."><br>";
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
     
 





</form>

</body>
</html>