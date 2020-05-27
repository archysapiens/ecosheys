   // Funciones JavaScript para pasar la direccion a ventanas modales-->

   //Funcion para persona Moral
	function funcionPasar() {

	var estadoM = document.getElementById('estadoMo').value;
	var localidadM = document.getElementById('localidadMo').value;
	var municipioM = document.getElementById("municipioMo").value;
	var codigoM = document.getElementById("cpMo").value
	//   document.getElementById('address').value= municipio.toString()+(",")+localidad.toString()+(",")+calle.toString();

	document.getElementById('addressMo').value= localidadM.toString()+(",")+(" ")+municipioM.toString()+(",")+(" ")+estadoM.toString()+(" ")+codigoM.toString();
	}
	//Funcion para persona fisica

	function funcionPasarFisica() {

	var estado = document.getElementById('estadoFi').value;
	var localidad = document.getElementById('localidadFi').value;
	var municipio = document.getElementById("municipioFi").value;
	var codigo = document.getElementById("cpFi").value
	//   document.getElementById('address').value= municipio.toString()+(",")+localidad.toString()+(",")+calle.toString();

	document.getElementById('addressFi').value= localidad.toString()+(",")+(" ")+municipio.toString()+(",")+(" ")+estado.toString()+(" ")+codigo.toString();
	}

   //  Terminan funciones para pasar direccion-->
   // Funcion para cargar la ventana modal con condicional dependiendo de tipo de persona-->

