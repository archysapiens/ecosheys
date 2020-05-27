<?php
sleep(1);
require('../../bd/bd.php');

$db = new DbCnnx();

if($_REQUEST['noCliente']!='')
{
	$noCliente= $_REQUEST['noCliente'];
	@$txtSucu= $_REQUEST['txtSucu'];
	@$TypeAutocomplite= $_REQUEST['TypeAutocomplite'];		
	$count = 0;
			
		switch ($TypeAutocomplite) {			
			case "AutocompliteReportTecnico":
										
				$QuerySearch = "SELECT report.*,valid.ID_VALID,valid.VALID,cont.NOMBRE_C,cont.APP_PATERNO_C,cont.APP_MATERNO_C,cont.EMAIL,emp.GIRO,emp.NOMBRE,emp.APP_PATERNO,emp.APP_MATERNO,emp.ESTADO,emp.DEL_MPIO,emp.COLONIA,emp.CP FROM empresas AS emp,contactos AS cont,reportes_fumi AS report,valid_modulo AS valid WHERE emp.no_cliente=$noCliente AND cont.no_cliente=$noCliente AND report.NO_CLIENTE=$noCliente AND report.NO_FOLIO=valid.ID_VALID GROUP BY report.NO_CLIENTE";
				// $QuerySearch = sprintf("CALL querySearchFumi($noCliente)");
				$rec = $db->combo($QuerySearch);
				
				while ($rowReport = $rec->fetch_assoc()) {
					$count++;
					$NombreCliente=$rowReport['NOMBRE'].' '.$rowReport['APP_PATERNO'].' '.$rowReport['APP_MATERNO'];
					$NombreClienteMo=$rowReport['NOMBRE_C'].' '.$rowReport['APP_PATERNO_C'].' '.$rowReport['APP_MATERNO_C'];
					$DireccionCliente=$rowReport['ESTADO'].' / '.$rowReport['DEL_MPIO'].' / '.$rowReport['COLONIA'].' / '.$rowReport['CP'];

					if($rowReport['EMAIL']==''){$Correo='';}else{$Correo=$rowReport['EMAIL'];}
					if($rowReport['GIRO']==''){$Giro='GIRO';}else{$Giro=$rowReport['GIRO'];}
					
					$NO_FOLIO=$rowReport['NO_FOLIO'];
					$HORA_INICIO=$rowReport['HORA_INICIO'];
					$HORA_FINALIZADO=$rowReport['HORA_FINALIZADO'];
					$OBSERV_REPORT=$rowReport['OBSERV_REPORT'];
					$TECNICO_APLICADOR=utf8_encode($rowReport['TECNICO_APLICADOR']);
					$RUTA_JSON=$rowReport['RUTA_JSON'];
					$RESPONSABLE_AREA=utf8_encode($rowReport['RESPONSABLE_AREA']);					
					@$VALID = $rowReport['VALID'];
					
					if($rowReport['NOMBRE']==''){
						$ResultFinal = utf8_encode($NombreClienteMo).' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$OBSERV_REPORT.' # '.$TECNICO_APLICADOR.' # '.$RESPONSABLE_AREA.' # '.$NO_FOLIO.' # '.$VALID.' # '.$RUTA_JSON;
					}else{
						$ResultFinal = utf8_encode($NombreCliente).' # '.$DireccionCliente.' # '.$Giro.' # '.@$txtSucu.' # '.@$Correo.' # '.$HORA_INICIO.' # '.$HORA_FINALIZADO.' # '.$OBSERV_REPORT.' # '.$TECNICO_APLICADOR.' # '.$RESPONSABLE_AREA.' # '.$NO_FOLIO.' # '.$VALID.' # '.$RUTA_JSON;}
				}

				@$SQL0 = "SELECT COUNT(*)-1 AS numRows FROM reportes_fumi WHERE NO_FOLIO='$NO_FOLIO'";
				@$rowss = $db->select($SQL0);
				@$numRows = $rowss[0]['numRows'];
				if(@$numRows!=''){
					echo $ReportResultFinal = @$ResultFinal.' # '.$numRows;
				}else{
					echo 'vacio';
				}
				
					
				break;			
		}
		
}else{
	echo 'vacio';
}?>
