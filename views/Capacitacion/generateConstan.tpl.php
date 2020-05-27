<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">
			<style>
				.panel-google-plus {
					position: relative;
					border-radius: 0px;
					border: 1px solid rgb(216, 216, 216);
					font-family: 'Roboto', sans-serif;
					min-height:268px;
					max-height:268px;
				}
				/***/
				.panel-google-plus > .panel-google-plus-tags {
					position: absolute;
					top: 7px;
					right: -3px;
				}
				.panel-google-plus > .panel-google-plus-tags > ul {
					list-style: none;
					padding: 0px;
					margin: 0px;
				}
				.panel-google-plus > .panel-google-plus-tags > ul:hover {
					box-shadow: 0px 0px 3px rgb(0, 0, 0);   
					box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.25);   
				}
				.panel-google-plus > .panel-google-plus-tags > ul > li {
					display: block;
					right: 0px;
					width: 0px;
					padding: 5px 0px 5px 0px;
					background-color: rgb(245, 245, 245);
					font-size: 11px;
					overflow: hidden;
				}
				/***/
				.panel-google-plus > .panel-google-plus-tags > ul > li::after {
					content:"";
					position: absolute;
					top: 0px;
					right: 0px;
					height: 100%;
					border-right: 3px solid rgb(25, 170, 141);
				}
				.panel-google-plus > .panel-google-plus-tags > ul:hover > li,
				.panel-google-plus > .panel-google-plus-tags > ul > li:first-child {
					padding: 5px 15px 5px 10px;
					width: auto;
					cursor: pointer;
					margin-left: auto;
				}
				.panel-google-plus > .panel-google-plus-tags > ul:hover > li {
					background-color: rgb(255, 255, 255);   
				}
				/***/
				.panel-google-plus > .panel-google-plus-tags > ul > li:hover {
					background-color: rgb(25, 170, 141);
					color: rgb(255, 255, 255);
				}
				.panel-google-plus > .panel-heading,
				.panel-google-plus > .panel-footer {
					background-color: rgb(255, 255, 255);
					border-width: 0px; 
				}
				.panel-google-plus > .panel-heading {
					margin-top: 20px;    
					padding-bottom: 5px; 
				}
				.panel-google-plus > .panel-heading > img { 
					margin-right: 15px;
				}
				.panel-google-plus > .panel-heading > h3 {
					margin: 0px;
					font-size: 14px;
					font-weight: 700;
				}
				.panel-google-plus > .panel-heading > h5 {
					color: rgb(153, 153, 153);
					font-size: 12px;
					font-weight: 400;
				}
				.panel-google-plus > .panel-body {
					padding-top: 5px;
					font-size: 13px;
				}
				.panel-google-plus > .panel-body > .panel-google-plus-image {
					display: block;
					text-align: center;
					background-color: rgb(245, 245, 245);
					border: 1px solid rgb(217, 217, 217);
				}
				.panel-google-plus > .panel-body > .panel-google-plus-image > img {
					max-width: 100%;
				}

				.panel-google-plus > .panel-footer {
					font-size: 14px;
					font-weight: 700;
					min-height: 54px;
				}
				.panel-heading {
					padding: 10px 10px;				
				}
				.pac-container { z-index: 9999999 !important;  }
				.panel-google-plus.danger > .panel-google-plus-tags > ul > li::after { border-right: 3px solid rgb(193, 50, 27); }
				.panel-google-plus.danger > .panel-google-plus-tags > ul > li:hover {  background-color: rgb(193, 50, 27); }
				.panel-google-plus.danger > .panel-google-plus-tags > ul > li { background-color: rgba(196, 11, 11, 0.05); }
				.panel-google-plus.warning > .panel-google-plus-tags > ul > li::after { border-right: 3px solid #f0ad4e; }
				.panel-google-plus.warning > .panel-google-plus-tags > ul > li:hover {  background-color: #f0ad4e; }
				.panel-google-plus.warning > .panel-google-plus-tags > ul > li { background-color: #f0ad4e17 }
				.panel-google-plus.success > .panel-google-plus-tags > ul > li:hover { background-color: rgb(25, 170, 141); }
				.panel-google-plus.success > .panel-google-plus-tags > ul > li { background-color: rgba(25, 170, 141, 0.05); }
				.modal-body.sk-loading:after {
					content: '';
					background-color: rgba(255, 255, 255, 0.7);
					position: absolute;
					top: 0;
					left: 0;
					right: 0;
					bottom: 0;
					z-index: 9999;
				}
				.product-overlay {
					display: block;
					height: 55px;
					background: rgb(255, 255, 255);
					line-height: 55px;
					position: absolute;
					bottom: 0px;
					width: 100%;
					left: 0px;
					right: 0px;
					transition: .3s;
					z-index:999;
				}
				.product-overlay a {
					font-size: 15px;
					margin: 0;
					color: rgb(144, 34, 16);
					width: 100%;
					float: left;
					text-align: center;
				}
				.input-group-addon:first-child { color: cadetblue; }
				.panel-google-plus {
					box-shadow: 1px 1px 0px 1px #d8cece5c;
				}
				.panel-google-plus:hover,
				.panel-google-plus.active {						
					 border: 1px solid transparent;
					  -webkit-box-shadow: 0 3px 7px 0 #a8a8a8;
					  -moz-box-shadow: 0 3px 7px 0 #a8a8a8;
					  box-shadow: 0 3px 7px 0 #a8a8a8;
				}
				.img-thumbnail {
					width: 108.44px;
					height: 72.03px;
				}
			</style>
			<?php // navbar($activeDesk='',$activeAdmin='',$activeFumi='',$activeExtin='active',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='ProteCivil',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12">
							<div class="ibox float-e-margins" id="RegistroDeServicio">
								<div class="ibox-title">
								<h5  style="color:black">Generar Constancias</h5>
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
										<a class="collapse-link FormConstancias">
											<i class="fa fa-chevron-up"></i>
										</a>										 
									</div>
								</div>								
								<?php if($visibility == 'NewConstan'){ ?>
								<?php// var_dump($editConstancia); ?>
								<div class="ibox-content text-center FormConstancias">
									<div class="sk-spinner sk-spinner-wave">
										<div class="sk-rect1"></div>
										<div class="sk-rect2"></div>
										<div class="sk-rect3"></div>
										<div class="sk-rect4"></div>
										<div class="sk-rect5"></div>
									</div>
									<div class="row">
										<div class="col-sm-12" style="text-align:center;vertical-align:middle">												
											<form class="form-horizontal" name="frm_Constancias" id="frm_Constancias">
												<div class="bs-example tabs-container with-nav-tabs panel-success">													
													<div class="form-group form-group-sm">
														<label class="control-label col-xs-2 control-noFolio">N° DE FOLIO:</label>
														<div class="col-xs-4 control-label-noFolio">
															<input type="text" id="txtnoFolio" name="txtnoFolio" class="form-control txtnoFolio" aria-describedby="helpBlock" disabled>
														</div>
																											
														<label class="control-label col-xs-2">FECHA:</label>
														<div class="col-xs-4">
															<input type="date" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" class="form-control txtfecha" min="<?php echo date("Y-m-d"); ?>" autofocus>
														</div>
																								
														<div class="col-xs-3">
															<input type="text" id="txtSucu" name="txtSucu" value="<?=@$_SESSION['sesionSucur']?>" class="form-control txtSucu hidden" disabled>
														</div>
													</div>													                   
													<div class="form-group form-group-sm ">
														<label class="control-label col-xs-2">Nombre del Curso: </label>
														<div class="col-xs-4">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-list-alt"></i>
																</span>															
																<select class="form-control m-b txtNameCurso" id="txtNameCurso" name="txtNameCurso">  
																	<?php while($row = $SelectCourse->fetch_assoc()) {
																		echo "<option value='".mb_strtoupper($row['NAME'], 'UTF-8')."'>".mb_strtoupper($row['NAME'], 'UTF-8')."</option>";
																	}?>																		
																</select>
															</div>
														</div>
														<label class="control-label col-xs-2">Nombre Instructor:</label>
														<div class="col-xs-4">														
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-list-alt"></i>
																</span>
																<select class="form-control m-b txtInstructor" name="txtInstructor" id="txtInstructor">
																	<?php while($rowInst = $SelectInstruct->fetch_assoc()) {
																		echo "<option value='".mb_strtoupper($rowInst['NAME'], 'UTF-8')."'>".mb_strtoupper($rowInst['NAME'], 'UTF-8')."</option>";
																	}?>														
																</select>
															</div>	
														</div>	
													</div>
													<div class="form-group form-group-sm">
														<label class="control-label col-xs-2 control-NumDC5">Número DC5:</label>
														<div class="col-xs-4 control-NumDC5">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-sort-numeric-asc"></i>
																</span>
																<input type="text" name="txtNumeroDc" id="txtNumeroDc" placeholder="Escriba el número de DC5 del instructor" class="form-control txtNumeroDc text-uppercase">
															</div>
														</div>
														<label class="control-label col-xs-2 control-NumPCivil">Num. Protección Civil:</label>
														<div class="col-xs-4 control-NumPCivil">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-sort-numeric-asc"></i>
																</span>
																<input type="text" name="txtNumeroPC" id="txtNumeroPC" placeholder="Escriba el número de protección civil " class="form-control txtNumeroPC text-uppercase">
															</div>
														</div>
													</div>
													<div class="jqGrid_wrapper">
														<table id="table_list_1"></table>
														<div id="pager_list_1"></div>
													</div>													
												</div>
											</form>	<br>									
											<button type="button" class="ladda-button btn btn-primary btn-block pull-right" data-style="expand-right" id="btnGuardar_PC" > <span class="fa fa-send"></span> &nbsp; Guardar</button>																																			
											<div class="result-Ajax hidden"></div>											
										</div>																			
									</div>										
								</div>
								<script>
									jQuery(function($) {
										$('#txtInstructor').on('change', function() {
											$.post('generateConstan.php',{ action:'searchDataInstruc',nameInstruct:$('#txtInstructor').val()} ).done(function( data ){
												var datos = JSON.parse(data);
												$('#txtNumeroDc').val(datos[0].NUM_DC5);
												$('#txtNumeroPC').val(datos[0].NUM_PC);
											});
										}).trigger('change');
									});
									$(document).ready(function () {
										if('<?=$editConstancia;?>'==''){
											var strIdClient='<?php echo $_COOKIE["id"]; ?>';
											var strSucur=$("#txtSucu").val();
											var cadenaSucur= strSucur.substr(0,3);
											
											var hoy = new Date();
											var dd = hoy.getDate();
											var mm = hoy.getMonth()+1; //hoy es 0!
											var yyyy = hoy.getFullYear().toString().substr(-2);
											var time= hoy.getHours()+''+hoy.getMinutes()+''+hoy.getSeconds();

											if(dd<10) { dd='0'+dd } 
											if(mm<10) { mm='0'+mm } 
										
										cadena = 'PC'+cadenaSucur+''+yyyy+''+mm+''+dd+'-'+strIdClient+'-'+time;
										$("#txtnoFolio").val(cadena);}else{
												$('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
												$("#txtfecha").val($.trim('<?=$editConstancia[0]['FECHA_CAPACITACION'];?>')).prop("disabled", true);
												$("#txtNameCurso").val('<?=$editConstancia[0]['NAME_CURSO'];?>').change().prop("disabled", true);
												$("#txtNameCurso").attr('title','<?=$editConstancia[0]['NAME_CURSO'];?>');
												$("#txtInstructor").val('<?=$editConstancia[0]['NAME_INSTRUCTOR'];?>').change().prop("disabled", true);
												$("#txtInstructor").attr('title','<?=$editConstancia[0]['NAME_INSTRUCTOR'];?>');
												
												$("#txtnoFolio").val($.trim('<?=$editConstancia[0]['NO_FOLIO'];?>'));
																								
												
												setTimeout(function() {
													toastr.options = {
														closeButton: true,
														progressBar: true,
														positionClass: 'toast-bottom-right',
														showMethod: 'slideDown',
														timeOut: 4000
													};
													JqGridUrlKeyUp = '../../repositorio/DataJson/DataCapacitacion/listarJsonBlank.php?rutaJson='+'<?=$editConstancia[0]['RUTA_JSON'];?>';
													$('#table_list_1').setGridParam({ url: JqGridUrlKeyUp , editurl: 'generateConstan.php', datatype: "json", rowNum: '<?=$editConstancia[0]['COUNT'];?>' }).trigger('reloadGrid');
													$('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
												},1500);
											}
									});	
									$(document).ready(function () {										
										// Configuration for jqGrid Example 1
										var sizeWidthJqGrid = $('.tabs-container').width(); var validJqgridCurp = true;
										$("#table_list_1").jqGrid({
											url: '../../repositorio/DataJson/DataCapacitacion/listarJsonBlank.php?nomJson=dataReport&carpetJson=NewConstanciaPC',
											editurl: 'generateConstan.php',
											datatype: "json",
											height: 250,
											autowidth: true,
											width: sizeWidthJqGrid,
											shrinkToFit: true,
											rowNum: 50,
											loadonce: true,
											colModel: [
												{
													label: 'N°',
													name: 'Id',
													width: 20,
													sortable: false	
												},
												{
													label : 'Nombre Completo',
													name: 'name',
													width: 200,
													sortable: false,
													required: true,
													editable: true 
												},
												{
													label: 'Folio',
													name: 'folio',
													width: 180,
													sortable: false,
													required: true,
													editable: false 
												}
											],
											pager: "#pager_list_1",
											viewrecords: true,
											onSelectRow: editRow,
											caption: "REGISTRO DE ALUMNOS",
											hidegrid: true,
											loadingText: 'Cargando...',
											noRecordText: 'No se encontraron registros'
										});
										// Add responsive to jqGrid
										$(window).bind('resize', function () {
											var width = $('.jqGrid_wrapper').width();
											$('#table_list_1').setGridWidth(width);
										});
										
										var lastSelection;
				
										function editRow(id) {
											 if (id && id !== lastSelection) {												
												var grid = $("#table_list_1");
												$("#"+lastSelection+" td:nth-child(2)").addClass('text-capitalize');
												grid.jqGrid('saveRow',lastSelection);
												grid.jqGrid('editRow',id, {keys: true} );
												lastSelection = id;												
												$('#'+id+'_name').blur(function(event){
													$("#"+lastSelection+" td:nth-child(2)").addClass('text-capitalize');
													grid.jqGrid('saveRow',lastSelection);
												});
											 }
										}
										// the bindKeys() 
										$("#table_list_1").jqGrid('bindKeys');																	
										$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a href="javascript:;" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:2.5%;" data-click="panel-expand"><i class="fa fa-expand"></i></a>');	
									});												
								</script>
								<script>
									/***** Start Save Constancia ***/
										$('#btnGuardar_PC').click( function (event) {											
											event.preventDefault();	
											$('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
											//Guardar Tabla Jqgrid
												var idJqgridE = jQuery("#table_list_1").jqGrid('getGridParam','selrow');
													if(idJqgridE){ var retJqgrid = jQuery("#table_list_1").jqGrid('saveRow',idJqgridE); } else { }
											
											var formCreatedNewConstan = 'formCreatedNewConstan';
											var noFolio = $( '.txtnoFolio' ).val(),
											validForm = true,
											nameCurso = $( '.txtNameCurso' ).val(),
											nameInstruct = $( '.txtInstructor' ).val(),
											numDC5 = $( '.txtNumeroDc' ).val(),
											numProteCivi = $( '.txtNumeroPC' ).val(),
											// puesto = $( '.txtPuesto' ).val(),
											// razonSocial = $( '.txtNomRazonSoci' ).val(),
											// rfcEmpresa = $( '.txtRFC' ).val(),
											// inscrip = $( '.txtInscrip' ).val(),
											sucursal = $( '.txtSucu' ).val(),
											fecha_service = $( '.txtfecha' ).val(),										
											// nameUploadExcel = $( '.txtRutaExcel' ).val(),										
											noCliente = '<?php echo @$_COOKIE['id'];?>',
											responsable = '<?php echo @$_SESSION['sesionNomUser'];?>';
											
											toastr.options = {
												closeButton: true,
												progressBar: true,
												positionClass: 'toast-bottom-right',
												showMethod: 'slideDown',
												timeOut: 4000
											};	
											/* Validación de algunos campos */ 
											$('.control-NumDC5').removeClass('has-error has-feedback'); $('.control-NumPCivil').removeClass('has-error has-feedback');
											if ($(".txtnoFolio").val() == "" ){ setTimeout(function() { toastr.error('','Fallo al Generar N° Folio'); },2200);
											$('.control-noFolio').addClass('has-error has-feedback'); validForm=false; }
											if ($.trim($(".txtNumeroDc").val()) == "" ){ setTimeout(function() { toastr.error('','Llenar Campo Num DC5'); },2200);
											$('.control-NumDC5').addClass('has-error has-feedback'); validForm=false; }
											if ($.trim($(".txtNumeroPC").val()) == "" ){ setTimeout(function() { toastr.error('','Llenar Campo NUm Protección C.'); },2200);
												$('.control-NumPCivil').addClass('has-error has-feedback'); validForm=false; }
											
											/* Si la validación del formulario es correcto se guarda la información */
											if(validForm==true){
											
													/* Recorrer tabla de Agentes Extintores */
													var banderaNextStep = false,
														CamposGrid = [];
													var id_object = 0; var numPerson = 0;
													$("#table_list_1 tbody tr").each(function (index){											
														var noRA, nameRA, companyRA, folioRA;
														$(this).children("td").each(function (index2){
															switch (index2){
																case 0: noRA = $.trim($(this).text()); break;
																case 1: nameRA = $.trim($(this).text()); break;
																case 2: folioRA = $.trim($(this).text()); break;												
															}
															// $(this).css("background-color", "#ECF8E0");																								
														});	
														if(nameRA!=''){numPerson++}
														if(id_object!=0){												
															$.post( 'generateConstan.php' , { formCreatedNewConstan:formCreatedNewConstan,noFolio:noFolio,typeRegistro:'Registro',fecha_service:fecha_service,noCliente:noCliente, id_object:id_object,nameRA:nameRA,folioRA:folioRA,rutaJson:'../../repositorio/DataJson/DataCapacitacion/NewConstanciaPC/'+sucursal+'/'+noFolio+'.json'} );														
															banderaNextStep = true;
															CamposGrid.push(id_object,nameRA,folioRA);
														} id_object++;
													});											
													// $(".next-step").prop("disabled", true); 
													// $("#btnCotizar").prop("disabled", true); 
													$.post( 'generateConstan.php' , { formCreatedNewConstan:formCreatedNewConstan,noFolio:noFolio,typeRegistro:'General',fecha_service:fecha_service,noCliente:noCliente, nameCurso:nameCurso,nameInstruct:nameInstruct,numDC5:numDC5,numProteCivi:numProteCivi,rutaJson:'../../repositorio/DataJson/DataCapacitacion/NewConstanciaPC/'+sucursal+'/'+noFolio+'.json'},
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
																$('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
																// $(".next-step").prop("disabled", false); 
																// $("#btnCotizar").prop("disabled", false); 
															},1200);
														}												
													}); 
													
													$.post( 'generateConstan.php' , { GererateJsonPC : 'GererateJsonPC', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal, noFolio:noFolio } );											
													
													//Datos modal cotizar
													// $('#modalCotizar').modal({backdrop:'static',keyboard:false, show:true});
													// $('#txtNumPerson').val(numPerson);
													// $('#txtsendNoFolio').val(noFolio);
													// $('#txtCurso').val(nameCurso);
													//end 
													// $('#coutPerson').text(numPerson);
													// $('#costPerson').text(numPerson*$('#txtCostoCurso').val());
													// $('#costPersonTotal').text(numPerson*$('#txtCostoCurso').val());
											}else{ $('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading'); }
											
											return false;																																																																																				
										});
									/***** End Save Constancia ***/
								</script>
								<?php }else{ ?>
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
										<!-- LISTADO DE INSCRIPCIONES -->
									<div class="ibox-content text-center">
										<div class="row m-b-sm m-t-sm">											
											<div class="col-md-10">
												<form method="get" action="">
													<div class="input-group"><input type="text" name="search" id="filter" placeholder="Buscar Constancia" class="input-xs form-control"> <span class="input-group-btn">
													<button type="submit" class="btn btn-default btn-outline"><i class="fa fa-search"></i> Buscar </button> </span></div>
												</form>
											</div>
											<div class="col-md-2">
												<a href="generateConstan.php?visibility=NewInscripNow" id="btnNewConstanc" class="btn btn-primary btn-md" role="button" aria-pressed="true"><i class="fa fa-plus"></i>&nbsp; Constancia</a>
											</div>
										</div>
										<div class="row" id="easyPaginate" style="margin-top:30px;">
											<?php while($row = $loadListConstan->fetch_assoc()) { ?>																								
												<div class="[ col-xs-12 col-sm-4 ] iboxRectangular">
													<?php if(@$row['PAGO_VALID']=='false'){$classPanel="danger";}else if(@$row['PAGO_VALID']=='true'){$classPanel="success";}?>
													<div class="[ panel panel-default ] panel-google-plus <?php echo $classPanel;?>">													
														<div class="panel-google-plus-tags">
															<ul> <li><?php echo date("j", strtotime(@$row['FECHA_REGISTRO']))." de ".date("M", strtotime(@$row['FECHA_REGISTRO']))." del ".date("Y", strtotime(@$row['FECHA_REGISTRO']));?> <small>( <?php echo timeAgo(@$row['FECHA_REGISTRO']); ?> )</small></li> </ul>
														</div>
														<div class="panel-heading">
														    <div class="row">
																<div class="col-sm-5">
																	<img class="[ img-thumbnail pull-left ]" src="<?php echo @$row['RUTA_IMG'];?>" alt="Mouse0270" />
																</div>
																<div class="col-sm-7" style="margin-top:28px;margin-left:-20px;">
																	<strong style="font-size:13px;" title="<?php echo @$row['NAME_CURSO'];?>"><?php echo substr(@$row['NAME_CURSO'],0,17); if(strlen(@$row['NAME_CURSO'])>16){echo "...";}?></strong>
																	<p><small>Inst:</small> <small title="<?php echo ucwords(mb_strtolower(@$row['NAME_INSTRUCTOR'], 'UTF-8'));?>"><?php echo substr(ucwords(mb_strtolower(@$row['NAME_INSTRUCTOR'], 'UTF-8')),0,40); if(strlen(@$row['NAME_INSTRUCTOR'])>40){echo "...";}?></small></p>
																</div>
															</div>
														</div>
														<div class="panel-body" style="padding: 5px;">														
															<p><?php echo substr(@$row['DESCRIPTION'], 0,132);?>...</p>
														</div>
														<?php if(@$row['PAGO_VALID']=='false'){ ?>
														<div class="product-overlay">
															<a class="product-overlay-link" href="#"><i class="">Validando Constancia(s)...</i></a>	
														</div>
														<?php }?>
														<div class="panel-footer">
															<div class="text-center tooltip-demo" style="border-top: 1px dashed #d4d9dc;padding: 12px 0px 0px;">
																<?php if(@$row['PAGO_VALID']!='false'){?>
																		<?php if($row['RUTA_PDF']=="true"){?>
																			<div class="dropdown pull-left" style="margin-left:40px;">
																			  <a href="#" class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-paste"></i> Action <span class="caret"></span></a>
																			  <ul class="dropdown-menu">
																				<li><a href="#" class="btn btn-white btn-sm OpenListAlumnModal " attrFolio="<?php echo $row['NO_FOLIO'];?>" id="OpenListAlumnModal" data-toggle="modal" data-target="#modalListAlumn"><i class="fa fa-file"></i>&nbsp; Generar Constan.. </a></li>
																				<li><a href="#" class="btn btn-white btn-sm OpenFormatosModal <?php if($row['RUTA_PDF']!="true"){echo "hidden";}?>" attrNoFolio="<?php echo $row['NO_FOLIO'];?>" id="OpenFormatosModal" data-toggle="modal" data-target="#modalShowDocuments"><i class="fa fa-eye"></i> Ver PDF(s) </a></li>
																			  </ul>
																			</div>
																		<?php }else{ ?>
																			<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Constancias" class="btn btn-sm btn-white OpenListAlumnModal" id="OpenListAlumnModal"  attrFolio="<?php echo @$row['NO_FOLIO'];?>" style="margin-right:25px;"><i class="fa fa-file"></i>&nbsp; Generar Constan..</button> <?php } ?>													
																			<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Editar" class="btn btn-sm btn-white" id="EditConstancPC" attrFolio="<?php echo @$row['NO_FOLIO'];?>"><i class="fa fa-pencil"></i>&nbsp; Editar</button>
																<?php }?>
															</div>
														</div>
													</div>
												</div>	
											<?php }?>
										</div>
									</div>
									<script>
										 $('#btnNewConstanc').click( function (event) {											
											event.preventDefault();	
											var visibility = 'NewConstan';
											$.ajax({
												type: "POST",
												url: "generateConstan.php",
												data: {action:'NuevaConstancia', visibility: visibility},
												success: function() {   
													location.reload();  
												}
											});
											return false;																																																																																				
										});
										$('button#EditConstancPC').click( function (event) {											
											event.preventDefault();	
											$(this).prop("disabled", true).html('Cargando <span class="loading"></span>');
											var attrFolio = $(this).attr('attrFolio');
											$.ajax({
												type: "POST",
												url: "generateConstan.php",
												data: {action:'EditConstanPC', attrFolio:attrFolio},
												success: function() {   
													location.reload();  
												}
											});
											return false;																																																																																				
										});
									</script>
									<!-- Modal de Asistencia -->
									<div id="modalListAlumn" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-body" style="margin-top">
													<div id="RequestMsg" class="text-center" style="position: absolute; z-index: 99991; margin-top: 20%; margin-left: 15%;"></div>
													<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
														<div class="sk-double-bounce1"></div>
														<div class="sk-double-bounce2"></div>
													</div>
													<div class="mail-box-header">
														<form method="get" action="index.html" class="pull-right mail-search">
															<div class="input-group">
																<input type="text" class="form-control input-sm text-capitalize" name="search" id="FilterPerson" placeholder="Buscar Persona">
																<div class="input-group-btn">
																	<button type="submit" class="btn btn-default">
																		Buscar
																	</button>
																</div>
															</div>
														</form>
														<h2> Lista de Alumnos </h2>
														<div class="mail-tools tooltip-demo m-t-md" style="margin-top:30px;">
															<div class="btn-group pull-right">																
																<button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
																<button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>
															</div>
															<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="left" title="Select All" id="select_all"><i class="fa fa-check-square-o"></i> &nbsp; All</button>
															<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> &nbsp; Actualizar</button>
														</div>
													</div>		
													<!--hr style="border-top: 2px dashed #11987d8c;"-->
													<div class="mail-box">
														<table class="footable2 table table-bordered table-hover table-mail" data-page-size="10" data-filter=#FilterPerson>
															<thead>
																<tr>
																	<th data-sort-ignore="true" class="text-center"><i class="fa fa-check"></i></th>
																	<th data-sort-ignore="true" class="text-center">NOMBRE COMPLETO</th>
																	<th data-sort-ignore="true" class="text-center">NOMBRE CURSO</th>
																	<th data-sort-ignore="true" class="text-center">ENTREGA</th>
																	<th data-sort-ignore="true" class="text-center">ARCHIVO</th>
																</tr>
															</thead>
															<tbody id="RequestList">
																<tr class="read">
																	<td class="check-mail">
																		<input type="checkbox" class="i-checks">
																	</td>
																	<td class="mail-ontact"></td>
																	<td class="mail-subject"></td>
																	<td class="text-right mail-date"></td>
																	<td class="text-right mail-date"></td>
																</tr>									
															</tbody>
															<tfoot>
																<tr>
																	<td colspan="12">
																		<ul class="pagination pull-right" style="padding-top:18px;"></ul>
																	</td>
																</tr>
															</tfoot>
														</table>
													</div>
												</div>
												<div class="modal-footer">
													<div id="RequestConstan"></div>
													<button type="submit" class="btn btn-primary btn-md" style="font-size: 15px !important;padding: 5px 7px !important;" name="btnSaveConstan" id="btnSaveConstan"><i class="fa fa-check"></i>&nbsp;Generar Constancias</button>
													<button type="button" class="btn btn-default" onclick="location.reload();"> Cerrar </button>
													<script>
														$('#select_all').click(function() {  $('.i-checks').iCheck('check'); });
														var sendFolio = '';
														$('.OpenListAlumnModal').click(function(event){
															event.preventDefault();	
															$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
															var sendFolio = $(this).attr('attrFolio');
															var attrFolio = $(this).attr('attrFolio');
															// alert(attrFolio);
															$.ajax({
																type: "POST",
																url: "generateConstan.php",
																data: {action:'ListALumns', attrFolio:attrFolio},
																success: function(exito) {   
																	$('#RequestList').html(exito);
																	$('.i-checks').iCheck({
																		checkboxClass: 'icheckbox_square-green',
																		radioClass: 'iradio_square-green',
																		increaseArea: '20%' // optional
																	});
																	$('.footable2').footable();
																	$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none");
																}
															});
															$('#modalListAlumn').modal({backdrop:'static',keyboard:false, show:true});
															$('button#btnSaveConstan').click(function(event){
																event.preventDefault();											
																$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
																$.ajax({
																	url: 'generateConstan.php',
																	type: 'POST',
																	data: {action:'GenerateConstanciasPC',sendFolio:sendFolio},
																	success: function (succes) { $('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none"); $('#RequestConstan').html(succes); }
																});	
															});
															return false;
														});
													</script>
												</div>
											</div>
										</div>
									</div>
									<!--Modal Show Documents-->
									<div id="modalShowDocuments" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content modalDialogFirma">
												<div class="modal-body">
													<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
														<div class="sk-double-bounce1"></div>
														<div class="sk-double-bounce2"></div>
													</div>
													<button type="button" class="close" id="closeModalEvidence" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
													<h2><strong>Constancias Protección Civil</strong></h2> <hr style="border-top: 2px dashed #0e826ade;">												
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
														$('.OpenFormatosModal').click(function(event){
															event.preventDefault();	
															$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
															var attrFolio = $(this).attr('attrNoFolio');
															
															$.ajax({
																url: 'generateConstan.php',
																type: 'POST',
																data: {action:'ShowConstancias',sendFolio:attrFolio},
																success: function (exito) { $('#RequestShowDocuments').html(exito); $('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none"); }
															});
															
															$('#modalShowDocuments').modal({backdrop:'static',keyboard:false, show:true});
															return false;
														});
													</script>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
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