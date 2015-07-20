    <?php echo form_open('configuration/product'); ?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th><input type="submit" value="add"    name="action" class="button"/></th>
                    <th><input type="submit" value="edit"   name="action" class="button"/></th>
                    <th><input type="submit" value="delete" name="action" class="button"/></th>
                    <th></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($results != NULL) {
                    foreach ($results as $result) {
//                
                        echo'<tr>
                    <td><input type="checkbox" name="idproduct[]" value="' . $result->idProduct . '" /></td>
                    <td>' . $result->code . '</td>
                    <td>' . $result->name . '</td> 
                    <td>' . $result->type . '</td> 
                    <td>'.anchor('configuration/productproperties/edit/'.$result->idProduct, 'Properties', array('class' => 'button secondary')).'</td> 
                </tr>';
                    }
                }
                echo form_close();
                ?>
            </tbody>
        </table>


