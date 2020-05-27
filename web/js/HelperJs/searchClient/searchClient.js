 // $(document).ready(function() {
	 // var oTable = $('.dataTables-contratos').DataTable();
// });

$(document).ready(function() {
	table = $('.dataTables-example').DataTable( {
		paging: true,
		destroy: true,
		"lengthMenu": [[8, 20, 40, -1], [8, 20, 40, "All"]]
	} );	
});
  

$(function(){
	$('#RAZON_SOCIAL').autocomplete({
		source :'Autocomplite/traer_datos_autocomplite'
	  })
});


$('a.btn.btn-primary.btn-xs.loadSearchModal').click( function (event){
	event.preventDefault();
	
	$('.col-lg-10.col-sm-offset-1.ShowCliente').removeClass('hidden');
	$( 'a.collapse-link.TableClient i.fa' ).removeClass('fa-chevron-up');
	$( 'a.collapse-link.TableClient i.fa' ).addClass('fa-chevron-down');
	$('.ibox-content.text-center.TableClient').hide(2000);
	
	
	var idClient = $(this).attr("value");
	$.post( 'searchClient.php' , { idClient : idClient } ,
	function (exito)
	{
		$( '#contenedor_SearchModal_correcta' ).removeClass('').html( exito ).fadeIn()
	});
	
	$('#myModal2').modal({
		show: 'true'
	});
	
	
});