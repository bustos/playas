<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 

require("twitteroauth.php");
$nombre_fichero = 'semaforo.txt';
/*
if (file_exists($nombre_fichero)) {
    echo "El fichero $nombre_fichero existe";
	//exit();
} else {
    echo "El fichero $nombre_fichero no existe";
}
*/

$myFile = "semaforo.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "semaforo\n";
fwrite($fh, $stringData);
fclose($fh);
set_time_limit(0); 
session_start();

function cierre(){
    // Esta es nuestra función de cierre,
    // aquí podemos hacer las últimas operaciones
    // antes de que el script sea completado.
	echo "borrando semaforo";
	unlink("semaforo.txt");
}

register_shutdown_function('cierre');

function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {
  set_time_limit(0); 
  $connection = new TwitterOAuth('Yh6iXPn1ooDTJerPOsCtVw', 'dhte9OirebxYBrDMzGm4rKQjT8ubuYXiorqrKeuUfE', $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken('1175525606-VqNgXi3qptL6wjt33Ewmy2LKJBnT0FyOyREMXeA', 'XQ3U44HTRfyBhNCwBSUnOFuxdrRkfSUULNz87W1w');
$con=mysqli_connect("localhost","root","123","twitter");

	$tcadena="https://api.twitter.com/1.1/application/rate_limit_status.json?resources=help,users,search,statuses";
	echo "Concectando a twitter";
	$tcontent = $connection->get($tcadena);
	var_dump($tcontent->resources);

//do{
	//leegraba($con,$connection);
//}while(true);
mysqli_close($con);


function leegraba($con,$connection){
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	

$result = mysqli_query($con,"SELECT * FROM empresas");

	while($row = mysqli_fetch_array($result)){
		$nombre=$row['idtwitter'];
		echo "<br>".$nombre. "<br>";
		$cadena="statuses/user_timeline.json?include_entities=true&include_rts=false&screen_name=@".$nombre."&count=2300";
		$content = $connection->get($cadena);
		for($i=0;$i<count($content);$i++) {  
			$tmp0="INSERT INTO tuits(idtwitter,idstr,tuit,fecha,urlimagen) VALUES ('";			 
			$tmp1=$content[$i]->user->screen_name;
			$tmp2=$content[$i]->text; 
			$tfecha=fecha($content[$i]->created_at);
			$tmp4=$content[$i]->user->profile_image_url;	  
			$tmp5=$content[$i]->id_str;
			$tcero="0";
			$final="')";
			$separa="','";
			$tmp=$tmp0.$tmp1 .$separa .$tmp5.$separa. $tmp2 .$separa. $tfecha.$separa. $tmp4 . $final;
			$result2=mysqli_query($con,$tmp);
	
		}
		sleep(40);

	}
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
	return $ano."-".$mes."-".$dia;
 }

 ?> 

</BODY>
</HTML>