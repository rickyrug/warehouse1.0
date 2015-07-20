    <?php echo form_open('configuration/storagebin'); ?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th><input type="submit" value="add"    name="action" class="button"/></th>
                    <th><input type="submit" value="edit"   name="action" class="button"/></th>
                    <th><input type="submit" value="delete" name="action" class="button"/></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Warehouse number</th>
                    <th>Storage Type</th>
                    <th>Storage Section</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            foreach ($results as $result){
//                
              echo'<tr>
                    <td><input type="checkbox" name="idstoragebin[]" value="'.$result->idstoragebin.'" /></td>
                    <td>'.$result->code.'</td>
                    <td>'.$result->name.'</td>
                    <td>'.$result->warehousenumber.'</td> 
                    <td>'.$result->storagetypenumber.'</td> 
                    <td>'.$result->storagesectionnumber.'</td> 
                </tr>';

            }
            echo form_close();
             ?>
            </tbody>
        </table>