$(function(){

$('body').click(function(evt){

var IdBotones = evt.target.id
var Prefijo = IdBotones.substring(0, 3);

//En este if se cargan los datos de la persona moral
if (Prefijo == "MOL"){

	 var arr = IdBotones.split('^');
//Arreglo que se envia desde desde la cosulta de php para persona moral
	 var strno_cliente= arr[1] ;
	 var strRFC = arr[2] ;
	 var strNombre = arr[4] ;
	 var strRazon = arr[3] ;
	 var strappaterno = arr[5] ;
	 var strapmaterno = arr[6] ;
	 var strtel_ofi = arr[7] ;
	 var strtel_cell= arr[8] ;
	 var strobs = arr[9] ;
	 var stremail = arr[10] ;
	 var strhora= arr[11] ;
	 var strhora2= arr[12] ;
	 var strhora3= arr[13] ;
	 var strhora4= arr[14] ;
	 var strnra = arr[15] ;
	 var strno_ctaMo = arr[16] ;
	 var strgiroMo = arr[17] ;
	 var strzona = arr[18] ;
	 var strestado = arr[19] ;
	 var strmunicipio = arr[20] ;
	 var strcp = arr[21] ;
	 var strcolonia = arr[22] ;
	 var strcalle = arr[23] ;
	 var strnumext = arr[24] ;
	 var strnumint = arr[25] ;
	 var strreferencia = arr[26] ;
	 var strlatitud = arr[27];
	 var strlongitud = arr[28];
//Se carga a los id de de los div de la ventana de la persona moral
	 $('#rfcMo').val(strRFC);
	 $('#nombreMo').val(strNombre);
	 $('#razonMo').val(strRazon);
	 $('#app_paternoMo').val(strappaterno);
	 $('#app_maternoMo').val(strapmaterno);
	 $('#no_clienteMo').val(strno_cliente);
	 $('#txtteloficinaMo').val(strtel_ofi);
	 $('#txttelCelularMo').val(strtel_cell);
	 $('#txtobservaMo').val(strobs);
	 $('#txtcorreoMo').val(stremail);
	 $('#HORACT1Mo').val(strhora);
	 $('#HORACT2Mo').val(strhora2);
	 $('#HORACT3Mo').val(strhora3);
	 $('#HORACT4Mo').val(strhora4);
	 $('#no_cta_Mo').val(strno_ctaMo);
	 $('#giroMo').val(strgiroMo);
	 $('#nraMo').val(strnra);
	 $('#zonaMo').val(strzona);
	 $('#estadoMo').val(strestado).change();
	  setTimeout(function (){$('#municipioMo').val(strmunicipio).change()},1800) ;
	  setTimeout(function (){$('#cpMo').val(strcp).change()},3300) ;
	  setTimeout(function (){$('#localidadMo').val(strcolonia).change()},4800) ;
	 $('#calleMo').val(strcalle);
	 $('#num_extMo').val(strnumext);
	 $('#num_intMo').val(strnumint);
	 $('#referenciaMo').val(strreferencia);
	 $('#latitudMo1').val(strlatitud);
	 $('#longitudMo1').val(strlongitud);
	 $('#rfcRESPALDOMo').val(strRFC);
	 $('#numeroRESPALDOMo').val(strno_cliente);
}

//En este elseif se cargan los datos de la persona fisica
	else if (Prefijo == "Fsc") {
//Arreglo que devuelve la la consulta php
			  var arr = IdBotones.split('^');
			  var strno_clienteFi= arr[1] ;
			  var strRFCFi = arr[2] ;
			  var strNombreFi = arr[3] ;
			  var strappaternoFi = arr[4] ;
			  var strapmaternoFi = arr[5] ;
			  var strtel_ofiFi = arr[6] ;
			  var strtel_cellFi = arr[7] ;
			  var strobsFi = arr[8] ;
			  var stremailFi = arr[9] ;
			  var strhoraFi = arr[10] ;
			  var strhora2Fi = arr[11] ;
			  var strhora3Fi = arr[12] ;
			  var strhora4Fi = arr[13] ;
			  var strnraFi = arr[14] ;
			  var strno_ctaFi = arr[15] ;
			  var strgiroFi = arr[16] ;
			  var strzonaFi = arr[17] ;
			  var strestadoFi = arr[18] ;
			  var strmunicipioFi = arr[19] ;
			  var strcpFi = arr[20] ;
			  var strcoloniaFi = arr[21] ;
			  var strcalleFi = arr[22] ;
			  var strnumextFi = arr[23] ;
			  var strnumintFi = arr[24] ;
			  var strreferenciaFi = arr[25] ;
			  var strlatitudFi = arr[26];
			  var strlongitudFi = arr[27];

//Se cargan a los elementos HTML por id de la ventana modal de persona fisica
			  $('#rfcFi').val(strRFCFi);
			  $('#nombreFi').val(strNombreFi);
			  $('#app_paternoFi').val(strappaternoFi);
			  $('#app_maternoFi').val(strapmaternoFi);
			  $('#no_clienteFi').val(strno_clienteFi);
			  $('#txtteloficinaFi').val(strtel_ofiFi);
			  $('#txttelCelularFi').val(strtel_cellFi);
			  $('#txtobservaFi').val(strobsFi);
			  $('#txtcorreoFi').val(stremailFi);
			  $('#HORACT1Fi').val(strhoraFi);
			  $('#HORACT2Fi').val(strhora2Fi);
			  $('#HORACT3Fi').val(strhora3Fi);
			  $('#HORACT4Fi').val(strhora4Fi);
			  $('#nraFi').val(strnraFi);
			  $('#no_cta_Fi').val(strno_ctaFi);
			  $('#giroFi').val(strgiroFi);
			  $('#zonaFi').val(strzonaFi);
			  $('#estadoFi').val(strestadoFi).change();
			   setTimeout(function (){$('#municipioFi').val(strmunicipioFi).change()},1800) ;
			   setTimeout(function (){$('#cpFi').val(strcpFi).change()},3300) ;
			   setTimeout(function (){$('#localidadFi').val(strcoloniaFi).change()},4800) ;
			  $('#calleFi').val(strcalleFi);
			  $('#num_extFi').val(strnumextFi);
			  $('#num_intFi').val(strnumintFi);
			  $('#referenciaFi').val(strreferenciaFi);
			  $('#rfcRESPALDOFi').val(strRFCFi);
			  $('#latitudF').val(strlatitudFi);
			  $('#longitudF').val(strlongitudFi);
			  $('#rfcRESPALDOFi').val(strRFCFi);
			  $('#numeroRESPALDOF').val(strno_clienteFi);

}

			  else if (IdBotones == "guardar"){
			  }
		});

});
