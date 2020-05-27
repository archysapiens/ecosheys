<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	  
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">
			<style>
				a{ color:#11987d; }
				a:hover{ color: rgb(4, 117, 94) }
				.jstree-open > .jstree-anchor > .fa-folder:before {
					content: "\f07c";
				}
				.jstree-default .jstree-icon.none {
					width: 0;
				}
				div#jstree1 { margin-left: -20px; }
				img.img-thumbnail.m-t-xs.img-responsive { width: auto; opacity: 0.2; filter: alpha(opacity=50); }
			</style>
			<?php// navbar($activeDesk='',$activeAdmin='',$activeFumi='',$activeExtin='',$activeCourse='active',$activeInscrip='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='showLogros',$sufijo,$sufijoMenu); ?>
			
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
											<ul> <?php
											$ruta = "../../web/UploadPdf/PdfCapacitacion/FormatosCursos/".$_SESSION['sesionSucur'];
											$NivelDir='Dir';
											
												 if (is_dir($ruta)){
													 if ($dh = opendir($ruta)){		 
														 while (($file = readdir($dh)) !== false){				 
															 if($NivelDir=='Dir'){
																 if ($file!="." && $file!=".."){
																	$arrayFile=explode("-",$file);
																	if($arrayFile[1]==$_COOKIE['id']){
																		echo "<li class='jstree-open'>  $file <ul>"; 	
																		echo "</ul> </li>"; //	
																	}		 
																 } 
															 }elseif($NivelDir=='SubDir'){
																 if ($file!="." && $file!=".."){
																	 echo "<li class='text-navy' id='carpetSucur'> $file  <ul></ul> </li>"; 						 
																 }
															 }
														 }
														closedir($dh);		 
													 }
												 }
												 
											?> </ul>
										</div>			
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6 animated fadeInRight">
							<div class="row" id="modal-body">
								<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
									<div class="sk-double-bounce1"></div>
									<div class="sk-double-bounce2"></div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="LoadAdminFiles">
									<img alt="image" class="img-thumbnail m-t-xs img-responsive" width="350px" src="https://thumbs.dreamstime.com/b/pdf-file-download-seamless-pattern-background-icon-flat-vector-pdf-file-download-seamless-pattern-background-icon-flat-vector-109540053.jpg">
									
										
								</div>
							</div>
						</div>
					</div>									
				</div>
				<script>
					$(function () {
						$('#jstree1').on("changed.jstree", function (e, data) {
						$('#LoadAdminFiles').html('')
						$('#modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
						  var slect = data.selected;
						  var val=$("#"+slect).children().text();						  
						  $.ajax({
								type: "POST",
								url: "showLogros.php",
								data: {action:'searchFiles', nameCarpet:val},
								success: function(exito) {   
									$('#LoadAdminFiles').html(exito);
									$('#modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none");
								}
							});
						});
						
					});
				</script>
			</div>
		</div>
			
	
<?php
}
else{
    session_unset();
    echo"<script>;
    location.href = '../../';
</script>";
}
?>