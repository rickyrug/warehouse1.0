        <?php
        if ($action == 'add') {
            echo form_open('configuration/storagetype/add');
        } elseif ($action == 'edit') {
            echo form_open('configuration/storagetype/update');
            echo '<input type="hidden" name="idstoragetype" value="' . $idstoragetype . '" />';
        } elseif ($action == 'update') {
            echo form_open('configuration/storagetype/update');
            echo '<input type="hidden" name="idstoragetype" value="' . set_value('idstoragetype') . '" />';
        }
        ?>
        
        
         <table>
             <tbody>
                <tr>
                    <td><h5>Storage type code</h5></td>
                    <td>
                        <?php echo form_error('code'); ?>
                        <input type="text" id="number" name="code" value="<?php if($action == 'add' || $action == 'update'){ echo set_value('code');}elseif ($action == 'edit'){echo $code;} ?>" size="50" />
                        
                    </td>
                </tr>
                <tr>
                    <td><h5>Storage type name</h5></td>
                    <td><?php echo form_error('name'); ?>
                         <input type="text" id="name" name="name" value="<?php if($action == 'add'|| $action == 'update'){ echo set_value('name');}elseif ($action == 'edit'){echo $name;} ?>" size="50" />
                     </td>
                </tr>
                <tr>
                    <td> <h5>Warehouse number</h5></td>
                    <td>
                        <?php 
                         echo form_error('warehousenumber'); 
                         if($action == 'add'|| $action == 'update')
                           {
                            echo warehouse_dropdown($warehouselist,'warehousenumber');
                           }elseif($action == 'edit')
                           {
                             echo warehouse_dropdown($warehouselist,'warehousenumber',$warehousenumber);
                           }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit" class="button"/></td>
                    <td><?php echo anchor('configuration/storagetype','Cancel',array('class'=>'button')); ?></td>
                </tr>
            </tbody>
        </table>

    