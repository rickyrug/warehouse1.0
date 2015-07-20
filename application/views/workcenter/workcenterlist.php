        <?php echo form_open('configuration/workcenter'); ?>
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
                    <th>Warehouse number</th>
                    <th>Status</th>
                    <th>Creation date</th>
                    <th>Creation user</th>
                    <th>Modification date</th>
                    <th>Modification user</th>
                   </tr>
            </thead>
            <tbody>
            <?php 
            
            foreach ($results as $result){
//                
              echo'<tr>
                    <td><input type="checkbox" name="idworkcenter[]" value="'.$result->idWorkcenter.'" /></td>
                    <td>'.$result->code.'</td>
                    <td>'.$result->name.'</td>
                    <td>'.$result->warehousenumber.'</td> 
                    <td>'.$result->status.'</td> 
                    <td>'.$result->creation_date.'</td> 
                    <td>'.$result->creation_user.'</td>
                    <td>'.$result->modification_date.'</td> 
                    <td>'.$result->modification_user.'</td>
                </tr>';

            }
             ?>
            </tbody>
        </table>