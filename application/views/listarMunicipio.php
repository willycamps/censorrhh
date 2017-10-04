       <select class="form-control text-capitalize" id="municipio_id" name="Municipio" required>
                    <?php
                        $municipios=json_decode($municipios, true);
                        foreach ($municipios as $key => $municipio) {
                          echo "<option value=".$municipio['id_municipio'].">".$municipio['nombre']."</option>";
                        } 
                    ?>
        </select> 