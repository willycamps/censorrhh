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
	<script type="text/javascript" language="javascript" src="/theme/js/buttons.print.min.js">
	</script>
	
	
	<meta charset="utf-8">
	<title>Boletas Censadas</title>

	</head>
	
<body>

<div id="container">
	<h1>Boletas Censadas por Departamento y Municipio</h1>
	
	<div id="body">		
		<p> DEPARTAMENTO </p>		
		<div id="depto">
     		<select name="selectSt" id="selectSt" > 
				<option value = "-1"> SELECCIONAR DEPARTAMENTO </option>
				<?php
							
							if (isset($departamentos)) 
							{
								foreach ($departamentos->result() as $row) 
								{
									?>
									<option value="<?php echo $row->id_departamento; ?>"><?php echo $row->nombre; ?></option>
				
						  <?php }							
							?>
								
					<?php  }   ?>
            </select>
	</div>
	<br>
	
		<p> MUNICIPIO </p>	
	<div id="muni" class="dataTables_wrapper no-footer">
     		<select name="selectMn" id="selectMn" > 
				<option value = "-1"> SELECCIONAR MUNICIPIO </option>
            </select>
	</div>
		<br>		
		<input id="_consultar" type="button" value="Consultar" >
		<br>		
		<br>
		
		
		<table id="tblBoletas" class="table table-striped table-bordered table-hover">
			
						<thead>
							<tr>
								<th>Institucion</th>
								<th>Boletas</th>
																
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($boletas)) 
							{
									foreach ($boletas->result() as $row) 
									{
																		
							?>
							<tr>
								<td><?php echo $row-> n_institucion ?></td>
								<td><?php echo $row-> boletas ?></td>
														
							</tr>
							<?php  } }  ?>
							
						</tbody>						
		</table>
		
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

	<script type="text/javascript">
		$(document).ready(function() 
	  	{
			
			$("#tblBoletas").hide();
			
			$('#tblBoletas').DataTable( 
				{
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
		
		$("#_consultar").click(function()
		{
			
			var _iddepto = $("#selectSt").val();
			var _idmuni = $("#selectMn").val();	
			var trHTML = '';
						
			$.ajax({
                type: "POST",                
				data: {id_deptos:_iddepto, id_munis: _idmuni},
                url: 'boleta_depto_munis',
				contentType: "text/plain",
                dataType: 'json',
																
                success: function(json) 
				{				                    					
                    $.each(json, function(value, key) 
					{
						//console.log(value);
                        //$el.append($("<option></option>").attr("value", key.id_municipio).text(key.nombre));

                    });						
                },
      			error: function (e) 
				{
        			console.log("There was an error with your request...");
        			console.log("error: " + JSON.stringify(e));
      			}
								
            });
			
			
		}); 				

		$("#selectSt").change(function () 
		{

			//$("#tblBoletas").show(2000);
			var _id = $("#selectSt").val();
			var $el = $("#selectMn");					
            $el.empty(); // remove old options
			$el.append($("<option></option>").attr("value", '').text('SELECCIONAR MUNICIPIO'));
			
			$.ajax({
                type: "POST",                
				data: {codigo:_id},
                url: 'municipios',
                dataType: 'json',
                success: function(json) 
				{				                    					
                    $.each(json, function(value, key) 
					{
                        $el.append($("<option></option>").attr("value", key.id_municipio).text(key.nombre));

                    });					
                }
            });
					
        });
		
	</script>
	
	
</body>
</html>
