<?php
if ($action == 'add') {
    echo form_open('inbound/inbounddelivery/add');
} elseif ($action == 'edit') {
    echo form_open('');
    echo '<input type="hidden" name="" value="' . $idform . '" />';
} elseif ($action == 'update') {
    echo form_open('');
    echo '<input type="hidden" name="" value="' . set_value('idform') . '" />';
}
?>


<script type="text/javascript">
        function addRow() {
            var myRow = '<tr>'+
                        '<td><input type="text" name="product_id[]" value="" size="50" /></td>'+
                        '<td><input type="text" name="quantity[]" value="" size="50" /></td>'+
                        '<td><input type="text" name="status[]" value="AC" size="15" readonly="readonly" /></td>'+
                        '<td>'+
                        '<input onclick="addRow()" type="button" value="+"  class="button" size="20"/><input type="button" onclick="removeRow(this)"  value="-"  class="button"/>'+
                        '</td>';   
            $("#inbounddelivery_itms tr:last").after(myRow);
        }
        function removeRow(btn){
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);   
        }
        
         
</script>
<table >
<th><h5>Warehouse number</h5></th>
<th><h5>Inbound delivery number</h5></th>
<th><h5>Purchase order</h5></th>
<th><h5>Status</h5></th>

<tbody>
    <tr>
        <td >
            <?php
            if (form_error('warehousenumber') != "") {
                echo '<small class="error">' . form_error('warehousenumber') . '</small>';
            }
            ?>    
            <input type="text" id="warehousenumber" name="warehousenumber" 
           <?php
           echo 'value="';
           echo $warehousenumber;
                   if ($action == 'add' || $action == 'update') {
                       echo set_value('warehousenumber');
                   } elseif ($action == 'edit') {
                       echo $warehousenumber;
                   }
           echo '" size="50"  readonly="readonly" />'; 
           ?>
        </td>
        <td>
            <?php
            if (form_error('inbound_delivery_number') != "") {
                echo '<small class="error">' . form_error('inbound_delivery_number') . '</small>';
            }
            ?>
            <input type="text" id="inbound_delivery_number" name="inbound_delivery_number" 
           <?php
           echo 'value="';
           echo $inbound_delivery_number;
                   if ($action == 'add' || $action == 'update') {
                       echo set_value('inbound_delivery_number');
                   } elseif ($action == 'edit') {
                       echo $inbound_delivery_number;
                   }
           echo '" size="50"  readonly="readonly" />'; 
           ?>
                             
        </td>
        <td>
            <?php
            if (form_error('purchase_order_number') != "") {
                echo '<small class="error">' . form_error('purchase_order_number') . '</small>';
            }
            
            ?>
            <input type="text" id="purchase_order_number" name="purchase_order_number" 
           <?php
           echo 'value="';
//           echo $purchase_order_number;
                   if ($action == 'add' || $action == 'update') {
                       echo set_value('purchase_order_number');
                   } elseif ($action == 'edit') {
                       echo $purchase_order_number;
                   }
           echo '" size="50"   />'; 
           ?>
        </td>
        <td>
            <input type="text" name="status" 
            <?php
           echo 'value="';
           echo $status;
                   if ($action == 'add' || $action == 'update') {
                       echo set_value('status');
                   } elseif ($action == 'edit') {
                       echo $status;
                   }
           echo '"  readonly="readonly" />'; 
           ?>   
            
            
        </td>
             <input type="hidden" name="creation_date" 
            <?php
           echo 'value="';
           echo $creation_date;
                   if ($action == 'add' || $action == 'update') {
                       echo set_value('creation_date');
                   } elseif ($action == 'edit') {
                       echo $creation_date;
                   }
           echo '"   />'; 
           ?>  
              <input type="hidden" name="creation_user" 
            <?php
           echo 'value="';
           echo $creation_date;
                   if ($action == 'add' || $action == 'update') {
                       echo set_value('creation_user');
                   } elseif ($action == 'edit') {
                       echo $creation_user;
                   }
           echo '"   />'; 
           ?>  
                  
    </tr>
             <tr>
                 <td><input type="submit" value="Save" /></td>
                 <td><input type="reset" value="Cancel" /></td>
             </tr>
   
</tbody>
</table>
<table id="inbounddelivery_itms">
    <th>Product</th>
    <th>Qantity</th>
    <th>Status</th>
    <th></th>
    <th></th>
    <tbody>
        <tr>
            <td><input type="text" name="product_id[]" value="" size="50" /></td>
            <td><input type="text" name="quantity[]" value="" size="50" /></td>
            <td><input type="text" name="status[]" value="AC" size="15" readonly="readonly"/></td>
            <td>

        <div class="ui-widget">
            <label for="city">Your city: </label>
            <input id="city">
            Powered by <a href="http://geonames.org">geonames.org</a>
        </div>

        <div class="ui-widget" style="margin-top:2em; font-family:Arial">
            Result:
            <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
        </div>

       
            </td>
            <td>
                <input onclick="addRow()" type="button" value="+"  class="button" size="20"/>
            </td>
        </tr>
    </tbody>

</table>
 <?php echo form_close(); ?>