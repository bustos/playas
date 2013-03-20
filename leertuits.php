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
$clave=$_GET["categoria"];
$provincia=$_GET["provincia"];
$hastag=$_GET["hastag"];

tuit_clave($clave,$provincia,$hastag);


function tuit_clave($clave,$provincia,$hastag)
{
$tuit = new tuit(); 	
	//var_dump($clave);
	$con=mysqli_connect("localhost","cmuhpcac","ladegake","cmuhpcac_tictactuit");
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
		$tmptuits="SELECT tuits.idtwitter,tuit,urlimg,fecha,empresas.idtwitter,idprovincia as id,empresas.nombre as nomempresa FROM tuits,empresas where tuits.idtwitter=empresas.idtwitter";
		if (strlen($clave)>0) $tmptuits.=" and (idcategoria=$clave)";
		if (strlen($provincia)>0) $tmptuits.=" and idprovincia='$provincia'";
		if (strlen($hastag)>1) $tmptuits.=" and tuit like '%$hastag%'";
		$tmptuits.=" order by fecha desc";		
		//var_dump($tmptuits);
		$resultuits = mysqli_query($con,$tmptuits);
//		var_dump($resultuits);
		while($rowtuits = mysqli_fetch_array($resultuits)){
			$tuit->carga($rowtuits['id'],$rowtuits['tuit'],$rowtuits['urlimg'],$rowtuits['fecha'],$rowtuits['nomempresa']);
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