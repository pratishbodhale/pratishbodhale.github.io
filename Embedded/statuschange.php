<?php 

$param = $_GET['param'];
var_dump($param);
// if($param=='true'){
// 	$param = 1;
// }
// elseif($param=='false'){
// 	$param = 0;
// }
$myfile = fopen("override.txt", "r") or die("Unable to open file!");
fwrite($myfile, $param);
fclose($myfile);

?>