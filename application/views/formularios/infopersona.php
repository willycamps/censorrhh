<?php  
        $Pnombre="";
        $Snombre="";
        $Onombre="";

        $Papellido="";
        $Sapellido="";
        $Capellido="";

        $informacion=json_decode($informacion, true);

        if (isset($informacion[0])){
            $ID = $informacion[0]['id_persona'];
            $Pnombre=$informacion[0]['pnombre'];
            $Snombre=$informacion[0]['snombre'];
            $Onombre=$informacion[0]['onombre'];

            $Papellido=$informacion[0]['papellido'];
            $Sapellido=$informacion[0]['sapellido'];
            $Capellido=$informacion[0]['capellido'];

            ?>
             <div class="row">
            <div class="col-sm-4">
                  <label for="pnombre_id" class="control-label">Primer Nombre</label>
                  <input type="text" class="form-control" id="pnombre_id" name="PNombre" placeholder="Primer Nombre" value="<?php echo $Pnombre;?>" autofocus readonly>
            </div>
            <div class="col-sm-4">
                  <label for="snombre_id" class="control-label">Segundo Nombre</label>
                  <input type="text" class="form-control" id="snombre_id" name="SNombre" placeholder="Segundo Nombre" value="<?php echo $Snombre;?>" readonly>
            </div>
            <div class="col-sm-4">
                  <label for="onombre_id" class="control-label">Otro Nombre</label>
                  <input type="text" class="form-control" id="onombre_id" name="ONombre" placeholder="Otro Nombre" value="<?php echo $Onombre;?>" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
                  <label for="papellido_id" class="control-label">Primer Apellido</label>
                  <input type="text" class="form-control" id="papellido_id" name="PApellido" placeholder="Primer Apellido" value="<?php echo $Papellido;?>" readonly required>
            </div>
            <div class="col-sm-4">
                  <label for="sapellido_id" class="control-label">Segundo Apellido</label>
                  <input type="text" class="form-control" id="sapellido_id" name="SApellido" placeholder="Segundo Apellido" value="<?php echo $Sapellido;?>" readonly>
            </div>
            <div class="col-sm-4">
                  <label for="capellido_id" class="control-label">Apellido de Casad@</label>
                  <input type="text" class="form-control" id="capellido_id" name="CApellido" placeholder="Apellido de Casad@" value="<?php echo $Capellido;?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="direccion_id" class="control-label">Dirección particular de la persona</label>
            <input type="text" class="form-control" id="direccion_id" name="Direccion" placeholder="Direccion " readonly>
            </div>
          <div class="form-group">
                <label for="telefono_id" class="control-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono_id" name="Telefono" placeholder="Teléfono" readonly>
          </div>
                <input type="hidden" name="Nuevo" value="<?php echo $ID; ?>">
            <?php

        }else{

          ?>
           <div class="row">
            <div class="col-sm-4">
                  <label for="pnombre_id" class="control-label">Primer Nombre</label>
                  <input type="text" class="form-control" id="pnombre_id" name="PNombre" placeholder="Primer Nombre" value="<?php echo $Pnombre;?>" required autofocus>
            </div>
            <div class="col-sm-4">
                  <label for="snombre_id" class="control-label">Segundo Nombre</label>
                  <input type="text" class="form-control" id="snombre_id" name="SNombre" placeholder="Segundo Nombre" value="<?php echo $Snombre;?>" >
            </div>
            <div class="col-sm-4">
                  <label for="onombre_id" class="control-label">Otro Nombre</label>
                  <input type="text" class="form-control" id="onombre_id" name="ONombre" placeholder="Otro Nombre" value="<?php echo $Onombre;?>" >
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
                  <label for="papellido_id" class="control-label">Primer Apellido</label>
                  <input type="text" class="form-control" id="papellido_id" name="PApellido" placeholder="Primer Apellido" value="<?php echo $Papellido;?>" required>
            </div>
            <div class="col-sm-4">
                  <label for="sapellido_id" class="control-label">Segundo Apellido</label>
                  <input type="text" class="form-control" id="sapellido_id" name="SApellido" placeholder="Segundo Apellido" value="<?php echo $Sapellido;?>" >
            </div>
            <div class="col-sm-4">
                  <label for="capellido_id" class="control-label">Apellido de Casad@</label>
                  <input type="text" class="form-control" id="capellido_id" name="CApellido" placeholder="Apellido de Casad@" value="<?php echo $Capellido;?>" >
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
          <?php
        }  
?>

           