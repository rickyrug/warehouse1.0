<html>
    <head>
        <meta charset="UTF-8">
        <title>testform</title>
    </head>
    <body>
        <?php
        if ($action == 'add') {
            echo form_open('');
        } elseif ($action == 'edit') {
            echo form_open('');
            echo '<input type="hidden" name="" value="' . $idtestform . '" />';
        } elseif ($action == 'update') {
            echo form_open('');
            echo '<input type="hidden" name="" value="' . set_value('idtestform') . '" />';
        }
        ?>
        <table border="1">
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>


    </body>
</html>
