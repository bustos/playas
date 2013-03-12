<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php  
$sudoku[0]=array(5,4,9,8,2,1,7,6,3);
$sudoku[1]=array(1,7,3,4,6,9,2,5,8);
$sudoku[2]=array(8,2,6,3,7,5,1,4,9);
$sudoku[3]=array(3,1,4,7,5,6,8,9,2);
$sudoku[4]=array(2,6,7,9,8,4,3,1,5);
$sudoku[5]=array(9,5,8,2,1,3,6,7,4);
$sudoku[6]=array(6,9,5,1,3,8,4,2,7);
$sudoku[7]=array(4,8,2,6,9,7,5,3,1);
$sudoku[8]=array(7,3,1,5,4,2,9,8,6);
$cont=0;
if (sudoku($sudoku)) echo "Sodoku correcto";
else echo "Sodoku incorrecto";
	
function sudoku($sud){
	$cond=true;
	$tmp=count($sud);
	foreach ($sud as $valor) {
		echo (implode ($valor));
		echo ("<br>");
		if (!cuadrante($valor)) return false;
	}
	for($a=0;$a<$tmp;$a++)  {
		for($i=0;$i<$tmp;$i++){
			$h1[$i]=$sud[$i][$a];
			$h2[$i]=$sud[$a][$i];
			
		}
		if (!cuadrante($h1)) return false;
		if (!cuadrante($h2)) return false;
	} 
	
	$cont1=0;
	$cont2=0;
	$cont3=0;
	for($a=0;$a<3;$a++)  {
			for($i=0;$i<3;$i++){	
			$c1[$cont1]=$sud[$a][$i];
			$c2[$cont1]=$sud[$a+3][$i];
			$c3[$cont1]=$sud[$a+6][$i];
			$cont1++;
		}
		if (!cuadrante($c1)) return false;
		if (!cuadrante($c2)) return false;
		if (!cuadrante($c3)) return false;
		for($i=3;$i<6;$i++){
			$c4[$cont3]=$sud[$a][$i];
			$c5[$cont3]=$sud[$a+3][$i];
			$c6[$cont3]=$sud[$a+6][$i];
			$cont3++;
		}
		if (!cuadrante($c4)) return false;
		if (!cuadrante($c5)) return false;
		if (!cuadrante($c6)) return false;
		for($i=6;$i<9;$i++){
			$c7[$cont2]=$sud[$a][$i];
			$c8[$cont2]=$sud[$a][$i];
			$c9[$cont2]=$sud[$a][$i];
			$cont2++;
		}
		if (!cuadrante($c7)) return false;
		if (!cuadrante($c8)) return false;
		if (!cuadrante($c9)) return false;
	}
	return $cond;
}

	
function cuadrante($c1){
	$cond=array_unique($c1);
	if ($cond==$c1) return true;
	else 	return false;
 } 	
 ?> 
 </body>
</html>



