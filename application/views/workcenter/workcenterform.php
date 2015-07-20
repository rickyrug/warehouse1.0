        <?php
        if ($action == 'add') {
            echo form_open('configuration/workcenter/add');
        } elseif ($action == 'edit') {
            echo form_open('configuration/workcenter/update');
          echo '<input type="hidden" name="idworkcenter" value="'.$idworkcenter.'" />';
        }elseif($action == 'update'){
            echo form_open('configuration/workcenter/update');
            echo '<input type="hidden" name="idworkcenter" value="'.set_value('idworkcenter').'" />';
        }
        ?>
<table>
    <tbody>
        <tr>
            <td><h5>Work center code</h5></td>
            <td><?php echo form_error('code'); ?>
                <input type="text" name="code" value="<?php if($action == 'add' || $action == 'update'){ echo set_value('code');}elseif ($action == 'edit'){echo $code;} ?>" size="50" />
            </td>
        </tr>
        <tr>
            <td><h5>Work center name</h5></td>
            <td><?php echo form_error('name'); ?>
                <input type="text" name="name" value="<?php if($action == 'add' || $action == 'update'){ echo set_value('name');}elseif ($action == 'edit'){echo $name;} ?>" size="50" />
            </td>
        </tr>
        <tr>
            <td><h5>Warehouse number</h5></td>
            <td>
                <?php echo form_error('warehousenumber'); 
        if($action == 'add'|| $action == 'update'){
              echo warehouse_dropdown($warehouselist,'warehousenumber');
        }elseif($action == 'edit'){
            echo warehouse_dropdown($warehouselist,'warehousenumber',$warehousenumber);
        }
              ?>
                
            </td>
        </tr>
        <tr>
            <td> <h5>Work center Status</h5></td>
            <td>
                <?php echo form_error('status'); ?>
        Activo   : <input type="radio" name="status" value="1" <?php if($action == 'add' || $action == 'update'){ echo set_radio('status', '1');}elseif ($action == 'edit' && $status == 1){echo 'checked="checked"';} ?> /><br>
        Inactivo : <input type="radio" name="status" value="0" <?php if($action == 'add' || $action == 'update'){ echo set_radio('status', '0');}elseif ($action == 'edit' && $status == 0){echo 'checked="checked"';} ?> />   
            </td>
        </tr>
         <tr>
            <td><h5>Creation date</h5></td>
            <td>
                <?php echo form_error('creation_date'); ?>
                <input type="text" name="creation_date" value="<?php if($action == 'add' ){  echo now_24();}elseif($action == 'update'){echo set_value('creation_date');}elseif ($action == 'edit'){echo $creation_date;}   ?>" readonly="readonly" />   
            </td>
         </tr>
         <tr>
            <td> <h5>Creation user</h5></td>
            <td><?php echo form_error('creation_user'); ?>
                <input type="text" name="creation_user" value="<?php echo $creation_user;  ?>" readonly="readonly" />
            </td>
             <input type="hidden" name="modification_date" value="<?php if($action == 'add' ){  echo now_24();}elseif($action == 'update'){echo now_24();}elseif ($action == 'edit'){echo now_24();}   ?>" readonly="readonly" />
             <input type="hidden" name="modification_user" value="<?php echo $modification_user;   ?>" readonly="readonly" />    
         </tr>
         <tr>
             <td><input type="submit" value="Submit" class="button"/></td>   
             <td><?php echo anchor('configuration/workcenter','Cancel',array('class'=>'button'));?></td>   
        </tr>
      </tbody>
</table>

        
         
         
        
       
        
        
        
         
        <div></div>

    </form>



