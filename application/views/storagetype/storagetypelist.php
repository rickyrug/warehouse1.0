        <?php echo form_open('configuration/StorageType'); ?>
        <table >
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
                    <th>Warehousenumber</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            foreach ($results as $result){
//                
              echo'<tr>
                    <td><input type="checkbox" name="idstoragetype[]" value="'.$result->idstoragetype.'" /></td>
                    <td>'.$result->code.'</td>
                    <td>'.$result->name.'</td>
                    <td>'.$result->warehousenumber.'</td> 
                </tr>';

            }
             ?>
            </tbody>
        </table>