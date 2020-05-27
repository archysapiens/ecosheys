<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	$TypeUserFirma = '';
	$appearCanvas = '';	
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">

			<?php// navbar($activeDesk='',$activeAdmin='active',$activeFumi='',$activeExtin='',$activeCourse='',$activeInscrip='active',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeAdmin',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12 col-md-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5 class="h3TitleCount"> Evidencias de Pagos </h5>
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
									::-webkit-input-placeholder { /* WebKit browsers */
										text-transform: none;
									}
									:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
										text-transform: none;
									}
									::-moz-placeholder { /* Mozilla Firefox 19+ */
										text-transform: none;
									}
									:-ms-input-placeholder { /* Internet Explorer 10+ */
										text-transform: none;
									}
									.input-group-addon:first-child { color: cadetblue; }
									span.error.text-danger { color: #7b0d0dc4; font-family: "Montserrat", sans-serif; font-size: 11px; position: absolute; bottom: -14px; right: 0; display: none; }
									.modal-body.sk-loading:after { content: ''; background-color: rgba(255, 255, 255, 0.7); position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 999; }									
								</style>
								<div class="ibox-content">
									<div class="row">
										<div class="col-lg-2 col-md-2">
											<div class="ibox float-e-margins">
												<div class="ibox-content mailbox-content">
													<div class="file-manager">														
														<div class="space-25"></div>
														<h5>Modulos</h5>
														<ul class="folder-list m-b-md" style="padding: 0">
															<li><a href=""> <img src="<?=$sufijo?>web/images/fa-icons/iconExt.png" width="15" height="15" style="margin-left:-8px;"/> Extintores <span class="label label-warning label-xs pull-right ExtinCount"></span> </a></li>
															<li><a href="../Fumigacion/validFumigacion.php"> <i class="fa fa-bug"></i> Fumigación <span class="label label-warning label-xs pull-right fumiCount"></span> </a></li>
															<li><a href="../Capacitacion/validCapacitacion.php"> <i class="fa fa-graduation-cap"></i> Capacitación <span class="label label-warning label-xs pull-right CapaCount"></span> </a></li>
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
										<div class="col-lg-10 col-md-10 animated fadeInRight" style="<?php if($_SESSION['sesionPrivi'] == 'RESPONSABLE' AND $_SESSION['sesionArea']=='ADMINISTRACION'){ echo 'margin-top:-32px'; }?>;">
											<div class="clients-list"> <?php if($_SESSION['sesionPrivi'] == 'RESPONSABLE' AND $_SESSION['sesionArea']=='ADMINISTRACION'){ ?>
												<ul class="nav nav-tabs">
													<span class="pull-right small text-muted">1406 Elements</span>
													<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa  fa-graduation-cap"></i> Capacitación</a></li>
													<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-ambulance"></i> Protección Civil</a></li>
													<li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-user"></i> Instructor(es)</a></li>
												</ul><?php } ?>
												<div class="" style="margin-top:30px;">																																				
													<div class="row m-b-sm m-t-sm mail-tools tooltip-demo m-t-md">
														<div class="col-sm-2 pull-left col-sm-offset-1">
															<button type="button" id="loadingTableList" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
														</div>
														<div class="col-sm-8">
															<div class="input-group"><input type="text" placeholder="Buscar Folio" id="filter" class="input-sm form-control text-uppercase" style="height:30px !important;"> <span class="input-group-btn">
																<button type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i> </button> </span></div>
														</div>
														<!--div class="col-sm-2 text-right">
															<button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i></button>
															<button class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i></button>
														</div-->
													</div>
												</div>
												<div class="mail-box">													
													<div class="tab-content" style="margin-top:30px;">
														<div id="tab-1" class="tab-pane active">
															<div class="full-height-scroll">
																<div class="table-responsive">
																	<table class="footable table table-hover table-mail" data-page-size="12" data-filter=#filter>
																		<tbody>														
																			<?php while($row = $listPendientesValidPagoAlum->fetch_assoc()) { $TypeUserFirma = ucfirst(strtolower($row['TYPE_USER'])); ?>
																				<tr class="<?php if($row['VALID']=='true'){echo 'read success-element';}else{echo 'unread danger-element';}?>">																
																					<td class="" style="font-weight: 400;">&nbsp;<i class="fa fa-file-pdf-o "></i> &nbsp; <?php echo $row['NOTIFY']; ?></td>
																					<td class=""></td>
																					<td class="">
																						<?php if($_SESSION['sesionPrivi'] == 'RESPONSABLE' AND $_SESSION['sesionArea']=='ADMINISTRACION'){ ?>
																							<a href="<?php echo $row['URL_EVIDENCIA_PAGO']; ?>" target="_blank" class="btn btn-xs btn-white previewImgPago" id="previewImgPago"><i class="fa fa-file-image-o"></i> Ver Pago</a>
																							<a href="#" class="btn btn-xs btn-white showDatosRespons" id="showDatosRespons" attrFullNameRespon="<?php echo $row['FULL_NAME'];?>" attrNoFolio="<?php echo $row['ID_VALID'];?>" attrEmailRespon="<?php echo $row['EMAIL'];?>" attrCurpRespon="<?php echo $row['CURP'];?>" attrTypePagoRespon="<?php echo $row['TYPE_PAGO'];?>" attrTotal="<?php echo $row['TOTAL'];?>"><i class="fa fa-user"></i> Ver Datos</a>																		
																							<?php if($row['VALID']=='false'){ $appearCanvas = 'true'; ?>  <a href="#" class="btn btn-xs btn-white buttonValidar" typeMod="Capacitacion" typeDocument="" carpetByFirma="Inscripcion" typeHref="<?php echo $row['TYPE_USER']; ?>" id="<?=$row['ID_CLIENTE'];?>" folio="<?=$row['ID_VALID'];?>" rutaImgPago="<?php echo $row['URL_EVIDENCIA_PAGO']; ?>"><i class="fa fa-check"></i> Validar</a> <?php }else{echo '';}?>	
																						<?php }elseif($_SESSION['sesionPrivi'] == 'RESPONSABLE' AND $_SESSION['sesionArea']=='COTIZACION'){?>
																							<a href="#" class="btn btn-xs btn-white showDatosRespons" id="showDatosRespons" attrCurpRespon="<?php echo $row['CURP'];?>" attrNoFolio="<?php echo $row['ID_VALID'];?>" attrTypePagoRespon="<?php echo $row['TYPE_PAGO'];?>"><i class="fa fa-user"></i> Ver Datos</a>	
																							<?php if($row['VALID']=='false'){ ?><a href="#" class="btn btn-xs btn-white showDatosCosto" id="showDatosCosto" attrCurpRespon="<?php echo $row['CURP'];?>" attrNoFolio="<?php echo $row['ID_VALID'];?>" attrTypePagoRespon="<?php echo $row['TYPE_PAGO'];?>"><i class="fa fa-dollar"></i> Costo</a> <?php } ?>
																							<?php if($row['NEW_FOLIO']!=''){ ?><a href="<?=$sufijo.$row['PDF_COTIZACION']; ?>" target="_blank" class="btn btn-xs btn-white" ><i class="fa fa-file-pdf-o"></i> Pdf</a> <?php }?>
																							<?php if($row['VALID']=='false' AND $row['NEW_FOLIO']!=''){ $appearCanvas = 'true'; ?>  <a href="#" class="btn btn-xs btn-white buttonValidar" typeMod="Capacitacion" typeDocument="Cotizacion" carpetByFirma="Inscripcion" typeHref="<?php echo $row['TYPE_USER']; ?>" id="<?=$row['ID_CLIENTE'];?>" folio="<?=$row['ID_VALID'];?>" rutaImgPago="<?php echo $row['URL_EVIDENCIA_PAGO']; ?>"><i class="fa fa-check"></i> Validar</a> <?php }else{echo '';}?>																			
																						<?php }?>															
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
														<div id="tab-2" class="tab-pane">
															<div class="full-height-scroll">
																<div class="table-responsive">
																	<table class="tableConstan table table-hover table-mail" data-page-size="12" data-filter=#filter>
																		<tbody>														
																			<?php while($row = $listPendientesValidConstanPC->fetch_assoc()) { $TypeUserFirma = ucfirst(strtolower($row['TYPE_USER'])); ?>
																				<tr class="<?php if($row['VALID']=='true'){echo 'read success-element';}else{echo 'unread danger-element';}?>">																
																					<td class="" style="font-weight: 400;">&nbsp;<i class="fa fa-file-pdf-o "></i> &nbsp; <?php echo $row['NOTIFY']; ?></td>
																					<td class=""></td>
																					<td class="">
																						<?php if($_SESSION['sesionPrivi'] == 'RESPONSABLE' AND $_SESSION['sesionArea']=='ADMINISTRACION'){ ?>
																							<a href="#" class="btn btn-xs btn-white showDetailConstan" id="showDetailConstan" typeAutocomplite="ViewConstanc" data-noFolio="<?php echo $row['ID_VALID']; ?>"><i class="fa fa-info"></i> Detalles</a>																							
																							<?php if($row['VALID']=='false'){ $appearCanvas = 'true'; ?>  <a href="#" class="btn btn-xs btn-white buttonValidar" typeMod="Capacitacion" typeDocument="" carpetByFirma="ConstanPC" typeHref="<?php echo $row['TYPE_USER']; ?>" id="<?=$row['ID_CLIENTE'];?>" folio="<?=$row['ID_VALID'];?>" ><i class="fa fa-check"></i> Validar</a> <?php }else{echo '';}?>	
																						<?php } ?>															
																					</td>
																					<td class="text-right mail-date"><i class="fa fa-clock-o" style="font-size:11px;color:#063e32"> <?php echo timeAgo($row["FECHA_REGISTRO"]) ?> </i> </td>
																				</tr>
																			<?php } ?>
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
														<div id="tab-3" class="tab-pane">
															<div class="full-height-scroll">
																<div class="table-responsive">
																	<table class="tableConstan table table-hover table-mail" data-page-size="12" data-filter=#filter>
																		<tbody>														
																			<?php while($row = $listPendientesValidInstruct->fetch_assoc()) { $TypeUserFirma = ucfirst(strtolower($row['TYPE_USER'])); ?>
																				<tr class="<?php if($row['VALID']=='true'){echo 'read success-element';}else{echo 'unread danger-element';}?>">																
																					<td class="" style="font-weight: 400;">&nbsp;<i class="fa fa-file-pdf-o "></i> &nbsp; <?php echo $row['NOTIFY'].' ('.$row['NOMBRE'].')'; ?></td>
																					<td class=""></td>
																					<td class="">
																						<?php if($_SESSION['sesionPrivi'] == 'RESPONSABLE' AND $_SESSION['sesionArea']=='ADMINISTRACION'){ ?>
																							<a href="#" class="btn btn-xs btn-white showDocumentInst" id="showDocumentInst" data-noCliente="<?php echo $row['ID_INSTRUCT']; ?>"><i class="fa fa-eye"></i> Ver documentos</a>																							
																							
																						<?php } ?>															
																					</td>
																					<td class="text-right mail-date"><i class="fa fa-clock-o" style="font-size:11px;color:#063e32"> <?php echo timeAgo($row["FECHA_VALIDACION"]) ?> </i> </td>
																				</tr>
																			<?php } ?>
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
												</div>
											</div>
										</div>
										<!--Primer Modal Datos Del Responsable del Pago del Curso Para Responsable ADMINISTRACION--> 
										<div class="modal fade" id="previewDatosRespon" tabindex="-1" role="dialog" aria-labelledby="previewDatosRespon" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content modalDialogFirma">
													<div class="modal-body">
														<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
															<div class="sk-double-bounce1"></div>
															<div class="sk-double-bounce2"></div>
														</div>
														<button type="button" class="close" id="closeModalEvidence" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
														<h3><strong>Datos del Responsable del Curso</strong></h3> <hr style="border-top: 2px dashed #11987dde;">												
														<div class="row mar_ned" style="padding-top:20px;">
															<div class="col-sm-offset-1 col-md-10">																						
																<div class="file">
																	<div class="ibox-content">	
																		<div class="row">
																			<div class="col-sm-6 b-r">																		
																				<table class="table table-stripped m-t-md">
																					<tbody>
																						<tr>
																							<td class="no-borders"> </td>  <td  class="no-borders" > <b>Responsable:</b> <span id="loadNameRespons" class="text-navy"></span>  </td>
																						</tr>
																						<tr> <td> </td> <td> <b>Email:</b> &nbsp; <span id="loadEmailRespons" class="text-navy"></span>  </td> </tr>
																						<tr> <td> </td> <td> <b>Teléfono:</b> &nbsp; <span id="loadTelefono" class="text-navy">7233456532</span>  </td> </tr>
																						<tr class="<?php if($_SESSION['sesionPrivi'] == 'RESPONSABLE' AND $_SESSION['sesionArea']=='COTIZACION'){ echo "hidden"; } ?>"> 
																						<td> </td> <td> <b>Curp:</b> &nbsp; <span id="loadCurpRespons" class="text-navy"></span>  </td> </tr>
																						<tr> <td> </td> <td> <b>Curso:</b> &nbsp; <span id="loadNameCurso" class="text-navy"> Trabajos con Calor</span> </td> </tr>
																						<tr class="<?php if($_SESSION['sesionPrivi'] == 'RESPONSABLE' AND $_SESSION['sesionArea']=='COTIZACION'){ echo "hidden"; } ?>">
																						<td> </td> <td> <b>Tipo de Pago:</b> &nbsp; <span id="loadTypePagoRespons" class="text-navy"></span>  </td> </tr>																				
																						<tr> </tr>																									
																					</tbody>
																				</table>	
																			</div>
																			<div class="col-sm-6">	
																				<table class="table table-stripped m-t-md">
																					<tbody>	
																						<tr> <td class="no-borders"> </td> <td class="no-borders" > <b>Número Personas:</b> &nbsp; <span id="loadNumPerson" class="text-navy"></span>  </td> </tr>
																						<tr> <td> </td> <td> <b>Nivel del Alumno:</b> &nbsp; <span id="loadNivel" class="text-navy"></span>  </td> </tr>
																						<tr> <td> </td> <td> <b>Lugar del Curso:</b> &nbsp; <span id="loadLugar" class="text-navy"></span>  </td> </tr>
																						<tr> <td> </td> <td> <b>Requiere Manuales:</b> &nbsp; <span id="loadManuales" class="text-navy"></span>  </td> </tr>
																						<tr class="<?php if($_SESSION['sesionPrivi'] == 'RESPONSABLE' AND $_SESSION['sesionArea']=='COTIZACION'){ echo "hidden"; } ?>"> <td> </td> <td> <b>Total a pagar:</b> &nbsp; <span id="loadTotal" class="text-navy"></span>  </td> </tr>
																						<tr> </tr>																											
																					</tbody>
																				</table>	
																			</div>
																		</div>
																		<i class="text-danger hidden" style="font-size: smaller;">IMPORTANTE: Para enviar la ficha de deposito, ir al apartado de incripcion y subir la evidencia.</i>
																	</div>
																</div>
															</div>
														</div>																				
														<div class="row mar_ned"> </div>                                         
													</div>		 										
													<div class="modal-footer" style="margin-top:-5px;">
														<div id="RequestCotizacion" class="hidden"></div>
														<script>
															$('.verDatos').click(function(event){
																event.preventDefault();	
																$('#previewDatosRespon').modal({backdrop:'static',keyboard:false, show:true});
																$('#loadNameRespons').text(' '+$(this).attr('attrFullNameRespon'));
																$('#loadEmailRespons').text(' '+$(this).attr('attrEmailRespon'));
																$('#loadCurpRespons').text(' '+$(this).attr('attrCurpRespon'));
																$('#loadTypePagoRespons').text(' '+$(this).attr('attrTypePagoRespon'));
															});
															//Button Area Cotizacion
															$('.showDatosRespons').click(function(event){
																event.preventDefault();
																$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
																var attrFolio = $(this).attr('attrNoFolio');	var attrCurpRespon = $(this).attr('attrCurpRespon');  var attrTypePagoRespon = $(this).attr('attrTypePagoRespon');	var attrTotal = $(this).attr('attrTotal');															
																// alert(attrFolio);
																$.ajax({
																	type: "POST",
																	url: "validCapacitacion.php",
																	data: {action:'SearchDatosCotizacion', attrFolio:attrFolio},
																	success: function(exito) {  
																		var obj = $.parseJSON(exito);
																		$('#loadNameRespons').text('  '+obj[0]['NOMBRE_FULL']);
																		$('#loadEmailRespons').text('  '+obj[0]['EMAIL']);
																		$('#loadTelefono').text('  '+obj[0]['TELEFONO']);
																		$('#loadCurpRespons').text('  '+attrCurpRespon);
																		$('#loadNameCurso').text('  '+obj[0]['CURSO']);
																		$('#loadNameCurso').attr('title', '  '+obj[0]['CURSO']);
																		$('#loadNumPerson').text('  '+obj[0]['NUM_PERSONAS']);
																		$('#loadNivel').text('  '+obj[0]['NIVEL']);
																		$('#loadLugar').text('  '+obj[0]['LUGAR'].substr(0, 20)+'...');
																		$('#loadLugar').attr('title', '  '+obj[0]['LUGAR']);
																		$('#loadManuales').text('  '+obj[0]['MANUALES']);
																		$('#loadTypePagoRespons').text('  '+attrTypePagoRespon);
																		$('#loadTotal').text(' $'+attrTotal);
																		$('#RequestCotizacion').html(exito);
																		setTimeout(function() {
																			$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none");
																		},1200);
																	}
																});
																
																$('#previewDatosRespon').modal({backdrop:'static',keyboard:false, show:true});
															});
														</script>
													</div>
												</div><div id="GeneratePdf" class="hidden"></div>
											</div>
										</div>
										<!--Fin del Primer Modal-->
										<!--Segundo Modal Revision del Pago del curso-->
										<div class="modal fade" id="CanvasFirma" tabindex="-1" role="dialog" aria-labelledby="grafica" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content modalDialogFirma">	
													<div  style="padding-bottom: 3px;">
														<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" data-dismiss="modal">&times;</button>
														<ul class="nav nav-tabs" role="tablist">
															<li role="presentation" id="FirstTab" class="hidden"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">Correo de Envio</a></li>
															<li role="presentation" id="SecondTab" class="active"><a href="#canvasTab" aria-controls="canvasTab" role="tab" data-toggle="tab">Firma Área <?=$TypeUserFirma?></a></li>															
														</ul>
													</div>											
													<div class="modal-body ">
														<div class="tab-content">															
															<div role="tabpanel" class="tab-pane" id="email" style="height:280px;">
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
															<div role="tabpanel" class="tab-pane active" id="canvasTab">
																<canvas id="canvas">Su navegador no soporta Firma Electronica :( </canvas>
															</div>
														</div>														
													</div>
													<div class="modal-footer" style="margin-top:-5px;">
														<field>															
															<a id="download" class="btn btn-primary btn-md active " role="button">Guardar Firma</a>
															<button type="button" id="limpiar" class="btn btn-default  btn-md active ">Limpiar</button>
															<button type="button" class="btn btn-white " data-dismiss="modal">Cerrar</button>
														</field>
														<script>
														var FolioValid = '';
														var IdClientValid = '';
														var TypeUser = '';
														var CarpetByFirma = '';
														var requestPetiAjax = true; //Respuesta Peticion AJax
														$(".buttonValidar").click(function(event) {
															event.preventDefault();
															FolioValid = $(this).attr('folio'); //alert(FolioValid);
															IdClientValid = $(this).attr('id');	 //alert(IdClientValid);
															TypeUser = $.trim($(this).attr('typeHref')); //alert(TypeUser);
															
															CarpetByFirma = $.trim($(this).attr('carpetByFirma')); //alert(CarpetByFirma);															
									
															$('#ChangeViewport').attr('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0');
															$('#CanvasFirma').modal({backdrop:'static',keyboard:false, show:true});	
															
															// alert('FolioValid: '+FolioValid);
															// alert('IdClientValid: '+IdClientValid);
															// alert('TypeUser: '+TypeUser);
															// alert('CarpetByFirma:  '+CarpetByFirma);
														});
														$('#download').click(function(event){
															$('#ChangeViewport').attr('content', 'maximum-scale=1');
															event.preventDefault();	
															var dirTypeCP = CarpetByFirma;
															
															if(TypeUser =='ADMINISTRACION' && dirTypeCP=='Inscripcion'){
																
																$.ajax({
																	url: 'validCapacitacion.php',
																	type: 'POST',
																	data: {action:'ValidPagoCurso',FolioValid:FolioValid,IdClientValid:IdClientValid,TypeUser:TypeUser,dirTypeCP:dirTypeCP},
																	success: function (exito) {
																		requestPetiAjax=exito;
																		console.log(exito);
																	}
																});
																
																											
															}else if(TypeUser =='RESPONSABLE' && dirTypeCP=='Inscripcion'){
																$.ajax({
																	url: 'validCapacitacion.php',
																	type: 'POST',
																	data: {action:'ValidCotizacionCurso',FolioValid:FolioValid,IdClientValid:IdClientValid,TypeUser:TypeUser},
																	success: function (exito) {
																		requestPetiAjax=exito;
																		console.log(exito);
																	}
																});
															}else if(TypeUser =='ADMINISTRACION' && dirTypeCP=='ConstanPC'){
																
																$.ajax({
																	url: 'validCapacitacion.php',
																	type: 'POST',
																	data: {action:'ValidPagoCurso',FolioValid:FolioValid,IdClientValid:IdClientValid,TypeUser:TypeUser,dirTypeCP:dirTypeCP},
																	success: function (exito) {
																		requestPetiAjax=exito;
																		console.log(exito);
																	}
																});
																
																											
															}
															
															$("#GeneratePdf").removeClass('hidden');
																$(".modalDialogFirma").addClass('hidden');
																$("#GeneratePdf").html("<img src='../../web/images/loading_BIG.gif' style='color:white;padding-top:20%;padding-left:32%'/>");
																setTimeout(function(){ 																																																							
																	if(requestPetiAjax==true){																																													
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
																}, 5000);
														});
														$(".modal-content .close").click(function() { $('#ChangeViewport').attr('content', 'maximum-scale=1'); });
														</script>
													</div>
												</div><div id="GeneratePdf" class="hidden"></div><div id="GeneratePdf2" class="hidden"></div>
											</div>
										</div>
										<!--Fin del Segundo Modal-->
										<!-- Start Modal Para generar Formato de Cotización-->
										<div class="modal fade" id="modalCotizar" tabindex="-1" role="dialog" aria-hidden="true" >
											<div class="modal-dialog modal-lg">
												<div class="modal-content modalDialogFirma animated flipInY">					
													<div class="modal-body">
														<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:25%;margin-left: 45%;z-index: 99999;position: absolute;">
															<div class="sk-double-bounce1"></div>
															<div class="sk-double-bounce2"></div>
														</div>
														<div class="row">
															<button type="button" class="close" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
															<h3><strong>Formato De Nueva Cotización</strong></h3><hr style="border-top: 2px dashed #11987dde;">
														</div>
														<form class="form-horizontal" name="frm_Costear" action="#" method="post" id="frm_Costear">
															<div class="row" style="padding-top:20px;">
																<div class="form-group form-group-sm">
																	<label class="control-label col-sm-2">N° de Folio:</label>
																	<div class="col-sm-4">
																		<input type="text" id="txtnoFolio" name="txtnoFolio" value="<?php echo date("dmy-"); ?>" class="form-control txtnoFolio text-uppercase" aria-describedby="helpBlock" autofocus>
																		<span class="error text-danger"></span>
																	</div>																					
																	<label class="control-label col-sm-1">Fecha:</label>
																	<div class="col-sm-2">
																		<input type="text" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" class="form-control txtfecha" disabled="">
																	</div>																				
																	<label class="control-label col-sm-2 hidden">N° Cliente:</label>
																	<div class="col-sm-2 hidden">
																		<input type="text" id="txtnoCliente" name="txtnoCliente" class="form-control txtnoCliente" aria-describedby="helpBlock">
																		<input type="text" id="txtSucu" name="txtSucu" value="TOLUCA" class="form-control txtSucu hidden" disabled="">
																	</div>
																</div><br><br>
																<div class="col-sm-12">                    
																	<div class="form-group form-group-sm "><label class="control-label col-xs-2">Nombre: </label>
																		<div class="input-group col-sm-10">
																			<span class="input-group-addon">
																				<i class="fa fa-info"></i>
																			</span>
																			<input type="text" name="txtNombreFull" id="txtNombreFull" placeholder="Nombre de la empresa" class="form-control txtNombreFull text-capitalize" required>
																		</div>
																	</div>
																	<div class="form-group form-group-sm"><label class="control-label col-xs-2">Contacto:</label>									
																		<div class="input-group col-sm-10">
																			<span class="input-group-addon">
																				<i class="fa fa-user"></i>
																			</span>
																			<input type="text" name="txtContacto" id="txtContacto" placeholder="Contacto" class="form-control txtContacto" required>
																		</div>
																	</div>							                       
																	<div class="form-group form-group-sm"><label class="control-label col-xs-2">Correo:</label>
																		<div class="input-group col-sm-10">
																			<span class="input-group-addon">
																				<i class="fa fa-at"></i>
																			</span>
																			<input type="email" name="txtCorreo" id="txtCorreo" placeholder="Correo electrónico" class="form-control txtCorreo" required>
																		</div>
																	</div> 							
																</div>  
															</div>
															<div class="row">
																<div class="col-sm-7">
																	<div class="form-group form-group-sm">
																		<label class="control-label col-xs-3">Teléfono:</label>
																		<div class="input-group col-sm-9">
																			<span class="input-group-addon">
																				<i class="fa fa-phone"></i>
																			</span>
																			<input type="text" name="txtTel" id="txtTel" placeholder="Número de teléfono" class="form-control txtTel" required>
																		</div>
																	</div>
																</div>
																<div class="col-sm-5">                    
																	<div class="form-group form-group-sm"><label class="control-label col-xs-2">C.P: </label>
																		<div class="input-group col-sm-10">
																			<span class="input-group-addon">
																				<i class="fa fa-info"></i>
																			</span>
																			<input type="number" name="txtCp" id="txtCp" placeholder="Codigo postal" class="form-control txtCp" required>
																		</div>
																	</div>					
																</div>
															</div>
															<hr>
															<div class="row">
																<div class="col-sm-6">                    
																	<div class="form-group form-group-sm"><label class="control-label col-xs-3">Cantidad: </label>
																		<div class="input-group col-sm-9">
																			<span class="input-group-addon">
																				<i class="fa fa-clock-o"></i>
																			</span>
																			<input type="number" name="txtCantidad" id="txtCantidad" placeholder="Cantidad" class="form-control txtCantidad">
																		</div>
																	</div>
																	<div class="form-group form-group-sm"><label class="control-label col-xs-3">Concepto: </label>
																		<div class="input-group col-sm-9">
																			<span class="input-group-addon">
																				<i class="fa fa-info"></i>
																			</span>
																			<input type="text" name="txtConcepto" id="txtConcepto" placeholder="Concepto de Pago" class="form-control txtConcepto text-uppercase" required>
																			<span class="error text-danger"></span>
																		</div>
																	</div>
																	<div class="form-group form-group-sm hidden"><label class="control-label col-xs-4">Fecha del Curso: </label>
																		<div class="input-group col-sm-8">
																			<span class="input-group-addon">
																				<i class="fa fa-calendar"></i>
																			</span>
																			<input type="date" name="txtDateCourse" id="txtDateCourse" placeholder="Fecha del Curso" class="form-control txtDateCourse" required>
																			<span class="error text-danger"></span>
																		</div>
																	</div>																
																</div>
																<div class="col-sm-6">                    
																	<div class="form-group form-group-sm"><label class="control-label col-xs-4">Precio Unit: </label>
																		<div class="input-group col-sm-8">
																			<span class="input-group-addon">
																				<i class="fa fa-dollar"></i>
																			</span>
																			<input type="text" name="txtPrecioUnit" id="txtPrecioUnit" placeholder="$00.00" min="0.00" max="10000.00" step="0.01" class="form-control txtPrecioUnit" required>
																			<span class="error text-danger"></span>
																		</div>
																	</div>
																	<div class="form-group form-group-sm"><label class="control-label col-xs-4">Importe: </label>
																		<div class="input-group col-sm-8">
																			<span class="input-group-addon">
																				<i class="fa fa-dollar"></i>
																			</span>
																			<input type="text" name="txtImporte" id="txtImporte" placeholder="$00.00" min="0.00" max="10000.00" step="0.01" class="form-control txtImporte" required>
																			<span class="error text-danger"></span>
																		</div>
																	</div>	
																</div>
															</div>
															<hr>
															<div class="row">
																<div class="col-sm-7">                    
																	<div class="form-group form-group-sm"><label class="control-label col-xs-4">Vigencia cotización: </label>
																		<div class="input-group col-sm-8">
																			<span class="input-group-addon">
																				<i class="fa fa-clock-o"></i>
																			</span>
																			<input type="text" name="txtVigencia" id="txtVigencia" placeholder="Vigencia de la cotización" class="form-control txtVigencia text-uppercase" required>
																		</div>
																	</div>
																	<div class="form-group form-group-sm"><label class="control-label col-xs-4">Cantidad con letra: </label>
																		<div class="input-group col-sm-8">
																			<span class="input-group-addon">
																				<i class="fa fa-info"></i>
																			</span>
																			<input type="text" name="txtCantLetra" id="txtCantLetra" placeholder="Cantidad con letra" class="form-control txtCantLetra text-uppercase">
																		</div>
																	</div>
																	<div class="form-group form-group-sm"><label class="control-label col-xs-2">Nota: </label>
																		<div class="input-group col-sm-10">
																			<span class="input-group-addon">
																				<i class="fa fa-comment"></i>
																			</span>
																			<textarea name="txtNota" id="txtNota" class="form-control txtNota text-capitalize" placeholder="Nota" rows="2"></textarea>
																		</div>
																	</div>																
																</div>
																<div class="col-sm-5">                    
																	<div class="form-group form-group-sm"><label class="control-label col-xs-3">Subtotal: </label>
																		<div class="input-group col-sm-9">
																			<span class="input-group-addon">
																				<i class="fa fa-dollar"></i>
																			</span>
																			<input type="text" name="txtSubtotal" id="txtSubtotal" placeholder="$00.00" min="0.00" max="10000.00" step="0.01" class="form-control txtSubtotal" required>
																			<span class="error text-danger"></span>
																		</div>
																	</div>
																	<div class="form-group form-group-sm"><label class="control-label col-xs-3">I.V.A: </label>
																		<div class="input-group col-sm-9">
																			<span class="input-group-addon">
																				<i class="fa fa-dollar"></i>
																			</span>
																			<input type="text" name="txtIva" id="txtIva" placeholder="$00.00" min="0.00" max="10000.00" step="0.01" class="form-control txtIva" required>
																			<span class="error text-danger"></span>
																		</div>
																	</div>	
																	<div class="form-group form-group-sm"><label class="control-label col-xs-3">Total: </label>
																		<div class="input-group col-sm-9">
																			<span class="input-group-addon">
																				<i class="fa fa-dollar"></i>
																			</span>
																			<input type="text" name="txtTotal" id="txtTotal" placeholder="$00.00" min="0.00" max="10000.00" step="0.01" class="form-control txtTotal" required>
																			<span class="error text-danger"></span>
																		</div>
																	</div>	
																</div>
															</div>
															<hr>
														</form>
														<button type="submit" class="btn btn-primary btn-block btn-md" style="font-size: 15px !important;padding: 5px 7px !important;font-weight: 390 !important;margin-top:30px;" name="btnCotizar" id="btnCotizar">Guardar</button>
													</div>
													<div class="">
														<script>
															$('#txtSubtotal').keyup(function(){
																var valSubtotal = $(this).val();
																var valIva = valSubtotal.replace(",", "")*.16;
																var valTotal = parseInt(valSubtotal.replace(",", "")) + parseInt(valIva);
																
																$('#txtIva').val(valIva);
																if(valSubtotal==''){ $('#txtTotal').val('0.00'); }else{ $('#txtTotal').val(valTotal); }
															});
														</script>
														<script> var attrFolio = '', txtnoFolio = true, txtSubtotal = true, txtIva = true, txtTotal = true, txtCantidad = true, txtConcepto = true, txtPrecioUnit = true, txtImporte = true;
															//Cargar Datos para la cotización
															$('.showDatosCosto').click(function(event){
																event.preventDefault();
																$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
																	attrFolio = $(this).attr('attrNoFolio');																
																// alert(attrFolio);
																$.ajax({
																	type: "POST",
																	url: "validCapacitacion.php",
																	data: {action:'SearchDatosForCostear', attrFolio:attrFolio},
																	success: function(exito) {  
																		var obj = $.parseJSON(exito);
																		$('#txtNombreFull').val(obj[0]['RAZON_SOCIAL_EMP']);
																		$('#txtContacto').val(obj[0]['NOMBRE_FULL']);
																		$('#txtCorreo').val(obj[0]['EMAIL']);
																		$('#txtTel').val(obj[0]['TELEFONO']);
																		var getNewFolio = obj[0]['NEW_FOLIO'];
																		if(getNewFolio!=null){
																			$('#txtnoFolio').val(getNewFolio);
																			$('#txtCp').val(obj[0]['CP']);
																			$('#txtCantidad').val(obj[0]['CANTIDAD']);
																			$('#txtConcepto').val(obj[0]['CONCEPTO']);
																			$('#txtPrecioUnit').val(obj[0]['PRECIO_UNIT']);
																			$('#txtImporte').val(obj[0]['IMPORTE']);
																			$('#txtVigencia').val(obj[0]['VIGENCIA_COTIZACION']);
																			$('#txtCantLetra').val(obj[0]['CANTIDAD_LETRA']);
																			$('#txtNota').val(obj[0]['NOTA']);
																			$('#txtSubtotal').val(obj[0]['SUBTOTAL']);
																			$('#txtIva').val(obj[0]['IVA']);
																			$('#txtTotal').val(obj[0]['TOTAL']);
																		}
																		$('#RequestCotizacion').html(exito);
																		setTimeout(function() {
																			$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none");
																		},1200);
																	}
																});
																
																$('#modalCotizar').modal({backdrop:'static',keyboard:false, show:true});
															});
															//Cargar Datos para cotizar y generar PDF
															$('button#btnCotizar').click(function(event){
																event.preventDefault();
																$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
																// txtnoFolio
																	if ($('#txtnoFolio').val().length === 0) {
																		$('#txtnoFolio').siblings('span.error').text('Por favor Crear No. Folio').fadeIn().parent('.form-group').addClass('hasError');
																		txtnoFolio = true; } else {
																		$('#txtnoFolio').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		txtnoFolio = false; }
																// txtSubtotal
																	if ($('#txtSubtotal').val().length === 0) {
																		$('#txtSubtotal').siblings('span.error').text('Por favor llenar este campo').fadeIn().parent('.form-group').addClass('hasError');
																		txtSubtotal = true; } else {
																		$('#txtSubtotal').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		txtSubtotal = false; }
																// txtIva
																	if ($('#txtIva').val().length === 0) {
																		$('#txtIva').siblings('span.error').text('Por favor llenar este campo').fadeIn().parent('.form-group').addClass('hasError');
																		txtIva = true; } else {
																		$('#txtIva').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		txtIva = false; }
																// txtTotal
																	if ($('#txtTotal').val().length === 0) {
																		$('#txtTotal').siblings('span.error').text('Por favor llenar este campo').fadeIn().parent('.form-group').addClass('hasError');
																		txtTotal = true; } else {
																		$('#txtTotal').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		txtTotal = false; }
																// txtCantidad
																	if ($('#txtCantidad').val().length === 0) {
																		$('#txtCantidad').siblings('span.error').text('Por favor llenar este campo').fadeIn().parent('.form-group').addClass('hasError');
																		txtCantidad = true; } else {
																		$('#txtCantidad').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		txtCantidad = false; }
																// txtConcepto
																	if ($('#txtConcepto').val().length === 0) {
																		$('#txtConcepto').siblings('span.error').text('Por favor llenar este campo').fadeIn().parent('.form-group').addClass('hasError');
																		txtConcepto = true; } else {
																		$('#txtConcepto').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		txtConcepto = false; }
																// txtPrecioUnit
																	if ($('#txtPrecioUnit').val().length === 0) {
																		$('#txtPrecioUnit').siblings('span.error').text('Por favor llenar este campo').fadeIn().parent('.form-group').addClass('hasError');
																		txtPrecioUnit = true; } else {
																		$('#txtPrecioUnit').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		txtPrecioUnit = false; }
																// txtImporte
																	if ($('#txtImporte').val().length === 0) {
																		$('#txtImporte').siblings('span.error').text('Por favor llenar este campo').fadeIn().parent('.form-group').addClass('hasError');
																		txtImporte = true; } else {
																		$('#txtImporte').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		txtImporte = false; }
																
																	if (txtnoFolio == true || txtSubtotal == true || txtIva == true || txtTotal == true || txtCantidad == true || txtConcepto == true || txtPrecioUnit == true || txtImporte == true){
																		console.log('Completar Todos los cammpos');
																	}else{
																		$.ajax({
																			url: 'validCapacitacion.php',
																			type: 'POST',
																			data: {action:'GenerateFormatCotiza',sendOldFolio:attrFolio, sendFolio:$('#txtnoFolio').val(),txtfecha:$('#txtfecha').val(),nameRazonSocial:$('#txtNombreFull').val(),nameContacto:$('#txtContacto').val(),sendCorreo:$('#txtCorreo').val(),sendTel:$('#txtTel').val(),sendCP:$('#txtCp').val(),sendVigencia:$('#txtVigencia').val(),sendCantLetra:$('#txtCantLetra').val(),sendSubTotal:$('#txtSubtotal').val(),sendIVA:$('#txtIva').val(),sendTotal:$('#txtTotal').val(),sendCantidad:$('#txtCantidad').val(),sendConcepto:$('#txtConcepto').val(),sendPrecioUnit:$('#txtPrecioUnit').val(),sendImporte:$('#txtImporte').val(),sendNota:$('#txtNota').val()},
																			// success: function (r) { $('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none"); $("#frm_Costear")[0].reset(); $('#modalCotizar').modal('hide'); toastr.success('','DATOS GUARDADOS CORRECTAMENTE'); }
																			success: function (r) { $('.sk-spinner-double-bounce').css("display","none"); $("#frm_Costear")[0].reset(); toastr.success('','DATOS GUARDADOS CORRECTAMENTE'); setTimeout(function(){ location.reload(); },3200); }
																		});
																	}
															});
														</script>
													</div>
													<!-- </form> -->
												</div>
											</div>
										</div>
										<!-- END  Modal Para generar Formato de Cotización-->
										
										<!-- Start Modal Para ver Detalles de la Constancia Protección Civil-->
										<div class="modal fade" id="modalDetailConstan" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-lg modalContentDocment" role="document">
												<div class="modal-content modalDialogFirma animated flipInY" id="loadModalDetailConstan">	
													<div class="modal-body">
														<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:25%;margin-left: 45%;z-index: 99999;position: absolute;">
															<div class="sk-double-bounce1"></div>
															<div class="sk-double-bounce2"></div>
														</div>
														</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
													</div>
												</div>
											</div><div id="loadingUpdate" ></div>
											<script> 
												//Cargar Detalles de Constancia Proteccion Civil
												$(".showDetailConstan").click(function(event) {										
													event.preventDefault();	
													$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
													$('#modalDetailConstan').modal({backdrop:'static',keyboard:false, show:true});
													
													var SendnoFolio=$(this).attr('data-noFolio'),
													TypeAutocomplite=$(this).attr('typeAutocomplite');
													
													$.ajax({
														type: "POST",
														url: "../../repositorio/loadCapacitacion/cargarDatosModal.php",
														data: {TypeAutocomplite:TypeAutocomplite,SendnoFolio:SendnoFolio},
														success: function(result) {												
															if(result=='vacio'){
																$('#modalDetailConstan').modal('hide');
																alert('Fallo al realizar la operación');
															}else{ $('#loadModalDetailConstan').html(result); }												
														}
													});																																										
													return false;																																																			
												});
											</script>
										</div>
										<!-- END  Modal Para ver Detalles de la Constancia Proteccion Civil-->
										<!--Modal Show Documents del Instructor-->
										<div id="modalShowDocuments" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content modalDialogFirma">
													<div class="modal-body">
														<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
															<div class="sk-double-bounce1"></div>
															<div class="sk-double-bounce2"></div>
														</div>
														<button type="button" class="close" id="closeModalEvidence" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
														<h2><strong>Documentos del Instructor</strong></h2> <hr style="border-top: 2px dashed #0e826a8a;">												
														<div class="row" id="RequestShowDocuments">
															  </br>                                      
															  </br>                                      
															  </br>                                      
														</div>                                          
													</div>		 										
													<div class="modal-footer" style="margin-top:-5px;">
														<button type="button" class="btn btn-primary hidden" data-dismiss="modal"> &nbsp; Enviar &nbsp;<i class="fa fa-play"></i> </button>
														<style> .file-preview { border: 1px solid transparent; } .text-warning { color: #149e82; } </style>
														<script>
															$('.showDocumentInst').click(function(event){
																event.preventDefault();	
																$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
																var numInstructor = $(this).attr('data-noCliente');
																
																$.ajax({
																	url: 'validCapacitacion.php',
																	type: 'POST',
																	data: {action:'ShowDocumentInstruc',numInstructor:numInstructor},
																	success: function (df) { $('#RequestShowDocuments').html(df); $('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none"); }
																});
																
																$('#modalShowDocuments').modal({backdrop:'static',keyboard:false, show:true});
																return false;
															});
															function UpdateValidDoc(attrIdDocument,val){
																event.preventDefault();	
																$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");																
																
																$.ajax({
																	url: 'validCapacitacion.php',
																	type: 'POST',
																	data: {action:'UpdaValidDoc',attrIdDocument:attrIdDocument,val:val},
																	success: function (exito) { $('#RequestShowDocuments').html(exito); $('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none"); }
																});
																
																
															}
														</script>
													</div>
												</div>
											</div>
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
    location.href = '../../';
</script>";
}
?>