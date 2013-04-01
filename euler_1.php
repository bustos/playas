<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
	$valor=0;
	$tres=3;
	$cinco=5;
	for($i=3;$i<1000;$i++){
		if (($i%$tres)==0) 	  $valor=$valor+$i;
		elseif (($i%$cinco)==0) $valor=$valor+$i;
	}
	
	var_dump ($valor);
 ?> 
 </body>
</html>

</BODY>
</HTML>

