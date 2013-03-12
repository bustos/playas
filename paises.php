<html>
<body>

<form action="twitter.php" method="post">


<?php
	$con=mysqli_connect("localhost","root","123","world");
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * FROM City order ny Name");
	$tmp="SELECT Code,Name FROM Country where Code LIKE '%".$clave=$_GET["code"]."%' order by Name";
	$result2 = mysqli_query($con,$tmp);
	echo "Pais: <select name='menu1'>";
	while($row = mysqli_fetch_array($result2)){
		echo "<option value='".$row['Name']."'>".$row['Name']."</option>";	
	}
	echo "</select><br>";


?>
<input type="text" name=" Ciudad" /		>    Ciudad: <br>
<input type="text" name=" Distrito" /	>  Distrito: <br>
<input type="text" name=" Poblacion" /	> Poblacion:<br>
<input type="text" name="Pais" /		>      Pais:<br>

<input type="submit"><br/><br/>
</form>

</body>
</html>