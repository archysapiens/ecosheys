<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
require('../bd/bd.php');
include("../template/menu.php");
include("../helpers.php");
include("login/control_session.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
		<title>Servicios Ecosheys</title>
			<link href="<?=@$sufijo?>web/css/bootstrap.min.css" rel="stylesheet">
			<link href="<?=@$sufijo?>web/font-awesome/css/font-awesome.css" rel="stylesheet">
			<!-- Toastr style -->
			<link href="<?=@$sufijo?>web/css/plugins/toastr/toastr.min.css" rel="stylesheet">
			<link href="<?=@$sufijo?>web/css/tabsEcosheys.css" rel="stylesheet">
			<link href="<?=@$sufijo?>web/css/animate.css" rel="stylesheet">
			<link href="<?=@$sufijo?>web/css/style.css" rel="stylesheet">
			<link rel="icon" type="image/x-icon" href="<?=@$sufijo?>ico-echosheys.ico">
			<script type="text/javascript" src="<?=@$sufijo?>web/js/HelperJs/scripts/jquery-ui-1-11-2/jquery-1.11.2.js"></script>
			<?php function loadCss($loadCssHeader='') { 
				echo $loadCssHeader;
			} ?>
	</head>
	<body>
