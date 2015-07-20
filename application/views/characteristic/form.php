<?php
if ($action == 'add') {
    echo form_open('configuration/characteristic/add');
} elseif ($action == 'edit') {
    echo form_open('configuration/characteristic/update');
    echo '<input type="hidden" name="idcharacteristic" value="' . $idcharacteristic . '" />';
} elseif ($action == 'update') {
    echo form_open('configuration/characteristic/update');
    echo '<input type="hidden" name="idcharacteristic" value="' . set_value('idcharacteristic') . '" />';
}
?>
<table >
    <tbody>
        <tr>
            <td><h5>Property code</h5></td>
            <td><?php
                if (form_error('code') != "") {
                    echo '<small class="error">' . form_error('code') . '</small>';
                }
                ?>
                <input type="text"  name="code" value="<?php if ($action == 'add' || $action == 'update') {
                    echo set_value('code');
                } elseif ($action == 'edit') {
                    echo $code;
                } ?>" size="50" />
            </td>
        </tr>
        <tr>
            <td><h5>Property Description</h5></td>
            <td><?php
                if (form_error('description') != "") {
                    echo '<small class="error">' . form_error('description') . '</small>';
                }
                ?>
                <input type="text"  name="description" value="<?php if ($action == 'add' || $action == 'update') {
                    echo set_value('description');
                } elseif ($action == 'edit') {
                    echo $description;
                } ?>" size="50" />
            </td>
        </tr>
        <tr>
            <td><h5>Requiered</h5></td>
             
            <td>
                <?php
                if (form_error('requiered') != "") {
                    echo '<small class="error">' . form_error('requiered') . '</small>';
                }
                ?>
                Requerido: <input type="radio" name="requiered" value="1" <?php if ($action == 'add' || $action == 'update') {
                    echo set_radio('requiered', '1');
                } elseif ($action == 'edit' && $requiered == 1) {
                    echo 'checked="checked"';
                } ?> /><br>
                Opcional : <input type="radio" name="requiered" value="0" <?php if ($action == 'add' || $action == 'update') {
                    echo set_radio('requiered', '0');
                } elseif ($action == 'edit' && $requiered == 0) {
                    echo 'checked="checked"';
                } ?> />   
            </td>
        </tr>
        <tr>
            <td><h5>Property Type</h5></td>
            <td>
                <?php
                if (form_error('property') != "") {
                    echo '<small class="error">' . form_error('property') . '</small>';
                }
               
                if ($action == 'add' || $action == 'update') {
                    echo property_dropdown($propertylist, 'property');
                } elseif ($action == 'edit') {
                    echo property_dropdown($propertylist, 'property', $property);
                }
                ?>

            </td>
        </tr>

        <tr>
            <td><input type="submit" value="Submit" class="button"/></td>
            <td><?php echo anchor('configuration/characteristic', 'Cancel', array('class' => 'button')); ?></td>
        </tr>

    </tbody>
</table>
