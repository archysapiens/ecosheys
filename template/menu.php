<?php 
error_reporting(0);

function table($sufifo="../") 
{ 
?>
<!-- DO NOT REMOVE: Theme Config file -->
<script src="<?=@$sufifo?>web/js/plugins/smartwidgets/config.js"></script>
<!-- Tinycon -->
<script src="<?=@$sufifo?>web/js/plugins/tinycon/tinycon.min.js"></script>
<script src="<?=@$sufifo?>web/js/jquery.vibrate.min.js"></script>
<style>
@media screen and (max-width: 600px){
	#logo-ecosheys{
		width:170px;
		height:50px;
	}
	h2{
		font-size: 14px;
	}
	.welcome-messagee{
		font-size: 5.8px;
		padding-left:5px;
	}
}
@-moz-document url-prefix() {
    .btn {
		white-space: normal;
	}
}

/** ecosheys_debug 
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
**/
</style>
<table align="center" id="TableTopNav" height="60" style="width: 100%">
	<tr>
		<td width="40%" align="left"><a href="inicio.php"><img src="<?=$sufifo?>web/img/EcoSheys-RINO-DIBUJO.png" id="logo-ecosheys" width="250px" height="75px"/></a></td>
		<td width="60%" align="right">
			<div class="col-lg-11"><h2> Sistema Administrativo Empresarial </h2></div>
		</td>
	</tr>
