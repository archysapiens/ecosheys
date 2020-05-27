<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
     table(); ?>
							
		<div id="wrapper">
			<?php //navbar($activeDesk='',$activeAdmin='active',$activeFumi=''); ?>
			<?php navbar($activeMod='activeAdmin',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper(); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">

					<div class="row" style="padding-top:10px;">
						<div class="row">
							<div class="col-lg-10 col-sm-offset-1">
								<div class="ibox float-e-margins">
									<div class="ibox-title">
										<h5>Actualizar Contratos de Servicios Ecosheys </h5>
										<div class="ibox-tools">
											<a class="collapse-link">
												<i class="fa fa-chevron-up"></i>
											</a>
										</div>
									</div>

									<div class="ibox-content text-center">
													
										<div class="row">
											<div class="col-lg-12">
												<div class="table-responsive">
													<table class="table table-sm table-striped table-bordered table-hover dataTables-contratos" >
														<thead class="bg-success">
														<tr>
															<th>ID</th> 
															<th>CLIENTE</th> 
															<th>USUARIO</th>
															<th>VENDEDOR</th>
															<th>COSTO</th>
															<th>VER</th>
															<th>ACTUALIZAR</th>
															<!--th>VER</th-->
														</tr>
														</thead>
														<tbody>
														  <?php
															$db = new DbCnnx();

															$SQL_search_contratos = sprintf("select emp.RAZON_SOCIAL,CONCAT(emp.NOMBRE,' ',emp.APP_PATERNO,' ',emp.APP_MATERNO) AS CLIENTE,co.DIA_SEMANA,co.CLAVE_FRECUENCIA,
															co.PERIODICIDAD,co.COSTO,co.CLAVE,emp.NO_CLIENTE,co.NO_CLIENTE_EMP,co.VENDEDOR,co.USUARIO,co.RFC_EMPRESA,co.KG_PERM_POR_CONTRATO,co.NO_GENERADOR,
															co.CLAVE_INSUMO_BOLSAS,co.CLAVE_INSUMO_CONTENEDORES,co.CANTIDAD_BOLSAS,co.CANTIDAD_CONTENEDORES,co.COSTO_BOLSAS,co.COSTO_CONTENEDORES,
															co.CLAVE_INSUMO_BOLSAS2,co.CLAVE_INSUMO_CONTENEDORES2,co.CANTIDAD_BOLSAS2,co.CANTIDAD_CONTENEDORES2,co.COSTO_BOLSAS2,co.COSTO_CONTENEDORES2,
															co.DIA_SEMANA_2
															from contratos as co 
															inner join frecuencias as fre 
															on co.clave_frecuencia= fre.clave_frecuencia 
															inner join empresas as emp 
															on co.rfc_empresa=emp.rfc and emp.NO_CLIENTE=co.NO_CLIENTE_EMP
															where emp.NO_CLIENTE=co.NO_CLIENTE_EMP and co.clave_frecuencia= fre.clave_frecuencia and co.rfc_empresa=emp.rfc ORDER BY emp.NO_CLIENTE DESC");
															
															$rec = $db->combo($SQL_search_contratos);
															
															echo"<tr class='gradeD'>";
															while ($row = $rec->fetch_assoc()){
																
																echo "<td class='text-small text-success'>".$row['NO_CLIENTE_EMP']."</td>";
																echo "<td class='text-small'>".$row['RAZON_SOCIAL']." ".utf8_encode($row['CLIENTE'])."</td>";						
																echo "<td class='text-small'>".$row['USUARIO']."</td>";
																echo "<td class='text-small'>".utf8_encode($row['VENDEDOR'])."</td>";
																echo "<td class='text-small'>$".$row['COSTO']."</td>";
																echo "<td><a href='/ecopruebas/rpbi/pdf_rpbi/pdfrpbi_contrato.php?clave=". $row['NO_CLIENTE_EMP'] ."&rfc=".$row['RFC_EMPRESA']."' role='button' class='btn btn-warning btn-xs glyphicon glyphicon-file'> Contratos</a></td>";
																echo "<td><a href='#myModal' role='button' class='btn btn-xs  btn-info glyphicon glyphicon-floppy-saved'  data-toggle='modal' id=\"Act@".
																		$row['CLAVE'] ."@".
																		$row['NO_CLIENTE'] ."@".
																		$row['CLAVE_FRECUENCIA'] ."@".
																		$row['DIA_SEMANA'] ."@".
																		$row['DIA_SEMANA_2'] ."@".
																		$row['PERIODICIDAD'] ."@".
																		$row['COSTO'] ."@".
																		utf8_encode($row['CLIENTE']).''.$row['RAZON_SOCIAL']."@".
																		$row['KG_PERM_POR_CONTRATO'] ."@".
																		$row['NO_GENERADOR'] ."@".
																		$row['CLAVE_INSUMO_BOLSAS'] ."@".
																		$row['CANTIDAD_BOLSAS'] ."@".
																		$row['COSTO_BOLSAS'] ."@".
																		$row['CLAVE_INSUMO_CONTENEDORES'] ."@".
																		$row['CANTIDAD_CONTENEDORES'] ."@".
																		$row['COSTO_CONTENEDORES'] ."@".
																		$row['CLAVE_INSUMO_BOLSAS2'] ."@".
																		$row['CANTIDAD_BOLSAS2'] ."@".
																		$row['COSTO_BOLSAS2'] ."@".
																		$row['CLAVE_INSUMO_CONTENEDORES2'] ."@".
																		$row['CANTIDAD_CONTENEDORES2'] ."@".
																		$row['COSTO_CONTENEDORES2'] ."@".
																		"\"> Actualizar</a></td>";

															  echo "</tr>";
															}
														  ?>
														
														</tbody>
													</table>
												</div>
												
											</div>
										</div>
									</div>
									
									<!--INICIO INTERFAS VENTANA MODAL ACTUALIZAR PRECIO-->
									<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content" >
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true" > &times;</button>
													<div align="center">
														<h2> CONTRATOS </h2>
														<input type="submit" class="btn btn-primary hidden" id="cliente_ecosheys" name="cliente_ecosheys">
													</div>
												</div>

												<div class="modal-body">
														  
													<form  name="flogin" action="" onsubmit="enviarDatosEmpleado(); return false"  >
														<div class="row" >
															<div  class="box col-md-12">
																<div class="panel panel-primary" align="center">
																	<div class="panel-heading" id="Panelcliente_ecosheys">
																		<a href="#" role="button" class="btn btn-round btn-sm btn-primary"> DATOS PERSONALES</a>
																	</div>
																	<div class="panel-body">
														

																																																			  
																			<label style="margin-top:4%;margin-left:-80%;">NO CLIENTE</label>
																			<input type="text" class="form-control" style="margin-top:-6%;width:50%;margin-left:47%;display:none" id="clientes" name="clientes" disabled="disabled">
																			<input type="text" class="form-control" style="margin-top:-6%;width:50%;margin-left:47%;" id="no_cliente" name="no_cliente" disabled="disabled">
																				   
																			<label style="margin-top:4%;margin-left:-80%;">FRECUENCIA</label>
																			<select id="frecuencias" name="frecuencias" class="form-control diass"  style="margin-top:-6%;width:50%;margin-left:47%;"  disabled="disabled">
																				<option value="1">Semanal 1 </option>  
																				<option value="2">Semanal 2 </option> 
																				<option value="3">Quincenal</option>  
																				<option value="4">Mensual</option> 
																				<option value="5">Bimestral</option>  
																				<option value="6">Trimestral</option> 
																				<option value="7">Cuatrimestral</option>  
																				<option value="8">Semestral</option>
																				<option value="9">Anual</option> 
																				<option value="10">Tres Veces por Mes</option>                  
																			</select>

																			<label style="margin-top:4%;margin-left:-92%;">DIA</label>
																			<select id="dias" name="diass" class="form-control diass"  style="margin-top:-6%;width:23%;margin-left:20%;"  disabled="disabled">
																				<option value="1">Lunes</option>
																				<option value="2">Martes</option> 
																				<option value="3">Miercoles</option> 
																				<option value="4">Jueves</option> 
																				<option value="5">Viernes</option>              
																			</select>

																			 <select id="dias2" name="diass2" class="form-control diass"  style="margin-top:-6%;width:23%;margin-left:74%;"  disabled="disabled">
																				<option value="0"></option>
																				<option value="1">Lunes</option>
																				<option value="2">Martes</option> 
																				<option value="3">Miercoles</option> 
																				<option value="4">Jueves</option> 
																				<option value="5">Viernes</option>              
																			</select>

																			<label style="margin-top:4%;margin-left:-78%;">PERIODICIDAD</label>
																			
																			 <select id="periodicidad" name="periodicidads" class="form-control diass"  style="margin-top:-6%;width:50%;margin-left:47%;"  disabled="disabled">
																				<option value="0"></option>
																				<option value="1">1</option> 
																				<option value="2">2</option> 
																				<option value="3">3</option> 
																				<option value="4">4</option>              
																			</select>

																			<label style="margin-top:4%;margin-left:-76%;">KG PERMITIDOS </label>
																			<input type="text" class="form-control" style="margin-top:-6%;width:50%;margin-left:47%;" id="kg_x_contrato" name="kg_x_contrato" >

																			<label style="margin-top:4%;margin-left:-74%;">NIVEL GENRADOR </label>
																			<select id="nivel_generador" name="nivel_generador" class="form-control diass"  style="margin-top:-6%;width:50%;margin-left:47%;"  >
																				<option value="I">I</option>
																				<option value="II">II</option> 
																				<option value="III">III</option>           
																			</select>

																			<label style="margin-top:4%;margin-left:-86%;">BOLSAS</label>
																			<select name="txt_tipo_bolsas" id="txt_tipo_bolsas" onChange="agregarOpcionesbolsas(this.form)" class="form-control diass"  style="margin-top:-7%;width:35%;margin-left:32%;">
																				<option value="1">BOLSA ROJA 30 X 40 CALIBRE 200 $2</option>
																				<option value="2">BOLSA ROJA 55 X 60 CALIBRE 200 $3.5</option>
																				<option value="3">BOLSA ROJA JUMBO CALIBRE 200 $12</option>
																				<option value="4">BOLSA AMARILLA DE 55 X 60 CALIBRE 300 $4</option>					                 
																			</select><br><br>

																			<select name="txt_tipo_bolsas_precio" id="txt_tipo_bolsas_precio" class="form-control diass"  style="margin-top:-7%;width:35%;margin-left:32%;display:none">						                     
																				<option value="2">2</option>
																				<option value="3.5">3.5</option>
																				<option value="12">12</option>
																				<option value="4">4</option>
																			</select>
																			<input type="text" class="form-control" style="margin-top:-13%;width:14%;margin-left:83%;" required id="txt_cantidad_bolsas"  name="txt_cantidad_bolsas" onkeydown="return validarNumeros(event)" placeholder="Cantidad...">
																		 
																			<label style="margin-top:4%;margin-left:-75%;">CONTENEDORES</label>
																			<select name="txt_tipo_contenedor" id="txt_tipo_contenedor" onChange="agregarOpcionescontenedores(this.form)" class="form-control diass"  style="margin-top:-7%;width:35%;margin-left:32%;">						                                                   
																				<option value="5">CONTENEDOR ROJO CHICO 1 LITRO $ 30</option>
																				<option value="6">CONTENEDOR ROJO GRANDE 3 LITROS $ 80</option>		
																			</select><br><br>

																			<select name="txt_tipo_contenedor_precio" id="txt_tipo_contenedor_precio" class="form-control diass"  style="margin-top:-7%;width:35%;margin-left:32%;display:none">						                                                     
																				<option value="30">30</option>
																				<option value="80">80</option>
																			</select><br><br>
																			<input type="text" class="form-control" style="margin-top:-20%;width:14%;margin-left:83%;"  required id="txt_cantidad_contenedores" name="txt_cantidad_contenedores" onkeydown="return validarNumeros(event)" placeholder="Cantidad...">
																			 
																			<!--NUEVOS CAMPOS-->
																				<label style="margin-top:4%;margin-left:-84%;">BOLSAS 2</label>
																				<select name="txt_tipo_bolsas2" id="txt_tipo_bolsas2" onChange="agregarOpcionesbolsas(this.form)" class="form-control diass"  style="margin-top:-7%;width:35%;margin-left:32%;">
																					<option value="1">BOLSA ROJA 30 X 40 CALIBRE 200 $2</option>
																					<option value="2">BOLSA ROJA 55 X 60 CALIBRE 200 $3.5</option>
																					<option value="3">BOLSA ROJA JUMBO CALIBRE 200 $12</option>
																					<option value="4">BOLSA AMARILLA DE 55 X 60 CALIBRE 300 $4</option>					                 
																				</select>

																				<select name="txt_tipo_bolsas_precio2" id="txt_tipo_bolsas_precio2" class="form-control diass"  style="margin-top:-7%;width:35%;margin-left:32%;display:none">						                     
																					<option value="2">2</option>
																					<option value="3.5">3.5</option>
																					<option value="12">12</option>
																					<option value="4">4</option>
																				</select><br><br>
																				<input type="text" class="form-control" style="margin-top:-13%;width:14%;margin-left:83%;" required id="txt_cantidad_bolsas2"  name="txt_cantidad_bolsas2" onkeydown="return validarNumeros(event)" placeholder="Cantidad...">
																		  
																				<label style="margin-top:4%;margin-left:-73%;">CONTENEDORES 2</label>
																				<select name="txt_tipo_contenedor2" id="txt_tipo_contenedor2" onChange="agregarOpcionescontenedores(this.form)" class="form-control diass"  style="margin-top:-7%;width:35%;margin-left:32%;">						                                                   
																					<option value="5">CONTENEDOR ROJO CHICO 1 LITRO $ 30</option>
																					<option value="6">CONTENEDOR ROJO GRANDE 3 LITROS $ 80</option>		
																				</select><br><br>

																				<select name="txt_tipo_contenedor_precio2" id="txt_tipo_contenedor_precio2" class="form-control diass"  style="margin-top:-7%;width:35%;margin-left:32%;display:none">						                                                     
																					<option value="30">30</option>
																					<option value="80">80</option>
																				</select><br><br>
																				<input type="text" class="form-control" style="margin-top:-20%;width:14%;margin-left:83%;"  required id="txt_cantidad_contenedores2" name="txt_cantidad_contenedores2" onkeydown="return validarNumeros(event)" placeholder="Cantidad...">
																			  
																			 <!--FIN NUEVOS CAMPOS-->



																			<label style="margin-top:4%;margin-left:-87%;">COSTO</label>
																			<input type="text" class="form-control" style="margin-top:-6%;width:50%;margin-left:47%;" id="costos" name="costos" >
																	</div>
																</div>
															</div>
														</div>
															<button class="btn btn-primary" type="submit" style="margin-top:1%;margin-left:69%">Guardar</button>
															<button class="btn btn-warning"  data-dismiss="modal"  style="margin-top:-6%;margin-left:86%">Cerrar</button>	
													</form>		                                      			    			              			            
												</div>
											</div>
										</div>
									</div>
									<!--FIN INICIO INTERFAS VENTANA MODAL ACTUALIZAR PRECIO-->
									<!--FIN INICIO PROCESO DE LA TABLA Y VENTANA MODAL-->
									
								</div>
							</div>														
						</div>  
					</div>
				</div>
			</div>
		</div>
		
    </body>
	
<?php
}
else{
    session_unset();
    echo"<script>;
    location.href = '../';
</script>";
}
?>