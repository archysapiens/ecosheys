<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	
	function listar_directorios_ruta($ruta,$NivelDir='Dir')
	 {
		 if (is_dir($ruta))
		 {
			 if ($dh = opendir($ruta))
			 {		 
				 while (($file = readdir($dh)) !== false)
				 {				 
					 if($NivelDir=='Dir'){
						 if ($file!="." && $file!="..")
						 {
							 echo "<li class='jstree-open'>  $file <ul>"; 
									listar_directorios_ruta($ruta . $file . DIRECTORY_SEPARATOR,'SubDir'); // Ahora volvemos a llamar la función
							 echo "</ul> </li>"; //						 
						 } 
					 }elseif($NivelDir=='SubDir'){
						 if ($file!="." && $file!="..") 
						 {
							 echo "<li class='text-navy' id='carpetSucur'> $file  <ul></ul> </li>"; 						 
						 }
					 }
				 }
				closedir($dh);		 
			 }
		 }
	 }

     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">
			<?php //navbar($activeDesk='',$activeAdmin='active',$activeFumi='',$activeExtin='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeAdmin',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
							<div class="ibox float-e-margins">
								<div class="ibox-content">
									<div class="file-manager">										
										<div class="hr-line-dashed"></div>
										<h5>Folders</h5>
										
										
										<div id="jstree1">
											<ul> 
												<?php echo listar_directorios_ruta("../web/UploadPdf/PdfFumigacion/"); ?>
											</ul>
										</div>
														
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6 animated fadeInRight">
							<div class="row">						
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="LoadAdminFiles">
									<img alt="image" class="img-thumbnail m-t-xs img-responsive" width="350px" src="<?=@$sufijo?>web/images/folderVacio.jpg">
									
										
								</div>
							</div>
						</div>
					</div>									
				</div>
				
			</div>
		</div>
		<script>
			$('#jstree1').click( function (event) {											
				event.preventDefault();	
				
				alert('ila');
				
																																			
																							
																																					
			});
		</script>
			
<?php
}
else{
    session_unset();
    echo"<script>;
    location.href = '../../';
</script>";
}
?>