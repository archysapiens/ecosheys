<?php 
function footer() 
{ 
?>
<div id="footerEPN" style="clear:both; margin-top: 12px;">
	<div style="clear: both; width: 100%; border-top: 1px solid #dedede; margin-bottom: 1px;"></div>
	<div style="border-top: 1px solid #dedede; border-bottom: 1px solid #dedede; font-family: 'Times New Roman', serif; font-size: 14px; color: #666666; text-align: center; padding: 14px 0px;">Copyright © 2017 Ecosheys  <a href="http://portal.salud.gob.mx/contenidos/inicio/politicas.html" style="text-decoration: none; color: #808080;"></a></div>
	<div style="clear: both; width: 100%; border-top: 1px solid #dedede; margin-top: 1px;"></div>
	<div style="clear:both; width: 100%;">
		<div style="float: left; border-top: 1px solid #dedede; border-bottom: 1px solid #dedede; width: 570px; height:1px; margin-top: 38px;"></div>
		<div><img src="web/img/logo-eco-pequenio.png" width="180" height="72" />
		</div>
		<div style="float: right; border-top: 1px solid #dedede; border-bottom: 1px solid #dedede; width: 570px; height:1px; margin-top: -33px;"></div>
		<div style="clear: both; width: 100%;"></div>
	</div>
	<div style="margin: 32px auto 42px auto; text-align: center; font-family: 'Times New Roman', serif; font-weight: lighter; font-size: 14px;">
		<p style="color: #808080; line-height: 5px;">San Cristobal Huichochitlan</p>
		<p style="color: #808080; line-height: 5px;">Estado de México</p>
	</div>
	<div style="clear: both; width: 100%;"></div>
</div>
<?php 
}
?>
		
	<!-- Mainly scripts -->
    <script src="<?=@$sufijo?>web/js/jquery-2.1.1.js"></script>
	<script src="<?=@$sufijo?>web/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?=@$sufijo?>web/js/bootstrap.min.js"></script>
    <script src="<?=@$sufijo?>web/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=@$sufijo?>web/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Modal 
		<script src="web/js/plugins/modal/jquery.modal.js"></script> -->
    <!-- Flot -->
    <script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?=@$sufijo?>web/js/plugins/flot/jquery.flot.pie.js"></script>
	<!-- Data Tables -->
	<script src="<?=@$sufijo?>web/js/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="<?=@$sufijo?>web/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script src="<?=@$sufijo?>web/js/plugins/dataTables/dataTables.responsive.js"></script>
	<script src="<?=@$sufijo?>web/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?=@$sufijo?>web/js/inspinia.js"></script>
    <script src="<?=@$sufijo?>web/js/plugins/pace/pace.min.js"></script>
    <!-- Toastr -->
    <script src="<?=@$sufijo?>web/js/plugins/toastr/toastr.min.js"></script>
	 <script src="<?=@$sufijo?>web/js/apps.js"></script>
		<script>
			 $(document).ready(function() {
				App.init();
			});
		</script>
	<script>
		 $(document).ready(function() {
			table = $('.dataTables-example').DataTable( {
				paging: true,
				destroy: true,
				"lengthMenu": [[8, 20, 40, -1], [8, 20, 40, "All"]],
				"aoColumns": [
						null,
						null,
						null,
						null,
						null,
						null,
						null,
						{ "orderSequence": [ "false" ] }
					]
			});	
		});
	</script>
	<script type="text/javascript">
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
	</script>
	<?php function loadJs($loadJsFooter='') { 
		echo $loadJsFooter;
	} ?>
	
</body>
</html>
<?php
