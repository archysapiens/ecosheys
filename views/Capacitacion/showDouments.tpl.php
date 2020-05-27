<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<style>
		.modal-body.sk-loading:after {
			content: '';
			background-color: rgba(255, 255, 255, 0.7);
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: 99999;
		}
		.ibox-content.sk-loading:after { z-index: 999; }
		#btnGuardar{ margin-top: 420px !important; }
		.chosen-container { font-size: 10px; }
		span.error.text-danger {
			color: #7b0d0dc4;
			font-family: "Montserrat", sans-serif;
			font-size: 11px;
			position: absolute;
			bottom: -14px;
			right: 0;
			display: none;
		}
		</style>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">
			<?php navbar($activeMod='showDouments',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?> 
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12">
							<div class="ibox float-e-margins" id="RegistroDeServicio">
								<div class="ibox-title">
									<div class="ibox-tools">										
										<a class="collapse-link FormExtintores">
											<i class="fa fa-chevron-up"></i>
										</a>										 
									</div>
								</div>								
								<div class="ibox-content">
									<div class="sk-spinner sk-spinner-wave">
										<div class="sk-rect1"></div>
										<div class="sk-rect2"></div>
										<div class="sk-rect3"></div>
										<div class="sk-rect4"></div>
										<div class="sk-rect5"></div>
									</div>
									<div class="row">									
										<form>
											<div class="col col-md-4"><center>
												<div class="form-group">
													<div class="picture-container">
														<div class="picture btn btn-primary btn-xs image-preview-input" style="margin-top: 180px;margin-left: -56px;position: absolute;    background-color: #555;"> 
															<span class="fa fa-folder-open"></span>
															<span class="image-preview-input-title">&nbspFoto de Perfil</span>		
															<input type="file" name="file-PROFILE_PICTURE"  id="wizard-picture" class="file-PROFILE_PICTURE input-xs" accept="image/*" attr='PROFILE_PICTURE'>
														</div>
														<img src="https://image.freepik.com/free-vector/happy-businessman-making-thumbs-up-sign_1325-454.jpg" class="picture-src img-circle img-responsive" style="width: 60%;height: 190px;border:4px solid #ffffff47;box-shadow:0 0 20px 3px #d2cbcb45;"  id="wizardPicturePreview" title=""/>
													</div>
												</div>
											</div></center>
											<div class="col col-md-8">
												<div class="form-group form-group-sm">
													<div class="col-xs-5">
														<label class="control-label control-Perfil">Perfil: </label>
														<div class="control-Perfil">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-th-list"></i>
																</span>
																<select class="form-control m-b input-sm txtPerfil" name="txtPerfil" id="txtPerfil">
																	<option value="Asesor interno">Asesor interno</option>
																	<option value="Asesor externo">Asesor externo</option>														
																</select>
															</div>
														</div>
													</div>
													<div class="col-xs-7">
														<label class="control-label control-NumDC5">Número DC5:</label>
														<div class="control-NumDC5">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-sort-numeric-asc"></i>
																</span>
																<input type="text" name="txtNumeroDc5" id="txtNumeroDc5" placeholder="Escriba el número de DC5 del instructor" class="form-control txtNumeroDc5 text-uppercase">
																<span class="error text-danger"></span>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group form-group-sm" >
													<div class="col-xs-12" style="margin-top:10px;">
														<label class="control-label font-normal">Num. Protección Civil:</label>
														<div class="control-NumPCivil">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-sort-numeric-asc"></i>
																</span>
																<input type="text" name="txtNumeroPC" id="txtNumeroPC" placeholder="Escriba el número de protección civil " class="form-control txtNumeroPC text-uppercase">
																<span class="error text-danger"></span>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group form-group-sm" >
													<div class="col-xs-12" style="margin-top:10px;">
														<label class="control-label font-normal">Especialización</label>														
														<div class="control-Especiali">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa fa-th-list"></i>
																</span>
																<select name="txtEspeciali" id="txtEspeciali" data-placeholder="Especialización..." class="chosen-select txtEspeciali" multiple  tabindex="4">
																	<option value="Trabajos con Calor">Trabajos con Calor</option>
																	<option value="Trabajos de Alturas">Trabajos de Alturas</option>														
																	<option value="Lugares Confinados">Lugares Confinados</option>														
																	<option value="Bloqueo y Candadeo">Bloqueo y Candadeo</option>														
																	<option value="Trabajos Riesgosos">Trabajos Riesgosos</option>														
																	<option value="Trabajos con Electricidad">Trabajos con Electricidad</option>														
																	<option value="Operación Segura con Montacargas">Operación Segura con Montacargas</option>														
																	<option value="Atención a Emergencias">Atención a Emergencias</option>														
																	<option value="Corte y Soldadura">Corte y Soldadura</option>														
																	<option value="Concientización en Seguridad Industrial">Concientización en Seguridad Industrial</option>														
																	<option value="Identificación de Colores y Señalamientos">Identificación de Colores y Señalamientos</option>														
																	<option value="Ruido Laboral">Ruido Laboral</option>														
																	<option value="Fuego y Uso de Extintores">Fuego y Uso de Extintores</option>														
																	<option value="Manejo de productos químicos">Manejo de productos químicos</option>														
																	<option value="Impacto Ambiental">Impacto Ambiental</option>														
																	<option value="Residuos Peligrosos">Residuos Peligrosos</option>														
																	<option value="Residuos no Peligrosos">Residuos no Peligrosos</option>														
																	<option value="Reciclaje">Reciclaje</option>														
																	<option value="Planes de Manejo">Planes de Manejo</option>														
																	<option value="Implementación de las 3´R">Implementación de las 3´R</option>														
																	<option value="Equipos de Alto Desempeño">Equipos de Alto Desempeño</option>														
																	<option value="Liderazgo">Liderazgo</option>														
																	<option value="Servicio y Satisfacción al Cliente">Servicio y Satisfacción al Cliente</option>														
																	<option value="Trabajo en Equipo">Trabajo en Equipo</option>														
																	<option value="Comunicación Efectiva">Comunicación Efectiva</option>														
																	<option value="Claves para hablar en público">Claves para hablar en público</option>														
																	<option value="Ventas">Ventas</option>														
																	<option value="Formación de Brigadas">Formación de Brigadas</option>														
																	<option value="Introducción a la Protección Civil">Introducción a la Protección Civil</option>														
																	<option value="Brigada Primeros Auxilios">Brigada Primeros Auxilios</option>														
																	<option value="Brigada de Búsqueda y Rescate">Brigada de Búsqueda y Rescate</option>														
																	<option value="Brigada de Evacuación">Brigada de Evacuación</option>														
																	<option value="Brigada Hazmat – Taller de Simulacros">Brigada Hazmat – Taller de Simulacros</option>														
																	<option value="ISO9000">ISO9000</option>														
																	<option value="ISO14000">ISO14000</option>														
																	<option value="OSHAS18000">OSHAS18000</option>
																</select>
																<span class="error text-danger"></span>
															</div>
														</div>
													</div>
												</div> 
																					
											</div>
										</form>
									</div>
									<div class="row" style="margin-top:20px">	
										<form action="" id="guardar-documents" enctype="multipart/form-data">
											<div class="col col-md-12"> <hr style="border-top: 2px dashed #c1bfbf6b;"> <label class="col-md-12 text-center" style="color: #8c8e8e;font-size:22px;">Datos Probatorios</label> </div>
											<div class="col col-md-5 col-sm-offset-1"> <hr style="border-top: 2px dashed #c1bfbf6b;">
												<div class="form-group"><label >Curp:</label>
													<div class="container-curp">
														<div class="picture">
															<input type="file" name="file-CURP"  id="file-CURP" class="file-CURP file input-xs" data-show-preview="true" accept="" attr='CURP' required>
														</div>															
													</div>
												</div>
												<div class="form-group"><label>Identificación oficial:</label>
													<div class="container-ife">
														<div class="picture">
															<input type="file" name="file-IFE"  id="file-IFE" class="file-IFE file" data-show-preview="true" accept="" attr='IFE' >
														</div>
													</div>
												</div>
												<div class="form-group"><label>Curriculum Vitae:</label>
													<div class="container-cv">
														<div class="picture">
															<input type="file" name="file-CV"  id="file-CV" class="file-CV file" data-show-preview="true" accept="" attr='CV' >
														</div>
													</div>
												</div>
												<div class="form-group"><label>Comprobante de domicilio:</label>
													<div class="container-cd">
														<div class="picture">
															<input type="file" name="file-COMPR_DOMI"  id="file-COMPR_DOMI" class="file-COMPR_DOMI file" data-show-preview="true" accept="" attr='COMPR_DOMI' >
														</div>
													</div>
												</div>
												<div class="form-group" ><label>Comprobante laboral:</label>
													<div class="container-cl">
														<div class="picture">
															<input type="file" name="file-COMPR_LAB"  id="file-COMPR_LAB" class="file-COMPR_LAB file" data-show-preview="true" accept="" attr='COMPR_LAB' >
														</div>
													</div>
												</div>
											</div>
											<div class="col col-lg-6">	<hr style="border-top: 2px dashed #c1bfbf6b;">
												<div class="form-group"><label >DC3:</label>
													<div class="container-dc3">
														<div class="picture">
															<input type="file" name="file-DC3"  id="file-DC3" class="file-DC3 file" data-show-preview="true" accept="" attr='DC3' >
														</div>
													</div>
												</div>
												<div class="form-group"><label>DC5:</label>
													<div class="container-dc5">
														<div class="picture">
															<input type="file" name="file-DC5"  id="file-DC5" class="file-DC5 file" data-show-preview="true" accept="" attr='DC5' >
														</div>
														
													</div>
												</div>
												<div class="form-group"><label>Titulo o Cédula de licenciatura:</label>
													<div class="container-tcl">
														<div class="picture">
															<input type="file" name="file-CED_PROF"  id="file-CED_PROF" class="file-CED_PROF file" data-show-preview="true"  attr='CED_PROF'>
														</div>
													</div>
												</div>
												<div class="form-group"><label>Diplomas y/o Certificaciones:</label>
													<div class="container-dc">
														<div class="picture">
															<input type="file" name="file-DIPLOMA"  id="file-DIPLOMA" class="file-DIPLOMA file" data-show-preview="true" accept="" attr='DIPLOMA' >
														</div>
													</div>
												</div>
												<div class="form-group"><label>Cédula Fiscal (RFC):</label>
													<div class="container-rfc">
														<div class="picture">
															<input type="file" name="file-RFC"  id="file-RFC" class="file-RFC file" data-show-preview="true" value="30000" accept="" attr='RFC' >
														</div>
													</div>
												</div>																								
											</div>
											</br></br></br></br></br></br>
											<button type="button" class="ladda-button btn btn-primary btn-block pull-right" data-style="expand-right" name="btnSaveInstruc" id="btnSaveInstruc" style="margin-top:30px;"> <span class="fa fa-send"></span> &nbsp; Guardar</button>
										</form>
									</div>
								</div>
								<script>
									$(function(){  
										
										if('<?php echo $editInstruct[0]['PERFIL']; ?>'!=''){ $('#txtPerfil').val("<?php echo $editInstruct[0]['PERFIL']; ?>").change(); }
										$('#txtNumeroDc5').val("<?php echo $editInstruct[0]['NUM_DC5']; ?>");
										$('#txtNumeroPC').val("<?php echo $editInstruct[0]['NUM_PC']; ?>");
										var arrayTxtListCursos = $.trim("<?php echo $editInstruct[0]['ESPECIALIZACION']; ?>").split(',');	$("#txtEspeciali").val(arrayTxtListCursos).change();
										$("#txtEspeciali").trigger("chosen:updated");
										if('<?php echo $editInstruct[0]['RUTA_PROFILE_PICTURE']; ?>'!=''){ $('#wizardPicturePreview').attr('src','<?php echo $sufijo.$editInstruct[0]['RUTA_PROFILE_PICTURE']; ?>'); }
										
										
										
										
										// if('<?php echo $editInstruct[0]['RUTA_CURP']; ?>'!=''){ $('#file-CURP').prop('disabled',true); $('.container-curp').addClass('hidden'); }
										// if('<?php echo $editInstruct[0]['RUTA_IFE']; ?>'!=''){ $('#file-IFE').prop('disabled',true); $('.container-ife').addClass('hidden'); }
										// if('<?php echo $editInstruct[0]['RUTA_CV']; ?>'!=''){ $('#file-CV').prop('disabled',true); $('.container-cv').addClass('hidden'); }
										// if('<?php echo $editInstruct[0]['RUTA_COMPR_DOMI']; ?>'!=''){ $('#file-COMPR_DOMI').prop('disabled',true); $('.container-cd').addClass('hidden'); }
										// if('<?php echo $editInstruct[0]['RUTA_COMPR_LAB']; ?>'!=''){ $('#file-COMPR_LAB').prop('disabled',true); $('.container-cl').addClass('hidden'); }
										// if('<?php echo $editInstruct[0]['RUTA_DC3']; ?>'!=''){ $('#file-DC3').prop('disabled',true); $('.container-dc3').addClass('hidden'); }
										// if('<?php echo $editInstruct[0]['RUTA_DC5']; ?>'!=''){ $('#file-DC5').prop('disabled',true); $('.container-dc5').addClass('hidden'); }
										// if('<?php echo $editInstruct[0]['RUTA_CED_PROF']; ?>'!=''){ $('#file-CED_PROF').prop('disabled',true); $('.container-tcl').addClass('hidden'); }
										// if('<?php echo $editInstruct[0]['RUTA_DIPLOMA']; ?>'!=''){ $('#file-DIPLOMA').prop('disabled',true); $('.container-dc').addClass('hidden'); }
										// if('<?php echo $editInstruct[0]['RUTA_RFC']; ?>'!=''){ $('#file-RFC').prop('disabled',true); $('.container-rfc').addClass('hidden'); }

									});
								</script>
								<script>  var numberDC5 = true, numberPC = true, listCursos = true;
									$('.file-PROFILE_PICTURE, .file-IMAGEN, .file-CURP, .file-COMPR_LAB, .file-COMPR_DOMI, .file-CV, .file-IFE, .file-DC3, .file-DC5, .file-DIPLOMA, .file-CED_PROF, .file-RFC').change(function(){
										// previewURL(this);............................
										var typeDocument = $(this).attr('attr');
										if($(this).val()!='') {
										  $('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
										  // alert(typeDocument);
										  var formData = new FormData();
										  formData.append('file', $(this)[0].files[0]);
										  formData.append('sendTypeDocument',typeDocument);
											$.ajax({
												url: 'showDouments.php',
												type: 'POST',
												enctype: 'multipart/form-data',
												data: formData,
												success: function (r) {
													$('.result-Ajax').html(r);
													$('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
													if(r.success){  }
												},
												cache: false,
												contentType: false,
												processData: false
											});
										}
									});
									/***** Start Save Datos Instructor ***/
									$('#btnSaveInstruc').click( function (event){
										event.preventDefault()
										$(this).prop('disabled',true);								
										var perfil = $('#txtPerfil').val();
										var numDc5 = $('#txtNumeroDc5').val();
										var numeroPC = $('#txtNumeroPC').val();
										var listEspeciali = $('#txtEspeciali').val();
										
										if($('#txtNumeroDc5').val().length === 0) {
											$('#txtNumeroDc5').siblings('span.error').text('Por favor llenar este campo').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
											numberDC5 = false; } else {
											$('#txtNumeroDc5').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
											numberDC5 = true; }
										
										if($('#txtNumeroPC').val().length === 0) {
											$('#txtNumeroPC').siblings('span.error').text('Por favor llenar este campo').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
											numberPC = false; } else {
											$('#txtNumeroPC').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
											numberPC = true; }
										
										if($("select[id$=txtEspeciali] option:selected").text().length == 0) {
											$('#txtEspeciali').siblings('span.error').text('Seleccione al menos uno').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
											listCursos = false; } else {
											$('#txtEspeciali').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
											listCursos = true; }
										
										if(numberDC5 == false || numberPC == false || listCursos == false){ $('#btnSaveInstruc').prop('disabled',false); toastr.error('','Llenar Todos los campos'); console.log('Completar Todos los cammpos'); }else{
											$('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
											$.post('showDouments.php' , {formSaveDatosInstruct:'formSaveDatosInstruct',perfil:perfil,numDc5:numDc5,numeroPC:numeroPC,listEspeciali:listEspeciali},
											function ( exito ){	
												var varResult = exito.split("#"); 
												if(varResult[0]=="1"){ 
													if('<?php echo $editInstruct[0]['VALID']; ?>'==''){ $('#CanvasFirma').modal({backdrop:'static',keyboard:false, show:true});	 }
													setTimeout(function() {
														$('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
														$('#btnSaveInstruc').prop('disabled',false);
														toastr.options = { closeButton: true, progressBar: true, positionClass: 'toast-top-center', showMethod: 'slideDown', timeOut: 5000 };
														toastr.success('','DATOS GUARDADOS CORRECTAMENTE');
													},2000);
												}else{ alert('No se pudo realizar la operación'); }
											});	
										}
										
									});
									/***** End Save Datos Instructor ***/
								</script>
								<div class="modal fade" id="CanvasFirma" tabindex="-1" role="dialog" aria-labelledby="grafica" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content modalDialogFirma">	
											<div  style="padding-bottom: 3px;">
												
												<ul class="nav nav-tabs" role="tablist">
													<li role="presentation" id="SecondTab" class="active"><a href="#canvasTab" aria-controls="canvasTab" role="tab" data-toggle="tab">Firma Instrcutor</a></li>															
												</ul>
											</div>											
											<div class="modal-body ">
												<div class="tab-content">															
													
													<div role="tabpanel" class="tab-pane active" id="canvasTab">
														<canvas id="canvas">Su navegador no soporta Firma Electronica :( </canvas>
													</div>
												</div>														
											</div>
											<div class="modal-footer" style="margin-top:-5px;">
												<field>															
													<a id="download" class="btn btn-primary btn-md active " role="button">Guardar Firma</a>
													<button type="button" id="limpiar" class="btn btn-default  btn-md active ">Limpiar</button>
												</field>
											</div>
										</div><div id="GeneratePdf" class="hidden"></div>
										<!--Guardar imagen en .PNG-->
										<script>
											$('#download').click(function(event){
												event.preventDefault();
												var request = downloadCanvas(this, 'canvas', '<?php echo $_SESSION['sesionNomUser']; ?>','<?php echo $_SESSION['sesionSucur']; ?>',<?php echo $_COOKIE['id']; ?>);	
												if(request==true){ $('#CanvasFirma').modal('hide'); setTimeout(function() { location.reload(); },2000); }
											});
											function downloadCanvas(link, canvasId, filename, sucursal, idInstructor) {
												dataHref = document.getElementById(canvasId).toDataURL();
												if(Trazados!=''){										
													var params = 'dataHref='+dataHref+'&dataFilename='+filename+'&sucursal='+sucursal+'&idInstructor='+idInstructor;
													var xhr = new XMLHttpRequest();
													xhr.onreadystatechange = function() {
													  if (xhr.readyState == 4) {  }
													}
													xhr.open('POST','../../repositorio/loadCapacitacion/canvasFirma.php',true);
													xhr.setRequestHeader('Content-Type', 'application/upload');
													xhr.send(params);
																										
													return true;
												}else{
													alert('No hay Firma'); Trazados=[];
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