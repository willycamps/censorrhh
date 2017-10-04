<?php $this->load->view('header_menu'); ?>

<div class=container>
<?php echo form_open("/resumen/agregar", array('class' => 'form-horizontal')) ?>
		
		<?php 
											
			$cui = array	(
									'id' => 'idCui',
									'name' => 'cui',
									'placeholder' => 'cui',
									'class' => 'form-control',
									'required' => 'autofocus',
									'maxlength' => '13',
									'onblur'=> 'Buscar()'
								);
			$boleta = array	(
									'id' => 'idBoleta',
									'name' => 'boleta',
									'placeholder' => 'boleta',
									'class' => 'form-control',
									'required' => 'autofocus',
									'maxlength' => '10',
								);
								
			$nit = array	(
									'id' => 'idNit',
									'name' => 'nit',
									'placeholder' => 'nit',
									'class' => 'form-control',
									'required' => 'autofocus',
									'maxlength' => '15'
								);
								
			$fecha = array	(
									'id' => 'idFecha',
									'name' => 'fecha',
									'type'=> 'date',
									'class' => 'form-control',														
								);
								
						
			$pnombre = array	(
									'id' => 'idPnombre',
									'name' => 'pnombre',
									'placeholder' => 'Primer nombre',
									'class' => 'form-control',
									'required' => 'autofocus',
									'maxlength' => '100'
								);
								
			$snombre = array	(
									'id' => 'idSnombre',
									'name' => 'snombre',
									'placeholder' => 'Segundo nombre',
									'class' => 'form-control',
									'required' => 'autofocus',
									'maxlength' => '100'
								);
			$onombre = array	(
									'id' => 'idOnombre',
									'name' => 'onombre',
									'placeholder' => 'Otro nombre',
									'class' => 'form-control',
									'maxlength' => '100'
								);
			$papellido = array	(
									'id' => 'idPapellido',
									'name' => 'papellido',
									'placeholder' => 'Primer apellido',
									'class' => 'form-control',
									'required' => 'autofocus',
									'maxlength' => '100'
								);
			$sapellido = array	(
									'id' => 'idSapellido',
									'name' => 'sapellido',
									'placeholder' => 'Segundo apellido',
									'class' => 'form-control',
									'required' => 'autofocus',
									'maxlength' => '100'
								);
			$capellido = array	(
									'id' => 'idCapellido',
									'name' => 'capellido',
									'placeholder' => 'Apellido de casada',
									'class' => 'form-control',
									'maxlength' => '100'
								);
			$encontrado = array	(
								'name'      => 'encontrado',
								'id'        => 'idencontrado',
								'value'     => 'encontrado',
								'checked'	=> FALSE
							);
			$noencontrado = array	(
								'name'      => 'noencontrado',
								'id'        => 'idnoencontrado',
								'value'     => 'noencontrado',
								'checked'	=> FALSE
							);
			$nuevo = array	(
								'name'      => 'nuevo',
								'id'        => 'idnuevo',
								'value'     => 'nuevo',
								'checked'	=> FALSE
							);
			$visitas = array	(
									'id' => 'idvisitas',
									'name' => 'visitas',
									'placeholder' => 'visitas',
									'type' => 'number',
									'class' => 'form-control',
									'maxlength' => '100'
								);
							
		?>
		
		<div class="row">
		<div class="col-md-10 col-md-offset-2">
		<label>Código de empadronador: </label><label> <?php echo $this->session->userdata('codempadronador'); ?> --</label>
		<label><?php echo $this->session->userdata('usuario_nombre')?></label>
				
		</div>
		</div>
		<br>
		<br>
		<br>
		<div class="row">
		<div class="col-md-3">
		 <label>No. de boleta</label>
		   <?php echo form_input($boleta) ?>
		 
		</div>
		<div class="col-md-3">
		 <label>CUI</label>
		   <?php echo form_input($cui) ?>
		 
		</div>
		<div class="col-md-3">
		 <label>NIT</label>
		  <?php echo form_input($nit) ?>
		 
		</div>
		<div class="col-md-3">
		 <label>Fecha</label>
		  <?php echo form_input($fecha) ?>
		</div>
		
		</div>
		<br>
		<div class="row">
		
		<div class="col-md-4">
		 <label>Primer nombre</label>
		 <?php echo form_input($pnombre) ?>
		 
		</div>
			<div class="col-md-4">
		 <label>Segundo nombre</label>
		 <?php echo form_input($snombre) ?>
		 
		</div>
		<div class="col-md-4">
		 <label>Otro nombre</label>
		 <?php echo form_input($onombre) ?>
		 
		</div>
		<div class="col-md-4">
		 <label>Primer apellido</label>
		 <?php echo form_input($papellido) ?>
		 
		</div>
			<div class="col-md-4">
		 <label>Segundo apellido</label>
		 <?php echo form_input($sapellido) ?>
		 
		</div>
		<div class="col-md-4">
		 <label>Apelido de casada</label>
		 <?php echo form_input($capellido) ?>
		 
		</div>
		</div>
		<br>
		<div class="row">
		<div class="col-md-6">
		<label>Departamento</label>
		  <select name="departamento" class="form-control text-capitalize" id="id_departamento" > 
		  <option value = "-1"> SELECCIONAR DEPARTAMENTO </option>
		  <?php 

            foreach($groups as $row)
            { 
              echo '<option value="'.$row->ID_DEPARTAMENTO.'">'.$row->NOMBRE.'</option>';
            }
            ?>
		  
		  </select>    	
		
		</div>
		<div class="col-md-6">
		<label>Institución</label>
		  <select name="institucion" class="form-control text-capitalize" id="id_institucion" > 
		  <option value = "-1"> SELECCIONAR INSTITUCION </option>
		   <?php 

            foreach($institucion as $row)
            { 
              echo '<option value="'.$row->ID_INSTITUCION.'">'.$row->NOMBRE.'</option>';
            }
            ?>
		  
		  
		  </select>    
		</div>
		
		<div class="col-md-6">
		<label>Municipio</label>
		  <select name="municipio" class="form-control text-capitalize" id="id_municipio" > 
		   <option value = "-1"> SELECCIONAR MUNICIPIO </option>
		  </select>    
		
		</div>
		<div class="col-md-6">
		<label>Ministerio</label>
		  <select name="ministerio" class="form-control text-capitalize" id="id_ministerio" >
		  <option value = "-1"> SELECCIONAR MINISTERIO </option>
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
		<div class="row">
		<div class="col-md-4">
		<div class="checkbox">
						<label>
							<?php echo form_checkbox($encontrado) ?> Encontrado
						</label>
					</div>
		</div>
		<div class="col-md-4">
		<div class="checkbox">
						<label>
							<?php echo form_checkbox($noencontrado) ?> No encontrado
						</label>
					</div>
		
		</div>
		<div class="col-md-4">
		<div class="checkbox">
						<label>
							<?php echo form_checkbox($nuevo) ?> Nuevo
						</label>
					</div>
		</div>
		</div>
		<br>
		<div class="row">
		<div class="col-md-4">
		</div>
		<div  class="col-md-4">
		<div id="numero" style="display: none;">
		<label>Numero de visitas</label>
		 <?php echo form_input($visitas) ?>
		 
		</div>
		</div>
		<div class="col-md-4">
		</div>
		</div>
     
    

	<div class="col-sm-offset-2 col-sm-10 col-md-10 col-md-offset-2">
					<?php
						$clase_css = 'class="btn btn-primary"';
						echo form_submit('','Almacenar',$clase_css); 
					?>
				</div>
