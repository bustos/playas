<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <head>
  <title>PHP</title>
 </head>
 <body>
 <?php 

class tuit
{ 
    private $texto 	= array() ; 
	private $url   	= array() ; 
	private $idtwitter = array() ; 
	private $fecha = array() ; 	
    function carga($nuevoTexto) 
    { 
        array_push($this->texto , $nuevoTexto); 
    } 
    function getTextos() 
    { 
        return $this->textos; 
    } 
     
} 
 
$clave=$_GET["clave"];
if (strlen($clave)>2) tuit_hastag($clave);

function tuit_hastag($clave)
{
$tuit = new tuit(); 	
	$con=mysqli_connect("localhost","root","123","twitter");
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$tmp="SELECT idtwitter FROM empresas where categoria like '%".$clave."%' or subcategoria like '%".$clave."%'";
	$result = mysqli_query($con,$tmp);
	while($row = mysqli_fetch_array($result)){
		$tmptuits="SELECT idtwitter FROM empresas where categoria like '%".$clave."%' or subcategoria like '%".$clave."%'";
		$resultuits = mysqli_query($con,$tmptuits);
		while($rowtuits = mysqli_fetch_array($resultuits)){
			echo $rowtuits['tuit'] . 
			echo "<br />";
			$tuit->carga($row['tuit']);
		}

	}

	echo json_encode($tuit);	
	var_dump($tuit);
	
mysqli_close($con);

}

 function fecha($cadfecha) {
	$ano="2013";
	$cadmes=substr($cadfecha, 4, 3);
	$dia=substr($cadfecha, 8, 2);
	$mes="01";
	if ($cadmes=="Jan") $mes="01";
	if ($cadmes=="Feb") $mes="02";	
	if ($cadmes=="Mar") $mes="03";
	if ($cadmes=="Apr") $mes="04";
	if ($cadmes=="May") $mes="05";
	if ($cadmes=="Jun") $mes="06";	
	if ($cadmes=="Jul") $mes="07";
	if ($cadmes=="Aug") $mes="08";
	if ($cadmes=="Sep") $mes="09";
	if ($cadmes=="Oct") $mes="10";	
	if ($cadmes=="Nov") $mes="11";
	if ($cadmes=="Dec") $mes="12";
	return $dia."-".$mes."-".$ano;
 }


 ?> 

</BODY>
</HTML>