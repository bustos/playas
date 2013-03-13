<html>
<body>

<?php
$code=$_GET["code"];
$tmp = "delete FROM City where id=".$code;
$code=$code+1;
echo "<form action='ciudades.php' method='post'>";
	$con=mysqli_connect("localhost","root","123","world");
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$resultc = mysqli_query($con,$tmp);
	
	echo "<br>Borrado<br>";
?>
<INPUT type="text" name="code"><BR>     
<input type="submit" value="Pulsa para volver"><br/><br/>
</form>

</body>
</html>