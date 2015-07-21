<?php
if ($action == 'add') {
    echo form_open('configuration/product/add');
} elseif ($action == 'edit') {
    echo form_open('configuration/product/update');
    echo '<input type="hidden" name="idproduct" value="' . $idproduct . '" />';
} elseif ($action == 'update') {
    echo form_open('configuration/product/update');
    echo '<input type="hidden" name="idproduct" value="' . set_value('idproduct') . '" />';
}
?>



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
                } ?>" size="50" />
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
                } ?>" size="50" />
            </td>
        </tr>

        <tr>
            <td><h5>Product type</h5></td>
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
            <td><?php echo anchor('configuration/product', 'Cancel', array('class' => 'button')); ?></td>
        </tr>

    </tbody>
</table>
