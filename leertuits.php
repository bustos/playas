 <?php 

class tuit
{ 
	public $empresa = array() ; 	
    public $texto 	= array() ; 
	public $url   	= array() ; 
	public $idtwitter = array() ; 
	public $fecha = array() ; 	
    
	function carga($nuevoidtw,$nuevoTexto,$nuevourl,$nuevofecha,$nuevoempresa) 
    { 
        array_push($this->empresa , $nuevoempresa); 
		array_push($this->texto , $nuevoTexto); 
		array_push($this->url , $nuevourl); 
		array_push($this->idtwitter , $nuevoidtw); 
		array_push($this->fecha , $nuevofecha); 
    } 
	function largo() {
		return(sizeof($this->texto));
	}
    function getTextos() 
    { 
        return $this->textos; 
    } 
     
} 
 
$clave=$_GET["clave"];
if (strlen($clave)>1) tuit_hastag($clave);

function tuit_hastag($clave)
{
$tuit = new tuit(); 	
	$con=mysqli_connect("localhost","root","123","twitter");
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$tmp="SELECT idtwitter,nombre FROM empresas where categoria like '%".$clave."%' or subcategoria like '%".$clave."%'";
	$result = mysqli_query($con,$tmp);
	
	while($row = mysqli_fetch_array($result)){
		$nombre=$row['nombre'];
	
		$tmptuits="SELECT idtwitter,tuit,urlimagen,fecha FROM tuits where idtwitter like '%".$row['idtwitter']."%'";
		
		$resultuits = mysqli_query($con,$tmptuits);
		while($rowtuits = mysqli_fetch_array($resultuits)){
			$tuit->carga($rowtuits['idtwitter'],$rowtuits['tuit'],$rowtuits['urlimagen'],$rowtuits['fecha'],$nombre);
		}

	}
	
	//var_dump($tuit);
	echo json_encode($tuit);	
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