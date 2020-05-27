<?php
sleep(1);
require('../../bd/bd.php');

$db = new DbCnnx();

if($_REQUEST['noCliente']!='')
{
	$noCliente= $_REQUEST['noCliente'];
	@$txtSucu= $_REQUEST['txtSucu'];
	@$TypeAutocomplite= $_REQUEST['TypeAutocomplite'];
	@$TypeReportFumi= $_REQUEST['TypeReportFumi'];
	$DirJson='';
	@$fecha_actual = new DateTime(date("Y-m-d",time()));
	
	$QuerySearch = "SELECT cont.NOMBRE_C,cont.APP_PATERNO_C,cont.APP_MATERNO_C,cont.EMAIL,emp.GIRO,emp.NOMBRE,emp.APP_PATERNO,emp.APP_MATERNO,emp.ESTADO,emp.DEL_MPIO,emp.COLONIA,emp.CP,emp.CALLE,emp.NUM_EXT,emp.NUM_INT FROM empresas AS emp,contactos AS cont  WHERE emp.no_cliente=$noCliente AND cont.no_cliente=$noCliente;";
	$rec = $db->combo($QuerySearch);
	$count = 0;
	while ($row = $rec->fetch_assoc()) {
		$count++;
		$NombreCliente=$row['NOMBRE'].' '.$row['APP_PATERNO'].' '.$row['APP_MATERNO'];
		$NombreClienteMo=$row['NOMBRE_C'].' '.$row['APP_PATERNO_C'].' '.$row['APP_MATERNO_C'];
		$DireccionCliente=$row['CALLE'].' / '.$row['NUM_INT'].' / '.$row['NUM_EXT'].' / '.$row['COLONIA'].' / '.$row['DEL_MPIO'].' / '.$row['ESTADO'].'-'.$row['CP'];		

		if($row['EMAIL']==''){$Correo='';}else{$Correo=$row['EMAIL'];}
		if($row['GIRO']==''){$Giro='GIRO';}else{$Giro=$row['GIRO'];}
		
		if($row['NOMBRE']==''){
			$ResultFinal = $NombreClienteMo.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo;
		}else{
			$ResultFinal = $NombreCliente.' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo;}
	}
	if (@$count>0){
		
		switch ($TypeAutocomplite) {
			case "AutocompliteCerticateFumi":
				
					$QuerySearchCertifi = "SELECT * FROM fumigacion WHERE NO_CLIENTE=$noCliente GROUP BY NO_CLIENTE";
					// $QuerySearchCertifi = sprintf("CALL querySearchCertifiFumi('$noCliente')");
					$recCertifi = $db->combo($QuerySearchCertifi);
					if($recCertifi->num_rows >=1 ){
						$QuerySearchCertifiStore = "SELECT FECHA_SERVICIO,NO_FOLIO FROM fumigacion WHERE NO_CLIENTE=$noCliente GROUP BY NO_CLIENTE";
						$recCertifiStore = $db->select($QuerySearchCertifiStore);
						$fecha_entrada = new DateTime($recCertifiStore[0]["FECHA_SERVICIO"]);
						$getNoFolio = $recCertifiStore[0]["NO_FOLIO"];
						$DiffDateTime = $fecha_actual->diff($fecha_entrada);
							if($DiffDateTime->days >=30 ){
									$Query1 ="DELETE FROM fumigacion WHERE NO_FOLIO='$getNoFolio'"; $db->query($Query1);
									$Query2 ="DELETE FROM valid_modulo WHERE ID_VALID='$getNoFolio'"; $db->query($Query2);
								$count1 = 0;
							}else{
								$count1 = 0;
								while ($rowCertifi = $recCertifi->fetch_assoc()) {
									$count1++;
									$NO_FOLIO=$rowCertifi['NO_FOLIO'];
									$HORA_INICIO=$rowCertifi['HOR_INICIO']; $HORA_FINALIZADO=$rowCertifi['HOR_FINALIZADO'];
									$AREAS_FUMIGAR=$rowCertifi['AREAS_FUMIGAR']; 
									if($AREAS_FUMIGAR==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_areas_fumigar WHERE NOMBRE='$AREAS_FUMIGAR' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$AREAS_FUMIGAR=$fila["ID"]; }
									}
									$TIPO_FUMIGACION=$rowCertifi['TIPO_FUMIGACION'];
									if($TIPO_FUMIGACION==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_tipo_fumigacion WHERE NOMBRE='$TIPO_FUMIGACION' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$TIPO_FUMIGACION=$fila["ID"]; }
									}
									$PLAGAS_CONTROL=$rowCertifi['PLAGAS_CONTROL'];
									$METEDO_APLICACION=$rowCertifi['METODO_APLICACION'];
									if($METEDO_APLICACION==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_metodo_aplicacion WHERE NOMBRE='$METEDO_APLICACION' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$METEDO_APLICACION=$fila["ID"]; }
									}
									$NOM_COMERCIAL=$rowCertifi['NOM_COMERCIAL'];
									if($NOM_COMERCIAL==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_nombre_comercial WHERE NOMBRE='$NOM_COMERCIAL' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$NOM_COMERCIAL=$fila["ID"]; }
									}
									$NOM_QUIMICO=$rowCertifi['NOM_QUIMICO'];
									if($NOM_QUIMICO==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_nombre_quimico WHERE NOMBRE='$NOM_QUIMICO' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$NOM_QUIMICO=$fila["ID"]; }
									}
									$METOD_APLICACION_INSEC=$rowCertifi['METOD_APLICACION_INSEC'];
									if($METOD_APLICACION_INSEC==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_metodo_aplicacion WHERE NOMBRE='$METOD_APLICACION_INSEC' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$METOD_APLICACION_INSEC=$fila["ID"]; }
									}
									$COMPOSICION=$rowCertifi['COMPOSICION'];
									if($COMPOSICION==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_composicion WHERE NOMBRE='$COMPOSICION' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$COMPOSICION=$fila["ID"]; }
									}
									$DOSIS=$rowCertifi['DOSIS'];
									if($DOSIS==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_dosis WHERE NOMBRE='$DOSIS' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$DOSIS=$fila["ID"]; }
									}
									$REGISTRO_COFE=$rowCertifi['REGISTRO_COFE'];
									if($REGISTRO_COFE==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_registro_cofe WHERE NOMBRE='$REGISTRO_COFE' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$REGISTRO_COFE=$fila["ID"]; }
									}
									$PERIODICIDAD_SERVICE=$rowCertifi['PERIODICIDAD_SERVICE']; 
									if($PERIODICIDAD_SERVICE==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_periodicidad WHERE NOMBRE='$PERIODICIDAD_SERVICE' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$PERIODICIDAD_SERVICE=$fila["ID"]; }
									}
									$PROX_SERVICIO=$rowCertifi['PROX_SERVICIO'];
									$OBSERVACIONES=$rowCertifi['OBSERVACIONES']; 
									$RESPONSABLE_AREA=$rowCertifi['RESPONSABLE_AREA'];
									$RUTA_PDF=$rowCertifi['RUTA_PDF'];
									if($RESPONSABLE_AREA==''){}else{
										$sqlIdTables = "SELECT ID FROM altas_responsable_area WHERE NOMBRE='$RESPONSABLE_AREA' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$RESPONSABLE_AREA=$fila["ID"]; }
									}
									$TEC_APLICADOR=$rowCertifi['TEC_APLICADOR'];
									if($TEC_APLICADOR==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_tecnico_aplicador WHERE NOMBRE='$TEC_APLICADOR' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$TEC_APLICADOR=$fila["ID"]; }
									}
									$AREA_ADMINISTRACION=$rowCertifi['AREA_ADMINISTRACION'];
									if($AREA_ADMINISTRACION==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_area_administracion WHERE NOMBRE='$AREA_ADMINISTRACION' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$AREA_ADMINISTRACION=$fila["ID"]; }
									}						
								}
							}
					}
					
					if (@$count1>0){
						$SQL0 = "SELECT * FROM valid_modulo WHERE ID_VALID='$NO_FOLIO'";
						$rowss = $db->select($SQL0);
						$VALID = $rowss[0]['VALID'];
						echo $ReportResultFinal = $ResultFinal.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$AREAS_FUMIGAR.' # '.$TIPO_FUMIGACION.' # '.$PLAGAS_CONTROL.' # '.$METEDO_APLICACION.' # '.$NOM_COMERCIAL.' # '.$NOM_QUIMICO.' # '.$METOD_APLICACION_INSEC.' # '.$COMPOSICION.' # '.$DOSIS.' # '.$REGISTRO_COFE.' # '.$PERIODICIDAD_SERVICE.' # '.$PROX_SERVICIO.' # '.$OBSERVACIONES.' # '.$RESPONSABLE_AREA.' # '.$TEC_APLICADOR.' # '.$AREA_ADMINISTRACION.' # '.$NO_FOLIO.' # '.$VALID.' # '.$RUTA_PDF;
					}else{
						echo $ResultFinal;
					}
				
				break;
			case "AutocompliteReportFumi":
					
					$QuerySearchReport = "SELECT * FROM reportes_fumi WHERE NO_CLIENTE='$noCliente' AND ID_REPORTE LIKE '".$noCliente."%$TypeReportFumi' GROUP BY NO_CLIENTE";
					// $QuerySearchReport = sprintf("CALL querySearchReportFumi($noCliente)");
					$recReport = $db->combo($QuerySearchReport);
						if($TypeReportFumi=='LAM'){$DirJson='InspeccionLamparas';}
						if($TypeReportFumi=='ROE'){$DirJson='ReportRodenticidas';}
						if($TypeReportFumi=='MOS'){$DirJson='ReportesMoscas';}
						$getRutaJson = "../../repositorio/DataJson/DataFumigacion/$DirJson/$txtSucu/dataReport$noCliente.json";
					if($recReport->num_rows >=1 ){
						$QuerySearchCertifiStore = "SELECT FECHA_REGISTRO,NO_FOLIO,RUTA_JSON FROM reportes_fumi WHERE NO_CLIENTE='$noCliente' AND ID_REPORTE LIKE '".$noCliente."%$TypeReportFumi' GROUP BY NO_CLIENTE";
						$recCertifiStore = $db->select($QuerySearchCertifiStore);
						$fecha_entrada = new DateTime($recCertifiStore[0]["FECHA_REGISTRO"]);
						$getNoFolio = $recCertifiStore[0]["NO_FOLIO"];
						$DiffDateTime = $fecha_actual->diff($fecha_entrada);
							if($DiffDateTime->days >=30 ){
									
									$QuerySearchReport = "SELECT * FROM reportes_fumi WHERE NO_CLIENTE='$noCliente' AND ID_REPORTE LIKE '".$noCliente."$TypeReportFumi%' AND ID_OBJETO <> ''"; $recReport = $db->combo($QuerySearchReport);
									$Id=1;	 $i=0;		
									if($TypeReportFumi=='LAM'){
										while ($rowReport = $recReport->fetch_assoc()) {		
											$array[$i]= array(
												"Id" => "$Id",
												"Ubicacion" => $rowReport['UBICACION'],
												"Mosquito" => '',
												"Mosca" => '',
												"Palomilla" => '',
												"Escarabajo" => '',
												"Limpieza" => '',
												"Estatus" => '',
												"Obser" => ''
											);
											$Id++;
										}
									}else{
										while ($rowReport = $recReport->fetch_assoc()) {			
											$array[$i]= array(
												"Id" => "$Id",
												"Ubicacion" => $rowReport['UBICACION'],
												"Consumo" => '',
												"Limpieza" => '',
												"Estatus" => '',
												"Obser" => ''
											);
											$Id++;
											$i++;
										}
									}
									
									$arr_clientes = array(
										"rows" => $array			
									);  //Creamos el JSON
									$json_string = json_encode($arr_clientes); 
									file_put_contents($getRutaJson, $json_string);
									$Query1 ="DELETE FROM reportes_fumi WHERE NO_FOLIO='$getNoFolio'"; $db->query($Query1);
									$Query2 ="DELETE FROM valid_modulo WHERE ID_VALID='$getNoFolio'"; $db->query($Query2);
									
									echo $ReportResultFinal = $ResultFinal.' # # # # # # # # # '.$getRutaJson.' # # ';
									break;
									
								$count2 = 0;
							}else{
								$count2 = 0;
								while ($rowReport = $recReport->fetch_assoc()) {
									$count2++;
									$NO_FOLIO=$rowReport['NO_FOLIO'];
									$HORA_INICIO=$rowReport['HORA_INICIO'];
									$HORA_FINALIZADO=$rowReport['HORA_FINALIZADO'];
									$OBSERV_REPORT=$rowReport['OBSERV_REPORT'];
									$TECNICO_APLICADOR=$rowReport['TECNICO_APLICADOR'];
									$RUTA_JSON=$rowReport['RUTA_JSON'];
									$RUTA_PDF=$rowReport['RUTA_PDF'];
									$CLIENTE_VALID=$rowReport['CLIENTE_VALID'];
									if($TECNICO_APLICADOR==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_tecnico_aplicador WHERE NOMBRE='$TECNICO_APLICADOR' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$TECNICO_APLICADOR=$fila["ID"]; }
									}
									$RESPONSABLE_AREA=$rowReport['RESPONSABLE_AREA'];
									if($RESPONSABLE_AREA==''){}else{
										$sqlIdTables = "SELECT ID FROM altas_responsable_area WHERE NOMBRE='$RESPONSABLE_AREA' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$RESPONSABLE_AREA=$fila["ID"]; }
									}
									$AREA_ADMINISTRACION=$rowReport['AREA_ADMINISTRACION'];
									if($AREA_ADMINISTRACION==''){}else{
										$sqlIdTables = "SELECT ID FROM alta_area_administracion WHERE NOMBRE='$AREA_ADMINISTRACION' limit 1"; $stmtArea = $db->combo($sqlIdTables);
										while ($fila = $stmtArea->fetch_assoc()) { @$AREA_ADMINISTRACION=$fila["ID"]; }
									}
								}
							}
					}
					
					if (@$count2>0){
						$SQL0 = "SELECT * FROM valid_modulo WHERE ID_VALID='$NO_FOLIO'";
						$rowss = $db->select($SQL0);
						@$VALID = $rowss[0]['VALID'];
						if(@$rowss[0]['ID_VALID'] !=''){  $VALID = 'true'; }
						 echo $ReportResultFinal = $ResultFinal.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$OBSERV_REPORT.' # '.$TECNICO_APLICADOR.' # '.$RESPONSABLE_AREA.' # '.$AREA_ADMINISTRACION.' # '.$NO_FOLIO.' # '.$VALID.' # '.$getRutaJson.' # '.$RUTA_PDF.' # '.$CLIENTE_VALID;
					}else{
						echo $ResultFinal.' # # # # # # # # # '.$getRutaJson.' # # ';
					}
					
				break;
			default:
				echo $ResultFinal;
		}
		
	}
	else{}

}else{
	echo 'vacio';
}?>
