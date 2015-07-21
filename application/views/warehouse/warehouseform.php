        <?php
        if ($action == 'add') {
            echo form_open('configuration/Warehouse/add');
        } elseif ($action == 'edit') {
            echo form_open('configuration/Warehouse/update');
          echo '<input type="hidden" name="idwarehouse" value="'.$idwarehouse.'" />';
        }elseif($action == 'update'){
            echo form_open('configuration/Warehouse/update');
            echo '<input type="hidden" name="idwarehouse" value="'.set_value('idwarehouse').'" />';
        }
        ?>
        
        <table>
             <tbody>
                <tr>
                    <td><h5>Warehouse number</h5></td>
                    <td>
                        <?php
                        if (form_error('number') != "") {
                            echo '<small class="error">' . form_error('number') . '</small>';
                        }
                        ?>
                        <input type="text" id="number" name="number" value="<?php if($action == 'add' || $action == 'update'){ echo set_value('number');}elseif ($action == 'edit'){echo $number;} ?>" size="50" />
                    </td>
                </tr>
                <tr>
                    <td><h5>Warehouse name</h5></td>
                    <td><?php
                        if (form_error('name') != "") {
                            echo '<small class="error">' . form_error('name') . '</small>';
                        }
                        ?>
                         <input type="text" id="name" name="name" value="<?php if($action == 'add'|| $action == 'update'){ echo set_value('name');}elseif ($action == 'edit'){echo $name;} ?>" size="50" />
                     </td>
                </tr>
                <tr>
                    <td> <h5>Warehouse adress</h5></td>
                    <td><?php
                        if (form_error('adress') != "") {
                            echo '<small class="error">' . form_error('adress') . '</small>';
                        }
                        ?>
                        <input type="text" id="adress" name="adress" value="<?php if($action == 'add'|| $action == 'update'){ echo set_value('adress');}elseif ($action == 'edit'){echo $adress;} ?>" size="50" />
                    </td>
                </tr>
                <tr>
                    <td ><input type="submit" value="Aceptar" class="button" /></td>
                    <td><?php  echo anchor('configuration/warehouse', 'Cancelar', array('class'=>'button'));?></td>
                </tr>
            </tbody>
        </table>

    <?php echo form_close(); ?>



