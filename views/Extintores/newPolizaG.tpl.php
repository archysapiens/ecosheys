<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">

			<?php// navbar($activeDesk='',$activeAdmin='',$activeFumi='',$activeExtin='active',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeExtin',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12">
							<div class="ibox float-e-margins" id="RegistroDePoliza">
								<div class="ibox-title">
									<!--h5  style="color:black">Reporte de Consumo de Cebo Rodenticida</h5-->
									<div class="ibox-tools">
										<div class="btn-group hidden" style="margin-right:7%;" id="DropdowsAction">
											<button data-toggle="dropdown" class="btn btn-primary btn-xs in-line dropdown-toggle" >Action <span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a href="#" class="btn btn-xs BuutonValidProcess hidden" role="button" data-toggle="modal" data-target="#modalProceesValid">Proceso Validación</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" data-toggle="modal" data-target="#modalAddEmailEnvio">Agregar Correo</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" id="ActionVerPdf" target="_blank">Ver Poliza PDF</a></li>												
												<li><a href="#" class="btn btn-xs hidden" role="button" id="ActionVerPdfPH" target="_blank">Ver PruebasH PDF</a></li>												
											</ul>
										</div>
										<a class="collapse-link FormPolizaG">
											<i class="fa fa-chevron-up"></i>
										</a>										 
									</div>
								</div>								
								
								<div class="ibox-content text-center FormPolizaG">
									<div class="row">
										<div class="col-lg-10 col-sm-offset-1" style="text-align:center;vertical-align:middle">												
											<form class="form-horizontal" name="frm_PolizaG" id="frm_PolizaG">
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
															<input type="text" id="txtnoCliente" name="txtnoCliente" value="<?=@$SetIdClient;?>" class="form-control txtnoCliente" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" disabled>
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
													<table class="table table-bordered table-responsive-sm hidden">
														<thead>
															<tr>
																<th>#</th>
																<th>Tipo y Características Genéricas del Extintor y Extinguidor</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>1-.</td>
																<td>Recipiente del extintor presurizado permanentemente, conteniendo como agente extinguidor agua, agua con adictivos, espuma y agua. En sus diferentes capacidades.</td>																
															</tr>
															<tr>
																<td>2-.</td>
																<td>Recipiente del extintor presurizado permanentemente, conteniendo como agente extinguidor polvo químico seco, agentes limpios, químico húmedo. En sus diferentes capacidades.</td>
															</tr>
															<tr>
																<td>5-.</td>
																<td>Extintor que contiene bióxido de carbono como agente extinguidor, y todos los cartuchos o cápsulas de los extintores categoría 3 y 4. En sus diferentes capacidades.</td>
															</tr>
														</tbody>
													</table>													
													<h4 style="color:#11987d">Características Genéricas del Extintor</h4>													
													<br>
													<div class="panele">
														<div class="panele-body">
															<table id="jqGrid" class="table"></table>
															<div id="jqGridPager"></div>
														</div>
													</div>
													<br>
													<div class="form-group form-group-sm hidden" id="divExamVisu">
														<label  class="control-label col-xs-3">EXAMEN VISUAL:</label>
														<div class="col-xs-9">
															<input type="text" id="txtexamVisu" name="txtexamVisu" class="form-control txtexamVisu" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
														</div>
													</div>
													<div class="form-group form-group-sm hidden" id="divMedioPrue">
														<label  class="control-label col-xs-3">MEDIO DE PRUEBA:</label>
														<div class="col-xs-9">
															<input type="text" id="txtmedioPrue" name="txtmedioPrue" class="form-control txtmedioPrue" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
														</div>
													</div>
													<div class="form-group form-group-sm hidden" id="divPresOpe">
														<label  class="control-label col-xs-3">PRESION DE OPERACIÓN:</label>
														<div class="col-xs-3">															
															<input type="text" id="txtpresOpe" name="txtpresOpe" class="form-control txtpresOpe" onkeyup="javascript:this.value=this.value.toUpperCase();">								
														</div>
														<label  class="control-label col-xs-3">PRESION DE PRUEBA:</label>
														<div class="col-xs-3">															
															<input type="text" id="txtpresPrue" name="txtpresPrue" class="form-control txtpresPrue" onkeyup="javascript:this.value=this.value.toUpperCase();">
														</div>
													</div>
													<div class="form-group form-group-sm hidden" id="divDuraPrue">
														<label  class="control-label col-xs-3">DURACION DE LA PRUEBA:</label>
														<div class="col-xs-9">
															<input type="text" id="txtduraPrue" name="txtduraPrue" class="form-control txtduraPrue" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
														</div>
													</div>
													<div class="form-group form-group-sm hidden" id="divObser">																			
														<label  class="control-label col-xs-3">OBSERVACIONES:</label>
														<div class="col-xs-9">															
															<textarea class="form-control txtObser text-uppercase" id="txtObser" name="txtObser" placeholder="Observaciones" onkeydown="return validarLetras(event)"></textarea>
														</div>
													</div>																								
													<div class="form-group form-group-sm" style="text-align:left">																			
														<label  class="control-label col-xs-3">RESPONSABLE ÁREA:</label>
														<div class="col-xs-9">
															<select id="txtresponsable" name="txtresponsable" class="selectSearch form-control txtresponsable input-sm" style="width:100%;" disabled>
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
															<select id="txttecnico" name="txttecnico" class="selectSearch form-control txttecnico input-sm" style="width:100%;" disabled>
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
															<select id="txtadministracion" name="txtadministracion" class="selectSearch form-control txtadministracion input-sm disabled" style="width:100%;" disabled>
																<option value="">SELECCIONA...</option><?php
																while($row = $SelectAdministrativa->fetch_assoc()) {
																	echo "<option value=".$row['id'].">".$row['nombre']."</option>";
																}?>																																																									
															</select>
														</div>
													</div>
												</div>
											</form>	<br>									
											<button type="button" class="ladda-button btn btn-primary btn-block pull-right" data-style="expand-right" id="btnGuardar_PG" style="display:none"> <span class="fa fa-send"></span> &nbsp; Guardar</button>																																			
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
										</div><div id="GeneratePdf" class="hidden"></div><div id="GeneratePdfPH" class="hidden"></div>
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
									$("#addEmailEnvioButton").click(function(event) {										
										event.preventDefault();
										
										var AddEmailEnvio = $(".txtAddEmailEnvio").val();
										var GetNoFolio = $( '.txtnoFolio' ).val(),
										GetnoCliente = $( '.txtnoCliente' ).val();
										var formAddEmailEnvio = 'formAddEmailEnvio';

										$('.text-info-addEmailEnvio').html('');										
										
											// Agrega un nuevo correo de envio y se almacena en la Tabla *Valid_modulo*											
											$.post( 'newPolizaG.php' , { formAddEmailEnvio : formAddEmailEnvio,AddEmailEnvio:AddEmailEnvio,GetNoFolio:GetNoFolio,GetnoCliente:GetnoCliente },
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
											url: '../../repositorio/DataJson/DataExtintores/listarJsonBlank.php?nomJson=dataReport&carpetJson=PolizaGarantia',
											editurl: 'newPolizaG.php',
											datatype: "json",
											colModel: [
												{
													label: 'CANTIDAD (PZA)',
													name: 'Cantidad',													
													width: 52,
													sortable: false,
													required: true,
													editable: true 
												},
												{
													label : 'CAPACIDAD KG',
													name: 'Capacidad',
													width: 52,
													sortable: false,
													required: true,
													editable: true 
												},
												{
													label: 'PQS | CO2 | AGUA | AFFF ',
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
													label: 'RECARGA | NUEVO | MANTEN ',
													name: 'TypeService',
													width: 90,
													editable: true,
													edittype: "select",
													sortable: false,
													editoptions: {
														 value: ":;Mantenimiento:Mantenimiento;Recarga:Recarga;Nuevo:Nuevo"
													} 
												},
												{
													label: 'TypePdf',
													name: 'TypePdf',
													width: 40,
													hidden:<?php if($SetPdfPH=='false'){ echo "true"; }else{ echo "false"; } ?>,
													editable: true,
													edittype: "select",
													sortable: false,
													editoptions: {
														 value: "PG:PG;PH:PH"
													} 
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
											caption: "Características Genéricas del Extintor",
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
											caption: "  Exportar Excel  &nbsp; &nbsp; &nbsp; &nbsp;",
											buttonicon: "fa fa-file-excel-o",
											onClickButton: function() {
												$('#jqGrid').jqGrid('exportarExcelCliente',{nombre:"PolizaGarantia",formato:"excel"});
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
												groupHeaders: [
													{ "numberOfColumns": 2, "titleText": "<center>AGENTE EXTINGUIDOR</center>", "startColumnName": "AgenteExt" },
													{ "numberOfColumns": 1, "titleText": "<center>TIPO DE SERVICIO</center>", "startColumnName": "TypeService" }]
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
									
									$(document).ready(function() {

										var noCliente = '<?php echo $SetIdClient; ?>';
										VALID = "false";	
										$(".BodyTimelineValid").html('');
										var JqGridUrlKeyUp ='../../repositorio/DataJson/DataExtintores/listarJsonBlank.php?nomJson=dataReport&carpetJson=PolizaGarantia'
										$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'newPolizaG.php', datatype: "json" }).trigger('reloadGrid');																	
										
										if('<?php echo $SetPdfPH; ?>'=='true'){ 
											$("#divExamVisu").removeClass('hidden');
											$("#divMedioPrue").removeClass('hidden');
											$("#divPresOpe").removeClass('hidden');
											$("#divDuraPrue").removeClass('hidden');
											$("#divObser").removeClass('hidden');										
										}
										
										$.ajax({
											type: "POST",
											url: "../../repositorio/loadExtintores/cargar-datos.php",
											data: {noCliente:noCliente,txtSucu:$('.txtSucu').val(),TypeAutocomplite:'PolizaGarantia',TypeReportFumi:'PG'},
											success: function(result) {		
												
												$(".BuutonValidProcess").addClass('hidden');
												$("#ActionVerPdfPH").addClass('hidden');
												$("#DropdowsAction").addClass('hidden');
												if(result=='vacio'){
													$('#txtnomClient').val('');
													$('#txtdirection').val('');
													$('#txtnoFolio').val('');
												}else{
													var ExplodeCliente = result.split("#");													
													$("#txtnomClient").val($.trim(ExplodeCliente[0]));
													$("#txtdirection").val($.trim(ExplodeCliente[1]));
													
													$("#txtexamVisu").val($.trim(ExplodeCliente[5]));
													$("#txtmedioPrue").val($.trim(ExplodeCliente[6])); 
													$("#txtpresOpe").val($.trim(ExplodeCliente[7])); 
													$("#txtpresPrue").val($.trim(ExplodeCliente[8])); 
													$("#txtduraPrue").val($.trim(ExplodeCliente[9])); 
													$("#txtObser").val($.trim(ExplodeCliente[10])); 
																										
													$("#txttecnico").val($.trim(ExplodeCliente[11])).change();
													$("#txtresponsable").val($.trim(ExplodeCliente[12])).change();
													$("#txtadministracion").val($.trim(ExplodeCliente[13])).change();
													if($.trim(ExplodeCliente[15])!=''){ VALID = $.trim(ExplodeCliente[15]); }
													// alert('VALID = '+VALID);													
													if($.trim(ExplodeCliente[17])!=''){ $('#ActionVerPdf').attr("href",'<?=$sufijo?>'+$.trim(ExplodeCliente[17]));  }else{ $('#ActionVerPdf').attr("href", "#"); }	
													if($.trim(ExplodeCliente[18])!=''){ $("#ActionVerPdfPH").removeClass('hidden'); $('#ActionVerPdfPH').attr("href",'<?=$sufijo?>'+$.trim(ExplodeCliente[18]));  }else{ $("#ActionVerPdfPH").addClass('hidden'); $('#ActionVerPdfPH').attr("href", "#"); }	
													
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
													cadena = 'PG'+cadenaSucur+''+cadena+''+yyyy+''+mm+''+dd+''+pad(noCliente);
													$("#txtnoFolio").val(cadena);
													if($.trim(ExplodeCliente[14])!=''){ $("#txtnoFolio").val($.trim(ExplodeCliente[14])); }	
													
													if($.trim(ExplodeCliente[19])!='true'){ document.getElementById("btnGuardar_PG").style.display=''; }else{ document.getElementById("btnGuardar_PG").style.display='none'; }
													
														if($.trim(ExplodeCliente[14])!=''){ 
															$(".BuutonValidProcess").removeClass('hidden');
															$("#DropdowsAction").removeClass('hidden');
															var hrefUrlModalValid = '../../repositorio/loadExtintores/loadValidModal.php?noFolio='+$("#txtnoFolio").val();	
															$(".BodyTimelineValid").load(hrefUrlModalValid);
														}
																												
														if($.trim(ExplodeCliente[16])!=''){ JqGridUrlKeyUp = '../../repositorio/DataJson/DataExtintores/listarJsonBlank.php?rutaJson='+$.trim(ExplodeCliente[16]); }
												}
													
												$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'newPolizaG.php', datatype: "json" }).trigger('reloadGrid');
											}
										});	
																				
										return false;
									});
								</script>
								<script>
									$('#btnGuardar_PG').click( function (event) {											
										event.preventDefault();	
										
											//Guardar Tabla Jqgrid
											var idJqgridE = jQuery("#jqGrid").jqGrid('getGridParam','selrow');
												if(idJqgridE){ var retJqgrid = jQuery("#jqGrid").jqGrid('saveRow',idJqgridE); } else { }
										
										var formCreatedNewPolizaG = 'formCreatedNewPolizaG';
										var typeDocument='';
										var noFolio = $( '.txtnoFolio' ).val(),
										nomClient = $( '.txtnomClient' ).val(),
										direction = $( '.txtdirection' ).val(),
										sucursal = $( '.txtSucu' ).val(),
										fecha_service = $( '.txtfecha' ).val(),
										noCliente = $( '.txtnoCliente' ).val(),
										examVisu = $( '.txtexamVisu' ).val(),
										medioPrue = $( '.txtmedioPrue' ).val(),
										presOpe = $( '.txtpresOpe' ).val(),
										presPrue = $( '.txtpresPrue' ).val(),
										duraPrue = $( '.txtduraPrue' ).val(),
										Obser = $( '.txtObser' ).val(),
										responsable = $( '.txtresponsable' ).val(),
										tecnico = $( '.txttecnico' ).val(),
										areaOperativa = '<?php echo @$_SESSION['sesionNomUser'];?>',
										administracion = $('.txtadministracion').val(),																			
										TypeUserValid='<?php echo @$_SESSION['sesionPrivi'];?>',
										IdUserValid='<?php echo @$_COOKIE['id'];?>';
										
										if('<?php echo $SetPdfPH; ?>'=='false'){ typeDocument='POLIZA'; }
										else{ typeDocument='POLIZA-PH'; }
										
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
										var id_object = 0;
										$("#jqGrid tbody tr").each(function (index){											
											var cantidadAE, capacidadAE, agenteExtAE, agenteExtOtroAE, typeService_object;
											$(this).children("td").each(function (index2){
												switch (index2){
													case 0: cantidadAE = $.trim($(this).text()); break;
													case 1: capacidadAE = $.trim($(this).text()); break;
													case 2: agenteExtAE = $.trim($(this).text()); break;
													case 3: agenteExtOtroAE = $.trim($(this).text()); break;
													case 4: typeService_object = $.trim($(this).text()); break;													
													case 5: typepdf = $.trim($(this).text()); break;													
												}
												// $(this).css("background-color", "#ECF8E0");																								
											});											
											// if(cantidadAE!='' || capacidadAE!=''){
											if(id_object!=0){													
												$.post( 'newPolizaG.php' , { formCreatedNewPolizaG:formCreatedNewPolizaG,noFolio:noFolio,typeRegistro:'AgenteExt',fecha_service:fecha_service,noCliente:noCliente,SetIdClient:noCliente,SetPdfPH:'<?php echo $SetPdfPH; ?>',
																	id_object:id_object,cantidadAE:cantidadAE,capacidadAE:capacidadAE,agenteExtAE:agenteExtAE,agenteExtOtroAE:agenteExtOtroAE,typeService_object:typeService_object,typeDocument:typeDocument,responsable:responsable,tecnico:tecnico,administracion:administracion,nomClient:nomClient} );														
												banderaNextStep = true;
												CamposGrid.push(id_object,cantidadAE,capacidadAE,agenteExtAE,agenteExtOtroAE,typeService_object,typepdf);
											} id_object++;
											// }
										});	
										
										$.post( 'newPolizaG.php' , { formCreatedNewPolizaG:formCreatedNewPolizaG,noFolio:noFolio,typeRegistro:'General',fecha_service:fecha_service,noCliente:noCliente,examVisu:examVisu,medioPrue:medioPrue,SetIdClient:noCliente,SetPdfPH:'<?php echo $SetPdfPH; ?>',
														presOpe:presOpe,presPrue:presPrue,duraPrue:duraPrue,Obser:Obser,typeDocument:typeDocument,responsable:responsable,tecnico:tecnico,administracion:administracion,nomClient:nomClient,valid:VALID},
										function ( exito ){													
											var varResult = exito.split("#");	
											$('.result-Ajax').html(exito).fadeIn(2000);
											// alert(exito);
											if(banderaNextStep==true){
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
										
										$.post( 'newPolizaG.php' , { GererateJsonPG : 'GererateJsonPG', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal, SetIdClient:noCliente,SetPdfPH:'<?php echo $SetPdfPH; ?>', } );											
										
											if(typeDocument=='POLIZA'){
												// Genera Pdf deacuerdo a los datos capturados del formulario
												var hrefUrlPolizaGFpdf = '../../repositorio/fpdf/pdfExtintores/newPolizaFpdf.php?';																				
												var hrefParamPolizaGFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&noCliente="+noCliente+"&sucursal="+sucursal+"&nomClient="+nomClient+"&direction="+direction+"&areaOperativa="+areaOperativa+"&responsable="+responsable+"&tecnico="+tecnico;
												$("#GeneratePdf").load(hrefUrlPolizaGFpdf,hrefParamPolizaGFpdf); 
											}else{											
												// Genera Pdf deacuerdo a los datos capturados del formulario
												var hrefUrlPolizaGFpdf = '../../repositorio/fpdf/pdfExtintores/newPolizaFpdf.php?';																				
												var hrefParamPolizaGFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&noCliente="+noCliente+"&sucursal="+sucursal+"&nomClient="+nomClient+"&direction="+direction+"&areaOperativa="+areaOperativa+"&responsable="+responsable+"&tecnico="+tecnico;
												$("#GeneratePdf").load(hrefUrlPolizaGFpdf,hrefParamPolizaGFpdf); 
												
												// Genera Pdf deacuerdo a los datos capturados del formulario
												var hrefUrlPHFpdf = '../../repositorio/fpdf/pdfExtintores/newPruebasHFpdf.php?';																				
												var hrefParamPHFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&noCliente="+noCliente+"&sucursal="+sucursal+"&nomClient="+nomClient+"&direction="+direction+"&areaOperativa="+areaOperativa+"&responsable="+responsable+"&tecnico="+tecnico+"&examVisu="+examVisu+"&medioPrue="+medioPrue+"&presOpe="+presOpe+"&presPrue="+presPrue+"&duraPrue="+duraPrue+"&Obser="+Obser;
												$("#GeneratePdfPH").load(hrefUrlPHFpdf,hrefParamPHFpdf); 
											}
										
										
										//variables para agregar la firma en el pdf
										var hrefRutaFpdf="../../../web/UploadPdf/PdfExtintores/PolizaGarantia/"+sucursal+"/"+noFolio+"-"+noCliente+".pdf";
										var hrefRutaFpdfPHP="../../../web/UploadPdf/PdfExtintores/PruebasH/"+sucursal+"/"+noFolio+"-"+noCliente+".pdf";
										var hrefRutaFirma="../../../web/images/FileUpload/FirmasOrdenT/PolizaGarantia/"+sucursal+"/"+areaOperativa+"-"+noFolio+"-"+noCliente+".png";
										// Si la Variable VALID es igual a 'false', aparece modal para la firma electronica
											if(VALID=='false'){
												$(".BuutonValidProcess").removeClass('hidden');
												$("#DropdowsAction").removeClass('hidden');
												$('#CanvasFirma').modal({backdrop:'static',keyboard:false, show:true});	
												//Evento Cuando dan click al boton de Guardar Firma llamado download
												$('#download').click(function(event){ 
													var correoEnvio = $('.txtcorreoEnvio').val();
													var dirTypeExtin = "PolizaGarantia";
													var dirTypeExtin2 = "PruebasH";
													var RequestFirma = downloadCanvas(this, 'canvas', areaOperativa+'-'+noFolio+'-'+noCliente, correoEnvio, dirTypeExtin, sucursal, '<?php echo @$_SESSION['sesionPrivi'];?>');														
													if(RequestFirma==true){
														$("#GeneratePdf").removeClass('hidden');
														$(".modalDialogFirma").addClass('hidden');
														$("#GeneratePdf").html("<img src='../../web/images/loading_BIG.gif' style='color:white;padding-top:20%;padding-left:32%'/>");
														setTimeout(function(){ 	
															if(TypeUserValid =='ADMINISTRADOR'){ //este de ADMINISTRADOR debe cambiar porque es OPERATIVA
																if(typeDocument=='POLIZA'){
																var hrefUrlAddFirma = '../../repositorio/fpdf/pdfExtintores/addFirmaPoliza.php?';												
																var hrefParamAddFirmaFpdf = "hrefRutaFpdf="+hrefRutaFpdf+"&hrefRutaFirma="+hrefRutaFirma+"&TypeUser="+TypeUserValid+"&NoFolio="+noFolio+"&sendSucursal="+sucursal+"&IdClientValid="+IdUserValid+"&typePDF=polizaGarantia";
																$("#GeneratePdf").load(hrefUrlAddFirma,hrefParamAddFirmaFpdf); }else{
																	var hrefUrlAddFirma = '../../repositorio/fpdf/pdfExtintores/addFirmaPoliza.php?';												
																	var hrefParamAddFirmaFpdf = "hrefRutaFpdf="+hrefRutaFpdf+"&hrefRutaFirma="+hrefRutaFirma+"&TypeUser="+TypeUserValid+"&NoFolio="+noFolio+"&sendSucursal="+sucursal+"&IdClientValid="+IdUserValid+"&typePDF=polizaGarantia";
																	var hrefParamAddFirmaFpdfPH = "hrefRutaFpdf="+hrefRutaFpdfPHP+"&hrefRutaFirma="+hrefRutaFirma+"&TypeUser="+TypeUserValid+"&NoFolio="+noFolio+"&sendSucursal="+sucursal+"&IdClientValid="+IdUserValid+"&typePDF=pruebasH";
																	$("#GeneratePdf").load(hrefUrlAddFirma,hrefParamAddFirmaFpdf);
																	$("#GeneratePdfPH").load(hrefUrlAddFirma,hrefParamAddFirmaFpdfPH);
																}
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
																		text: 'Ver PDF(S)',
																		btnClass: 'btn-green btn-sm',
																		action: function(){		
																			window.open("<?php echo $sufijo;?>web/UploadPdf/PdfExtintores/"+dirTypeExtin+"/"+sucursal+"/"+noFolio+"-"+noCliente+".pdf");
																			document.getElementById("btnGuardar_PG").style.display='none';																																																						
																			window.open("<?php echo $sufijo;?>web/UploadPdf/PdfExtintores/"+dirTypeExtin2+"/"+sucursal+"/"+noFolio+"-"+noCliente+".pdf", 'height=600,width=800,scrollbars=1,location:no,menubar:no,resizable=1,status:no,toolbar:no');
																			location.reload();
																		}
																	},
																	tryAgain: {
																		text: 'Nuevo',
																		btnClass: 'btn-green',
																		action: function(){																																																					
																			document.getElementById("btnGuardar_PG").style.display='none';
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