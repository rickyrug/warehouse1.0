        <?php echo form_open('configuration/warehouse'); ?>
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
                    <th>Number</th>
                    <th>Name</th>
                    <th>Adress</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            foreach ($results as $result){
//                
              echo'<tr>
                    <td><input type="checkbox" name="idwarehouse[]" value="'.$result->idwarehouse.'" /></td>
                    <td>'.$result->warehousenumber.'</td>
                    <td>'.$result->name.'</td>
                    <td>'.$result->adress.'</td> 
                </tr>';

            }
            echo form_close();
             ?>
            </tbody>
        </table>

