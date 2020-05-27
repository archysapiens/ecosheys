<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
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
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5  style="color:black"><span class="fa fa-upload"></span> Importar Excel</h5>
									<div class="ibox-tools">
										<a class="collapse-link FormRodenticida">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
								</div>								
														
								<div class="ibox-content animated fadeIn">
									<div class="ibox-content animated bounceIn">
										<div class="row" style="text-align:center;vertical-align:middle">
											<div class="col-sm-5 b-r">
												<br><br><br>
												<a href="../bd/BASE SAE 2017 122 julioKarla.xlsx" download="Ecosheys2017"> <i class="fa fa-file-excel-o fa-5x" style="color:#13967c"></i> </a><br><br>
												<h3 class="m-t-none m-b"> Plantilla de clientes de Ecosheys </h3>                                
												<form role="form">
													<div class="form-group">
														<label> Bases de Datos 2017 </label> 														
													</div>
												</form>
											</div>
											<div class="col-sm-7 text-center" id="zona-de-carga">
												<form action="#" method="post" enctype="multipart/form-data" class="dropzone" id="FrmDropzoneExcel" name="FrmDropzoneExcel">													
													<h3 class="m-t-none m-b">Arrastre los archivos o solo haga click </h3>
													<div class="dropzone-previews"> </div>
												</form>   												  
											</div> <!-- fin de zona-de-carga -->
										</div> <!-- fin de row -->
									</div> <!-- fin de ibox-content x00 -->
								</div> <!-- fin de float-e-margins -->
									
							</div>
						</div>
					</div>				
				</div>
				
			</div>
		</div>
			
	
<?php
}
else{
    session_unset();
    echo"<script>;
    location.href = '../';
</script>";
}
?>