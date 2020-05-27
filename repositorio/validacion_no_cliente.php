<?php
sleep(1);
require('../bd/bd.php');

$db = new DbCnnx();

if($_REQUEST)
{
	$NO_CLIENTE= $_REQUEST['txtnoCliente'];
	$Query = "select RFC from empresas where no_cliente = '".strtolower($NO_CLIENTE)."'";
	$rec = $db->combo($Query);
	$count = 0;
	while ($row = $rec->fetch_assoc()) {
		$count++;
		$rows[] = $row;
	}
	if (@$count>0)
	{
		echo 0;

		// echo '<div id="Error" style="	background-image:url(../web/images/error.jpg);
	// background-repeat:no-repeat;
	// background-position:left;
	// color:#FF0000;
	// padding-left:33px;
	// height:19px;
	// padding-top:6px;
	// padding-right:10px;"></div>';
	}
	else
	{
		echo 1;
		// echo '<div id="Success" style="	background-image:url(../web/images/disponible.jpg);
	// background-repeat:no-repeat;
	// background-position:left;
	// color:#669933;
	// padding-left:33px;
	// height:19px;
	// padding-top:6px;
	// padding-right:10px;"></div>';
	}

}?>
