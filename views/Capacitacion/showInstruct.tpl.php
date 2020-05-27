<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">
			<style>
			.product-box {
				min-height: 405px;
				max-height: 405px;
			}
			.product-name { margin: -12px 0 15px 0; }
			</style>
			<?php// navbar($activeDesk='',$activeAdmin='',$activeFumi='',$activeExtin='',$activeCourse='active',$activeInscrip='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='showCourse',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				<style>
					.contact-box {
						box-shadow: 1px 1px 0px 1px #d8cece5c;
					}
					.contact-box:hover,
					.contact-box.active {						
						 border: 1px solid transparent;
						  -webkit-box-shadow: 0 3px 7px 0 #a8a8a8;
						  -moz-box-shadow: 0 3px 7px 0 #a8a8a8;
						  box-shadow: 0 3px 7px 0 #a8a8a8;
					}
				</style>
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12">
							<div class="ibox float-e-margins" id="RegistroDeServicio">
								<div class="ibox-title">
									<!--h5  style="color:black">Reporte de Consumo de Cebo Rodenticida</h5-->
									<div class="ibox-tools">
										<div class="btn-group dropleft hidden" style="margin-right:7%;" id="DropdowsAction">
											<button data-toggle="dropdown" class="btn btn-primary btn-xs in-line dropdown-toggle" >Action <span class="caret"></span></button>
											<ul class="dropdown-menu">												
												<li><a href="#" class="btn btn-xs BuutonValidProcess hidden" role="button" data-toggle="modal" data-target="#modalProceesValid">Proceso Validación</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" data-toggle="modal" data-target="#modalAddEmailEnvio">Agregar Correo</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" id="ActionVerPdf" target="_blank">Ver PDF</a></li>
													<li class="divider"></li>
												<li><a href="#" class="btn btn-xs ButonNewCheckList hidden" role="button" id="ButonNewCheckList" idCliente="" pdfCheckList="" target="_blank">Crear CheckList</a></li>
												<!--el número false es solo poliza y el número true es poliza y ph-->
												<li><a href="#" class="btn btn-xs ButonNewPoliza hidden" role="button" id="ButonNewPoliza" idCliente="" pdfPH="" target="_blank">Crear Póliza</a></li>
																									
											</ul>
										</div>
										<a class="collapse-link FormExtintores">
											<i class="fa fa-chevron-up"></i>
										</a>										 
									</div>
								</div>																
								<div class="ibox-content text-center FormExtintores">
									<div class="row m-b-sm m-t-sm">
										<div class="col-md-2">
											<select class="form-control m-b" name="account">
												<option>Todos</option>
												<option>Ecosheys</option>
												<option>Otros</option>											
											</select>
										</div>
										<div class="col-md-10">
											<form method="get" action="">
												<div class="input-group"><input type="text" name="search"  id="filter" placeholder="Buscar instructor" class="input-xs form-control"> <span class="input-group-btn">
												<button type="submit" class="btn btn-default btn-outline"><i class="fa fa-search"></i> Buscar </button> </span></div>
											</form>
										</div>
									</div>
									<div class="hr-line-dashed"></div>	
									<div class="row" style="margin-top:30px;" id="easyPaginate">
										<?php while($row = $loadInstruct->fetch_assoc()) { ?>											
											<div class="col-md-4 iboxRectangular">
												<div class="ibox">
													<div class="ibox-content product-box">
														<div class="ibox-content" align="center">
															<img alt="image" class="img img-thumbnail" style="max-height: 160px;" src="<?php if($row['RUTA']!=''){ echo $sufijo.$row['RUTA']; }else{ echo "https://image.freepik.com/free-vector/happy-businessman-making-thumbs-up-sign_1325-454.jpg"; }?>" />
														</div>
														<div class="product-desc">
															<span class="small col-sm-12" style="margin-top: -29px;color: #25272794;font-size: 73%;">Correo: <?php echo $row['EMAIL']; ?></span> 
															<span class="product-price" style="background-color:#5d5b5b91;padding:1px 8px;"> Instructor </span>
															<a href="#" class="product-name" style="color: #1c7b68;"><?php echo @$row['NAMEFULL'];?></a>
															<div class="small m-t-xs">
																<span title="<?php echo @$row['ESPECIALIZACION']; ?>"><?php echo substr(ucwords(mb_strtolower(@$row['ESPECIALIZACION'], 'UTF-8')), 0,121); if(strlen($row['ESPECIALIZACION'])>121){ echo "..."; }?></span>
															</div>
															<div class="m-t text-center small">
																<address class="col-sm-12" style="color: #9fa9a7;">
																	<abbr title="Phone" class="col-sm-6">Tel. Oficina:</abbr><span title="<?php echo $row['TELEFONO_OFI_U']; ?>" class="col-sm-6"><?php if($row['TELEFONO_OFI_U']!=''){ echo $row['TELEFONO_OFI_U']; }else{ echo "No tiene..."; }?></span>
																</address>
																<address class="col-sm-12" style="margin-top: -17px;color: #9fa9a7;">
																	<abbr title="Phone" class="col-sm-6">Tel. Celular:</abbr><span title="<?php echo $row['TELEFONO_CEL_U']; ?>" class="col-sm-6"><?php if($row['TELEFONO_CEL_U']!=''){ echo $row['TELEFONO_CEL_U']; }else{ echo "No tiene ..."; }?> </span>
																</address>
																<a href="<?php echo $sufijo."web/UploadPdf/PdfCapacitacion/FormatosInstruc/".$row['SUCURSAL']."/".$row['ID_USER']."/DC3.pdf"; ?>" target="_blank" class="btn btn-xs btn-outline btn-default" style="margin-top: 8px;"><i class="fa fa-file-o"></i> &nbsp; Ver DC5  </a>
															</div>										
														</div>
													</div>
												</div>
											</div>
										<?php }?>	       
									</div>
									<script> 
										/***** Start Search Curso ***/
											$(document).ready(function(){
												$('#filter').keyup(function(){
													  var text = $(this).val().toLowerCase();
													  $('.iboxRectangular').hide();
													  $('.iboxRectangular').each(function(){
															if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
															$(this).closest('.iboxRectangular').show();
															}
													  });													
												 });
											});
										/***** End Search Curso ***/
									</script> 									
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
    location.href = '../../';
</script>";
}
?>