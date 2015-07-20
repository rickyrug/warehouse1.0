<?php
if ($action == 'add') {
    echo form_open('');
} elseif ($action == 'edit') {
    echo form_open('');
    echo '<input type="hidden" name="" value="' . $idproduct . '" />';
} elseif ($action == 'update') {
    echo form_open('');
    echo '<input type="hidden" name="" value="' . set_value('idproduct') . '" />';
}
?>
<script>
 $(document).ready(function () {
      $('button').click(
       function(){
           
          console.log($('button').parents('form'));
           //hola
       }       
       );
    });
</script>
<table>
    <tbody>
        <tr>
            <td><h5>Product code</h5></td>
            <td>
                <?php
                if (form_error('code') != "") {
                    echo '<small class="error">' . form_error('code') . '</small>';
                }
                ?>
                <input type="text" name="code" value="<?php if ($action == 'add' || $action == 'update') {
                    echo set_value('code');
                } elseif ($action == 'edit') {
                    echo $code;
                    } ?>" size="50" readonly="readonly" />
            </td>
        </tr>
        <tr>
            <td><h5>Product name</h5></td>
            <td>
                <?php
                if (form_error('name') != "") {
                    echo '<small class="error">' . form_error('name') . '</small>';
                }
                ?>
                <input type="text" name="name" value="<?php if ($action == 'add' || $action == 'update') {
                    echo set_value('name');
                } elseif ($action == 'edit') {
                    echo $name;
                } ?>" size="50" readonly="readonly"/>
            </td>
        </tr>

        <tr>
            <td><h5>Product type</h5></td>
            <td>
                <?php
                echo form_error('type');
                if ($action == 'add' || $action == 'update') {
                    echo type_dropdown($typelist, 'type',null,'disable');
                } elseif ($action == 'edit') {
                    echo type_dropdown($typelist, 'type', $type);
                }
                ?>
            </td>
        </tr>

      
    </tbody>
</table>


<table>
    <tbody>
        <tr>
            <td ><h1><small>Properties</small></h1></td>
        </tr>
        <tr>
            <td>
                <ul class="accordion" data-accordion>
                  <?php 
                  $i = 0;
                  $var_keys =  array_keys($skeleton);
                  foreach ($skeleton as $property){
                   echo '<li class="accordion-navigation">';
                      echo '<a href="#'.$var_keys[$i].'">'.$var_keys[$i].'</a>';
                      echo '<div id="'.$var_keys[$i].'" class="content">';
                      echo '<table><tbody>';

            foreach ($property as $characteristic){
                          echo ' <tr>
                                    <td><h5>'.$characteristic->description.'</h5></td>
                                    <td><a href="#" data-reveal-id="p'.$characteristic->idcharacteristic.'">Add Values</a>';
                              echo'<div id="p'.$characteristic->idcharacteristic.'" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                                  '.form_open('configuration/ProductPropertiesValues/add',array('class' => 'valueForm', 'id' => 'valueForm')).'
                                    <table>
                                     <thead>
                                      <tr>
                                        <th>Nombre</th>
                                        <th>Valor</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                     <tr>
                                        <td><input type="text" name="nombre" value="" id="nombre"/></td>
                                        <td><input type="text" name="valor" value=""  id="valor"/></td>
                                     </tr>
                                     
                                     <tr>
                                        <td><button class="button">Submit</button></td>
                                        <td><input type="reset" value="Cancel"  class="button" /></td>
                                     </tr>
                                    </tbody>
                                   </table>
                                  '.form_close().'
                                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                                   </div>
                                </td>';     
                        echo  '</tr>';
                      }
                      echo '</tbody></table>';
                      echo '</div>';
                   echo '</li>';
                   $i = $i + 1;
                  }
                  ?>
                                        
                </ul>
            </td>

        </tr>
        
    </tbody>
</table>

<?php echo form_close(); ?> 
