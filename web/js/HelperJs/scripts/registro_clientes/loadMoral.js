$(document).ready(function(){
	cargar_estados();
	$("#estadoMo").change(function(){dependencia_municipios();});
	$("#municipioMo").change(function(){dependencia_cp();});
	$("#cpMo").change(function(){dependencia_localidad();});
	
	
	
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
			$('#estadoMo').append(resultado);	
			$("#municipioMo").attr("disabled",true);
				
		}
	});	
}
function dependencia_municipios()
{
	var code = $("#estadoMo").val();
	$.get("../repositorio/LoadEstados/dependencia-municipios.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#municipioMo").attr("disabled",false);
				document.getElementById("municipioMo").options.length=1;
				$('#municipioMo').append(resultado);	
				$("#cpMo").attr("disabled",true);
			
			}
		}

	);
}

function dependencia_cp()
{
	var code = $("#municipioMo").val();
	$.get("../repositorio/LoadEstados/dependencia-cp.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#cpMo").attr("disabled",false);
			document.getElementById("cpMo").options.length=1;
			$('#cpMo').append(resultado);	
			$("#localidadMo").attr("disabled",true);				
		}
	});	
	
}

function dependencia_localidad()
{
	var code = $("#cpMo").val();
	$.get("../repositorio/LoadEstados/dependencia-localidades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#localidadMo").attr("disabled",false);
			document.getElementById("localidadMo").options.length=1;
			$('#localidadMo').append(resultado);			
		}
	});	
	
}
