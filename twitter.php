<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <head>
  <title>PHP</title>
 </head>
 <body>
 <?php 

 
require("twitteroauth.php");
session_start();
/*$clave=$_POST["clave"];
$usuario=$_POST["usuario"];
$genero=$_POST["genero"];
$edad=$_POST["edad"];
//$pastime=$_POST["pastime"];


echo "Buscando la clave:  ".$clave."<br>";
echo "Buscando el usuario:  ".$usuario."<br>";
echo "de genero:  ".$genero."<br>";
echo "y edad: ".$edad."<br><br><br><br><br><br>";
foreach($_POST["pastime"] as $key=>$valor){
	echo "Aficion:  ".$valor."<br>";
}
*/
echo ini_get('max_execution_time');
//var_dump($usuario);

echo ini_get('max_execution_time');
if (strlen($usuario)>2)  tuit_line($usuario);
if (strlen($clave)>3) tuit_hastag($clave);

function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth('Yh6iXPn1ooDTJerPOsCtVw', 'dhte9OirebxYBrDMzGm4rKQjT8ubuYXiorqrKeuUfE', $oauth_token, $oauth_token_secret);
  return $connection;
}
 
function tuit_line($nombre)
{
	$connection = getConnectionWithAccessToken('1175525606-VqNgXi3qptL6wjt33Ewmy2LKJBnT0FyOyREMXeA', 'XQ3U44HTRfyBhNCwBSUnOFuxdrRkfSUULNz87W1w');
	
	$cadena="statuses/user_timeline.json?include_entities=true&include_rts=false&screen_name=@".$nombre."&count=999";
	//$cadena="https://api.twitter.com/1.1/application/rate_limit_status.json?resources=help,users,search,statuses";
	$content = $connection->get($cadena);
	//var_dump($content);

	for($i=0;$i<count($content);$i++) {  //$content->statuses	
		$tmp=$content[$i]->user->profile_image_url;
		echo "<img src='$tmp' title='Error' alt='Error' />";
		echo "<font size=\"3\"><b>".$content[$i]->user->screen_name." - </b></font>"; //$content->statuses[$i]->user->screen_name;
		if (strlen($content[$i]->text)>70) {
			$tmp=substr($content[$i]->text,0,70);
			echo "<font size=\"3\"><b>".$tmp." - <br></b></font>"; 
			$tmp=substr($content[$i]->text,70,139);
			echo "<font size=\"3\"><b>".$tmp." - </b></font>"; 

		
		}
		else	echo "<font size=\"3\"><b>".$content[$i]->text." - </b></font>"; //$content->statuses[$i]->text;
		echo "<font size=\"3\"><b>".fecha($content[$i]->created_at)."</b></font>";	  //$content->statuses[$i]->metadata->created_at);	
		
		echo "<br>";
	}
}

function tuit_hastag($clave)
{
	$connection = getConnectionWithAccessToken('1175525606-VqNgXi3qptL6wjt33Ewmy2LKJBnT0FyOyREMXeA', 'XQ3U44HTRfyBhNCwBSUnOFuxdrRkfSUULNz87W1w');
	$cadena="https://api.twitter.com/1.1/search/tweets.json?q=%23".$clave;
	$content = $connection->get($cadena);
	//var_dump($cadena);
//	echo json_encode($content->statuses);
	for($i=0;$i<count($content->statuses);$i++) {  //$content->statuses	
		$tmp=$content->statuses[$i]->user->profile_image_url;
		echo "<img src='$tmp' title='Error' alt='Error' />";
		echo "<font size=\"3\"><b>".$content->statuses[$i]->user->id_str." - </b></font>"; 
		echo "<font size=\"3\"><b>".$content->statuses[$i]->user->screen_name." - </b></font>"; //$content->statuses[$i]->user->screen_name;
		if (strlen($content->statuses[$i]->text)>70) {
			$tmp=substr($content->statuses[$i]->text,0,70);
			echo "<font size=\"3\"><b>".$tmp." - <br></b></font>"; 
			$tmp=substr($content->statuses[$i]->text,70,139);
			echo "<font size=\"3\"><b>".$tmp." - </b></font>"; 
			
		}
		else	echo "<font size=\"3\"><b>".$content->statuses[$i]->text." - </b></font>"; //$content->statuses[$i]->text;
 
		
	echo "<font size=\"3\"><b>".fecha($content->statuses[$i]->created_at)."</b></font>";	  //$content->statuses[$i]->metadata->created_at);			
		echo "<br>";
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
	return $dia."-".$mes."-".$ano;
 }


 ?> 

</BODY>
</HTML>