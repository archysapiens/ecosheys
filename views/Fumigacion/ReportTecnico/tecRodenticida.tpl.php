<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">

			<?php// navbar($activeDesk='',$activeAdmin='',$activeFumi='active',$activeExtin='',$sufijo,$sufijoMenu); ?>
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
											<button data-toggle="dropdown" class="btn btn-primary btn-xs in-line dropdown-toggle" >Agregar Firmas <span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a href="#" class="btn btn-xs BuutonValidProcess hidden" role="button" data-toggle="modal" data-target="#CanvasFirma">Firma Cliente</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" data-toggle="modal" data-target="#CanvasFirma">Firma Técnico</a></li>												
											</ul>
										</div>										
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
																<input type="text" id="txthorInicio" name="txthorInicio" class="form-control txthorInicio timepicker time start" value="00:00" disabled>								
																<span class="input-group-addon">
																	<span class="fa fa-clock-o"></span>
																</span>
															</div>
														</div>
														<label  class="control-label col-xs-3">HORARIO FINALIZADO:</label>
														<div class="col-xs-3">															
															<div class="input-group bootstrap-timepicker" data-autoclose="true">
																<input type="text" id="txthorFinal" name="txthorFinal" class="form-control txthorFinal timepicker2 time end" value="00:00" disabled>
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
															<textarea class="form-control txtObser" id="txtObser" name="txtObser" placeholder="Observaciones" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)"></textarea>
														</div>
													</div>
													<div class="form-group form-group-sm" style="text-align:left">																			
														<label  class="control-label col-xs-3">RESPONSABLE ÁREA:</label>
														<div class="col-xs-9">															
															<input type="text" id="txtresponsable" name="txtresponsable" class="selectSearch form-control txtresponsable input-sm" disabled>
														</div>
													</div>
													<div class="form-group form-group-sm" style="text-align:left">																			
														<label  class="control-label col-xs-3">TÉCNICO APLICADOR:</label>
														<div class="col-xs-9">
															<input type="text" id="txttecnico" name="txttecnico" class="selectSearch form-control txttecnico input-sm" disabled>
														</div>
													</div>
												</div>
											</form>
											<br>
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
										<style>
											.nav-tabs { border-bottom: 2px solid #DDD; }
											.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
											.nav-tabs > li > a { border: none; color: #666; }
											.nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #11987d !important; background: transparent; }
											.nav-tabs > li > a::after { content: ""; background: #11987d; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
											.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
											.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }	
										</style>
										<div class="modal fade" id="CanvasFirma" tabindex="-1" role="dialog" aria-labelledby="grafica" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
										<div class="modal fade" id="grafica" tabindex="-1" role="dialog" aria-labelledby="grafica" aria-hidden="true">
										  <div class="modal-dialog" role="document">
											<div class="modal-content modalDialogGrafica">					
											  <div class="modal-body">
												 <div id="container" style="min-width: 310px; max-width:600px;  height: 400px; margin: 0 auto"></div>
											  </div>
											  <div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
											  </div>
											</div>
										  </div>
										</div><div id="GeneratePdf" class="hidden"></div>
									</div>										
								</div>
								<script type="text/javascript">
									$(document).ready(function () {
										var sizeWidthJqGrid = $('.tabs-container').width();
										$("#jqGrid").jqGrid({
											url: '../../repositorio/DataJson/DataFumigacion/ReportRodenticidas/dataReport.json',
											editurl: 'conRodenticida.php',
											datatype: "json",
											cmTemplate: { sortable: false },
											colModel: [
												{
													label: "Acciones",
													name: "actions",
													width: 45,
													formatter: "actions",
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
													width: 55
												},
												{
													label : 'Ubicación',
													name: 'Ubicacion',
													width: 140
												},
												{
													label: '0 | 25 | 50 | 75 | 100',
													name: 'Consumo',
													width: 100,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: "0:0;25:25;50:50;75:75;100:100"
													}
												},
												{
													label: 'Limpieza',
													name: 'Limpieza',
													 width: 50,
													 editable: true,
													 edittype: "select",
													 editoptions: {
														 value: "Si:Si;No:No"
													 }
												},
												{
													label: 'Bueno | Malo',
													name: 'Estatus',
													width: 100,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: "Bueno:Bueno;Malo:Malo"
													}
												},
												{
													label: 'Observaciones',
													name: 'Obser',
													width: 100,
													editable: true
												}
											],
											sortname: 'Id',
											sortorder : 'asc',
											loadonce: true,
											viewrecords: true,
											onSelectRow: editRow,
											height: 205,
											width: sizeWidthJqGrid,
											shrinkToFit: true,
											rowNum: 1,
											rownumbers: false, // show row numbers
											pager: "#jqGridPager",
											caption: "Distribución De Estaciones Cebaderas"
										});
										
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
											}
										}
										
										// the bindKeys() 
										$("#jqGrid").jqGrid('bindKeys');
										$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a role="link" id="obtenergrafica" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:6%;"><span class="fa fa-bar-chart-o ui-state-hover"></span></a>');										
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
									var VALID = "false";
																	
									$("#txtnoCliente").keyup(function() {
										var noCliente = $(this).val();										
										var TypeAutocomplite = "AutocompliteReportTecnico";
										var JqGridUrlKeyUp ='../../repositorio/DataJson/DataFumigacion/ReportRodenticidas/dataReport.json';	
										$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'conRodenticida.php', datatype: "json",rowNum:1 }).trigger('reloadGrid');
										
										$.ajax({
											type: "POST",
											url: "../../repositorio/loadFumigacion/cargarDatosTecnico.php",
											data: {noCliente:noCliente,txtSucu:$('.txtSucu').val(),TypeAutocomplite:TypeAutocomplite},
											success: function(result) {	
												$(".BuutonValidProcess").addClass('hidden');
												$("#DropdowsAction").addClass('hidden');
												VALID = "false";
												if(result=='vacio'){
													$('#txtnomClient').val('');
													$('#txtdirection').val('');
													$('#txtnoFolio').val('');
													$('#txthorInicio').val('');
													$('#txthorFinal').val('');
													$('#txttecnico').val('');
													$('#txtresponsable').val('');
													$('#txtObser').val('');
												}else{
													var ExplodeCliente = result.split("#");	
													$("#txtnoFolio").val($.trim(ExplodeCliente[10]));													
													$("#txtnomClient").val($.trim(ExplodeCliente[0]));
													$("#txtdirection").val($.trim(ExplodeCliente[1]));
													$("#txtcorreoEnvio").val($.trim(ExplodeCliente[4]));
													$("#txthorInicio").val($.trim(ExplodeCliente[5]));
													$("#txthorFinal").val($.trim(ExplodeCliente[6]));	
													$("#txtObser").val($.trim(ExplodeCliente[7]));
													$("#txttecnico").val($.trim(ExplodeCliente[8]));
													$("#txtresponsable").val($.trim(ExplodeCliente[9]));
													if($.trim(ExplodeCliente[11])!=''){ VALID = $.trim(ExplodeCliente[11]); }
													alert('VALID = '+ExplodeCliente[4]);
													$("#passwordHelpBlock").html('<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Revisar Correo de envio...');
													if($.trim(ExplodeCliente[4])!=''){ 
													$("#passwordHelpBlock").html('<br> &nbsp; &nbsp; ¿Seguro de enviar correo a <strong>'+$.trim(ExplodeCliente[4])+'</strong>?'); }
																																																																	
														document.getElementById("btnGuardar_Report_Fumi").style.display='';
													
														if($.trim(ExplodeCliente[10])!=''){ 
															$(".BuutonValidProcess").removeClass('hidden');
															$("#DropdowsAction").removeClass('hidden');
															var hrefUrlModalValid = '../../repositorio/loadFumigacion/loadValidModal.php?noFolio='+$("#txtnoFolio").val();	
															$(".BodyTimelineValid").load(hrefUrlModalValid);
														}
																												
														if($.trim(ExplodeCliente[12])!=''){ JqGridUrlKeyUp = $.trim(ExplodeCliente[12]); }
												}													
												$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'conRodenticida.php', datatype: "json",rowNum: ExplodeCliente[13] }).trigger('reloadGrid');
											}
										});																																
										return false;
									});
								</script>
								<script>
									$( '#btnGuardar_Report_Fumi' ).click( function (event) {											
										event.preventDefault();	
										
										var dirTypeFumi = "ReportRodenticidas";
										var formUpdatedReportRodenticidas = 'formUpdatedReportRodenticidas';
										var noFolio = $( '.txtnoFolio' ).val(),
										nomClient = $( '.txtnomClient' ).val(),
										direction = $( '.txtdirection' ).val(),
										sucursal = $( '.txtSucu' ).val(),
										fecha_service = $( '.txtfecha' ).val(),
										noCliente = $( '.txtnoCliente' ).val(),
										horInicio = $( '.txthorInicio' ).val(),
										horFinal = $( '.txthorFinal' ).val(),
										Obser = $( '.txtObser' ).val(),
										responsable = $( '.txtresponsable' ).val(),
										tecnico = $( '.txttecnico' ).val();																														
										
										var banderaNextStep = false,
											CamposGrid = [];
										
										$("#jqGrid tbody tr").each(function (index) {
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
													$.post( 'conRodenticida.php' , { formUpdatedReportRodenticidas : formUpdatedReportRodenticidas,noFolio:noFolio,noCliente:noCliente,id_object:id_object,ubicacion:ubicacion,consumo:consumo,limpieza:limpieza,estatus_object:estatus_object,obser_object:obser_object,Obser:Obser,valid:'table'} );														
												banderaNextStep = true;
												CamposGrid.push(id_object,ubicacion,consumo,limpieza,estatus_object,obser_object);
											}
										});																																															
																														
										if(banderaNextStep==true){
											$.post( 'conRodenticida.php' , { GererateJsonRC : 'GererateJsonRC', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal } );																						  												
												
												// Genera Pdf deacuerdo a los datos capturados del formulario
												// var hrefUrlReportFpdf = '../../repositorio/fpdf/ReporConsuCeboRodenticida.php?';
												// var hrefParamReportFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&noCliente="+noCliente+"&horInicio="+horInicio+"&horFinal="+horFinal+"&sucursal="+sucursal+"&nomClient="+nomClient+"&direction="+direction+"&Obser="+Obser+"&responsable="+responsable+"&tecnico="+tecnico+"&CamposGrid="+CamposGrid;
												// $("#GeneratePdf").load(hrefUrlReportFpdf,hrefParamReportFpdf); 
												
											setTimeout(function() {
												$.confirm({
													title: 'Exito!',
													content: '  &nbsp; Datos Actualizados Correctamente',
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
																document.getElementById("btnGuardar_Report_Fumi").style.display='none';																																				
																window.open("<?php echo $sufijo;?>web/UploadPdf/PdfFumigacion/"+dirTypeFumi+"/"+sucursal+"/"+noFolio+"-"+noCliente+".pdf", 'height=600,width=800,scrollbars=1,location:no,menubar:no,resizable=1,status:no,toolbar:no');
																location.reload();
															}
														},
														tryAgain: {
															text: 'Nuevo',
															btnClass: 'btn-green',
															action: function(){																																																					
																document.getElementById("btnGuardar_Report_Fumi").style.display='none';
																location.reload();																		
															}
														}
													}
												});
											},1500);
										}																																	
									});
									
									/*$('#download').click(function(event){ 
										var correoEnvio = $('.txtcorreoEnvio').val();
										var dirTypeFumi = "ReportesTecnico";
										var RequestFirma = downloadCanvas(this, 'canvas', '<?php echo utf8_encode(@$_SESSION['sesionNomUser']);?>-'+$('.txtnoFolio').val()+'-'+$('.txtnoCliente').val(), correoEnvio, dirTypeFumi, $('.txtSucu').val(), '<?php echo @$_SESSION['sesionPrivi'];?>');														
										if(RequestFirma==true){
											$('#CanvasFirma').modal('hide');														
											setTimeout(function() {
												toastr.options = {
													closeButton: true,
													progressBar: true,
													positionClass: 'toast-top-right',
													showMethod: 'slideDown',
													timeOut: 5000
												};
												toastr.success('','FIRMA GUARDADA');
											},1200);
										}
										//Se limpian las variables una vez que se ha firmado
										VALID = "true";
										$('.txtcorreoEnvio').val('');
									});*/
								</script>
								<script>
									$(document).ready(function() {   
										$("#obtenergrafica").on('click',function(event) {
											event.preventDefault();	
											$('#grafica').modal({backdrop:'static',keyboard:false, show:true});
											$('#generaTable tbody').html('');
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
													$('#generaTable tbody').append( '<tr><td>' + campo3 +  '</td> <td>' + campo4 + '</td> </tr>' );
												}															  
											});

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
												xAxis: {type: 'category',labels: {rotation: -45,style: {fontSize: '13px',fontFamily: 'Verdana, sans-serif' } } },
												yAxis: { allowDecimals: false, title: { text: '% Consumo' } },
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