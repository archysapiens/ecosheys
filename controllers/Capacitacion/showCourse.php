<?php
session_start();
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
$sufijo='../../'; $sufijoMenu='../';
require('../../clases/Capacitacion.php');
require('../../bd/bd.php');
include("../../template/menu.php");
include("../../helpers.php");

$Capacitacion = new Capacitacion();

$loadCursos=$Capacitacion->loadCursos();
$SelectInstruct=$Capacitacion->loadSelectInstruct();

if(isset($_POST['formCreatedNewCurso'])){
		$Capacitacion->saveNewCourse($_POST);}
else if(@$_FILES['wizard-picture']['name']!=''){
		$nameImgCurso = $_FILES['wizard-picture']['name'];
		$tmpImgCurso = $_FILES['wizard-picture']['tmp_name'];
		$extImgCurso = pathinfo($nameImgCurso);					
		$urlnueva = "../../repositorio/loadCapacitacion/img/cursos/".$nameImgCurso;			
		if(is_uploaded_file($tmpImgCurso)){
			copy($tmpImgCurso,$urlnueva); }
		var_dump($extImgCurso);
		exit;
	}else{
 ?>
			<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="utf-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<!--meta name="viewport" content="width=device-width, initial-scale=1"-->
					<meta name="viewport" content="maximum-scale=1">
					<meta name="description" content="">
					<meta name="author" content="">
					<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
					<title>Servicios Ecosheys</title>					
						<link href="<?=@$sufijo?>web/css/bootstrap.min.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/font-awesome/css/font-awesome.css" rel="stylesheet">
						<!-- Toastr style -->
						<link href="<?=@$sufijo?>web/css/plugins/toastr/toastr.min.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/css/plugins/select2/4.0.3select2.min.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/css/animate.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/css/plugins/jqGrid/ui.jqgrid.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/css/timeLine.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
						<link href="<?=@$sufijo?>web/css/HelperCss/imagen.css" rel="stylesheet" rel="stylesheet" id="bootstrap-css">
						<link href="<?=@$sufijo?>web/css/style.css" rel="stylesheet">
						<link rel="icon" type="image/x-icon" href="<?=@$sufijo?>ico-echosheys.ico">
						<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
						<script type="text/javascript" src="<?=@$sufijo?>web/js/HelperJs/scripts/jquery-ui-1-11-2/jquery-1.11.2.js"></script>
						<link rel="stylesheet" href="<?=@$sufijo?>web/css/plugins/alert/alert.min.css">
						<style>body { -moz-transform: scale(0.9, 0.9); zoom: 0.9; zoom: 90%; }</style>
				</head>
				<body> <?php

					$loadCssHeader='';

					$breadcrumb='Servicios de Capacitacion';
					$breadcrumbPrincipal='Orden de Trabajo para Mantenimiento o Recarga';
					$variables= array('sufijo'=>$sufijo,'sufijoMenu'=>$sufijoMenu,'breadcrumb'=>$breadcrumb,'breadcrumbPrincipal'=>$breadcrumbPrincipal,'loadCssHeader'=>$loadCssHeader,'loadCursos'=>$loadCursos,'SelectInstruct'=>$SelectInstruct);

					view('Capacitacion/showCourse',$variables); 
					include("../login/control_session.php"); ?>
		
					
						<?php top_scroll(); ?>
						
						<!-- Mainly scripts -->
						<script src="<?=@$sufijo?>web/js/jquery-2.1.1.js"></script>
						<script src="<?=@$sufijo?>web/js/bootstrap.min.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/metisMenu/jquery.metisMenu.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/alert/alert.min.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/select2/select2.js"></script>
						<?php if( $_SESSION['sesionPrivi'].' '.$_SESSION['sesionArea'] == 'RESPONSABLE CAPACITACION') {?>
						<!--  Plugin for the Wizard -->
						<script src="<?=@$sufijo?>web/js/demo/jquery.bootstrap.js"></script>
						<script src="<?=@$sufijo?>web/js/demo/material-bootstrap-wizard.js"></script>
						<script src="<?=@$sufijo?>web/js/demo/jquery.validate.min.js"></script>
						<?php }?> 
						<!-- Modal 
						<script src="web/js/plugins/modal/jquery.modal.js"></script> -->
						<!-- Flot -->
						<script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.spline.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.resize.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.pie.js"></script>						
						<!-- Peity -->
						<script src="<?=@$sufijo?>web/js/plugins/peity/jquery.peity.min.js"></script>
						<!-- FooTable -->
						<script src="<?=@$sufijo?>web/js/plugins/footable/footable.all.min.js"></script>
						<!-- jqGrid -->
						<script src="<?=@$sufijo?>web/js/plugins/jqGrid/i18n/grid.locale-es.js"></script>					
						<script type="text/javascript" src="<?=@$sufijo?>web/js/plugins/jqgrid/jquery.jqGrid.min.js" ></script>
						<script type="text/javascript" src="<?=@$sufijo?>web/js/plugins/jqgrid/jqgridExcelExportClientSide.js" ></script>
						<script type="text/javascript" src="<?=@$sufijo?>web/js/plugins/jqgrid/jqgridExcelExportClientSide-libs.js" ></script>
						<!-- Custom and plugin javascript -->
						<script src="<?=@$sufijo?>web/js/inspinia.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/pace/pace.min.js"></script>
						<!-- Toastr -->
						<script src="<?=@$sufijo?>web/js/plugins/toastr/toastr.min.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> 
						<script src="<?=@$sufijo?>web/js/plugins/easyPaginate/jquery.easyPaginate.js"></script>
						<!-- Ladda -->
						<script src="<?=@$sufijo?>web/js/plugins/ladda/spin.min.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/ladda/ladda.min.js"></script>
						<script src="<?=@$sufijo?>web/js/plugins/ladda/ladda.jquery.min.js"></script>

						<script src="<?=@$sufijo?>web/js/apps.js"></script>	
						<script src="<?=@$sufijo?>web/js/plugins/jquery-ui/jquery-ui.min.js"></script>
						
						<!-- REQUIRED: Functional Widgets -->
						<script src="<?=@$sufijo?>web/js/plugins/smartwidgets/include/jarvis.widget.min.js"></script>
						 <!-- Data picker -->
						<script src="<?=@$sufijo?>web/js/plugins/datapicker/bootstrap-datepicker-spanish.js"></script>
						<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
									
						<script>
						$(document).ready(function(){
							App.init();
							$('.footable').footable();
							$('#txtCosto').mask("000", {reverse: true,placeholder: "Costo del Curso"});
							$('#txtDuration').mask("00", {reverse: false,placeholder: "Tiempo en horas"});
							$('#txtfechaCourse').mask("0000-00-00", {placeholder: "____-__-__"});
							// $('#txtfechaCourse .input-group.date').datepicker({
							$('#txtfechaCourse').datepicker({
								startView: 1,
								daysOfWeekDisabled: "0,6",
								keyboardNavigation: false,
								forceParse: false,
								autoclose: true,
								format: "yyyy-mm-dd"
							});						
						});
						// $('#easyPaginate').easyPaginate({
							// paginateElement: '.iboxRectangular',
							// elementsPerPage: 12,
							// effect: 'climb'
						// });
						</script>
						<script>
						$(document).ready(function (){
							Ladda.bind( '.ladda-button',{ timeout: 7000 });
							Ladda.bind( '.progress-demo .ladda-button',{
								callback: function( instance ){
									var progress = 0;
									var interval = setInterval( function(){
										progress = Math.min( progress + Math.random() * 0.1, 1 );
										instance.setProgress( progress );

										if( progress === 1 ){
											instance.stop();
											clearInterval( interval );
										}
									}, 400 );
								}
							});
						});
						</script><?php
		
	}
}
else{
    session_unset();
    echo"<script> location.href = '../../' </script>";
}
?>
