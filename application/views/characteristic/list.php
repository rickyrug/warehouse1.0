 <?php echo form_open('configuration/characteristic'); ?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th><input type="submit" value="add"    name="action" class="button"/></th>
                    <th><input type="submit" value="edit"   name="action" class="button"/></th>
                    <th><input type="submit" value="delete" name="action" class="button"/></th>
                    
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Requiered</th>
                    <th>Property</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if ($results != NULL) {
            foreach ($results as $result){
//                
              echo'<tr>
                    <td><input type="checkbox" name="idcharacteristic[]" value="'.$result->idcharacteristic.'" /></td>
                    <td>'.$result->code.'</td>
                    <td>'.$result->description.'</td>
                    <td>'.$result->requiered.'</td> 
                    <td>'.$result->property.'</td> 
                </tr>';

            }
            }
            echo form_close();
             ?>
            </tbody>
        </table>
