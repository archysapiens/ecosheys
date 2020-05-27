<?php
	header("Content-Type: application/xml; charset=utf-8");
	sleep(1);
	require('../../clases/Fumigacion.php');
	require('../../bd/bd.php');
	
	$Fumigacion = new Fumigacion();
	function after ($this, $inthat) {
			if (!is_bool(strpos($inthat, $this)))
			return substr($inthat, strpos($inthat,$this)+strlen($this)); };
	function before ($this, $inthat) {
			return substr($inthat, 0, strpos($inthat, $this)); };
	function between ($this, $that, $inthat){
			return before ($that, after($this, $inthat)); };

		$data = file_get_contents("php://input");
		$filteredData=substr($data, strpos($data, ",")+1);
		$filteredDataEncode = between(',', '&IdUser=', $data);
		$IdUser = substr($filteredData, strpos($filteredData, "&IdUser=")+8);
		$IdUser = between('&IdUser=', '&TypeUser=', $filteredData);
		$TypeUser=substr($filteredData, strpos($filteredData, "&TypeUser=")+10);
		$TypeUser = between('&TypeUser=', '&sucursal=', $filteredData);
		$Sucursal=substr($filteredData, strpos($filteredData, "&sucursal=")+10);
		$Sucursal = between('&sucursal=', '&dirTypeFumi=', $filteredData);
		$TypeFumi=substr($filteredData, strpos($filteredData, "&dirTypeFumi=")+13);
		$TypeFumi = between('&dirTypeFumi=', '&dataFilename=', $filteredData);		
		$filteredCorreoEnvio=substr($filteredData, strpos($filteredData, "&correoEnvio=")+13);		
		$filteredFilename=substr($filteredData, strpos($filteredData, "&dataFilename=")+14);
		$filteredFilename = between('&dataFilename=', '&correoEnvio=', $filteredData);	
		$ExplodeFilename = explode("-", $filteredFilename);	
		$FOLIO = "<span style='color:rgb(4, 117, 94)'>".$ExplodeFilename[1]."</span>";		
		$decodedData=base64_decode($filteredDataEncode);
		$fic_name = $filteredFilename.'.png';
		$fic_namePdf = $filteredFilename.'.pdf';
		$nombre_ficheroFirmas = '../../web/images/FileUpload/FirmasFumi/'.$TypeFumi.'/'.$Sucursal.'';
		$nombre_ficheroPDF = '../../web/UploadPdf/PdfFumigacion/'.$TypeFumi.'/'.$Sucursal.'';
		
		if (file_exists($nombre_ficheroFirmas)) { }else { mkdir($nombre_ficheroFirmas, 0777, true); }
		if (file_exists($nombre_ficheroPDF)) { }else { mkdir($nombre_ficheroPDF, 0777, true); }
		
		switch ($TypeFumi) {
			case (($TypeFumi == "ReportRodenticidas") or ($TypeFumi == "ReportesMoscas") or ($TypeFumi == "InspeccionLamparas")):
				$RutaDirFileFirma = $nombre_ficheroFirmas."/".$fic_name;
				$RutaDirFileFirma2 = $nombre_ficheroFirmas."/".utf8_decode($fic_name);
				$RutaDirFilePDF = $nombre_ficheroPDF."/".$fic_namePdf;
				
				if($TypeUser=="CLIENTE"){
					$db = new DbCnnx();
					$ExplodeFilenameSwitch = explode("-", $filteredFilename);													
					
					$NOMBRE_USER = trim($ExplodeFilenameSwitch[0]);
					$FOLIO = $ExplodeFilenameSwitch[1];
					$ID_CLIENTE = $ExplodeFilenameSwitch[2]; 
					
					$SQL_update_valid = sprintf("UPDATE valid_modulo SET ID_CLIENTE='$ID_CLIENTE',ID_USER='$IdUser',NOMBRE_USER='$NOMBRE_USER',URL_FIRMA='$RutaDirFileFirma',CORREO_ENVIO='$filteredCorreoEnvio',VALID='true',FECHA_VALIDACION=NOW() WHERE ID_VALID='$FOLIO' and NOMBRE_USER='$NOMBRE_USER' and TYPE_USER='CLIENTE'");
					$rec = $db->query($SQL_update_valid);
					
					// Actualiza Campo CLIENTE_VALID a true
					$SQL_update_validClient = sprintf("UPDATE reportes_fumi SET CLIENTE_VALID='true' WHERE NO_FOLIO='$FOLIO'");
					$rec = $db->query($SQL_update_validClient);
					
					// print_r($SQL_update_valid);
				}
				
				break;			
			

		}
		
		$fp = fopen($RutaDirFileFirma2, 'wb');
		$ok = fwrite( $fp, $decodedData);
		fclose( $fp );
		if($ok){
			echo $fic_name;}
		else{
			echo "ERROR";}

?>

