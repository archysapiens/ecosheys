<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
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
				z-index: 999;
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
		</style>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">

			<?php// navbar($activeDesk='',$activeAdmin='',$activeFumi='',$activeExtin='',$activeCourse='',$activeInscrip='active',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='NewInscrip',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				<style>
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
					#iboxPago { padding: 15px 5px 5px 5px; }
					.nav-tabs {  border-bottom: 1px dashed #149e82; }
					.input-group-addon:first-child { color: cadetblue; }
					span.error.text-danger {
						color: #7b0d0dc4;
						font-family: "Montserrat", sans-serif;
						font-size: 11px;
						position: absolute;
						bottom: -14px;
						right: 0;
						display: none;
					}
					.small, small { font-size: 70%; }
				</style>
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12 col-md-12">
							<div class="ibox float-e-margins" id="RegistroDeServicio">
								<div class="ibox-title">
									<h5  style="color:black">Incripción</h5>
									<div class="ibox-tools">
									<?php if($visibility != 'NewInscripNow'){ ?><small> <span style="padding-right:3%;"><i class="fa fa-circle" style="color: rgb(193, 50, 27);"></i>&nbsp; Falta Evidencia</span> <span style="padding-right:3%;"><i class="fa fa-circle" style="color: #f0ad4e;"></i>&nbsp; Validando Evidencia</span> <span style="padding-right:25%;"><i class="fa fa-circle" style="color: rgb(25, 170, 141);"></i>&nbsp; Incripción Correcta</span> </small> <?php } ?>
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
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>										 
									</div>
								</div>
								<?php if($visibility == 'NewInscripNow'){ ?>
								<?php // var_dump($editInscription); ?>
									<div class="ibox-content text-center">
										<div class="sk-spinner sk-spinner-wave">
											<div class="sk-rect1"></div>
											<div class="sk-rect2"></div>
											<div class="sk-rect3"></div>
											<div class="sk-rect4"></div>
											<div class="sk-rect5"></div>
										</div>
										<div class="row" style="margin-top:10px;">	
											<h4 style="color:#11987d;">DATOS DEL TRABAJADOR</h4></br>
											<form method="post" id="formUploadExcel" class="form form-horizontal" enctype="multipart/form-data" role="form">
												<div class="col col-lg-6 col-md-6">
													<div class="form-group form-group-sm control-noFolio"><label class="col-lg-4 col-md-4 control-label">N° Referencia:</label>
														<div class="col-sm-8">
															<input type="text" id="txtnoFolio" name="txtnoFolio" class="form-control txtnoFolio" aria-describedby="helpBlock" disabled>
														</div>
													</div>
												</div>
												<div class="col col-lg-5 col-md-5">												
													<div class="fileinput fileinput-new input-group form-group-sm " data-provides="fileinput">
														<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
														<span class="input-group-addon btn btn-default btn-file" id="btn-span-file"><span class="fileinput-new"><i class="fa fa-upload"> </i> Importar Excel</span><span class="fileinput-exists">Cambiar</span><input type="file" name="file" id="file" class="ephoto-upload" accept=".xlsx"></span>
														<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Limpiar</a>
													</div>												
												</div>	
												<div class="col col-lg-12 col-md-12" >
													
												</div>
											</form>
											<form class="form-horizontal" name="frm_Capacitacion" id="frm_Capacitacion">
												<div class="col col-lg-12 col-md-12" >
													<div class="col col-lg-5 col-md-5 col-md-offset-1">
														<div class="form-group form-group-sm"><label class="col-lg-2 col-md-2 control-label">Fecha:</label>
															<div class="col-sm-10">
																<input type="date" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" class="form-control txtfecha" required>
																<input type="text" id="txtSucu" name="txtSucu" value="<?=@$_SESSION['sesionSucur']?>" class="form-control txtSucu hidden" disabled>
																<input type="text" id="txtRutaExcel" name="txtRutaExcel" value="" class="form-control txtRutaExcel hidden" disabled>
															</div>
														</div>
													</div>	
													<div class="col col-lg-5 col-md-5">
														<div class="form-group form-group-sm"><label class="col-lg-3 col-md-3 control-label">Puesto:</label>
															<div class="col-sm-9">
																<input type="text" id="txtPuesto" name="txtPuesto" class="form-control txtPuesto text-capitalize" disabled>
															</div>
														</div>
													</div>												
												</div>
												<div class="col col-lg-12 col-md-12" >												
													<div class="col col-lg-5 col-md-5 col-md-offset-1" style="text-align:center;vertical-align:middle">
														<div class="form-group form-group-sm"><label class="col-lg-2 col-md-2 control-label">Curso:</label>
															<div class="col-sm-10">
																<select class="form-control m-b txtNameCurso" id="txtNameCurso" name="txtNameCurso">  
																	<?php while($row = $SelectCourse->fetch_assoc()) {
																		echo "<option value='".$row['NAME']."'>".$row['NAME']."</option>";
																	}?>																		
																</select>															
															</div>
														</div>
													</div>	
													<div class="col col-lg-5 col-md-5">
														<div class="form-group form-group-sm"><label class="col-lg-3 col-md-3 control-label">Incripción:</label>
															<div class="col-sm-9">
																<select class="form-control m-b txtInscrip" id="txtInscrip" name="txtInscrip">
																	<option value="Individual">Individual</option>
																	<option value="Grupo">Grupo</option>														
																</select>
															</div>
														</div>
													</div>	
												</div>	
												<div class="col col-lg-12 col-md-12" style="margin-bottom:10px;"><h4 style="color:#11987d">DATOS DE LA EMPRESA</h4> </div>
												<div class="col col-lg-5 col-md-5 col-md-offset-1" style="text-align:center;vertical-align:middle">
													<div class="form-group form-group-sm control-reprentLeg"><label class="col-lg-4 col-md-4 control-label">RepresentanteLegal:</label>
														<div class="col-sm-8">
															<input type="text" id="txtRepresentLega" name="txtRepresentLega" class="form-control txtRepresentLega text-capitalize" placeholder="Representante Legal" required disabled>															
														</div>
													</div>
												</div>	
												<div class="col col-lg-5 col-md-5">
													<div class="form-group form-group-sm control-reprentTra"><label class="col-lg-3 col-md-3 control-label">RepresentanteT:</label>
														<div class="col-sm-9">
															<input type="text" id="txtRepresentTra" name="txtRepresentTra" class="form-control txtRepresentTra text-capitalize" placeholder="Representante de los Trabajadores" required disabled>
														</div>
													</div>
												</div>
												<div class="col col-lg-5 col-md-5 col-md-offset-1" style="text-align:center;vertical-align:middle">
													<div class="form-group form-group-sm control-razonSoci"><label class="col-lg-4 col-md-4 control-label">Razón Social:</label>
														<div class="col-sm-8">
															<input type="text" id="txtNomRazonSoci" name="txtNomRazonSoci" class="form-control txtNomRazonSoci text-uppercase" required>															
														</div>
													</div>
												</div>	
												<div class="col col-lg-5 col-md-5">
													<div class="form-group form-group-sm control-rfc"><label class="col-lg-2 col-md-2 control-label">RFC:</label>
														<div class="col-sm-10">
															<input type="text" id="txtRFC" name="txtRFC" class="form-control txtRFC text-uppercase" required>
														</div>
													</div>
												</div>
												<div class="col col-lg-12 col-md-12"> <p class="text-danger"><small>Nota:  Razón Social( En caso de persona Física, anotar apellido paterno, apellido materno y nombre(s))</small></p></div>
											</form>
										</div>	
										<div class="panele" style="margin-top:10px;">
											<div class="panele-body">
												<table id="table_list_1"></table>
												<div id="pager_list_1"></div>
											</div>
										</div>								
										<br><br><br><br>
										<button type="button" class="ladda-button btn btn-primary btn-block pull-right" data-style="expand-right" id="btnGuardarCap" style="margin-top:-30px;"> <span class="fa fa-send"></span> &nbsp; Guardar</button>
										<div class="result-Ajax hidden"></div>	
									</div>
									<div class="modal fade" id="modalCotizar" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content animated flipInY">												
												<form class="form-horizontal" name="frm_Cotizacion" action="#" method="post" id="frm_Cotizacion">
												<div class="modal-body">
													<button type="button" class="close" id="closeModalEvidence" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
													<h3><strong>Datos para Cotizar</strong></h3> <hr style="border-top: 2px dashed #11987dde;">
													<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:18%;margin-left: 45%;z-index: 99999;position: absolute;">
														<div class="sk-double-bounce1"></div>
														<div class="sk-double-bounce2"></div>
													</div>
													<div class="row">					
														<div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1">					
															<div class="form-group form-group-sm"><label class="col-lg-2 col-md-2 col-sm-2 control-label">Nombre:</label>
																<div class="col-lg-10 col-md-10 col-sm-10">
																	<div class="input-group">
																		<span class="input-group-addon">
																			<i class="fa fa-user"></i>
																		</span>
																		<input type="text" name="txtNombreFull" id="txtNombreFull" placeholder="Nombre Completo" value="<?=trim($_SESSION['sesionNomUser']);?>" class="form-control txtNombreFull text-capitalize" required autofocus>
																		<input type="text" id="txtsendNoFolio" name="txtsendNoFolio" class="form-control txtsendNoFolio hidden">
																	</div>
																</div>
															</div>
															<div class="form-group form-group-sm"><label class="col-lg-2 col-md-2 col-sm-2 control-label">Email:</label>
																<div class="col-lg-10 col-md-10 col-sm-10">
																	<div class="input-group">
																		<span class="input-group-addon">
																			<i class="fa fa-at"></i>
																		</span>
																		<input type="email" name="txtEmail" id="txtEmail" placeholder="Correo Electronico" value="<?=$_SESSION['sesionUsuario'];?>" class="form-control txtEmail" required>
																	</div>
																</div>
															</div>
															<div class="form-group form-group-sm"><label class="col-lg-2 col-md-2 col-sm-2 control-label">Teléfono:</label>
																<div class="col-lg-10 col-md-10 col-sm-10">
																	<div class="input-group">
																		<span class="input-group-addon">
																			<i class="fa fa-phone"></i>
																		</span>
																		<input type="tel" name="txtPhone" id="txtPhone" placeholder="Numero de Telefono" class="form-control txtPhone" required>
																	</div>
																</div>
															</div>
															<div class="form-group form-group-sm"><label class="col-lg-2 col-md-2 col-sm-2 control-label">Lugar:</label>
																<div class="col-lg-10 col-md-10 col-sm-10">
																	<div class="input-group">
																		<span class="input-group-addon">
																			<i class="fa fa-map-marker"></i>
																		</span>
																		<input type="text" name="txtPlace" id="txtPlace" placeholder="Lugar donde sera el curso" class="form-control txtPlace text-capitalize">
																		<input type="text" name="txtCurso" id="txtCurso" class="form-control txtCurso hidden">
																	</div>
																</div>
															</div>
																				
															<div class="form-group form-group-sm hidden"><label class="col-lg-2 col-md-2 col-sm-2 control-label">Personas:</label>
																<div class="col-lg-10 col-md-10 col-sm-10">
																	<div class="input-group">
																		<span class="input-group-addon">
																			<i class="fa fa-users"></i>
																		</span>
																		<input type="number" name="txtNumPerson" id="txtNumPerson" placeholder="Numero de personas" class="form-control txtNumPerson">
																	</div>
																</div>
															</div>																																		
															<div class="form-group form-group-sm"><label class="col-lg-2 col-md-2 col-sm-2 control-label">Nivel:</label>
																<div class="col-sm-10">
																	<div class="input-group">
																		<span class="input-group-addon">
																			<i class="fa fa-university"></i>
																		</span>
																		<select id="txtNivel" name="txtNivel" class="form-control m-b txtNivel input-sm">
																			<option>Basico</option>
																			<option>Medio</option>
																			<option>Alto</option>
																		</select>
																	</div>
																</div>
															</div>						
															<div class="form-group form-group-sm"><label class="col-sm-4 control-label">Requiere Manuales:</label>
																<div class="col-sm-8">	
																	<div class="radio radio-success radio-inline">
																		<input type="radio" id="inlineRadio1" value="si" name="txtManuales" checked="">
																		<label for="inlineRadio1">Si </label>
																	</div>
																	<div class="radio radio-inline">
																		<input type="radio" id="inlineRadio2" value="no" name="txtManuales">
																		<label for="inlineRadio2">No </label>
																	</div>																							
																</div>
															</div>
															<button type="submit" class="btn btn-primary btn-block btn-md" style="font-size: 15px !important;padding: 5px 7px !important;font-weight: 390 !important;margin-top:30px;" name="btnCotizar" id="btnCotizar"> Cotizar </button>
														</div>                                          
													</div>                                          
												</div>
												<div class="modal-footer" style="align:center">
													<div class="returnAjax" id="returnAjax"></div>
													<script>
													// Geolocalización
													$(function(){
														$("#txtPlace").geocomplete()
														  .bind("geocode:result", function(event, result){ })
														  .bind("geocode:error", function(event, status){ })
														  .bind("geocode:multiple", function(event, results){ });
													  });
														// Form submit
														$('#frm_Cotizacion').submit(function (event) {
															event.preventDefault();	
																// alert('cotizacion');
																$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
																$('#btnCotizar').prop("disabled", true);									
																$.post("newInscrip.php", $(this).serialize()+'&TypeForm=NewQuotation', function(data){
																	
																  }).done(function(data) {
																	$('#returnAjax').html(data);
																	setTimeout(function() {
																		toastr.options = {
																			closeButton: true,
																			progressBar: true,
																			showMethod: 'slideDown',
																			timeOut: 6000
																		};
																		toastr.success('Pronto recibirá una respuesta', '¡Inscripción Correcta!');
																		 $('.sk-spinner-double-bounce').css("display","none");
																		$('#btnCotizar').prop("disabled", false);
																		// $('#modalCotizar').modal('hide');
																		setTimeout(function() { $('#modalCotizar').modal('hide'); location.reload(); }, 4500);
																	}, 2300);

																	$("#frm_Cotizacion")[0].reset();
																	// location.reload();
																	
																  })
																  .fail(function() {
																	alert( "Ocurrio un error" );
																  })		
														});
													</script>
												</div>
												</form>
											</div>
										</div>
									</div>
									
									<script> 
										$(document).ready(function () {
											$("#txtNameCurso").change(function() {
											  var valCourseSelect = $('#txtNameCurso option:selected').val();
												$.ajax({
													type: "POST",
													url: "newInscrip.php",
													data: {action:'SearchCosto', valCourseSelect:valCourseSelect},
													success: function(exito) {  $('#GeneratePdf').html(exito); }
												});
												return false;
											});
											$("#txtRFC").keyup(function() {
												if($.trim($(this).val()).length == 13){ $('.txtRepresentLega, .txtRepresentTra').prop( "disabled", false ); }else{ $('.txtRepresentLega, .txtRepresentTra').prop( "disabled", true ); } 
												return false;
											});
											if('<?=$editInscription;?>'==''){
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
											
											cadena = 'CP'+cadenaSucur+''+yyyy+''+mm+''+dd+'-'+strIdClient+'-'+time;
											$("#txtnoFolio").val(cadena);}else{
												$('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
												$("#txtfecha").val($.trim('<?=$editInscription[0]['FECHA_CAPACITACION'];?>')).prop("disabled", true);
												$("#txtPuesto").val($.trim('<?=$editInscription[0]['PUESTO_TRA'];?>'));
												$("#txtRepresentTra").val($.trim('<?=$editInscription[0]['REPRESENT_TRABA'];?>'));
												$("#txtRepresentLega").val($.trim('<?=$editInscription[0]['REPRESENT_LEGAL'];?>'));
												$("#txtNomRazonSoci").val($.trim('<?=$editInscription[0]['RAZON_SOCIAL_EMP'];?>'));
												$("#txtRFC").val($.trim('<?=$editInscription[0]['SHCP_EMP'];?>'));
												$("#txtRutaExcel").val($.trim('<?=$editInscription[0]['RUTA_UPLOAD_EXCEL'];?>'));
												$("#txtNameCurso").val('<?=$editInscription[0]['NAME_CURSO'];?>').change().prop("disabled", true);
												$("#txtInscrip").val($.trim('<?=$editInscription[0]['TYPE_SERVICE'];?>')).change().prop("disabled", true);
												$("#file").prop("disabled", true); $("#btn-span-file").addClass("active");
												
												$("#txtnoFolio").val($.trim('<?=$editInscription[0]['NO_FOLIO'];?>'));
																								
												
												setTimeout(function() {
													toastr.options = {
														closeButton: true,
														progressBar: true,
														positionClass: 'toast-bottom-right',
														showMethod: 'slideDown',
														timeOut: 4000
													};
													JqGridUrlKeyUp = '../../repositorio/DataJson/DataCapacitacion/listarJsonBlank.php?rutaJson='+'<?=$editInscription[0]['RUTA_JSON'];?>';
													$('#table_list_1').setGridParam({ url: JqGridUrlKeyUp , editurl: 'newInscrip.php', datatype: "json", rowNum: '<?=$editInscription[0]['COUNT'];?>' }).trigger('reloadGrid');
													$('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
												},1500);
											}
										});									
										$(document).ready(function () {										
											// Configuration for jqGrid Example 1
											var sizeWidthJqGrid = $('.tabs-container').width(); var validJqgridCurp = true;
											$("#table_list_1").jqGrid({
												url: '../../repositorio/DataJson/DataCapacitacion/listarJsonBlank.php?nomJson=dataReport&carpetJson=NewInscrip',
												editurl: 'newInscrip.php',
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
														label: 'Empresa',
														name: 'company',
														width: 180,
														sortable: false,
														required: true,
														editable: true 
													},
													{
														label: 'CURP',
														name: 'curp',
														width: 200,
														sortable: false,
														required: true,
														editable: true,
														editoptions:{
															dataInit: function(element) {
																$(element).addClass('text-uppercase');
																$(element).keyup(function(){
																	var dataCurp = element.value;
																	if(dataCurp.match(/^([a-z]{4})([0-9]{6})([a-z]{6})([0-9]{2})$/i)){  validJqgridCurp = true;
																		}else{ validJqgridCurp = false; }
																})
															} }
													},
													{
														label: 'Puesto',
														name: 'puesto',
														width: 150,
														sortable: false,
														required: true,
														editable: true 
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
													$("#"+lastSelection+" td:nth-child(2), #"+lastSelection+" td:nth-child(3)").addClass('text-capitalize');
													$("#"+lastSelection+" td:nth-child(4)").addClass('text-uppercase');
													if($('#'+lastSelection+'_curp')!=''){
														if(validJqgridCurp==true){ grid.jqGrid('saveRow',lastSelection); }else{ grid.jqGrid('restoreRow',lastSelection); alert('CURP inválido!'); }
													}
													grid.jqGrid('editRow',id, {keys: true} );
													lastSelection = id;												
													$('#'+id+'_Ubicacion').blur(function(event){											
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
										/***** Start Upload Excel ***/
											$('.ephoto-upload').change(function(){
												// previewURL(this);
												if($(this).val()!='') {
												  $('#RegistroDeServicio').children('.ibox-content').toggleClass('sk-loading');
												  var formData = new FormData();
												  formData.append('file', $(this)[0].files[0]);
													$.ajax({
														url: 'newInscrip.php',
														type: 'POST',
														enctype: 'multipart/form-data',
														data: formData,
														success: function (r) {
															$('.result-Ajax').html(r);
															if(r.success) {
																//success work 
															  }
														},
														cache: false,
														contentType: false,
														processData: false
													});
												}
											});
										/***** End Upload Excel ***/
										$('#btnGuardarCap').click( function (event) {											
											event.preventDefault();	

											//Guardar Tabla Jqgrid
												var idJqgridE = jQuery("#table_list_1").jqGrid('getGridParam','selrow');
													if(idJqgridE){ var retJqgrid = jQuery("#table_list_1").jqGrid('saveRow',idJqgridE); } else { }
											
											var formCreatedNewCapaci = 'formCreatedNewCapaci';
											var noFolio = $( '.txtnoFolio' ).val(),
											validForm = true,
											nameCurso = $( '.txtNameCurso' ).val(),
											puesto = $( '.txtPuesto' ).val(),
											reprentLega = $( '.txtRepresentLega' ).val(),
											reprentTrab = $( '.txtRepresentTra' ).val(),
											razonSocial = $( '.txtNomRazonSoci' ).val(),
											rfcEmpresa = $( '.txtRFC' ).val(),
											inscrip = $( '.txtInscrip' ).val(),
											sucursal = $( '.txtSucu' ).val(),
											fecha_service = $( '.txtfecha' ).val(),										
											nameUploadExcel = $( '.txtRutaExcel' ).val(),										
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
											$('.control-razonSoci').removeClass('has-error has-feedback'); $('.control-rfc').removeClass('has-error has-feedback');
											if ($(".txtnoFolio").val() == "" ){ setTimeout(function() { toastr.error('','Fallo al Generar N° Folio'); },2200);
												$('.control-noFolio').addClass('has-error has-feedback'); validForm=false; }
											if ($.trim($(".txtNomRazonSoci").val()) == "" ){ setTimeout(function() { toastr.error('','Llenar Campo Razón Social'); },2200);
												$('.control-razonSoci').addClass('has-error has-feedback'); validForm=false; }
											// if ($.trim($(".txtRepresentTra").val()) == "" ){ $('.control-reprentTra').addClass('has-error has-feedback'); validForm=false; }
											// if ($.trim($(".txtRepresentLega").val()) == "" ){ $('.control-reprentLeg').addClass('has-error has-feedback'); validForm=false; }
											//RFC
											if ($.trim($(".txtRFC").val()).length === 0) { setTimeout(function() { toastr.error('','Llenar Campo RFC'); },2200);
												$('.control-rfc').addClass('has-error has-feedback'); validForm=false; 
											}else if($.trim($(".txtRFC").val()).length > 11 && $.trim($(".txtRFC").val()).length <= 13){ console.log($.trim($(".txtRFC").val()).length);
											}else{
												setTimeout(function() { toastr.error('','Campo RFC Incorrecto'); },2200);
												$('.control-rfc').addClass('has-error has-feedback'); validForm=false; }
											
											/* Si la validación del formulario es correcto se guarda la información */
											if(validForm==true){
											
													/* Recorrer tabla de Agentes Extintores */
													var banderaNextStep = false,
														CamposGrid = [];
													var id_object = 0; var numPerson = 0;
													var noRA, nameRA, companyRA, curpRA, puestoRA, empresa;
													$("#table_list_1 tbody tr").each(function (index){																									
														$(this).children("td").each(function (index2){
															switch (index2){
																case 0: noRA = $.trim($(this).text()); break;
																case 1: nameRA = $.trim($(this).text()); break;
																case 2: companyRA = $.trim($(this).text()); break;
																case 3: curpRA = $.trim($(this).text().toUpperCase()); break;													
																case 4: puestoRA = $.trim($(this).text().toUpperCase()); break;													
															}
															// $(this).css("background-color", "#ECF8E0");																								
														});	
														if(curpRA!=''){ empresa=companyRA; numPerson++; }
														if(id_object!=0){												
															$.post( 'newInscrip.php' , { formCreatedNewCapaci:formCreatedNewCapaci,noFolio:noFolio,typeRegistro:'Registro',fecha_service:fecha_service, id_object:id_object,nameRA:nameRA,companyRA:companyRA,curpRA:curpRA,puestoRA:puestoRA,responsable:responsable,nameUploadExcel:nameUploadExcel,noCliente:noCliente,rutaJson:'../../repositorio/DataJson/DataCapacitacion/NewInscrip/'+sucursal+'/'+noFolio+'.json'} );														
															banderaNextStep = true;
															CamposGrid.push(id_object,nameRA,companyRA,curpRA,puestoRA);
														} id_object++;
													});											
													$(".next-step").prop("disabled", true); 
													$("#btnCotizar").prop("disabled", true);												
													$.post( 'newInscrip.php' , { formCreatedNewCapaci:formCreatedNewCapaci,noFolio:noFolio,typeRegistro:'General',fecha_service:fecha_service, nameCurso:nameCurso,puesto:puesto,razonSocial:razonSocial,rfcEmpresa:rfcEmpresa,companyRA:empresa,inscrip:inscrip,nameUploadExcel:nameUploadExcel,responsable:responsable,reprentTrab:reprentTrab,reprentLega:reprentLega,noCliente:noCliente,rutaJson:'../../repositorio/DataJson/DataCapacitacion/NewInscrip/'+sucursal+'/'+noFolio+'.json'},
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
																$(".next-step").prop("disabled", false); 
																$("#btnCotizar").prop("disabled", false); 
															},1200);
														}												
													}); 
													
													$.post( 'newInscrip.php' , { GererateJsonCP : 'GererateJsonCP', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal, noFolio:noFolio } );											
													
													//Datos modal cotizar
													$('#modalCotizar').modal({backdrop:'static',keyboard:false, show:true});
													$('#txtNumPerson').val(numPerson);
													$('#txtsendNoFolio').val(noFolio);
													$('#txtCurso').val(nameCurso);
													//end 
													// $('#coutPerson').text(numPerson);
													// $('#costPerson').text(numPerson*$('#txtCostoCurso').val());
													// $('#costPersonTotal').text(numPerson*$('#txtCostoCurso').val());
											}
											return false;																																																																																				
										});
									</script>
								<?php }else{ ?>
									<!-- start modal tipo de pago -->
									<div class="modal fade" id="MethodPay" tabindex="-1" role="dialog" aria-labelledby="pago" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content modalDialogFirma">												
												<div class="modal-body">
													<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
														<div class="sk-double-bounce1"></div>
														<div class="sk-double-bounce2"></div>
													</div>
													<div  style="padding-bottom: 3px;">
														<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" data-dismiss="modal" onclick="location.reload();">&times;</button>													
													</div>
													<div class="row">
														<section>
															<div class="wizard">
																<div class="wizard-inner hidden">
																	<div class="connecting-line" ></div>
																	<ul class="nav nav-tabs" role="tablist" >
																		<li role="presentation" class="active" style="margin-left:150px">
																			<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Forma de pago">
																				<span class="round-tab"> <i class="glyphicon glyphicon-folder-open"></i> </span>
																			</a>
																		</li>
																		<li role="presentation" class="disabled">
																			<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Información adicional">
																				<span class="round-tab"> <i class="glyphicon glyphicon-pencil"></i> </span>
																			</a>
																		</li>
																		<li role="presentation" class="disabled">
																			<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Listo">
																				<span class="round-tab"> <i class="glyphicon glyphicon-ok"></i> </span>
																			</a>
																		</li>
																	</ul>
																</div>																 
																	<div class="tab-content" style="margin-top:10px;">																	
																		<div class="tab-pane active" role="tabpanel" id="step1">																			
																			<div class="step1">																				
																				<h3><strong>Datos del responsable del curso</strong></h3> <hr style="border-top: 2px dashed #11987dde;">											
																				<div class="row">
																					<div class="col-md-12">
																						<div class="col-md-8">
																							<div class="col-md-6 col-sm-6 col-xs-6">
																								<div class="form-group form-group-sm">
																									<label for="exampleInputEmail1">Nombre Completo:</label>
																									<div class="input-group">
																										<span class="input-group-addon">
																											<i class="fa fa-user"></i>
																										</span>
																										<input type="text" name="txtSendNombreFull" id="txtSendNombreFull" value="<?=trim($_SESSION['sesionNomUser']);?>" placeholder="Nombre Completo" class="form-control txtSendNombreFull text-capitalize" required autofocus>
																										<input type="text" name="txtnoFolio" id="txtnoFolio"  class="form-control txtnoFolio hidden">
																										<span class="error text-danger"></span>
																									</div>
																								</div>														
																								<div class="form-group form-group-sm">	
																									<label for="exampleInputEmail1">Correo electrónico:</label>	
																									<div class="input-group">
																										<span class="input-group-addon">
																											<i class="fa fa-envelope"></i>
																										</span>
																										<input type="email" name="txtSendEmail" class="form-control txtSendEmail" value="<?=$_SESSION['sesionUsuario'];?>" id="txtSendEmail" placeholder="Correo electrónico" required>															
																										<span class="error text-danger"></span>
																									</div>
																								</div>
																							</div>
																							<div class="col-md-6 col-sm-6 col-xs-6">
																								<div class="form-group form-group-sm">
																									<label for="exampleInputEmail1">Curp:</label>														
																									<div class="input-group">
																										<span class="input-group-addon">
																											<i class="fa fa-user"></i>
																										</span>
																										<input type="text" name="txtSendCurp" id="txtSendCurp" placeholder="Curp" class="form-control txtSendCurp text-uppercase" maxlength="18" required>
																										<span class="error text-danger"></span>
																										<!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nombres" required autofocus> -->
																									</div>
																								</div>														
																								<div class="form-group form-group-sm">	
																									<label for="exampleInputEmail1">Confirma tu correo electrónico:</label>														
																									<div class="input-group">
																										<span class="input-group-addon">
																											<i class="fa fa-envelope"></i>
																										</span>
																										<input type="email" name="txtSendEmailConfir" class="form-control txtSendEmailConfir" id="txtSendEmailConfir" placeholder="Correo electrónico" required>														
																										<span class="error text-danger"></span>
																									</div>
																								</div>
																							</div>
																							<div class="col-md-12" style="margin-top:60px;">
																								<h3><strong>Método de pago</strong></h3> <hr style="border-top: 1px dashed #26827045;">
																								<div class="row">
																									<div class="col-md-10">
																										<div class="form-group form-group-sm">
																											<div class="input-group">
																												<span class="input-group-addon">
																													<i class="fa fa-list"></i>
																												</span>
																												<select class="form-control m-b txtSendAcount" name="txtSendAcount" id="txtSendAcount">
																													<option value="Efectivo">Efectivo</option>
																													<option value="Transferencia">Transferencia</option>														
																												</select>
																												<span class="error text-danger"></span>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																						<div class="col-md-4">
																							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																								<div class="file">
																									<div class="ibox-content" id="iboxPago">
																										<center> <h3><i class="fa fa-shopping-cart"> RESUMEN DE PAGO </i></h3></center> <hr>
																										<table class="table table-stripped small m-t-md" style="margin-top:-20px">
																											<tbody>
																												<tr> <td class="no-borders"> </td>  <td  class="no-borders" > &nbsp;Total de Alumnos: <span id="coutPerson">0</span><span id="costPerson"></span> </td> </tr>
																												<tr> <td> </td> <td> &nbsp;Subtotal: $<span id="subtotal">000.00</span> </td> </tr>
																												<tr> <td> </td> <td> &nbsp;IVA: $<span id="iva">000.00</span> </td> </tr>
																												<tr> <td> </td> <td> <strong><h4>TOTAL: $<span id="costPersonTotal"></span> MXN</h4></strong> </td> </tr>
																											</tbody>
																										</table>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>																																		
																				</div>																																		
																			</div>
																			<ul class="list-inline pull-right">
																				<li><button type="submit" class="btn btn-primary next-step" id="next-stepWizar">Guardar</button></li>
																			</ul>																			
																		</div>
																		
																		<div class="tab-pane" role="tabpanel" id="step3">
																			<div class="step33">
																				<h3><strong>Datos de la Cuenta/Transferencia</strong></h3> <hr style="border-top: 2px dashed #11987d8c;">	
																				<div class="row mar_ned">
																					<div class="col-sm-offset-2 col-md-8">																						
																						<div class="file">
																							<div class="ibox-content">																										
																								<table class="table table-stripped m-t-md">
																									<tbody>
																										<tr>
																											<td class="no-borders"> </td>  <td  class="no-borders" > Nombre del cuentahabiente: SERVICIOS ECOSHEYS, S.A. DE C.V.  </td>
																										</tr>
																										<tr> <td> </td> <td> Banco: Banamex, S.A.  </td> </tr>
																										<tr> <td> </td> <td> Cuenta Bancaria: 70013200481  </td> </tr>
																										<tr> <td> </td> <td> Sucursal: 7001  </td> </tr>
																										<tr> <td> </td> <td> CLABE Interbancaria: 002420700132004810  </td> </tr>
																										<tr> <td> </td> <td> Ciudad: Toluca, Estado Mex. </td> </tr>
																										
																										<tr> </tr>																											
																									</tbody>																											
																								</table>
																								<i class="text-danger" style="font-size: smaller;">IMPORTANTE: Para enviar la ficha de deposito, ir al apartado de incripción y subir la evidencia.</i>
																							</div>
																						</div>
																					</div>
																				</div>																				
																				<div class="row mar_ned"> </div>
																			</div>
																			<ul class="list-inline pull-right">
																				<li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
																				<li><button type="button" class="btn btn-white" data-dismiss="modal" onclick="location.reload();">Cerrar</button></li>
																			</ul>
																		</div>
																		<div class="tab-pane" role="tabpanel" id="complete">
																			<div class="step44">
																				<h3><strong>Formato de Pago</strong></h3> <hr style="border-top: 2px dashed #11987d8c;">
																				<div class="col-md-10 col-xs-10 col-md-offset-1">
																					<div class="row file">
																						<div class="col-sm-7 b-r">
																							<iframe src="" class="img" id="wizardPicturePreview" width="100%" height="420px" title=""></iframe>
																						</div>
																						<div class="col-sm-5">
																							<p class="text-center text-danger small" style="color:#a79e9f;margin-top:20%">Descargar formato de Pago</p>
																							<p class="text-center" style="margin-top:35%">
																								<a href="#" id="iconRutaPdfPago" download=""><i class="fa fa-download big-icon"></i></a>
																							</p>
																						</div>
																					</div>
																				</div>
																			  
																			</div>
																			<ul class="list-inline pull-right">
																				<li><button type="button" class="btn btn-default doubleprev-step">Anterior</button></li>
																				<li><button type="button" class="btn btn-white" data-dismiss="modal" onclick="location.reload();">Cerrar</button></li>
																			</ul>
																		</div>
																		<div class="clearfix"></div>
																	</div>
																
															</div>
														</section>
													</div> 												
												</div>
												<div class="modal-footer hidden" style="margin-top:-5px;">
													<script>  var nameError = true, curpError = true, emailConfirm = true, email = true;
																													
															// form switch
														$(document).ready(function () {
															$(".next-step").click(function (e) {																
																event.preventDefault();
																	if ($('#txtnoFolio').val().length === 0) { alert('Ocurrio un Error'); location.reload(); }
																    // Name
																	if ($('#txtSendNombreFull').val().length === 0) {
																		$('#txtSendNombreFull').siblings('span.error').text('Por favor escriba su Nombre').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
																		nameError = true; } else {
																		$('#txtSendNombreFull').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		nameError = false; }
																	// Curp 
																	if ($('#txtSendCurp').val().length != 18) {
																		$('#txtSendCurp').siblings('span.error').text('Debe contener 18 caracteres').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
																		curpError = true; } else {
																			var dataCurpValid = $('#txtSendCurp').val();
																			if(dataCurpValid.match(/^([a-z]{4})([0-9]{6})([a-z]{6})([0-9]{2})$/i)){ console.log('esta bien la curp'); $('#txtSendCurp').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError'); curpError = false;
																			}else{ console.log('esta mal la curp'); $('#txtSendCurp').siblings('span.error').text('Curp inválido').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError'); curpError = true; }}
																	// Email 
																	if ($('#txtSendEmail').val().length === 0) {
																		$('#txtSendEmail').siblings('span.error').text('Por favor escriba su Email').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
																		email = true; } else {
																		$('#txtSendEmail').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		email = false; }
																	// Email confirmation
																	if ($('#txtSendEmail').val() !== $('#txtSendEmailConfir').val()) {
																		$('#txtSendEmailConfir').siblings('.error').text('Los correos no coinciden').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
																		emailConfirm = true;
																	} else {
																		$('#txtSendEmailConfir').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																		emailConfirm = false; }
																
																	if (nameError == true || curpError == true || emailConfirm == true || email == true){
																		console.log('Completar Todos los cammpos');
																	}else{
																		$(".next-step").prop("disabled", true); 
																		$('.modal-content').children('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
																		$.post('newInscrip.php' , {formCreatedNewPago:'formCreatedNewPago',SendFolio:$("#txtnoFolio").val(),SendNombreFull:$('#txtSendNombreFull').val(),SendCurp:$('#txtSendCurp').val(),SendEmail:$('#txtSendEmail').val(),SendTypePago:$('#txtSendAcount').val()},
																			function ( exito ){	
																				var varResult = exito.split("#"); 
																				if(varResult[0]=="1"){ }else{ alert('Error 65398');}
																			});	
																		
																		if($('#txtSendAcount').val()=='Efectivo'){
																			
																			var hrefUrlFormatPagoFpdf = '../../repositorio/fpdf/pdfCapacitacion/newFormatoPago.php?';		 																								
																			// var hrefParamFormatPagoFpdf = "pagoNoFolio="+$('#txtnoFolio').val()+"&totalPago="+$('#costPersonTotal').text()+"&curpRespon="+$('#txtSendCurp').val()+"&nameFull="+$('#txtSendNombreFull').val()+"&pagoNameCurso="+$('#txtNameCurso').val()+"&pagoNumAlumn="+$('#coutPerson').text()+"&pagoTarifa=pagoTarifa&sucursalEmpresa=<?=@$_SESSION['sesionSucur']?>";
																			var hrefParamFormatPagoFpdf = "pagoNoFolio="+$('#txtnoFolio').val()+"&sucursalEmpresa=<?=@$_SESSION['sesionSucur']?>";
																			$("#GeneratePdf").load(hrefUrlFormatPagoFpdf,hrefParamFormatPagoFpdf);
																			// var rutaAutoPdfPago	= 'https://docs.google.com/gview?url=http://www.archysoft.com.mx/ecosheys_dev/web/UploadPdf/PdfCapacitacion/Pagos/'+$('#txtSucu').val()+'/'+$('#txtnoFolio').val()+'.pdf&embedded=true';
																			var rutaAutoPdfPago	= "http://www.archysoft.com.mx/ecosheys_dev/web/UploadPdf/PdfCapacitacion/Pagos/<?=@$_SESSION['sesionSucur']?>/"+$('#txtnoFolio').val()+".pdf";
																			
																			setTimeout(function() {
																				var $active = $('.wizard .nav-tabs li.active');
																				$active.next().next().removeClass('disabled');
																				doublenextTab($active);
																				$(".next-step").prop("disabled", false); 
																				$('iframe').attr("src",rutaAutoPdfPago);
																				$('#iconRutaPdfPago').attr("download",$('#txtnoFolio').val()+".pdf");
																				$('#iconRutaPdfPago').attr("href",rutaAutoPdfPago);
																				$('.modal-content').children('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none");
																			},4200);
																			
																		}else{
																			var $active = $('.wizard .nav-tabs li.active');
																			$active.next().next().removeClass('disabled');
																			nextTab($active);
																			$('.modal-content').children('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none");
																		}
																	}

															});
															$(".prev-step").click(function (e) { var $active = $('.wizard .nav-tabs li.active'); prevTab($active); });
															$(".doubleprev-step").click(function (e) { var $active = $('.wizard .nav-tabs li.active'); doubleprevTab($active); });
														});
														function doublenextTab(elem) { $(elem).next().next().find('a[data-toggle="tab"]').click(); }
														function nextTab(elem) { $(elem).next().find('a[data-toggle="tab"]').click(); }
														function doubleprevTab(elem) { $(elem).prev().prev().find('a[data-toggle="tab"]').click(); }
														function prevTab(elem) { $(elem).prev().find('a[data-toggle="tab"]').click(); }
														
													</script>
												</div>
											</div><div id="GeneratePdf" class="hidden"></div>
										</div>
									</div>
									<!-- end modal tipo de pago -->
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
													<div class="input-group"><input type="text" name="search" id="filter" placeholder="Buscar Inscripción" class="input-xs form-control"> <span class="input-group-btn">
													<button type="submit" class="btn btn-default btn-outline"><i class="fa fa-search"></i> Buscar </button> </span></div>
												</form>
											</div>
											<div class="col-md-2">
												<a href="newInscrip.php?visibility=NewInscripNow" id="btnNewInscrip" class="btn btn-primary btn-md" role="button" aria-pressed="true"><i class="fa fa-plus"></i>&nbsp; Inscribirme</a>
											</div>
										</div>
										<div class="row" id="easyPaginate" style="margin-top:30px;">
											<?php while($row = $loadInscription->fetch_assoc()) { ?>																								
												<div class="[ col-xs-12 col-sm-4 ] iboxRectangular">
													<?php if(@$row['URL_EVIDENCIA_PAGO']=='' AND @$row['VALID_PAGO']=='false'){$classPanel="danger";}else if(@$row['URL_EVIDENCIA_PAGO']!='' AND @$row['VALID_PAGO']=='false'){$classPanel="warning";}else if(@$row['URL_EVIDENCIA_PAGO']!='' AND @$row['VALID_PAGO']=='true'){$classPanel="success";}?>
													<div class="[ panel panel-default ] panel-google-plus <?php echo $classPanel;?>">													
														<div class="panel-google-plus-tags">
															<ul> <li><?php echo date("j", strtotime(@$row['FECHA_REGISTRO']))." de ".date("M", strtotime(@$row['FECHA_REGISTRO']))." del ".date("Y", strtotime(@$row['FECHA_REGISTRO']));?> <small>( <?php echo timeAgo(@$row['FECHA_REGISTRO']); ?> )</small></li> </ul>
														</div>
														<div class="panel-heading">
														    <div class="row">
																<div class="col-sm-5">
																	<img class="[ img-thumbnail pull-left ]" src="<?php echo @$row['RUTA_IMG'];?>" alt="Mouse0270" style="height: 79px;"/>
																</div>
																<div class="col-sm-7" style="margin-top:28px;margin-left:-20px;">
																	<strong style="font-size:13px;" title="<?php echo @$row['NAME_CURSO'];?>"><?php echo substr(@$row['NAME_CURSO'],0,17); if(strlen(@$row['NAME_CURSO'])>16){echo "...";}?></strong>
																	<p><small>Inst:</small> <small title="<?php echo @$row['INSTRUCTOR'];?>"><?php echo substr(@$row['INSTRUCTOR'],0,40); if(strlen(@$row['INSTRUCTOR'])>40){echo "...";}?></small></p>
																</div>
															</div>
														</div>
														<div class="panel-body" style="padding: 5px;">														
															<p><?php echo substr(@$row['DESCRIPTION'], 0,132);?>...</p>
														</div>
														<?php if(@$row['VALID_COTIZACION']=='false'){ ?>
														<div class="product-overlay">
															<a class="product-overlay-link" href="#"><i class="">Generando Cotización...</i></a>	
														</div>
														<?php }?>
														<div class="panel-footer">
															<div class="text-center tooltip-demo" style="border-top: 1px dashed #d4d9dc;padding: 12px 0px 0px;">
																<?php if(@$row['TYPE_PAGO']!=''){?>
																	<?php if($classPanel=='success'){?>
																	<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Ver Evidencia" class="btn btn-xs btn-white" id="ViewEvidence" attrFolio="<?php echo @$row['NO_FOLIO'];?>" style="margin-right:25px;"><i class="fa fa-eye"></i>&nbsp; Ver Evidencia</button>
																	<?php }else{?>
																			<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Evidencia" class="btn btn-xs btn-white" id="UploadEvidence" attrImgUploadEvi="<?php echo $row['URL_EVIDENCIA_PAGO'];?>" attrFolio="<?php echo @$row['NO_FOLIO'];?>" style="margin-right:25px;"><i class="fa fa-file"></i>&nbsp; Evidencia</button>
																	<?php }?>																	
																	<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Editar" class="btn btn-xs btn-white" id="EditInscript" attrFolio="<?php echo @$row['NO_FOLIO'];?>"><i class="fa fa-pencil"></i>&nbsp; Editar</button>
																	<div class="btn-group dropdown" role="group">
																		<button id="btnGroupDrop1" type="button" style="margin-left:38px;position:absolute;background: transparent;border: 0px solid transparent;" class="btn btn-xs btn-white dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-caret-square-o-down" style="font-size: 1em;" aria-hidden="true" ></i> </button>
																		<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
																		  <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Método de Pago" class="btn btn-xs btn-white OpenMethodPagoModal <?php if(@$row['VALID_COTIZACION']=='false'){ echo "hidden"; } ?>" <?php if(@$row['VALID_COTIZACION']=='false'){ echo "disabled"; } ?> id="OpenMethodPagoModal" attrSubtotal="<?php echo @$row['SUBTOTAL'];?>" attrTotal="<?php echo @$row['TOTAL'];?>" attrNumPerson="<?php echo @$row['NUM_PERSONAS'];?>" attrIva="<?php echo @$row['IVA'];?>" attrFolio="<?php echo @$row['NO_FOLIO'];?>" attrCurp="<?php echo @$row['CURP'];?>"><i class="fa fa-dollar"></i>&nbsp; Método de pago</button>
																		  <a href="<?=$sufijo.$row['PDF_COTIZACION']; ?>" target="_blank" class="btn btn-xs btn-white" ><i class="fa fa-file-pdf-o"></i> Formato Cotización</a>
																		  <?php if(@$row['TYPE_PAGO']=='Efectivo'){ ?><a href="<?=$sufijo.$row['URL_FORMATO_PAGO']; ?>" target="_blank" class="btn btn-xs btn-white" ><i class="fa fa-file-pdf-o"></i> Formato Pago</a><?php }?>
																		  <?php if(@$row['TYPE_PAGO']=='Transferencia'){ ?><a href="<?=$sufijo; ?>web/images/datosCuenta.png" target="_blank" class="btn btn-xs btn-white" ><i class="fa fa-info"></i> Datos Cuenta</a><?php }?>
																		</div>
																	</div>
																<?php }else{?>
																	<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Método de Pago" class="btn btn-xs btn-white OpenMethodPagoModal <?php if(@$row['VALID_COTIZACION']=='false'){ echo "hidden"; } ?>" <?php if(@$row['VALID_COTIZACION']=='false'){ echo "disabled"; } ?> id="OpenMethodPagoModal" attrSubtotal="<?php echo @$row['SUBTOTAL'];?>" attrTotal="<?php echo @$row['TOTAL'];?>" attrNumPerson="<?php echo @$row['NUM_PERSONAS'];?>" attrIva="<?php echo @$row['IVA'];?>" attrFolio="<?php echo @$row['NO_FOLIO'];?>"><i class="fa fa-dollar"></i>&nbsp; Método de pago</button>
																<?php }?>
															</div>
														</div>
													</div>
												</div>	
											<?php }?>
										</div>
										<!--START Preview Evidence-->
										<div id="kvFileEvidence" class="file-zoom-dialog modal fade in" tabindex="-1" aria-labelledby="kvFileinputModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content modalDialogFirma">
													<div class="modal-body">
														<div  style="padding-bottom: 3px;">
															<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" data-dismiss="modal">&times;</button>													
														</div>
														<h3><strong>Evidencia de Pago</strong></h3> <hr style="border-top: 2px dashed #11987d8c;">
														<div class="floating-buttons"></div>
														<div class="kv-zoom-body file-zoom-content krajee-default"> 
															<img src="" id="imgPreviewEvi" class="img-thumbnail file-preview-image kv-preview-data rotate-1 file-zoom-detail" alt="CGeATS_W0AESR1o.jpg" style="width:auto;height:auto;max-width:100%;max-height:100%;">
														</div>
														<button type="button" class="btn btn-navigate btn-prev" title="View previous file" style="display: none;"><i class="fa fa-caret-left fa-lg"></i></button> <button type="button" class="btn btn-navigate btn-next" title="View next file" style="display: none;"><i class="fa fa-caret-right fa-lg"></i></button>
													</div>
												</div>
											</div>
										</div>
										<!--END Preview Evidence-->
									</div>
									<script>
										$('button#OpenMethodPagoModal').click(function(event){
												event.preventDefault();	
												$('#txtnoFolio').val($(this).attr('attrFolio'));
												$('#subtotal').text($(this).attr('attrSubtotal'));
												$('#iva').text($(this).attr('attrIva'));
												$('#coutPerson').text($(this).attr('attrNumPerson'));
												$('#costPersonTotal').text($(this).attr('attrTotal'));
												$('#txtSendCurp').val($(this).attr('attrCurp'));
												if($(this).attr('attrCurp')){ $('#txtSendEmailConfir').val($('#txtSendEmail').val())}

												$('#MethodPay').modal({backdrop:'static',keyboard:false, show:true});
												return false;
											});
									    $('button#EditInscript').click( function (event) {											
											event.preventDefault();	
											$(this).prop("disabled", true).html('Cargando <span class="loading"></span>');
											var attrFolio = $(this).attr('attrFolio');
											$.ajax({
												type: "POST",
												url: "newInscrip.php",
												data: {action:'EditInscrip', attrFolio:attrFolio},
												success: function() {   
													location.reload();  
												}
											});
											return false;																																																																																				
										});
										$('button#UploadEvidence').click( function (event) {											
											event.preventDefault();	
											var sendEvidenceFolio = $(this).attr('attrFolio');
											var sendImgUploadEvi = $(this).attr('attrImgUploadEvi');
											// alert(sendEvidenceFolio);
											if(sendImgUploadEvi!=''){ $('#LoadImgEvidence').addClass('hidden'); $('#ContentImg').removeClass('hidden'); $('#srcset').attr('srcset',sendImgUploadEvi); }
											
											$('#ModalUploadEvidence').modal({backdrop:'static',keyboard:false, show:true});
											$('#file-1').change(function(){
												if($(this).val()!='') {
													$.ajax({
														url: 'newInscrip.php',
														type: 'POST',
														enctype: 'multipart/form-data',
														data: {action:'UploadEvidence',sendEvidenceFolio:sendEvidenceFolio,sendImgUploadEvi:sendImgUploadEvi},
														success: function (r) { }
													});
												}
											});
											return false;																																																																																				
										});
                                        $('#btnNewInscrip').click( function (event) {											
											event.preventDefault();	
											var visibility = 'NewInscripNow';
											$.ajax({
												type: "POST",
												url: "newInscrip.php",
												data: {action:'NuevaInscrip', visibility: visibility},
												success: function() {   
													location.reload();  
												}
											});
											return false;																																																																																				
										});
										$('button#ViewEvidence').click(function(event){
											var getFolioImgEvidence = $(this).attr('attrFolio');
											$('#imgPreviewEvi').attr("src","../../repositorio/loadCapacitacion/img/pagos/"+'<?=@$_SESSION['sesionSucur']?>'+"/"+getFolioImgEvidence+".png");
											$('#kvFileEvidence').modal({backdrop:'static',keyboard:false, show:true}); 
										});
									</script>
									
									<!-- start modal Upload Evidencia -->
									<div class="modal fade" id="ModalUploadEvidence" tabindex="-1" role="dialog" aria-labelledby="ModalUploadEvidence" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content modalDialogFirma">
												<div class="modal-body">
													<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
														<div class="sk-double-bounce1"></div>
														<div class="sk-double-bounce2"></div>
													</div>
													<button type="button" class="close" id="closeModalEvidence"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
													<h3><strong>Evidencia de Pago</strong></h3> <hr style="border-top: 2px dashed #11987d8c;">												
													<div class="container kv-main" style="width:90%">
														<div id="ContentImg" class="hidden">
															<picture> <source srcset="" id="srcset" type="image/svg+xml"> <img src="" class="img-fluid img-thumbnail" alt="..."> </picture><span> <i class="fa fa-refresh" id="ChangeImgEvidence" style="font-size:110px;margin-left:10%;cursor:pointer;"></i></span>
														</div>
														<form enctype="multipart/form-data" id="LoadImgEvidence">	
															<div class="form-group">
																<div class="file-loading">
																	<input id="file-1" name="fileEvidence" type="file" class="file" data-overwrite-initial="false" data-min-file-count="1">
																</div>
															</div>        
														</form>    
													</div>
													<!-- <img width="150" src="img/pago.jpg" /> -->                                            
												</div>		 										
												<div class="modal-footer" style="margin-top:-5px;">
													<button type="button" class="btn btn-primary hidden" data-dismiss="modal"> &nbsp; Enviar &nbsp;<i class="fa fa-play"></i> </button>
													<!-- FileInput -->
													<style> .file-preview { border: 1px solid transparent; } .text-warning { color: #149e82; } </style>
													<!--script src="<?//@$sufijo?>web/js/plugins/fileinput/fileinput.js" type="text/javascript"></script>
													<script src="<? //@$sufijo?>web/js/plugins/fileinput/locales/es.js" type="text/javascript"></script>
													<script src="<? //@$sufijo?>web/js/plugins/fileinput/themes/explorer-fa/theme.js" type="text/javascript"></script>
													<script src="<?//@$sufijo?>web/js/plugins/fileinput/themes/fa/theme.js" type="text/javascript"></script-->
													<script> 
														  																											
													</script>
												</div>
											</div>
										</div>
									</div>
									<script>
									$('i#ChangeImgEvidence').click(function(event){ alert('jjd'); $('#LoadImgEvidence').removeClass('hidden'); $('#ContentImg').addClass('hidden'); $('#srcset').attr('srcset',''); });
									$('button#closeModalEvidence').click(function(event){
										event.preventDefault();
										$('.modal-content').children('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
										location.reload();
									});
									</script>
									<!-- end modal tipo de pago -->
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