<?php echo form_close() ?> 
  
</div>
 <?php $this->load->view('footer'); ?>
<script type="text/javascript">
$(document).ready(function(){
 $('#idnoencontrado').click(function(){
				
				var $input = $( this );
				if( $input.prop( "checked" ) ) {
					$("#numero").show();					
				}
				else{
					$("#numero").hide();
				}
			});
			
			
			
$("#id_departamento").change(function () 
{
var _id = $("#id_departamento").val();
 municipios(_id)
 console.log('paso por aqui');
});
			
  });
  
function municipios(_id,idMuni)
{

var $el = $("#id_municipio"); 
var items=""
$el.empty(); // remove old options
$el.append($("<option></option>").attr("value", '-1').text('SELECCIONAR MUNICIPIO'));
$.ajax({
url: '<?php echo base_url().'index.php/resumen/GetMunicipio';?>',
type: "POST", 
data: {codigo:_id},
async:false,
dataType: 'json',
success: function(json) 
{ 
$.each(json, function(index, item) 
{
	if (item.ID_MUNICIPIO==idMuni)
	{
	items+="<option value='"+item.ID_MUNICIPIO+"'selected>"+item.NOMBRE+"</option>";
	}
	else
	{
	 items+="<option value='"+item.ID_MUNICIPIO+"'>"+item.NOMBRE+"</option>";
	}
  });
  $el.html(items);
  
  }
}); 
	  
  }
  
  function seleccionar(_id)
  {
	  var $el = $("#id_municipio");
	  var items=""
	     	
	 $.ajax({
     url: '<?php echo base_url().'index.php/resumen/GetMunicipio';?>',
     type: "POST", 
	 
     data: {codigo:_id},

     dataType: 'json',
    success: function(json) 
{ 
$.each(json, function(index, item) 
{
	 items+="<option value='item.ID_MUNICIPIO'>"+item.NOMBRE+"</option>";
	
  });
  $el.html(items);
  }
}); 
 
  }
  
  
  function Buscar()
  {
	var x = document.getElementById("idCui");
   	  $.ajax({
				url: '<?php echo base_url().'index.php/resumen/obtenerReportePorDPI';?>',
				type:'POST',
				dataType: 'json',
				data: {cui:x.value},
				success: function(output_string){
					var _id = output_string.id_departamento;
					var idmuni=output_string.id_municipio;
                   	$('#idNit').val(output_string.nit);
					$('#idPnombre').val(output_string.pnombre);
					$('#idSnombre').val(output_string.snombre);
					$('#idOnombre').val(output_string.onombre);
					$('#idPapellido').val(output_string.papellido);
					$('#idSapellido').val(output_string.sapellido);
					$('#idCapellido').val(output_string.capellido);
					$('#id_departamento').val(output_string.id_departamento);
					municipios(_id,idmuni)
					$('#id_institucion').val(output_string.id_institucion);
     			   	$('#id_ministerio').val(output_string.id_ministerio);
	    		}, // End of success function of ajax form
				error: function(data){
					$('#idNit').html(data.status);
				}
			}); // End of ajax call
  }
  
 
  
 </script>
</body>
</html>