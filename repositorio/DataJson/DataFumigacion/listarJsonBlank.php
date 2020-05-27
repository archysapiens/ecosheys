<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

session_start();

date_default_timezone_set('America/Mexico_City');
$FechaProcesoTS = date("Ymd");
$HoraProcesoTS = date("His");
$ArchivoDbg ="listarJsonBlank-".$FechaProcesoTS.$HoraProcesoTS.".dbg";
$Hnd = fopen($ArchivoDbg,"w");
$RutaDbg="";
if(isset($_GET['rutaJson']))
	$RutaDbg=$_GET['rutaJson'];

fwrite($Hnd, "RutaDbg >>".$RutaDbg."<< \n");



fwrite($Hnd, "Antes del if  \n");
$rutaJson='';
if(@$_GET['rutaJson']!=''){ 
	fwrite($Hnd, "Dentro del if  \n");
	$rutaJson = '../'.@$_GET['rutaJson']; 
	fwrite($Hnd, "Dentro del if  rutaJson > $rutaJson < \n");
}else{
	fwrite($Hnd, "Dentro del else  \n");

	$callback= @$_GET['callback'];
	$nomJson= @$_GET['nomJson'];
	$carpetJson= @$_GET['carpetJson'];

	$rutaJson = $carpetJson.'/'.$nomJson.'.json';
	fwrite($Hnd, "Dentro del else  rutaJson > $rutaJson < \n");

}

$sord = $_GET['sord']; 
$sidx = $_GET['sidx'];
$page = $_GET['page']; 
$limit = $_GET['rows']; 
 
$str_datos = file_get_contents("$rutaJson");
// $datos = json_decode($str_datos,true);
fclose($Hnd); 
print_r($str_datos);

?>