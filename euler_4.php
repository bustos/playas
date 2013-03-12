<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php  
$fin1=999;
$fin2=999; 
$resultado=0;
	for($i=999;$i>0;$i--){
		for($i2=999;$i2>0;$i2--){
			$tmp=$i*$i2;
			if (palindromo($tmp)) {
					if ($tmp>$resultado){
							$resultado=$tmp;
							var_dump ($tmp);
					}
				}
			}
		}
	
	
	var_dump ($resultado);

function palindromo($i){
	$cadena = strval($i);
	$fin=strlen($cadena);
	$arr1 = substr($cadena,0,$fin/2);
	$arr2 =strrev( substr($cadena,$fin/2,$fin));
	if ($arr1==$arr2)  return true;
	else   return false;
	
 }
	
 ?> 
 </body>
</html>





</BODY>
</HTML>

