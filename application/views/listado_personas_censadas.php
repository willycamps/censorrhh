<?php $this->load->view('header_menu'); ?>
<div class=container>
<div class="row">
 <div class="form-group">
				<label for="date" class="col-sm-2 control-label">Fechas</label>
				<div class="col-sm-10">
					<input type="text" required="autofocus" id="date" class="daterange" name="date" />
             	</div>
 </div>
</div>
<br>
<br>
 <div class="row">
		<div class="col-md-6">
		<label>Departmento</label>
		  <select name="departamento" id="departamento" class="form-control text-capitalize" id="id_departamento" > 
		  <option value = "null"> SELECCIONAR DEPARTAMENTO </option>
		  <?php 

            foreach($groups as $row)
            { 
              echo '<option value="'.$row->ID_DEPARTAMENTO.'">'.$row->NOMBRE.'</option>';
            }
            ?>
		  
		  </select>    	
		
		</div>
		<div class="col-md-6">
		<label>Municipio</label>
		  <select name="municipio" id="municipio" class="form-control text-capitalize"> 
		   <option value = "null"> SELECCIONAR MUNICIPIO </option>
		  </select>    
		
		
		</div>
		</div>
		<br>
		<div class="row">
		<div class="col-md-6">
		<label>Institución</label>
		
		  <select name="institucion" id="institucion" class="form-control text-capitalize"> 
		    <option value = "null"> SELECCIONAR INSTITUCION </option>
		   <?php 

            foreach($institucion as $row)
            { 
              echo '<option value="'.$row->ID_INSTITUCION.'">'.$row->NOMBRE.'</option>';
            }
            ?>
		  
		  
		  </select>    
		
		</div>
		<div class="col-md-6">
		<label>Ministerio</label>
		  <select name="ministerio" class="form-control text-capitalize" id="ministerio" >
		    <option value = "null"> SELECCIONAR MINISTERIO </option>
          <?php 

            foreach($ministerio as $row)
            { 
              echo '<option value="'.$row->ID_MINISTERIO.'">'.$row->NOMBRE.'</option>';
            }
            ?>
		  </select>    
		
		</div>
		</div>
<br>
<br>

<div class="col-sm-offset-2 col-sm-10 col-md-10 col-md-offset-2">
<button class="btn btn-info" id="buscar">Buscar</button>
				</div>
				<br>
				<br>
<div class="panel panel-default" id="panel">
			<div class="panel-body">
				<div class="row-fluid">
					<table id="tblEmpleados" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No. de boleta</th>
								<th>Fecha</th>
								<th>DPI</th>
								<th>Nombre completo</th>
								<th>Departamento</th>
								<th>Municipio</th>
								<th>Ministerio</th>
								<th>Institución</th>
							</tr>
						</thead>
						 <tfoot>
                    <tr>
                                <th>No. de boleta</th>
								<th>Fecha</th>
								<th>DPI</th>
								<th>Nombre completo</th>
								<th>Departamento</th>
								<th>Municipio</th>
								<th>Ministerio</th>
								<th>Institución</th>
                    </tr>
                </tfoot>
					</table>
				</div>
			</div>
		</div>

</div>

<?php $this->load->view('footer'); ?>
 <script type="text/javascript">
$(document).ready(function(){
	

  $('#tblEmpleados').DataTable( {
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
                "autoWidth": false,
	} );	
	
 			
$("#departamento").change(function () 
{

//$("#tblBoletas").show(2000);
var _id = $("#departamento").val();
var $el = $("#municipio"); 
$el.empty(); // remove old options
$el.append($("<option></option>").attr("value", 'null').text('SELECCIONAR MUNICIPIO'));

$.ajax({
url: '<?php echo base_url().'index.php/resumen/GetMunicipio';?>',
type: "POST", 
data: {codigo:_id},
dataType: 'json',
success: function(json) 
{ 
$.each(json, function(value, key) 
{
$el.append($("<option></option>").attr("value", key.ID_MUNICIPIO).text(key.NOMBRE));

}); 
}
});

});


$("#buscar").click(function () 
{
idDepto=$("#departamento").val();
idInstitucion=$("#institucion").val();
idMunicipio=$("#municipio").val();
idMinisterio=$("#ministerio").val();
fechas=$("#date").val();
datos= fechas.split("-");

fechaInicial=datos[0];
fechaFinal=datos[1];
datos={departamento:idDepto,institucion:idInstitucion,municipio:idMunicipio,ministerio:idMinisterio,finicial:fechaInicial,ffinal:fechaFinal}
$.ajax({
url: '<?php echo base_url().'index.php/listado_personas_censadas/ListadoPersonas';?>',
type: "POST", 
data: {params:datos},
dataType: 'json',
success: function(data) 
{ 
 myJsonData = data;
 populateDataTable(myJsonData);
}
});	



});
});	




  // populate the data table with JSON data
  function populateDataTable(data) {
    console.log("populating data table...");
    // clear the table before populating it with more data
    $('#tblEmpleados').dataTable().fnClearTable();
    var length = Object.keys(data).length;
    for(var i = 0; i < length; i++) {
      var data1 = data[i];
 // You could also use an ajax property on the data table initialization
      $('#tblEmpleados').dataTable().fnAddData( [
	    data1.BOLETA,
        data1.FECHA,
		data1.DPI,
        data1.PNOMBRE,
		data1.DEPARTAMENTO,
		data1.MUNICIPIO,
		data1.MINISTERIO,
		data1.INSTITUCION,
      ]);
    }
  }
$(function(){
			$('.daterange').daterangepicker();
		});

 </script>
</body>
</html>
