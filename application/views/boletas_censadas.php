<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="/theme/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/theme/css/datatables/dataTables.bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/theme/css/tb.css" />
	<script type="text/javascript" src="/theme/js/jquery.js"></script>		
	<script type="text/javascript" src="/theme/js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="/theme/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="/theme/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="/theme/js/dataTables.buttons.min.js"> </script>
	<script type="text/javascript" language="javascript" src="/theme/js/buttons.flash.min.js"></script>
	<script type="text/javascript" language="javascript" src="/theme/js/jszip.min.js"> </script>
	<script type="text/javascript" language="javascript" src="/theme/js/pdfmake.min.js"> </script>
	<script type="text/javascript" language="javascript" src="/theme/js/vfs_fonts.js"> </script>
	<script type="text/javascript" language="javascript" src="/theme/js/buttons.html5.min.js"> </script>
	<script type="text/javascript" language="javascript" src="/theme/js/buttons.print.min.js"></script>

	<meta charset="utf-8">
	<title>Boletas Censadas</title>
	
</head>
<body>

<div id="container">
	<h1>Boletas Censadas por Institucion</h1>

	<div id="body">
				
		<table id="tblBoletas" class="table table-striped table-bordered table-hover hover">
						<thead>
							<tr>
								<th>Institucion</th>
								<th>Boletas</th>
																
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($boletas)) {
									foreach ($boletas->result() as $row) {
																		
							?>
							<tr>
								<td><?php echo $row-> n_institucion ?></td>
								<td><?php echo $row-> boletas ?></td>
														
							</tr>
							<?php  } }  ?>
						</tbody>
						
					</table>
		
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#tblBoletas').DataTable( {
				dom: 'Bfrtip',
        buttons: [
            'excel'
        ],
				
				"language": {
								"lengthMenu": "Mostrar _MENU_ registros por página",
								"zeroRecords": "No se encontraron registros - disculpas",
								"info": "Página _PAGE_ de _PAGES_",
								"infoEmpty": "No existen registros",
								"infoFiltered": "(Filtrados de _MAX_ registros en total)"
							},
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
				
								
			} );			
		} );

	</script>
	
	
</body>
</html>
