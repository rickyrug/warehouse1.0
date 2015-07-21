    <?php echo form_open('configuration/properties'); ?>
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
                    <th>Description</th>
                    <th>Requiered</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            foreach ($results as $result){
//                
              echo'<tr>
                    <td><input type="checkbox" name="idproperties[]" value="'.$result->idproperties.'" /></td>
                    <td>'.$result->code.'</td>
                    <td>'.$result->description.'</td>
                    <td>'.$result->requiered.'</td> 
                    <td>'.$result->type.'</td> 
                </tr>';

            }
            echo form_close();
             ?>
            </tbody>
        </table>

