<?php session_start();
sleep(1);
require('../../bd/bd.php');

$db = new DbCnnx();

if($_REQUEST['noCliente']!='')
{
	$noCliente= $_REQUEST['noCliente'];
	@$txtSucu= $_REQUEST['txtSucu'];
	@$TypeAutocomplite= $_REQUEST['TypeAutocomplite'];
	@$rutaPdfReporte= $_REQUEST['rutaPdfReporte'];
	@$GetnoFolio= $_REQUEST['SendnoFolio'];
		
		switch ($TypeAutocomplite) {
			case "AutoCertiFumiTecnico":
				
					$QuerySearch = "SELECT cont.NOMBRE_C,cont.APP_PATERNO_C,cont.APP_MATERNO_C,cont.EMAIL,emp.GIRO,emp.NOMBRE,emp.APP_PATERNO,emp.APP_MATERNO,emp.ESTADO,emp.DEL_MPIO,emp.COLONIA,emp.CP,fumi.*,valid.ID_VALID,valid.VALID FROM empresas AS emp,contactos AS cont,fumigacion AS fumi,valid_modulo AS valid  WHERE emp.no_cliente=$noCliente AND cont.no_cliente=$noCliente AND fumi.NO_CLIENTE=$noCliente AND fumi.NO_FOLIO=valid.ID_VALID;";
					$rec = $db->combo($QuerySearch);

					while ($row = $rec->fetch_assoc()) {
						$NombreCliente=$row['NOMBRE'].' '.$row['APP_PATERNO'].' '.$row['APP_MATERNO'];
						$NombreClienteMo=$row['NOMBRE_C'].' '.$row['APP_PATERNO_C'].' '.$row['APP_MATERNO_C'];
						$DireccionCliente=$row['ESTADO'].' / '.$row['DEL_MPIO'].' / '.$row['COLONIA'].' / '.$row['CP'];

						if($row['EMAIL']==''){$Correo='';}else{$Correo=$row['EMAIL'];}
						if($row['GIRO']==''){$Giro='GIRO';}else{$Giro=$row['GIRO'];}
						
						$NO_FOLIO = $row['NO_FOLIO'];
						$HORA_INICIO = $row['HOR_INICIO']; $HORA_FINALIZADO=$row['HOR_FINALIZADO'];
						$AREAS_FUMIGAR = $row['AREAS_FUMIGAR']; 	
						$TIPO_FUMIGACION = $row['TIPO_FUMIGACION'];		
						$PLAGAS_CONTROL = $row['PLAGAS_CONTROL'];
						$METEDO_APLICACION = $row['METODO_APLICACION'];
						$NOM_COMERCIAL = $row['NOM_COMERCIAL'];
						$NOM_QUIMICO = $row['NOM_QUIMICO'];
						$METOD_APLICACION_INSEC = $row['METOD_APLICACION_INSEC'];
						$COMPOSICION = $row['COMPOSICION'];
						$DOSIS = $row['DOSIS'];
						$REGISTRO_COFE = $row['REGISTRO_COFE'];
						$PERIODICIDAD_SERVICE = $row['PERIODICIDAD_SERVICE']; 
						$PROX_SERVICIO = $row['PROX_SERVICIO'];
						$OBSERVACIONES = $row['OBSERVACIONES']; 
						$RESPONSABLE_AREA = $row['RESPONSABLE_AREA'];
						$TEC_APLICADOR = $row['TEC_APLICADOR'];
						$AREA_ADMINISTRACION = $row['AREA_ADMINISTRACION'];
						@$VALID = $row['VALID'];
						
						if($row['NOMBRE']==''){
							$ResultFinal = $NombreClienteMo.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$AREAS_FUMIGAR.' # '.$TIPO_FUMIGACION.' # '.$PLAGAS_CONTROL.' # '.$METEDO_APLICACION.' # '.$NOM_COMERCIAL.' # '.$NOM_QUIMICO.' # '.$METOD_APLICACION_INSEC.' # '.$COMPOSICION.' # '.$DOSIS.' # '.$REGISTRO_COFE.' # '.$PERIODICIDAD_SERVICE.' # '.$PROX_SERVICIO.' # '.$OBSERVACIONES.' # '.$RESPONSABLE_AREA.' # '.$TEC_APLICADOR.' # '.$AREA_ADMINISTRACION.' # '.$NO_FOLIO.' # '.$VALID;
						}else{
							$ResultFinal = $NombreCliente.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$AREAS_FUMIGAR.' # '.$TIPO_FUMIGACION.' # '.$PLAGAS_CONTROL.' # '.$METEDO_APLICACION.' # '.$NOM_COMERCIAL.' # '.$NOM_QUIMICO.' # '.$METOD_APLICACION_INSEC.' # '.$COMPOSICION.' # '.$DOSIS.' # '.$REGISTRO_COFE.' # '.$PERIODICIDAD_SERVICE.' # '.$PROX_SERVICIO.' # '.$OBSERVACIONES.' # '.$RESPONSABLE_AREA.' # '.$TEC_APLICADOR.' # '.$AREA_ADMINISTRACION.' # '.$NO_FOLIO.' # '.$VALID;}
					}
					
					?>
						<div  style="padding-bottom: 3px;">
							<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" data-dismiss="modal">&times;</button>														
						</div>											
						<div class="modal-body" style="margin-top:15px;">
							<style>
							.bootstrap-timepicker-widget.dropdown-menu {
								display: inline-block;
								z-index: 9999999999!important;
							}
							</style>
							<form class="form-horizontal text-center form-small" name="frm_Fumigacion" id="frm_Fumigacion">
							   <div class="bs-example tabs-container with-nav-tabs panel-success">														
									<div class="form-group form-group-sm">
										<label class="control-label col-xs-2">N° DE FOLIO:</label>
										<div class="col-xs-3 control-label-noFolio">
											<input type="text" id="txtnoFolio" name="txtnoFolio" class="form-control txtnoFolio input-sm" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" value="<?php echo $NO_FOLIO; ?>" disabled>
										</div>																												
										<label class="control-label col-xs-1">FECHA:</label>
										<div class="col-xs-2">
											<input type="text" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" class="form-control txtfecha input-sm">
										</div>																											
										<label class="control-label col-xs-2">N° CLIENTE:</label>
										<div class="col-xs-2 control-label-noCliente">
											<input type="text" id="txtnoCliente" name="txtnoCliente" value="<?php echo $noCliente; ?>" class="form-control txtnoCliente input-sm" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" autofocus disabled>
										</div>														
										<div class="col-xs-3">
											<input type="text" id="txtSucu" name="txtSucu" value="<?=@$_SESSION['sesionSucur']?>" class="form-control txtSucu hidden" disabled>
										</div>
									</div>
								</div>													
								<h4 style="color:#11987d;padding-bottom:10px;padding-top:10px;">DATOS DEL CLIENTE</h4>
								<div class="form-group form-group-sm">
									<label  class="control-label col-xs-3">NOMBRE DEL CLIENTE:</label>
									<div class="col-xs-9">
										<input type="text" id="txtnomClient" name="txtnomClient" class="form-control txtnomClient input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo @$NombreClienteMo.@$NombreCliente; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm">
									<label  class="control-label col-xs-3">DIRECCION:</label>
									<div class="col-xs-9">
										<input type="text" id="txtdirection" name="txtdirection" class="form-control txtdirection input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo @$DireccionCliente; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm">
									<label  class="control-label col-xs-3">HR. INICIO:</label>
									<div class="col-xs-3">
										<div class="input-group bootstrap-timepicker" data-autoclose="true">
											<input type="text" id="txthorInicio" name="txthorInicio" class="form-control txthorInicio timepicker time start" value="<?php echo @$HORA_INICIO; ?>">
											<span class="input-group-addon">
												<span class="fa fa-clock-o"></span>
											</span>
										</div>
									</div>
									<label  class="control-label col-xs-3">HR. FINALIZADO:</label>
									<div class="col-xs-3">
										<div class="input-group bootstrap-timepicker" data-autoclose="true">
											<input type="text" id="txthorFinal" name="txthorFinal" class="form-control txthorFinal timepicker2 time end" value="<?php echo @$HORA_FINALIZADO; ?>">
											<span class="input-group-addon">
												<span class="fa fa-clock-o"></span>
											</span>
										</div>
									</div>
								</div>
								<h4 style="color:#11987d;padding-bottom:10px;padding-top:10px;">DATOS DEL SERVICIO</h4>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">ÁREAS A FUMIGAR:</label>
									<div class="col-xs-5">
										<input type="text" id="txtareaFumi" name="txtareaFumi" class="form-control txtareaFumi input-sm" value="<?php echo @$AREAS_FUMIGAR; ?>" disabled>
									</div>
									<label  class="control-label col-xs-1">TIPO:</label>
									<div class="col-xs-3">
										<input type="text" id="txttipoServicio" name="txttipoServicio" class="form-control txttipoServicio input-sm" value="<?php echo @$TIPO_FUMIGACION; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">PLAGAS A CONTROLAR:</label>
									<div class="col-xs-9">
										<input type="text" id="txtplagas" name="txtplagas" class="form-control txtplagas input-sm" value="<?php echo @$PLAGAS_CONTROL; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">MÉTODO DE APLICACIÓN:</label>
									<div class="col-xs-9">
										<input type="text" id="txtmethod1" name="txtmethod1" class="form-control txtmethod1 input-sm" value="<?php echo @$METEDO_APLICACION; ?>" disabled>
									</div>
								</div>
								<h4 style="color:#11987d;padding-bottom:10px;padding-top:10px;">DESCRIPCION DEL INSECTICIDA</h4>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">NOMBRE COMERCIAL:</label>
									<div class="col-xs-9">
										<input type="text" id="txtnomComercial" name="txtnomComercial" class="form-control txtnomComercial input-sm" value="<?php echo @$NOM_COMERCIAL; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">NOMBRE QUÍMICO:</label>
									<div class="col-xs-9">
										<input type="text" id="txtnomQuimico" name="txtnomQuimico" class="form-control txtnomQuimico input-sm" value="<?php echo @$NOM_QUIMICO; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">MÉTODO DE APLICACIÓN:</label>
									<div class="col-xs-9">
										<input type="text" id="txtmethod2" name="txtmethod2" class="form-control txtmethod2 input-sm" value="<?php echo @$METOD_APLICACION_INSEC; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">COMPOSICIÓN:</label>
									<div class="col-xs-4">
										<input type="text" id="txtcomposition" name="txtcomposition" class="form-control txtcomposition input-sm" value="<?php echo @$COMPOSICION; ?>" disabled>
									</div>
									<label  class="control-label col-xs-1">DÓSIS:</label>
									<div class="col-xs-4">
										<input type="text" id="txtdosis" name="txtdosis" class="form-control txtdosis input-sm" value="<?php echo @$DOSIS; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">														
									<label  class="control-label col-xs-3">REGISTRO COFEPRIS:</label>
									<div class="col-xs-9">
										<input type="text" id="txtcofepris" name="txtcofepris" class="form-control txtcofepris input-sm" value="<?php echo @$REGISTRO_COFE; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">PERIODICIDAD SERVICIO:</label>
									<div class="col-xs-9">
										<input type="text" id="txtperiodiService" name="txtperiodiService" class="form-control txtperiodiService input-sm" value="<?php echo @$PERIODICIDAD_SERVICE; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm">																			
									<label  class="control-label col-xs-3">PRÓXIMO SERVICIO:</label>
									<div class="col-xs-9" id="data_2">
										<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="txtnextService" name="txtnextService" class="form-control txtnextService input-sm" value="<?php echo @$PROX_SERVICIO; ?>" disabled>
										</div>
									</div>
								</div>
								<div class="form-group form-group-sm">																			
									<label  class="control-label col-xs-3">OBSERVACIONES:</label>
									<div class="col-xs-9">															
										<textarea name="txtObser" class="form-control txtObser input-sm text-uppercase" id="txtObser" ><?php echo @$OBSERVACIONES; ?></textarea>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">RESPONSABLE ÁREA:</label>
									<div class="col-xs-9">
										<input type="text" id="txtresponsable" name="txtresponsable" class="form-control txtresponsable input-sm" value="<?php echo @$RESPONSABLE_AREA; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">TÉCNICO APLICADOR:</label>
									<div class="col-xs-9">
										<input type="text" id="txttecnico" name="txttecnico" class="form-control txttecnico input-sm" value="<?php echo @$TEC_APLICADOR; ?>" disabled>
									</div>
								</div>
								<div class="form-group form-group-sm" style="text-align:left">																			
									<label  class="control-label col-xs-3">ÁREA ADMINISTRACIÓN:</label>
									<div class="col-xs-9">
										<input type="text" id="txtadministracion" name="txtadministracion" class="form-control txtadministracion input-sm" value="<?php echo @$AREA_ADMINISTRACION; ?>" disabled>
										<input type="text" id="txtrutaPdf" name="txtrutaPdf" class="form-control txtrutaPdf input-sm hidden" value="<?php echo @$rutaPdfReporte; ?>" disabled>
									</div>
								</div>
							</form>	<br>													
						</div>
						<div class="modal-footer" style="margin-top:-5px;">		
							<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="SendActualiCertiFumi" data-style="expand-right"> <span class="fa fa-save"></span> &nbsp; Guardar</button>
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>												
						</div>
						<script>
							$( '#SendActualiCertiFumi' ).click( function (event)
							{											
								event.preventDefault();	
								$(this).prop( "disabled", true ).addClass('fa-spin');
								var formUpdateCertifiFumiTec = 'formUpdateCertifiFumiTec';
								var noFolio = $( '.txtnoFolio' ).val(),										
								horInicio = $( '.txthorInicio' ).val(),
								horFinal = $( '.txthorFinal' ).val(),
								txtfecha = $( '.txtfecha' ).val(),
								rutaPdfCertifi = '../'+$('.txtrutaPdf').val(),
								TypeUser = 'TECNICO',
								Obser = $( '.txtObser' ).val().toUpperCase();										
																	
								$.post( 'validFumigacion.php' , { formUpdateCertifiFumiTec : formUpdateCertifiFumiTec,noFolio:noFolio,horInicio:horInicio,horFinal:horFinal,Obser:Obser,txtfecha:txtfecha},
								function ( exito ){	
									// Actualiza Pdf deacuerdo a los cambios capturados por el Tecnico
									var hrefUrlUpdateCertifiPdf = '../../repositorio/fpdf/PhpExtras/UpdateCFPdf.php?';												
									var hrefParamUpdateCertifiPdf = "rutaPdfCertifi="+rutaPdfCertifi+"&horInicio="+horInicio+"&horFinal="+horFinal+"&TypeUser="+TypeUser+"&Obser="+Obser+"&txtfecha="+txtfecha;
									$("#GeneratePdf").load(hrefUrlUpdateCertifiPdf,hrefParamUpdateCertifiPdf);
									$('#SendActualiCertiFumi').prop( "disabled", false ).removeClass('fa-spin');
									$('#modalCertificateFumiEdit').modal('hide');
									setTimeout(function() {																						
										toastr.options = {
											closeButton: true,
											progressBar: true,
											positionClass: 'toast-top-right',
											showMethod: 'slideDown',
											timeOut: 5000
										};
										toastr.success('','DATOS ACTUALIZADOS CORRECTAMENTE');
										// $(".modalDialogFirma").removeClass('hidden');
									},1200);
																						
								});	
																				
								return false;
							});	
							$(document).ready( function(event){
								$('.timepicker').timepicker({ minuteStep: 1, showInputs: false });
								$('.timepicker2').timepicker({ minuteStep: 1, showInputs: false });
							});
						</script>
					<?php
				
				break;
			case "ReportRodenticidas":
					
					$QuerySearch = "SELECT report.*,valid.ID_VALID,valid.VALID,cont.NOMBRE_C,cont.APP_PATERNO_C,cont.APP_MATERNO_C,cont.EMAIL,emp.GIRO,emp.NOMBRE,emp.APP_PATERNO,emp.APP_MATERNO,emp.ESTADO,emp.DEL_MPIO,emp.COLONIA,emp.CP FROM empresas AS emp,contactos AS cont,reportes_fumi AS report,valid_modulo AS valid WHERE emp.no_cliente=$noCliente AND cont.no_cliente=$noCliente AND report.NO_CLIENTE=$noCliente AND report.NO_FOLIO='$GetnoFolio' AND valid.ID_VALID='$GetnoFolio' GROUP BY report.NO_CLIENTE";					
					$rec = $db->combo($QuerySearch);
					
					while ($rowReport = $rec->fetch_assoc()) {
						$NombreCliente=$rowReport['NOMBRE'].' '.$rowReport['APP_PATERNO'].' '.$rowReport['APP_MATERNO'];
						$NombreClienteMo=$rowReport['NOMBRE_C'].' '.$rowReport['APP_PATERNO_C'].' '.$rowReport['APP_MATERNO_C'];
						$DireccionCliente=$rowReport['ESTADO'].' / '.$rowReport['DEL_MPIO'].' / '.$rowReport['COLONIA'].' / '.$rowReport['CP'];

						if($rowReport['EMAIL']==''){$Correo='';}else{$Correo=$rowReport['EMAIL'];}
						if($rowReport['GIRO']==''){$Giro='GIRO';}else{$Giro=$rowReport['GIRO'];}
						
						$NO_FOLIO=$rowReport['NO_FOLIO'];
						$HORA_INICIO=$rowReport['HORA_INICIO'];
						$HORA_FINALIZADO=$rowReport['HORA_FINALIZADO'];
						$OBSERV_REPORT=$rowReport['OBSERV_REPORT'];
						$TECNICO_APLICADOR=$rowReport['TECNICO_APLICADOR'];
						$RUTA_JSON=$rowReport['RUTA_JSON'];
						$RESPONSABLE_AREA=$rowReport['RESPONSABLE_AREA'];					
						$AREA_ADMINISTRACION=$rowReport['AREA_ADMINISTRACION'];					
						@$VALID = $rowReport['VALID'];
						
						if($rowReport['NOMBRE']==''){
							$ResultFinal = $NombreClienteMo.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$OBSERV_REPORT.' # '.$TECNICO_APLICADOR.' # '.$RESPONSABLE_AREA.' # '.$NO_FOLIO.' # '.$VALID.' # '.$RUTA_JSON;
						}else{
							$ResultFinal = $NombreCliente.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$OBSERV_REPORT.' # '.$TECNICO_APLICADOR.' # '.$RESPONSABLE_AREA.' # '.$NO_FOLIO.' # '.$VALID.' # '.$RUTA_JSON;}
					}

					@$SQL0 = "SELECT COUNT(*)-1 AS numRows FROM reportes_fumi WHERE NO_FOLIO='$NO_FOLIO'";
					@$rowss = $db->select($SQL0);
					@$numRows = $rowss[0]['numRows'];
					if(@$numRows!=''){
						$ReportResultFinal = @$ResultFinal.' # '.$numRows;
					}else{
						echo 'vacio';
					}
					
					?>
						<div  style="padding-bottom: 3px;">
							<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" data-dismiss="modal">&times;</button>														
						</div>											
						<div class="modal-body" style="margin-top:15px;">
							<style>
							.bootstrap-timepicker-widget.dropdown-menu {
								display: inline-block;
								z-index: 9999999999!important;
							}
							.modalContentDocment {
							  width: 100%;
							  height: 100%;
							  margin: 10px;
							  padding: 10px;
							}							
							</style>
							<form class="form-horizontal text-center form-small" name="frm_Rodenticida" id="frm_Rodenticida">
								<div class="bs-example tabs-container with-nav-tabs panel-success">
									
									<div class="form-group form-group-sm">
										<label class="control-label col-xs-2">N° DE FOLIO:</label>
										<div class="col-xs-3 control-label-noFolio">
											<input type="text" id="txtnoFolio" name="txtnoFolio" class="form-control txtnoFolio" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" value="<?php echo @$NO_FOLIO; ?>" disabled>
										</div>
																							
										<label class="control-label col-xs-1">FECHA:</label>
										<div class="col-xs-2">
											<input type="text" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" class="form-control txtfecha">
										</div>
																						
										<label class="control-label col-xs-2">N° CLIENTE:</label>
										<div class="col-xs-2 control-label-noCliente">
											<input type="text" id="txtnoCliente" name="txtnoCliente" class="form-control txtnoCliente" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" value="<?php echo @$noCliente; ?>" disabled>
										</div>
										<div class="col-xs-3">
											<input type="text" id="txtSucu" name="txtSucu" value="<?=@$_SESSION['sesionSucur']?>" class="form-control txtSucu hidden" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label  class="control-label col-xs-3">NOMBRE DEL CLIENTE:</label>
										<div class="col-xs-9">
											<input type="text" id="txtnomClient" name="txtnomClient" class="form-control txtnomClient" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo @$NombreClienteMo.@$NombreCliente; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label  class="control-label col-xs-3">DIRECCION:</label>
										<div class="col-xs-9">
											<input type="text" id="txtdirection" name="txtdirection" class="form-control txtdirection" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo @$DireccionCliente; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label  class="control-label col-xs-3">HORARIO INICIO:</label>
										<div class="col-xs-3">															
											<div class="input-group bootstrap-timepicker" data-autoclose="true">
												<input type="text" id="txthorInicio" name="txthorInicio" class="form-control txthorInicio timepicker time start" value="<?php echo @$HORA_INICIO; ?>">								
												<span class="input-group-addon">
													<span class="fa fa-clock-o"></span>
												</span>
											</div>
										</div>
										<label  class="control-label col-xs-3">HORARIO FINALIZADO:</label>
										<div class="col-xs-3">															
											<div class="input-group bootstrap-timepicker" data-autoclose="true">
												<input type="text" id="txthorFinal" name="txthorFinal" class="form-control txthorFinal timepicker2 time end" value="<?php echo @$HORA_FINALIZADO; ?>">
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
											<textarea class="form-control txtObser text-uppercase" id="txtObser" name="txtObser" placeholder="Observaciones"><?php echo @$OBSERV_REPORT; ?></textarea>
										</div>
									</div>
									<div class="form-group form-group-sm" style="text-align:left">																			
										<label  class="control-label col-xs-3">RESPONSABLE ÁREA:</label>
										<div class="col-xs-9">															
											<input type="text" id="txtresponsable" name="txtresponsable" class="selectSearch form-control txtresponsable input-sm" value="<?php echo @$RESPONSABLE_AREA; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm" style="text-align:left">																			
										<label  class="control-label col-xs-3">TÉCNICO APLICADOR:</label>
										<div class="col-xs-9">
											<input type="text" id="txttecnico" name="txttecnico" class="selectSearch form-control txttecnico input-sm" value="<?php echo @$TECNICO_APLICADOR; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm" style="text-align:left">																			
										<label  class="control-label col-xs-3">ÁREA ADMINISTRACIÓN:</label>
										<div class="col-xs-9">
											<input type="text" id="txtadministracion" name="txtadministracion" class="selectSearch form-control txtadministracion input-sm" value="<?php echo @$AREA_ADMINISTRACION; ?>"disabled>
											<input type="text" id="txtrutaPdf" name="txtrutaPdf" class="form-control txtrutaPdf input-sm hidden" value="<?php echo @$rutaPdfReporte; ?>" disabled>
										</div>
									</div>
								</div>
							</form>	<br>													
						</div>
						<div class="modal-footer" style="margin-top:-5px;">		
							<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="SendActualiCertiFumi" data-style="expand-right"> <span class="fa fa-save"></span> &nbsp; Guardar</button>
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>												
						</div>
						<script>
							$(document).ready(function () {
								var sizeWidthJqGrid = $('.tabs-container').width();
								$("#jqGrid").jqGrid({
									// url: '../../repositorio/DataJson/DataFumigacion/ReportRodenticidas/dataReport.json',
									url: '../../repositorio/DataJson/DataFumigacion/listarJsonBlank.php?rutaJson=<?php echo $RUTA_JSON; ?>',
									editurl: 'validFumigacion.php',
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
											width: 140,
											editable: false,
										},
										{
											label: '0 | 25 | 50 | 75 | 100',
											name: 'Consumo',
											width: 100,
											editable: true,
											required: true,
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
											 required: true,
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
											required: true,
											edittype: "select",
											editoptions: {
												 value: "Bueno:Bueno;Malo:Malo"
											}
										},
										{
											label: 'Observaciones',
											name: 'Obser',
											width: 100,
											editable: true,
											required: true,
										}
									],
									// sortname: 'Id',
									// sortorder : 'asc',
									loadonce: false,
									viewrecords: true,
									onSelectRow: editRow,
									height: 205,
									width: sizeWidthJqGrid,
									shrinkToFit: true,
									rowNum: <?php echo @$numRows; ?>,
									rownumbers: false, // show row numbers
									pager: "#jqGridPager",
									caption: "Distribución De Estaciones Cebaderas",
									loadingText: 'Cargando...',
									emptyrecords: 'No se encontraron registros'
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
										
										$('div#jEditButton_'+lastSelection+', div#jDeleteButton_'+lastSelection).css("display", "block");												
										$('div#jSaveButton_'+lastSelection+', div#jCancelButton_'+lastSelection).css("display", "none");
										var grid = $("#jqGrid");
										grid.jqGrid('saveRow',lastSelection);
										grid.jqGrid('editRow',id, {keys: true} );
										lastSelection = id;

										$('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "none");
										$('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "block");
										
										$('#'+id+'_Obser').blur(function(event){											
											grid.jqGrid('saveRow',lastSelection);
											$('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "block");
											$('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "none");
										});
										
										// $('#'+id+'_Consumo').blur(function(event){											
											// grid.jqGrid('saveRow',lastSelection);
											// grid.jqGrid('editRow',id,true);
											// $('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "block");
											// $('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "none");
										// });
									
								}
								
								// the bindKeys() 
								$("#jqGrid").jqGrid('bindKeys');
								$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a role="link" id="obtenergrafica" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:6%;"><span class="fa fa-bar-chart-o ui-state-hover"></span></a>');										
								$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a href="javascript:;" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:2.5%;" data-click="panel-expand"><i class="fa fa-expand"></i></a>');
							});	
							$( '#SendActualiCertiFumi' ).click( function (event) {											
								event.preventDefault();	
								$(this).prop( "disabled", true ).addClass('fa-spin');
								var formUpdatedReportRodenticidas = 'formUpdatedReportRodenticidas';
								var noFolio = $( '.txtnoFolio' ).val(),										
								noCliente = $( '.txtnoCliente' ).val(),
								sucursal = $( '.txtSucu' ).val(),
								horInicio = $( '.txthorInicio' ).val(),
								horFinal = $( '.txthorFinal' ).val(),
								txtfecha = $( '.txtfecha' ).val(),
								rutaPdfCertifi = '../'+$('.txtrutaPdf').val(),
								TypeUser = 'TECNICO',
								Obser = $( '.txtObser' ).val().toUpperCase();	

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
													$.post( 'conRodenticida.php' , { formUpdatedReportRodenticidas : formUpdatedReportRodenticidas,noFolio:noFolio,noCliente:noCliente,id_object:id_object,ubicacion:ubicacion,consumo:consumo,limpieza:limpieza,estatus_object:estatus_object,obser_object:obser_object,Obser:Obser,valid:'table',horInicio:horInicio,horFinal:horFinal} );														
												banderaNextStep = true;
												CamposGrid.push(id_object,ubicacion,consumo,limpieza,estatus_object,obser_object);
											}
										});
								
								if(banderaNextStep==true){
									$.post( 'conRodenticida.php' , { GererateJsonRC : 'GererateJsonRC', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal },
									function ( exito ){	
										setTimeout(function() {	
											// Actualiza Pdf deacuerdo a los cambios capturados por el Tecnico
											var hrefUrlUpdateReportPdf = '../../repositorio/fpdf/PhpExtras/UpdateRCPdf.php?';												
											var hrefParamUpdateReportPdf = "rutaPdfCertifi="+rutaPdfCertifi+"&horInicio="+horInicio+"&horFinal="+horFinal+"&TypeUser="+TypeUser+"&Obser="+Obser+"&noFolio="+noFolio+"&txtfecha="+txtfecha;
											$("#GeneratePdf").load(hrefUrlUpdateReportPdf,hrefParamUpdateReportPdf);
											$('#SendActualiCertiFumi').prop( "disabled", false ).removeClass('fa-spin');
											$('#modalCertificateFumiEdit').modal('hide');
										},2000);
										setTimeout(function() {																						
											toastr.options = {
												closeButton: true,
												progressBar: true,
												positionClass: 'toast-top-right',
												showMethod: 'slideDown',
												timeOut: 5000
											};
											toastr.success('','DATOS ACTUALIZADOS CORRECTAMENTE');
											// $(".modalDialogFirma").removeClass('hidden');
										},3200);
																							
									});	
								}
																				
								return false;
							});
							$(document).ready( function(event){
								$('.timepicker').timepicker({ minuteStep: 1, showInputs: false, explicitMode: true });
								$('.timepicker2').timepicker({ minuteStep: 1, showInputs: false, explicitMode: true });
							});
						</script>
					<?php
				break;
			case "ReportesMoscas":
					
					$QuerySearch = "SELECT report.*,valid.ID_VALID,valid.VALID,cont.NOMBRE_C,cont.APP_PATERNO_C,cont.APP_MATERNO_C,cont.EMAIL,emp.GIRO,emp.NOMBRE,emp.APP_PATERNO,emp.APP_MATERNO,emp.ESTADO,emp.DEL_MPIO,emp.COLONIA,emp.CP FROM empresas AS emp,contactos AS cont,reportes_fumi AS report,valid_modulo AS valid WHERE emp.no_cliente=$noCliente AND cont.no_cliente=$noCliente AND report.NO_CLIENTE=$noCliente AND report.NO_FOLIO='$GetnoFolio' AND valid.ID_VALID='$GetnoFolio' GROUP BY report.NO_CLIENTE";					
					$rec = $db->combo($QuerySearch);
					
					while ($rowReport = $rec->fetch_assoc()) {
						$NombreCliente=$rowReport['NOMBRE'].' '.$rowReport['APP_PATERNO'].' '.$rowReport['APP_MATERNO'];
						$NombreClienteMo=$rowReport['NOMBRE_C'].' '.$rowReport['APP_PATERNO_C'].' '.$rowReport['APP_MATERNO_C'];
						$DireccionCliente=$rowReport['ESTADO'].' / '.$rowReport['DEL_MPIO'].' / '.$rowReport['COLONIA'].' / '.$rowReport['CP'];

						if($rowReport['EMAIL']==''){$Correo='';}else{$Correo=$rowReport['EMAIL'];}
						if($rowReport['GIRO']==''){$Giro='GIRO';}else{$Giro=$rowReport['GIRO'];}
						
						$NO_FOLIO=$rowReport['NO_FOLIO'];
						$HORA_INICIO=$rowReport['HORA_INICIO'];
						$HORA_FINALIZADO=$rowReport['HORA_FINALIZADO'];
						$OBSERV_REPORT=$rowReport['OBSERV_REPORT'];
						$TECNICO_APLICADOR=$rowReport['TECNICO_APLICADOR'];
						$RUTA_JSON=$rowReport['RUTA_JSON'];
						$RESPONSABLE_AREA=$rowReport['RESPONSABLE_AREA'];					
						$AREA_ADMINISTRACION=$rowReport['AREA_ADMINISTRACION'];					
						@$VALID = $rowReport['VALID'];
						
						if($rowReport['NOMBRE']==''){
							$ResultFinal = $NombreClienteMo.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$OBSERV_REPORT.' # '.$TECNICO_APLICADOR.' # '.$RESPONSABLE_AREA.' # '.$NO_FOLIO.' # '.$VALID.' # '.$RUTA_JSON;
						}else{
							$ResultFinal = $NombreCliente.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$OBSERV_REPORT.' # '.$TECNICO_APLICADOR.' # '.$RESPONSABLE_AREA.' # '.$NO_FOLIO.' # '.$VALID.' # '.$RUTA_JSON;}
					}

					@$SQL0 = "SELECT COUNT(*)-1 AS numRows FROM reportes_fumi WHERE NO_FOLIO='$NO_FOLIO'";
					@$rowss = $db->select($SQL0);
					@$numRows = $rowss[0]['numRows'];
					if(@$numRows!=''){
						$ReportResultFinal = @$ResultFinal.' # '.$numRows;
					}else{
						echo 'vacio';
					}
					
					?>
						<div  style="padding-bottom: 3px;">
							<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" data-dismiss="modal">&times;</button>														
						</div>											
						<div class="modal-body" style="margin-top:15px;">
							<style>
							.bootstrap-timepicker-widget.dropdown-menu {
								display: inline-block;
								z-index: 9999999999!important;
							}
							.modalContentDocment {
							  width: 100%;
							  height: 100%;
							  margin: 10px;
							  padding: 10px;
							}							
							</style>
							<form class="form-horizontal text-center form-small" name="frm_Rodenticida" id="frm_Rodenticida">
								<div class="bs-example tabs-container with-nav-tabs panel-success">
									
									<div class="form-group form-group-sm">
										<label class="control-label col-xs-2">N° DE FOLIO:</label>
										<div class="col-xs-3 control-label-noFolio">
											<input type="text" id="txtnoFolio" name="txtnoFolio" class="form-control txtnoFolio" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" value="<?php echo @$NO_FOLIO; ?>" disabled>
										</div>
																							
										<label class="control-label col-xs-1">FECHA:</label>
										<div class="col-xs-2">
											<input type="text" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" class="form-control txtfecha">
										</div>
																						
										<label class="control-label col-xs-2">N° CLIENTE:</label>
										<div class="col-xs-2 control-label-noCliente">
											<input type="text" id="txtnoCliente" name="txtnoCliente" class="form-control txtnoCliente" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" value="<?php echo @$noCliente; ?>" disabled>
										</div>
										<div class="col-xs-3">
											<input type="text" id="txtSucu" name="txtSucu" value="<?=@$_SESSION['sesionSucur']?>" class="form-control txtSucu hidden" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label  class="control-label col-xs-3">NOMBRE DEL CLIENTE:</label>
										<div class="col-xs-9">
											<input type="text" id="txtnomClient" name="txtnomClient" class="form-control txtnomClient" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo @$NombreClienteMo.@$NombreCliente; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label  class="control-label col-xs-3">DIRECCION:</label>
										<div class="col-xs-9">
											<input type="text" id="txtdirection" name="txtdirection" class="form-control txtdirection" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo @$DireccionCliente; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label  class="control-label col-xs-3">HORARIO INICIO:</label>
										<div class="col-xs-3">															
											<div class="input-group bootstrap-timepicker" data-autoclose="true">
												<input type="text" id="txthorInicio" name="txthorInicio" class="form-control txthorInicio timepicker time start" value="<?php echo @$HORA_INICIO; ?>">								
												<span class="input-group-addon">
													<span class="fa fa-clock-o"></span>
												</span>
											</div>
										</div>
										<label  class="control-label col-xs-3">HORARIO FINALIZADO:</label>
										<div class="col-xs-3">															
											<div class="input-group bootstrap-timepicker" data-autoclose="true">
												<input type="text" id="txthorFinal" name="txthorFinal" class="form-control txthorFinal timepicker2 time end" value="<?php echo @$HORA_FINALIZADO; ?>">
												<span class="input-group-addon">
													<span class="fa fa-clock-o"></span>
												</span>
											</div>
										</div>
									</div>
									<br>
									<h4 style="color:#11987d">Distribución de Cajas para Moscas</h4>												
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
											<textarea class="form-control txtObser text-uppercase" id="txtObser" name="txtObser" placeholder="Observaciones"><?php echo @$OBSERV_REPORT; ?></textarea>
										</div>
									</div>
									<div class="form-group form-group-sm" style="text-align:left">																			
										<label  class="control-label col-xs-3">RESPONSABLE ÁREA:</label>
										<div class="col-xs-9">															
											<input type="text" id="txtresponsable" name="txtresponsable" class="selectSearch form-control txtresponsable input-sm" value="<?php echo @$RESPONSABLE_AREA; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm" style="text-align:left">																			
										<label  class="control-label col-xs-3">TÉCNICO APLICADOR:</label>
										<div class="col-xs-9">
											<input type="text" id="txttecnico" name="txttecnico" class="selectSearch form-control txttecnico input-sm" value="<?php echo @$TECNICO_APLICADOR; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm" style="text-align:left">																			
										<label  class="control-label col-xs-3">ÁREA ADMINISTRACIÓN:</label>
										<div class="col-xs-9">
											<input type="text" id="txtadministracion" name="txtadministracion" class="selectSearch form-control txtadministracion input-sm" value="<?php echo @$AREA_ADMINISTRACION; ?>"disabled>
											<input type="text" id="txtrutaPdf" name="txtrutaPdf" class="form-control txtrutaPdf input-sm hidden" value="<?php echo @$rutaPdfReporte; ?>" disabled>
										</div>
									</div>
								</div>
							</form>	<br>													
						</div>
						<div class="modal-footer" style="margin-top:-5px;">		
							<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="SendActualiCertiFumi" data-style="expand-right"> <span class="fa fa-save"></span> &nbsp; Guardar</button>
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>												
						</div>
						<script>
							$(document).ready(function () {
								var sizeWidthJqGrid = $('.tabs-container').width();
								$("#jqGrid").jqGrid({
									// url: '../../repositorio/DataJson/DataFumigacion/ReportRodenticidas/dataReport.json',
									url: '../../repositorio/DataJson/DataFumigacion/listarJsonBlank.php?rutaJson=<?php echo $RUTA_JSON; ?>',
									editurl: 'validFumigacion.php',
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
											width: 140,
											editable: false,
										},
										{
											label: '0 | 25 | 50 | 75 | 100',
											name: 'Consumo',
											width: 100,
											editable: true,
											required: true,
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
											 required: true,
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
											required: true,
											edittype: "select",
											editoptions: {
												 value: "Bueno:Bueno;Malo:Malo"
											}
										},
										{
											label: 'Observaciones',
											name: 'Obser',
											width: 100,
											editable: true,
											required: true,
										}
									],
									// sortname: 'Id',
									// sortorder : 'asc',
									loadonce: false,
									viewrecords: true,
									onSelectRow: editRow,
									height: 205,
									width: sizeWidthJqGrid,
									shrinkToFit: true,
									rowNum: <?php echo @$numRows; ?>,
									rownumbers: false, // show row numbers
									pager: "#jqGridPager",
									caption: "Distribución de Cajas para Moscas",
									loadingText: 'Cargando...',
									emptyrecords: 'No se encontraron registros'
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
										
										$('div#jEditButton_'+lastSelection+', div#jDeleteButton_'+lastSelection).css("display", "block");												
										$('div#jSaveButton_'+lastSelection+', div#jCancelButton_'+lastSelection).css("display", "none");
										var grid = $("#jqGrid");
										grid.jqGrid('saveRow',lastSelection);
										grid.jqGrid('editRow',id, {keys: true} );
										lastSelection = id;

										$('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "none");
										$('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "block");
										
										$('#'+id+'_Obser').blur(function(event){											
											grid.jqGrid('saveRow',lastSelection);
											$('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "block");
											$('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "none");
										});
										
										// $('#'+id+'_Consumo').blur(function(event){											
											// grid.jqGrid('saveRow',lastSelection);
											// grid.jqGrid('editRow',id,true);
											// $('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "block");
											// $('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "none");
										// });
									
								}
								
								// the bindKeys() 
								$("#jqGrid").jqGrid('bindKeys');
								$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a role="link" id="obtenergrafica" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:6%;"><span class="fa fa-bar-chart-o ui-state-hover"></span></a>');										
								$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a href="javascript:;" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:2.5%;" data-click="panel-expand"><i class="fa fa-expand"></i></a>');
							});	
							$( '#SendActualiCertiFumi' ).click( function (event) {											
								event.preventDefault();			
								$(this).prop( "disabled", true ).addClass('fa-spin');
								var formUpdatedReportMoscas = 'formUpdatedReportMoscas';
								var noFolio = $( '.txtnoFolio' ).val(),										
								noCliente = $( '.txtnoCliente' ).val(),
								sucursal = $( '.txtSucu' ).val(),
								horInicio = $( '.txthorInicio' ).val(),
								horFinal = $( '.txthorFinal' ).val(),
								txtfecha = $( '.txtfecha' ).val(),
								rutaPdfCertifi = '../'+$('.txtrutaPdf').val(),
								TypeUser = 'TECNICO',
								Obser = $( '.txtObser' ).val().toUpperCase();	

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
													$.post( 'conMoscas.php' , { formUpdatedReportMoscas : formUpdatedReportMoscas,noFolio:noFolio,noCliente:noCliente,id_object:id_object,ubicacion:ubicacion,consumo:consumo,limpieza:limpieza,estatus_object:estatus_object,obser_object:obser_object,Obser:Obser,valid:'table',horInicio:horInicio,horFinal:horFinal} );														
												banderaNextStep = true;
												CamposGrid.push(id_object,ubicacion,consumo,limpieza,estatus_object,obser_object);
											}
										});
								
								if(banderaNextStep==true){
									$.post( 'conMoscas.php' , { GererateJson : 'GererateJson', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal },
									function ( exito ){	
										setTimeout(function() {	
											// Actualiza Pdf deacuerdo a los cambios capturados por el Tecnico
											var hrefUrlUpdateReportPdf = '../../repositorio/fpdf/PhpExtras/UpdateRMPdf.php?';												
											var hrefParamUpdateReportPdf = "rutaPdfCertifi="+rutaPdfCertifi+"&horInicio="+horInicio+"&horFinal="+horFinal+"&TypeUser="+TypeUser+"&Obser="+Obser+"&noFolio="+noFolio+"&txtfecha="+txtfecha;
											$("#GeneratePdf").load(hrefUrlUpdateReportPdf,hrefParamUpdateReportPdf);
											$('#SendActualiCertiFumi').prop( "disabled", false ).removeClass('fa-spin');
											$('#modalCertificateFumiEdit').modal('hide');
										},2000);
										setTimeout(function() {																						
											toastr.options = {
												closeButton: true,
												progressBar: true,
												positionClass: 'toast-top-right',
												showMethod: 'slideDown',
												timeOut: 5000
											};
											toastr.success('','DATOS ACTUALIZADOS CORRECTAMENTE');
											// $(".modalDialogFirma").removeClass('hidden');
										},3200);
																							
									});	
								}
																				
								return false;
							});
							$(document).ready( function(event){
								$('.timepicker').timepicker({ minuteStep: 1, showInputs: false, explicitMode: true });
								$('.timepicker2').timepicker({ minuteStep: 1, showInputs: false, explicitMode: true });
							});
						</script>
					<?php
				break;
			case "InspeccionLamparas":
					
					$QuerySearch = "SELECT report.*,valid.ID_VALID,valid.VALID,cont.NOMBRE_C,cont.APP_PATERNO_C,cont.APP_MATERNO_C,cont.EMAIL,emp.GIRO,emp.NOMBRE,emp.APP_PATERNO,emp.APP_MATERNO,emp.ESTADO,emp.DEL_MPIO,emp.COLONIA,emp.CP FROM empresas AS emp,contactos AS cont,reportes_fumi AS report,valid_modulo AS valid WHERE emp.no_cliente=$noCliente AND cont.no_cliente=$noCliente AND report.NO_CLIENTE=$noCliente AND report.NO_FOLIO='$GetnoFolio' AND valid.ID_VALID='$GetnoFolio' GROUP BY report.NO_CLIENTE";					
					$rec = $db->combo($QuerySearch);
					
					while ($rowReport = $rec->fetch_assoc()) {
						$NombreCliente=$rowReport['NOMBRE'].' '.$rowReport['APP_PATERNO'].' '.$rowReport['APP_MATERNO'];
						$NombreClienteMo=$rowReport['NOMBRE_C'].' '.$rowReport['APP_PATERNO_C'].' '.$rowReport['APP_MATERNO_C'];
						$DireccionCliente=$rowReport['ESTADO'].' / '.$rowReport['DEL_MPIO'].' / '.$rowReport['COLONIA'].' / '.$rowReport['CP'];

						if($rowReport['EMAIL']==''){$Correo='';}else{$Correo=$rowReport['EMAIL'];}
						if($rowReport['GIRO']==''){$Giro='GIRO';}else{$Giro=$rowReport['GIRO'];}
						
						$NO_FOLIO=$rowReport['NO_FOLIO'];
						$HORA_INICIO=$rowReport['HORA_INICIO'];
						$HORA_FINALIZADO=$rowReport['HORA_FINALIZADO'];
						$OBSERV_REPORT=$rowReport['OBSERV_REPORT'];
						$TECNICO_APLICADOR=$rowReport['TECNICO_APLICADOR'];
						$RUTA_JSON=$rowReport['RUTA_JSON'];
						$RESPONSABLE_AREA=$rowReport['RESPONSABLE_AREA'];					
						$AREA_ADMINISTRACION=$rowReport['AREA_ADMINISTRACION'];					
						@$VALID = $rowReport['VALID'];
						
						if($rowReport['NOMBRE']==''){
							$ResultFinal = $NombreClienteMo.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$OBSERV_REPORT.' # '.$TECNICO_APLICADOR.' # '.$RESPONSABLE_AREA.' # '.$NO_FOLIO.' # '.$VALID.' # '.$RUTA_JSON;
						}else{
							$ResultFinal = $NombreCliente.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$OBSERV_REPORT.' # '.$TECNICO_APLICADOR.' # '.$RESPONSABLE_AREA.' # '.$NO_FOLIO.' # '.$VALID.' # '.$RUTA_JSON;}
					}

					@$SQL0 = "SELECT COUNT(*)-1 AS numRows FROM reportes_fumi WHERE NO_FOLIO='$NO_FOLIO'";
					@$rowss = $db->select($SQL0);
					@$numRows = $rowss[0]['numRows'];
					if(@$numRows!=''){
						$ReportResultFinal = @$ResultFinal.' # '.$numRows;
					}else{
						echo 'vacio';
					}
					
					?>
						<div  style="padding-bottom: 3px;">
							<button type="button" class="close" style="color: #000;padding-top:6px;padding-right:10px;" data-dismiss="modal">&times;</button>														
						</div>											
						<div class="modal-body" style="margin-top:15px;">
							<style>
							.bootstrap-timepicker-widget.dropdown-menu {
								display: inline-block;
								z-index: 9999999999!important;
							}
							.modalContentDocment {
							  width: 100%;
							  height: 100%;
							  margin: 10px;
							  padding: 10px;
							}							
							</style>
							<form class="form-horizontal text-center form-small" name="frm_Rodenticida" id="frm_Rodenticida">
								<div class="bs-example tabs-container with-nav-tabs panel-success">
									
									<div class="form-group form-group-sm">
										<label class="control-label col-xs-2">N° DE FOLIO:</label>
										<div class="col-xs-3 control-label-noFolio">
											<input type="text" id="txtnoFolio" name="txtnoFolio" class="form-control txtnoFolio" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" value="<?php echo @$NO_FOLIO; ?>" disabled>
										</div>
																							
										<label class="control-label col-xs-1">FECHA:</label>
										<div class="col-xs-2">
											<input type="text" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" class="form-control txtfecha">
										</div>
																						
										<label class="control-label col-xs-2">N° CLIENTE:</label>
										<div class="col-xs-2 control-label-noCliente">
											<input type="text" id="txtnoCliente" name="txtnoCliente" class="form-control txtnoCliente" aria-describedby="helpBlock" onkeydown="return validarNumeros(event)" value="<?php echo @$noCliente; ?>" disabled>
										</div>
										<div class="col-xs-3">
											<input type="text" id="txtSucu" name="txtSucu" value="<?=@$_SESSION['sesionSucur']?>" class="form-control txtSucu hidden" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label  class="control-label col-xs-3">NOMBRE DEL CLIENTE:</label>
										<div class="col-xs-9">
											<input type="text" id="txtnomClient" name="txtnomClient" class="form-control txtnomClient" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo @$NombreClienteMo.@$NombreCliente; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label  class="control-label col-xs-3">DIRECCION:</label>
										<div class="col-xs-9">
											<input type="text" id="txtdirection" name="txtdirection" class="form-control txtdirection" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo @$DireccionCliente; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label  class="control-label col-xs-3">HORARIO INICIO:</label>
										<div class="col-xs-3">															
											<div class="input-group bootstrap-timepicker" data-autoclose="true">
												<input type="text" id="txthorInicio" name="txthorInicio" class="form-control txthorInicio timepicker time start" value="<?php echo @$HORA_INICIO; ?>">								
												<span class="input-group-addon">
													<span class="fa fa-clock-o"></span>
												</span>
											</div>
										</div>
										<label  class="control-label col-xs-3">HORARIO FINALIZADO:</label>
										<div class="col-xs-3">															
											<div class="input-group bootstrap-timepicker" data-autoclose="true">
												<input type="text" id="txthorFinal" name="txthorFinal" class="form-control txthorFinal timepicker2 time end" value="<?php echo @$HORA_FINALIZADO; ?>">
												<span class="input-group-addon">
													<span class="fa fa-clock-o"></span>
												</span>
											</div>
										</div>
									</div>
									<br>
									<h4 style="color:#11987d">Listado de Lámparas</h4>												
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
											<textarea class="form-control txtObser text-uppercase" id="txtObser" name="txtObser" placeholder="Observaciones"><?php echo @$OBSERV_REPORT; ?></textarea>
										</div>
									</div>
									<div class="form-group form-group-sm" style="text-align:left">																			
										<label  class="control-label col-xs-3">RESPONSABLE ÁREA:</label>
										<div class="col-xs-9">															
											<input type="text" id="txtresponsable" name="txtresponsable" class="selectSearch form-control txtresponsable input-sm" value="<?php echo @$RESPONSABLE_AREA; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm" style="text-align:left">																			
										<label  class="control-label col-xs-3">TÉCNICO APLICADOR:</label>
										<div class="col-xs-9">
											<input type="text" id="txttecnico" name="txttecnico" class="selectSearch form-control txttecnico input-sm" value="<?php echo @$TECNICO_APLICADOR; ?>" disabled>
										</div>
									</div>
									<div class="form-group form-group-sm" style="text-align:left">																			
										<label  class="control-label col-xs-3">ÁREA ADMINISTRACIÓN:</label>
										<div class="col-xs-9">
											<input type="text" id="txtadministracion" name="txtadministracion" class="selectSearch form-control txtadministracion input-sm" value="<?php echo @$AREA_ADMINISTRACION; ?>"disabled>
											<input type="text" id="txtrutaPdf" name="txtrutaPdf" class="form-control txtrutaPdf input-sm hidden" value="<?php echo @$rutaPdfReporte; ?>" disabled>
										</div>
									</div>
								</div>
							</form>	<br>													
						</div>
						<div class="modal-footer" style="margin-top:-5px;">		
							<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" data-click="panel-reload" id="SendActualiCertiFumi" data-style="expand-right"> <span class="fa fa-save"></span> &nbsp; Guardar</button>
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>												
						</div>
						<script>
							$(document).ready(function () {
								var sizeWidthJqGrid = $('.tabs-container').width();
								$("#jqGrid").jqGrid({
									// url: '../../repositorio/DataJson/DataFumigacion/ReportRodenticidas/dataReport.json',
									url: '../../repositorio/DataJson/DataFumigacion/listarJsonBlank.php?rutaJson=<?php echo $RUTA_JSON; ?>',
									editurl: 'validFumigacion.php',
									datatype: "json",
									cmTemplate: { sortable: false },
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
											label: 'N°Lámpara',
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
											editable: false // must set editable to true if you want to make the field editable
										},
										{
											label: 'Mosquito',
											name: 'Mosquito',
											width: 55,
											editable: true,													
											sortable: false,
											required: true
										},
										{
											label: 'Mosca',
											name: 'Mosca',
											width: 40,
											editable: true,													
											sortable: false,
											required: true
										},
										{
											label: 'Palomilla',
											name: 'Palomilla',
											width: 55,
											editable: true,													
											sortable: false,
											required: true
										},
										{
											label: 'Escarabajo',
											name: 'Escarabajo',
											width: 60,
											editable: true,													
											sortable: false,
											required: true
										},										
										{
											label: 'Limpieza',
											name: 'Limpieza',
											 width: 54,
											 editable: true,
											 edittype: "select",
											 sortable: false,
											 editoptions: {
												 value: "Si:Si;No:No"
											 }
										},
										{
											label: 'Bueno | Malo',
											name: 'Estatus',
											width: 80,
											editable: true,
											edittype: "select",
											sortable: false,
											editoptions: {
												 value: "Bueno:Bueno;Malo:Malo"
											}
										},
										{
											label: 'Observaciones',
											name: 'Obser',
											width: 100,
											editable: true,
											sortable: false							
										}
									],
									// sortname: 'Id',
									// sortorder : 'asc',
									loadonce: false,
									viewrecords: true,
									onSelectRow: editRow,
									height: 205,
									width: sizeWidthJqGrid,
									shrinkToFit: true,
									rowNum: <?php echo @$numRows; ?>,
									rownumbers: false, // show row numbers
									pager: "#jqGridPager",
									caption: "Listado de Lámparas",
									loadingText: 'Cargando...',
									noRecordText: 'No se encontraron registros'	
								});
								
								 $('#jqGrid').setGroupHeaders(
									{
										useColSpanStyle: true,
										groupHeaders: [
											{ "numberOfColumns": 4, "titleText": " CANTIDAD", "startColumnName": "Mosquito" },
											{ "numberOfColumns": 1, "titleText": "Estado de Lámparas", "startColumnName": "Estatus" }]
									});
								
								var lastSelection;

								function editRow(id) {
										
										$('div#jEditButton_'+lastSelection+', div#jDeleteButton_'+lastSelection).css("display", "block");												
										$('div#jSaveButton_'+lastSelection+', div#jCancelButton_'+lastSelection).css("display", "none");
										var grid = $("#jqGrid");
										grid.jqGrid('saveRow',lastSelection);
										grid.jqGrid('editRow',id, {keys: true} );
										lastSelection = id;

										$('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "none");
										$('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "block");
										
										$('#'+id+'_Obser').blur(function(event){											
											grid.jqGrid('saveRow',lastSelection);
											$('div#jEditButton_'+id+', div#jDeleteButton_'+id).css("display", "block");
											$('div#jSaveButton_'+id+', div#jCancelButton_'+id).css("display", "none");
										});										
									
								}
								
								// the bindKeys() 
								$("#jqGrid").jqGrid('bindKeys');
								$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a role="link" id="obtenergrafica" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:6%;"><span class="fa fa-bar-chart-o ui-state-hover"></span></a>');										
								$('.ui-jqgrid-titlebar.ui-jqgrid-caption.ui-widget-header.ui-corner-top.ui-helper-clearfix').append('<a href="javascript:;" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right:2.5%;" data-click="panel-expand"><i class="fa fa-expand"></i></a>');
							});	
							$( '#SendActualiCertiFumi' ).click( function (event) {											
								event.preventDefault();	
								$(this).prop( "disabled", true ).addClass('fa-spin');
								var formUpdatedReportInpecLamp = 'formUpdatedReportInpecLamp';
								var noFolio = $( '.txtnoFolio' ).val(),										
								noCliente = $( '.txtnoCliente' ).val(),
								sucursal = $( '.txtSucu' ).val(),
								horInicio = $( '.txthorInicio' ).val(),
								horFinal = $( '.txthorFinal' ).val(),
								txtfecha = $( '.txtfecha' ).val(),
								rutaPdfCertifi = '../'+$('.txtrutaPdf').val(),
								TypeUser = 'TECNICO',
								Obser = $( '.txtObser' ).val().toUpperCase();

								var banderaNextStep = false,
									CamposGrid = [];
										
										$("#jqGrid tbody tr").each(function (index) {
											var campo1, campo2, campo3, campo4, campo5, campo6, campo7, campo8, campo9, campo10;
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
													case 7: campo8 = $(this).text();
															break;
													case 8: campo9 = $(this).text();
															break;
													case 9: campo10 = $(this).text();
															break;
												}
												// $(this).css("background-color", "#ECF8E0");
											});
											var id_object=campo2;
											var ubicacion='+'+campo3+'+';
											var mosquito=campo4;
											var mosca=campo5;
											var palomilla=campo6;
											var escarabajo=campo7;
											var limpieza=campo8;
											var estatus_object=campo9;
											var obser_object=campo10;
																						
											if(campo2!='' && ubicacion!='+ +'){
													// alert(ubicacion);
													ubicacion = ubicacion.replace('+', '');
													ubicacion = ubicacion.replace('+', '');														
													$.post( 'lisLamparas.php' , { formUpdatedReportInpecLamp:formUpdatedReportInpecLamp,noFolio:noFolio,noCliente:noCliente,id_object:id_object,ubicacion:ubicacion,mosquito:mosquito,mosca:mosca,palomilla:palomilla,escarabajo:escarabajo,limpieza:limpieza,estatus_object:estatus_object,obser_object:obser_object,Obser:Obser,valid:'table',horInicio:horInicio,horFinal:horFinal} );														
												banderaNextStep = true;
												CamposGrid.push(id_object,ubicacion,mosquito,mosca,palomilla,escarabajo,limpieza,estatus_object,obser_object);
											}
										});
								
								if(banderaNextStep==true){
									$.post( 'lisLamparas.php' , { GererateJsonRL : 'GererateJsonRL', CamposGrid:CamposGrid , noCliente:noCliente, sucursal:sucursal },
									function ( exito ){	
										setTimeout(function() {
											// Actualiza Pdf deacuerdo a los cambios capturados por el Tecnico
											var hrefUrlUpdateReportPdf = '../../repositorio/fpdf/PhpExtras/UpdateRLPdf.php?';												
											var hrefParamUpdateReportPdf = "rutaPdfCertifi="+rutaPdfCertifi+"&horInicio="+horInicio+"&horFinal="+horFinal+"&TypeUser="+TypeUser+"&Obser="+Obser+"&noFolio="+noFolio+"&txtfecha="+txtfecha;
											$("#GeneratePdf").load(hrefUrlUpdateReportPdf,hrefParamUpdateReportPdf);
											$('#SendActualiCertiFumi').prop( "disabled", false ).removeClass('fa-spin');
											$('#modalCertificateFumiEdit').modal('hide');
										},2000);
										setTimeout(function() {																						
											toastr.options = {
												closeButton: true,
												progressBar: true,
												positionClass: 'toast-top-right',
												showMethod: 'slideDown',
												timeOut: 5000
											};
											toastr.success('','DATOS ACTUALIZADOS CORRECTAMENTE');
											// $(".modalDialogFirma").removeClass('hidden');
										},3200);
																							
									});	
								}
																				
								return false;
							});
							$(document).ready( function(event){
								$('.timepicker').timepicker({ minuteStep: 1, showInputs: false, explicitMode: true });
								$('.timepicker2').timepicker({ minuteStep: 1, showInputs: false, explicitMode: true });
							});
						</script>
					<?php
				break;
			default:
				echo 'vacio';
		}
}else{
	echo 'vacio';
}?>
