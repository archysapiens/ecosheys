<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">

			<?php //navbar($activeDesk='',$activeAdmin='',$activeFumi='active',$activeExtin='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeFumi',$sufijo,$sufijoMenu); ?>
			
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
										<div class="btn-group hidden" style="margin-right:7%;" id="DropdowsAction">
											<button data-toggle="dropdown" class="btn btn-primary btn-xs in-line dropdown-toggle" >Action <span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a href="#" class="btn btn-xs BuutonValidProcessClient hidden" role="button" data-toggle="modal" data-target="#modalProceesValidClient">Proceso Validación</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" data-toggle="modal" data-target="#modalAddEmailEnvio">Agregar Correo</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" id="ActionVerPdf" target="_blank">Ver PDF</a></li>	
												<li><a href="#" class="btn btn-xs" role="button" id="NewReportFumi">Nuevo</a></li>	
											</ul>
										</div>
										<!--button type="button" class="btn btn-primary btn-xs in-line BuutonValidProcessClient hidden" style="margin-right:7%;" data-toggle="modal" data-target="#modalProceesValidClient">Proceso Validación</button-->
										<a class="collapse-link FormRodenticida">
											<i class="fa fa-chevron-up"></i>
										</a>										 
									</div>
								</div>								
								
								<div class="ibox-content text-center FormRodenticida">
									<div class="row">
										<div class="col-lg-10 col-sm-offset-1" style="text-align:center;vertical-align:middle">
												
											<form class="form-horizontal" name="frm_Rodenticida" id="frm_Rodenticida">
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
														<label  class="control-label col-xs-3">HORARIO INICIO:</label>
														<div class="col-xs-3">															
															<div class="input-group bootstrap-timepicker" data-autoclose="true">
																<input type="text" id="txthorInicio" name="txthorInicio" class="form-control txthorInicio timepicker time start" value="00:00">								
																<span class="input-group-addon">
																	<span class="fa fa-clock-o"></span>
																</span>
															</div>
														</div>
														<label  class="control-label col-xs-3">HORARIO FINALIZADO:</label>
														<div class="col-xs-3">															
															<div class="input-group bootstrap-timepicker" data-autoclose="true">
																<input type="text" id="txthorFinal" name="txthorFinal" class="form-control txthorFinal timepicker2 time end" value="00:00">
																<span class="input-group-addon">
																	<span class="fa fa-clock-o"></span>
																</span>
															</div>
														</div>
													</div>
													<br>
													<h4 style="color:#11987d">Distribución de Estaciones Cebaderas</h4>													
													<br>
													<div class="panele">
														<div class="panele-body">
															<table id="jqGrid" class="table"></table>
															<div id="jqGridPager"></div>
														</div>
													</div>
													<br>
													<div class="form-group form-group-sm">																			
														<label  class="control-label col-xs-3">OBSERVACIONES:</label>
														<div class="col-xs-9">															
															<textarea class="form-control txtObser text-uppercase" id="txtObser" name="txtObser" placeholder="Observaciones" onkeydown="return validarLetras(event)"></textarea>
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
												</div>
											</form>
											<br><br>
											<button type="button" class="ladda-button btn btn-primary btn-block pull-right" data-style="expand-right" id="btnGuardar_Report_Fumi" style="display:none"> <span class="fa fa-send"></span> &nbsp; Guardar</button>																																			
											<div class="result-Ajax hidden"></div>
											<table id="generaTable" class="hidden">
												<thead>
													<tr>
														<th>% Consumo</th>
														<th>Ubicación</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
										<div class="modal fade" id="grafica" tabindex="-1" role="dialog" aria-labelledby="grafica" aria-hidden="true">
										  <div class="modal-dialog" role="document" id="graficaConsumo">
											<div class="modal-content modalDialogGrafica">					
											  <div class="modal-body">
												 <div id="container" ></div> 
											  </div>
											  <div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
											  </div>
											</div>
										  </div>
										</div>									
										<div class="modal fade" id="modalProceesValidClient" tabindex="-1" role="dialog" aria-labelledby="ValidProceesClient" aria-hidden="true">
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
										</div><div id="GeneratePdf" class="hidden"></div>
										<div class="modal inmodal fade" id="modalAddEmailEnvio" tabindex="-1" role="dialog"  aria-hidden="true" data-backdrop="static" data-keyboard="false">
											<div class="modal-dialog modal-sm" style="width:40%">
												<div class="modal-content modalDialogAddOption">
													<button type="button" class="close" style="padding-top:5px;padding-right:5px;" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
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
									</div>										
								</div>
								<script type="text/javascript">
									$("#NewReportFumi").click(function(event) {										
										event.preventDefault();										
										var GetNoFolio = $( '.txtnoFolio' ).val(),
										GetnoCliente = $( '.txtnoCliente' ).val();
										var folioDeleteTableReport = 'folioDeleteTableReport';								
										
											// Envia noFolio y elimina los campos en las tablas reportes_fumi y valid_modulo										
											$.post( 'newFumigacion.php' , { folioDeleteTableReport : folioDeleteTableReport,GetNoFolio:GetNoFolio,GetnoCliente:GetnoCliente },
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
									$(document).ready(function () {
										var sizeWidthJqGrid = $('.tabs-container').width();
										$("#jqGrid").jqGrid({
											// url: '../../repositorio/DataJson/DataFumigacion/ReportRodenticidas/dataReport.json',
											url: '../../repositorio/DataJson/DataFumigacion/listarJsonBlank.php?nomJson=dataReport&carpetJson=ReportRodenticidas',
											editurl: 'conRodenticida.php',
											datatype: "json",
											colModel: [
												{
													label: "Acciones",
													name: "actions",
													width: 45,
													formatter: "actions",
													sortable: false,
													formatoptions: {
														keys: true,
														editOptions: {},
														addOptions: {},
														delOptions: {}
													}       
												},
												{
													label: 'N°Caja',
													name: 'Id',
													sortable: false,
													width: 55
												},
												{
													label : 'Ubicación',
													name: 'Ubicacion',
													width: 140,
													sortable: false,
													required: true,
													editable: true // must set editable to true if you want to make the field editable
												},
												{
													label: '0 | 25 | 50 | 75 | 100',
													name: 'Consumo',
													width: 100,
													editable: false,
													edittype: "select",
													sortable: false,
													editoptions: {
														 value: ":;0:0;25:25;50:50;75:75;100:100"
													}
												},
												{
													label: 'Limpieza',
													name: 'Limpieza',
													 width: 50,
													 editable: false,
													 edittype: "select",
													 sortable: false,
													 editoptions: {
														 value: ":;Si:Si;No:No"
													 }
												},
												{
													label: 'Bueno | Malo',
													name: 'Estatus',
													width: 100,
													editable: false,
													edittype: "select",
													sortable: false,
													editoptions: {
														 value: ":;Bueno:Bueno;Malo:Malo"
													}
												},
												{
													label: 'Observaciones',
													name: 'Obser',
													width: 100,
													editable: false,
													sortable: false
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
											caption: "Distribución De Estaciones Cebaderas",
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
											caption: "  Exportar Excel",
											buttonicon: "fa fa-file-excel-o",
											onClickButton: function() {
												$('#jqGrid').jqGrid('exportarExcelCliente',{nombre:"HOJATEST",formato:"excel"});
												//console.log($("#tb_ejemplo").jqGrid('exportarTextoCliente'));
											},
											position: "last"
										});
										//*************************************//
										
										 $('#jqGrid').setGroupHeaders(
											{
												useColSpanStyle: true,
												groupHeaders: [
													{ "numberOfColumns": 1, "titleText": " % CONSUMO", "startColumnName": "Consumo" },
													{ "numberOfColumns": 1, "titleText": "Estado de Cebaderas", "startColumnName": "Estatus" }]
											});
										
										var lastSelection;

										function editRow(id) {
											 if (id && id !== lastSelection) {
												$('div#jEditButton_'+lastSelection+', div#jDeleteButton_'+lastSelection).css("display", "block");												
												$('div#jSaveButton_'+lastSelection+', div#jCancelButton_'+lastSelection).css("display", "none");
												var grid = $("#jqGrid");
												grid.jqGrid('saveRow',lastSelection);
												grid.jqGrid('editRow',id, {keys: true} );
												lastSelection = id;

												$('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "none");
												$('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "block");
												
												$('#'+id+'_Ubicacion').blur(function(event){											
													grid.jqGrid('saveRow',lastSelection);
													$('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "block");
													$('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "none");
												});
											 }
										}
										
										// the bindKeys() 
										$("#jqGrid").jqGrid('bindKeys');
										$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a role="link" id="obtenergrafica" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:6%;"><span class="fa fa-bar-chart-o ui-state-hover"></span></a>');										
										$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a href="javascript:;" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:2.5%;" data-click="panel-expand"><i class="fa fa-expand"></i></a>');
									});									
								</script>
								<script type="text/javascript">
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
									var RutaPdfReport = "";
									
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
										var TypeAutocomplite = "AutocompliteReportFumi";
										var TypeReportFumi = "ROE"; // ROEDORES
										// var JqGridUrlKeyUp ='../../repositorio/DataJson/DataFumigacion/ReportRodenticidas/dataReport.json';	
										var JqGridUrlKeyUp ='../../repositorio/DataJson/DataFumigacion/listarJsonBlank.php?nomJson=dataReport&carpetJson=ReportRodenticidas';	
										$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'conRodenticida.php', datatype: "json" }).trigger('reloadGrid');
										
										$.ajax({
											type: "POST",
											url: "../../repositorio/loadFumigacion/cargar-datos.php",
											data: {noCliente:noCliente,txtSucu:$('.txtSucu').val(),TypeAutocomplite:TypeAutocomplite,TypeReportFumi:TypeReportFumi},
											success: function(result) {		
												$("#txtnoCliente").prop('disabled', false).focus();
												$(".BuutonValidProcessClient").addClass('hidden');
												$("#DropdowsAction").addClass('hidden');
												if(result=='vacio'){
													$('#txtnomClient').val('');
													$('#txtdirection').val('');
													$('#txtnoFolio').val('');
												}else{
													var ExplodeCliente = result.split("#");													
													$("#txtnomClient").val($.trim(ExplodeCliente[0]));
													$("#txtdirection").val($.trim(ExplodeCliente[1]));
													$("#txtcorreoEnvio").val($.trim(ExplodeCliente[4]));
													if($.trim(ExplodeCliente[5])!=''){ $("#txthorInicio").val($.trim(ExplodeCliente[5])); }
													if($.trim(ExplodeCliente[6])!=''){ $("#txthorFinal").val($.trim(ExplodeCliente[6])); }		
													$("#txtObser").val($.trim(ExplodeCliente[7]));
													$("#txttecnico").val($.trim(ExplodeCliente[8])).change();
													$("#txtresponsable").val($.trim(ExplodeCliente[9])).change();
													$("#txtadministracion").val($.trim(ExplodeCliente[10])).change();
													if($.trim(ExplodeCliente[12])!=''){ VALID = $.trim(ExplodeCliente[12]); }
													// alert('VALID = '+VALID);
													if($.trim(ExplodeCliente[14])!=''){ RutaPdfReport = $.trim(ExplodeCliente[14]); $('#ActionVerPdf').attr("href",'<?=$sufijo?>'+$.trim(ExplodeCliente[14]));  }else{ $('#ActionVerPdf').attr("href", "#"); }
													
													$("#passwordHelpBlock").html('<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Revisar Correo de envio...');
													if($.trim(ExplodeCliente[4])!=''){ 
													$("#passwordHelpBlock").html('<br> &nbsp; &nbsp; ¿Seguro de enviar correo a <strong>'+$.trim(ExplodeCliente[4])+'</strong>?'); }
																																							
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
													cadena = 'RC'+cadenaSucur+''+cadena+''+yyyy+''+mm+''+dd+''+pad(noCliente);
													$("#txtnoFolio").val(cadena);
													if($.trim(ExplodeCliente[11])!=''){ $("#txtnoFolio").val($.trim(ExplodeCliente[11])); }	
													
													if($.trim(ExplodeCliente[15])!='true'){ document.getElementById("btnGuardar_Report_Fumi").style.display=''; }else{ document.getElementById("btnGuardar_Report_Fumi").style.display='none'; }
													
														if($.trim(ExplodeCliente[11])!=''){ 
															$(".BuutonValidProcessClient").removeClass('hidden');
															$("#DropdowsAction").removeClass('hidden');
															var hrefUrlModalValid = '../../repositorio/loadFumigacion/loadValidModal.php?noFolio='+$("#txtnoFolio").val();	
															$(".BodyTimelineValid").load(hrefUrlModalValid);
														}
																												
														// if($.trim(ExplodeCliente[13])!=''){ JqGridUrlKeyUp = $.trim(ExplodeCliente[13]); }
														if($.trim(ExplodeCliente[13])!=''){ JqGridUrlKeyUp = '../../repositorio/DataJson/DataFumigacion/listarJsonBlank.php?rutaJson='+$.trim(ExplodeCliente[13]); }
												}
													
												$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'conRodenticida.php', datatype: "json" }).trigger('reloadGrid');
											}
										});												
																				
										return false;
									});
								</script>
								<script>
									$( '#btnGuardar_Report_Fumi' ).click( function (event) {											
										event.preventDefault();	
										
										var dirTypeFumi = "ReportRodenticidas";
										var formCreatedReportRodenticidas = 'formCreatedReportRodenticidas';
										var noFolio = $( '.txtnoFolio' ).val(),
										nomClient = $( '.txtnomClient' ).val(),
										direction = $( '.txtdirection' ).val(),
										sucursal = $( '.txtSucu' ).val(),
										fecha_service = $( '.txtfecha' ).val(),
										noCliente = $( '.txtnoCliente' ).val(),
										horInicio = $( '.txthorInicio' ).val(),
										horFinal = $( '.txthorFinal' ).val(),
										Obser = $( '.txtObser' ).val().toUpperCase(),
										responsable = $( '.txtresponsable' ).val(),
										tecnico = $( '.txttecnico' ).val(),
										administracion = $('.txtadministracion').val();
										
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
												toastr.error('','Ingresar N° Cliente');
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
												toastr.error('','Fallo al Generar N° Folio');
											},1200);
											$('.control-label-noFolio').addClass('has-error');
										}
										
										
										if ($.trim(nomClient) == "" )
										{
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
										
										var banderaNextStep = false,
											CamposGrid = [];
											CamposGridNecesary = [];
										
										$("#jqGrid tbody tr").each(function (index) 
										{
											var campo1, campo2, campo3, campo4, campo5, campo6, campo7;
											$(this).children("td").each(function (index2) 
											{
												switch (index2) 
												{
													case 0: campo1 = $(this).text();
															break;
													case 1: campo2 = $(this).text();
															break;
													case 2: campo3 = $(this).text();
															break;
													case 3: campo4 = $(this).text();
															break;
													case 4: campo5 = $(this).text();
															break;
													case 5: campo6 = $(this).text();
															break;
													case 6: campo7 = $(this).text();
															break;
												}
												// $(this).css("background-color", "#ECF8E0");
											});
											var id_object=campo2;
											var ubicacion='+'+campo3+'+';
											var consumo=campo4;
											var limpieza=campo5;
											var estatus_object=campo6;
											var obser_object=campo7;
																						
											if(campo2!='' && ubicacion!='+ +'){
													// alert(ubicacion);
													ubicacion = ubicacion.replace('+', '');
													ubicacion = ubicacion.replace('+', '');														
													$.post( 'conRodenticida.php' , { formCreatedReportRodenticidas : formCreatedReportRodenticidas,noFolio:noFolio,fecha_service:fecha_service,noCliente:noCliente,horInicio:horInicio,horFinal:horFinal,
																			  id_object:id_object,ubicacion:ubicacion,consumo:consumo,limpieza:limpieza,estatus_object:estatus_object,obser_object:obser_object,Obser:Obser,responsable:responsable,tecnico:tecnico,administracion:administracion,nomClient:nomClient,valid:'table'} );														
												banderaNextStep = true;
												CamposGrid.push(id_object,ubicacion,consumo,limpieza,estatus_object,obser_object);
												// CamposGridNecesary.push(id_object,ubicacion);
											}
										});																																	
										
										$.post( 'conRodenticida.php' , { formCreatedReportRodenticidas : formCreatedReportRodenticidas,noFolio:noFolio,fecha_service:fecha_service,noCliente:noCliente,horInicio:horInicio,horFinal:horFinal,
																	Obser:Obser,responsable:responsable,tecnico:tecnico,administracion:administracion,nomClient:nomClient,valid:VALID} ,
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
																														
										if(banderaNextStep==true){
											$.post( 'conRodenticida.php' , { GererateJsonRC : 'GererateJsonRC', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal } );																						  												
												
												// Genera Pdf deacuerdo a los datos capturados del formulario
												var hrefUrlReportFpdf = '../../repositorio/fpdf/ReporConsuCeboRodenticida.php?';
												// var hrefParamReportFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&noCliente="+noCliente+"&horInicio="+horInicio+"&horFinal="+horFinal+"&sucursal="+sucursal+"&nomClient="+nomClient+"&direction="+direction+"&Obser="+Obser+"&responsable="+responsable+"&tecnico="+tecnico+"&CamposGrid="+CamposGridNecesary;
												var hrefParamReportFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&noCliente="+noCliente+"&horInicio="+horInicio+"&horFinal="+horFinal+"&sucursal="+sucursal+"&nomClient="+nomClient+"&direction="+direction+"&Obser="+Obser+"&responsable="+responsable+"&tecnico="+tecnico;
												$("#GeneratePdf").load(hrefUrlReportFpdf,hrefParamReportFpdf); 
												
											$("#DropdowsAction").removeClass('hidden');
											
											if(VALID=='false'){
												var GetNoFolioReport = $( '.txtnoFolio' ).val(),
												    NomOfReport = 'Reporte de Consumo de Cebo Rodenticida',
													GetnoClienteReport = $( '.txtnoCliente' ).val();
												var nextValidEmailEnvio = 'nextValidEmailEnvio';									
												
													// Enviar correo al tecnico para validar											
													$.post( 'conRodenticida.php' , { nextValidEmailEnvio : nextValidEmailEnvio,GetNoFolioReport:GetNoFolioReport,GetnoClienteReport:GetnoClienteReport,RutaPdfReport:RutaPdfReport,NomOfReport:NomOfReport },
													function ( exito ){													
																																						
													});																																																							
											}
											
											setTimeout(function() {
												$.confirm({
													content: function(){
														var self = this;        
														return $.ajax({
															url: 'conRodenticida.php',
															dataType: 'json',
															method: 'post'
														});
													},
													onContentReady: function(){
														this.setTitle('Exito!');
														this.setContent('  &nbsp; Datos guardados correctamente');
														$('.btn-confirmPdf, .btn-confirm').removeClass('hidden'); 
													},
													title: ' ',
													content: '  &nbsp; Cargando... ',
													type: 'green',
													theme: 'modern',
													typeAnimated: true,
													animationSpeed: 2000, // 2 seconds
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
															btnClass: 'btn-confirmPdf btn-green btn-sm hidden',
															action: function(){				
																document.getElementById("btnGuardar_Report_Fumi").style.display='none';																																				
																window.open("<?php echo $sufijo;?>web/UploadPdf/PdfFumigacion/"+dirTypeFumi+"/"+sucursal+"/"+noFolio+"-"+noCliente+".pdf", 'height=600,width=800,scrollbars=1,location:no,menubar:no,resizable=1,status:no,toolbar:no');
																location.reload();
															}
														},
														tryAgain: {
															text: 'Nuevo',
															btnClass: 'btn-confirm btn-green btn-sm hidden',
															action: function(){																																																					
																document.getElementById("btnGuardar_Report_Fumi").style.display='none';
																location.reload();																		
															}
														}
													}
												});
											},6000);
										}																																	
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
											$.post( 'conRodenticida.php' , { formAddEmailEnvio : formAddEmailEnvio,AddEmailEnvio:AddEmailEnvio,GetNoFolio:GetNoFolio,GetnoCliente:GetnoCliente },
											function ( exito ){													
												$('.text-info-addEmailEnvio').append(exito).fadeIn(2000);																								
											});																																
										
										return false;
									});
								</script>
								<script>
									$(document).ready(function() {   
										$("#obtenergrafica").on('click',function(event) {
											event.preventDefault();	
											$('#grafica').modal({backdrop:'static',keyboard:false, show:true});
											$('#generaTable tbody').html('');
											var iJqgrid = 0;
											var fontSizeHigchart = '12px';
											$("#jqGrid tbody tr").each(function (index) {
												var campo3, campo4;
												$(this).children("td").each(function (index2) {
													switch (index2) {
														case 2: campo3 = $(this).text(); break;
														case 3: campo4 = $(this).text(); break;
													}
												});
												var campoSele='+'+campo3+'+';
												if(campoSele!='+ +' && campoSele!='++'){
													iJqgrid++;
													$('#generaTable tbody').append( '<tr><td>' + campo3 +  '</td> <td>' + campo4 + '</td> </tr>' );
												}															  
											});
											
											if(iJqgrid > 30){
												$('#graficaConsumo').toggleClass('modal-lg');
												fontSizeHigchart = '7px';
											}else{
												$('#graficaConsumo').toggleClass('modal-lg');
												fontSizeHigchart = '10px';
											}
											
											Highcharts.chart('container', {
												colors: ['#1ab394'],
												data: { table: 'generaTable' },
												chart: { type: 'column' },
												lang: { downloadJPEG: "Descargar imagen JPEG",
														printChart: "Imprimir gráfica",
														loading: "Cargando...",
													    downloadPDF: "Descargar documento PDF",
													    downloadPNG: "Descargar imagen PNG",
													    downloadSVG: "Descargar imagen SVG vectorial" },
												title: { text: 'Gráfica de Consumo' },
												xAxis: {type: 'category',labels: {rotation: -45,style: {fontSize: fontSizeHigchart,fontFamily: 'Verdana, sans-serif' } } },
												yAxis: { allowDecimals: false,min: 0,max: 100, title: { text: '% Consumo' } },
												tooltip: {
													formatter: function () {
														return '<b>' + this.series.name + '</b><br/>' +
															this.point.y + ' ' + this.point.name.toLowerCase();
													}
												}
											})
										})
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