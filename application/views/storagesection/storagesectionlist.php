     <?php echo form_open('configuration/storagesection'); ?>
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
                    <th>Name</th>
                    <th>Warehouse number</th>
                    <th>Storage Type</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            foreach ($results as $result){
//                
              echo'<tr>
                    <td><input type="checkbox" name="idstoragesection[]" value="'.$result->idStoragesection.'" /></td>
                    <td>'.$result->code.'</td>
                    <td>'.$result->name.'</td>
                    <td>'.$result->warehousenumber.'</td> 
                    <td>'.$result->storagetypenumber.'</td> 
                </tr>';

            }
            echo form_close();
             ?>
            </tbody>
        </table>

