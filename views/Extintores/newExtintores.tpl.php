<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">

			<?php// navbar($activeDesk='',$activeAdmin='',$activeFumi='',$activeExtin='active',$activeCourse='',$activeInscrip='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeExtin',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
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
												<li><a href="#" class="btn btn-xs" role="button" id="NewOrdenT">Nueva Orden</a></li>	
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
									<div class="row">
										<div class="col-lg-10 col-sm-offset-1" style="text-align:center;vertical-align:middle">												
											<form class="form-horizontal" name="frm_Extintores" id="frm_Extintores">
												<div class="bs-example tabs-container with-nav-tabs panel-success">
													
													<div class="form-group form-group-sm">
														<label class="control-label col-xs-2">N° DE FOLIO:</label>
														<div class="col-xs-3 control-label-noFolio">
															<input type="text" id="txtnoFolio" name="txtnoFolio" class="form-control txtnoFolio" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" disabled>
														</div>
																											
														<label class="control-label col-xs-1">FECHA:</label>
														<div class="col-xs-2">
															<input type="text" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" class="form-control txtfecha" disabled>
														</div>
																										
														<label class="control-label col-xs-2">N° CLIENTE:</label>
														<div class="col-xs-2 control-label-noCliente">
															<input type="text" id="txtnoCliente" name="txtnoCliente" class="form-control txtnoCliente" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" autofocus>
														</div>
														<div class="col-xs-3">
															<input type="text" id="txtSucu" name="txtSucu" value="<?=@$_SESSION['sesionSucur']?>" class="form-control txtSucu hidden" disabled>
														</div>
													</div>
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
														<label class="control-label col-xs-3 font-normal">FECHA DE RECOLECCIÓN:</label>
														<div class="col-xs-3" id="dateRecolect">
															<div class="input-group date">
																<input type="text" name="txtfechaRecolect" class="form-control txtfechaRecolect" id="txtfechaRecolect" value="<?php echo date("Y-m-d"); ?>">
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															</div>
														</div>
														<label class="control-label col-xs-3 font-normal">FECHA DE ENTREGA:</label>
														<div class="col-xs-3" id="dateEntrega">
															<div class="input-group date">
																<input type="text" name="txtfechaEntrega" class="form-control txtfechaEntrega" id="txtfechaEntrega" value="<?php echo date("Y-m-d"); ?>">
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															</div>
														</div>																											
													</div>
													<br>
													<h4 style="color:#11987d">Mantenimiento o Recarga de Extintores</h4>													
													<br>
													<div class="panele">
														<div class="panele-body">
															<table id="jqGrid" class="table"></table>
															<div id="jqGridPager"></div>
														</div>
													</div>
													<br>
													<div class="form-group form-group-sm">	
														<div class="col-xs-3 table-responsive">															
															<table class="table table-condensed">																
																<caption class="text-center" style="color:#11987d"><strong>Mangeras contra incendio</strong></caption>																
																<tr>
																	<td><input type="text" name="txtCantidad" class="form-control txtCantidad" id="txtCantidad" style="height: 20px;"></td>
																	<td class="pull-left">Cantidad</td>       
																</tr>																
																<tr>
																	<td><input type="text" name="txtServicio" class="form-control txtServicio" id="txtServicio" style="height: 20px;"></td>
																	<td class="pull-left">Servicio</td>     
																</tr>        																
																<tr>
																	<td><input type="text" name="txtPruebaH" class="form-control txtPruebaH" id="txtPruebaH" style="height: 20px;"></td>
																	<td class="pull-left">Prueba&nbsp;H.</td>     
																</tr>																
															</table>
															<table class="table table-condensed">																
																<caption class="text-center" style="color:#11987d"><strong>Tipo de Servicio</strong></caption>																
																<tr>
																	<td><select id="txttypeService" name="txttypeService" class="form-control txttypeService input-sm" style="width:100%;">
																			<option value="Mantenimiento">Mantenimiento</option>																																																									
																			<option value="Recarga">Recarga</option>																																																									
																		</select>
																	</td>
																	      
																</tr>																																 																
															</table>
														</div>
													
														<div class="col-xs-3 table-responsive">															
															<table id="refacciones" class="table table-condensed">																
																<caption class="text-center" style="color:#11987d"><strong>Refacciones</strong></caption>
																<tr><th>Especificación</th><th>Piezas</th></tr>
																<tr>
																	<td><input type="text" name="txtEspecificacion1" class="form-control txtEspecificacion1" id="txtEspecificacion1" style="height: 20px;"></td>
																	<td><input type="text" name="txtPiezas1" class="form-control txtPiezas1" id="txtPiezas1" style="height: 20px;"></td>       
																</tr>																
																<tr>
																	<td><input type="text" name="txtEspecificacion2" class="form-control txtEspecificacion2" id="txtEspecificacion2" style="height: 20px;"></td>
																	<td><input type="text" name="txtPiezas2" class="form-control txtPiezas2" id="txtPiezas2" style="height: 20px;"></td>     
																</tr>        																
																<tr>
																	<td><input type="text" name="txtEspecificacion3" class="form-control txtEspecificacion3" id="txtEspecificacion3" style="height: 20px;"></td>
																	<td><input type="text" name="txtPiezas3" class="form-control txtPiezas3" id="txtPiezas3" style="height: 20px;"></td>     
																</tr>
																<tr>
																	<td><input type="text" name="txtEspecificacion4" class="form-control txtEspecificacion4" id="txtEspecificacion4" style="height: 20px;"></td>
																	<td><input type="text" name="txtPiezas4" class="form-control txtPiezas4" id="txtPiezas4" style="height: 20px;"></td>     
																</tr>
																<tr>
																	<td><input type="text" name="txtEspecificacion5" class="form-control txtEspecificacion5" id="txtEspecificacion5" style="height: 20px;"></td>
																	<td><input type="text" name="txtPiezas5" class="form-control txtPiezas5" id="txtPiezas5" style="height: 20px;"></td>     
																</tr>
															</table>
														</div>
														<div class="col-xs-6">	
															<div class="col-xs-6 table-responsive">															
																<table class="table table-condensed">																
																	<caption class="text-center" style="color:#11987d"><strong>Ext. Emergentes</strong></caption>																
																	<tr>
																		<td><input type="text" name="txtExtPrestado" class="form-control txtExtPrestado" id="txtExtPrestado" style="height: 20px;"></td>
																		<td class="pull-left">Prestados</td>       
																	</tr>																
																	<tr>
																		<td><input type="text" name="txtExtRecolect" class="form-control txtExtRecolect" id="txtExtRecolect" style="height: 20px;"></td>
																		<td class="pull-left">Recolectados</td>     
																	</tr>        																
																	<tr>
																		<td><input type="text" name="txtExtFaltantes" class="form-control txtExtFaltantes" id="txtExtFaltantes" style="height: 20px;"></td>
																		<td class="pull-left">Faltantes</td>     
																	</tr>																
																</table>
															</div>
															
															<div class="col-xs-6 table-responsive">															
																<table class="table table-condensed">																
																	<caption class="text-center" style="color:#11987d"><strong>Aire Autónomo</strong></caption>																
																	<tr>
																		<td><input type="text" name="txtCantidadAire" class="form-control txtCantidadAire" id="txtCantidadAire" style="height: 20px;"></td>
																		<td class="pull-left">Cantidad</td>       
																	</tr>																
																	<tr>
																		<td><input type="text" name="txtServicioAire" class="form-control txtServicioAire" id="txtServicioAire" style="height: 20px;"></td>
																		<td class="pull-left">Servicio</td>     
																	</tr>        																
																	<tr>
																		<td><input type="text" name="txtPruebaHAire" class="form-control txtPruebaHAire" id="txtPruebaHAire" style="height: 20px;"></td>
																		<td class="pull-left">Prueba&nbsp;H.</td>     
																	</tr>																
																</table>
															</div>
															<div class="col-xs-12"> Recibí de <a href="#" id="RecibiDe" data-type="text" data-pk="1" data-title="Escribir Nombre" style="color: #159078;text-transform: uppercase;">_______________________</a> Extintores emergentes de P.Q.S Y CO2, en calidad de prestamo por el tiempo que duren mis equipos en su
															talles de servicio, así mismo me comprometo a entregarlos en el momento de la recepción de mis equipos, el no devolverlos implica el compromiso
															de pagarles a razon de $: <a href="#" id="PrecioNum" data-type="text" data-pk="2" data-title="Cantidad en Numeros" style="color: #159078;">__________</a> ( <a href="#" id="PrecioLetras" data-type="text" data-pk="3" data-title="Cantidad en Letras" style="color: #159078;text-transform: capitalize;">__________</a>  Pesos 00/100 M.N) más IVA, cada uno.
															</div>
														</div>														
													</div>
													<br>																								
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
												</div>
											</form>	<br>									
											<button type="button" class="ladda-button btn btn-primary btn-block pull-right" data-style="expand-right" id="btnGuardar_OT" style="display:none"> <span class="fa fa-send"></span> &nbsp; Guardar</button>																																			
											<div class="result-Ajax hidden"></div>											
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
															<label for="example-email-input" class="control-label col-xs-2">Correo:</label>
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
									$("#NewOrdenT").click(function(event) {										
										event.preventDefault();										
										var GetNoFolio = $( '.txtnoFolio' ).val(),
										GetnoCliente = $( '.txtnoCliente' ).val();
										var folioDeleteTable = 'folioDeleteTable';								
										
											// Envia noFolio y elimina los campos en las tablas reportes_fumi y valid_modulo										
											$.post( 'newExtintores.php' , { folioDeleteTable : folioDeleteTable,GetNoFolio:GetNoFolio,GetnoCliente:GetnoCliente },
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
											$.post( 'newExtintores.php' , { formAddEmailEnvio : formAddEmailEnvio,AddEmailEnvio:AddEmailEnvio,GetNoFolio:GetNoFolio,GetnoCliente:GetnoCliente },
											function ( exito ){													
												$('.text-info-addEmailEnvio').append(exito).fadeIn(2000);																								
											});																																
										
										return false;
									});
								</script>
								<script type="text/javascript">
									$(document).ready(function () {
										var sizeWidthJqGrid = $('.tabs-container').width();
										$("#jqGrid").jqGrid({											
											url: '../../repositorio/DataJson/DataExtintores/listarJsonBlank.php?nomJson=dataReport&carpetJson=OrdenDeTrabajo',
											editurl: 'newExtintores.php',
											datatype: "json",
											colModel: [
												{
													label: 'CANTIDAD',
													name: 'Cantidad',													
													width: 52,
													sortable: false,
													required: true,
													editable: true 
												},
												{
													label : 'CAPACIDAD',
													name: 'Capacidad',
													width: 52,
													sortable: false,
													required: true,
													editable: true 
												},
												{
													label: 'PQS | CO2 | Agua | AFFF ',
													name: 'AgenteExt',
													width: 90,
													editable: true,
													edittype: "select",
													sortable: false,
													editoptions: {
														 value: ":;PQS:PQS;CO2:CO2;Agua:Agua;AFFF:AFFF"
													}
												},
												{
													label: 'OTROS',
													name: 'AgenteExtOtros',
													width: 70,
													sortable: false,
													required: true,
													editable: true 
												},
												{
													label: 'OBSERVACIONES',
													name: 'Obser',
													width: 100,
													sortable: false,
													required: true,
													editable: true 
												}
											],
											// sortname: 'Id',
											// sortorder : 'asc',
											loadonce: true,
											viewrecords: true,
											onSelectRow: editRow,
											height: 205,
											width: sizeWidthJqGrid,
											shrinkToFit: true,
											rowNum: 200,
											rownumbers: false, // show row numbers
											pager: "#jqGridPager",
											caption: "Mantenimiento o Recarga de Extintores",
											loadingText: 'Cargando...',
											noRecordText: 'No se encontraron registros'
										});
										//Agregar el Boton Exportar a Excel//
										paginador = $('#jqGrid').getGridParam('pager');
										jQuery('#jqGrid').navGrid(paginador, {
											edit: false,
											add: false,
											del: false,
											search: false,
											refresh: false
										}).navButtonAdd(paginador, {
											caption: "  Exportar Excel &nbsp; &nbsp; &nbsp; &nbsp;",
											buttonicon: "fa fa-file-excel-o",
											onClickButton: function() {
												$('#jqGrid').jqGrid('exportarExcelCliente',{nombre:"HOJATEST",formato:"excel"});
												//console.log($("#tb_ejemplo").jqGrid('exportarTextoCliente'));
											},
											position: "last"
										});
										
										jQuery('#jqGrid').navButtonAdd(paginador, {
											caption: "Guardar",
											buttonicon: "fa fa-save",
											onClickButton: function() {
												var idJqgrid = jQuery("#jqGrid").jqGrid('getGridParam','selrow');
												if (idJqgrid){ var ret = jQuery("#jqGrid").jqGrid('saveRow',idJqgrid); } else { }
											}
										});
										//*************************************//
										
										 $('#jqGrid').setGroupHeaders(
											{
												useColSpanStyle: true,
												groupHeaders: [{ "numberOfColumns": 2, "titleText": "<center>AGENTE EXTINGUIDOR</center>", "startColumnName": "AgenteExt" }]
											});
										
										var lastSelection;

										function editRow(id) {
											 if (id && id !== lastSelection) {												
												var grid = $("#jqGrid");
												grid.jqGrid('saveRow',lastSelection);
												grid.jqGrid('editRow',id, {keys: true} );
												lastSelection = id;												
												$('#'+id+'_Ubicacion').blur(function(event){											
													grid.jqGrid('saveRow',lastSelection);
												});
											 }
										}										
										// the bindKeys() 
										$("#jqGrid").jqGrid('bindKeys');																	
										$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a href="javascript:;" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:2.5%;" data-click="panel-expand"><i class="fa fa-expand"></i></a>');
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
									var VALID = "false";
									var RutaPdfOrdenT = "";									
									
									$(".ActualizarValidModal").click(function(event){
										var hrefUrlModalValid = '../../repositorio/loadExtintores/loadValidModal.php?noFolio='+$('#txtnoFolio').val();	
										$(this).addClass('fa-spin'); 
										$(".BodyTimelineValid").load(hrefUrlModalValid, function(){ setTimeout(function(){ $(".ActualizarValidModal").removeClass('fa-spin'); }, 1200); });
									});
									
									$("#txtnoCliente").keyup(function() {
										$("#txtnoCliente").prop('disabled', true);
										var noCliente = $(this).val();
										VALID = "false";	
										$(".BodyTimelineValid").html('');
										var JqGridUrlKeyUp ='../../repositorio/DataJson/DataExtintores/listarJsonBlank.php?nomJson=dataReport&carpetJson=OrdenDeTrabajo'
										$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'newExtintores.php', datatype: "json" }).trigger('reloadGrid');																	

										$.ajax({
											type: "POST",
											url: "../../repositorio/loadExtintores/cargar-datos.php",
											data: {noCliente:noCliente,txtSucu:$('.txtSucu').val(),TypeAutocomplite:'OrdenDeTrabajo',TypeReportFumi:'OT'},
											success: function(result) {		
												$("#txtnoCliente").prop('disabled', false).focus();
												$(".BuutonValidProcess").addClass('hidden');
												$(".ButonNewPoliza").addClass('hidden');
												$(".ButonNewCheckList").addClass('hidden');
												$("#DropdowsAction").addClass('hidden');
												if(result=='vacio'){
													$('#txtnomClient').val('');
													$('#txtdirection').val('');
													$('#txtnoFolio').val('');
												}else{
													var ExplodeCliente = result.split("#");													
													$("#txtnomClient").val($.trim(ExplodeCliente[0]));
													$("#txtdirection").val($.trim(ExplodeCliente[1]));
													if($.trim(ExplodeCliente[5])!=''){ $("#txtfechaRecolect").val($.trim(ExplodeCliente[5])); }
													if($.trim(ExplodeCliente[6])!=''){ $("#txtfechaEntrega").val($.trim(ExplodeCliente[6])); }	
													if($.trim(ExplodeCliente[7])!=''){ $("#txttypeService").val($.trim(ExplodeCliente[7])).change(); }
													$("#txtCantidad").val($.trim(ExplodeCliente[8]));
													$("#txtServicio").val($.trim(ExplodeCliente[9])); 
													$("#txtPruebaH").val($.trim(ExplodeCliente[10])); 
													$("#txtExtPrestado").val($.trim(ExplodeCliente[11])); 
													$("#txtExtRecolect").val($.trim(ExplodeCliente[12])); 
													$("#txtExtFaltantes").val($.trim(ExplodeCliente[13])); 
													$("#txtCantidadAire").val($.trim(ExplodeCliente[14])); 
													$("#txtServicioAire").val($.trim(ExplodeCliente[15])); 
													$("#txtPruebaHAire").val($.trim(ExplodeCliente[16])); 													
													$("#txttecnico").val($.trim(ExplodeCliente[17])).change();
													$("#txtresponsable").val($.trim(ExplodeCliente[18])).change();
													$("#txtadministracion").val($.trim(ExplodeCliente[19])).change();
													if($.trim(ExplodeCliente[21])!=''){ VALID = $.trim(ExplodeCliente[21]); }
													// alert('VALID = '+VALID);													
													if($.trim(ExplodeCliente[23])!=''){ $('#ActionVerPdf').attr("href",'<?=$sufijo?>'+$.trim(ExplodeCliente[23]));  }else{ $('#ActionVerPdf').attr("href", "#"); }	
													
													$("#passwordHelpBlock").html('<br> &nbsp; &nbsp; ¿Seguro de enviar correo a <strong><?php echo @$_SESSION['sesionUsuario'];?></strong>?');
																																							
													var str=ExplodeCliente[2];
													var cadena= str.substr(1,3);
													var strSucur=ExplodeCliente[3];
													var cadenaSucur= strSucur.substr(1,3);
													
													var hoy = new Date();
													var dd = hoy.getDate();
													var mm = hoy.getMonth()+1; //hoy es 0!
													var yyyy = hoy.getFullYear().toString().substr(-2);

													if(dd<10) { dd='0'+dd } 
													if(mm<10) { mm='0'+mm } 
													// cadena = cadena+''+mm+''+dd+''+yyyy+''+pad(noCliente);
													cadena = 'OT'+cadenaSucur+''+cadena+''+yyyy+''+mm+''+dd+''+pad(noCliente);
													$("#txtnoFolio").val(cadena);
													if($.trim(ExplodeCliente[20])!=''){ $("#txtnoFolio").val($.trim(ExplodeCliente[20])); }	
													
													// if($.trim(ExplodeCliente[24])!='true'){ document.getElementById("btnGuardar_OT").style.display=''; }else{ document.getElementById("btnGuardar_OT").style.display='none'; }
													document.getElementById("btnGuardar_OT").style.display='';
													if($.trim(ExplodeCliente[24])!='true'){ $("#txtresponsable").removeAttr("disabled"); $('#txttecnico').removeAttr("disabled"); $('#txtadministracion').removeAttr("disabled"); }else{ $("#txtresponsable").attr('disabled','true'); $("#txttecnico").attr('disabled','true'); $("#txtadministracion").attr('disabled','true'); }
													
													if($.trim(ExplodeCliente[25])=='true'){ 
														$(".ButonNewPoliza").removeClass('hidden'); 
														$("#ButonNewPoliza").attr("idCliente", noCliente);
														if($.trim(ExplodeCliente[26])!=''){ $("#ButonNewPoliza").attr("pdfPH", $.trim(ExplodeCliente[26])); }
													}
													
													if($.trim(ExplodeCliente[27])=='true'){ 
														$(".ButonNewCheckList").removeClass('hidden'); 
														$("#ButonNewCheckList").attr("idCliente", noCliente);
														$("#ButonNewCheckList").attr("pdfCheckList", $.trim(ExplodeCliente[27])); 
													}
													
													//Split Id_Refacciones 
														var SplitIdRefac = $.trim(ExplodeCliente[28]).split(",");															
															$("#txtEspecificacion1").val(SplitIdRefac[0]);
															$("#txtEspecificacion2").val(SplitIdRefac[1]);
															$("#txtEspecificacion3").val(SplitIdRefac[2]);
															$("#txtEspecificacion4").val(SplitIdRefac[3]);
															$("#txtEspecificacion5").val(SplitIdRefac[4]);
																
													//Split Id_Refacciones 
														var SplitPiezRefac = $.trim(ExplodeCliente[29]).split(",");
															$("#txtPiezas1").val(SplitIdRefac[0]);
															$("#txtPiezas2").val(SplitIdRefac[1]);
															$("#txtPiezas3").val(SplitIdRefac[2]);
															$("#txtPiezas4").val(SplitIdRefac[3]);
															$("#txtPiezas5").val(SplitIdRefac[4]);
													
													if($.trim(ExplodeCliente[26])==''){ $("#ButonNewPoliza").attr("pdfPH", ''); }
													if($.trim(ExplodeCliente[27])==''){ $("#ButonNewCheckList").attr("pdfCheckList", ''); }
													
														if($.trim(ExplodeCliente[20])!=''){ 
															$(".BuutonValidProcess").removeClass('hidden');
															$("#DropdowsAction").removeClass('hidden');
															var hrefUrlModalValid = '../../repositorio/loadExtintores/loadValidModal.php?noFolio='+$("#txtnoFolio").val();	
															$(".BodyTimelineValid").load(hrefUrlModalValid);
														}
																												
														if($.trim(ExplodeCliente[22])!=''){ JqGridUrlKeyUp = '../../repositorio/DataJson/DataExtintores/listarJsonBlank.php?rutaJson='+$.trim(ExplodeCliente[22]); }
												}
													
												$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'newExtintores.php', datatype: "json" }).trigger('reloadGrid');
											}
										});	
																				
										return false;
									});
								</script>
								<script>
									$('#btnGuardar_OT').click( function (event) {											
										event.preventDefault();	
										
										//Guardar Tabla Jqgrid
											var idJqgridE = jQuery("#jqGrid").jqGrid('getGridParam','selrow');
												if(idJqgridE){ var retJqgrid = jQuery("#jqGrid").jqGrid('saveRow',idJqgridE); } else { }
										
										var formCreatedNewOrdenT = 'formCreatedNewOrdenT';
										var noFolio = $( '.txtnoFolio' ).val(),
										nomClient = $( '.txtnomClient' ).val(),
										direction = $( '.txtdirection' ).val(),
										sucursal = $( '.txtSucu' ).val(),
										fecha_service = $( '.txtfecha' ).val(),
										noCliente = $( '.txtnoCliente' ).val(),
										fechaRecolect = $( '.txtfechaRecolect' ).val(),
										fechaEntrega = $( '.txtfechaEntrega' ).val(),
										cantidad = $( '.txtCantidad' ).val(),
										servicio = $( '.txtServicio' ).val(),
										pruebaH = $( '.txtPruebaH' ).val(),
										typeService = $( '.txttypeService' ).val(),
										extPrestado = $( '.txtExtPrestado' ).val(),
										extRecolect = $( '.txtExtRecolect' ).val(),
										extFaltantes = $( '.txtExtFaltantes' ).val(),
										cantidadAire = $( '.txtCantidadAire' ).val(),
										servicioAire = $( '.txtServicioAire' ).val(),
										pruebaHAire = $( '.txtPruebaHAire' ).val(),
										responsable = $( '.txtresponsable' ).val(),
										tecnico = $( '.txttecnico' ).val(),
										areaOperativa = '<?php echo @$_SESSION['sesionNomUser'];?>',
										administracion = $('.txtadministracion').val(),																			
										recibiDe = $('#RecibiDe').text(),																				
										precioNum = $('#PrecioNum').text(),																				
										precioLetras = $('#PrecioLetras').text(),
										TypeUserValid='<?php echo @$_SESSION['sesionPrivi'];?>',
										IdUserValid='<?php echo @$_COOKIE['id'];?>';
										
										if ($(".txtnoCliente").val() == "" ){
											setTimeout(function() {
												toastr.options = {
													closeButton: true,
													progressBar: true,
													positionClass: 'toast-bottom-right',
													showMethod: 'slideDown',
													timeOut: 4000
												};
												toastr.error('','Ingresar N° Cliente');
											},1200);
											$('.control-label-noCliente').addClass('has-error');
										}
										if ($(".txtnoFolio").val() == "" ){
											setTimeout(function() {
												toastr.options = {
													closeButton: true,
													progressBar: true,
													positionClass: 'toast-bottom-right',
													showMethod: 'slideDown',
													timeOut: 4000
												};
												toastr.error('','Fallo al Generar N° Folio');
											},1200);
											$('.control-label-noFolio').addClass('has-error');
										}																				
										if ($.trim(nomClient) == "" ){
											setTimeout(function() {
												toastr.options = {
													closeButton: true,
													progressBar: true,
													positionClass: 'toast-bottom-right',
													showMethod: 'slideDown',
													timeOut: 4000
												};
												toastr.error('','No existe el Usuario '+noCliente+'');
											},1200);
											$('.control-label-noCliente').addClass('has-error');
										}											
										/* Recorrer tabla de Agentes Extintores */
										var banderaNextStep = false,
											CamposGrid = [];
										var id_object = 0
										$("#jqGrid tbody tr").each(function (index){											
											var cantidadAE, capacidadAE, agenteExtAE, agenteExtOtroAE, obser_object;
											$(this).children("td").each(function (index2){
												switch (index2){
													case 0: cantidadAE = $.trim($(this).text()); break;
													case 1: capacidadAE = $.trim($(this).text()); break;
													case 2: agenteExtAE = $.trim($(this).text()); break;
													case 3: agenteExtOtroAE = $.trim($(this).text()); break;
													case 4: obser_object = $.trim($(this).text()); break;													
												}
												// $(this).css("background-color", "#ECF8E0");																								
											});											
											// if(cantidadAE!='' || capacidadAE!=''){
											if(id_object!=0){												
												$.post( 'newExtintores.php' , { formCreatedNewOrdenT:formCreatedNewOrdenT,noFolio:noFolio,typeRegistro:'AgenteExt',fecha_service:fecha_service,noCliente:noCliente,fechaRecolect:fechaRecolect,fechaEntrega:fechaEntrega,
																	id_object:id_object,cantidadAE:cantidadAE,capacidadAE:capacidadAE,agenteExtAE:agenteExtAE,agenteExtOtroAE:agenteExtOtroAE,obser_object:obser_object,areaOperativa:areaOperativa,responsable:responsable,tecnico:tecnico,administracion:administracion,nomClient:nomClient} );														
												banderaNextStep = true;
												CamposGrid.push(id_object,cantidadAE,capacidadAE,agenteExtAE,agenteExtOtroAE,obser_object);
											} id_object++;
											// }
										});	

										/* Recorrer Tabla Refacciones */
											var JqgridRefaciones = false;
											var idObjectTR = 0;
											$("#refacciones tr").each(function (index){											
												var refac, piee;
												$(this).children("td").each(function (index2){
													 refac = $('#txtEspecificacion'+idObjectTR).val();
													 piee = $('#txtPiezas'+idObjectTR).val();																																																																									
												});	
												if(idObjectTR>0){ $.post( 'newExtintores.php' , { formCreatedNewOrdenT:formCreatedNewOrdenT,noFolio:noFolio,typeRegistro:'RefacExt',fecha_service:fecha_service,noCliente:noCliente,fechaRecolect:fechaRecolect,fechaEntrega:fechaEntrega,
																	id_object:'R'+idObjectTR,refac:refac,piezas:piee,responsable:responsable,tecnico:tecnico,administracion:administracion,nomClient:nomClient} ); }																								
												JqgridRefaciones = true;
												idObjectTR++;
											});
										/* Fin de recorrer Tabla Refacciones */
										
										$.post( 'newExtintores.php' , { formCreatedNewOrdenT:formCreatedNewOrdenT,noFolio:noFolio,typeRegistro:'General',fecha_service:fecha_service,noCliente:noCliente,fechaRecolect:fechaRecolect,fechaEntrega:fechaEntrega,cantidadAire:cantidadAire,servicioAire:servicioAire,
														cantidad:cantidad,servicio:servicio,pruebaH:pruebaH,typeService:typeService,extPrestado:extPrestado,extRecolect:extRecolect,extFaltantes:extFaltantes,pruebaHAire:pruebaHAire,responsable:responsable,tecnico:tecnico,administracion:administracion,nomClient:nomClient,valid:VALID,recibiDe:recibiDe,precioNum:precioNum,precioLetras:precioLetras},
										function ( exito ){													
											var varResult = exito.split("#");	
											$('.result-Ajax').html(exito).fadeIn(2000);
											// alert(exito);
											if(banderaNextStep==false){
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
											}												
										});
										
										$.post( 'newExtintores.php' , { GererateJsonOT : 'GererateJsonOT', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal } );											
										
										// Genera Pdf deacuerdo a los datos capturados del formulario
										var hrefUrlOrdenTFpdf = '../../repositorio/fpdf/pdfExtintores/newExtintoresFpdf.php?';										
										// var hrefParamOrdenTFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&noCliente="+noCliente+"&sucursal="+sucursal+"&nomClient="+nomClient+"&direction="+direction+"&areaOperativa="+areaOperativa+"&responsable="+responsable+"&tecnico="+tecnico+"&recibiDe="+recibiDe+"&precioNum="+precioNum+"&precioLetras="+precioLetras;
										var hrefParamOrdenTFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&fechaRecolect="+fechaRecolect+"&fechaEntrega="+fechaEntrega+"&noCliente="+noCliente+"&sucursal="+sucursal+"&nomClient="+nomClient+"&direction="+direction+"&cantidad="+cantidad+"&servicio="+servicio+"&pruebaH="+pruebaH+"&typeService="+typeService+"&extPrestado="+extPrestado+"&extRecolect="+extRecolect+"&extFaltantes="+extFaltantes+"&cantidadAire="+cantidadAire+"&servicioAire="+servicioAire+"&pruebaHAire="+pruebaHAire+"&areaOperativa="+areaOperativa+"&responsable="+responsable+"&tecnico="+tecnico+"&recibiDe="+recibiDe+"&precioNum="+precioNum+"&precioLetras="+precioLetras+"&valid="+VALID;
										$("#GeneratePdf").load(hrefUrlOrdenTFpdf,hrefParamOrdenTFpdf); 
										
										//variables para agregar la firma en el pdf
										var hrefRutaFpdf="../../../web/UploadPdf/PdfExtintores/OrdenDeTrabajo/"+sucursal+"/"+noFolio+"-"+noCliente+".pdf";
										var hrefRutaFirma="../../../web/images/FileUpload/FirmasOrdenT/OrdenDeTrabajo/"+sucursal+"/"+areaOperativa+"-"+noFolio+"-"+noCliente+".png";
										// Si la Variable VALID es igual a 'false', aparece modal para la firma electronica
											if(VALID=='false'){
												$(".BuutonValidProcess").removeClass('hidden');
												$("#DropdowsAction").removeClass('hidden');
												$('#CanvasFirma').modal({backdrop:'static',keyboard:false, show:true});	
												//Evento Cuando dan click al boton de Guardar Firma llamado download
												$('#download').click(function(event){ 
													var correoEnvio = $('.txtcorreoEnvio').val();
													var dirTypeExtin = "OrdenDeTrabajo";
													var RequestFirma = downloadCanvas(this, 'canvas', areaOperativa+'-'+noFolio+'-'+noCliente, correoEnvio, dirTypeExtin, sucursal, '<?php echo @$_SESSION['sesionPrivi'];?>');														
													if(RequestFirma==true){
														$("#GeneratePdf").removeClass('hidden');
														$(".modalDialogFirma").addClass('hidden');
														$("#GeneratePdf").html("<img src='../../web/images/loading_BIG.gif' style='color:white;padding-top:20%;padding-left:32%'/>");
														setTimeout(function(){ 	
															if(TypeUserValid =='ADMINISTRADOR'){ //este de ADMINISTRADOR debe cambiar porque es OPERATIVA
																var hrefUrlAddFirma = '../../repositorio/fpdf/pdfExtintores/addFirma.php?';												
																var hrefParamAddFirmaFpdf = "hrefRutaFpdf="+hrefRutaFpdf+"&hrefRutaFirma="+hrefRutaFirma+"&TypeUser="+TypeUserValid+"&NoFolio="+noFolio+"&sendSucursal="+sucursal+"&IdClientValid="+IdUserValid;
																$("#GeneratePdf").load(hrefUrlAddFirma,hrefParamAddFirmaFpdf);
															}
															$('#CanvasFirma').modal('hide');	
															$("#GeneratePdf").addClass('hidden');
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
																			document.getElementById("btnGuardar_OT").style.display='none';																																			
																			window.open("<?php echo $sufijo;?>web/UploadPdf/PdfExtintores/"+dirTypeExtin+"/"+sucursal+"/"+noFolio+"-"+noCliente+".pdf", 'height=600,width=800,scrollbars=1,location:no,menubar:no,resizable=1,status:no,toolbar:no');
																			location.reload();
																		}
																	},
																	tryAgain: {
																		text: 'Nuevo',
																		btnClass: 'btn-green',
																		action: function(){																																																					
																			document.getElementById("btnGuardar_OT").style.display='none';
																			location.reload();																		
																		}
																	}
																}
															});
														}, 7000);
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
									function downloadCanvas(link, canvasId, filename, correoEnvio, dirTypeExtin, sucursal, TypeUser) {
										dataHref = document.getElementById(canvasId).toDataURL();
										// alert(Trazados);
										if(Trazados!=''){										
											// alert('conFirma');
											var params = 'dataHref='+dataHref+'&TypeUser='+TypeUser+'&sucursal='+sucursal+'&dirTypeFumi='+dirTypeExtin+'&dataFilename='+filename+'&correoEnvio='+correoEnvio;
											var xhr = new XMLHttpRequest();
											xhr.onreadystatechange = function() {
											  // request complete
											  if (xhr.readyState == 4) {
												// window.open('http://localhost/ArchysoftMVC/Ecosheys/web/images/FileUpload/canvasFirma/'+xhr.responseText,'_blank');
											  }
											}
											xhr.open('POST','../../repositorio/loadExtintores/canvasFirma.php',true);
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
								<script type="text/javascript">
									$("#ButonNewPoliza").click(function(event) {										
										event.preventDefault();
										
										var SetIdClient = $("#ButonNewPoliza").attr("idCliente");
										var SetPdfPH = $("#ButonNewPoliza").attr("pdfPH");										
										
										// window.open('newPolizaG.php?SetIdClient'+SetIdClient+'&SetPdfPH='+SetPdfPH, '_blank', "toolbar=yes,scrollbars=yes,resizable=yes,top=10,left=10,width=900,height=900");
										window.open('newPolizaG.php?SetIdClient='+SetIdClient+'&SetPdfPH='+SetPdfPH, '_blank');
											
										return false;
									});
									$("#ButonNewCheckList").click(function(event) {										
										event.preventDefault();

										var SetIdClientChecList = $("#ButonNewCheckList").attr("idCliente");
										var SetPdfPHChecList = $("#ButonNewCheckList").attr("pdfCheckList");										
										
										window.open('checkList.php?SetIdClient='+SetIdClientChecList+'&SetPdfPHChecList='+SetPdfPHChecList, '_blank');
											
										return false;
									});
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