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
							<div class="ibox float-e-margins" id="RegistroCheckList">
								<div class="ibox-title">
									<!--h5  style="color:black">Reporte de Consumo de Cebo Rodenticida</h5-->
									<div class="ibox-tools">
										<div class="btn-group hidden" style="margin-right:7%;" id="DropdowsAction">
											<button data-toggle="dropdown" class="btn btn-primary btn-xs in-line dropdown-toggle" >Action <span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a href="#" class="btn btn-xs BuutonValidProcess hidden" role="button" data-toggle="modal" data-target="#modalProceesValid">Proceso Validación</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" data-toggle="modal" data-target="#modalAddEmailEnvio">Agregar Correo</a></li>												
												<li><a href="#" class="btn btn-xs" role="button" id="ActionVerPdf" target="_blank">Ver CheckList PDF</a></li>												
											</ul>
										</div>
										<a class="collapse-link FormCheckList">
											<i class="fa fa-chevron-up"></i>
										</a>										 
									</div>
								</div>								
								
								<div class="ibox-content text-center FormCheckList">
									<div class="row">
										<div class="col-lg-10 col-sm-offset-1" style="text-align:center;vertical-align:middle" id="divContent">												
											<form class="form-horizontal" name="frm_CheckList" id="frm_CheckList">
												<div class="bs-example tabs-container with-nav-tabs panel-success">
													
													<div class="form-group form-group-sm">
														<label class="control-label col-xs-2">N° DE FOLIO:</label>
														<div class="col-xs-3 control-label-noFolio">
															<input type="text" id="txtnoFolio" name="txtnoFolio" class="form-control txtnoFolio" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" disabled>
														</div>
																											
														<label class="control-label col-xs-1">FECHA:</label>
														<div class="col-xs-2" id="dateFecha">
															<div class="input-group date">
																<input type="text" name="txtfecha" class="form-control txtfecha" id="txtfecha" value="<?php echo date("Y-m-d"); ?>">
																<span class="input-group-addon"></span>
															</div>
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
														<label  class="control-label col-xs-3">EMPRESA:</label>
														<div class="col-xs-9">
															<input type="text" id="txtEmpresa" name="txtEmpresa" class="form-control txtEmpresa" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)" disabled>
														</div>
													</div>
													<div class="form-group form-group-sm">
														<label  class="control-label col-xs-3">DIRECCION:</label>
														<div class="col-xs-9">
															<input type="text" id="txtdirection" name="txtdirection" class="form-control txtdirection" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)" disabled>
														</div>
													</div>
													<div class="form-group form-group-sm">
														<label  class="control-label col-xs-3">NUM. EXTINTORES LIBERAR:</label>
														<div class="col-xs-9">
															<input type="text" id="txtExtintoresLib" name="txtExtintoresLib" class="form-control txtExtintoresLib" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
														</div>
													</div>
													<div class="form-group form-group-sm">
														<label  class="control-label col-xs-3">COORDINADOR DE EXTINTORES:</label>
														<div class="col-xs-9">
															<input type="text" id="txtCordinadorExt" name="txtCordinadorExt" class="form-control txtCordinadorExt" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo @$_SESSION['sesionNomUser'];?>" onkeydown="return validarLetras(event)">
														</div>
													</div>														
													<h4 style="color:#11987d">Extintores de Salida</h4>														
													<br>
													<div class="panele">
														<div class="panele-body">
															<table id="jqGrid" class="table"></table>
															<div id="jqGridPager"></div>
														</div>
													</div>
													<br>																																						
													<div class="form-group form-group-sm" id="divObser">																			
														<label  class="control-label col-xs-3">OBSERVACIONES:</label>
														<div class="col-xs-9">															
															<textarea class="form-control txtObser text-uppercase" id="txtObser" name="txtObser" placeholder="Observaciones" onkeydown="return validarLetras(event)"></textarea>
														</div>
													</div>																																					
												</div>
											</form>	<br>									
											<button type="button" class="ladda-button btn btn-primary btn-block pull-right" data-style="expand-right" id="btnGuardar_CL" style="display:none"> <span class="fa fa-send"></span> &nbsp; Guardar</button>																																			
											<div class="result-Ajax hidden"></div>											
										</div>																			
									</div>										
								</div>																								
								
								<script type="text/javascript">
									$(document).ready(function () {
										var sizeWidthJqGrid = $('.tabs-container').width();
										$("#jqGrid").jqGrid({											
											url: '../../repositorio/DataJson/DataExtintores/listarJsonBlank.php?nomJson=dataReport&carpetJson=CheckList',
											editurl: 'checkList.php',
											datatype: "json",
											colModel: [
												{
													label: 'Folio',
													name: 'Folio',													
													width: 40,
													sortable: false,
													required: true,
													editable: false 
												},
												{
													label : 'Cap. Kg',
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
													label : 'Manómetro',
													name: 'Manometro',
													width: 52,
													sortable: false,
													required: true,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: ":;Si:Si;No:No"
													}													
												},
												{
													label : 'Seguro',
													name: 'Seguro',
													width: 52,
													sortable: false,
													required: true,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: ":;Si:Si;No:No"
													}
												},
												{
													label : 'Boquilla',
													name: 'Boquilla',
													width: 52,
													sortable: false,
													required: true,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: ":;Si:Si;No:No"
													}													
												},
												{
													label : 'Manguera',
													name: 'Manguera',
													width: 52,
													sortable: false,
													required: true,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: ":;Si:Si;No:No"
													}
												},
												{
													label : 'Bastago',
													name: 'Bastago',
													width: 52,
													sortable: false,
													required: true,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: ":;Si:Si;No:No"
													}
												},
												{
													label : 'Pintura',
													name: 'Pintura',
													width: 52,
													sortable: false,
													required: true,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: ":;Si:Si;No:No"
													}
												},
												{
													label : 'Etiqueta',
													name: 'Etiqueta',
													width: 52,
													sortable: false,
													required: true,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: ":;Si:Si;No:No"
													}
												},
												{
													label : 'Recarga o Matto',
													name: 'Recarga',
													width: 52,
													sortable: false,
													required: true,
													editable: true,
													edittype: "select",
													editoptions: {
														 value: ":;Mantenimiento:Mantenimiento;Recarga:Recarga;Nuevo:Nuevo"
													}													
												},
												{
													label : 'Peso Final',
													name: 'PesoFinal',
													width: 52,
													sortable: false,
													required: true,
													editable: true 
												},
												{
													label : 'Fugatina kg',
													name: 'Fugatina',
													width: 52,
													sortable: false,
													required: true,
													editable: true 
												},
												{
													label : 'Reviso',
													name: 'Reviso',
													width: 52,
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
											height: 605,
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
												$('#jqGrid').jqGrid('exportarExcelCliente',{nombre:"CheckList",formato:"excel"});
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
													{ "numberOfColumns": 2, "titleText": "<center>AGENTE EXTINGUIDOR</center>", "startColumnName": "AgenteExt" }]
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
									
									$(document).ready(function() {

										var noCliente = '<?php echo $SetIdClient; ?>';
										VALID = "false";	
										$(".BodyTimelineValid").html('');
										var JqGridUrlKeyUp ='../../repositorio/DataJson/DataExtintores/listarJsonBlank.php?nomJson=dataReport&carpetJson=CheckList'
										$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'checkList.php', datatype: "json" }).trigger('reloadGrid');																																					
										
										$.ajax({
											type: "POST",
											url: "../../repositorio/loadExtintores/cargar-datos.php",
											data: {noCliente:noCliente,txtSucu:$('.txtSucu').val(),TypeAutocomplite:'CheckList',TypeReportFumi:'CL'},
											success: function(result) {		
												
												$(".BuutonValidProcess").addClass('hidden');
												$("#ActionVerPdfPH").addClass('hidden');
												$("#DropdowsAction").addClass('hidden');
												if(result=='vacio'){
													$('#txtEmpresa').val('');
													$('#txtdirection').val('');
													$('#txtnoFolio').val('');
												}else{
													var ExplodeCliente = result.split("#");													
													$("#txtEmpresa").val($.trim(ExplodeCliente[0]));
													$("#txtdirection").val($.trim(ExplodeCliente[1]));
													
													$("#txtExtintoresLib").val($.trim(ExplodeCliente[5]));
													$("#txtfecha").val($.trim(ExplodeCliente[6]));  
													$("#txtObser").val($.trim(ExplodeCliente[7])); 
													$("#txtCordinadorExt").val($.trim(ExplodeCliente[8])); 
																																							
													// alert('VALID = '+VALID);													
													if($.trim(ExplodeCliente[11])!=''){ $('#ActionVerPdf').attr("href",'<?=$sufijo?>'+$.trim(ExplodeCliente[10]));  }else{ $('#ActionVerPdf').attr("href", "#"); }	
																									
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
													cadena = 'CL'+cadenaSucur+''+cadena+''+yyyy+''+mm+''+dd+''+pad(noCliente);
													$("#txtnoFolio").val(cadena);
													if($.trim(ExplodeCliente[11])!=''){ $("#txtnoFolio").val($.trim(ExplodeCliente[11])); }	
													
													document.getElementById("btnGuardar_CL").style.display=''; 
													
														if($.trim(ExplodeCliente[11])!=''){ 
															$(".BuutonValidProcess").removeClass('hidden');
															$("#DropdowsAction").removeClass('hidden');															
														}
																												
														if($.trim(ExplodeCliente[9])!=''){ JqGridUrlKeyUp = '../../repositorio/DataJson/DataExtintores/listarJsonBlank.php?rutaJson='+$.trim(ExplodeCliente[9]); }
												}
													
												$('#jqGrid').setGridParam({ url: JqGridUrlKeyUp , editurl: 'newPolizaG.php', datatype: "json" }).trigger('reloadGrid');
											}
										});	
																				
										return false;
									});
								</script>
								<script>
									$('#btnGuardar_CL').click( function (event) {											
										event.preventDefault();	
										
											//Guardar Tabla Jqgrid
											var idJqgridE = jQuery("#jqGrid").jqGrid('getGridParam','selrow');
												if(idJqgridE){ var retJqgrid = jQuery("#jqGrid").jqGrid('saveRow',idJqgridE); } else { }
										
										var formCreatedNewCheckL = 'formCreatedNewCheckL';
										var typeDocument='';
										var noFolio = $( '.txtnoFolio' ).val(),
										empresa = $( '.txtEmpresa' ).val(),
										direction = $( '.txtdirection' ).val(),
										sucursal = $( '.txtSucu' ).val(), //
										fecha_service = $( '.txtfecha' ).val(),
										noCliente = $( '.txtnoCliente' ).val(),
										ExtintoresLib = $( '.txtExtintoresLib' ).val(),
										CordinadorExt = $( '.txtCordinadorExt' ).val(),
										Obser = $( '.txtObser' ).val(),										
										areaOperativa = '<?php echo @$_SESSION['sesionNomUser'];?>';										
										
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
										if ($.trim(empresa) == "" ){
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
											var FolioAE, capacidadAE, agenteExtAE, manometrAE, seguroAE, boquillAE, manguerAE, bastagoAE, pinturAE, etiquetAE, mattoAE, pesoFinal, fugatina, Reviso;
											$(this).children("td").each(function (index2){
												switch (index2){
													case 0: FolioAE = $.trim($(this).text()); break;
													case 1: capacidadAE = $.trim($(this).text()); break;
													case 2: agenteExtAE = $.trim($(this).text()); break;
													case 3: manometrAE = $.trim($(this).text()); break;
													case 4: seguroAE = $.trim($(this).text()); break;													
													case 5: boquillAE = $.trim($(this).text()); break;													
													case 6: manguerAE = $.trim($(this).text()); break;													
													case 7: bastagoAE = $.trim($(this).text()); break;													
													case 8: pinturAE = $.trim($(this).text()); break;													
													case 9: etiquetAE = $.trim($(this).text()); break;													
													case 10: mattoAE = $.trim($(this).text()); break;													
													case 11: pesoFinal = $.trim($(this).text()); break;													
													case 12: fugatina = $.trim($(this).text()); break;													
													case 13: Reviso = $.trim($(this).text()); break;													
												}
												// $(this).css("background-color", "#ECF8E0");																								
											});											
											// if(cantidadAE!='' || capacidadAE!=''){
											if(id_object!=0){													
												$.post( 'checkList.php' , { formCreatedNewCheckL:formCreatedNewCheckL,noFolio:noFolio,typeRegistro:'AgenteExt',fecha_service:fecha_service,noCliente:noCliente,SetIdClient:noCliente,SetPdfPHChecList:'<?php echo $SetPdfChecList; ?>',
																	id_object:id_object,capacidadAE:capacidadAE,agenteExtAE:agenteExtAE,manometrAE:manometrAE,seguroAE:seguroAE,boquillAE:boquillAE,manguerAE:manguerAE,bastagoAE:bastagoAE,pinturAE:pinturAE,etiquetAE:etiquetAE,mattoAE:mattoAE,pesoFinal:pesoFinal,fugatina:fugatina,Reviso:Reviso,areaOperativa:areaOperativa,nomClient:empresa} );														
												banderaNextStep = true;
												CamposGrid.push(id_object,capacidadAE,agenteExtAE,manometrAE,seguroAE,boquillAE,manguerAE,bastagoAE,pinturAE,etiquetAE,mattoAE,pesoFinal,fugatina,Reviso);
											} id_object++;
											// }
										});	
										
										$.post( 'checkList.php' , { formCreatedNewCheckL:formCreatedNewCheckL,noFolio:noFolio,typeRegistro:'General',fecha_service:fecha_service,noCliente:noCliente,ExtintoresLib:ExtintoresLib,CordinadorExt:CordinadorExt,SetIdClient:noCliente,SetPdfPHChecList:'<?php echo $SetPdfChecList; ?>',
														Obser:Obser,direction:direction,areaOperativa:areaOperativa,nomClient:empresa},
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
										
										$.post( 'checkList.php' , { GererateJsonCL : 'GererateJsonCL', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal, SetIdClient:noCliente, SetPdfPHChecList:'<?php echo $SetPdfChecList; ?>' } );											
										
										// Genera Pdf deacuerdo a los datos capturados del formulario
										var hrefUrlCheckListFpdf = '../../repositorio/fpdf/pdfExtintores/newCheckListFpdf.php?';																				
										var hrefParamCheckListFpdf = "noFolio="+noFolio+"&fecha_service="+fecha_service+"&noCliente="+noCliente+"&sucursal="+sucursal+"&nomClient="+empresa+"&direction="+direction+"&areaOperativa="+areaOperativa+"&ExtintoresLib="+ExtintoresLib+"&CordinadorExt="+CordinadorExt+"&Obser="+Obser;
										$("#GeneratePdf").load(hrefUrlCheckListFpdf,hrefParamCheckListFpdf); 
										
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