
  <title> :: FC02 :: </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/login.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script  type="text/javascript" src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo  base_url();  ?>theme/css/bootstrap.min.css" />
    <script src="<?php echo base_url();  ?>theme/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
        // Defining the local dataset    
        var dpis = <?php  $personas=json_decode($personas, true);
                            echo"['";
                            $cont=0;
                            foreach ($personas as $key => $persona) {
                              if($cont==0){echo $persona['dpi'];}else{echo "','".$persona['dpi'];}
                              $cont++;
                            } 
                            echo"']";
                    ?>;

        // Constructing the suggestion engine
        var dpis = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: dpis
        });
        var test = 0; 
        // Initializing the typeahead
        $('.typeahead').typeahead({
            hint: true,
            highlight: true, /* Enable substring highlighting */
            minLength: 1, /* Specify minimum characters required for showing result */
        },
        {
            name: 'dpis',
            source: dpis
            
        });
        //console.log(test);
        //alert("Hello! I am an alert box!!");
    });
    </script>

    <script>
        function listarMunicipio(str) {
            if (str.length == 0) { 
                document.getElementById("Municipios").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("Municipios").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "listarMunicipio/" + str, true);
                xmlhttp.send();
            }
        }
    </script>

    <script>

      function listarPersona(str) {
            //if (str.length == 0) { 
                //document.getElementById("InfoPersona").innerHTML = "";
            //    return;
            //} else {
                document.getElementById("InfoPersona").innerHTML = '<div class="loader"></div>';
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("InfoPersona").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "infopersona/" + str, true);
                xmlhttp.send();
            //}
        }
    </script>

    <script type="text/javascript">
        function valida(f) {
              var ok = true;
              var msg = "Advertencia:\n";
              if(f.dpi_id.value == "")
              {
                msg += "No se ha seleccionado un DPI\n";
                ok = false;
              }
              if(f.municipio_id.value == "")
              {
                msg += "No se ha seleccionado un Municipio\n";
                ok = false;
              }

              if(!(document.getElementById( "pnombre_id" )))
              {
                msg += "Espere un momento";
                ok = false;
              }

              if(ok == false){
                alert(msg);
              }
              return ok;
            }

