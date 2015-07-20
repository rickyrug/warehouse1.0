<?php
function ajax_call() {
    if ($_POST) {
        $table = $_POST['table'];
        $arrYear = $this->resource->get_year($table);
        foreach ($arrYear as $years) {
            $arrFinal[$years->year] = $years->year;
        }
        echo form_dropdown('year', $arrFinal);
    }
}
