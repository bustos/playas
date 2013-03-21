<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
$nombre=$_GET["empresa"];
require("twitteroauth.php");
function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth('Yh6iXPn1ooDTJerPOsCtVw', 'dhte9OirebxYBrDMzGm4rKQjT8ubuYXiorqrKeuUfE', $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken('1175525606-VqNgXi3qptL6wjt33Ewmy2LKJBnT0FyOyREMXeA', 'XQ3U44HTRfyBhNCwBSUnOFuxdrRkfSUULNz87W1w');
//$con=mysqli_connect("localhost","cmuhpcac","ladegake","cmuhpcac_tictactuit");
$con=mysqli_connect("localhost","root","123","tictactuit");
if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

leegraba($con,$connection,$nombre);


function leegraba($con,$connection,$nombre){
		//	echo "<br>".$nombre. "<br>";
		$cadena="statuses/user_timeline.json?include_entities=true&include_rts=false&screen_name=@".$nombre."&count=2300";
		$content = $connection->get($cadena);
		
		for($i=0;$i<count($content);$i++) {  
			$tmp0="INSERT INTO tuits(idtwitter,idstr,tuit,fecha,urlimg) VALUES ('";			 
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
			//echo $tmp;
	
		}
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

 ?> 

