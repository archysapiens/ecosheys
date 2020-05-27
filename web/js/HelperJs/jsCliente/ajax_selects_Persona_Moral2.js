function nuevoAjax3()
{
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp;
}

// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.
var listadosSelectsMoral2=new Array();
listadosSelectsMoral2[0]="estadoMo";
listadosSelectsMoral2[1]="municipioMo";
listadosSelectsMoral2[2]="cpMo";
listadosSelectsMoral2[3]="localidadMo";

function buscarEnArrayMoral2(array, dato)
{
	// Retorna el indice de la posicion donde se encuentra el elemento en el array o null si no se encuentra
	var x=0;
	while(array[x])
	{
		if(array[x]==dato) return x;
		x++;
	}
	return null;
}

function cargaContenidoMoral2(idSelectOrigenMoral2)
{
	// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
	var posicionSelectDestinoMr2=buscarEnArrayMoral2(listadosSelectsMoral2, idSelectOrigenMoral2)+1;
	// Obtengo el select que el usuario modifico
	var selectOrigen2=document.getElementById(idSelectOrigenMoral2);


	// Obtengo la opcion que el usuario selecciono
	var opcionSeleccionada=selectOrigen2.options[selectOrigen2.selectedIndex].value;
	// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
	if(opcionSeleccionada==0)
	{
		var x=posicionSelectDestinoMr2, selectActual=null;
		// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el estado y deshabilito
		while(listadosSelectsMoral2[x])
		{
			selectActual=document.getElementById(listadosSelectsMoral2[x]);
			selectActual.length=0;

			var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Selecciona Opci&oacute;n...";
			selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
			x++;
		}
	}
	// Compruebo que el select modificado no sea el ultimo de la cadena
	else if(posicionSelectDestinoMr2==1)
	{
		var mi_aleatorio=parseInt(Math.random()*99999999);
		// Obtengo el elemento del select que debo cargar
		var idSelectDestino=listadosSelectsMoral2[posicionSelectDestinoMr2];

		var selectDestino=document.getElementById(idSelectDestino);
		// Creo el nuevo objeto AJAX y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
		var ajax=nuevoAjax3();
		ajax.open("GET", "proceso_carga_municipio_moral2.php?select="+idSelectDestino+"&opcion="+opcionSeleccionada, true);

		ajax.onreadystatechange=function()

		{
			if (ajax.readyState==3)
			{
				// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
				selectDestino.length=0;
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
				selectDestino.appendChild(nuevaOpcion); selectDestino.disabled=true;
			}
			else if (ajax.readyState==4 && ajax.status==200)
			{
				selectDestino.parentNode.innerHTML=ajax.responseText;
			}
		}
		ajax.send(null);
		var x=posicionSelectDestinoMr2, selectActual=null;
		while(listadosSelectsMoral2[x])
		{
			selectActual=document.getElementById(listadosSelectsMoral2[x]);
			selectActual.length=0;

			var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Selecciona Opci&oacute;n...";
			selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
			x++;
		}


	}

	else if(posicionSelectDestinoMr2==2)
	{
		// Obtengo el elemento del select que debo cargar
		var idSelectDestino=listadosSelectsMoral2[posicionSelectDestinoMr2];
		var selectDestino=document.getElementById(idSelectDestino);
		// Creo el nuevo objeto AJAX y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
		var ajax=nuevoAjax3();
		ajax.open("GET", "proceso_carga_cp_moral2.php?select="+idSelectDestino+"&opcion="+opcionSeleccionada, true);

		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==3)
			{
				// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
				selectDestino.length=0;
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
				selectDestino.appendChild(nuevaOpcion); selectDestino.disabled=true;
			}
			if (ajax.readyState==4)
			{
				selectDestino.parentNode.innerHTML=ajax.responseText;
			}
		}
		ajax.send(null);
		var x=posicionSelectDestinoMr2, selectActual=null;
		while(listadosSelectsMoral2[x])
		{
			selectActual=document.getElementById(listadosSelectsMoral2[x]);
			selectActual.length=0;

			var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Selecciona Opci&oacute;n...";
			selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
			x++;
		}


	}

	else if (posicionSelectDestinoMr2==3)
	{
		// Obtengo el elemento del select que debo cargar
		var idSelectDestino=listadosSelectsMoral2[posicionSelectDestinoMr2];
		var selectDestino=document.getElementById(idSelectDestino);
		// Creo el nuevo objeto AJAX y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
		var ajax=nuevoAjax3();
		ajax.open("GET", "proceso_carga_localidad_moral2.php?select="+idSelectDestino+"&opcion="+opcionSeleccionada, true);

		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==3)
			{
				// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
				selectDestino.length=0;
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
				selectDestino.appendChild(nuevaOpcion); selectDestino.disabled=true;
			}
			if (ajax.readyState==4)
			{
				selectDestino.parentNode.innerHTML=ajax.responseText;
			}
		}
		ajax.send(null);
		var x=posicionSelectDestinoMr2, selectActual=null;
		while(listadosSelectsMoral2[x])
		{
			selectActual=document.getElementById(listadosSelectsMoral2[x]);
			selectActual.length=0;

			var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Selecciona Opci&oacute;n...";
			selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
			x++;
		}
	}
}

function limpiar()
{
	document.form.reset();

}
