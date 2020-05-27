 $(document).ready(function() {
	 var oTable = $('.dataTables-contratos').DataTable();
});
  
  // INICIO FUNCION MANDAR VALORES A LA VENTANA MODAL CONTRATOS-->
  
$(function()
{       
	$('body').click(function(evt)
	{    
		var IdBotones = evt.target.id
		var Prefijo = IdBotones.substring(0, 3);
		if (Prefijo == "Act")
		{
			 var arr = IdBotones.split('@');
			 var strclave = arr[1] ;  
			 var strno_cliente = arr[2] ;            
			 var strfrecuencia = arr[3] ;           
			 var strdia = arr[4] ;
			 var strdia2 = arr[5] ;
			 var strperiodicidad = arr[6] ;
			 var strcosto = arr[7] ;
			 var strcliente = arr[8] ;
			 var strkgxcontrato = arr[9] ;
			 var strnivelgenerador = arr[10] ;
			 var strtipo_bolsas = arr[11] ;
			 var strcantidad_bolsas = arr[12] ;
			 var strcosto_bolsas = arr[13] ;
			 var strtipo_contenedores = arr[14] ;
			 var strcantidad_contenedores = arr[15] ;
			 var strcosto_contenedores = arr[16] ;
			 var strtipo_bolsas2 = arr[17] ;
			 var strcantidad_bolsas2 = arr[18] ;
			 var strcosto_bolsas2 = arr[19] ;
			 var strtipo_contenedores2 = arr[20] ;
			 var strcantidad_contenedores2 = arr[21] ;
			 var strcosto_contenedores2 = arr[22] ;
			 
			 $('#clientes').val(strclave);
			 $('#no_cliente').val(strno_cliente);
			 $('#frecuencias').val(strfrecuencia);
			 $('#dias').val(strdia);
			 $('#dias2').val(strdia2);
			 $('#periodicidad').val(strperiodicidad);
			 $('#costos').val(strcosto);
			 $('#cliente_ecosheys').val(strcliente);	
			 $('#Panelcliente_ecosheys').text('DATOS PERSONALES  /  '+strcliente);
			 $('#kg_x_contrato').val(strkgxcontrato);
			 $('#nivel_generador').val(strnivelgenerador);	
			 $('#txt_tipo_bolsas').val(strtipo_bolsas);
			 $('#txt_cantidad_bolsas').val(strcantidad_bolsas);	
			 $('#txt_tipo_bolsas_precio').val(strcosto_bolsas);	
			 $('#txt_tipo_contenedor').val(strtipo_contenedores);		
			 $('#txt_cantidad_contenedores').val(strcantidad_contenedores);
			 $('#txt_tipo_contenedor_precio').val(strcosto_contenedores);
			 $('#txt_tipo_bolsas2').val(strtipo_bolsas2);
			 $('#txt_cantidad_bolsas2').val(strcantidad_bolsas2);	
			 $('#txt_tipo_bolsas_precio2').val(strcosto_bolsas2);	
			 $('#txt_tipo_contenedor2').val(strtipo_contenedores2);		
			 $('#txt_cantidad_contenedores2').val(strcantidad_contenedores2);
			 $('#txt_tipo_contenedor_precio2').val(strcosto_contenedores2);						           
		}else if (IdBotones == "guardar"){
		}         
	});
});
	 
	 // FIN FUNCION MANDAR VALORES A LA VENTANA MODAL CONTRATOS-->	


function agregarOpcionesbolsas(form)
{
	var selec = form.txt_tipo_bolsas.options;
	var combo = form.txt_tipo_bolsas_precio.options;
	combo.length = null;


	if (selec[0].selected == true)
	{
	var popular1 = new Option("2","2","","");
	combo[0] = popular1;
	}

	if (selec[1].selected == true)
	{
	var academica1 = new Option("3.5","3.5","","");
	combo[0] = academica1;
	}

	if (selec[2].selected == true)
	{
	var academica1 = new Option("12","12","","");
	combo[0] = academica1;
	}

	if (selec[3].selected == true)
	{
	var academica1 = new Option("4","4","","");
	combo[0] = academica1;
	}
}



function agregarOpcionescontenedores(form)
{
	var selec = form.txt_tipo_contenedor.options;
	var combo = form.txt_tipo_contenedor_precio.options;
	combo.length = null;


	if (selec[0].selected == true)
	{
	var popular1 = new Option("30","30","","");
	combo[0] = popular1;
	}

	if (selec[1].selected == true)
	{
	var academica1 = new Option("80","80","","");
	combo[0] = academica1;
	}
}



function agregarOpcionesbolsas(form)
{
	var selec = form.txt_tipo_bolsas2.options;
	var combo = form.txt_tipo_bolsas_precio2.options;
	combo.length = null;


	if (selec[0].selected == true)
	{
	var popular1 = new Option("2","2","","");
	combo[0] = popular1;
	}

	if (selec[1].selected == true)
	{
	var academica1 = new Option("3.5","3.5","","");
	combo[0] = academica1;
	}

	if (selec[2].selected == true)
	{
	var academica1 = new Option("12","12","","");
	combo[0] = academica1;
	}

	if (selec[3].selected == true)
	{
	var academica1 = new Option("4","4","","");
	combo[0] = academica1;
	}
}



function agregarOpcionescontenedores(form)
{
	var selec = form.txt_tipo_contenedor2.options;
	var combo = form.txt_tipo_contenedor_precio2.options;
	combo.length = null;


	if (selec[0].selected == true)
	{
	var popular1 = new Option("30","30","","");
	combo[0] = popular1;
	}

	if (selec[1].selected == true)
	{
	var academica1 = new Option("80","80","","");
	combo[0] = academica1;
	}
}
