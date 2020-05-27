<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	$TypeUserFirma = '';
	$appearCanvas = '';	
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">

			<?php// navbar($activeDesk='',$activeAdmin='',$activeFumi='active',$activeExtin='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeAdmin',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5 class="h3TitleCount"> Certificados y/o Reportes Fumigación </h5>
									<div class="ibox-tools">
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
								</div>
								<style>									
									.success-element{
										border-left: 3px solid #149e82eb;
										margin-bottom:140px;
									}
									.danger-element{
										border-left: 3px solid #ed5565;
										margin-bottom:140px;
									}
									.nav-tabs { border-bottom: 2px solid #DDD; }
									.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
									.nav-tabs > li > a { border: none; color: #666; }
									.nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #11987d !important; background: transparent; }
									.nav-tabs > li > a::after { content: ""; background: #11987d; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
									.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
									.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }	
								</style>
								<div class="ibox-content">
									<div class="row">
										<div class="col-lg-2">
											<div class="ibox float-e-margins">
												<div class="ibox-content mailbox-content">
													<div class="file-manager">														
														<div class="space-25"></div>
														<h5>Modulos</h5>
														<ul class="folder-list m-b-md" style="padding: 0">
															<li><a href=""> <i class="fa fa-bug"></i> Fumigación <span class="label label-warning label-xs pull-right fumiCount"></span> </a></li>
															<li><a href=""> </a></li>
															<li><a href=""> </a></li>
															<li><a href=""> </a></li>
															<li><a href=""> </a></li>
														</ul>
														<h5>Tipo</h5>
														<ul class="category-list" style="padding: 0">
															<li><a href="#"> <i class="fa fa-circle text-navy"></i> Valido </a></li>
															<li><a href="#"> <i class="fa fa-circle text-danger"></i> Rechazar</a></li>															
														</ul>														
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-10 animated fadeInRight">
											<div class="mail-box-header">																																				
												<div class="row m-b-sm m-t-sm mail-tools tooltip-demo m-t-md">
													<div class="col-sm-2 pull-left">
														<button type="button" id="loadingTableList" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
													</div>
													<div class="col-sm-8">
														<div class="input-group"><input type="text" placeholder="Buscar Folio" class="input-sm form-control" style="height:30px !important;"> <span class="input-group-btn">
															<button type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i> </button> </span></div>
													</div>
													<!--div class="col-sm-2 text-right">
														<button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i></button>
														<button class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i></button>
													</div-->
												</div>
											</div>
											<div class="mail-box">
												<table class="footable table table-hover table-mail" data-page-size="12">
													<tbody>
														<?php while($row = $ListPendientes->fetch_assoc()) { $TypeUserFirma = ucfirst(strtolower($row['TYPE_USER'])); ?>
															<tr class="<?php if($row['VALID']=='true'){echo 'read success-element';}else{echo 'unread danger-element';}?>" style="">																
																<td class="" style="font-weight: 400;">&nbsp; <i class="fa fa-file-pdf-o "></i> &nbsp; <?php echo $row['NOTIFY'];  if($row['TYPE_USER']=='CLIENTE'){ ?> &nbsp; <i class="text-danger" style="font-size:10px;">(Nota: Favor de Firmar de Recibido)</i> <?php } ?></td>
																<td class=""></td>
																<td class="">
																	<?php if($row['TYPE_USER']=='TECNICO' and $row['VALID']=='false'){ ?><a href="" class="btn btn-xs btn-white buttonEditCertifi"  data-id="<?=$row['ID_CLIENTE'];?>" data-rutaPdf="<?php echo $sufijo.$row['RUTA_PDF']; ?>" data-noFolio="<?php echo $row['ID_VALID']; ?>" typeAutocomplite="AutoCertiFumiTecnico"><i class="fa fa-pencil"></i> Editar</a> <?php } ?>
																	<a href="<?php echo $sufijo.$row['RUTA_PDF']; ?>" target="_blank" class="btn btn-xs btn-white verPDF" id="hrefValid"><i class="fa fa-file-pdf-o"></i> Ver pdf</a>
																	<?php if($row['VALID']=='false'){?>  <a href="#" class="btn btn-xs btn-white ValidarCertifi" typeFumi="Certificados" carpetByFirma="Certificados" typeHref="<?php echo $row['TYPE_USER']; ?>" id="<?=$row['ID_CLIENTE'];?>" folio="<?=$row['ID_VALID'];?>" rutaPdf="<?php echo $sufijo.$row['RUTA_PDF']; ?>"><i class="fa fa-check"></i> <?php if($row['TYPE_USER']=='CLIENTE'){ echo "Firmar de Recibido"; } else { echo "Validar"; } ?></a> <?php }else{echo '';}?>
																</td>
																
																<td class="text-right mail-date"><i class="fa fa-clock-o" style="font-size:11px;color:#063e32"> <?php echo timeAgo($row["FECHA_SERVICIO"]) ?> </i> </td>
															</tr>
														<?php	} ?> <!--listado de pendientes para reportes de fumigación --> 
														<?php while($row = $ListPendientesReportFumi->fetch_assoc()) { $TypeUserFirma = ucfirst(strtolower($row['TYPE_USER'])); ?>
															<tr class="<?php if($row['VALID']=='true'){echo 'read success-element';}else{echo 'unread danger-element';}?>">																
																<td class="" style="font-weight: 400;">&nbsp;<i class="fa fa-file-pdf-o "></i> &nbsp; <?php echo $row['NOTIFY'];  if($row['TYPE_USER']=='CLIENTE'){ ?> &nbsp; <i class="text-danger" style="font-size:10px;">(Nota: Favor de Firmar de Recibido)</i> <?php } ?></td>
																<td class=""></td>
																<td class="">
																	<?php if(strrpos($row['RUTA_PDF'], 'ReportRodenticidas') == true){ $carpetByFirmaRow = 'ReportRodenticidas'; }
																		elseif(strrpos($row['RUTA_PDF'], 'ReportesMoscas') == true){ $carpetByFirmaRow = 'ReportesMoscas'; }
																		elseif(strrpos($row['RUTA_PDF'], 'InspeccionLamparas') == true){ $carpetByFirmaRow = 'InspeccionLamparas'; }
																		else{ $carpetByFirmaRow=''; } ?>
																	<?php if($row['TYPE_USER']=='TECNICO' and $row['VALID']=='false' and $row['CLIENTE_VALID']=='false'){ ?><a href="" class="btn btn-xs btn-white buttonEditCertifi"  data-id="<?=$row['ID_CLIENTE'];?>" data-rutaPdf="<?php echo $sufijo.$row['RUTA_PDF']; ?>" data-noFolio="<?php echo $row['ID_VALID']; ?>" typeAutocomplite="<?php echo $carpetByFirmaRow; ?>"><i class="fa fa-pencil"></i> Editar</a> <?php } ?>
																	<a href="<?php echo $sufijo.$row['RUTA_PDF']; ?>" target="_blank" class="btn btn-xs btn-white verPDF" id="hrefValid"><i class="fa fa-file-pdf-o"></i> Ver pdf</a>																		
																	<?php if($row['VALID']=='false' and $row['CLIENTE_VALID']=='true'){ $appearCanvas = 'true'; ?>  <a href="#" class="btn btn-xs btn-white ValidarCertifi" typeFumi="ReportesFumi" carpetByFirma="<?php echo $carpetByFirmaRow; ?>" typeHref="<?php echo $row['TYPE_USER']; ?>" id="<?=$row['ID_CLIENTE'];?>" folio="<?=$row['ID_VALID'];?>" rutaPdf="<?php echo $sufijo.$row['RUTA_PDF']; ?>"><i class="fa fa-check"></i> <?php if($row['TYPE_USER']=='CLIENTE'){ echo "Firmar de Recibido"; } else { echo "Validar"; } ?></a> <?php }else{echo '';}?>
																	<?php if($row['TYPE_USER']=='TECNICO' and $row['VALID']=='false' and $row['CLIENTE_VALID']=='false'){ $appearCanvas = 'false'; ?><a href="" class="btn btn-xs btn-white buttonFirmaCliente"  data-id="<?=$row['ID_CLIENTE'];?>" data-noFolio="<?php echo $row['ID_VALID']; ?>" data-carpetByFirmaClient="<?php echo $carpetByFirmaRow; ?>" data-rutaPdf="<?php echo $sufijo.$row['RUTA_PDF']; ?>"><i class="fa fa-check"></i> Firma Cliente </a> <?php } ?>						
																</td>
																
																<td class="text-right mail-date"><i class="fa fa-clock-o" style="font-size:11px;color:#063e32"> <?php echo timeAgo($row["FECHA_REGISTRO"]) ?> </i> </td>
															</tr>
														<?php	} ?>
													</tbody>
													<tfoot>
														<tr>
															<td colspan="6">
																<ul class="pagination pull-right"></ul>
															</td>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
									</div>																	
								</div>
								
								<div class="modal fade" id="CanvasFirma" tabindex="-1" role="dialog" aria-labelledby="grafica" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content modalDialogFirma">	
											<div  style="padding-bottom: 3px;">
												<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" data-dismiss="modal">&times;</button>
												<ul class="nav nav-tabs" role="tablist">
													<li role="presentation" id="FirstTab" class="active"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">Correo de Envio</a></li>
													<li role="presentation" id="SecondTab" ><a href="#canvasTab" aria-controls="canvasTab" role="tab" data-toggle="tab">Firma Área <?=$TypeUserFirma?></a></li>															
												</ul>
											</div>											
											<div class="modal-body ">
												<div class="tab-content">															
													<div role="tabpanel" class="tab-pane active" id="email" style="height:280px;">
														<div class="form-group form-group-sm row" style="padding-top:50px">
															<label  for="example-email-input" class="control-label col-xs-2">Correo:</label>
															<div class="col-xs-8">															
																<div class="input-group">	
																	<div class="input-group-addon">
																		<span class="fa fa-envelope"></span>
																	</div>
																	<input class="form-control txtcorreoEnvio" name="txtcorreoEnvio" type="email" value="<?=@$_SESSION['sesionUsuario'];?>" placeholder="correo@example.com" id="txtcorreoEnvio" aria-describedby="passwordHelpBlock" required>																				
																</div>
																<small id="passwordHelpBlock" class="form-text text-muted text-danger" style="color: rgb(185, 38, 38);"><br>
																	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Revisar Correo de envio...
																</small>
															</div>
															<a id="NexTabCanvas" style="margin-top:120px;" href="#canvasTab" aria-controls="canvasTab" data-toggle="tab" class="btn btn-primary btn-md active" role="button">Next &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
														</div>
													</div>
													<div role="tabpanel" class="tab-pane" id="canvasTab">
														<canvas id="canvas">Su navegador no soporta Firma Electronica :( </canvas>
													</div>
												</div>														
											</div>
											<div class="modal-footer" style="margin-top:-5px;">
												<field>															
													<a id="download" class="btn btn-primary btn-md active hidden" role="button">Guardar Firma</a>
													<button type="button" id="limpiar" class="btn btn-default  btn-md active hidden">Limpiar</button>
													<button type="button" class="btn btn-white hidden" data-dismiss="modal">Cerrar</button>
												</field>
											</div>
										</div><div id="GeneratePdf" class="hidden"></div>
									</div>
								</div>
								
								<div class="modal fade" id="modalCertificateFumiEdit" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg modalContentDocment" role="document">
										<div class="modal-content modalDialogFirma" id="loadModalTecnico">	
											
										</div>
									</div><div id="loadingUpdate" ></div>
								</div>
								<div class="modal fade" id="CanvasFirmaCliente" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content modalDialogFirma" id="loadModalAddFirmaClient">	
											
										</div><div id="GeneratePdfFirmClient" class="hidden GeneratePdfFirmClient"></div>
									</div>
								</div>
								<script>
									$(function(){
										$('#loadingTableList').on('click', function(){	
											$('.mail-box').toggleClass('sk-loading');
											setTimeout(function(){ $('.mail-box').removeClass('sk-loading'); }, 3000);
										})
									})
								</script>
								 <script>
									$(document).ready(function(){
										var rowCount = ($('.table-mail tr').length)-1;
										$('.fumiCount').html(rowCount);
										$('.h3TitleCount').html('Certificados y/o Reportes Fumigación ('+rowCount+')');										
									});
								</script>
								<script type="text/javascript">
									$('.buttonFirmaCliente').click(function(event) {
										$('#ChangeViewport').attr('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0');										
										event.preventDefault();
										var hrefRutaFirmaClient = "../../../web/images/FileUpload/FirmasFumi/"+$(this).attr('data-carpetByFirmaClient')+"/<?php echo @$_SESSION['sesionSucur'];?>/";
										var hrefRutaFpdfClient = '../'+$(this).attr('data-rutaPdf');
										
										$.ajax({
											type: "POST",
											url: "../../repositorio/loadFumigacion/addFirmaCliente.php",
											data: {noCliente:$(this).attr('data-id'),noFolio:$(this).attr('data-noFolio'),sufijo:'<?=@$sufijo?>',carpetByFirmaClient:$(this).attr('data-carpetByFirmaClient'),hrefRutaFirmaClient:hrefRutaFirmaClient,hrefRutaFpdfClient:hrefRutaFpdfClient},
											success: function(result) {												
												if(result=='vacio'){
													$('#CanvasFirmaCliente').modal('hide');
													alert('Fallo al realizar la operación');
												}else{
													$('#loadModalAddFirmaClient').html(result);
													$('#CanvasFirmaCliente').modal({backdrop:'static',keyboard:false, show:true});
													
												}												
											}
										});																																										
										return false;
									});
									$(".buttonEditCertifi").click(function(event) {										
										event.preventDefault();	

										$('#loadModalTecnico').html('');
										$('#modalCertificateFumiEdit').modal({backdrop:'static',keyboard:false, show:true});
										
											var SendIdCliente=$(this).attr('data-id');
											var SendnoFolio=$(this).attr('data-noFolio');
											$('#txtnoCliente').val($(this).attr('data-id'));
											$('#txtrutaPdf').val($(this).attr('data-rutaPdf'));
										
										$.ajax({
											type: "POST",
											url: "../../repositorio/loadFumigacion/cargarDatosModalTecnico.php",
											data: {noCliente:SendIdCliente,txtSucu:$('.txtSucu').val(),TypeAutocomplite:$(this).attr('typeAutocomplite'),rutaPdfReporte:$(this).attr('data-rutaPdf'),SendnoFolio:SendnoFolio},
											success: function(result) {												
												if(result=='vacio'){
													$('#modalCertificateFumiEdit').modal('hide');
													alert('Fallo al realizar la operación');
												}else{
													// var ExplodeCliente = result.split("#");
													// $("#txtnomClient").val($.trim(ExplodeCliente[0]));
													// $("#txtdirection").val($.trim(ExplodeCliente[1]));
													// $("#txtareaFumi").val($.trim(ExplodeCliente[2]));
													// if($.trim(ExplodeCliente[5])!=''){ $("#txthorInicio").val($.trim(ExplodeCliente[5])); }
													// if($.trim(ExplodeCliente[6])!=''){ $("#txthorFinal").val($.trim(ExplodeCliente[6])); }																								
													// $("#txtareaFumi").val($.trim(ExplodeCliente[7]));
													// $("#txttipoServicio").val($.trim(ExplodeCliente[8]));
													// if($.trim(ExplodeCliente[9])!=''){ $("#txtplagas").val($.trim(ExplodeCliente[9])); }												
													// $("#txtmethod1").val($.trim(ExplodeCliente[10]));
													// $("#txtnomComercial").val($.trim(ExplodeCliente[11]));
													// $("#txtnomQuimico").val($.trim(ExplodeCliente[12]));
													// $("#txtmethod2").val($.trim(ExplodeCliente[13]));
													// $("#txtcomposition").val($.trim(ExplodeCliente[14]));
													// if($.trim(ExplodeCliente[15])!=''){ $("#txtdosis").val($.trim(ExplodeCliente[15])); }												
													// $("#txtcofepris").val($.trim(ExplodeCliente[16]));
													// $("#txtperiodiService").val($.trim(ExplodeCliente[17]));
													// $("#txtnextService").val($.trim(ExplodeCliente[18]));
													// $("#txtObser").val($.trim(ExplodeCliente[19]));
													// $("#txtresponsable").val($.trim(ExplodeCliente[20])).change();
													// $("#txttecnico").val($.trim(ExplodeCliente[21])).change();
													// $("#txtadministracion").val($.trim(ExplodeCliente[22])).change();
													// if($.trim(ExplodeCliente[24])!=''){ VALID = $.trim(ExplodeCliente[24]); }
													// // alert('VALID = '+VALID);
													// if($.trim(ExplodeCliente[23])!=''){ $("#txtnoFolio").val($.trim(ExplodeCliente[23])); }	
													$('#loadModalTecnico').html(result);
												}												
											}
										});																																										
										return false;																																																			
									});
									
									
									var FolioValid = '';
									var IdClientValid = '';
									var TypeUser = '';
									var hrefRutaFirma = '';
									var hrefRutaFpdf = '';
									var CarpetByFirma = '';
									var TypeFumi = '';
									var sendSucursal='<?php echo @$_SESSION['sesionSucur'];?>';
									$("#FirstTab").click(function() {
										$('#download').addClass('hidden');
										$('#limpiar').addClass('hidden');
									});
									$("#SecondTab").click(function() {
										$('#limpiar').removeClass('hidden');
										$('#download').removeClass('hidden');
									});
									$("#NexTabCanvas").click(function() {
										$('#FirstTab').removeClass('active');
										$('#SecondTab').addClass('active');
										$('#limpiar').removeClass('hidden');
										$('#download').removeClass('hidden');
									});
									// $(".verPDF").click(function() {	
										// var namePDF = $(this).attr('value')+'-'+$(this).attr('id')+'.pdf';												
										// window.open("../../web/UploadPdf/PdfFumigacion/Certificados/<?php echo @$_SESSION['sesionSucur'];?>/"+namePDF, 'height=600,width=800,scrollbars=1,location:no,menubar:no,resizable=1,status:no,toolbar:no');
									// });
									$(".ValidarCertifi").click(function(event) {
										event.preventDefault();
										FolioValid = $(this).attr('folio');
										 // alert(FolioValid);
										IdClientValid = $(this).attr('id');	
										 // alert(IdClientValid);
										TypeUser = $.trim($(this).attr('typeHref'));
										 // alert(TypeUser);
										CarpetByFirma = $.trim($(this).attr('carpetByFirma'));
										 // alert(CarpetByFirma);
										TypeFumi = $.trim($(this).attr('typeFumi'));
										 // alert(TypeFumi);
										hrefRutaFirma = "../../../web/images/FileUpload/FirmasFumi/"+CarpetByFirma+"/<?php echo @$_SESSION['sesionSucur'];?>/<?php echo @$_SESSION['sesionNomUser'];?>-"+FolioValid+"-"+IdClientValid+".png";
										 // alert(hrefRutaFirma);
										hrefRutaFpdf = '../'+$(this).attr('rutaPdf');
										 // alert(hrefRutaFpdf);
										if(TypeUser=='CLIENTE'){
											$("#email").addClass('hidden').toggleClass('active');
											$("#FirstTab").addClass('hidden').toggleClass('active');
											$("#canvasTab").toggleClass('active');
											$("#SecondTab").toggleClass('active');
											$('#limpiar').toggleClass('hidden');
											$('#download').toggleClass('hidden');
										}
										$('#ChangeViewport').attr('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0');
										$('#CanvasFirma').modal({backdrop:'static',keyboard:false, show:true});																																											
									});
									$('#download').click(function(event){
										$('#ChangeViewport').attr('content', 'maximum-scale=1');
										event.preventDefault();											
										var correoEnvio = $('.txtcorreoEnvio').val();
										var dirTypeFumi = CarpetByFirma;
										
										//Esta por separado porque cambiamos el orden(debe agregar el codigo de barras primero antes de enviar el correo)
										if(TypeUser =='ADMINISTRACION'){
											// alert('primer if');											
											var hrefUrlAddFirma = '../../repositorio/fpdf/PhpExtras/AddFirma.php?';												
											var hrefParamAddFirmaFpdf = "hrefRutaFpdf="+hrefRutaFpdf+"&hrefRutaFirma="+hrefRutaFirma+"&TypeUser="+TypeUser+"&NoFolio="+FolioValid+"&sendSucursal="+sendSucursal+"&IdClientValid="+IdClientValid;
											$("#GeneratePdf").load(hrefUrlAddFirma,hrefParamAddFirmaFpdf);
											$("#GeneratePdf").removeClass('hidden');
											$(".modalDialogFirma").addClass('hidden');
											$("#GeneratePdf").html("<img src='../../web/images/loading_BIG.gif' style='color:white;padding-top:20%;padding-left:32%'/>");
											setTimeout(function(){ 																									
												var RequestFirma = downloadCanvas(this, 'canvas', '<?php echo utf8_encode(@$_SESSION['sesionNomUser']);?>-'+FolioValid+'-'+IdClientValid, correoEnvio, dirTypeFumi, '<?php echo @$_SESSION['sesionSucur'];?>', TypeUser);														
												if(RequestFirma==true){																																													
													$('#CanvasFirma').modal('hide');
													$("#GeneratePdf").addClass('hidden');												
													$.confirm({
														title: 'Validación Correcta!',
														content: '',
														type: 'green',
														theme: 'modern',
														typeAnimated: true,
														animationSpeed: 1000, // 2 seconds
														animation: 'scale',
														closeAnimation: 'scale',
														closeIcon: true,
														draggable: true,
														icon: 'fa fa-check',
														closeIconClass: 'fa fa-close',
														closeIcon: function(){ location.reload(); },
														buttons: {
															close: function () {
																location.reload();
															}
														}
													});																								
												}
											}, 10000);											
										}
																				
										if(TypeUser !='ADMINISTRACION'){
											// alert('segundo if');
											var RequestFirma = downloadCanvas(this, 'canvas', '<?php echo @$_SESSION['sesionNomUser'];?>-'+FolioValid+'-'+IdClientValid, correoEnvio, dirTypeFumi, '<?php echo @$_SESSION['sesionSucur'];?>', TypeUser);														
											if(RequestFirma==true){
												$("#GeneratePdf").removeClass('hidden');
												$(".modalDialogFirma").addClass('hidden');
												$("#GeneratePdf").html("<img src='../../web/images/loading_BIG.gif' style='color:white;padding-top:20%;padding-left:32%'/>");
												setTimeout(function(){ 											
													if(TypeUser =='TECNICO' || TypeUser =='RESPONSABLE' || TypeUser =='CLIENTE'){
														var hrefUrlAddFirma = '../../repositorio/fpdf/PhpExtras/AddFirma.php?';												
														var hrefParamAddFirmaFpdf = "hrefRutaFpdf="+hrefRutaFpdf+"&hrefRutaFirma="+hrefRutaFirma+"&TypeUser="+TypeUser+"&NoFolio="+FolioValid+"&sendSucursal="+sendSucursal+"&IdClientValid="+IdClientValid;
														$("#GeneratePdf").load(hrefUrlAddFirma,hrefParamAddFirmaFpdf);
													}																					
													$('#CanvasFirma').modal('hide');
													$("#GeneratePdf").addClass('hidden');												
													$.confirm({
														title: 'Validación Correcta!',
														content: '',
														type: 'green',
														theme: 'modern',
														typeAnimated: true,
														animationSpeed: 1000, // 2 seconds
														animation: 'scale',
														closeAnimation: 'scale',
														closeIcon: true,
														draggable: true,
														icon: 'fa fa-check',
														closeIconClass: 'fa fa-close',
														closeIcon: function(){ location.reload(); },
														buttons: {
															close: function () {
																location.reload();
															}
														}
													});											
												}, 10000);
											}													
										}
																							
									});	
									$(".modal-content .close").click(function() { $('#ChangeViewport').attr('content', 'maximum-scale=1'); });
								</script>								
								<!--Guardar imagen en .PNG-->
								<script>
									function downloadCanvas(link, canvasId, filename, correoEnvio, dirTypeFumi, sucursal, TypeUser) {
										dataHref = document.getElementById(canvasId).toDataURL();
										// alert(Trazados);
										if(Trazados!='' && Trazados!=',' && Trazados!=',,' && Trazados!=',,,' && Trazados!=',,,,' && Trazados!=',,,,,' && Trazados!=',,,,,,'){										
											// alert('conFirma');
											var params = 'dataHref='+dataHref+'&TypeUser='+TypeUser+'&sucursal='+sucursal+'&dirTypeFumi='+dirTypeFumi+'&dataFilename='+filename+'&correoEnvio='+correoEnvio;
											var xhr = new XMLHttpRequest();
											xhr.onreadystatechange = function() {
											  // request complete
											  if (xhr.readyState == 4) {
												// window.open('http://localhost/ArchysoftMVC/Ecosheys/web/images/FileUpload/canvasFirma/'+xhr.responseText,'_blank');
											  }
											}
											xhr.open('POST','../../repositorio/loadFumigacion/canvasFirma.php',true);
											xhr.setRequestHeader('Content-Type', 'application/upload');
											xhr.send(params);
											
											return true;
										}else{
											alert('No hay Firma');
											return false;
										}									
									}
								</script>								
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