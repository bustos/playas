<?php

 
$tmp="9012534567890";
$tmp2=substr2($tmp,2,4);
//echo $tmp ."- ".$tmp2;
//strrev2($tmp);
//echo "<br>".$tmp; 

//$tmp2=strpos2($tmp,"12"); 
//echo "<br>busqueda de 12->".$tmp2;
$tmp="ÑZAGFHGFHJHG"; 
 strtolower2($tmp);
echo "<br>A MINUSCULAS->".$tmp;

strtoupper2($tmp);
echo "<br>A mayusculas->".$tmp;


function strtolower2 (&$str ){
	$longitud = strlen($str);
	
	
	for ($i=0; $i<$longitud;$i++){
		$tmp=ord($str{$i});	
	
		if ($tmp<91) 	$str{$i}=chr($tmp+32);
		
		
	}
	
}

function strtoupper2 (&$str ){
	$longitud = strlen($str);
	
	
	for ($i=0; $i<$longitud;$i++){
		$tmp=ord($str{$i});	
	
		if ($tmp>96) 	$str{$i}=chr($tmp-32);
		
		
	}
	
}


function strpos2($cadena ,$busqueda){
		
	$longitud1 = strlen($cadena);
	$longitud2 = strlen($busqueda);
	
	$cond=-1;
	$a=0;
	for ($i=0; $i<=$longitud1;$i++){
		if ($cadena{$i}==$busqueda{$a}) {
			$cond=$i;
			break;
		}
	}
	
	//echo $cadena{$i}."-".$busqueda{$a};
	for ($a=0; $a<$longitud2;$a++,$i++){
		echo $cadena{$i}."-".$busqueda{$a};
		if ($cadena{$i}!=$busqueda{$a}){ 	$cond=-1; }
		
		
	}
	
	return $cond;
}

function strrev2(&$str){
	$tmp=str_split ($str);
	$tamano=count($tmp);
	$tmp2=array();
	for($i=0;$i<$tamano;$i++){
		$tmp2[$i]=$tmp[$tamano-$i-1];
		
	}
	$str=implode($tmp2);

}

function substr2($str , $star , $ll){
	
	$tmp=str_split ($str);
	$tamano=count($tmp);
	$tmp2=array();
	$fin=$star+$ll;
	if ($fin>$tamano) $fin=$tamano;
	$cont=0;
	
	for($i=$star;$i<$fin;$i++){
	
		$tmp2[$cont]=$tmp[$i];
		$cont++;
	}
	
	return(implode($tmp2));
}



?>