<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 
     table($sufijo); ?>
		<!-- begin #page-loader -->
		<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">

			<?php //navbar($activeDesk='',$activeAdmin='active',$activeFumi='',$activeExtin='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeAdmin',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-10 col-sm-offset-1">
							<div class="ibox float-e-margins" id="RegistroDeClientes">
								<div class="ibox-title">
									<h5>Registro de Cliente</h5>
									<div class="ibox-tools">
										<a class="collapse-link FormClient">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
								</div>								
								
								<div class="ibox-content text-center FormClient">
									<div class="row">
											<div id="tablamain" class="col-lg-10 col-sm-offset-1">
												<div class="col-lg-12" id="x00"  style=" text-align:center;vertical-align:middle">
													<div>
														 <form class="form-horizontal" name="frm_Empresas" id="frm_Empresas"><!--AQUI INICIA LA CREACION DEL FORMULARIO-->
														   <div class="bs-example tabs-container with-nav-tabs panel-success"><!--111-AQUI EMPIEZA EL DIV PARA CREAR LAS TABS -111-->
																<ul class="nav nav-pills nav-tabs"><!--**22**AQUI LA DECLARACION DELAS LI PARA LAS TABS**22**-->
																	<li class="active"><a data-toggle="tab" href="#Datos_Fiscales" id="tab1">Datos Fiscales</a></li>
																	<li><a data-toggle="tab" href="#Domicilio" id="tab2" onclick="validarCampos()">Domicilio</a></li>
																	<li><a data-toggle="tab" href="#mapa" onclick="buscarDirecciones();">Ubicaci&oacute;n Mapa</a></li>
																	<!--li><a data-toggle="tab" href="#pago" onclick="validarCampos()">Pago</a></li-->																		
																</ul><!--**22**AQUI TERMINA LA DECLARACION DELAS LI PARA LAS TABS**22**-->
																<div class="tab-content"><!--**2**AQUI EMPIEZA EL CONTENIDO PARA CADA TAB **2**-->
																	<div id="Datos_Fiscales" class="tab-pane fade in active"><!--**3**AQUI EMPIEZA EL CONTENIDO PARA LA TAB DE DATOS FISCALES**3**-->
																		<br>
																		<div class="form-group has-feedback">
																			<label class="control-label col-xs-3">No. de Cliente:</label>
																			<div class="col-xs-8">
																				<input type="text" id="txtnoCliente" name="txtnoCliente" maxlength="8" class="form-control txtnoCliente input-sm" aria-describedby="helpBlock"
																				placeholder="Introduzca el n&uacute;mero de Cliente" onkeydown="return validarNumeros(event)" value="23323231">
																				<div id="Info"></div>
																			</div>
																		</div>
																		<!--div id="Info" style="margin-left:35%"></div-->
																		<div class="form-group" style="text-align:left">
																			<label class="control-label col-xs-3">Medio de Pago:</label>
																			<div class="col-xs-8">
																				<select id="txtmedioPago" name="txtmedioPago" class="selectSearch form-control txtmedioPago" style="width:100%;">
																					<option value="" >SELECCIONA...</option>
																					
																					<option value="FACTURA">FACTURA</option>
																					<option value="NOTA">NOTA</option>
																				</select>
																			</div>
																		</div>
																		<div class="form-group" style="text-align:left">
																			<label class="control-label col-xs-3">Método de Pago:</label>
																			<div class="col-xs-8">
																				<select id="txtmetodoPago" name="txtmetodoPago" class="selectSearch form-control txtmetodoPago" style="width:100%;">
																					<option value="" >SELECCIONA...</option>
																					<option value="EFECTIVO">EFECTIVO</option>
																					<option value="DEPOSITO">DEPOSITO</option>
																					<option value="CHEQUE">CHEQUE</option>
																					<option value="TRANSFERENCIA">TRANSFERENCIA</option>
																					<option value="TARJETA DIRECTO">TARJETA DIRECTO</option>
																					<optgroup label="TARJETA" class="text-muted">																						
																						<option value="3">&nbsp;&nbsp;&nbsp;&nbsp;3</option>
																						<option value="6">&nbsp;&nbsp;&nbsp;&nbsp;6</option>
																						<option value="9">&nbsp;&nbsp;&nbsp;&nbsp;9</option>
																						<option value="12">&nbsp;&nbsp;&nbsp;&nbsp;12</option>
																						
																					</optgroup>
																				</select>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="radio-inline">
																			  <input type="radio" id="radio1" name="optradio">Clientes  Morales
																			</label>
																			<label class="radio-inline">
																			  <input type="radio" id="checkMor" name="optradio" disabled>Calcular RFC
																			</label>
																		</div>
																		<div class="form-group form-rfcMo">
																			<label class="control-label col-xs-3">RFC:</label>
																			<div class="col-xs-8">
																				<input type="name" class="form-control txtrfc_Moral input-sm" maxlength="12" id="txtrfc_Moral" name="txtrfc_Moral" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="El RFC debe contener 12 caracteres" disabled='false'>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-3">Raz&oacute;n Social:</label>
																			<div class="col-xs-8">
																				<input type="text" id="txtrazonsocial" name="txtrazonsocial" class="form-control txtrazonsocial input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
																			</div>
																		</div>
																		<div class="form-group">
																		<label class="checkbox-inline">
																		  <input type="radio" id="radio2" name="optradio"> Clientes  F&iacute;sicos
																		</label>
																		<label class="checkbox-inline">
																		  <input type="radio" id="checkFisico" name="optradio" disabled> Calcular RFC
																		</label>
																		</div>
																		<div class="form-group form-rfcFi">
																			<label class="control-label col-xs-3">RFC:</label>
																			<div class="col-xs-8">
																				<input type="text" id="txtrfc_Fisico" name="txtrfc_Fisico" maxlength="13" class="form-control txtrfc_Fisico input-sm" placeholder="El RFC debe contener 13 caracteres" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
																			</div>
																		</div>
																		<div class="form-group">
																			<label  class="control-label col-xs-3">Nombre:</label>
																			<div class="col-xs-8">
																				<input type="text" id="txtnombre" name="txtnombre" class="form-control txtnombre input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)" disabled>
																			</div>
																		</div>
																		<div class="form-group">
																			<!--label class="control-label col-xs-3">A. Paterno:</label-->
																			<label class="control-label col-xs-3">Apellidos:</label>
																			<div class="col-xs-4">
																				<input type="text" id="txtap_P" name="txtap_P" class="form-control txtap_P input-sm" placeholder="Apellido Paterno" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)" disabled>
																			</div>
																			
																			<div class="col-xs-4">
																				<input type="text" id="txtap_M" name="txtap_M" class="form-control txtap_M input-sm" placeholder="Apellido Materno" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)" disabled>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-3">Tel&eacute;fono Ofi:</label>
																			<div class="col-xs-3">
																				<input type="text" id="txt_tel_ofi_cont" name="txt_tel_ofi_cont" class="form-control txt_tel_ofi_cont input-sm" onkeydown="return validarNumeros(event)" disabled>
																			</div>
																			
																			<label class="control-label col-xs-2">Tel&eacute;fono Cel:</label>
																			<div class="col-xs-3">
																				<input type="text" id="txt_tel_cel_cont" name="txt_tel_cel_cont" class="form-control txt_tel_cel_cont input-sm" onkeydown="return validarNumeros(event)" disabled>
																			</div>
																		</div>
																		<div class="form-group">
																			<label  class="control-label col-xs-3">Observaciones:</label>
																			<div class="col-xs-8">
																				<input type="text" id="txt_obs_cont" name="txt_obs_cont" class="form-control txt_obs_cont input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
																			</div>
																		</div>
																		<div class="form-group">
																			<label  class="control-label col-xs-3">Email:</label>
																			<div class="col-xs-8">
																				<input type="email" id="txt_email_cont" name="txt_email_cont" class="form-control txt_email_cont input-sm" placeholder="email@ejemplo.com" disabled>
																			</div>
																		</div>
																		<div class="form-group form-group-sm">
																			<?php include('../repositorio/horarios/horario1.php');?>
																		</div>
																		 <div class="form-group">
																			<?php include('../repositorio/horarios/horario2.php');?>
																		</div>
																	</div><!--**3**AQUI TERMINA EMPIEZA EL CONTENIDO PARA LA TAB DE DATOS FISCALES**3**-->

																	<div id="Domicilio" class="tab-pane fade"><!--**4**AQUI EMPIEZA EL DIV PARA LA TAB DE DOMICILIO**4**-->
																		<br>
																		<div class="form-group" style="text-align:left">
																			<label class="control-label col-xs-3">Sucursal:</label>
																			<div class="col-xs-8">
																					<select id="txtsucursal" name="txtsucursal" class="selectSearch form-control txtsucursal" style="width:100%;">
																						<option value="">SELECCIONA...</option><?php
																						while($row = $SelectSucursal->fetch_assoc()) {
																							echo "<option value=".utf8_encode($row['NOMBRE']).">".utf8_encode($row['NOMBRE'])."</option>";
																						}?>
																					</select>
																					<span class="fa fa-plus col-xs-1" data-toggle="modal" data-target="#myModalSucursal" style="margin-left:100%;margin-top:-5%;cursor:pointer;z-index:100;vertical-align: middle;"></span>
																			</div>
																		</div>
																		<div class="form-group">																			
																			<label  class="control-label col-xs-3">NRA:</label>
																			<div class="col-xs-8">
																				<input type="text" id="txtnra" name="txtnra" class="form-control txtnra" placeholder="N&uacute;mero de Registro Ambiental" maxlength="30" onkeyup="javascript:this.value=this.value.toUpperCase();">
																			</div>
																		</div>
																		<div class="form-group hidden">
																			<label  class="control-label col-xs-3">No. Cuenta:</label>
																			<div class="col-xs-8">
																				<input type="text" id="txtnum_cta" value="NA" name="txtnum_cta" class="form-control txtnum_cta" placeholder="N&uacute;mero de Cuenta Concentradora" maxlength="30" onkeyup="javascript:this.value=this.value.toUpperCase();">
																			</div>
																		</div>
																		<div class="form-group" style="text-align:left">
																			<label class="control-label col-xs-3">Giro:</label>
																			<div class="col-xs-8">
																				<select id="txtgiro" name="txtgiro" class="selectSearch form-control txtgiro" style="width:100%;">
																					<option value="" >SELECCIONA...</option>
																					<option value="CASA DE ASISTENCIA">CASA DE ASISTENCIA</option>
																					<option value="CENTRO M&Eacute;DICO">CENTRO M&Eacute;DICO</option>
																					<option value="CL&Iacute;NICA">CL&Iacute;NICA</option>
																					<option value="CONSULTORIO">CONSULTORIO</option>
																					<option value="EMPRESA">EMPRESA</option>
																					<option value="ESCUELA">ESCUELA</option>
																					<option value="FARMACIA">FARMACIA</option>
																					<option value="FUNERARIA">FUNERARIA</option>
																					<option value="HOSPITAL">HOSPITAL</option>
																					<option value="HOTEL">HOTEL</option>
																					<option value="LABORATORIO DE AN&Aacute;LISIS CL&Iacute;NICOS">LABORATORIO DE AN&Aacute;LISIS CL&Iacute;NICOS</option>
																					<option value="ODONTOLOG&Iacute;A">ODONTOLOG&Iacute;A</option>
																					<option value="POD&Oacute;LOGO">POD&Oacute;LOGO</option>
																					<option value="SANATORIO">SANATORIO</option>
																					<option value="TATUAJES Y PERFORACIONES">TATUAJES Y PERFORACIONES</option>
																					<option value="TEXTIL">TEXTIL</option>
																					<option value="VETERINARIA">VETERINARIA</option>
																					<option value="OTRO">OTRO</option>
																				</select>
																			</div>
																		</div>
																			<div class="form-group" style="text-align:left">
																			<label class="control-label col-xs-3">Ruta:</label>
																			<div class="col-xs-8">
																				 <select id="txtruta" name="txtruta" class="selectSearch form-control txtruta" style="width:100%;">
																					<option value="" selected="selected" style="display:none">SELECCIONA...</option>
																					<option value="A">A</option>
																					<option value="B">B</option>
																					<option value="C">C</option>
																					<option value="D">D</option>
																					<option value="E">E</option>
																					<option value="F">F</option>
																					<option value="G">G</option>
																					<option value="H">H</option>
																					<option value="I">I</option>
																					<option value="J">J</option>
																					<option value="K">K</option>
																					<option value="L">L</option>
																					<option value="M">M</option>
																					<option value="N">N</option>
																					<option value="O">O</option>
																					<option value="P">P</option>
																					<option value="Q">Q</option>
																					<option value="R">R</option>
																					<option value="S">S</option>
																					<option value="T">T</option>
																					<option value="U">U</option>
																					<option value="V">V</option>
																					<option value="W">W</option>
																					<option value="X">X</option>
																					<option value="Y">Y</option>
																					<option value="Z">Z</option>
																				 </select>
																			</div>
																		</div>
																		<div class="form-group" style="text-align:left">
																			<label class="control-label col-xs-3">Estado:</label>
																			<div class="col-xs-8">
																				 <select class="selectSearch form-control txtestado" id="estados" name="estados" style="width:100%;"><!--ESTE SELECT LO TRAIGO DEL ARCHIVO sepomex.js, estso bienen relcionados para poder traer los datos corresponoenstenes acda estamdo-->
																					 <option  value="" style="display:none">SELECCIONA...</option>
																				 </select>
																			</div>
																		</div>
																		<div class="form-group" style="text-align:left">
																			<label class="control-label col-xs-3">Municipio/Delegaci&oacute;n: </label>
																			<div class="col-xs-8">
																				 <select class="selectSearch form-control txtmunicipio" id="municipios" name="municipios" style="width:100%;"><!--ESTE SELECT LO TRAIGO DEL ARCHIVO sepomex.js, estso bienen relcionados para poder traer los datos corresponoenstenes cada municipio-->
																					<option value="" style="display:none">SELECCIONA...</option>
																				 </select>
																			</div>
																		</div>
																		<div class="form-group" style="text-align:left">
																			<label class="control-label col-xs-3">CP:</label>
																			<div class="col-xs-8">
																				 <select class="selectSearch form-control txtcp"  id="cp" name="cp" style="width:100%;"><!--ESTE SELECT LO TRAIGO DEL ARCHIVO sepomex.js, estso bienen relcionados para poder traer los datos corresponoenstenes cada CP-->
																					<option value="" style="display:none">SELECCIONA...</option>
																				 </select>
																			</div>
																		</div>
																		<div class="form-group" style="text-align:left">
																			<label  class="control-label col-xs-3">Localidad:</label>
																			<div class="col-xs-8">
																				 <select class="selectSearch form-control txtlocalidad"  id="localidades" name="localidades" style="width:100%;"><!--ESTE SELECT LO TRAIGO DEL ARCHIVO sepomex.js, estso bienen relcionados para poder traer los datos corresponoenstenes cada LOCALIDAD-->
																					<option value="" style="display:none">SELECCIONA...</option>
																				 </select>
																			</div>
																		</div>
																		<div class="form-group">
																			<label  class="control-label col-xs-3">Calle:</label>
																			<div class="col-xs-8">
																				<input type="text" id="txtcalle" name="txtcalle" class="form-control txtcalle" onkeyup="javascript:this.value=this.value.toUpperCase();">
																			</div>
																		</div>
																		<div class="form-group">
																			<label  class="control-label col-xs-3">No. Ext:</label>
																			<div class="col-xs-3">
																				<input type="text" id="txt_num_ext" name="txt_num_ext" class="form-control txt_num_ext" onkeyup="javascript:this.value=this.value.toUpperCase();">
																			</div>
																			
																			 <label  class="control-label col-xs-2">No. Int:</label>
																			<div class="col-xs-3">
																				<input type="text" id="txt_num_int" name="txt_num_int" class="form-control txt_num_int" onkeyup="javascript:this.value=this.value.toUpperCase();">
																			</div>
																		</div>
																		<div class="form-group">
																			<label  class="control-label col-xs-3">Entre:</label>
																			<div class="col-xs-4">
																				<input type="text" id="txtentrecalle1" name="txtentrecalle1" placeholder="Calle 1" class="form-control txtentrecalle1" onkeyup="javascript:this.value=this.value.toUpperCase();">
																			</div>
																			<span style="margin-left:-520px;font-size:large;">/</span>
																			<!--label  class="control-label col-xs-3">Entre Calle 2:</label-->
																			<div class="col-xs-4">
																				<input type="text" id="txtentrecalle2" name="txtentrecalle2" placeholder="Calle 2" class="form-control txtentrecalle2" onkeyup="javascript:this.value=this.value.toUpperCase();">
																			</div>
																		</div>
																		<div class="form-group">
																			<label  class="control-label col-xs-3">Referencia:</label>
																			<div class="col-xs-8">
																				<input type="text" id="txtreferencia" name="txtreferencia" class="form-control txtreferencia" onkeyup="javascript:this.value=this.value.toUpperCase();">
																			</div>
																		</div>
																	</div><!--**4**AQUI TERMINA EL DIV PARA LA TAB DE DOMICILIO**4**-->

																	<div id="mapa" class="tab-pane fade"><!--**5**AQUI EMPIEZA EL DIV PARA LA TAB DE MAPA**5**-->
																				<div><input type="text" maxlength="200" id="txtDireccion" placeholder="Dirección" style="margin-top:3%; margin-left: 2%; width:100%"class="form-control addressMo"/>  </div>
																				<button type="button" name="button" onclick="buscarDireccionBoton();" class="btn btn-default" style="margin-top:1%">Buscar Direccion</button>
																	  <div id="mapaOriginal" style="width:100%; height:350px;margin-top:2%;margin-left:2%;"></div>
																		<br>
																					<div class="form-group">
																			<label  class="control-label col-xs-3">Latitud:</label>
																			<div class="col-xs-8">
																				<input type="text" id="latitude" disabled name="latitude" class="form-control latitude" >
																			</div>
																		</div>
																		<div class="form-group">
																			<label  class="control-label col-xs-3">Longitud:</label>
																			<div class="col-xs-8">
																				<input type="text" id="longitude" disabled name="longitude" class="form-control longitude" >
																			</div>
																		</div>

																		<div id="contenedor_MANDA_ERROR"></div><!--EN ESTE DIV TRAE LOS ERRORES DE LA INSERCCION TRAE LAS VALIDACIONES OARA CADA CAMPO CORRESPONIENTE-->

																	</div><!--**5**AQUI TERMINAA EL DIV PARA LA TAB DE MAPA**5**-->																

																</div><!--**2**AQUI TERMINA EL CONTENIDO PARA CADA TAB**2**-->
															</div><!--111-AQUI TERMINA EL DIV PARA CREAR LAS TABS -111-->

														</form><!--AQUI TERMINA LA CREACION DEL FORMULARIO-->
														
														<button type="button" class="btn btn-primary" id="btnGuardar_Fisico" style="display:none">Guardar</button><!--aQUI BLOQUEAMOS EL BOTON PARA QUE CUANDO SELECCIONEN EL RADIO DE CLIENTE FISICO SE ACTIVE-->
														<button type="button" class="btn btn-primary" id="btnGuardar_Moral" style="display:none"
														onclick="document.frm_contactos.no_cliente.value= document.frm_Empresas.txtnoCliente.value,
														document.frm_contactos.rfc.value= document.frm_Empresas.txtrfc_Moral.value">Guardar</button><!--aQUI BLOQUEAMOS EL BOTON PARA QUE CUANDO SELECCIONEN EL RADIO DE CLIENTE MORAL SE ACTIVE
														ademas el evnto "onclick" hace que cuando se pulsa los cmpos de NO_CLIENTE Y RFC  pasen tambien automaticamnete al formulario del comntacto que se encuentra en el archivo
														"modal_registro_cliente.php" y en la modal que lleva por nombre "#Modal_Contacto_Moral" llegan los valores en las respectivas cajas de texto NO CLIENTE Y RFC -->
														<!--button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button-->
														
														<div class="modal inmodal fade" id="myModalSucursal" tabindex="-1" role="dialog"  aria-hidden="true">
															<div class="modal-dialog modal-sm">
																<div class="modal-content">
																	<button type="button" class="close" style="padding-top:5px;padding-right:5px;" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4 class="text-center" style="padding-top:10px;color:gray">Agregar Sucursal</h4>
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-sm-12">
																				
																				<form role="form" class="text-left">
																					<div class="form-group-sm hidden">
																						<label  class="control-label col-xs-5">ID:</label>
																						<div class="col-xs-9 col-md-offset-2">
																							<input type="text" id="txtidSucursal" name="txtidSucursal" class="form-control input-sm txtidSucursal" value="5" disabled>
																						</div>
																					</div>																					
																					<div class="form-group-sm has-success" id="form-controlSucursal">
																						<label  class="col-xs-5">Sucursal:</label>
																						<div class="col-xs-9 col-md-offset-2">
																							<input type="text" id="txtAddSucursal" name="txtAddSucursal" class="form-control input-sm txtAddSucursal" onkeyup="javascript:this.value=this.value.toUpperCase();">
																						</div>
																					</div>
																				</form>
																				
																			</div>
																		</div><div class="text-white badge badge-danger pull-left text-info-Sucursal" style="margin-top:20px"></div>
																	</div>
																	
																	<div class="modal-footer">
																		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
																		<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="addSucursal">Agregar</button>
																	</div>
																</div>
															</div>
														</div>		
														<script type="text/javascript">
															$(document).ready(function(){
																$("#txtmedioPago").change(function(){
																		var op = $("#txtmedioPago option:selected").val();
																		// alert(op);
																		if(op=='NOTA'){
																			$('#txtrfc_Moral').val('CALCULARFCMO');
																			$('#txtrfc_Fisico').val('CALCULARFCFIS');
																			 $( ".form-rfcFi" ).fadeOut( "slow");
																			 $( ".form-rfcMo" ).fadeOut( "slow");
																		}
																		else{
																			$('#txtrfc_Moral').val('');
																			$('#txtrfc_Fisico').val('');
																			$( ".form-rfcFi" ).fadeIn( "slow");
																			$( ".form-rfcMo" ).fadeIn( "slow");
																		}
																});
															});
														</script>
														<script type="text/javascript">
														$("#addSucursal").click(function() {
															var nameSucursal = $("input#txtAddSucursal").val();
															$('.text-info-Sucursal').html('');
															$.ajax({
																type: "POST",
																url: "../repositorio/addOptionSucursal.php",
																data: {nameSucursal:nameSucursal},
																success: function(result) {
																	$('.text-info-Sucursal').append(result);
																	if(result==''){
																		$("input#txtAddSucursal").val('');
																		$('#txtsucursal').append('<option value="'+nameSucursal+'" selected="selected">'+nameSucursal+'</option>');
																		$('#myModalSucursal').modal('toggle'); 
																		
																	}else{
																	// $('#myModalSucursal').modal('toggle'); 
																		$('#form-controlSucursal').removeClass('has-success'); 
																		$('#form-controlSucursal').addClass('has-danger'); 
																	}																	
																}
															});												
															
															return false;
														});
														$(document).on('click', 'a.collapse-link.FormClient i.fa', function() {
															$('.ibox-content.text-center.FormClient').removeClass('hidden');
														});
														//Removes list items with the class done
														$('#clear').click(function(){
															$('#clear').fadeOut('fast');
															//Clear input field when add button is pressed
															$("input[name*='textCondition'").val('');
															$('.done').remove('.done');
														});
															$(document).ready(function()
															{
																$( '#btnGuardar_Fisico' ).click( function (event)
																{//CUANDO EL BOTON ESCUCHA EL EVENTO DE CLICK SE EJECUTA EL SIGUIENTE SCRIPT PARA GUARDAR LOS DATOS QUE VAN
																	//HACIA EL ARCHIVO DE quey_registrat_cliente_fisico.php ES IMPORTANTE QUE SE PONGA "(event)"" en function ya que en Mozilla no escucha este evento
																	 event.preventDefault();//ESTA LINEA NO PERMITE QUE SE EJECUTE LA ACCION COMPLETA ES DECIR EVITA QUE SE RECARGUE LA PAGINA  PERO EJECUTA TODO EL CODIGO																																	
																	
																	//***************************************TRAEMOS LOS VALORES DE LOS INPUTS POR MEDIO DE LAS CLASES*************************
																	var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;//CREAMOS LA VALIDACION PARA EL EMAIL
																	var formCreatedFisico = 'formCreatedFisico';
																	var no_cliente = $( '.txtnoCliente' ).val(),
																	rfc_fisico = $( '.txtrfc_Fisico' ).val(),
																	nombre = $( '.txtnombre' ).val(),
																	apellido_pat = $( '.txtap_P' ).val(),
																	apellido_mat = $( '.txtap_M' ).val(),
																	tel_ofi = $('.txt_tel_ofi_cont' ).val(),
																	tel_celu = $('.txt_tel_cel_cont' ).val(),
																	observaciones = $( '.txt_obs_cont' ).val(),
																	correo = $( '.txt_email_cont' ).val(),
																	hora1 = $( '.hora1' ).val(),
																	hora2 = $( '.hora2' ).val(),
																	hora3 = $( '.hora3' ).val(),
																	hora4 = $( '.hora4' ).val(),
																	sucursal = $( '.txtsucursal' ).val(),
																	nra = $( '.txtnra' ).val(),
																	num_cta = $( '.txtnum_cta' ).val(),
																	giro = $( '.txtgiro' ).val(),
																	ruta = $( '.txtruta' ).val(),
																	estado = $( '.txtestado' ).val(),
																	municipio = $( '.txtmunicipio' ).val(),
																	cp = $( '.txtcp' ).val(),
																	localidad = $( '.txtlocalidad' ).val(),
																	calle = $( '.txtcalle' ).val(),
																	num_int = $( '.txt_num_int' ).val(),
																	num_ext = $( '.txt_num_ext' ).val(),
																	EntreCalle1 = $( '.txtentrecalle1' ).val(),
																	EntreCalle2 = $( '.txtentrecalle2' ).val(),
																	referencia = $( '.txtreferencia' ).val(),
																	latitud = $( '.latitude' ).val(),
																	longitud = $( '.longitude' ).val();
																	medioPago = $( '.txtmedioPago' ).val();
																	metodoPago = $( '.txtmetodoPago' ).val();

																	$(".error").fadeOut().remove();//".errror" es la clase que nos sirve para que s epinte la validaciond ecolor rojo ene l input ademas que luego se desaparesca cuando se escriba

																	if ($(".txtnoCliente").val() == "" )//Linea que quiere decir que cuando venga vacio el input  marque la validacion de lelnar
																	{
																		$(".txtnoCliente").focus().after('<span class="error">Ingrese No.Cliente</span>');//se pinta de color rojo el input mosytrando el mensaje
																		$( '#contenedor_MANDA_ERROR' ).fadeIn( 3000 ).addClass( '' ).html( '<h3>Llena el campo No. de Cliente<h3>' ).fadeOut(3000);//este se muestra en un div en la tercer tab el vcual tambien nos muetsra que lleneemos el campo

																					return false;
																	}
																	if ($(".txtrfc_Fisico").val() == "" )
																	{
																		$(".txtrfc_Fisico").focus().after('<span class="error">Ingrese RFC</span>');
																		$( '#contenedor_MANDA_ERROR' ).fadeIn( 3000 ).addClass( '' ).html( '<h3>Llena el campo RFC<h3>' ).fadeOut(3000);
																		return false;
																	}
																	if ($(".txtrfc_Fisico").val().length != 13)
																	{
																		$(".txtrfc_Fisico").focus().after('<span class="error">13 Digitos</span>');
																		$( '#contenedor_MANDA_ERROR' ).fadeIn( 3000 ).addClass( '' ).html( '<h3>El RFC debe ser de 13 digitos<h3>' ).fadeOut(3000);
																		return false;
																	}
																	if ($(".txtnombre").val() == "" )
																	{
																		$(".txtnombre").focus().after('<span class="error">Ingrese Nombre</span>');
																		$( '#contenedor_MANDA_ERROR' ).fadeIn( 3000 ).addClass( '' ).html( '<h3>Ingrese el campo de Nombre<h3>' ).fadeOut(3000);
																		return false;
																	}
																	if ($(".txt_email_cont").val() == " " || !emailreg.test($(".txt_email_cont").val()))
																	{
																		$(".txt_email_cont").focus().after('<span class="error">Ingrese un email correcto</span>');
																		$( '#contenedor_MANDA_ERROR' ).fadeIn( 3000 ).addClass( '' ).html( '<h3>Ingrese un email correcto<h3>' ).fadeOut(3000);
																		return false;
																	}
																		// SI LOS CAMPOS ESTAN COMPLETOS MANDA LOS PARAMETROS Al archivo "query_registar_cliente_fisico.php" CUANDO ES CORRECTO SE MUESTRAN LOS DATOS EN LA TABLA INFOMATIVA EN EL DIV #contenedor_inserccion_correcta
																			$.post( 'newClient.php' , { formCreatedFisico : formCreatedFisico,no_cliente : no_cliente,rfc_fisico : rfc_fisico,nombre:nombre,apellido_pat:apellido_pat,apellido_mat:apellido_mat,
																					tel_ofi:tel_ofi,tel_celu:tel_celu, observaciones:observaciones, correo:correo,hora1:hora1,hora2:hora2,hora3:hora3,hora4:hora4,sucursal:sucursal,nra:nra, num_cta:num_cta,
																					giro:giro, ruta:ruta, estado:estado, municipio:municipio, cp:cp, localidad:localidad, calle:calle,num_int:num_int, num_ext:num_ext,EntreCalle1:EntreCalle1,EntreCalle2:EntreCalle2, referencia:referencia,
																					latitud:latitud, longitud:longitud, medioPago:medioPago, metodoPago:metodoPago } ,
																			function ( exito )
																			{
																				var rutaFumigacion = $("#hrefFumigacion").attr("href");
																				var destinoFumigacion = $("#hrefFumigacion").attr("href",rutaFumigacion+'?id='+no_cliente);
																				$( '#contenedor_inserccion_correcta' ).removeClass('').html( exito ).fadeIn(2000);//EN ESTE DIV S EPINTA LA TABLA CON LOS DATOS INFORMATIVOS CUANDO LA INSERCCUION FUE CORRECTA
																				document.getElementById("RegistroDeClientes").innerHTML="";
																				$('#ContentDatosClient').removeClass('hidden');
																			});
																				$( '.txtnoCliente' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtrfc_Fisico' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtnombre' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtap_P' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtap_M' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txt_tel_ofi_cont' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txt_tel_cel_cont' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txt_obs_cont' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txt_email_cont' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.hora1' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.hora2' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.hora3' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.hora4' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtsucursal' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtnra' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtnum_cta' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtgiro' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtruta' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtestado' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$(".txtmunicipio").attr("disabled",true);//DESPUES DE QUE INSERTAMOS BLOQUEAMOS EL SELECT
																				$( '.txtmunicipio' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$(".txtcp").attr("disabled",true);//DESPUES DE QUE INSERTAMOS BLOQUEAMOS EL SELECT
																				$( '.txtcp' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$(".txtlocalidad").attr("disabled",true);//DESPUES DE QUE INSERTAMOS BLOQUEAMOS EL SELECT
																				$( '.txtlocalidad' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtcalle' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txt_num_ext' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txt_num_int' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtentrecalle1' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtentrecalle2' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtreferencia' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.latitude' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.longitude' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtmedioPago' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtmetodoPago' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																											
																				
																				$( '.ibox-content.text-center.FormClient' ).addClass('hidden');
																				$( 'a.collapse-link.FormClient i.fa' ).removeClass('fa-chevron-up');
																				$( 'a.collapse-link.FormClient i.fa' ).addClass('fa-chevron-down');
																				$("#Modal_Registro_Cliente").modal("hide");//ESTA LINEA QUIERE DECIR QUE CUANDO SE GUARDEN LOS DATOS SE CIERRE LA VENTANA MODAL
																					//$("#myModal3").modal("show");
																		// FIN SI LOS CAMPOS ESTAN COMPLETOS MANDA LOS PARAMETROS A GUARDAR.PHP CUANDO ES CORRECTO SE MUESTRAN LOS DATOS EN LA TABLA INFOMATIVA EN EL DIV #contenedor_inserccion_correcta

																});
																	$(".txtnoCliente,.txtrfc_Fisico,.txtnombre").bind('blur keyup', function()
																	{
																		// DESPUES DE MANDAR EL MENSAJE DE LLENAR CAMPOS SE VA BORRANDO EL MSJ AL ESCRIBIR
																			if ($(this).val() != "")
																			{
																				 $('.error').fadeOut();
																				return false;
																			}
																		// FIN DESPUES DE MANDAR EL MENSAJE DE LLENAR CAMPOS SE VA BORRANDO EL MSJ AL ESCRIBIR
																	});
																	$(".txt_email_cont").bind('blur keyup', function()
																	{
																		// DESPUES DE MANDAR EL MENSAJE DE LLENAR CAMPOS SE VA BORRANDO EL MSJ AL ESCRIBIR AQUI LOHAE EN EL CAMPO DE EMAIL
																			if ($(".txt_email_cont").val() != "" && emailreg.test($(".txt_email_cont").val()))
																			{
																				$('.error').fadeOut();
																				return false;
																			}
																		//FIN DESPUES DE MANDAR EL MENSAJE DE LLENAR CAMPOS SE VA BORRANDO EL MSJ AL ESCRIBIR AQUI LOHAE EN EL CAMPO DE EMAIL
																	});
															});
														</script>
														<script type="text/javascript">
															$(document).ready(function()
															{
																$( '#btnGuardar_Moral' ).click( function (event)
																{//CUANDO EL BOTON ESCUCHA EL EVENTO DE CLICK SE EJECUTA EL SIGUIENTE SCRIPT PARA GUARDAR LOS DATOS QUE VAN
																//HACIA EL ARCHIVO DE quey_registrat_cliente_fisico.php ES IMPORTANTE QUE SE PONGA (event) en function ya que en Mozilla no escucha este evento
																	event.preventDefault();																																	
																	
																	//TRAEMOS LOS VALORES DE LOS INPUTS POR MEDIO DE LAS CLASES
																	var formCreatedMoral = 'formCreatedMoral';
																	var no_cliente = $( '.txtnoCliente' ).val(),
																	rfc_moral = $( '.txtrfc_Moral' ).val(),
																	razon_social = $( '.txtrazonsocial' ).val(),
																	sucursal = $( '.txtsucursal' ).val(),
																	nra = $( '.txtnra' ).val(),
																	num_cta = $( '.txtnum_cta' ).val(),
																	giro = $( '.txtgiro' ).val(),
																	ruta = $( '.txtruta' ).val(),
																	estado = $( '.txtestado' ).val(),
																	municipio = $( '.txtmunicipio' ).val(),
																	cp = $( '.txtcp' ).val(),
																	localidad = $( '.txtlocalidad' ).val(),
																	calle = $( '.txtcalle' ).val(),
																	num_int = $( '.txt_num_int' ).val(),
																	num_ext = $( '.txt_num_ext' ).val(),
																	EntreCalle1 = $( '.txtentrecalle1' ).val(),
																	EntreCalle2 = $( '.txtentrecalle2' ).val(),
																	referencia = $( '.txtreferencia' ).val(),
																	latitud = $( '.latitude' ).val(),
																	longitud = $( '.longitude' ).val();
																	medioPago = $( '.txtmedioPago' ).val();
																	metodoPago = $( '.txtmetodoPago' ).val();

																	$(".error").fadeOut().remove();

																	if ($(".txtnoCliente").val() == "" )
																	{
																		$(".txtnoCliente").focus().after('<span class="error">Ingrese No.Cliente</span>');
																		$( '#contenedor_MANDA_ERROR' ).fadeIn( 3000 ).addClass( '' ).html( '<h3>Llena el campo No. de Cliente<h3>' ).fadeOut(3000);
																		return false;
																	}
																	if ($(".txtrfc_Moral").val() == "" )
																	{
																		$(".txtrfc_Moral").focus().after('<span class="error">Ingrese RFC</span>');
																		$( '#contenedor_MANDA_ERROR' ).fadeIn( 3000 ).addClass( '' ).html( '<h3>Llena el campo RFC<h3>' ).fadeOut(3000);
																		return false;
																	}
																	if ($(".txtrfc_Moral").val().length != 12)
																	{
																		$(".txtrfc_Moral").focus().after('<span class="error">12 Digitos</span>');
																		$( '#contenedor_MANDA_ERROR' ).fadeIn( 3000 ).addClass( '' ).html( '<h3>El RFC debe ser de 12 digitos<h3>' ).fadeOut(3000);
																		return false;
																	}
																	if ($(".txtrazonsocial").val() == "" )
																	{
																		$(".txtrazonsocial").focus().after('<span class="error">Ingrese Raz&oacute;n Social</span>');
																		$( '#contenedor_MANDA_ERROR' ).fadeIn( 3000 ).addClass( '' ).html( '<h3>Ingrese el campo Raz&oacute;n Social<h3>' ).fadeOut(3000);
																		return false;
																	}
																		// SI LOS CAMPOS ESTAN COMPLETOS MANDA LOS PARAMETROS A GUARDAR.PHP CUANDO ES CORRECTO SE MUESTRAN LOS DATOS EN LA TABLA INFOMATIVA EN EL DIV #contenedor_inserccion_correcta
																			$.post( 'newClient.php' , {formCreatedMoral : formCreatedMoral, no_cliente : no_cliente,rfc_moral : rfc_moral, razon_social:razon_social,sucursal:sucursal, nra:nra, num_cta:num_cta,
																			 giro:giro, ruta:ruta, estado:estado, municipio:municipio, cp:cp, localidad:localidad, calle:calle, num_int:num_int, num_ext:num_ext,EntreCalle1:EntreCalle1,EntreCalle2:EntreCalle2,
																			 referencia:referencia, latitud:latitud, longitud:longitud, medioPago:medioPago, metodoPago:metodoPago } ,
																			function ( exito )
																			{
																				var rutaFumigacion = $("#hrefFumigacion").attr("href");
																				var destinoFumigacion = $("#hrefFumigacion").attr("href",rutaFumigacion+'?id='+no_cliente);
																				$( '#contenedor_inserccion_correcta' ).removeClass('').html( exito ).fadeIn(2000);
																				document.getElementById("RegistroDeClientes").innerHTML="";
																				$('#ContentDatosClient').removeClass('hidden');
																				$('#ContentContactClient').removeClass('hidden');
																			});
																				$( '.txtnoCliente' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtrfc_Moral' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtrazonsocial' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtsucursal' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtnra' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtnum_cta' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtgiro' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtruta' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtestado' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$(".txtmunicipio").attr("disabled",true);//DESPUES DE QUE INSERTAMOS BLOQUEAMOS EL SELECT
																				$( '.txtmunicipio' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$(".txtcp").attr("disabled",true);//DESPUES DE QUE INSERTAMOS BLOQUEAMOS EL SELECT
																				$( '.txtcp' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$(".txtlocalidad").attr("disabled",true);//DESPUES DE QUE INSERTAMOS BLOQUEAMOS EL SELECT
																				$( '.txtlocalidad' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtcalle' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txt_num_ext' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txt_num_int' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtentrecalle1' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtentrecalle2' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtreferencia' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.latitude' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.longitude' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtmedioPago' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				$( '.txtmetodoPago' ).val( '' );// SE LIMPIA EL INPUT DESPUES DE LA INSERCCION
																				
																				$( '.ibox-content.text-center.FormClient' ).addClass('hidden');
																				$( 'a.collapse-link.FormClient i.fa' ).removeClass('fa-chevron-up');
																				$( 'a.collapse-link.FormClient i.fa' ).addClass('fa-chevron-down');
																				$("#Modal_Registro_Cliente").modal("hide");//ESTA LINEA QUIERE DECIR QUE CUANDO SE GUARDEN LOS DATOS SE CIERRE LA VENTANA MODAL
																				$("#Modal_Contacto_Moral").modal({show:true, backdrop: 'static', keyboard: false });//DEPSUES DE QUE ISNERTAMO SE ABRE LA VENTAN AMODLAPRA QUE REGISTREN SU CONTACTO
																		// FIN SI LOS CAMPOS ESTAN COMPLETOS MANDA LOS PARAMETROS A GUARDAR.PHP CUANDO ES CORRECTO SE MUESTRAN LOS DATOS EN LA TABLA INFOMATIVA EN EL DIV #contenedor_inserccion_correcta

																});
																	$(".txtnoCliente,.txtrfc_Moral,.txtrazonsocial").bind('blur keyup', function()
																	{
																		// DESPUES DE MANDAR EL MENSAJE DE LLENAR CAMPOS SE VA BORRANDO EL MSJ AL ESCRIBIR
																			if ($(this).val() != "")
																			{
																				 $('.error').fadeOut();
																				return false;
																			}
																		// FIN DESPUES DE MANDAR EL MENSAJE DE LLENAR CAMPOS SE VA BORRANDO EL MSJ AL ESCRIBIR
																	});
															});
														</script>
														<script src="../web/js/HelperJs/jsCliente/localizacion_Cliente.js"></script>											
														
													</div>
												</div>

											</div>
										</div>
										

								</div>
							</div>
						</div>
					</div>
					<div class="row hidden" id="ContentDatosClient">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>&nbsp; &nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp;Datos Registrados del Cliente</h5>
									<div class="ibox-tools">
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
								</div>
								<div class="ibox-content text-center" style="height:340px">
								
									<style>
										.cuadro_intro_hover{
										padding: 0px;
										position: relative;
										overflow: hidden;
										height: 130px;
										-webkit-transition: all .1s ease-in;
								  transition: all .1s ease-in;
								  box-shadow: 0 3px 20px rgba(0, 0, 0, 0.66);
									}
									.cuadro_intro_hover:hover .caption{
										opacity: 1;
										transform: translateY(-150px);
										-webkit-transform:translateY(-150px);
										-moz-transform:translateY(-150px);
										-ms-transform:translateY(-150px);
										-o-transform:translateY(-150px);
									}
									.cuadro_intro_hover img{
										z-index: 4;
										 box-shadow: 0 14px 64px rgba(0, 0, 0, 0.92);
									}
									.cuadro_intro_hover .caption{
										position: absolute;
										top:150px;
										-webkit-transition:all 0.3s ease-in-out;
										-moz-transition:all 0.3s ease-in-out;
										-o-transition:all 0.3s ease-in-out;
										-ms-transition:all 0.3s ease-in-out;
										transition:all 0.3s ease-in-out;
										width: 100%;
									}
									.cuadro_intro_hover .blur{
										background-color: rgba(0,0,0,0.7);
										height: 130px;
										z-index: 5;
										position: absolute;
										width: 100%;
									}
									.cuadro_intro_hover .caption-text{
										z-index: 10;
										color: #fff;
										position: absolute;
										height: 130px;
										text-align: center;
										top:0px;
										width: 100%;
										
									}
									</style>
									
									
									
									
									<div class="box row col-md-12" style="margin-left:100px">
										<div class="box-inner">
											<div class="col-md-2">
												<div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">
													<div class="cuadro_intro_hover " style="background-color:#cccccc;">
														<p style="text-align:center;">	
															<a href="https://ecosheys.com.mx/servicios/fumigacion-desinfeccion-control-plagas/">	<img src="https://ecosheys.com.mx/assets/controldeplagas.png" width="130" height="130" srcset="https://ecosheys.com.mx/assets/controldeplagas.png 250w, https://ecosheys.com.mx/assets/controldeplagas-150x150.png 150w, https://ecosheys.com.mx/assets/controldeplagas-100x100.png 100w, https://ecosheys.com.mx/assets/controldeplagas-180x180.png 180w" sizes="(max-width: 250px) 100vw, 250px" title="Control de plagas" class="so-widget-image"></a>
														</p>
														<div class="caption">
															<div class="blur"></div>
															<div class="caption-text">
																<h5 style="border-bottom:2px solid white; padding:10px;">Control de Plagas</h5>
																<a class=" btn btn-primary btn-xs" href="Fumigacion/newFumigacion.php" id="hrefFumigacion" style="margin:20px;"><span class="fa fa-plus"> Crear</span></a>
															</div>
														</div>
													</div>												
												</div>												
											</div>
											<div class="col-md-2">
												<div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">
													<div class="cuadro_intro_hover " style="background-color:#cccccc;">
														<p style="text-align:center;">	
															<a href="https://ecosheys.com.mx/servicios/mantenimiento-recarga-venta-extintores/">	<img src="https://ecosheys.com.mx/assets/extintores.png" width="130" height="130" srcset="https://ecosheys.com.mx/assets/extintores.png 250w, https://ecosheys.com.mx/assets/extintores-150x150.png 150w, https://ecosheys.com.mx/assets/extintores-100x100.png 100w, https://ecosheys.com.mx/assets/extintores-180x180.png 180w" sizes="(max-width: 250px) 100vw, 250px" title="Extintores" class="so-widget-image"></a>
														</p>
														<div class="caption">
															<div class="blur"></div>
															<div class="caption-text">
																<h5 style="border-bottom:2px solid white; padding:10px;">Extintores</h5>
																<a class=" btn btn-primary btn-xs disabled" href="http://trovacamporella.com" style="margin:20px;"><span class="fa fa-plus"> Crear</span></a>
															</div>
														</div>
													</div>
												</div>

											</div>
											<div class="col-md-2">
												<div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">
													<div class="cuadro_intro_hover " style="background-color:#cccccc;">
														<p style="text-align:center;">	
															<a href="https://ecosheys.com.mx/servicios/entrega-transporte-tratamiento-y-disposicion-final-de-residuos-peligrosos/">	<img src="https://ecosheys.com.mx/assets/residuospeligrosos.png" width="130" height="130" srcset="https://ecosheys.com.mx/assets/residuospeligrosos.png 250w, https://ecosheys.com.mx/assets/residuospeligrosos-150x150.png 150w, https://ecosheys.com.mx/assets/residuospeligrosos-100x100.png 100w, https://ecosheys.com.mx/assets/residuospeligrosos-180x180.png 180w" sizes="(max-width: 250px) 100vw, 250px" title="Residuos peligrosos" class="so-widget-image"></a>
														</p>
														<div class="caption">
															<div class="blur"></div>
															<div class="caption-text">
																<h5 style="border-bottom:2px solid white; padding:10px;">Residuos Peligrosos</h5>
																<a class=" btn btn-primary btn-xs disabled" href="http://trovacamporella.com" style="margin:20px;"><span class="fa fa-plus"> Crear</span></a>
															</div>
														</div>
													</div>
												</div>

											</div>
											<div class="col-md-2">
												<div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">
													<div class="cuadro_intro_hover " style="background-color:#cccccc;">
														<p style="text-align:center;">	
															<a href="https://ecosheys.com.mx/servicios/entrega-transporte-tratamiento-y-disposicion-final-de-rpbi/">	<img src="https://ecosheys.com.mx/assets/biologicosinfecciosos.png" width="130" height="130" srcset="https://ecosheys.com.mx/assets/biologicosinfecciosos.png 250w, https://ecosheys.com.mx/assets/biologicosinfecciosos-150x150.png 150w, https://ecosheys.com.mx/assets/biologicosinfecciosos-100x100.png 100w, https://ecosheys.com.mx/assets/biologicosinfecciosos-180x180.png 180w" sizes="(max-width: 250px) 100vw, 250px" title="Biológicos infecciosos" class="so-widget-image"></a>
														</p>
														<div class="caption">
															<div class="blur"></div>
															<div class="caption-text">
																<h6 style="border-bottom:2px solid white; padding:10px;">Biológicos Infecciosos</h6>
																<a class=" btn btn-primary btn-xs disabled" href="http://trovacamporella.com" style="margin:20px;"><span class="fa fa-plus"> Crear</span></a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">
													<div class="cuadro_intro_hover " style="background-color:#cccccc;">
														<p style="text-align:center;">	
															<a href="https://ecosheys.com.mx/servicios/capacitacion/">	<img src="https://ecosheys.com.mx/assets/capacitaciones.png" width="130" height="130" srcset="https://ecosheys.com.mx/assets/capacitaciones.png 250w, https://ecosheys.com.mx/assets/capacitaciones-150x150.png 150w, https://ecosheys.com.mx/assets/capacitaciones-100x100.png 100w, https://ecosheys.com.mx/assets/capacitaciones-180x180.png 180w" sizes="(max-width: 250px) 100vw, 250px" title="Capacitaciones" class="so-widget-image"></a>
														</p>
														<div class="caption">
															<div class="blur"></div>
															<div class="caption-text">
																<h5 style="border-bottom:2px solid white; padding:10px;">Capacitaciones</h5>
																<a class=" btn btn-primary btn-xs disabled" href="http://trovacamporella.com" style="margin:20px;"><span class="fa fa-plus"> Crear</span></a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-2">
											</div>											
											<div class="col-md-12" style="margin-top:20px">
											</div>
											<div class="col-md-2">
												<div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">
													<div class="cuadro_intro_hover " style="background-color:#cccccc;">
														<p style="text-align:center;">	
															<a href="https://ecosheys.com.mx/servicios/estudios-y-programas/">	<img src="https://ecosheys.com.mx/assets/estudiosyprogramas.png" width="130" height="130" srcset="https://ecosheys.com.mx/assets/estudiosyprogramas.png 250w, https://ecosheys.com.mx/assets/estudiosyprogramas-150x150.png 150w, https://ecosheys.com.mx/assets/estudiosyprogramas-100x100.png 100w, https://ecosheys.com.mx/assets/estudiosyprogramas-180x180.png 180w" sizes="(max-width: 250px) 100vw, 250px" title="Estudios y programas" class="so-widget-image"></a>
														</p>
														<div class="caption">
															<div class="blur"></div>
															<div class="caption-text">
																<h6 style="border-bottom:2px solid white; padding:10px;">Estudios y Programas</h6>
																<a class=" btn btn-primary btn-xs disabled" href="http://trovacamporella.com" style="margin:20px;"><span class="fa fa-plus"> Crear</span></a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">
													<div class="cuadro_intro_hover " style="background-color:#cccccc;">
														<p style="text-align:center;">	
															<a href="https://ecosheys.com.mx/servicios/asesoria-y-gestion/">	<img src="https://ecosheys.com.mx/assets/asesoriaygestion.png" width="130" height="130" srcset="https://ecosheys.com.mx/assets/asesoriaygestion.png 250w, https://ecosheys.com.mx/assets/asesoriaygestion-150x150.png 150w, https://ecosheys.com.mx/assets/asesoriaygestion-100x100.png 100w, https://ecosheys.com.mx/assets/asesoriaygestion-180x180.png 180w" sizes="(max-width: 250px) 100vw, 250px" title="Asesoría y gestión" class="so-widget-image"></a>
														</p>
														<div class="caption">
															<div class="blur"></div>
															<div class="caption-text">
																<h5 style="border-bottom:2px solid white; padding:10px;">Asesoría y Gestión</h5>
																<a class=" btn btn-primary btn-xs disabled" href="http://trovacamporella.com" style="margin:20px;"><span class="fa fa-plus"> Crear</span></a>
															</div>
														</div>
													</div>
												</div>
											</div>	
											<div class="col-md-2">
												<div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">

												<div class="sow-image-container">
													<img src="https://ecosheys.com.mx/assets/unidadverificacion.png" width="130" height="130" srcset="https://ecosheys.com.mx/assets/unidadverificacion.png 250w, https://ecosheys.com.mx/assets/unidadverificacion-150x150.png 150w, https://ecosheys.com.mx/assets/unidadverificacion-100x100.png 100w, https://ecosheys.com.mx/assets/unidadverificacion-180x180.png 180w" sizes="(max-width: 250px) 100vw, 250px" title="Unidad de verificación" class="so-widget-image">
												</div>

												</div>


											</div>
											<div class="col-md-2">
												<div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">

												<div class="sow-image-container">
												<a href="#">	<img src="https://ecosheys.com.mx/assets/Cursos-online.png" width="130" height="130" srcset="https://ecosheys.com.mx/assets/Cursos-online.png 250w, https://ecosheys.com.mx/assets/Cursos-online-150x150.png 150w, https://ecosheys.com.mx/assets/Cursos-online-100x100.png 100w, https://ecosheys.com.mx/assets/Cursos-online-180x180.png 180w" sizes="(max-width: 250px) 100vw, 250px" title="Cursos Online" class="so-widget-image">
												</a></div>

												</div>
											</div>
										</div>
									</div>
									
									<div id="contenedor_inserccion_correcta" class="hidden"></div>
																		
								</div>
							</div>
						</div>
					</div>
					
					<div class="row hidden" id="ContentContactClient">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>&nbsp; &nbsp; <i class="glyphicon glyphicon-list-alt"></i> &nbsp;Contacto de Cliente Moral</h5>
									<div class="ibox-tools">
										<button type="button" class="btn btn-default btn-xs" style="margin-right:50%" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#Modal_Contacto_Moral">Registro de Contacto</button>
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
								</div>
								<div class="ibox-content text-center" style="height:200px">
									
									<div class="center" id="Contenedor_Contacto_Moral" style="display:none"><!--******11111*****EN ESTE DIV EMPIEZA DONDE SE DIBUJA EL CUADRO DONDDE LLEVA DENTRO EL CONTENIDO-->
										<div class="box col-md-12">
											<div class="box-inner">

													<!-CREACION DEL CUERPO DE  LA VENTANA MODAL PARA EL REGSITRO DE CLIENTES->
														<div class="modal inmodal" id="Modal_Contacto_Moral" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><!--EMPIEZA LA CREACION DE MODA*1*-->
															<div class="modal-dialog"><!--DIV NUMERO 2 CREACION DE VENTANA MODAL CLIENTE**2**-->
																<div class="modal-content animated fadeInDown"><!--DIV NUMERO 3 CREACION DE VENTANA MODAL CLIENTE**3**-->
																	<div class="modal-header"><!--DIV NUMERO 4 CREACION DE VENTANA MODAL CLIENTE**4**-->
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																		</button><!-ESTE ES EL BOTON DE CERRAR LA MODAL LA TACHESITA KE APRACESE ASTA ARRIBA EN LA ESQUINA (X)->
																		<h2 class="modal-title" id="myModalLabel">Registre Contacto del Cliente Moral</h2><!-TITULO DE LA VENTANA MODAL->
																	</div><!--TERMINA DIV NUMERO 4 CREACION DE VENTANA MODAL CLIENTE**4**-->
																		
																	<div class="modal-body"><!--DIV NUMERO 5 CREACION DE VENTANA MODAL EMPEZAMOS HACER EL FORMULARIO CLIENTE**5**-->     
																		<form name="frm_contactos" id="frm_contactos" action="" onsubmit="GuardarContactos(); return false" class="form-horizontal"><!-AQUI INICIA LA CREACION DEL FORMULARIO->  
																			<div class="bs-example tabs-container with-nav-tabs panel-success"><!-111-AQUI EMPIEZA EL DIV PARA CREAR LAS TABS -111->
																				<ul class="nav nav-pills nav-tabs"><!--**22**AQUI LA DECLARACION DELAS LI PARA LAS TABS**22**-->
																				<li class="active"><a data-toggle="tab" href="#Datos_contacto">Datos </a></li>
																				<li><a data-toggle="tab" href="#observaciones_contacto">Observaciones</a></li>
																				</ul><!--**22**AQUI TERMINA LA DECLARACION DELAS LI PARA LAS TABS**22**-->
																					<div class="tab-content"><!-**2**AQUI EMPIEZA EL CONTENIDO PARA CADA TAB **2**->
																						<div id="Datos_contacto" class="tab-pane fade in active"><!-**3**AQUI EMPIEZA EL CONTENIDO PARA LA TAB DE DATOS FISCALES**3**->
																							<br>
																							<div class="form-group">
																								<label class="control-label col-xs-3">No. de Cliente:</label>
																								<div class="col-xs-8">
																									<input type="text" id="no_cliente" name="no_cliente" class="form-control no_cliente" value="" onkeydown="return validarNumeros(event)" disabled="">
																								</div>
																							</div>
																							<div class="form-group">
																								<label class="control-label col-xs-3">RFC:</label>
																								<div class="col-xs-8">
																									<input type="text" id="rfc" name="rfc" class="form-control rfc" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled="">
																								</div>
																							</div>
																							<div class="form-group">
																								<label class="control-label col-xs-3">Nombre:</label>
																								<div class="col-xs-8">
																									<input type="text" id="nombre" name="nombre" class="form-control nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
																								</div>
																							</div>
																							<div class="form-group">
																								<label class="control-label col-xs-3">Ap. Paterno:</label>
																								<div class="col-xs-8">
																									<input type="text" id="app_pat" name="app_pat" class="form-control app_pat" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
																								</div>
																							</div>
																							<div class="form-group">
																								<label class="control-label col-xs-3">Ap. Materno:</label>
																								<div class="col-xs-8">
																									<input type="text" id="app_mat" name="app_mat" class="form-control app_mat" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
																								</div>
																							</div>
																							<div class="form-group">
																								<label class="control-label col-xs-3">Tel&eacute;fono Ofi:</label>
																								<div class="col-xs-8">
																									<input type="text" id="tel_ofi" name="tel_ofi" class="form-control tel_ofi" onkeydown="return validarNumeros(event)">
																								</div>
																							</div>
																							<div class="form-group">
																								<label class="control-label col-xs-3">Tel&eacute;fono Cel:</label>
																								<div class="col-xs-8">
																									<input type="text" id="tel_cel" name="tel_cel" class="form-control tel_cel" onkeydown="return validarNumeros(event)">
																								</div>
																							</div>
																											 
																						</div><!-**3**AQUI TERMINA EMPIEZA EL CONTENIDO PARA LA TAB DE DATOS FISCALES**3**->
																			  
																						<div id="observaciones_contacto" class="tab-pane fade"><!-**4**AQUI EMPIEZA EL DIV PARA LA TAB DE DOMICILIO**4**->
																							<br>
																							<div class="form-group">
																								<label class="control-label col-xs-3">Observaciones:</label>
																								<div class="col-xs-8">
																									<input type="text" id="obs" name="obs" class="form-control obs" onkeyup="javascript:this.value=this.value.toUpperCase();">
																								</div>
																							</div>
																							<div class="form-group">
																								<label class="control-label col-xs-3">Email:</label>
																								<div class="col-xs-8">
																									<input type="email" id="email" name="email" class="form-control email"  >
																								</div>
																							</div>

																							<div class="form-group">
																								<?php include('../repositorio/horarios/hora1_cont_moral.php');?>   
																							</div>
																							 <div class="form-group">
																								<?php include('../repositorio/horarios/hora2_cont_moral.php');?>  
																							</div> 


																							<div class="form-group">
																								<div class="col-xs-12">
																									<input type="submit" id="CONTACTO" name="CONTACTO"  class="btn btn-primary"  value="Guardar">
																								</div>
																							</div>
																				
																						</div><!-**4**AQUI TERMINA EL DIV PARA LA TAB DE DOMICILIO**4**->

																					</div><!-**2**AQUI TERMINA EL CONTENIDO PARA CADA TAB**2**->
																			</div><!-111-AQUI TERMINA EL DIV PARA CREAR LAS TABS -111->

																		</form><!-AQUI TERMINA LA CREACION DEL FORMULARIO->
																	</div><!--TERMINA EL DIV NUMERO 5 CREACION DE VENTANA MODAL EMPEZAMOS HACER EL FORMULARIO CLIENTE**5**-->   

																		<div class="modal-footer">
																			<!--<button type="button" class="btn btn-success" id="btnEnviar">Guardar</button>-->
																			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
																		</div>
																		
																</div><!--DIV NUMERO 3 CREACION DE VENTANA MODAL CLIENTE**3**-->
															</div><!--TERMINA DIV NUMERO 2 CREACION DE VENTANA MODAL CLIENTE**2**-->
														</div><!--DIV DONDE TERMINA  LA CREACION DE MODA*1*-->
												<div id="contenedor_inserccion_correcta"></div><!--LO QUE HACE ESTE DIV ES QUE SE MUESTREN LOS DATOS CUANDO LA INSERCCION SEA CORRECTA
												AQUI TRAE LOS DATOS INFORMATIVOS Y EL BOTON PARA MODIFICAR DE NUEVO EN UNA TABLA -->

												<div id="mostrar_contactos" >
																	
																	
																	
																	
																	
																	<?php
																	
																	
																	$db = new DbCnnx();
			 
																	@$no_cliente=$POST['NO_CLIENTE'];
																	@$rfc=$POST['RFC_EMP'];

																	//REALIZAMOS LA CONSULTA PARA PODER MOSTRAR LOS DATOS EN LA TABLA
																	@$SQL_consulta = sprintf("SELECT *
																	FROM empresas AS emp 
																	inner join contactos as con 
																	on emp.no_cliente=con.no_cliente 
																	where emp.no_cliente='$no_cliente'");
																	
																	@$rec = $db->combo(@$SQL_consulta);
																	
																	?>
																	<div class="table-responsive">
																		<table  class="table table-hover table-responsive table-bordered">
																			<thead>
																				<tr>
																					<th data-field="id_empresa">NO.CLIENTE</th>
																					<th data-field="id_empresa">NOMBRE</th>
																					<th data-field="id_empresa">AP.PATERNO</th>
																					<th data-field="id_empresa">AP.MATERNO</th>
																					<th data-field="id_empresa">EMAIL</th>
																					<th data-field="id_empresa">TEL&Eacute;FONO OF.</th>
																					<th data-field="id_empresa">TEL&Eacute;FONO CEL.</th>
																					<th data-field="id_empresa">MODIFICAR</th>
																				</tr>
																			</thead>
																		<tbody>
																			<?php
																			
																			while ($row = @$rec->fetch_assoc()) {
																				echo "<tr class='text-muted'>";
																				echo "<th style=\"text-align:center;width:1%;font-weight:normal;\">".$row['NO_CLIENTE']."</th>";
																				echo "<th style=\"text-align:center;font-weight:normal;\">".$row['NOMBRE_C']."</th>";
																				echo "<th style=\"text-align:center;font-weight:normal;\">".$row['APP_PATERNO_C']."</th>";
																				echo "<th style=\"text-align:center;font-weight:normal;\">".$row['APP_MATERNO_C']."</th>";
																				echo "<th style=\"text-align:center;font-weight:normal;\">".$row['EMAIL']."</th>";
																				echo "<th style=\"text-align:center;font-weight:normal;\">".$row['TELEFONO_OFI']."</th>";
																				echo "<th style=\"text-align:center;font-weight:normal;\">".$row['TELEFONO_CELL']."</th>";
																				echo "<th style=\"text-align:center;width: 1%;\"><a href=\"#Modal_Actualizar_Contacto\" role=\"button\" class=\"btn btn-sm  btn-primary glyphicon glyphicon-pencil\" data-toggle=\"modal\" id=\"Act^".
																							$row['NO_CLIENTE'] ."^".
																							$row['RFC_EMP'] ."^".
																							$row['NOMBRE_C'] ."^".
																							$row['APP_PATERNO_C'] ."^".
																							$row['APP_MATERNO_C'] ."^".
																							$row['TELEFONO_OFI'] ."^".
																							$row['TELEFONO_CELL'] ."^".
																							$row['OBSERVACIONES'] ."^".
																							$row['EMAIL'] ."^".
																							$row['HOR1'] ."^".
																							$row['HOR2'] ."^".
																							$row['HOR3'] ."^".
																							$row['HOR4'] ."^".
																							"\">Modificar</a> " . " </th>";
																				echo "</tr>";
																				echo "</tbody>";
																			}	
																			?>
																		</tbody>
																	</table>
																</div>  
																
																
																<!-CREACION DEL CUERPO DE  LA VENTANA MODAL PARA EL REGSITRO DE CLIENTES->
																<div class="modal fade" id="Modal_Actualizar_Contacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><!--EMPIEZA LA CREACION DE MODA*1*-->
																	<div class="modal-dialog"><!--DIV NUMERO 2 CREACION DE VENTANA MODAL CLIENTE**2**-->
																		<div class="modal-content animated fadeInDown"><!--DIV NUMERO 3 CREACION DE VENTANA MODAL CLIENTE**3**-->
																			<div class="modal-header"><!--DIV NUMERO 4 CREACION DE VENTANA MODAL CLIENTE**4**-->
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																				</button><!-ESTE ES EL BOTON DE CERRAR LA MODAL LA TACHESITA KE APRACESE ASTA ARRIBA EN LA ESQUINA (X)->
																				<h2 class="modal-title" id="myModalLabel">Modifique datos del Contacto</h2><!-TITULO DE LA VENTANA MODAL->
																			</div><!--TERMINA DIV NUMERO 4 CREACION DE VENTANA MODAL CLIENTE**4**-->
																				
																			<div class="modal-body"><!--DIV NUMERO 5 CREACION DE VENTANA MODAL EMPEZAMOS HACER EL FORMULARIO CLIENTE**5**-->     
																				<form name="frm_contactos_actualizar" action="" onsubmit="ActualizarContactos(); return false" class="form-horizontal"><!-AQUI INICIA LA CREACION DEL FORMULARIO->  
																					<div class="bs-example tabs-container with-nav-tabs panel-success"><!-111-AQUI EMPIEZA EL DIV PARA CREAR LAS TABS -111->
																						<ul class="nav nav-pills nav-tabs"><!--**22**AQUI LA DECLARACION DELAS LI PARA LAS TABS**22**-->
																						<li class="active"><a data-toggle="tab" href="#Datos_contacto_Act">Datos </a></li>
																						<li><a data-toggle="tab" href="#observaciones_contacto_Act">Observaciones</a></li>
																						</ul><!--**22**AQUI TERMINA LA DECLARACION DELAS LI PARA LAS TABS**22**-->
																							<div class="tab-content"><!-**2**AQUI EMPIEZA EL CONTENIDO PARA CADA TAB **2**->
																								<div id="Datos_contacto_Act" class="tab-pane fade in active"><!-**3**AQUI EMPIEZA EL CONTENIDO PARA LA TAB DE DATOS FISCALES**3**->
																									<br>
																									<div class="form-group">
																										<label class="control-label col-xs-3">No. de Cliente:</label>
																										<div class="col-xs-8">
																											<input type="text" id="no_cliente_Act" name="no_cliente_Act" class="form-control no_cliente" onkeydown="return validarNumeros(event)" disabled="">
																											<input type="text" id="no_cliente_Act_auxiliar" name="no_cliente_Act_auxiliar" class="form-control no_cliente_auxiliar" style="display:none"><!--ESTE VALOR LO MANDO PARA QUE PUEDA ACTUALIZAR ES UN AUXILIAR-->
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="control-label col-xs-3">RFC:</label>
																										<div class="col-xs-8">
																											<input type="text" id="rfc_Act" name="rfc_Act" class="form-control rfc" disabled="">
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="control-label col-xs-3">Nombre:</label>
																										<div class="col-xs-8">
																											<input type="text" id="nombre_Act" name="nombre_Act" class="form-control nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
																											<input type="text" id="nombre_Act_auxiliar" name="nombre_Act_auxiliar" style="display:none"><!--ESTE VALOR LO MANDO PARA QUE PUEDA ACTUALIZAR ES UN AUXILIAR-->
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="control-label col-xs-3">Ap. Paterno:</label>
																										<div class="col-xs-8">
																											<input type="text" id="app_pat_Act" name="app_pat_Act" class="form-control app_pat" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="control-label col-xs-3">Ap. Materno:</label>
																										<div class="col-xs-8">
																											<input type="text" id="app_mat_Act" name="app_mat_Act" class="form-control app_mat" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return validarLetras(event)">
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="control-label col-xs-3">Tel&eacute;fono Ofi:</label>
																										<div class="col-xs-8">
																											<input type="text" id="tel_ofi_Act" name="tel_ofi_Act" class="form-control tel_ofi" onkeydown="return validarNumeros(event)">
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="control-label col-xs-3">Tel&eacute;fono Cel:</label>
																										<div class="col-xs-8">
																											<input type="text" id="tel_cel_Act" name="tel_cel_Act" class="form-control tel_cel" onkeydown="return validarNumeros(event)">
																										</div>
																									</div>
																													 
																								</div><!-**3**AQUI TERMINA EMPIEZA EL CONTENIDO PARA LA TAB DE DATOS FISCALES**3**->
																					  
																								<div id="observaciones_contacto_Act" class="tab-pane fade"><!-**4**AQUI EMPIEZA EL DIV PARA LA TAB DE DOMICILIO**4**->
																									<br>
																									<div class="form-group">
																										<label class="control-label col-xs-3">Observaciones:</label>
																										<div class="col-xs-8">
																											<input type="text" id="obs_Act" name="obs_Act" class="form-control obs" onkeyup="javascript:this.value=this.value.toUpperCase();">
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="control-label col-xs-3">Email:</label>
																										<div class="col-xs-8">
																											<input type="email" id="email_Act" name="email_Act" class="form-control email">
																										</div>
																									</div>
																									<div class="form-group">
																										<?php include('../repositorio/horarios/horario1_act_con.php');?>   
																									</div>
																									<div class="form-group">
																										<?php include('../repositorio/horarios/horario2_act_con.php');?>   
																									</div>

																									<div class="form-group">
																										<div class="col-xs-12">
																											<input type="submit" id="btnCONTACTO" name="btnModificarCONTACTO"  class="btn btn-primary"  value="Modificar">
																										</div>
																									</div>
																						
																								</div><!-**4**AQUI TERMINA EL DIV PARA LA TAB DE DOMICILIO**4**->

																							</div><!-**2**AQUI TERMINA EL CONTENIDO PARA CADA TAB**2**->
																					</div><!-111-AQUI TERMINA EL DIV PARA CREAR LAS TABS -111->

																				</form><!-AQUI TERMINA LA CREACION DEL FORMULARIO->
																			</div><!--TERMINA EL DIV NUMERO 5 CREACION DE VENTANA MODAL EMPEZAMOS HACER EL FORMULARIO CLIENTE**5**-->   

																				<div class="modal-footer">
																					<!--<button type="button" class="btn btn-success" id="btnEnviar">Guardar</button>-->
																					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
																				</div>
																				
																		</div><!--DIV NUMERO 3 CREACION DE VENTANA MODAL CLIENTE**3**-->
																	</div><!--TERMINA DIV NUMERO 2 CREACION DE VENTANA MODAL CLIENTE**2**-->
																</div><!--DIV DONDE TERMINA  LA CREACION DE MODA*1*-->


																<!--LO QUE HACE ESTA FUNCION ES PARA PODER CARGAR LOS CAMPOS QUE VIENEN UNIDOS POR MEDIO DE ESTE SIMBOLO "^" EL CUAL SERAN CORTADOS POR MEDIO DE LA INSTRUCCUION SPLIT
																DONDE SE GUARDAN EN FORMA DE ARREGLOS Y LOS PASAMOS AL ID DE CADA INPUT --> 
																<script>
																	$(function()
																	{     
																		$('body').click(function(evt)
																		{    
																			var IdBotones = evt.target.id
																			//alert(">" + IdBotones + "<");
																			var Prefijo = IdBotones.substring(0, 3);

																			//alert(">" + Prefijo + "<");
																			if (Prefijo == "Act")
																			{
																				//alert(IdBotones );
																				var arr = IdBotones.split('^');
																				var strNo_Cliente = arr[1] 
																				var strRFC_EMPRESA = arr[2] ;
																				var strNOMBRE = arr[3] ;
																				var strAPPATERNO = arr[4] ;
																				var strAPMATERNO = arr[5] ;
																				var strTEL_OFI = arr[6] ;
																				var strTEL_CELL = arr[7] ;
																				var strOBSERV = arr[8] ;
																				var strEMAIL = arr[9] ;
																				var strHOR_ATEN1 = arr[10] ;
																				var strHOR_ATEN2 = arr[11] ;
																				var strHOR_ATEN3 = arr[12] ;
																				var strHOR_ATEN4 = arr[13] ;

																				$('#no_cliente_Act_auxiliar').val(strNo_Cliente);//este valor lo voy a mandar para que me sirva de auxiliar para poder actualizar 
																				$('#nombre_Act_auxiliar').val(strNOMBRE);//este valor lo voy a mandar para que me sirva de auxiliar para poder actualizar 
																				$('#no_cliente_Act').val(strNo_Cliente);
																				$('#rfc_Act').val(strRFC_EMPRESA);
																				$('#nombre_Act').val(strNOMBRE);
																				$('#app_pat_Act').val(strAPPATERNO);
																				$('#app_mat_Act').val(strAPMATERNO);
																				$('#tel_ofi_Act').val(strTEL_OFI);
																				$('#tel_cel_Act').val(strTEL_CELL);
																				$('#hora1_act_con').val(strHOR_ATEN1);
																				$('#hora2_act_con').val(strHOR_ATEN2);
																				$('#hora3_act_con').val(strHOR_ATEN3);
																				$('#hora4_act_con').val(strHOR_ATEN4);          
																				$('#obs_Act').val(strOBSERV);
																				$('#email_Act').val(strEMAIL);
																						
																		   }
																		   else if (IdBotones == "guardar")
																		   {         
																		   }         
																		});
																	});
																</script>
																<!--LO QUE HACE ESTA FUNCION ES PARA PODER CARGAR LOS CAMPOS QUE VIENEN UNIDOS POR MEDIO DE ESTE SIMBOLO "^" EL CUAL SERAN CORTADOS POR MEDIO DE LA INSTRUCCUION SPLIT
																DONDE SE GUARDAN EN FORMA DE ARREGLOS Y LOS PASAMOS AL ID DE CADA INPUT --> 
																	
																	
																
																	
																	
																	
																	
																	
																	




												</div><!--eSTE DIV LO OCUPO PARA PODER TRAER LOS DATOS DESPUES DE QUE REGISTRAMOS UN CONTACTO
												DE UN CLIENTE MORAL TAMBIEN NOS SIRVE PARA PODERLO ACTUALIZAR ESTE DIV ESTA DECLARADO EN EL ARCHIVO "js/ajax_contactos_morales.js"-->
											</div>
										</div>
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
    location.href = '../';
</script>";
}
?>