</table>
<?php 
}
?>
<?php 
// function navbar($activeDesk,$activeAdmin,$activeFumi,$activeExtin,$activeCourse,$activeInscrip,$sufifo="../",$sufijoMenu="") 
function navbar($activeMod,$sufifo="../",$sufijoMenu="") 
{ 
?>
<!-- Fixed navbar -->
<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element text-center"> 
					<span><img alt="image" class="img-circle"  height="65" width="60" src="<?=$sufifo?>web/img/trabajador.jpg" /></span>
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<span class="clear"> 
							<span class="block m-t-xs"><strong class="font-bold text-muted"><?=@$_SESSION['sesionUsuario']?></strong></span> 
							<span class="text-muted text-xs block"> <?=ucfirst(strtolower($_SESSION['sesionPrivi']));?> <b class="caret"></b></span> 
						</span> 
					</a>
					<ul class="dropdown-menu animated fadeInRight m-t-xs">
						<li class="dropdown-item"><a href="#">Perfil</a></li>
						<li class="divider"></li>
						<li class="dropdown-item"><a href="#" id="buttonLockScreen">Bloquear</a></li>
						<li class="divider"></li>
						<li class="dropdown-item"><a href="#" class="mb-control" data-box="#mb-signout">Salir</a></li>
					</ul>
				</div>
				<div class="logo-element">
					<span><img alt="image" class="img-circle"  height="35" width="35" src="<?=$sufifo?>web/img/trabajador.jpg" /></span>
				</div>
			</li>
			<!--li class=""-->
				<!-- a href="#"><i class="fa fa-th-large"></i><span class="nav-label">Modulos</span><span class="fa arrow"></span></a-->
				<li class="<?php if($activeMod=='activeDesk'){echo "active";}?>">
					<a id="evirtual" href="<?=$sufijoMenu?>inicio.php" class="btn btn-w-m btn-outline btn-default">
						<i class="fa  fa-desktop fa-2x pull-left"></i>
						<span class="nav-label">Escritorio</span>
					</a>
				</li>				
				<?php if( $_SESSION['sesionPrivi'] == 'CLIENTE' or $_SESSION['sesionPrivi'] == 'TECNICO' or $_SESSION['sesionPrivi'] == 'RESPONSABLE') {?>
				<li class="<?php if($activeMod=='activeAdmin'){echo "active";}?>">
					<a id="ecosheys-adm" href="#" class="btn btn-w-m btn-outline btn-default"><i class="fa fa-clipboard fa-2x pull-left"></i> <span class="nav-label"> Administración </span><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;">
						<li><a href="<?=$sufijoMenu?>Fumigacion/validFumigacion.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><span class="nav-label"> Fumigación PDF</span></a></li>
						<li><a href="<?=$sufijoMenu?>Extintores/validExtintores.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><span class="nav-label"> Extintores PDF</span></a></li>
						<li><a href="<?=$sufijoMenu?>Capacitacion/validCapacitacion.php" style="margin-bottom:-10px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><span class="nav-label"> Capacitación PDF</span></a></li>
					</ul>
				</li>
				<li class="divider"></li>
				<?php }?>
				<?php// if( $_SESSION['sesionPrivi'] == 'TECNICO') {?>
				<!--li class="<?//=@$activeAdmin?>">
					<a id="ecosheys-adm-tec" href="#" class="btn btn-w-m btn-outline btn-default"><i class="fa fa-cogs fa-2x pull-left"></i> <span class="nav-label"> Servicios </span><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;">						
						<li><a href="<?//=$sufijoMenu?>Fumigacion/conRodenticida.php" style="margin-bottom:-10px;font-size:12px;"><img src="<?=$sufifo?>web/images/fa-icons/rodenticida.png" width="20" height="20" style="margin-left:-8px;"/><span class="nav-label"> Certificado Roedores</span></a></li>
					</ul>
				</li>
				<li class="divider"></li-->
				<?php// }?>
				<?php if( $_SESSION['sesionPrivi'] == 'ADMINISTRADOR') {?>
				<li class="<?php if($activeMod=='activeAdmin'){echo "active";}?>">
					<a id="ecosheys-adm" href="#" class="btn btn-w-m btn-outline btn-default"><i class="fa fa-clipboard fa-2x pull-left"></i> <span class="nav-label"> Administración </span><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;">
						<li><a href="<?=$sufijoMenu?>newClient.php"><i class="fa fa-user-plus" aria-hidden="true"></i><span class="nav-label"> Nuevo</span></a></li>
						<li><a href="<?=$sufijoMenu?>searchClient.php"><i class="fa fa-search" aria-hidden="true"></i><span class="nav-label"> Buscar</span></a></li>
						<!--li><a href="<?=$sufijoMenu?>Planeacion.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="nav-label"> Planeación</span></a></li-->
						<!--li><a href="searchContrato.php" style="margin-bottom:-10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span class="nav-label"> Contrato</span></a></li-->
						<li><a href="<?=$sufijoMenu?>adminFiles.php"><i class="fa fa-file" aria-hidden="true"></i><span class="nav-label"> Archivos</span></a></li>
						<li><a href="<?=$sufijoMenu?>uploadUser.php" style="margin-bottom:-10px;"><i class="fa fa-upload" aria-hidden="true"></i><span class="nav-label"> Subir Excel</span></a></li>
					</ul>
				</li>
				<li class="divider"></li>
				<li class="<?php if($activeMod=='activeFumi'){echo "active";}?>">
					<a id="ecosheys-fum" href="#" class="btn btn-w-m btn-outline btn-default ">
						<i class="fa  fa-bug fa-2x pull-left"></i>
						<span class="nav-label">Fumigación</span><span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;">
						<li><a href="<?=$sufijoMenu?>Fumigacion/newFumigacion.php" style="font-size:12px;"><img src="<?=$sufifo?>web/images/fa-icons/certificate.png" width="20" height="20" style="margin-left:-8px;"/><span class="nav-label"> Certificado Fumigación</span></a></li>
						<li><a href="<?=$sufijoMenu?>Fumigacion/conRodenticida.php" style="font-size:12px;"><img src="<?=$sufifo?>web/images/fa-icons/rodenticida.png" width="20" height="20" style="margin-left:-8px;"/><span class="nav-label"> Certificado Roedores</span></a></li>
						<li><a href="<?=$sufijoMenu?>Fumigacion/conMoscas.php"><img src="<?=$sufifo?>web/images/fa-icons/moscFumi.png" width="20" height="20" style="margin-left:-8px;"/><span class="nav-label"> Moscas</span></a></li>
						<li><a href="<?=$sufijoMenu?>Fumigacion/lisLamparas.php" style="margin-bottom:-10px;"><img src="<?=$sufifo?>web/images/fa-icons/lampara2.png" width="20" height="20" style="margin-left:-8px;"/><span class="nav-label"> Lámparas</span></a></li>
					</ul>
				</li>
				<li class="divider"></li>
				<li class="<?php if($activeMod=='activeExtin'){echo "active";}?>">
					<a id="ecosheys-ext" href="#" class="btn btn-w-m btn-outline btn-default ">
						<i class="fa  fa-fire-extinguisher fa-2x pull-left"></i>
						<span class="nav-label">Extintores</span><span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;">
						<li><a href="<?=$sufijoMenu?>Extintores/newExtintores.php" style="margin-bottom:-10px;" style="font-size:12px;"><img src="<?=$sufifo?>web/images/fa-icons/iconExt.png" width="20" height="20" style="margin-left:-8px;"/><span class="nav-label"> Orden de Trabajo</span></a></li>						
					</ul>
				</li>
				<li class="divider"></li>
				<li class="<?=@$activeRp?>">
					<a id="ecosheys-rp" href="#" class="btn btn-w-m btn-outline btn-default ">
						<i class="fa  fa-recycle fa-2x pull-left"></i>
						<span class="nav-label">RP</span>
					</a>
				</li>
				<li class="divider"></li>
				<li class="<?=@$activeRpbi?>">
					<a id="ecosheys-rpbi" href="#" class="btn btn-w-m btn-outline btn-default ">
						<i class="fa fa-exclamation-triangle  fa-2x pull-left"></i>
						<span class="nav-label">RPBI</span>
					</a>
				</li>
				<li class="divider"></li>
				<li class="<?=@$activeCapaci?>">
					<a id="ecosheys-cap" href="#" class="btn btn-w-m btn-outline btn-default ">
						<i class="fa  fa-graduation-cap fa-2x pull-left"></i>
						<span class="nav-label">Capacitación</span><span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;">
						<li><a href="<?=$sufijoMenu?>Capacitacion/newExtintores.php" style="margin-bottom:-10px;" style="font-size:12px;"><img src="<?=$sufifo?>web/images/fa-icons/iconExt.png" width="20" height="20" style="margin-left:-8px;"/><span class="nav-label"> Constancias</span></a></li>						
					</ul>
				</li>
				<li class="divider"></li>
				<li class="<?=@$activeEstu?>">
					<a id="ecosheys-est" href="#" class="btn btn-w-m btn-outline btn-default ">
						<i class="fa  fa-flask fa-2x pull-left"></i>
						<span class="nav-label">Estudios  </span>
					</a>
				</li><?php }?>
				<?php if( $_SESSION['sesionPrivi'] == 'ALUMNO') {?>
				<li class="divider"></li>
				<li class="<?php if($activeMod=='showCourse'){echo "active";}?>">
                    <a id="ecosheys-MisCurso" href="#" class="btn btn-w-m btn-outline btn-default"><i class="fa fa-clipboard fa-2x pull-left"></i> <span class="nav-label">  Mis cursos</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;">
                        <li><a href="<?=$sufijoMenu?>Capacitacion/showInstruct.php"><i class="fa fa-users"></i>Instructores</a></li>
                        <li><a href="<?=$sufijoMenu?>Capacitacion/showCourse.php" style="margin-bottom:-10px;"><i class="fa fa-file"></i>Cursos</a></li>                    
					</ul>
                </li>
				<li class="divider"></li>
                <li class="<?php if($activeMod=='showLogros'){echo "active";}?>">
                    <a id="ecosheys-logros" href="#" class="btn btn-w-m btn-outline btn-default"><i class="fa fa-trophy fa-2x pull-left"></i> <span class="nav-label">Logros </span> <span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;">                        
                        <li><a href="<?=$sufijoMenu?>Capacitacion/showLogros.php" style="margin-bottom:-10px;"><i class="fa fa-file"></i>Archivos PDF</a></li>                    
					</ul>
				</li>
                <li class="divider"></li>
                <li class="<?php if($activeMod=='NewInscrip'){echo "active";}?>">
                    <a id="ecosheys-logros" href="<?=$sufijoMenu?>Capacitacion/newInscrip.php" class="btn btn-w-m btn-outline btn-default"><i class="fa fa-user-plus fa-2x pull-left"></i> <span class="nav-label">Inscribirse </span></a>
                </li>
				<?php }?>
				<?php if( $_SESSION['sesionPrivi'] == 'INSTRUCTOR') {?>
				<li class="divider"></li>
				<li class="<?php if($activeMod=='showDouments'){echo "active";}?>">
                    <a id="ecosheys-MisDatos" href="#" class="btn btn-w-m btn-outline btn-default"><i class="fa fa-clipboard fa-2x pull-left"></i> <span class="nav-label"> Datos Personales</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;">
                        <li><a href="<?=$sufijoMenu?>Capacitacion/showDouments.php" style="margin-bottom:-10px;"><i class="fa fa-file-pdf-o"></i>Documentos</a></li>                    
					</ul>
                </li>
				<li class="divider"></li>
                
				<?php }?>
				<?php if( $_SESSION['sesionPrivi'].' '.$_SESSION['sesionArea'] == 'RESPONSABLE CAPACITACION') {?>
				<li class="divider"></li>
				<li class="<?php if($activeMod=='showCourse'){echo "active";}?>"> 
					<a id="ecosheys-cap" href="#" class="btn btn-w-m btn-outline btn-default ">
						<i class="fa  fa-graduation-cap fa-2x pull-left"></i>
						<span class="nav-label">Capacitación</span><span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;"> 
						<li><a href="<?=$sufijoMenu?>Capacitacion/showInstruct.php"><i class="fa fa-users"></i>Instructores</a></li>
						<li><a href="<?=$sufijoMenu?>Capacitacion/showCourse.php" ><i class="fa fa-file"></i>Cursos</a></li> 
					    <li ><a href="<?=$sufijoMenu?>Capacitacion/showConstancias.php" style="margin-bottom:-10px;"><i class="fa fa-certificate"></i>DC3/Constancias	</a></li>
					</ul>
				</li>
                
				<?php }?>
				<?php if( $_SESSION['sesionPrivi'].' '.$_SESSION['sesionArea'] == 'RESPONSABLE PROTECCION_CV') {?>
				<li class="divider"></li>
				<li class="<?php if($activeMod=='ProteCivil'){echo "active";}?>"> 
					<a id="ecosheys-cap" href="#" class="btn btn-w-m btn-outline btn-default ">
						<i class="fa fa-ambulance fa-2x pull-left"></i>
						<span class="nav-label">Proteccion Civil</span><span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level collapse" style="background-color: #FCFEFF;"> 
					    <li><a href="<?=$sufijoMenu?>Capacitacion/generateConstan.php" style="margin-bottom:-10px;"><i class="fa fa-file-pdf-o"></i>Constancias</a></li>
					</ul>
				</li>
                
				<?php }?>
			<!--/li-->
		</ul>
	</div>
</nav>
<?php 
}
?>
<?php 
function navbarWrapper($sufifo="../",$sufijoMenu="") 
{ 
// require(''.$sufifo.'clases/Alert.php');
// $Alert = new Alert();
?>

<div class="row border-bottom">
	<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<a id="btn-minimalize" class="navbar-minimalize minimalize-styl-2 btn btn-white" href="#">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<ul class="nav navbar-top-links navbar-right">
			<li>
				<span class="m-r-sm text-muted welcome-message">Ecosheys es una Solución Integral en Seguridad, Higiene Industrial y Medio Ambiente
				</span>
			</li>
			<li class="dropdown d-inline" id="widget-grid">
				<a id="enc-num-msgs" class="dropdown-toggle count-info" data-toggle="dropdown" href="#" data-widget-refresh="15" data-widget-load="<?=@$sufifo?>clases/AlertAjax.php?numAlert=numAlert">
					<?php //$Alert->numAlert($_SESSION['sesionNomUser'],$_SESSION['sesionPrivi']); ?>																		
						<div></div>													
					<!--i class="fa fa-bell"></i-->
					<!--span id="num-msgs" class="label label-primary"></span-->
				</a>
				<ul class="dropdown-menu dropdown-alerts" data-widget-refresh="15" data-widget-load="<?=@$sufifo?>clases/AlertAjax.php?contentAlert=contentAlert&sufijo=<?=@$sufifo?>&sufijoMenu=<?=@$sufijoMenu?>">											
                    <?php //$Alert->contentAlert($sufijoMenu,$sufifo);?>
					<div></div>	
					<li class="divider"></li> 
				</ul>
			</li>
			<!--li>
				<a href="login/logout.php" id="cali">
					<i class="fa fa-sign-out"></i> Salir
				</a>
			</li-->
			<!-- SIGN OUT -->
			<li class="xn-icon-button pull-right">
				<a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Salir</a>                        
			</li> 
			<!-- END SIGN OUT -->
		</ul>
	</nav>
</div>
<script>
$('#buttonLockScreen').click(function(){
	// Lockscreen
	var hrefUrlLockscreen = '<?=@$sufijoMenu?>login/lockscreen.php?lock=lock';												
	$("body").load(hrefUrlLockscreen); 
	location.reload();
});
$('a#btn-minimalize').click(function() {
	var miniNavbar = $('body').attr('class');
	$('a#evirtual, a#ecosheys-adm, a#ecosheys-fum, a#ecosheys-ext, a#ecosheys-rp, a#ecosheys-rpbi, a#ecosheys-cap, a#ecosheys-est, a#ecosheys-adm-tec').removeClass('btn-w-m');
		$('.fa-desktop, .fa-clipboard, .fa-bug, .fa-fire-extinguisher, .fa-recycle, .fa-exclamation-triangle, .fa-graduation-cap, .fa-flask, .fa-cogs').removeClass('pull-left fa-2x');
		$('.fa-desktop, .fa-clipboard, .fa-bug, .fa-fire-extinguisher, .fa-recycle, .fa-exclamation-triangle, .fa-graduation-cap, .fa-flask, .fa-cogs').addClass('');
		$('ul.nav.nav-second-level.collapse').addClass('show');
		$('ul.nav.nav-second-level.collapse').css('min-width','40px');
		$('ul.nav.nav-second-level.collapse').css('position','initial');
		$('ul.nav.nav-second-level.collapse').css({'padding':'0px 0px 0px 27px'});
		$('.nav > li > a').css({'padding':'6px 6px 6px 6px'});
	if(miniNavbar=='pace-done mini-navbar'){
		$('a#evirtual, a#ecosheys-adm, a#ecosheys-fum, a#ecosheys-ext, a#ecosheys-rp, a#ecosheys-rpbi, a#ecosheys-cap, a#ecosheys-est, a#ecosheys-adm-tec').addClass('btn-w-m').removeAttr("style");
		$('.fa-desktop, .fa-clipboard, .fa-bug, .fa-fire-extinguisher, .fa-recycle, .fa-exclamation-triangle, .fa-graduation-cap, .fa-flask, .fa-cogs').addClass('pull-left fa-2x');
		$('.fa-desktop, .fa-clipboard, .fa-bug, .fa-fire-extinguisher, .fa-recycle, .fa-exclamation-triangle, .fa-graduation-cap, .fa-flask, .fa-cogs').removeClass('');
		$('ul.nav.nav-second-level.collapse').removeClass('show').removeAttr('style');
		$('.nav-second-level li a').css({'padding':'7px 10px 7px 10px','padding-left':'52px'});
	}else if(miniNavbar=='pace-done'){
		$('a#evirtual, a#ecosheys-adm, a#ecosheys-fum, a#ecosheys-ext, a#ecosheys-rp, a#ecosheys-rpbi, a#ecosheys-cap, a#ecosheys-est, a#ecosheys-adm-tec').removeClass('btn-w-m');
		$('.fa-desktop, .fa-clipboard, .fa-bug, .fa-fire-extinguisher, .fa-recycle, .fa-exclamation-triangle, .fa-graduation-cap, .fa-flask, .fa-cogs').removeClass('pull-left fa-2x');
		$('.fa-desktop, .fa-clipboard, .fa-bug, .fa-fire-extinguisher, .fa-recycle, .fa-exclamation-triangle, .fa-graduation-cap, .fa-flask, .fa-cogs').addClass('');
		$('ul.nav.nav-second-level.collapse').css({'background-color':'#FCFEFF'});
	}

});
</script>
		<style>
		/* message box */
		.message-box {
		  display: none;
		  position: fixed;
		  left: 0px;
		  top: 0px;
		  width: 100%;
		  height: 100%;
		  background: rgba(0, 0, 0, 0.5);
		  z-index: 9999;
		}
		.message-box.open {
		  display: block;
		}
		.message-box .mb-container {
		  position: absolute;
		  left: 0px;
		  top: 35%;
		  background: #18a689;
		  opacity:0.8;
		  padding: 20px;
		  width: 100%;
		}
		.message-box .mb-container .mb-middle {
		  width: 50%;
		  left: 25%;
		  position: relative;
		  color: #FFF;
		}
		.message-box .mb-container .mb-middle .mb-title {
		  width: 100%;
		  float: left;
		  padding: 10px 0px 0px;
		  font-size: 31px;
		  font-weight: 400;
		  line-height: 36px;
		}
		.message-box .mb-container .mb-middle .mb-title .fa,
		.message-box .mb-container .mb-middle .mb-title .glyphicon {
		  font-size: 38px;
		  float: left;
		  margin-right: 10px;
		}
		.message-box .mb-container .mb-middle .mb-content {
		  width: 100%;
		  float: left;
		  padding: 10px 0px 0px;
		}
		.message-box .mb-container .mb-middle .mb-content p {
		  margin-bottom: 0px;
		}
		.message-box .mb-container .mb-middle .mb-footer {
		  width: 100%;
		  float: left;
		  padding: 10px 0px;
		}
		.message-box.message-box-warning .mb-container {
		  background: rgba(254, 162, 35, 0.9);
		}
		.message-box.message-box-danger .mb-container {
		  background: rgba(182, 70, 69, 0.9);
		}
		.message-box.message-box-info .mb-container {
		  background: rgba(63, 186, 228, 0.9);
		}
		.message-box.message-box-success .mb-container {
		  background: rgba(149, 183, 93, 0.9);
		}
		/* end message box */
		</style>
		<style>
		@media screen and (max-width: 600px){
			.message-box .mb-container {
				top: 22%;
			}
			.message-box .mb-container .mb-middle .mb-title {
				float: left;
				padding: 10px 0px 0px;
				font-size: 21px;
				font-weight: 400;
				line-height: 36px;
				width:160%;
			}
		}
		</style>

		<!-- MESSAGE BOX-->
			<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
				<div class="mb-container">
					<div class="mb-middle">
						<div class="mb-title"><span class="fa fa-sign-out"></span> <strong>Cerrar sesión</strong> ?</div>
						<div class="mb-content">
							<p>¿Seguro que quieres salir?</p>                    
							<p>Pulse 'No' si desea continuar trabajando. Pulse 'Sí' para salir del usuario actual.</p>
						</div>
						<div class="mb-footer">
							<div class="pull-right">
								<a href="#" id="btn-logout" class="btn btn-primary" style="background-color: white;border-color: white;color: black;">Sí</a>
								<button class="btn btn-default mb-control-close" style="background-color: white;border-color: white;color: black;">No</button>
							</div>
						</div>
					</div>
				</div>
			</div>
        <!-- END MESSAGE BOX-->
		<!-- START PRELOADS -->
		<audio id="audio-alert" src="<?=$sufifo?>web/audio/alert.mp3" preload="auto"></audio>
		<audio id="audio-fail" src="<?=$sufifo?>web/audio/fail.mp3" preload="auto"></audio>
		<audio id="audio-message" src="<?=$sufifo?>web/audio/scratch.mp3" preload="auto"></audio>
		<!-- END PRELOADS -->  
		<script>
		$("#btn-logout").click(function(event) {
			event.preventDefault();
			$.ajax({
				type: "POST",
				url: "<?=$sufijoMenu?>login/logout.php",
				success: function(result) {
					$('.mb-content').html(result);
					$('.mb-footer').addClass('hidden');		
					$('.mb-title').html('<h1 style="margin-left:34%;"> <span class="fa fa-users"></span> Cerrando sesión...</h1><br/>');		
					$('.message-box .mb-container').css('background','transparent');		

					waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 5000);
				}
			});												
			
			return false;
		});
	</script>
	<script>
		/* MESSAGE BOX */
			$(".mb-control").on("click",function(){
				navigator.vibrate(1000);
				var box = $($(this).data("box"));
				if(box.length > 0){
					box.toggleClass("open");
					
					var sound = box.data("sound");
					
					if(sound === 'alert')
						playAudio('alert');
					
					if(sound === 'fail')
						playAudio('fail');
					
				}        
				return false;
			});
			$(".mb-control-close").on("click",function(){
			   $(this).parents(".message-box").removeClass("open");
			   return false;
			});    
		/* END MESSAGE BOX */
		/* PLAY SOUND FUNCTION */
			function playAudio(file){
				if(file === 'alert')
					document.getElementById('audio-alert').play();

				if(file === 'fail')
					document.getElementById('audio-fail').play();    
			}
		/* END PLAY SOUND FUNCTION */
	</script>
<?php 
}
?>
<?php 
function rowWrapper($breadcrumb='',$breadcrumbPrincipal='') 
{ 
?>
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight" style="margin-left:0px;margin-right:0px;">
	<div class="col-lg-12">
		<ol class="breadcrumb" style="padding-top:17px;">
			<li>
				<a href="#"><?=ucfirst(strtolower(@$_SESSION['sesionSucur']))?></a>
			</li>
			<li>
				<a href="#"> <?=@$breadcrumb?> </a>
			</li>
			<li class="active">
				<strong> <?=@$breadcrumbPrincipal?> </strong>
			</li>
		</ol>
	</div>
</div>
<?php 
}

function top_scroll() { ?>
	<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	<!-- end scroll to top btn --><?php
 }
?>