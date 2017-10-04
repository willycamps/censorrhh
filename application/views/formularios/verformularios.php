<?php $this->load->view('header_menu'); ?>

<div class="container">
  <div class="table-responsive"> 
    <table id="example" class="table table-condensed table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Numero de DPI</th>
                    <th>Direccion particular de la persona</th>
                    <th>Telefono</th>
                    <th>Direccion del centro de trabajo</th>
                    <th>Fecha de visita</th>
                    <th>Causa de no realizada la entrevista</th>
                    <th>Tiempo de Retorno</th>
                    <th>Region</th>
                    <th>Municipio</th>
                    <th>Departamento</th>
                    <th>Lugar poblado</th>
                    <th>Area</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Numero de DPI</th>
                    <th>Direccion particular de la persona</th>
                    <th>Telefono</th>
                    <th>Direccion del centro de trabajo</th>
                    <th>Fecha de visita</th>
                    <th>Causa de no realizada la entrevista</th>
                    <th>Tiempo de Retorno</th>
                    <th>Region</th>
                    <th>Municipio</th>
                    <th>Departamento</th>
                    <th>Lugar poblado</th>
                    <th>Area</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                     $formularios=json_decode($data, true);
                     foreach ($formularios as $key => $formulario) {                      
                ?>
                <tr>
                    <th><?php echo $formulario['papellido']." ".$formulario['sapellido']." ".$formulario['capellido'].", ".$formulario['pnombre']." ".$formulario['snombre']." ".$formulario['onombre']; ?></th>
                    <th><?php echo $formulario['dpi']; ?></th>
                    <th><?php //echo $formulario['direccion']; ?></th>
                    <th><?php //echo $formulario['telefono']; ?></th>
                    <th><?php echo $formulario['Idireccion']; ?></th>
                    <th><?php //echo $formulario['']; ?></th>
                    <th><?php echo $formulario['Causa']; ?></th>
                    <th><?php echo $formulario['Tiempo']; ?></th>
                    <th><?php echo $formulario['Region']; ?></th>
                    <th><?php echo $formulario['Municipio']; ?></th>
                    <th><?php echo $formulario['Departamento']; ?></th>
                    <th><?php echo $formulario['lugar_poblado']; ?></th>
                    <th><?php echo $formulario['area']; ?></th>
                </tr>

                <?php 
                    } 
                ?>
            </tbody>
    </table>
  </div>
</div>
<br />
<br />
<?php $this->load->view('footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
        language: {
                        processing:     "Procesando...",
                        search:         "Buscar&nbsp;:",
                        lengthMenu:    "",
                        info:           "Del registro _START_ al _END_ de _TOTAL_ Registros",
                        infoEmpty:      "Del registro 0 al 0 de 0 Registros",
                        infoFiltered:   "",
                        infoPostFix:    "",
                        loadingRecords: "Cargando...",
                        zeroRecords:    "No se encontró ningún resultado",
                        emptyTable:     "No existen registros",
                        paginate: {
                            first:      "Primero",
                            previous:   "Anterior",
                            next:       "Siguiente",
                            last:       "Último"
                        },
                        aria: {
                            sortAscending:  ": activer pour trier la colonne par ordre croissant",
                            sortDescending: ": activer pour trier la colonne par ordre décroissant"
                        }
                    }
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>

</body>
</html>