<?php
if ($action == 'add') {
    echo form_open('configuration/Type/add');
} elseif ($action == 'edit') {
    echo form_open('configuration/Type/update');
    echo '<input type="hidden" name="idtype" value="' . $idtype . '" />';
} elseif ($action == 'update') {
    echo form_open('configuration/Type/update');
    echo '<input type="hidden" name="idtype" value="' . set_value('idtype') . '" />';
}
?>

<table>
    <tbody>
        <tr>
            <td><h5>Type Code</h5></td>
            <td>
                <?php
                if (form_error('code') != "") {
                    echo '<small class="error">' . form_error('code') . '</small>';
                }
                ?>
                <input type="text" id="code" name="code" value="<?php if ($action == 'add' || $action == 'update') {
                    echo set_value('code');
                } elseif ($action == 'edit') {
                    echo $code;
                } ?>" size="50" />
            </td>
        </tr>
        <tr>
            <td><h5>Type description</h5></td>
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
            <td> <h5>Group</h5></td>
            <td><?php
                if (form_error('group') != "") {
                    echo '<small class="error">' . form_error('group') . '</small>';
                }
                ?>
                <input type="text"  name="group" value="<?php if ($action == 'add' || $action == 'update') {
                    echo set_value('group');
                } elseif ($action == 'edit') {
                    echo $group;
                } ?>" size="50" />
            </td>
        </tr>
        <tr>
            <td ><input type="submit" value="Aceptar" class="button" /></td>
            <td><?php echo anchor('configuration/type', 'Cancelar', array('class' => 'button')); ?></td>
        </tr>
    </tbody>
</table>

<?php echo form_close(); ?>

