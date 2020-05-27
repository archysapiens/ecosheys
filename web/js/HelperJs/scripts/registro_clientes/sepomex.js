$(document).ready(function(){
	cargar_estados();
	$("#estados").change(function(){dependencia_municipios();});
	$("#municipios").change(function(){dependencia_cp();});
	$("#cp").change(function(){dependencia_localidad();});
	
	$("#municipios").attr("disabled",true);
	$("#cp").attr("disabled",true);
	$("#localidades").attr("disabled",true);
	
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
			$('#estados').append(resultado);			
		}
	});	
}
function dependencia_municipios()
{
	var code = $("#estados").val();
	$.get("../repositorio/LoadEstados/dependencia-municipios.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#municipios").attr("disabled",false);
				document.getElementById("municipios").options.length=1;
				$('#municipios').append(resultado);			
			}
		}

	);
}

function dependencia_cp()
{
	var code = $("#municipios").val();
	$.get("../repositorio/LoadEstados/dependencia-cp.php", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#cp").attr("disabled",false);
			document.getElementById("cp").options.length=1;
			$('#cp').append(resultado);			
		}
	});	
	
}

function dependencia_localidad()
{
	var code = $("#cp").val();
	$.get("../repositorio/LoadEstados/dependencia-localidades.php", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#localidades").attr("disabled",false);
			document.getElementById("localidades").options.length=1;
			$('#localidades').append(resultado);			
		}
	});	
	
}
