
 <?php 
require("twitteroauth.php");

function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {
	 
	  $connection = new TwitterOAuth('Yh6iXPn1ooDTJerPOsCtVw', 'dhte9OirebxYBrDMzGm4rKQjT8ubuYXiorqrKeuUfE', $oauth_token, $oauth_token_secret);
	  return $connection;
	}
function cierre(){
		unlink('semaforo.txt');
	}
function fecha($cadfecha) {
	$ano=substr($cadfecha, 26, 4);
	$cadmes=substr($cadfecha, 4, 3);
	$dia=substr($cadfecha, 8, 2);
	$mes="01";
	$hor= substr($cadfecha, 11, 2);
	$hor= intval(substr($cadfecha, 11, 2));
	//echo ($cadfecha."->".$ano);
	if ($hor<23) $hor++;
	else $hor=0;
	$hora=substr($cadfecha, 14, 5);
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
	
	return $ano."-".$mes."-".$dia." ".$hor.":".$hora;
	
	
 }


$nombre_fichero = 'semaforo.txt';
if (file_exists($nombre_fichero)) {
	exit();
} else {
  //  echo "El fichero $nombre_fichero no existe";
}
	$myFile = "semaforo.txt";
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData = "semaforo\n";
	fwrite($fh, $stringData);
	fclose($fh);
	set_time_limit(0); 
	session_start();
	register_shutdown_function('cierre');
	$connection = getConnectionWithAccessToken('1175525606-VqNgXi3qptL6wjt33Ewmy2LKJBnT0FyOyREMXeA', 'XQ3U44HTRfyBhNCwBSUnOFuxdrRkfSUULNz87W1w');
	$con=mysqli_connect("localhost","root","123","tictactuit");
	if (mysqli_connect_errno())  {
		//echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$tcadena="https://api.twitter.com/1.1/application/rate_limit_status.json?resources=help,users,search,statuses";
	$tcontent = $connection->get($tcadena);
	var_dump($tcontent->resources);

	//$result = mysqli_query($con,"SELECT idtwitter FROM empresas");
	while($row = mysqli_fetch_array($result)){
		$nombre=$row['idtwitter'];
		$cadena="statuses/user_timeline.json?include_entities=true&include_rts=false&screen_name=@".$nombre."&count=2300";
		$content = $connection->get($cadena);
		echo count($content);
		var_dump($content);
		
		if (count($content)>3)
		for($i=0;$i<count($content);$i++) {  
			$tmp1=$nombre;
			echo "nombre: ".$nombre."<br>";
			$tmp0="INSERT INTO tuits(idtwitter,idstr,tuit,fecha,urlimg) VALUES ('";			 
			try{
				$tmp2=$content[$i]->text; 
				$tfecha=fecha($content[$i]->created_at);
				$tmp4=$content[$i]->user->profile_image_url;	  
				$tmp5=$content[$i]->id_str;
				$tcero="0";
				$final="')";
				$separa="','";
				$tmp=$tmp0.$tmp1 .$separa .$tmp5.$separa. $tmp2 .$separa. $tfecha.$separa. $tmp4 . $final;
				$result2=mysqli_query($con,$tmp);
			} catch (Exception $e) {
				var_dump($content);
				echo 'Caught exception: '.  $e->getMessage(). "\n";
			}
	
		}
		sleep(5);

	}
		mysqli_close($con);
	unlink('semaforo.txt');

 ?> 