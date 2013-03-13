<html>
<body>
<form action="ciudades.php" method="post">
<?php
$ciudad=$_POST["ciudad"];
$distrito=$_POST["distrito"];
$poblacion=$_POST["poblacion"];
$pais=$_POST["menu1"];
$code=$_POST["code"];
$tmp = "insert into City (Name,District,Population,CountryCode) values('$ciudad','$distrito','$poblacion','$code')";

echo "<form action='ciudades.php' method='post'>";
	$con=mysqli_connect("localhost","root","123","world");
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$resultc = mysqli_query($con,$tmp);
	$tmp=mysqli_insert_id($con);
	echo "<INPUT type='text' name='code' value='$tmp'><BR>"     ;
	//echo "<INPUT TYPE='button' value='Pulsa para volver' onClick=\"parent.location='ciudades.php?code=$tmp'\">";

	echo "<br>Insertado<br>";
?>

<INPUT TYPE='submit' value='Pulse para volver'>
</form>

</body>
</html>