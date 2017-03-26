<?php 

// date_default_timezone_set('Asia/Kolkata');
// echo date('d-m-Y H:i');

$myfile = fopen("override.txt", "r") or die("Unable to open file!");

$php_sunset_time = date('Y-m-d H:i:s', strtotime(date_sunset(date(), SUNFUNCS_RET_STRING, 22.3460, 87.2320, 100, 5.5)));
$php_sunrise_time = date('Y-m-d H:i:s', strtotime(date_sunrise(date(), SUNFUNCS_RET_STRING, 22.3460, 87.2320, 100, 5.5)));


$current = date('Y-m-d H:i:s'); 

echo "Sunrise:    ".$php_sunrise_time."<br>";
echo "Sunset:&nbsp;&nbsp;".$php_sunset_time."<br>";
echo "Current:    ".$current."<br>";
echo "Override: ".fread($myfile,filesize("override.txt"))."<br>";
fclose($myfile);

///////*********** CURL TIME OUTPUT****************///////////////
// $ch = curl_init();
// $headers = array(
// 'Accept: application/json',
// 'Content-Type: application/json',

// );
// curl_setopt($ch, CURLOPT_URL,"http://api.sunrise-sunset.org/json?lat=22.3460&lng=87.2320&date=today");
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// // Timeout in seconds
// curl_setopt($ch, CURLOPT_TIMEOUT, 30);

// $authToken = curl_exec($ch);
// $php_arr = json_decode($authToken, true);
// var_dump($php_arr["results"]["sunset"]);

// $time = strtotime($php_arr["results"]["sunset"]);
// $time = strtotime($php_sunset_time);

// $newformat = $time);
// echo $newformat;

if(($current<$php_sunset_time && $current<$php_sunrise_time)||($current>$php_sunset_time && $current>$php_sunrise_time)){
	echo 1;
}
else{
	echo 0;
}

?>