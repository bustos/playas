<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 

 
require("twitteroauth.php");
session_start();

function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth('Yh6iXPn1ooDTJerPOsCtVw', 'dhte9OirebxYBrDMzGm4rKQjT8ubuYXiorqrKeuUfE', $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken('1175525606-VqNgXi3qptL6wjt33Ewmy2LKJBnT0FyOyREMXeA', 'XQ3U44HTRfyBhNCwBSUnOFuxdrRkfSUULNz87W1w');

$nombre="tictactuit";
$cadena="statuses/user_timeline.json?include_entities=true&include_rts=false&screen_name=@".$nombre."&count=2300";
//$cadena="https://api.twitter.com/1.1/search/tweets.json?q=%23oferta";
$content = $connection->get($cadena);

//var_dump($content);
$con = mysql_connect("localhost","root","123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("twitter", $con);


for($i=0;$i<count($content);$i++) {  //$content->statuses
	
	//$tmp="select * from tuits ";
	$tmp1="INSERT INTO tuits (nombre, tuit, fecha) VALUES ('";
	$tmp2=$content[$i]->user->screen_name; //$content->statuses[$i]->user->screen_name;
	$tmp3=$content[$i]->text;//$content->statuses[$i]->text;
	$tmp4=fecha($content[$i]->created_at);	  //$content->statuses[$i]->metadata->created_at);	
	$final="')";
	$separa="','";
	$tmp=$tmp1 . $tmp2 .$separa. $tmp3.$separa . $tmp4 . $final;
	echo $tmp;
	$result=mysql_query($tmp);
	
	}
	mysql_close($con);
// Check connection
$con=mysqli_connect("localhost","root","123","twitter");
if (mysqli_connect_errno())  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM tuits");

	//while($row = mysqli_fetch_array($result))
  {
  echo $row['nombre'] . "-" . $row['nombre'];
  echo $row['tuit'] . "-" . $row['tuit'];
  echo $row['fecha'] . "-" . $row['fecha'];
  echo "<br />";
  }

mysqli_close($con);



 function fecha($cadfecha) {
	$ano="2013";
	$cadmes=substr($cadfecha, 4, 3);
	$dia=substr($cadfecha, 8, 2);
	$mes="01";
	if ($cadmes=="Feb") $mes="02";
	if ($cadmes=="Jan") $mes="01";
	if ($cadmes=="Feb") $mes="02";
	if ($cadmes=="Jan") $mes="01";
	return $ano."-".$mes."-".$dia;
 }


 ?> 

</BODY>
</HTML>