</script>

    <style type="text/css">
      .bs-example {
        font-family: sans-serif;
        position: relative;
        margin: 100px;
      }
      .typeahead, .tt-query, .tt-hint {
        border: 2px solid #CCCCCC;
        /*border-radius: 8px;*/
        font-size: 22px; /* Set input font size */
        height: 30px;
        line-height: 30px;
        outline: medium none;
        padding: 8px 12px;
        /*width: 100%;*/
      }
      .typeahead {
        background-color: #FFFFFF;
      }
      .typeahead:focus {
        border: 2px solid #0097CF;
      }
      .tt-query {
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
      }
      .tt-hint {
        color: #999999;
      }
      .tt-menu {
        background-color: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        margin-top: 12px;
        padding: 8px 0;
        /*width: 422px;*/
      }
      .tt-suggestion {
        font-size: 22px;  /* Set suggestion dropdown font size */
        padding: 3px 20px;
      }
      .tt-suggestion:hover {
        cursor: pointer;
        background-color: #0097CF;
        color: #FFFFFF;
      }
      .tt-suggestion p {
        margin: 0;
      }

      .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
      }

      @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }

    </style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">FC02</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/CensoRRHH/index.php/formularios">Formularios</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/CensoRRHH/index.php/formularios/crear">Nuevo <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

    <div class="container text-center">
      <h4  class="text-info">INSTITUTO NACIONAL DE ESTADISTICA <small>-INE-</small></h4> 
      <h4  class="text-info">OFICINA NACIONAL DEL SERVICIO CIVIL <small>-ONSEC-</small></h4> 
      <h4  class="text-info">CENSO NACIONAL DEL RECURSO HUMANO </h4> 
      <h4  class="text-muted">FORMULARIO DE VISITAS PENDIENTES <small>FC02</small></h4> 
    </div>
    <div class="container">
      <!--<form action="" class="form-horizontal">-->
      <form action="<?php echo base_url(); ?>index.php/formularios/crear" method="post" accept-charset="utf-8" class="form-horizontal" onsubmit="return valida(this)">
        <div class="form-group form-control">
          <h5 class="text-center text-muted"><small>INFORMACION DEL SERVIDOR NO LOCAIZADO Y/O RECIENTE INGRESO</small></h5>
          <label for="dpi_id" class="control-label">Numero de DPI</label>
          <input type="number" id="dpi_id" name="DPI" placeholder="DPI" class="typeahead tt-query form-control" autocomplete="off" spellcheck="false" onfocusout="listarPersona(this.value)" requiered>
          <span id="InfoPersona"> 
          <div class="row"> 
            <div class="col-sm-4">
                  <label for="pnombre_id" class="control-label">Primer Nombre</label>
                  <input type="text" class="form-control" id="pnombre_id" name="PNombre" placeholder="Primer Nombre" required>
            </div>
            <div class="col-sm-4">
                  <label for="snombre_id" class="control-label">Segundo Nombre</label>
                  <input type="text" class="form-control" id="snombre_id" name="SNombre" placeholder="Segundo Nombre">
            </div>
            <div class="col-sm-4">
                  <label for="onombre_id" class="control-label">Otro Nombre</label>
                  <input type="text" class="form-control" id="onombre_id" name="ONombre" placeholder="Otro Nombre">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
                  <label for="papellido_id" class="control-label">Primer Apellido</label>
                  <input type="text" class="form-control" id="papellido_id" name="PApellido" placeholder="Primer Apellido" required>
            </div>
            <div class="col-sm-4">
                  <label for="sapellido_id" class="control-label">Segundo Apellido</label>
                  <input type="text" class="form-control" id="sapellido_id" name="SApellido" placeholder="Segundo Apellido">
            </div>
            <div class="col-sm-4">
                  <label for="capellido_id" class="control-label">Apellido de Casad@</label>
                  <input type="text" class="form-control" id="capellido_id" name="CApellido" placeholder="Apellido de Casad@">
            </div>
          </div>
          <div class="form-group">
            <label for="direccion_id" class="control-label">Dirección particular de la persona</label>
            <input type="text" class="form-control" id="direccion_id" name="Direccion" placeholder="Direccion ">
            </div>
          <div class="form-group">
                <label for="telefono_id" class="control-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono_id" name="Telefono" placeholder="Teléfono">
          </div>
          <input type="hidden" name="Nuevo" value="0">
        </span>
        </div>
        <div class="form-control form-group"> 
          <div>
            <h5 class="text-center text-muted"><small>DATOS DE  LA PERSONA NO ENTREVISTADA</small></h5>  
            
              <!--<div class="form-group">  
                <label for="direcciont_id" class="control-label">Dirección del centro de trabajo</label>
                <input type="text" class="form-control" id="direcciont_id" name="direccionT" placeholder="Dirección del centro de trabajo">
              </div>-->
              <div class="form-group">        
              <label for="institucion_id" class="control-label">Institución</label>
                <select class="form-control text-capitalize" id="institucion_id" name="Institucion">
                    <?php
                        $instituciones=json_decode($instituciones, true);
                        foreach ($instituciones as $key => $institucion) {
                          echo "<option value=".$institucion['id_institucion'].">".$institucion['nombre']."</option>";
                        } 
                    ?>
                </select>    
              </div>
              <div class="form-group">
                <label for="fecha_id" class="control-label">Fecha de Visita</label>
                <input type='date' class="form-control" id="fecha_id" name="fecha">
              </div>
              <div class="form-group">        
                <label for="causa_id" class="control-label">Causa de no realizada la entrevista</label>
                <select class="form-control text-capitalize" id="codigo_id" name = "Causa">
                  <?php
                    $causas=json_decode($causas, true);
                    foreach ($causas as $key => $causa) {
                      echo "<option value=".$causa['id_causa'].">".$causa['nombre']."</option>";
                    } 
                  ?>
                </select>   
              </div>                    
          </div>
          <div class="form-group">
              <label for="causa_id" class="control-label">Tiempo de Retorno</label>
                <select class="form-control text-capitalize" id="codigo_id" name = "Retorno">
                  <?php
                    $tiempo_retorno=json_decode($tiempo_retorno, true);
                    foreach ($tiempo_retorno as $key => $tiempo) {
                      echo "<option value=".$tiempo['id_tiempo_retorno'].">".$tiempo['nombre']."</option>";
                    } 
                  ?>
                </select>                    
          </div> 
          </div><p>    
          <div class="form-control form-group"> 
                  <h5 class="text-center text-muted"><small>IDENTIFICACION CARTOGRAFICA</small></h5>  
                  <label for="poblado_id" class="control-label">Lugar Poblado</label>
                  <input type="text" class="form-control" id="poblado_id" name="Poblado" placeholder="Lugar Poblado">
            <div class="form-group">        
              <label for="region_id" class="control-label">Región</label>
                <select class="form-control text-capitalize" id="region_id" name="Region">
                    <?php
                        $regiones=json_decode($regiones, true);
                        foreach ($regiones as $key => $region) {
                          echo "<option value=".$region['id_region'].">".$region['nombre']."</option>";
                        } 
                    ?>
                </select>    
            </div>
            <div class="form-group">        <!--Departamentos -->
              <label for="departamento_id" class="control-label">Departamento</label>
                <select class="form-control text-capitalize" id="departamento_id" onchange = 'listarMunicipio(this.value)'>
                    <option value="0">--SELECCIONE UNA OPCION--</option>
                    <?php
                        $departamentos=json_decode($departamentos, true);
                        foreach ($departamentos as $key => $departamento) {
                          echo "<option value=".$departamento['id_departamento'].">".$departamento['nombre']."</option>";
                        } 
                    ?>
              </select>                     
            </div>
            <div class="form-group">  <!--Municipios -->      
              <label for="departamento_id" class="control-label">Municipio</label>
                    <span id="Municipios"><select class="form-control text-capitalize" id="municipio_id" name="Municipio"></select></span></p>                  
            </div>
            <div class="form-group">        
              <label for="area_id" class="control-label">Area</label>
                <select class="form-control text-capitalize" id="area_id" name="Area">
                    <option value="Rural">Rural</option>
                    <option value="Urbana">Urbana</option>
                </select>    
            </div> 
          </div><p>
          <div class="form-control form-group"> 
            <h5 class="text-center text-muted"><small>PERSONAL DE CAMPO</small></h5>  
              <label class="control-label text-info">Empadronador(a)   </label>
              <label for="codEmpadronador_id" class="control-label text-muted">Código </label>
              <label for="Empadronador_id" class="control-label text-muted">Nombre Empadronador  </label><br>
              <label class="control-label text-info">Supervisor(a)   </label>
              <label for="codEmpadronador_id" class="control-label text-muted">Código </label>
              <label for="Empadronador_id" class="control-label text-muted">Nombre Supervisor   </label><br>
              <label class="control-label text-info">Monitor(a)  </label>
              <label for="codEmpadronador_id" class="control-label text-muted">Código </label>
              <label for="Empadronador_id" class="control-label text-muted">Nombre Monitor    </label>
          </div>
          <button type="aceptar" class="btn btn-primary">Aceptar</button>
        </div><p>
      </form>   
    </div>