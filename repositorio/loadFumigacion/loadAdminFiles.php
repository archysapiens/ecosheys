<?php
	sleep(1);
	@$Folder = $_REQUEST['folder'];
	@$SubFolder = $_REQUEST['subFolder'];
	@$FolderSucursal = $_REQUEST['folderSucursal'];
	@$directorioPdf = opendir("../web/UploadPdf/PdfFumigacion/ReportRodenticidas/Toluca"); //ruta
		while (@$archivo = readdir($directorioPdf)) {
			if (is_dir($archivo)) {} else { ?>
				<div class="file-box">
					<div class="file">
						<a href="../web/UploadPdf/PdfFumigacion/ReportRodenticidas/Toluca/<?php echo $archivo; ?>" target="_blank">
							<span class="corner"></span>
							<div class="icon">
								<i class="fa fa-file-pdf-o"></i>
							</div>
							<div class="file-name">
								<?php echo $archivo; ?>
								<br/>
								<small>Added: Jan 11, 2014</small>
							</div>
						</a>
					</div>
				</div> <?php 
			}
		} 
?>

