<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<div id="wrapper">

			<?php// navbar($activeDesk='',$activeAdmin='active',$activeFumi='',$activeExtin='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeAdmin',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12">
							<div class="ibox float-e-margins" id="RegistroDeClientes">
								<div class="ibox-title">
									<h5>Registro de Cliente</h5>
									<div class="ibox-tools">
										<a class="collapse-link FormClient">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
								</div>								
								
								<div class="ibox-content text-center FormClient">
									<div class="row">
										<div class="col-lg-12" style=" text-align:center;vertical-align:middle">
											
											<div id="calendar"></div>
										</div>
											
									</div>
								</div>
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