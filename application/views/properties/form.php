<?php
if ($action == 'add') {
    echo form_open('configuration/properties/add');
} elseif ($action == 'edit') {
    echo form_open('configuration/properties/update');
    echo '<input type="hidden" name="idproperties" value="' . $idproperties . '" />';
} elseif ($action == 'update') {
    echo form_open('configuration/properties/update');
    echo '<input type="hidden" name="idproperties" value="' . set_value('idproperties') . '" />';
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
                Activo   : <input type="radio" name="requiered" value="1" <?php if ($action == 'add' || $action == 'update') {
                    echo set_radio('requiered', '1');
                } elseif ($action == 'edit' && $requiered == 1) {
                    echo 'checked="checked"';
                } ?> /><br>
                Inactivo : <input type="radio" name="requiered" value="0" <?php if ($action == 'add' || $action == 'update') {
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
                echo form_error('type');
                if ($action == 'add' || $action == 'update') {
                    echo type_dropdown($typelist, 'type');
                } elseif ($action == 'edit') {
                    echo type_dropdown($typelist, 'type', $type);
                }
                ?>

            </td>
        </tr>

        <tr>
            <td><input type="submit" value="Submit" class="button"/></td>
            <td><?php echo anchor('configuration/properties', 'Cancel', array('class' => 'button')); ?></td>
        </tr>

    </tbody>
</table>
