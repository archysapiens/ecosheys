$(document).ready(function(){
	cargar_estados();
	$("#estadoFi").change(function(){dependencia_municipios();});
	$("#municipioFi").change(function(){dependencia_cp();});
	$("#cpFi").change(function(){dependencia_localidad();});
	
	
	
});

function cargar_estados()
{
	$.get("../repositorio/LoadEstados/cargar-estados.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#estadoFi').append(resultado);	
			$("#municipioFi").attr("disabled",true);
				
		}
	});	
}
function dependencia_municipios()
{
	var code = $("#estadoFi").val();
	$.get("../repositorio/LoadEstados/dependencia-municipios.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#municipioFi").attr("disabled",false);
				document.getElementById("municipioFi").options.length=1;
				$('#municipioFi').append(resultado);	
				$("#cpFi").attr("disabled",true);
			
			}
		}

	);
}

function dependencia_cp()
{
	var code = $("#municipioFi").val();
	$.get("../repositorio/LoadEstados/dependencia-cp.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#cpFi").attr("disabled",false);
			document.getElementById("cpFi").options.length=1;
			$('#cpFi').append(resultado);	
			$("#localidadFi").attr("disabled",true);				
		}
	});	
	
}

function dependencia_localidad()
{
	var code = $("#cpFi").val();
	$.get("../repositorio/LoadEstados/dependencia-localidades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#localidadFi").attr("disabled",false);
			document.getElementById("localidadFi").options.length=1;
			$('#localidadFi').append(resultado);			
		}
	});	
	
}
