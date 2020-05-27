<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">
			<?php// navbar($activeDesk='active',$activeAdmin='',$activeFumi='',$activeExtin='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeDesk',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Sistemas Ecosheys</h5>
									<div class="ibox-tools">
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
								</div>
								<div class="ibox-content text-center">
									<h2> Bienvenido <?=@$_SESSION['sesionUsuario']?></h2>

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
    echo"<script> location.href = '../' </script>";
}
?>