<?php
	sleep(1);
	require('../../clases/Email.php');
	require('../../clases/Fumigacion.php');
	require('../../bd/bd.php');
	include_once("../../repositorio/Email/class.phpmailer.php");
	include_once("../../repositorio/Email/class.smtp.php");
	
	$Email = new Email();
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
		$filteredDataEncode = between(',', '&sucursal=', $data);
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
		$fic_name = utf8_decode($filteredFilename).'.png';
		$fic_namePdf = $filteredFilename.'.pdf';
		$nombre_ficheroFirmas = '../../web/images/FileUpload/FirmasFumi/'.$TypeFumi.'/'.$Sucursal.'';
		$nombre_ficheroPDF = '../../web/UploadPdf/PdfFumigacion/'.$TypeFumi.'/'.$Sucursal.'';
		
		if (file_exists($nombre_ficheroFirmas)) { }else { mkdir($nombre_ficheroFirmas, 0777, true); }
		if (file_exists($nombre_ficheroPDF)) { }else { mkdir($nombre_ficheroPDF, 0777, true); }
		
		switch ($TypeFumi) {
			case "Certificados":
				$RutaDirFileFirma = $nombre_ficheroFirmas."/".$fic_name;
				$RutaDirFilePDF = $nombre_ficheroPDF."/".$fic_namePdf;
				$asunto = "Sistema Administrativo Empresarial Ecosheys";
				$mensaje = "<p style='font-size:18px; color:#11987d'> Usted tiene un nuevo Certificado de Fumigaci&oacute;n con el siguiente N&deg; de Folio: $FOLIO </p><br> <a href='http://www.archysoft.com.mx/ecosheys2017/' target='_blank' style='color:#11987d;text-decoration:none'> http://www.archysoft.com.mx/ecosheys2017/index.php</a>";
				$ConfirmEnvioCorreo = false;
				if($TypeUser=="CLIENTE"){
					$Fumigacion->ConfirmReciCertificado($filteredFilename,$RutaDirFileFirma);
				}else{
					$ReturnValidCertificado = $Fumigacion->ValidCertificado($filteredCorreoEnvio,$filteredFilename,$RutaDirFileFirma);				
					if($ReturnValidCertificado !='true' and $ReturnValidCertificado !='false'){ 
						$Email->correoEnvioEcosheys($ReturnValidCertificado,'Validar Certificado',"<p style='font-size:18px; color:#11987d'> Usted tiene un nuevo Certificado por validar con el siguiente N&deg; de Folio: $FOLIO </p><sub style='font-size:12px; color:rgb(99, 92, 92)'>Favor de ingresar al sistema ECOSHEYS <a href='http://www.archysoft.com.mx/ecosheys2017/' target='_blank' style='color:#11987d;text-decoration:none'> http://www.archysoft.com.mx/ecosheys2017/index.php</a>, siga los siguientes pasos que se muestran en la imagen para validar: </sub><br><br> <img src='http://www.archysoft.com.mx/ecosheys2017/web/images/validacion.png' width='500px' height='322px'>",$RutaDirFilePDF);
					}
					if($ReturnValidCertificado=='true'){ 
						$Email->correoMultipleEnvioEcosheys($filteredCorreoEnvio,$asunto,$mensaje,$nombre_ficheroPDF,$filteredFilename);
					}
				}
				
				break;
			case (($TypeFumi == "ReportRodenticidas") or ($TypeFumi == "ReportesMoscas") or ($TypeFumi == "InspeccionLamparas")):
				$RutaDirFileFirma = $nombre_ficheroFirmas."/".$fic_name;
				$RutaDirFilePDF = $nombre_ficheroPDF."/".$fic_namePdf;
				//para saber que tipo de reporte es
				if($TypeFumi == 'ReportRodenticidas'){ $TypeReportFumi = 'Certificado de Roedores'; }
				elseif($TypeFumi == 'ReportesMoscas'){ $TypeReportFumi = 'Reporte de Consumo de Moscas'; }
				elseif($TypeFumi == 'InspeccionLamparas'){ $TypeReportFumi = 'Reporte de Inspección de Lámparas'; }
				else{ $TypeReportFumi=''; }
				$asunto = "Sistema Administrativo Empresarial Ecosheys";
				$mensaje = "<p style='font-size:18px; color:#11987d'> Usted tiene un nuevo $TypeReportFumi con el siguiente N&deg; de Folio: $FOLIO </p><br> <a href='http://www.archysoft.com.mx/ecosheys2017/' target='_blank' style='color:#11987d;text-decoration:none'> http://www.archysoft.com.mx/ecosheys2017/index.php</a>";
				$ConfirmEnvioCorreo = false;
				if($TypeUser=="CLIENTE"){
					$Fumigacion->ConfirmReciCertificado($filteredFilename,$RutaDirFileFirma);
				}else{
					$ReturnValidCertificado = $Fumigacion->ValidFumiReportes($filteredCorreoEnvio,$filteredFilename,$RutaDirFileFirma);				
					if($ReturnValidCertificado !='true' and $ReturnValidCertificado !='false'){ 
						$Email->correoEnvioEcosheys($ReturnValidCertificado,'Validar Certificado',"<p style='font-size:18px; color:#11987d'> Usted tiene un nuevo Certificado por validar con el siguiente N&deg; de Folio: $FOLIO </p><sub style='font-size:12px; color:rgb(99, 92, 92)'>Favor de ingresar al sistema ECOSHEYS <a href='http://www.archysoft.com.mx/ecosheys2017/' target='_blank' style='color:#11987d;text-decoration:none'> http://www.archysoft.com.mx/ecosheys2017/index.php</a>, siga los siguientes pasos que se muestran en la imagen para validar: </sub><br><br> <img src='http://www.archysoft.com.mx/ecosheys2017/web/images/validacion.png' width='500px' height='322px'>",$RutaDirFilePDF);
					}
					if($ReturnValidCertificado=='true'){ 
						$Email->correoMultipleEnvioEcosheys($filteredCorreoEnvio,$asunto,$mensaje,$nombre_ficheroPDF,$filteredFilename);
					}
				}
				
				break;
			// case "ReportesMoscas":
				// $RutaDirFileFirma = $nombre_ficheroFirmas."/".$fic_name;
				// $RutaDirFilePDF = $nombre_ficheroPDF."/".$fic_namePdf;
				// $asunto = "Sistema Administrativo Empresarial Ecosheys";
				// $mensaje = "Reporte de Consumo de Moscas.";
				// $ConfirmEnvioCorreo = true;
				// $Fumigacion->ValidReportes($filteredCorreoEnvio,$filteredFilename,$RutaDirFileFirma);
				// break;
			case "ReportesTecnico":
				$RutaDirFileFirma = $nombre_ficheroFirmas."/".$fic_name;
				$RutaDirFilePDF = $nombre_ficheroPDF."/".$fic_namePdf;
				$asunto = "Sistema Administrativo Empresarial Ecosheys";
				$mensaje = "Certificado de Roedores.";
				$ConfirmEnvioCorreo = false;
				if($TypeUser=="CLIENTE"){
					$Fumigacion->ConfirmReciCertificado($filteredFilename,$RutaDirFileFirma);
				}else{
					$ReturnValidCertificado = $Fumigacion->ValidReportTecnico($filteredCorreoEnvio,$filteredFilename,$RutaDirFileFirma);				
					if($ReturnValidCertificado !='true' and $ReturnValidCertificado !='false'){ 
						$Email->correoEnvioEcosheys($ReturnValidCertificado,'Validar Certificado','Validar Certificado',$RutaDirFilePDF);
					}
					if($ReturnValidCertificado=='true'){ 
						$Email->correoMultipleEnvioEcosheys($filteredCorreoEnvio,$asunto,$mensaje,$nombre_ficheroPDF,$filteredFilename);
					}
				}
				
				break;
			// case "InspeccionLamparas":
				// $RutaDirFileFirma = $nombre_ficheroFirmas."/".$fic_name;
				// $RutaDirFilePDF = $nombre_ficheroPDF."/".$fic_namePdf;
				// $asunto = "Sistema Administrativo Empresarial Ecosheys";
				// $mensaje = "Reporte de Inspección Lámparas.";
				// $ConfirmEnvioCorreo = true;
				// $Fumigacion->ValidReportes($filteredCorreoEnvio,$filteredFilename,$RutaDirFileFirma);
				// break;
			default:
				$RutaDirFileFirma = "../../web/images/FileUpload/FirmasFumi/".$fic_name;
				$RutaDirFilePDF = "../../web/UploadPdf/PdfFumigacion/".$fic_namePdf;
				$asunto = " ";
				$mensaje = " ";
				$ConfirmEnvioCorreo = true;
		}
		
		$fp = fopen($RutaDirFileFirma, 'wb');
		$ok = fwrite( $fp, $decodedData);
		fclose( $fp );
		if($ok and $ConfirmEnvioCorreo==true){
			$Email->correoEnvioEcosheys($filteredCorreoEnvio,$asunto,$mensaje,$RutaDirFilePDF);
			echo $fic_name;}
		else{
			echo "ERROR";}

?>

