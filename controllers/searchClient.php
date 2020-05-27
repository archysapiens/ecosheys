<?php
session_start();
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
$sufijo='../'; $sufijoMenu='';
require('../clases/Client.php');

date_default_timezone_set('America/Mexico_City');
$FechaProcesoTS = date("Ymd");
$HoraProcesoTS = date("His");
$ArchivoDbg ="searchClient-".$FechaProcesoTS.$HoraProcesoTS.".dbg";
$Hnd = fopen($ArchivoDbg,"w");
$Programa =str_replace("/var/www/html/ecosheys2017/","" ,__FILE__)."-->".$HoraProcesoTS."-->";


fwrite($Hnd, $Programa."Explorando  \$_REQUEST \n");
foreach ($_REQUEST as $key => $value) {
	fwrite($Hnd, $Programa."$key => $value \n");
}

$Cliente = new Client();

	if(isset($_REQUEST['idClient'])){
		fwrite($Hnd,$Programa."Cliente->searchClient(_REQUEST['idClient']);\n");
		$Cliente->searchClient($_REQUEST['idClient']);
		
	}
	else if(isset($_REQUEST['no_clienteMo'])){
		$Cliente->searchUpdateClientMoral($_REQUEST);
		fwrite($Hnd,$Programa."Cliente->searchUpdateClientMoral(_REQUEST);\n");
	}
	else if(isset($_REQUEST['no_clienteFi'])){
		$Cliente->searchUpdateClient($_REQUEST);
		fwrite($Hnd,$Programa."Cliente->searchUpdateClient(_REQUEST);\n");
	}
	else
	{
	    fwrite($Hnd,$Programa." else \n");	

		require('../template/header.php');
		$loadCssHeader='<!-- Data Tables -->
						<link href="../web/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
						<link href="../web/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
						<link href="../web/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBetuqbipUER_7WRsoQsVpCghN6wR9G0JA"></script>';

		$breadcrumb='searchCliente';
		$breadcrumbPrincipal='Clientes Registrados de Servicios Ecosheys';
		$variables= array('sufijo'=>$sufijo,'sufijoMenu'=>$sufijoMenu,'breadcrumb'=>$breadcrumb,'breadcrumbPrincipal'=>$breadcrumbPrincipal,'loadCssHeader'=>$loadCssHeader);

		/*nombre del archivo a llamar y manda las variables*/

		view('searchClient',$variables);
		top_scroll();
		require('../template/footer.php');
		
	}
}
else{
    session_unset();
    echo"<script>;
    location.href = '../';
</script>";
}

fclose($Hnd);

?>
