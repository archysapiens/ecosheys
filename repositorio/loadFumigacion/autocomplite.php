<?php
require('../../bd/bd.php');

$db = new DbCnnx();

if($_REQUEST['term']!='')
{
	$noCliente= $_REQUEST['term'];
	
	//Variable que contendrá el resultado de la búsqueda
		  $texto = 'NO HAY RESULTADOS';
		  
		  //Contulta para recoger la información de todas las provincias
		  $SQL_Complite = "SELECT NO_CLIENTE FROM empresas WHERE NO_CLIENTE LIKE '%$noCliente%' ORDER BY NO_CLIENTE LIMIT 5";
		  
		  $rec = $db->combo($SQL_Complite);
		  $count = 0;

			while ($row = $rec->fetch_assoc()) {
				$count++;
				$datos[] = $row['NO_CLIENTE'];
			}
		
		if($count >= 1){ echo json_encode($datos); }
            else{ echo $texto; }

}else{
	echo 'vacio';
}

?>
