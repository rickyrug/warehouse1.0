    <?php 
    echo form_open('inbound/InboundDelivery'); ?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th><input type="submit" value="add"    name="action" class="button"/></th>
                    <th><input type="submit" value="edit"   name="action" class="button"/></th>
                    <th><input type="submit" value="delete" name="action" class="button"/></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Warehouse</th>
                    <th>Inbound Delivery Number</th>
                    <th>Purchase order</th>
                    <th>Status</th>
                    <th>Creation date</th>
                    <th>Creation user</th>
                    <th>Modification date</th>
                    <th>Modification user</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($results != NULL) {
                    foreach ($results as $result) {
//                
           echo'<tr>
                    <td><input type="checkbox" name="idInboundDelivery[]" value="' . $result->idInboundDelivery . '" /></td>
                    <td>' . $result->warehousenumber . '</td>
                    <td>' . $result->inbound_delivery_number. '</td> 
                    <td>' . $result->purchase_order_number. '</td>
                    <td>' . $result->status. '</td>
                    <td>' . $result->creation_date. '</td>
                    <td>' . $result->creation_user. '</td>
                    <td>' . $result->modification_date. '</td>
                    <td>' . $result->modification_user. '</td>
                </tr>';
                    }
                }
                echo form_close();
                ?>
            </tbody>
        </table>

