        <?php
        if ($action == 'add') {
            echo form_open('configuration/storagebin/add');
        } elseif ($action == 'edit') {
            echo form_open('configuration/storagebin/update');
            echo '<input type="hidden" name="idstoragebin" value="' . $idstoragebin . '" />';
        } elseif ($action == 'update') {
            echo form_open('configuration/storagebin/update');
            echo '<input type="hidden" name="idstoragebin" value="' . set_value('idstoragebin') . '" />';
        }
        ?>
<script type="text/javascript">
    

$(document).ready(function(){
     $('#storagetype').change(function(){
      var selTable = $(this).find('#idstoragetype').val(); // selected name from dropdown #table
      $.ajax({
       url: "http://localhost/Codeigniter/index.php/configuration/storagesection/ajax_call_dropdown",  // or "resources/ajax_call" - url to fetch the next dropdown
                   async: false,
                   type: "POST", // post
                   data: "storagetypenumber=" + selTable, // variable send
                   dataType: "html", // return type
                success: function (data) {  // callback function
                    $('#storagesection').html(data);
                }
            })
        });
    });
    $(document).ready(function () {
        $('#warehousenumber').change(function () {
            var selTable = $(this).val(); // selected name from dropdown #table
            $.ajax({
                url: "http://localhost/Codeigniter/index.php/configuration/storagetype/ajax_call_dropdown", // or "resources/ajax_call" - url to fetch the next dropdown
                async: false,
                type: "POST", // post
                data: "warehousenumber=" + selTable, // variable send
                dataType: "html", // return type
                success: function (data) {  // callback function

//                    $('#storagetype').empty();
                    $('#storagetype').html(data);
//                    $('#storagetype').trigger("liszt:updated");
                }
            })
        });
    });


</script> 
        <table >
            <tbody>
                <tr>
                    <td><h5>Storage Bin code</h5></td>
                    <td><?php
                        if (form_error('code') != "") {
                            echo '<small class="error">' . form_error('code') . '</small>';
                        }
                        ?>
                        <input type="text"  name="code" value="<?php if($action == 'add' || $action == 'update'){ echo set_value('code');}elseif ($action == 'edit'){echo $code;} ?>" size="50" />
                   </td>
                </tr>
                <tr>
                    <td><h5>Storage Bin name</h5></td>
                    <td><?php
                        if (form_error('name') != "") {
                            echo '<small class="error">' . form_error('name') . '</small>';
                        }
                        ?>
                        <input type="text"  name="name" value="<?php if($action == 'add' || $action == 'update'){ echo set_value('name');}elseif ($action == 'edit'){echo $name;} ?>" size="50" />
                    </td>
                </tr>
                <tr>
                    <td><h5>Warehouse number</h5></td>
                    <td>
                        <?php
                        if (form_error('warehousenumber') != "") {
                            echo '<small class="error">' . form_error('warehousenumber') . '</small>';
                        }
                        ?>
                        <?php
                        if ($action == 'add' || $action == 'update') {
                            echo warehouse_dropdown($warehouselist, 'warehousenumber');
                        } elseif ($action == 'edit') {
                            echo warehouse_dropdown($warehouselist, 'warehousenumber', $warehousenumber);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><h5>Storage Type</h5></td>
                    <td>
                        <div id="storagetype">
                        <?php
                         if (form_error('idstoragetype') != "") {
                            echo '<small class="error">' . form_error('idstoragetype') . '</small>';
                        }
                        if ($action == 'edit') {
                            echo storagetype_dropdown($storagetypelist, 'idstoragetype', $storagetypenumber);
                        }
                        
                        ?>
                     </div>     
                    </td>
                </tr>
                <tr>
                    <td><h5>Storage Section</h5></td>
                    <td>
                        <div id="storagesection">
                        <?php
                         if (form_error('idstoragesection') != "") {
                            echo '<small class="error">' . form_error('idstoragesection') . '</small>';
                        }
                        if ($action == 'edit') {
                            echo storagesection_dropdown($storagesectionlist, 'idstoragesection', $storagesectionnumber);
                        }
                        
                        ?>
                     </div>   
                        
                    </td>
                </tr>
                 <tr>
                    <td><input type="submit" value="Submit" class="button"/></td>
                    <td><?php echo anchor('configuration/storagebin','Cancel',array('class'=>'button')); ?></td>
                </tr>
                
            </tbody>
        </table>
