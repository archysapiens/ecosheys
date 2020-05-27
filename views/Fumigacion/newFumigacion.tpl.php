<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">

			<?php// navbar($activeDesk='',$activeAdmin='',$activeFumi='active',$activeExtin='',$activeCourse='',$activeInscrip='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeFumi',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-10 col-lg-offset-1 col-md-12">
							<div class="ibox float-e-margins" id="RegistroDeServicio">
								<div class="ibox-title">
									<!--h5 style="color:black">Certificado de Fumigación</h5-->
									<div class="ibox-tools">
										<div class="btn-group hidden" style="margin-right:7%;" id="DropdowsAction">
											<button data-toggle="dropdown" class="btn btn-primary btn-xs in-line dropdown-toggle" >Action <span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a href="#" class="btn btn-xs BuutonValidProcess hidden" role="button" data-toggle="modal" data-target="#modalProceesValid">Proceso Validación</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" data-toggle="modal" data-target="#modalAddEmailEnvio">Agregar Correo</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" id="ActionVerPdf" target="_blank">Ver PDF</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" id="NewCertifiFumi">Nuevo Certificado</a></li>												
											</ul>
										</div>
										<!--button type="button" class="btn btn-primary btn-xs in-line BuutonValidProcess hidden" style="margin-right:7%;" data-toggle="modal" data-target="#modalProceesValid">Proceso Validación</button-->
										<a class="collapse-link FormFumigacion">
											<i class="fa fa-chevron-up"></i>
										</a>										 
									</div>
								</div>								
								<div class="ibox-content text-center FormFumigacion">
									<div class="row">
										<div class="col-lg-11" style="text-align:center;vertical-align:middle">											
											<form class="form-horizontal" name="frm_Fumigacion" id="frm_Fumigacion">
											   <div class="bs-example tabs-container with-nav-tabs panel-success">
													<div class="form-group form-group-sm">
														<label class="control-label col-xs-2">N° DE FOLIO:</label>
														<div class="col-xs-3 control-label-noFolio">
															<input type="text" id="txtnoFolio" name="txtnoFolio" class="form-control txtnoFolio" aria-describedby="helpBlock"  disabled>
														</div>																											
														<label class="control-label col-xs-1">FECHA:</label>
														<div class="col-xs-2">
															<input type="text" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" class="form-control txtfecha" disabled>
														</div>
																										
														<label class="control-label col-xs-2">N° CLIENTE:</label>
														<div class="col-xs-2 control-label-noCliente">
															<input type="text" id="txtnoCliente" name="txtnoCliente" value="<?=@$idClient?>" class="form-control txtnoCliente" aria-describedby="helpBlock"  autofocus>
														</div>
														
														<div class="col-xs-3">
															<input type="text" id="txtSucu" name="txtSucu" value="<?=@$_SESSION['sesionSucur']?>" class="form-control txtSucu hidden" disabled>
														</div>
													</div>
												</div>
												<br>
												<h4 style="color:#11987d">DATOS DEL CLIENTE</h4>
												<br>
												<div class="form-group form-group-sm">
													<label  class="control-label col-xs-3">NOMBRE DEL CLIENTE:</label>
													<div class="col-xs-9">
														<input type="text" id="txtnomClient" name="txtnomClient" class="form-control txtnomClient" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)" disabled>
													</div>
												</div>
												<div class="form-group form-group-sm">
													<label  class="control-label col-xs-3">DIRECCION:</label>
													<div class="col-xs-9">
														<input type="text" id="txtdirection" name="txtdirection" class="form-control txtdirection" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)" disabled>
													</div>
												</div>
												<div class="form-group form-group-sm">
													<label  class="control-label col-xs-3">HR. INICIO:</label>
													<div class="col-xs-3">
														<div class="input-group bootstrap-timepicker" data-autoclose="true">
															<input type="text" id="txthorInicio" name="txthorInicio" class="form-control txthorInicio timepicker time start" value="00:00">
															<span class="input-group-addon">
																<span class="fa fa-clock-o"></span>
															</span>
														</div>
													</div>
													<label  class="control-label col-xs-3">HR. FINALIZADO:</label>
													<div class="col-xs-3">
														<div class="input-group bootstrap-timepicker" data-autoclose="true">
															<input type="text" id="txthorFinal" name="txthorFinal" class="form-control txthorFinal timepicker2 time end" value="00:00">
															<span class="input-group-addon">
																<span class="fa fa-clock-o"></span>
															</span>
														</div>
													</div>
												</div>
												<br><div class="row">
												<div class="col-xs-9" style="padding-left:28%"> <h4 style="color:#11987d">DATOS DEL SERVICIO</h4> </div>
												<div class="col-xs-3">	<button type="button" class="btn btn-primary btn-xs pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModalAgregarServicio">Agregar Servicio</button> </div> </div>
												<br>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">ÁREAS A FUMIGAR:</label>
													<div class="col-xs-5">															
														<select id="txtareaFumi" name="txtareaFumi" class="selectSearch form-control txtareaFumi input-sm" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectAreas->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>																																																													
														</select>
													</div>
													<label  class="control-label col-xs-1">TIPO:</label>
													<div class="col-xs-3">															
														<select id="txttipoServicio" name="txttipoServicio" class="selectSearch form-control txttipoServicio input-sm" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectTypeFumi->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>
														</select>
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">PLAGAS A CONTROLAR:</label>
													<div class="col-xs-9">															
														<select id="txtplagas" name="txtplagas" class="selectSearch form-control txtplagas input-sm" multiple="multiple" style="width:100%;"> <?php
															while($row = $SelectPlagas->fetch_assoc()) {
																echo "<option value=".$row['nombre'].">".$row['nombre']."</option>";
															}?>																																																																								
														</select>
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">MÉTODO DE APLICACIÓN:</label>
													<div class="col-xs-9">															
														<select id="txtmethod1" name="txtmethod1" class="selectSearch form-control txtmethod1 input-sm" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectMetodo->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>
														</select>
													</div>
												</div>
												<br>
												<h4 style="color:#11987d">DESCRIPCION DEL INSECTICIDA</h4>
												<br>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">NOMBRE COMERCIAL:</label>
													<div class="col-xs-9">															
														<select id="txtnomComercial" name="txtnomComercial" class="selectSearch form-control txtnomComercial" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectNomComercial->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>
														</select>
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">NOMBRE QUÍMICO:</label>
													<div class="col-xs-9">																
														<select id="txtnomQuimico" name="txtnomQuimico" class="selectSearch form-control txtnomQuimico" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectNomQuimico->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>
														</select>
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">MÉTODO DE APLICACIÓN:</label>
													<div class="col-xs-9">															
														<select id="txtmethod2" name="txtmethod2" class="selectSearch form-control txtmethod2" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectMetodo2->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>
														</select>
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">COMPOSICIÓN:</label>
													<div class="col-xs-4">																
														<select id="txtcomposition" name="txtcomposition" class="selectSearch form-control txtcomposition input-sm" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectComposicion->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>
														</select>
													</div>
													<label  class="control-label col-xs-1">DÓSIS:</label>
													<div class="col-xs-4">																
														<select id="txtdosis" name="txtdosis" class="selectSearch form-control txtdosis input-sm" style="width:100%;"><?php
															while($row = $SelectDosis->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>
														</select>
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">														
													<label  class="control-label col-xs-3">REGISTRO COFEPRIS:</label>
													<div class="col-xs-9">																
														<select id="txtcofepris" name="txtcofepris" class="selectSearch form-control txtcofepris input-sm" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectCofepris->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>
														</select>
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">PERIODICIDAD SERVICIO:</label>
													<div class="col-xs-9">
														<select id="txtperiodiService" name="txtperiodiService" class="selectSearch form-control txtperiodiService" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectPeriodicidad->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>
														</select>	
													</div>
												</div>
												<div class="form-group form-group-sm">																			
													<label  class="control-label col-xs-3">PRÓXIMO SERVICIO:</label>
													<div class="col-xs-9" id="data_2">
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="txtnextService" name="txtnextService" class="form-control txtnextService">
														</div>
													</div>
												</div>
												<div class="form-group form-group-sm">																			
													<label  class="control-label col-xs-3">OBSERVACIONES:</label>
													<div class="col-xs-9">
														<input type="textarea" id="txtObser" name="txtObser" class="form-control txtObser text-uppercase" onkeydown="return validarLetras(event)">
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">RESPONSABLE ÁREA:</label>
													<div class="col-xs-9">
														<select id="txtresponsable" name="txtresponsable" class="selectSearch form-control txtresponsable input-sm" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectResponsable->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>																																																										
														</select>
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">TÉCNICO APLICADOR:</label>
													<div class="col-xs-9">
														<select id="txttecnico" name="txttecnico" class="selectSearch form-control txttecnico input-sm" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectTecnico->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>																																																									
														</select>
													</div>
												</div>
												<div class="form-group form-group-sm" style="text-align:left">																			
													<label  class="control-label col-xs-3">ÁREA ADMINISTRACIÓN:</label>
													<div class="col-xs-9">
														<select id="txtadministracion" name="txtadministracion" class="selectSearch form-control txtadministracion input-sm" style="width:100%;">
															<option value="">SELECCIONA...</option><?php
															while($row = $SelectAdministrativa->fetch_assoc()) {
																echo "<option value=".$row['id'].">".$row['nombre']."</option>";
															}?>																																																									
														</select>
													</div>
												</div>
											</form>	<br>											
											<button type="button" class="ladda-button btn btn-primary btn-block pull-right" data-style="expand-right" id="btnGuardar_Certificado" style="display:none"> <span class="fa fa-send"></span> &nbsp; Guardar</button>																								
										    <div class="result-Ajax hidden"> </div>
										</div>
									</div>										
								</div>
								<style>
									.nav-tabs { border-bottom: 2px solid #DDD; }
									.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
									.nav-tabs > li > a { border: none; color: #666; }
									.nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #11987d !important; background: transparent; }
									.nav-tabs > li > a::after { content: ""; background: #11987d; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
									.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
									.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }	
								</style>								
								<div class="modal inmodal fade" id="myModalAgregarServicio" tabindex="-1" role="dialog"  aria-hidden="true">
									<div class="modal-dialog modal-sm" style="width:27%">
										<div class="modal-content modalDialogAddOption">
											<button type="button" class="close" style="padding-top:5px;padding-right:5px;" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h3 class="text-center" style="padding-top:10px;color:gray">Agregar Campo</h3>
											<div class="modal-body">
												<div class="row">
													<div class="col-sm-12">
														<form role="form" class="form-horizontal text-left ">
															<div class="form-group form-group-sm" style="text-align:left">
																<label class="control-label col-xs-3">Campo:</label>
																<div class="col-xs-9">
																	<select id="txtAddOptionGeneral" name="txtAddOptionGeneral" class="form-control txtAddOptionGeneral input-sm" style="width:100%;">
																		<option value="">SELECCIONA...</option>
																		<option value="alta_areas_fumigar">ÁREAS A FUMIGAR</option>
																		<option value="alta_tipo_fumigacion">TIPO SERVICIO</option>
																		<option value="alta_plagas">PLAGAS A CONTROLAR</option>
																		<option value="alta_nombre_comercial">NOMBRE COMERCIAL</option>
																		<option value="alta_nombre_quimico">NOMBRE QUÍMICO</option>
																		<option value="alta_metodo_aplicacion">MÉTODO DE APLICACIÓN</option>
																		<option value="alta_composicion">COMPOSICIÓN</option>
																		<option value="alta_dosis">DÓSIS</option>
																		<option value="alta_registro_cofe">REGISTRO COFEPRIS</option>
																		<option value="alta_periodicidad">PERIODICIDAD SERVICIO</option>
																		<option value="alta_tecnico_aplicador"> TÉCNICO APLICADOR</option>
																	</select>
																</div>
															</div>																					
															<div class="form-group form-group-sm" id="form-controlGeneral">
																<label class="control-label col-xs-3">Valor:</label>
																<div class="col-xs-9">
																	<input type="text" id="txtValueCampo" name="txtValueCampo" class="form-control input-sm txtValueCampo" onkeyup="javascript:this.value=this.value.toUpperCase();">
																</div>
															</div>
															<div id="formControlGeneralExtra">
																
															</div>
														</form>
													</div>
												</div>
												<div class="text-white badge badge-danger pull-center text-info-addCampoNew" style="margin-top:15px"></div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="addOptionGeneral">Aceptar</button>
													<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>													
												</div>
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
													<li role="presentation" id="SecondTab" ><a href="#canvasTab" aria-controls="canvasTab" role="tab" data-toggle="tab">Firma Área Operativa</a></li>															
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
															<a id="NexTabCanvas" style="margin-top:120px;" href="#canvasTab" aria-controls="canvasTab" data-toggle="tab" class="btn btn-primary btn-md" role="button">Next &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
														</div>
													</div>
													<div role="tabpanel" class="tab-pane" id="canvasTab">
														<canvas id="canvas">Su navegador no soporta Firma Electronica :( </canvas>
													</div>
												</div>														
											</div>
											<div class="modal-footer" style="margin-top:-5px;">
												<field>															
													<a id="download" class="btn btn-primary btn-md hidden" role="button">Guardar Firma</a>
													<button type="button" id="limpiar" class="btn btn-default  btn-md hidden">Limpiar</button>
													<button type="button" class="btn btn-white hidden" data-dismiss="modal">Cerrar</button>
												</field>
											</div>
										</div><div id="GeneratePdf" class="hidden"></div>
									</div>
								</div>
								<div class="modal fade" id="modalProceesValid" tabindex="-1" role="dialog" aria-labelledby="ValidProcees" aria-hidden="true">
									<div class="modal-dialog" role="document" style="width:60%;">
										<div class="modal-content modalValidProcess">	
											<div  style="padding-bottom: 3px;">
												<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" data-dismiss="modal">&times;</button>											
												<a href="javascript:;" style="color:#000;padding-top:15px;padding-left:23%;" data-click="panel-reload"><i class="fa fa-refresh ActualizarValidModal"></i></a>														
											</div>											
											<div class="modal-body BodyTimelineValid" style="margin-top:-5px;">
																									
											</div>
											<div class="modal-footer" style="margin-top:-5px;">																								
												<button type="button" class="btn btn-white hidden" data-dismiss="modal">Cerrar</button>												
											</div>
										</div>
									</div>
								</div>
								<div class="modal inmodal fade" id="modalAddEmailEnvio" tabindex="-1" role="dialog"  aria-hidden="true" data-backdrop="static" data-keyboard="false">
									<div class="modal-dialog modal-sm" style="width:40%">
										<div class="modal-content modalDialogAddOption">
											<button type="button" class="close" style="padding-top:5px;padding-right:5px;" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h3 class="text-center" style="padding-top:10px;color:gray">Agregar Correo de envió</h3>
											<div class="modal-body">
												<div class="row">
													<div class="col-sm-12">														
														<div class="form-group form-group-sm" style="text-align:left">																
															<select class="form-control txtAddEmailEnvio" name="txtAddEmailEnvio" id="txtAddEmailEnvio" multiple data-role="tagsinput" required> 																																				
															</select>
														</div>																																																		
													</div>
												</div>
												<div class="text-info-addEmailEnvio" style="margin-top:15px"></div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="addEmailEnvioButton">Aceptar</button>
													<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>													
												</div>
											</div>
										</div>
									</div>
								</div>
								<script type="text/javascript">
									$("#NewCertifiFumi").click(function(event) {										
										event.preventDefault();										
										var GetNoFolio = $( '.txtnoFolio' ).val(),
										GetnoCliente = $( '.txtnoCliente' ).val();
										var folioDeleteTable = 'folioDeleteTable';								
										
											// Envia noFolio y elimina los campos en las tablas reportes_fumi y valid_modulo										
											$.post( 'newFumigacion.php' , { folioDeleteTable : folioDeleteTable,GetNoFolio:GetNoFolio,GetnoCliente:GetnoCliente },
											function ( exito ){													
												$.confirm({
													title: 'Exito!',
													content: '  &nbsp; Operación Exitosa!',
													type: 'green',
													theme: 'modern',
													typeAnimated: true,
													animationSpeed: 100, // 2 seconds
													animation: 'scale',
													closeAnimation: 'scale',
													closeIcon: true,
													draggable: true,
													icon: 'fa fa-check',
													closeIconClass: 'fa fa-close',
													closeIcon: function(){ location.reload(); },
													buttons: {
														ok: {
															text: 'Listo!',
															btnClass: 'btn-green btn-sm',
															action: function(){																				
																location.reload();
															}
														}
													}
												});																							
											});																																
										
										return false;
									});
								</script>
								<script type="text/javascript">
									$("#addEmailEnvioButton").click(function(event) {
										
										event.preventDefault();
										
										var AddEmailEnvio = $(".txtAddEmailEnvio").val();
										var GetNoFolio = $( '.txtnoFolio' ).val(),
										GetnoCliente = $( '.txtnoCliente' ).val();
										var formAddEmailEnvio = 'formAddEmailEnvio';

										$('.text-info-addEmailEnvio').html('');										
										
											// Agrega un nuevo correo de envio y se almacena en la Tabla *Valid_modulo*											
											$.post( 'newFumigacion.php' , { formAddEmailEnvio : formAddEmailEnvio,AddEmailEnvio:AddEmailEnvio,GetNoFolio:GetNoFolio,GetnoCliente:GetnoCliente },
											function ( exito ){													
												$('.text-info-addEmailEnvio').append(exito).fadeIn(2000);																								
											});																																
										
										return false;
									});
								</script>
								<script type="text/javascript">
									// si eligen nuevo tecnico aparece dos campos más para crear un usuaio
									$("#txtAddOptionGeneral").change(function() {
									  var valueSelectAdd = $(this).val();
									  if(valueSelectAdd == 'alta_tecnico_aplicador'){ $('#formControlGeneralExtra').append('<div class="form-group form-group-sm"> <label class="control-label col-xs-3">Correo:</label> <div class="col-xs-9"> <input type="email" id="txtValueCorreo" name="txtValueCorreo" class="form-control input-sm txtValueCorreo" > </div> </div><div class="form-group form-group-sm"> <label class="control-label col-xs-3">Contraseña:</label> <div class="col-xs-9"> <input type="text" id="txtValueContrasena" name="txtValueContrasena" class="form-control input-sm txtValueContrasena" > </div> </div>')	}else{
										  $('#formControlGeneralExtra').html('');
									  }
									  
									});
									$("#addOptionGeneral").click(function() {
										var nameCampoAdd = $("input#txtValueCampo").val();
										var nameSelectAdd = $("#txtAddOptionGeneral").val();
										var txtValueCorreo = $.trim($("#txtValueCorreo").val());
										var txtValueContrasena = $.trim($("#txtValueContrasena").val());
										var nameComboAdd='';
										if(nameSelectAdd=='alta_areas_fumigar'){ nameComboAdd = '#txtareaFumi';											
										}else if(nameSelectAdd=='alta_nombre_comercial'){ nameComboAdd = '#txtnomComercial';
										}else if(nameSelectAdd=='alta_plagas'){ nameComboAdd = '#txtplagas';
										}else if(nameSelectAdd=='alta_tipo_fumigacion'){ nameComboAdd = '#txttipoServicio';
										}else if(nameSelectAdd=='alta_metodo_aplicacion'){ nameComboAdd = '#txtmethod1, #txtmethod2';
										}else if(nameSelectAdd=='alta_nombre_comercial'){ nameComboAdd = '#txtnomComercial';
										}else if(nameSelectAdd=='alta_nombre_quimico'){ nameComboAdd = '#txtnomQuimico';
										}else if(nameSelectAdd=='alta_composicion'){ nameComboAdd = '#txtcomposition';
										}else if(nameSelectAdd=='alta_registro_cofe'){ nameComboAdd = '#txtcofepris';
										}else if(nameSelectAdd=='alta_periodicidad'){ nameComboAdd = '#txtperiodiService';
										}else if(nameSelectAdd=='alta_dosis'){ nameComboAdd = '#txtdosis';  nameCampoAdd = $("input#txtValueCampo").val().toLowerCase(); 
										}else if(nameSelectAdd=='alta_tecnico_aplicador'){ nameComboAdd = '#txttecnico'; }

										$('.text-info-addCampoNew').html('');
										$.ajax({
											type: "POST",
											url: "../../repositorio/SelectAdd/addOptionGeneral.php",
											data: {nameCampoAdd:nameCampoAdd, nameSelectAdd:nameSelectAdd, valueCorreo:txtValueCorreo, valueContrasena:txtValueContrasena},
											success: function(result) {
												$('.text-info-addCampoNew').append(result);
												if(result==''){
													$("input#txtValueCampo").val('');
													$(nameComboAdd).append('<option value="'+nameCampoAdd+'" selected="selected">'+nameCampoAdd+'</option>');													
													$('#form-controlGeneral').removeClass('has-error'); 
													$('#form-controlGeneral').addClass('has-success'); 
													$('#myModalAgregarServicio').modal('toggle');																										
												}else{
													$('#form-controlGeneral').removeClass('has-success'); 
													$('#form-controlGeneral').addClass('has-error'); 
												}																	
											}
										});												
										
										return false;
									});
								</script>
								<script type="text/javascript">
									$(document).ready(function(){
										$("#txtperiodiService").change(function(){	
											var opService = $("#txtperiodiService option:selected").val();
											// var hoy = new Date('1/01/2017');
											var hoy = new Date();
											var NumOfMes = [ "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12" ];
											if(opService=='1'){hoy.setMonth(hoy.getMonth() + 12);
												}else if(opService=='5'){hoy.setMonth(hoy.getMonth() + 1);
												}else if(opService=='7'){hoy.setDate(hoy.getDate() + 15);
												}else if(opService=='8'){hoy.setMonth(hoy.getMonth() + 6);
												}else if(opService=='9'){
													if((hoy.getMonth()+1)==1 || (hoy.getMonth()+1)==4 || (hoy.getMonth()+1)==7 || (hoy.getMonth()+1)==10){hoy.setMonth(hoy.getMonth() + 3)};							
												}else if(opService=='10'){
													if((hoy.getMonth()+1)==8){hoy.setMonth(hoy.getMonth() + 4);
													}else if((hoy.getMonth()+1)==2 || (hoy.getMonth()+1)==5){hoy.setMonth(hoy.getMonth() + 3);
													}else if((hoy.getMonth()+1)==12){hoy.setMonth(hoy.getMonth() + 2);}
												}else if(opService=='11'){
													if((hoy.getMonth()+1)==3 || (hoy.getMonth()+1)==6 || (hoy.getMonth()+1)==9 || (hoy.getMonth()+1)==12){hoy.setMonth(hoy.getMonth() + 3)};							
												}
											var meses = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];
											var month = hoy.getMonth();
											var dayOfMonth = hoy.getDate();
											var yyyy = hoy.getFullYear();
											$('#txtnextService').val(meses[month]+'-'+yyyy);
										});
										$("#txtmethod1").change(function(){
												var op = $("#txtmethod1 option:selected").val();
												$('#txtmethod2').val(op).change();
										});
										$("#txtnomComercial").change(function(){
												var op = $("#txtnomComercial option:selected").val();
												// alert(op);
												if(op=='1'){
													$('#txtcofepris').val('').change();
													$('#txtnomQuimico').val('').change();
													$('#txtcomposition').val('').change();
												}
												else if(op=='2'){
													$('#txtcofepris').val('1').change();
													$('#txtnomQuimico').val('1').change();
													$('#txtcomposition').val('1').change();
												}
												else if(op=='3'){
													$('#txtcofepris').val('2').change();
													$('#txtnomQuimico').val('1').change();
													$('#txtcomposition').val('1').change();
												}
												else if(op=='4'){
													$('#txtcofepris').val('3').change();
													$('#txtnomQuimico').val('2').change();
													$('#txtcomposition').val('2').change();
												}
												else if(op=='5'){
													$('#txtcofepris').val('4').change();
													$('#txtnomQuimico').val('3').change();
													$('#txtcomposition').val('3').change();
												}
												else{
													$('#txtcofepris').val('').change();
													$('#txtnomQuimico').val('').change();
													$('#txtcomposition').val('').change();
												}
										});
									});
								</script>
								<script type="text/javascript">
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
									function pad(num){
										numtmp='"'+num+'"';
										largo=numtmp.length-2;
										numtmp=numtmp.split('"').join('');
										if(largo==4)return numtmp;
										ceros='';
										pendientes=4-largo;
										for(i=0;i<pendientes;i++)ceros+='0';
										return ceros+numtmp;
									}
									var TypeAutocomplite = "AutocompliteCerticateFumi";
									var VALID = "false";
									
									$(".ActualizarValidModal").click(function(event){
										var hrefUrlModalValid = '../../repositorio/loadFumigacion/loadValidModal.php?noFolio='+$('#txtnoFolio').val();	
										$(this).addClass('fa-spin'); 
										$(".BodyTimelineValid").load(hrefUrlModalValid, function(){ setTimeout(function(){ $(".ActualizarValidModal").removeClass('fa-spin'); }, 1200); }); 										
									})
									
									$("#txtnoCliente").keyup(function() {
										$("#txtnoCliente").prop('disabled', true);
										var noCliente = $(this).val();
										VALID = "false";										
										$(".BodyTimelineValid").html('');
										$.ajax({
											type: "POST",
											url: "../../repositorio/loadFumigacion/cargar-datos.php",
											data: {noCliente:noCliente,txtSucu:$('.txtSucu').val(),TypeAutocomplite:TypeAutocomplite},
											success: function(result) {
												$("#txtnoCliente").prop('disabled', false).focus();
												$(".BuutonValidProcess").addClass('hidden');
												$("#DropdowsAction").addClass('hidden');
												if(result=='vacio'){
													$('#txtnomClient').val('');
													$('#txtdirection').val('');
													$('#txtareaFumi').val('');
													$('#txtnoFolio').val('');
													document.getElementById("btnGuardar_Certificado").style.display='none';
												}else{
												var ExplodeCliente = result.split("#");
												$("#txtnomClient").val($.trim(ExplodeCliente[0]));
												$("#txtdirection").val($.trim(ExplodeCliente[1]));
												$("#txtareaFumi").val($.trim(ExplodeCliente[2]));
												if($.trim(ExplodeCliente[5])!=''){ $("#txthorInicio").val($.trim(ExplodeCliente[5])); }
												if($.trim(ExplodeCliente[6])!=''){ $("#txthorFinal").val($.trim(ExplodeCliente[6])); }																								
												$("#txtareaFumi").val($.trim(ExplodeCliente[7])).change();
												$("#txttipoServicio").val($.trim(ExplodeCliente[8])).change();
												// if($.trim(ExplodeCliente[9])!=''){ $("#txtplagas").val($.trim(ExplodeCliente[9])).change(); }												
												var arrayTxtPlagas = $.trim(ExplodeCliente[9]).split(',');	$("#txtplagas").val(arrayTxtPlagas).change();											
												$("#txtmethod1").val($.trim(ExplodeCliente[10])).change();
												$("#txtnomComercial").val($.trim(ExplodeCliente[11])).change();
												$("#txtnomQuimico").val($.trim(ExplodeCliente[12])).change();
												$("#txtmethod2").val($.trim(ExplodeCliente[13])).change();
												$("#txtcomposition").val($.trim(ExplodeCliente[14])).change();
												if($.trim(ExplodeCliente[15])!=''){ $("#txtdosis").val($.trim(ExplodeCliente[15])).change(); }												
												$("#txtcofepris").val($.trim(ExplodeCliente[16])).change();
												$("#txtperiodiService").val($.trim(ExplodeCliente[17])).change();
												$("#txtnextService").val($.trim(ExplodeCliente[18]));
												$("#txtObser").val($.trim(ExplodeCliente[19]));
												$("#txtresponsable").val($.trim(ExplodeCliente[20])).change();
												$("#txttecnico").val($.trim(ExplodeCliente[21])).change();
												$("#txtadministracion").val($.trim(ExplodeCliente[22])).change();
												if($.trim(ExplodeCliente[24])!=''){ VALID = $.trim(ExplodeCliente[24]); }
												// alert('VALID = '+VALID);								
												if($.trim(ExplodeCliente[25])!=''){ $('#ActionVerPdf').attr("href",'<?=$sufijo?>'+$.trim(ExplodeCliente[25]));  }else{ $('#ActionVerPdf').attr("href", "#"); }										
												
												$("#passwordHelpBlock").html('<br> &nbsp; &nbsp; ¿Seguro de enviar correo a <strong><?php echo @$_SESSION['sesionUsuario'];?></strong>?');

												var str=ExplodeCliente[2];
												console.log('str >>'+str+'<<');
												var cadena= str.substr(1,3);
												var strSucur=ExplodeCliente[3];
												console.log('strSucur >>'+strSucur+'<<');

												var cadenaSucur= strSucur.substr(1,3);
												console.log('cadenaSucur >>'+cadenaSucur+'<<');


												var hoy = new Date();
												var dd = hoy.getDate();
												var mm = hoy.getMonth()+1; //hoy es 0!
												var yyyy = hoy.getFullYear().toString().substr(-2);

												if(dd<10) { dd='0'+dd } 
												if(mm<10) { mm='0'+mm } 
												// cadena = cadena+''+mm+''+dd+''+yyyy+''+pad(noCliente);
												cadena = 'CF'+cadenaSucur+''+cadena+''+yyyy+''+mm+''+dd+''+pad(noCliente);
												console.log('cadena >>'+cadena+'<<');

												$("#txtnoFolio").val(cadena);
												if($.trim(ExplodeCliente[23])!=''){ $("#txtnoFolio").val($.trim(ExplodeCliente[23])); }												
																								
												document.getElementById("btnGuardar_Certificado").style.display='';
												
												if($.trim(ExplodeCliente[23])!=''){ 
												    $(".BuutonValidProcess").removeClass('hidden');
												    $("#DropdowsAction").removeClass('hidden');
													var hrefUrlModalValid = '../../repositorio/loadFumigacion/loadValidModal.php?noFolio='+$("#txtnoFolio").val();	
													$(".BodyTimelineValid").load(hrefUrlModalValid);
												}												 
												
												}
												
											}
										});												
																														
										return false;
									});
									
									$(document).ready(function()
									{
										var noCliente = $("#txtnoCliente").val();										
										$.ajax({
											type: "POST",
											url: "../../repositorio/loadFumigacion/cargar-datos.php",
											data: {noCliente:noCliente,txtSucu:$('.txtSucu').val(),TypeAutocomplite:TypeAutocomplite},
											success: function(result) {		
												if(result=='vacio'){ $('#txtnomClient').val('');
												}else{
													var ExplodeCliente = result.split("#");
													$("#txtnomClient").val(ExplodeCliente[0]);
													$("#txtdirection").val(ExplodeCliente[1]);
													$("#txtareaFumi").val(ExplodeCliente[2]);
													var str=ExplodeCliente[2];
													var cadena= str.substr(1,3);												
													var hoy = new Date();
													var dd = hoy.getDate();
													var mm = hoy.getMonth()+1; //hoy es 0!
													var yyyy = hoy.getFullYear().toString().substr(-2);
													if(dd<10) { dd='0'+dd } 
													if(mm<10) { mm='0'+mm } 
													// cadena = cadena+''+mm+''+dd+''+yyyy+''+pad(noCliente);
													cadena = cadena+''+yyyy+''+mm+''+dd+''+pad(noCliente);
													$("#txtnoFolio").val(cadena);																								
													document.getElementById("btnGuardar_Certificado").style.display='';	}
											}
										});
									});	
										
									$( '#btnGuardar_Certificado' ).click( function (event)
									{											
										event.preventDefault();	
										
										var formCreatedCertificate = 'formCreatedCertificate';
										var noFolio = $( '.txtnoFolio' ).val(),
										nomClient = $( '.txtnomClient' ).val(),
										direction = $( '.txtdirection' ).val(),
										sucursal = $( '.txtSucu' ).val(),
										fecha_service = $( '.txtfecha' ).val(),
										noCliente = $( '.txtnoCliente' ).val(),
										horInicio = $( '.txthorInicio' ).val(),
										horFinal = $( '.txthorFinal' ).val(),
										areaFumi = $( '.txtareaFumi' ).val(),
										tipoFumi = $( '.txttipoServicio' ).val(),
										areaFumiCompleto = $( '.txtareaFumi' ).val()+' / '+$('.txttipoServicio').val(),
										plagas = $( '.txtplagas' ).val(),
										method1 = $( '.txtmethod1' ).val(),
										nomComercial = $( '.txtnomComercial' ).val(),
										nomQuimico = $( '.txtnomQuimico' ).val(),
										method2 = $( '.txtmethod2' ).val(),
										composition = $( '.txtcomposition' ).val(),
										dosis = $( '.txtdosis' ).val(),
										cofepris = $( '.txtcofepris' ).val(),
										periodiService = $( '.txtperiodiService' ).val(),
										nextService = $( '.txtnextService' ).val(),
										Obser = $( '.txtObser' ).val().toUpperCase(),
										responsable = $( '.txtresponsable' ).val(),
										tecnico = $( '.txttecnico' ).val(),
										administracion = $( '.txtadministracion' ).val();

										if ($(".txtnoCliente").val() == "" )
										{
											setTimeout(function() {
												toastr.options = {
													closeButton: true,
													progressBar: true,
													positionClass: 'toast-bottom-right',
													showMethod: 'slideDown',
													timeOut: 4000
												};
												toastr.warning('','Ingresar N° Cliente');
											},1200);
											$('.control-label-noCliente').addClass('has-error');
										}
										if ($(".txtnoFolio").val() == "" )
										{
											setTimeout(function() {
												toastr.options = {
													closeButton: true,
													progressBar: true,
													positionClass: 'toast-bottom-right',
													showMethod: 'slideDown',
													timeOut: 4000
												};
												toastr.warning('','Fallo al Generar N° Folio');
											},1200);
											$('.control-label-noFolio').addClass('has-error');
										}		
											
											// Guarda Datos capturados del formulario en la Tabla *Fumigacion*
											// Automaticamente genera el prceso de Validación y se almacena en la Tabla *Valid_modulo*											
											$.post( 'newFumigacion.php' , { formCreatedCertificate : formCreatedCertificate,noFolio:noFolio,fecha_service:fecha_service,noCliente:noCliente,horInicio:horInicio,horFinal:horFinal,areaFumi:areaFumi,
																			sucursal:sucursal,plagas:plagas,method1:method1,nomComercial:nomComercial,nomQuimico:nomQuimico,method2:method2,composition:composition,dosis:dosis,cofepris:cofepris,nextService:nextService,periodiService:periodiService,Obser:Obser,tipoFumi:tipoFumi,responsable:responsable,tecnico:tecnico,administracion:administracion,nomClient:nomClient,valid:VALID},
											function ( exito ){	
												setTimeout(function() {
													toastr.options = {
														closeButton: true,
														progressBar: true,
														positionClass: 'toast-top-right',
														showMethod: 'slideDown',
														timeOut: 5000
													};
													toastr.success('','DATOS GUARDADOS CORRECTAMENTE');
												},1200);
												var varResult = exito.split("#");	
												$('.result-Ajax').html(exito).fadeIn(2000);														
											});	
											
											// Genera Pdf deacuerdo a los datos capturados del formulario
											var hrefUrlCertifiFpdf = '../../repositorio/fpdf/CertificateFumi.php?';												
											var hrefParamCertifiFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&noCliente="+noCliente+"&horInicio="+horInicio+"&horFinal="+horFinal+"&sucursal="+sucursal+"&areaFumi="+areaFumi+"&tipoFumi="+tipoFumi+"&plagas="+plagas+"&nomClient="+nomClient+"&direction="+direction+"&method1="+method1+"&nomComercial="+nomComercial+"&nomQuimico="+nomQuimico+"&method2="+method2+"&composition="+composition+"&dosis="+dosis+"&cofepris="+cofepris+"&nextService="+nextService+"&Obser="+Obser+"&responsable="+responsable+"&tecnico="+tecnico;
											$("#GeneratePdf").load(hrefUrlCertifiFpdf,hrefParamCertifiFpdf); 
											
											// Si la Variable VALID es igual a 'false', aparece modal para la firma electronica
											if(VALID=='false'){
												$(".BuutonValidProcess").removeClass('hidden');
												$("#DropdowsAction").removeClass('hidden');
												$('#CanvasFirma').modal({backdrop:'static',keyboard:false, show:true});	
												//Evento Cuando dan click al boton de Guardar Firma llamado download
												$('#download').click(function(event){ 
													var correoEnvio = $('.txtcorreoEnvio').val();
													var dirTypeFumi = "Certificados";
													var RequestFirma = downloadCanvas(this, 'canvas', '<?php echo utf8_encode(@$_SESSION['sesionNomUser']);?>-'+noFolio+'-'+noCliente, correoEnvio, dirTypeFumi, sucursal, '<?php echo @$_SESSION['sesionPrivi'];?>');														
													if(RequestFirma==true){
														$('#CanvasFirma').modal('hide');														
														$.confirm({
															title: 'Exito!',
															content: '  &nbsp; Datos guardados correctamente',
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
																primary: {
																	text: 'Ver PDF',
																	btnClass: 'btn-green btn-sm',
																	action: function(){				
																		document.getElementById("btnGuardar_Certificado").style.display='none';																																			
																		window.open("<?php echo $sufijo;?>web/UploadPdf/PdfFumigacion/"+dirTypeFumi+"/"+sucursal+"/"+noFolio+"-"+noCliente+".pdf", 'height=600,width=800,scrollbars=1,location:no,menubar:no,resizable=1,status:no,toolbar:no');
																		location.reload();
																	}
																},
																tryAgain: {
																	text: 'Nuevo',
																	btnClass: 'btn-green',
																	action: function(){																																																					
																		document.getElementById("btnGuardar_Certificado").style.display='none';
																		location.reload();																		
																	}
																}
															}
														});
													}
													//Se limpian las variables una vez que se ha firmado
													VALID = "true";
													$('.txtcorreoEnvio').val('');
												});														
											}
										return false;
									});									
								</script>
								<!--Guardar imagen en .PNG-->
								<script>
								function downloadCanvas(link, canvasId, filename, correoEnvio, dirTypeFumi, sucursal, TypeUser) {
									dataHref = document.getElementById(canvasId).toDataURL();
									// alert(Trazados);
									if(Trazados!=''){										
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
										Trazados=[];
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