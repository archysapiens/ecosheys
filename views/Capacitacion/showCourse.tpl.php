<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">
			<style>
			.product-box {
				min-height: 395px;
				max-height: 395px;
			}
			.input-group-addon:first-child { color: cadetblue; } 
			.txtfechaCourse{z-index:1151 !important;}
			.error.text-danger { color: #a94442; font-size: smaller; }
			</style>
			<?php // navbar($activeDesk='',$activeAdmin='',$activeFumi='',$activeExtin='',$activeCourse='active',$activeInscrip='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='showCourse',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12">
							<div class="ibox float-e-margins" id="showCourse">
								<div class="ibox-title">
									<!--h5  style="color:black">Reporte de Consumo de Cebo Rodenticida</h5-->
									<div class="ibox-tools">										
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>										 
									</div>
								</div>																
								<div class="ibox-content text-center">
									<div class="row">
										<div class="col-lg-9">
											<form method="get" action="">
												<div class="input-group">													
													<input type="text" class="form-control  m-b-xs" id="filter" name="search" placeholder="Buscar curso">
													<div class="input-group-btn">
														<button type="submit" class="btn btn-default btn-facebook btn-outline">
															<i class="fa fa-search"></i>  Buscar
														</button>
													</div>
												</div>
											</form>
										</div>  
										<!-- col-md-offset-2 -->
										<div class="col-lg-2 col-md-offset-1">
											<?php if( $_SESSION['sesionPrivi'].' '.$_SESSION['sesionArea'] == 'RESPONSABLE CAPACITACION') {?>
												<form method="get" action="">					
													<div class="input-group-btn">
														<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCurso">
															<i class="fa fa-plus"></i>&nbsp;  Agregar Curso
														</button>
														<div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content animated flipInY modalDialogFirma">																	
																	<div class="modal-body">
																		<div  style="padding-bottom: 3px;">
																			<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" onclick="location.reload();" data-dismiss="modal">&times;</button>													
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
																						</ul>
																					</div>																 
																					<div class="tab-content" style="margin-top:10px;">
																						<h3><strong>Datos del nuevo curso</strong></h3> <hr style="border-top: 2px dashed #26827045;">	
																						<input type="text" name="txtCreadId" id="txtCreadId" class="txtCreadId hidden" value="<?php echo date("Ymd", strtotime("-1 day", strtotime(date( "Y-m-d" )))).'-'.date("his");?>">
																						<input type="text" name="txtRutaImg" id="txtRutaImg" class="txtRutaImg hidden">
																						<div class="tab-pane active" role="tabpanel" id="step1">																			
																							<div class="step1">																																			
																								<div class="row">
																									<div class="col-md-12">
																										<div class="col col-sm-4 col-md-4" style="margin-top:30px;">
																											<div class="form-group"  >																					
																												<div class="picture-container"><center>
																													<div class="picture btn btn-default btn-outline image-preview-input">
																														<span class="fa fa-file-picture-o"></span>
																														<span class="image-preview-input-title">Imagen Curso</span>																									
																														<input type="file" name="wizard-picture" accept="image/*" class="form-control wizard-picture" id="wizard-picture">
																													</div>																			
																												</div></center>
																												<div style="margin-top:10px">
																													<img src="<?=@$sufijo?>web/images/defaultCourse.png" class="picture-src img-thumbnail" id="wizardPicturePreview" width="100%" height="120px"  title=""/>
																												</div>	
																											</div>	
																										</div>														
																										<div class="col-sm-7 col-md-7 col-md-offset-1">
																											<div class="form-group form-group-sm">
																												<label for="NameCurso">Nombre Curso:</label>
																												<div class="input-group">
																													<span class="input-group-addon">
																														<i class="fa fa-check"></i>
																													</span>
																													<input type="text" name="txtNameCurso" id="txtNameCurso" placeholder="Nombre del curso" class="form-control txtNameCurso text-capitalize" required autofocus>
																													<span class="error text-danger"></span>
																												</div>
																											</div>	
																											<div class="form-group form-group-sm">
																												<label for="nameInstruct">Nombre Instructor:</label>
																												<div class="input-group">
																													<span class="input-group-addon">
																														<i class="fa fa-user"></i>
																													</span>
																													<select class="form-control m-b txtInstruc" name="txtInstruc" id="txtInstruc">
																														<?php while($rowInst = $SelectInstruct->fetch_assoc()) {
																															echo "<option value='".ucwords(mb_strtolower(trim($rowInst['NAME']), 'UTF-8'))."'>".ucwords(mb_strtolower(trim($rowInst['NAME']), 'UTF-8'))."</option>";
																														}?>														
																													</select>
																												</div>
																											</div>	
																											<div class="form-group form-group-sm">
																												<label for="fecha">Fecha:</label>
																												<div id="dateRecolect">
																													<div class="input-group date">
																														<span class="input-group-addon">
																															<i class="fa fa-calendar"></i>
																														</span>
																														<input type="text" name="txtfechaCourse" id="txtfechaCourse" placeholder="yyyy-mm-dd" class="form-control txtfechaCourse" value="<?php echo date("Y-m-d"); ?>" required>
																														<span class="error text-danger"></span>
																													</div>
																												</div>
																											</div>																						
																											<div class="form-group form-group-sm">
																												<label for="time">Tiempo:</label>
																												<div class="input-group">
																													<span class="input-group-addon">
																														<i class="fa fa-clock-o"></i>
																													</span>
																													<input type="text" name="txtDuration" id="txtDuration" placeholder="Tiempo en horas" class="form-control txtDuration" required>
																													<span class="error text-danger"></span>
																												</div>
																											</div>	
																										</div>
																										<div class="col-sm-12 ">
																											<div class="form-group form-group-sm">
																												<label for="description">Descripción:</label>																												
																												<div class="input-group">
																													<span class="input-group-addon">
																														<i class="fa fa-comments-o"></i>
																													</span>
																													<textarea class="form-control txtDescription" rows="2" name="txtDescription" id="txtDescription" placeholder="Descripción del Curso"></textarea>
																												</div>
																											</div>	
																										</div>																																	
																									</div>																																	
																								</div>																																		
																							</div>																		
																						</div>																							
																						<div class="tab-pane" role="tabpanel" id="step3">
																							<div class="step33">																			
																								<div class="row mar_ned"> </div>
																								<div class="row">
																									<div class="col-md-12">
																										<div class="col col-sm-4 col-md-4" style="margin-top:30px;">
																											<div class="form-group"  >																					
																												<div class="picture-container"><center>
																													<div class="picture btn btn-default btn-outline image-preview-input">
																														<span class="glyphicon glyphicon-folder-open"></span>
																														<span class="image-preview-input-title">Carta Descriptiva</span>																									
																														<input type="file" name="wizard-carta" class="form-control wizard-carta" id="wizard-picture">
																													</div>																			
																												</div></center>
																												<div style="margin-top:10px">
																													<img src="<?=@$sufijo?>web/images/defaultCourse.png" class="picture-src img-thumbnail" id="wizardPicturePreview" width="100%" height="120px"  title=""/>
																													<!--iframe src="https://docs.google.com/gview?url=http://www.aolivella.cat/Rafanell/HOMINIDOS/5%20CIENCIAS/CIENCIA.doc&embedded=true" class="picture-src img-thumbnail" id="wizardPicturePreview" width="100%" height="120px"  title=""></iframe -->
																												</div>	
																											</div>	
																										</div>														
																										<div class="col-sm-7 col-md-7 col-md-offset-1">																												
																											<div class="form-group form-group-sm">
																												<label for="typeCourse">Tipo de Curso:</label>
																												<div class="input-group">
																													<span class="input-group-addon">
																														<i class="fa fa-user"></i>
																													</span>
																													<select class="form-control m-b txttypeCourse" name="txttypeCourse" id="txttypeCourse">
																														<option value="DC3">DC3</option>
																														<option value="CONSTANCIA">CONSTANCIA</option>													
																													</select>
																												</div>
																											</div>	
																											<div class="form-group form-group-sm">
																												<label for="costo">Costo:</label>
																												<div class="input-group">
																													<span class="input-group-addon">
																														<i class="fa fa-dollar"></i>
																													</span>
																													<input type="text" name="txtCosto" id="txtCosto" placeholder="Costo del curso" class="form-control txtCosto" required>
																													<span class="error text-danger"></span>
																												</div>
																											</div>
																											<div class="form-group form-group-sm">
																												<label for="areaTematic">Área Temática:</label>
																												<div class="input-group">
																													<span class="input-group-addon">
																														<i class="fa fa-check"></i>
																													</span>
																													<input type="text" name="txtAreaTematica" id="txtAreaTematica" placeholder="Área Temática" class="form-control txtAreaTematica text-capitalize" required>
																													<span class="error text-danger"></span>
																												</div>
																											</div>
																										</div>
																										<div class="col-sm-12 ">
																											<div class="form-group form-group-sm">
																												<label for="materiaUtility">Material a utilizar:</label>																												
																												<div class="input-group">
																													<span class="input-group-addon">
																														<i class="fa fa-briefcase"></i>
																													</span>
																													<textarea class="form-control txtMaterialUtility" rows="2" name="txtMaterialUtility" id="txtMaterialUtility" placeholder="Equipo a utilizar"></textarea>
																												</div>
																											</div>	
																										</div>																																	
																									</div>																																	
																								</div>																				
																								<div class="row mar_ned hidden" id="requestAjax"> </div>
																							</div>
																						</div>																						
																						<div class="clearfix"></div>
																					</div>																					
																				</div>
																			</section>
																		</div> 	                                          
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
																		<button type="button" class="btn btn-primary next-step" id="next-stepWizar"> &nbsp; Continuar  </button>
																		<button type="button" class="btn btn-default prev-step hidden" id="prev-stepWizar">Anterior</button>
																		<button type="button" class="btn btn-primary btn-info-full next-step hidden" id="end-stepWizar">Guardar</button>
																		<script> 																			
																			/***** Start Upload ImgCurso ***/
																				$('.wizard-picture').change(function(){
																					// previewURL(this);
																					$('button').prop("disabled", true);
																					if($(this).val()!='') {
																					  var namePhotoCurso=$(this)[0].files[0]['name'];
																					  var formData = new FormData();
																					  formData.append('wizard-picture', $(this)[0].files[0]);
																						$.ajax({
																							url: 'showCourse.php',
																							type: 'POST',
																							enctype: 'multipart/form-data',
																							data: formData,
																							success: function (r) {
																								$('#requestAjax').html(r);
																								$('#txtRutaImg').val('../../repositorio/loadCapacitacion/img/cursos/'+namePhotoCurso);
																								$('button').prop("disabled", false);
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
																			/***** End Upload ImgCurso ***/
																			
																			var nameCurso = true, instruc = true, fechaCourse = true, duration = true, description = true, typeCourse = true, costo = true, areaTematica = true, materialUtility = true;
																																		
																				// form switch
																			$(document).ready(function () {
																				$("#next-stepWizar").click(function(e){																
																					event.preventDefault();																						
																						// Name Curso
																						if ($('#txtNameCurso').val().length === 0) {
																							$('#txtNameCurso').siblings('span.error').text('Por favor escriba curso').fadeIn().parent('.form-group').addClass('hasError');
																							nameCurso = true; } else {
																							$('#txtNameCurso').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																							nameCurso = false; }
																						
																						// Fecha del Curso
																						if ($('#txtfechaCourse').val().length === 0) {
																							$('#txtfechaCourse').siblings('span.error').text('Por favor escriba fecha').fadeIn().parent('.form-group').addClass('hasError');
																							fechaCourse = true; } else {
																							$('#txtfechaCourse').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																							fechaCourse = false; }
																							
																						// Duración del curso
																						if ($('#txtDuration').val().length === 0) {
																							$('#txtDuration').siblings('span.error').text('Por favor escriba duración').fadeIn().parent('.form-group').addClass('hasError');
																							duration = true; } else {
																							$('#txtDuration').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																							duration = false; }																												
																					
																						if (nameCurso == true || fechaCourse == true || duration == true){
																							console.log('Completar Todos los cammpos');
																						}else{																																								
																							$('#next-stepWizar').addClass('hidden');	
																							$('#prev-stepWizar,#end-stepWizar').removeClass('hidden');	
																							var $active = $('.wizard .nav-tabs li.active');
																								$active.next().next().removeClass('disabled');
																								nextTab($active); }																																										
																				});
																				// Valid Form
																				$("#end-stepWizar").click(function (e) {																
																					event.preventDefault();																							
																					
																						// Costo
																						if ($('#txtCosto').val().length === 0) {
																							$('#txtCosto').siblings('span.error').text('Por favor escriba el costo').fadeIn().parent('.form-group').addClass('hasError');
																							costo = true; } else {
																							$('#txtCosto').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
																							costo = false; }																																												
																					
																						if (costo == true){
																							console.log('Completar Todos los cammpos');
																						}else{
																																									
																							$.post('showCourse.php' , {formCreatedNewCurso:'formCreatedNewCurso',creadId:$("#txtCreadId").val(),sendNameCurso:$("#txtNameCurso").val(),sendInstruc:$('#txtInstruc').val(),sendfechaCourse:$('#txtfechaCourse').val(),sendDuration:$('#txtDuration').val(),sendDescription:$('#txtDescription').val(),sendTypeCourse:$('#txttypeCourse').val(),sendCosto:$('#txtCosto').val(),sendAreaTematica:$('#txtAreaTematica').val(),sendMaterialUtility:$('#txtMaterialUtility').val(),sendRutaImg:$('#txtRutaImg').val()},
																								function ( exito ){	
																									var varResult = exito.split("#"); 
																									if(varResult[0]=="1"){ }else{ alert('Error 65345')}
																								});	
																							
																							setTimeout(function() {
																								toastr.options = {
																									closeButton: true,
																									progressBar: true,
																									positionClass: 'toast-bottom-right',
																									showMethod: 'slideDown',
																									timeOut: 4000
																								};
																								toastr.success('','Éxito al guardar!');
																							},1500);
																						}

																				});
																				$(".prev-step").click(function (e) {
																					event.preventDefault();	
																					$("#next-stepWizar").removeClass('hidden');	
																					$('#prev-stepWizar,#end-stepWizar').addClass('hidden');	
																					var $active = $('.wizard .nav-tabs li.active');
																					prevTab($active);

																				});
																			});
																			function doublenextTab(elem) { $(elem).next().next().find('a[data-toggle="tab"]').click(); }
																			function nextTab(elem) { $(elem).next().find('a[data-toggle="tab"]').click(); }
																			function doubleprevTab(elem) { $(elem).prev().prev().find('a[data-toggle="tab"]').click(); }
																			function prevTab(elem) { $(elem).prev().find('a[data-toggle="tab"]').click(); }
																		</script>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</form>
											<?php }?>
										</div>
									</div>
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
									<div class="hr-line-dashed"></div>									
									<div class="row" id="easyPaginate">
										<?php while($row = $loadCursos->fetch_assoc()) { ?>
											<div class="col-md-3 iboxRectangular">
												<div class="ibox">
													<div class="ibox-content product-box">
														<div class="ibox-content" align="center">
															<img alt="image" class="img" width="100%" height="150px"  src="<?php echo @$row['RUTA_IMG'];?>" />
														</div>
														<div class="product-desc">
															<?php if( $_SESSION['sesionPrivi'].' '.$_SESSION['sesionArea'] == 'RESPONSABLE CAPACITACION') {?>
																<span class="product-price" style="background-color: #202322ad;"> $<?php echo @$row['COSTO'];?> </span>
															<?php }else{?> <span class="product-price" style="background-color:#5d5b5b91;padding:1px 8px;"> <?php echo @$row['DURACION'].' horas';?> </span> <?php }?>
															<small class="text-muted"> <?php echo @$row['INSTRUCTOR'];?> </small>
															<a href="#" class="product-name"><?php echo @$row['NAME'];?></a>
															<div class="small m-t-xs">
																<?php echo substr(@$row['DESCRIPTION'], 0,94);?>...
															</div>
															<div class="m-t text-righ">
																<a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
																<?php if( $_SESSION['sesionPrivi'].' '.$_SESSION['sesionArea'] == 'RESPONSABLE CAPACITACION') {
																	$sendAttr=array('sendID_CURSO'=>$row['ID_CURSO'], 'sendFECHA_CAP'=>$row['FECHA_CAP'], 'sendNAME'=>$row['NAME'], 'sendDESCRIPTION'=>$row['DESCRIPTION'], 'sendTYPE'=>$row['TYPE'], 'sendCOSTO'=>$row['COSTO'], 'sendDURACION'=>$row['DURACION'], 'sendAREA_TEMATICA'=>$row['AREA_TEMATICA'], 'sendINSTRUCTOR'=>$row['INSTRUCTOR'], 'sendRUTA_IMG'=>$row['RUTA_IMG'], 'sendMATERIAL_UTILITY'=>$row['MATERIAL_UTILITY']); ?>
																	
																	<a href="#" class="btn btn-xs btn-primary pull-right" id="openModalCurso" attrId="<?php print_r(@$sendAttr);?>" type="button"><i class="fa fa-pencil"></i>&nbsp;Modificar</a>
																<?php }else{?> <a  href="#" class="btn btn-xs btn-primary pull-right " type="button"><i class="fa fa-user-plus"></i>&nbsp;Inscribirme</a> <?php }?>
															</div>										
														</div>
													</div>
												</div>
											</div>
										<?php }?>																														
									</div>
								</div>																									
							</div>
						</div>
					</div>									
				</div>
				<script>
					$('a#openModalCurso').click(function(e){
						event.preventDefault();
						$('#modalCurso').modal({backdrop:'static',keyboard:false, show:true});
						var arrayGet= $(this).attr('attrId').split("["); 
						var oneSplit=[],twoSplit=[];
						$.each( arrayGet, function( key, value ) {
								 oneSplit = value.split("=>");
								 twoSplit.push(oneSplit[1]);
						});
						
						$('#txtCreadId').val($.trim(twoSplit[1]));
						$('#txtNameCurso').val($.trim(twoSplit[3]));
						$('#txtDescription').val($.trim(twoSplit[4]));
						$('#txtInstruc').val($.trim(twoSplit[9]));
						$('#txtfechaCourse').val($.trim(twoSplit[2]));
						$('#txttypeCourse').val($.trim(twoSplit[5]));
						$('#txtCosto').val($.trim(twoSplit[6]));
						$('#txtAreaTematica').val($.trim(twoSplit[8]));
						$('#txtDuration').val($.trim(twoSplit[7]));
						var threeSplit=twoSplit[11].split(")");
						$('#txtMaterialUtility').val($.trim(threeSplit[0]));
						$('#wizardPicturePreview').attr('src',$.trim(twoSplit[10]));
						$('#txtRutaImg').val($.trim(twoSplit[10]));
						// console.log('ID '+twoSplit[10]);
					});
				</script>
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