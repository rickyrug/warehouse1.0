  <?php echo form_open('configuration/type'); ?>
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
                    <th>Group</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            foreach ($results as $result){
//                
              echo'<tr>
                    <td><input type="checkbox" name="idtype[]" value="'.$result->idtype.'" /></td>
                    <td>'.$result->code.'</td>
                    <td>'.$result->description.'</td>
                    <td>'.$result->group.'</td> 
                </tr>';

            }
            echo form_close();
             ?>
            </tbody>
        </table>

