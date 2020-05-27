<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">
			<style> #alertmod_table_list_2 { top: 900px !important; }
		            .inmodal .modal-body { background: white; }
		            .mail-box-header { border: transparent; }
					span.error.text-danger {
						color: #7b0d0dc4;
						font-family: "Montserrat", sans-serif;
						font-size: 11px;
						position: absolute;
						bottom: -14px;
						right: 0;
						display: none;
					}
					.input-group-addon:first-child { color: cadetblue; }
					.input-group .form-control, .input-group-addon, .input-group-btn { color: black; }
					.toggle.btn {  min-width: 89px !important; max-width: 89px !important; min-height: 28px !important; max-height: 28px !important; }
					.toggle-on { top: -2px; }
					.toggle-off { top: 0px !important; padding-left: 17px !important; font-size: x-small !important;}
            </style>
			<style>
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
					height: 158px;
					background: rgba(127, 138, 136, 0.71);
					line-height: 158px;
					position: absolute;
					bottom: -158px;
					width: 100%;
					left: 0px;
					right: 0px;
					transition: .3s; }
				.product:hover .product-overlay { bottom: 0px; transition: .3s; }
				.product-overlay a {
					font-size: 80px;
					margin: 0;
					color: #fff;
					width: 100%;
					float: left;
					text-align: center; }
				.product-overlay a:hover { color: #ffffff; background: #6f7372c9 !important; }
				.product-overlay a:first-child { background: rgba(0,0,0,0.2); }		
				.product-thumbnail { position: relative; overflow: hidden; }
				a { color: #0c79639c; text-decoration: none; }
				.footable.breakpoint > tbody > tr > td > span.footable-toggle {  padding-right: 10px; color: #ded8d8; }
			</style>
			<style> .unread td { background-color: #ffffff; } </style>
			<?php// navbar($activeDesk='',$activeAdmin='',$activeFumi='',$activeExtin='',$activeCourse='active',$activeInscrip='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='showCourse',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Listado de Cursos </h5>
									<div class="ibox-tools">
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-wrench"></i>
										</a>
										<ul class="dropdown-menu dropdown-user">
											<li><a href="#">Config option 1</a>
											</li>
											<li><a href="#">Config option 2</a>
											</li>
										</ul>
										<a class="close-link">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="ibox-content">
									<div class="row">
										<div class="col-sm-9 m-b-xs">
											<div data-toggle="buttons" class="btn-group">
												<label class="btn btn-sm btn-white active"> <input type="radio" id="option1" name="options"> Dia </label>
												<label class="btn btn-sm btn-white "> <input type="radio" id="option2" name="options"> Semana </label>
												<label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Mes </label>
											</div>
										</div>
										<div class="col-sm-3 form-group-sm">
											<div class="input-group"><input type="text" placeholder="Buscar" class="input-sm form-control text-capitalize" id="filter"> <span class="input-group-btn">
												<button type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button> </span>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="10" data-filter=#filter style="margin-top:10px;">
											<thead>
												<tr>
													<th data-sort-ignore="true" >#</th>
													<th data-sort-ignore="true">Curso </th>
													<th data-sort-ignore="true">Instructor </th>
													<!--th data-sort-ignore="true" data-hide="all">Lugar</th>
													<th data-sort-ignore="true" data-hide="all">Empresa</th-->
													<th data-sort-ignore="true">Lugar</th>
													<th data-sort-ignore="true">Empresa</th>
													<th data-sort-ignore="true">Completion </th>
													<th data-sort-ignore="true">Tiempo</th>
													<th data-sort-ignore="true">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $count=0; while($row = $ListasConstancias->fetch_assoc()) { $count++; ?>																								
													<tr>
														<td><?php echo $count;?></td>
														<td title="<?php echo $row['NAME_CURSO'];?>"><small><?php echo substr($row['NAME_CURSO'], 0,27); if(strlen(@$row['NAME_CURSO'])>27){echo "...";}?></small></td>
														<td title="<?php echo $row['NAME_INSTRUCTOR'];?>"><small><?php echo substr($row['NAME_INSTRUCTOR'], 0,17); if(strlen(@$row['NAME_INSTRUCTOR'])>17){echo "...";}?></small></td>
														<td title="<?php echo $row['LUGAR'];?>"><small><?php echo substr($row['LUGAR'], 0,17); if(strlen(@$row['LUGAR'])>17){echo "...";}?></small></td>
														<td title="<?php echo $row['EMPRESA_RA'];?>"><small><?php echo substr($row['EMPRESA_RA'], 0,17); if(strlen(@$row['EMPRESA_RA'])>17){echo "...";}?></small></td>														
														<td class="project-completion">
															<?php if($row['RUTA_EVIDEN_ASISTEN']==""){ $percent="30%"; }elseif($row['RUTA_EVIDEN_ASISTEN']!=""){ $percent="60%"; } if($row['RUTA_PDF']=="true"){ $percent="100%"; } ?>
															<small><?php echo $percent; ?></small>
															<div class="progress progress-mini">
																<div style="width: <?php echo $percent; ?>;<?php if($row['RUTA_PDF']!='true'){ echo "background-color:rgb(199, 199, 199)"; } ?>;" class="progress-bar"></div>
															</div>
														</td>
														<td><small><?php echo timeAgo($row['FECHA_REGISTRO']);?></small></td>
														<td class="project-actions btn-group">															
															<?php if($row['RUTA_EVIDEN_ASISTEN']!=""){?>
																<div class="dropdown pull-left">
																  <a href="#" class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-paste"></i> Action <span class="caret"></span></a>
																  <ul class="dropdown-menu">
																	<li><a href="#" class="btn btn-white btn-sm OpenAsistenciaModal" attrNoFolio="<?php echo $row['NO_FOLIO'];?>" id="OpenAsistenciaModal" data-toggle="modal" data-target="#modalAsistencia"><i class="fa fa-check-square-o"></i> Asistencia</a></li>
																	<li><a href="#" class="btn btn-white btn-sm OpenEvidenciaModal" attrNoFolio="<?php echo $row['NO_FOLIO'];?>" sendImgUploadEvi="<?php echo $row['RUTA_EVIDEN_ASISTEN'];?>" id="OpenEvidenciaModal" data-toggle="modal" data-target="#modalEvidencia"><i class="fa fa-folder"></i> Evidencia </a></li>
																	<li><a href="#" class="btn btn-white btn-sm OpenConstanciasModal <?php if($row['RUTA_PDF']!="true"){echo "hidden";}?>" attrNoFolio="<?php echo $row['NO_FOLIO'];?>" attrNameCurso="<?php echo $row['NAME_CURSO'];?>" id="OpenConstanciasModal" data-toggle="modal" data-target="#modalConstancia"><i class="fa fa-file-pdf-o"></i> Constancias </a></li>
																  </ul>
																</div>
															<?php }else{ ?>
																<a href="#" class="btn btn-white btn-sm OpenAsistenciaModal" attrNoFolio="<?php echo $row['NO_FOLIO'];?>" id="OpenAsistenciaModal" data-toggle="modal" data-target="#modalAsistencia"><i class="fa fa-check-square-o"></i> Asistencia</a>
																<a href="#" class="btn btn-white btn-sm OpenEvidenciaModal" attrNoFolio="<?php echo $row['NO_FOLIO'];?>" sendImgUploadEvi="<?php echo $row['RUTA_EVIDEN_ASISTEN'];?>" id="OpenEvidenciaModal" data-toggle="modal" data-target="#modalEvidencia"><i class="fa fa-folder"></i> Evidencia </a>
															<?php } ?>
															<a href="#" class="btn btn-white btn-sm OpenConstanciasModal <?php if($row['RUTA_EVIDEN_ASISTEN']=="" or $row['RUTA_PDF']=="true"){echo "hidden";}?>" attrNoFolio="<?php echo $row['NO_FOLIO'];?>" attrNameCurso="<?php echo $row['NAME_CURSO'];?>" id="OpenConstanciasModal" data-toggle="modal" data-target="#modalConstancia"><i class="fa fa-file-pdf-o"></i> Constancias </a>
															<a href="#" class="btn btn-white btn-sm OpenFormatosModal <?php if($row['RUTA_PDF']!="true"){echo "hidden";}?>" attrNoFolio="<?php echo $row['NO_FOLIO'];?>" id="OpenFormatosModal" data-toggle="modal" data-target="#modalShowDocuments"><i class="fa fa-eye"></i> Ver PDF(s) </a>
														</td>
													</tr>
												<?php }?>												
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
							</div>
						</div>
					</div>			
				</div>
			</div>
			<!-- Modal de Asistencia -->
			<div id="modalAsistencia" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body" style="margin-top">
							<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
								<div class="sk-double-bounce1"></div>
								<div class="sk-double-bounce2"></div>
							</div>
							<button type="button" class="close" onclick="location.reload();" aria-hidden="true">  × </button>
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
								<h2> Lista de asistencia </h2>
								<div class="mail-tools tooltip-demo m-t-md" style="margin-top:30px;">
									<div class="btn-group pull-right">
										<button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="DC3/CONSTANCIA" id="dc3_all" style="margin-right:20px;"><i class="fa fa-check-square-o"></i> &nbsp;DC3/CONSTANCIA</button>
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
											<th data-sort-ignore="true" class="text-center">EMPRESA</th>
											<th data-sort-ignore="true" class="text-center">CURP</th>
											<th data-sort-ignore="true" class="text-center">Entrega</th>
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
							<button type="button" class="btn btn-default" onclick="location.reload();"> Cerrar </button>
							<script>
								$('#select_all').click(function() {  $('.i-checks').iCheck('check'); });
								$('#dc3_all').click(function() { $('.toggle-event').bootstrapToggle('toggle'); });
								$('.OpenAsistenciaModal').click(function(event){
									event.preventDefault();	
									$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
									var attrFolio = $(this).attr('attrNoFolio');
									// alert(attrFolio);
									$.ajax({
										type: "POST",
										url: "showConstancias.php",
										data: {action:'ListAsistencia', attrFolio:attrFolio},
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
									$('#modalAsistencia').modal({backdrop:'static',keyboard:false, show:true});
									return false;
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			<!--Modal Evidencia-->
			<div id="modalEvidencia" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modalDialogFirma">
						<div class="modal-body">
							<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
								<div class="sk-double-bounce1"></div>
								<div class="sk-double-bounce2"></div>
							</div>
							<button type="button" class="close" id="closeModalEvidence" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
							<h3><strong>Evidencia de Lista de Asistencia</strong></h3> <hr style="border-top: 2px dashed #11987dde;">												
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
							<style> .file-preview { border: 1px solid transparent; } .text-warning { color: #149e82; } </style>
							<script>
								$('#ChangeImgEvidence').click(function(event){ $('#LoadImgEvidence').removeClass('hidden'); $('#ContentImg').addClass('hidden'); $('#srcset').attr('srcset',''); });
								$('.OpenEvidenciaModal').click(function(event){
									event.preventDefault();	
									var attrFolio = $(this).attr('attrNoFolio');
									var sendImgUploadEvi = $(this).attr('sendImgUploadEvi');
									// alert(attrFolio);
									// alert(sendImgUploadEvi);
									if(sendImgUploadEvi!=''){ $('#LoadImgEvidence').addClass('hidden'); $('#ContentImg').removeClass('hidden'); $('#srcset').attr('srcset',sendImgUploadEvi); }
									
									$('#modalEvidencia').modal({backdrop:'static',keyboard:false, show:true});
									$('#file-1').change(function(){
										if($(this).val()!='') {
											$.ajax({
												url: 'showConstancias.php',
												type: 'POST',
												enctype: 'multipart/form-data',
												data: {action:'UploadEvidenceList',sendEvidenceFolio:attrFolio,sendImgUploadEvi:sendImgUploadEvi},
												success: function (r) { }
											});
										}
									});
									return false;
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			<!--Modal Constancias-->
			<div class="modal inmodal" id="modalConstancia" tabindex="-1" role="dialog" aria-hidden="true" >
				<div class="modal-dialog modal-lg">
					<div class="modal-content animated flipInY ">					
						<div class="modal-body">
							<div id="RequestMsg" class="text-center" style="position: absolute; z-index: 9991; margin-top: 20%; margin-left: 15%;"></div>
							<div class="sk-spinner sk-spinner-double-bounce" style="display:none;margin-top:15%;margin-left: 45%;z-index: 99999;position: absolute;">
								<div class="sk-double-bounce1"></div>
								<div class="sk-double-bounce2"></div>
							</div>
							<div class="row">
								<button type="button" class="close" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
								<h3><strong>Datos DC3/Constancias</strong></h3> <hr style="border-top: 2px dashed #11987dde;">
							</div>
							<div class="row" style="margin-top:10px;">	
								<div class="col-md-5 col-md-offset-1">                    
									<div class="form-group form-group-sm"><label class="col-md-12 font-noraml">Ocupación específica: </label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-info"></i>
												</span>
												<input type="text" name="txtOcupaEspeci" id="txtOcupaEspeci" placeholder="Ocupación específica" class="form-control txtOcupaEspeci text-capitalize" autofocus>
												<span class="error text-danger"></span>
											</div>
										</div>
									</div>
									<div class="form-group form-group-sm" style="padding-top:50px;"><label class="col-md-12 font-noraml">Nombre o razón social:</label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-info"></i>
												</span>
												<input type="text" name="txtRazonSocial" id="txtRazonSocial" placeholder="Nombre o razón social" class="form-control txtRazonSocial text-uppercase" disabled>
												<span class="error text-danger"></span>
											</div>
										</div>
									</div>
									<div class="form-group form-group-sm" style="padding-top:50px;"><label class="col-md-12 font-noraml">Registro Federal Contribuyentes:</label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-info"></i>
												</span>
												<input type="text" name="txtRegistroFedera" id="txtRegistroFedera" placeholder="Registro Federal de Contribuyentes con homoclave" class="form-control txtRegistroFedera text-uppercase" disabled>
												<span class="error text-danger"></span>
											</div>
										</div>
									</div>
									<div class="form-group form-group-sm" style="padding-top:50px;"><label class="col-md-12  font-noraml">Fecha inicio:</label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</span>
												<input type="date" name="txtDateInicio" id="txtDateInicio" value="<?php echo date("Y-m-d"); ?>" placeholder="Fecha de inicio" class="form-control txtDateInicio">
												<span class="error text-danger"></span>
											</div>
										</div>
									</div>
									<div class="form-group form-group-sm" style="padding-top:50px;"><label class="col-md-12  font-noraml">Fecha fin:</label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</span>
												<input type="date" name="txtDateFin" id="txtDateFin" value="<?php echo date("Y-m-d"); ?>" placeholder="Fecha de fin" class="form-control txtDateFin">
												<span class="error text-danger"></span>
											</div>
										</div>
									</div>								                       						
								</div>
								<div class="col-md-5"> 
									<div class="form-group form-group-sm"><label class="col-md-12  font-noraml">Área Temática del curso:</label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-info"></i>
												</span>
												<input type="text" name="txtAreaTematica" id="txtAreaTematica" placeholder="Area tematica del curso" class="form-control txtAreaTematica">
												<input type="text" name="txtTypeCourse" id="txtTypeCourse" class="form-control txtTypeCourse hidden">
												<span class="error text-danger"></span>
											</div>
										</div>
									</div>
									<div class="form-group form-group-sm" style="padding-top:50px;"><label class="col-md-12  font-noraml">Nombre del agente capacitador:</label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-user"></i>
												</span>
												<input type="text" name="txtNameCapacitador" id="txtNameCapacitador" placeholder="Agente capacitador o STPS" class="form-control txtNameCapacitador">
												<span class="error text-danger"></span>
											</div>
										</div>
									</div> 
									<div class="form-group form-group-sm" style="padding-top:50px;"><label class="col-md-12  font-noraml">Nombre del instructor o tutor:</label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-user"></i>
												</span>
												<select class="form-control m-b txtNameInstructor" name="txtNameInstructor" id="txtNameInstructor">
													<?php while($rowInst = $SelectInstruct->fetch_assoc()) {
														echo "<option value='".ucwords(mb_strtolower(trim($rowInst['NAME']), 'UTF-8'))."'>".ucwords(mb_strtolower(trim($rowInst['NAME']), 'UTF-8'))."</option>";
													}?>														
												</select>
												<span class="error text-danger"></span>
											</div>
										</div>
									</div>
									<div class="form-group form-group-sm" style="padding-top:50px;"><label class="col-md-12 font-noraml">Nombre del Patrón o representante legal:</label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-user"></i>
												</span>
												<!--select class="form-control m-b txtNamePatron" name="txtNamePatron" id="txtNamePatron">
													<option value="Navarrete Rodriguez Mildred Hasel">Navarrete Rodriguez Mildred Hasel</option>																										
												</select-->
												<input type="text" name="txtNamePatron" id="txtNamePatron" placeholder="Nombre del Patrón o representante legal" class="form-control txtNamePatron" disabled>
											</div>
										</div>
									</div>
									<div class="form-group form-group-sm" style="padding-top:50px;"><label class="col-md-12 font-noraml">Nombre del Representante de los trabajadores:</label>
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-user"></i>
												</span>
												<!--select class="form-control m-b txtRepresentante" name="txtRepresentante" id="txtRepresentante">
													<option value="Maria del Rocio Zarate Fragoso">Maria del Rocio Zarate Fragoso</option>																										
												</select-->
												<input type="text" name="txtRepresentante" id="txtRepresentante" placeholder="Nombre del Representante de los trabajadores" class="form-control txtRepresentante" disabled>
												<span class="error text-danger"></span>
											</div>
										</div>
									</div>
								</div>  
							</div>                                          
						</div>
						<div class="modal-footer" style="align:center">
							<div id="RequestConstan"></div>
							<button type="submit" class="btn btn-primary btn-md" style="font-size: 15px !important;padding: 5px 7px !important;" name="btnSaveConstan" id="btnSaveConstan"><i class="fa fa-save"></i>&nbsp; Guardar</button>
							<button type="button" class="btn btn-default btn-md hidden" onclick="location.reload();" style="font-size: 15px !important;padding: 5px 7px !important;" name="btnCloseConstan" id="btnCloseConstan"><i class=""></i>&nbsp;Cerrar</button>
							<script> var RazonSocial = true, DateInicio = true, RegistroFedera = true, DateFin = true, AreaTematica = true, NameCapacitador = true, NameInstructor = true;
								$('.OpenConstanciasModal').click(function(event){
									event.preventDefault();	
									$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block");
									var attrFolio = $(this).attr('attrNoFolio');
									var attrNameCurso = $(this).attr('attrNameCurso');
									var durationCourse = '';
									// alert(attrNameCurso);
									
									$.ajax({
										type: "POST",
										url: "showConstancias.php",
										data: {action:'SearchDatosCurso', attrNameCurso:attrNameCurso,attrFolio:attrFolio},
										success: function(exito) {  
											var obj = $.parseJSON(exito);
											// $('#txtOcupaEspeci').val(obj[0]['PUESTO_TRA']);
											$('#txtRazonSocial').val(obj[0]['RAZON_SOCIAL_EMP']);
											$('#txtRegistroFedera').val(obj[0]['SHCP_EMP']);
											$('#txtOcupaEspeci').val(obj[0]['OCUPACION_ESPECI']);
											$('#txtAreaTematica').val(obj[0]['AREA_TEMATICA']);
											$('#txtNameCapacitador').val(obj[0]['AGENT_CAPACITA']);
											$('#txtNameInstructor').val($.trim(obj[0]['NAME_INSTRUCTOR'])).change();
											$('#txtNamePatron').val($.trim(obj[0]['REPRESENT_LEGAL'])).change();
											$('#txtRepresentante').val($.trim(obj[0]['REPRESENT_TRABA'])).change();
											$('#txtTypeCourse').val(obj[0]['TYPE']);
											durationCourse = obj[0]['DURACION'];
											NUM_DC5 = obj[0]['NUM_DC5'];
											NUM_PC = obj[0]['NUM_PC'];
											// $('#RequestConstan').html(exito);
											$('#RequestConstan').html();
											$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none");
										}
									});
									
									$('#modalConstancia').modal({backdrop:'static',keyboard:false, show:true});
									$('button#btnSaveConstan').click(function(event){
										event.preventDefault();											
											
											// RazonSocial 
												if ($('#txtRazonSocial').val().length == 0) {
													$('#txtRazonSocial').siblings('span.error').text('Por favor llenar este campo').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
													RazonSocial = true; } else {
													$('#txtRazonSocial').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
													RazonSocial = false; }
											// RegistroFedera 
												if ($('#txtRegistroFedera').val().length == 0) {
													$('#txtRegistroFedera').siblings('span.error').text('Por favor llenar este campo').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
													RegistroFedera = true; } else {
													$('#txtRegistroFedera').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
													RegistroFedera = false; }
											// DateInicio 
												if ($('#txtDateInicio').val().length == 0) {
													$('#txtDateInicio').siblings('span.error').text('Fecha Incorrecta').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
													DateInicio = true; } else {
													$('#txtDateInicio').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
													DateInicio = false; }
											// DateFin 
												if ($('#txtDateFin').val().length == 0) {
													$('#txtDateFin').siblings('span.error').text('Fecha Incorrecta').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
													DateFin = true; } else {
													$('#txtDateFin').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
													DateFin = false; }
											// AreaTematica 
												if ($('#txtAreaTematica').val().length == 0) {
													$('#txtAreaTematica').siblings('span.error').text('Por favor llenar este campo').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
													AreaTematica = true; } else {
													$('#txtAreaTematica').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
													AreaTematica = false; }
											// NameCapacitador 
												if ($('#txtNameCapacitador').val().length == 0) {
													$('#txtNameCapacitador').siblings('span.error').text('Por favor llenar este campo').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
													NameCapacitador = true; } else {
													$('#txtNameCapacitador').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
													NameCapacitador = false; }
											// NameInstructor 
												if ($('#txtNameInstructor').val() == null) {
													$('#txtNameInstructor').siblings('span.error').text('Por favor elegir una opción').slideUp( 200 ).delay( 600 ).fadeIn().parent('.form-group').addClass('hasError');
													NameInstructor = true; } else {
													$('#txtNameInstructor').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
													NameInstructor = false; }
											
												if (RazonSocial == true || DateInicio == true || RegistroFedera == true || DateFin == true || AreaTematica == true || NameCapacitador == true || NameInstructor == true){
													console.log('Completar Todos los cammpos');
												}else{
													$('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","block"); $('button#btnSaveConstan').prop('disabled',true);
													// alert('exito');
													$.ajax({
														url: 'showConstancias.php',
														type: 'POST',
														data: {action:'GenerateConstancias',sendFolio:attrFolio,sendNameCurso:attrNameCurso,sendTypeCurso:$('#txtTypeCourse').val(),durationCourse:durationCourse,NUM_DC5:NUM_DC5,NUM_PC:NUM_PC,sendOcupaEspeci:$('#txtOcupaEspeci').val(),sendRazonSocial:$('#txtRazonSocial').val(),sendRegistroFedera:$('#txtRegistroFedera').val(),sendDateInicio:$('#txtDateInicio').val(),sendDateFin:$('#txtDateFin').val(),sendAreaTematica:$('#txtAreaTematica').val(),sendNameCapacitador:$('#txtNameCapacitador').val(),sendNameInstructor:$('#txtNameInstructor').val(),sendNamePatron:$('#txtNamePatron').val(),sendRepresentante:$('#txtRepresentante').val(),sendTypeCourse:$('#txtTypeCourse').val()},
														success: function (r) { $('#RequestConstan').html(r); $('.modal-body').toggleClass('sk-loading'); $('.sk-spinner-double-bounce').css("display","none"); $('button#btnSaveConstan').prop('disabled',false);}
													});
												}
									});
									return false;
								});  
							</script>
						</div>
						<!-- </form> -->
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
							<h2><strong>Constancias/DC3</strong></h2> <hr style="border-top: 2px dashed #0e826ade;">												
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
										url: 'showConstancias.php',
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