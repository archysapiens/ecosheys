<?php
	sleep(1);
	require('../../bd/bd.php');
	require('../../repositorio/NiceDate.php');
		$noFolio = $_REQUEST['noFolio'];
		$db = new DbCnnx();
		$sqlIdTables = "SELECT * FROM valid_modulo WHERE ID_VALID='$noFolio' and TYPE_USER <> 'AddEmailEnvio'"; 
		$stmtArea = $db->combo($sqlIdTables); ?>
			<!-- START TIMELINE -->
				<div class="timeline timeline-right">                                
					<!-- START TIMELINE ITEM -->
					<div class="timeline-item timeline-main">
						<div class="timeline-date">2017</div>
					</div>
					<!-- END TIMELINE ITEM -->	<?php			
						while ($fila = $stmtArea->fetch_assoc()) { 
						
							$nomUser=utf8_decode($fila["NOMBRE_USER"]); 
							$typeUser=utf8_decode($fila["TYPE_USER"]); 
							$fechaValidacion='Pendiente...';
							if($fila["FECHA_VALIDACION"]!='0000-00-00 00:00:00'){ $fechaValidacion=timeAgo($fila["FECHA_VALIDACION"]);  }							
							$emailUser=$fila["CORREO_ENVIO"]; ?>
							<!-- START TIMELINE ITEM -->
								<div class="timeline-item timeline-item-right">
									<?php if($typeUser=='CLIENTE'){ echo "<br/><div class='dividerTimeline' style='color:#a94442'>Firma de Recibido</div><br/> ";}  ?>
									<div class="timeline-item-info text-muted" style="font-size:9px"><?php echo $fechaValidacion; ?></div>
									<div class="timeline-item-icon"><span class="fa <?php if($fila["VALID"]=='true'){ echo "fa-check"; }else{ echo "fa-times"; } ?>" style=" <?php if($fila["VALID"]=='true'){ echo "color:rgba(14,134,110,0.92)"; }else{ echo "color:rgb(185,38,38)"; } ?> "></span></div>
									<div class="timeline-item-content" style="border-left:3px solid #aba6a6;">
										<div class="timeline-heading">
											<i class="fa fa-user fa-2x"></i> &nbsp <a href="#"><?php echo utf8_encode($nomUser); ?></a>
											 <?php if($fila["URL_FIRMA"]!=''){?><img src="<?php echo $fila["URL_FIRMA"]; ?>" width="500px;" height="500px;" class="img"/><?php } ?>
										</div>
																			  
										<div class="timeline-footer">
											<a href="#"><?php echo $emailUser; ?></a>
											<div class="pull-right text-muted small">
												<span class="fa fa-info"></span> <?php echo $typeUser; ?>
												
											</div>
										</div>
									</div>
								</div>       
							<!-- END TIMELINE ITEM --> 	 <?php
						} ?>
						
					<!-- START TIMELINE ITEM -->
					<div class="timeline-item timeline-main">
						<div class="timeline-date"><a href="#"><span class="fa fa-ellipsis-h"></span></a></div>
					</div>                                
					<!-- END TIMELINE ITEM -->
				</div>
			<!-- END TIMELINE -->
			
						
			
												
												<?php

?>

