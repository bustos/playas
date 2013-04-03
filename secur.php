<?php
	session_start();
	if ($_POST["access_requested"]=="yes"){
	$nombre=$_POST["uname"];
	$clave=$_POST["pword"];
	$con=mysqli_connect("localhost","root","123","world");
		//$result = mysqli_query($con,"insert into usuarios (nombre,password,email) values('pepito',SHA('123'),'bustos@hotmail.com')");
	$result = mysqli_query($con,"SELECT nombre from usuarios where email='$nombre' and password=SHA('$clave')");
	while($row = mysqli_fetch_array($result)){
		$usuario=$row["nombre"];
		echo "<p>usuario: $usuario </p>";
	}
	
	}
	if ($_SESSION["Approved"]=="Yes"){
			echo "<p>Acceso concedido</p>";
	}
	else{
		$req_URL=$_SERVER["REQUEST_URI"];

print <<<GROUP1
<form action="$req_URL" method="POST">
<p>USERNAME: <input type="text" name="uname"></p>
<p>PASSWORD: <input type="password" name="pword"></p>
<input type="hidden" name="access_requested" value="yes">
<p><input type="submit" value="Login"></p>
</form>
GROUP1;
	exit;
	}
?>