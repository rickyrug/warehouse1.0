        <?php
        if ($action == 'add') {
            echo form_open('configuration/uom/add');
        } elseif ($action == 'edit') {
            echo form_open('configuration/uom/update');
          echo '<input type="hidden" name="idunidadesmedida" value="'.$idunidadesmedida.'" />';
        }elseif($action == 'update'){
            echo form_open('configuration/uom/update');
            echo '<input type="hidden" name="idunidadesmedida" value="'.set_value('idunidadesmedida').'" />';
        }
        ?>
        
        <table>
             <tbody>
                <tr>
                    <td><h5>Código</h5></td>
                    <td>
                        <?php
                        if (form_error('codigo') != "") {
                            echo '<small class="error">' . form_error('codigo') . '</small>';
                        }
                        ?>
                        <input type="text" id="codigo" name="codigo" value="<?php if($action == 'add' || $action == 'update'){ echo set_value('codigo');}elseif ($action == 'edit'){echo $codigo;} ?>" size="50" />
                    </td>
                </tr>
                <tr>
                    <td><h5>Descripción</h5></td>
                    <td><?php
                        if (form_error('descripcion') != "") {
                            echo '<small class="error">' . form_error('descripcion') . '</small>';
                        }
                        ?>
                         <input type="text" id="descripcion" name="descripcion" value="<?php if($action == 'add'|| $action == 'update'){ echo set_value('descripcion');}elseif ($action == 'edit'){echo $descripcion;} ?>" size="50" />
                     </td>
                </tr>
                  <tr>
                    <td><h5>Tipo de dato</h5></td>
                    <td>
                        <?php
                        if (form_error('tipodato') != "") {
                            echo '<small class="error">' . form_error('tipodato') . '</small>';
                        }
                        if ($action == 'add' || $action == 'update') {
                            echo tipodato_dropdown($tipodatolist, 'tipodato');
                        } elseif ($action == 'edit') {
                            echo tipodato_dropdown($tipodatolist, 'tipodato', $tipodato);
                        }
                        ?>
                    </td>
                </tr>
                 <tr>
                    <td ><input type="submit" value="Aceptar" class="button" /></td>
                    <td><?php  echo anchor('configuration/uom', 'Cancelar', array('class'=>'button'));?></td>
                </tr>
            </tbody>
        </table>

    <?php echo form_close(); ?>