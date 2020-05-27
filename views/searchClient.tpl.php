<?php
if(isset($_SESSION['sesionUsuario']) & @$_COOKIE['id']!=''){
	 loadCss($loadCssHeader); 
     table($sufijo); ?>
	
	 <script>
      $(function(){
      $('#RAZON_SOCIAL').autocomplete({
        source :'Autocomplite/traer_datos_autocomplite'
          })
        });
      </script>
		<!-- begin #page-loader -->
			<div id="page-loader" class="fade in"><span class="contactPic"></span></div>
		<!-- end #page-loader -->
		<div id="wrapper">
			<?php// navbar($activeDesk='',$activeAdmin='active',$activeFumi='',$activeExtin='',$sufijo,$sufijoMenu); ?>
			<?php navbar($activeMod='activeAdmin',$sufijo,$sufijoMenu); ?>
			
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<?php navbarWrapper($sufijo,$sufijoMenu); ?>
				<?php rowWrapper(@$breadcrumb,@$breadcrumbPrincipal); ?>
				
				<div class="wrapper wrapper-content animated fadeInRight" id="main_page" style="padding-top:0px;">

					<div class="row" style="padding-top:10px;">
						<div class="row" id="tabla_remesa">
							<!--div class="col-lg-10 col-sm-offset-1"-->
							<div class="col-lg-12">
								<div class="ibox float-e-margins">
									<div class="ibox-title">
										<!--h5>Actualizar Clientes de Servicios Ecosheys </h5-->
										<div class="ibox-tools">
											<a class="collapse-link TableClient">
												<i class="fa fa-chevron-up"></i>
											</a>
										</div>
									</div>

									<div class="ibox-content text-center TableClient">
										<div class="row hidden">
											<div id="tablamain" class="col-lg-8 col-sm-offset-2">
												<form name="f_prac" id="f_prac"  class="form-horizontal" action="interfaz_actualizar_empresas_general.php" method="post">
												  <div class="form-group">
													<div class="col-lg-10">
														<br>
														<div class="input-group">
														  <input type="text" class="form-control " placeholder="Buscar Cliente" name="RAZON_SOCIAL" id="RAZON_SOCIAL">
														  <span class="input-group-btn">
														  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
														  </span>
														</div>
													  </div>
												  </div>
												</form>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="table-responsive">
													<table class="table table-sm table-striped table-bordered table-hover dataTables-example" >
														<thead class="bg-success">
														<tr>
															<th>ID</th> 
															<th>RFC</th> 
															<th>CLIENTE</th>
															<th>ESTADO</th>
															<th>MUNICIPIO</th>
															<th>CP</th>
															<th>LOCALIDAD</th>
															<th>VER</th>
														</tr>
														</thead>
														<tbody>
														  <?php
															$db = new DbCnnx();

															$SQL_search_empresas = sprintf("select * from empresas order by NO_CLIENTE asc");
															
															$rec = $db->combo($SQL_search_empresas);
															
															echo"<tr class='gradeX'>";
															while ($row = $rec->fetch_assoc()){
									
																echo "<td class='text-small text-success'>" . $row['NO_CLIENTE'] . "</td>";
																echo "<td class='text-small'>" . $row['RFC'] . "</td>";
																echo "<td class='text-small'>" . $row['RAZON_SOCIAL']." ".utf8_encode($row['NOMBRE'])." ".utf8_encode($row['APP_PATERNO'])." ".utf8_encode($row['APP_MATERNO']) . "</td>";
																echo "<td class='text-small'>" . $row['ESTADO'] . "</td>";
																echo "<td class='text-small'>" . $row['DEL_MPIO'] . "</td>";
																echo "<td class='text-small'>" . $row['CP'] . "</td>";
																echo "<td class='text-small'>" . $row['COLONIA'] . "</td>";
																$razonSocialSend=$row['NO_CLIENTE'] . $row['RAZON_SOCIAL'] . utf8_encode($row['NOMBRE']) . utf8_encode($row['APP_PATERNO']) . utf8_encode($row['APP_MATERNO']);
																echo "<td><a href='#' class='btn btn-primary btn-xs loadSearchModal' name='loadSearchModal' value='".$row['NO_CLIENTE']."' role='button'>Ver</a></td>";

															  echo "</tr>";
															}
														  ?>
														
														</tbody>
													</table>
												</div>
												
											</div>
										</div>
									</div>
									
								</div>
							</div>
							
							<div class="col-lg-10 col-sm-offset-1 ShowCliente hidden">
								<div class="ibox float-e-margins">
									<div class="ibox-title">
										<h5>Datos Cliente</h5>
										<div class="ibox-tools">
											<a class="collapse-link collapse-Windown">
												<i class="fa fa-chevron-up"></i>
											</a>
										</div>
									</div>
									<div class="ibox-content ibox-content-Windown text-center" style="height:520px">
										<div id="contenedor_SearchModal_correcta"></div>
										<div id="respuesta"></div>										
									</div>
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