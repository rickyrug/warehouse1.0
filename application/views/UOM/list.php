    <?php echo form_open('configuration/UOM'); ?>
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
                    <th>Data Type</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($results != NULL) {
                    foreach ($results as $result) {
//                
           echo'<tr>
                    <td><input type="checkbox" name="idunidadesmedida[]" value="' . $result->idunidadesmedida . '" /></td>
                    <td>' . $result->codigo . '</td>
                    <td>' . $result->descripcion . '</td> 
                    <td>' . $result->tipodato. '</td>
                </tr>';
                    }
                }
                echo form_close();
                ?>
            </tbody>
        </table>

