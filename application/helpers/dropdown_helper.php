<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('warehouse_dropdown')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     * @param	string	the URI segments of the form destination
     * @param	array	a key/value pair of attributes
     * @param	array	a key/value pair hidden data
     * @return	string
     */
    function warehouse_dropdown($p_warehouselist, $p_name, $p_selectedwarehouse = null) {

        $drop_down = '<select id="' . $p_name . '" name="' . $p_name . '">';

        if ($p_selectedwarehouse != null) {
            foreach ($p_selectedwarehouse as $warehouse) {
                $drop_down = $drop_down . '<option value ="' . $warehouse->idwarehouse . '" ' . set_select($p_name, $warehouse->idwarehouse) . '>' . $warehouse->warehousenumber . '</option>';
            }
        } else {
            $drop_down = $drop_down . '<option></option>';
        }

        foreach ($p_warehouselist as $warehouse) {
            $drop_down = $drop_down . '<option value ="' . $warehouse->idwarehouse . '" ' . set_select($p_name, $warehouse->idwarehouse) . '>' . $warehouse->warehousenumber . '</option>';
        }
        $drop_down = $drop_down . '</select>';
        return $drop_down;
    }

}

if (!function_exists('storagetype_dropdown')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     * @param	string	the URI segments of the form destination
     * @param	array	a key/value pair of attributes
     * @param	array	a key/value pair hidden data
     * @return	string
     */
    function storagetype_dropdown($p_storagetypelist, $p_name, $p_selectedstoragetype = null) {
//            $drop_down = '';
       $drop_down = '<select id="' . $p_name . '" name="' . $p_name . '" >';

        if ($p_selectedstoragetype != null) {
            foreach ($p_selectedstoragetype as $storagetype) {
                $drop_down = $drop_down . '<option value ="' . $storagetype->idstoragetype . '" ' . set_select($p_name, $storagetype->idstoragetype) . '>' . $storagetype->code . '</option>';
            }
        } else {
            $drop_down = $drop_down . '<option></option>';
        }

        foreach ($p_storagetypelist as $storagetype) {
            $drop_down = $drop_down . '<option value ="' . $storagetype->idstoragetype . '" ' . set_select($p_name, $storagetype->idstoragetype) . '>' . $storagetype->code . '</option>';
        }
//        $drop_down = $drop_down . '</select>';
        return $drop_down;
    }

}

if (!function_exists('workcenter_dropdown')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     * @param	string	the URI segments of the form destination
     * @param	array	a key/value pair of attributes
     * @param	array	a key/value pair hidden data
     * @return	string
     */
    function workcenter_dropdown($p_workcenterlist, $p_name, $p_selectedworkcenter = null) {

        $drop_down = '<select id="' . $p_name . '" name="' . $p_name . '">';

        if ($p_selectedworkcenter != null) {
            foreach ($p_selectedworkcenter as $workcenter) {
                $drop_down = $drop_down . '<option value ="' . $workcenter->idWorkcenter . '" ' . set_select($p_name, $workcenter->idWorkcenter) . '>' . $workcenter->code . '</option>';
            }
        } else {
            $drop_down = $drop_down . '<option></option>';
        }

        foreach ($p_workcenterlist as $workcenter) {
            $drop_down = $drop_down . '<option value ="' . $workcenter->idWorkcenter . '" ' . set_select($p_name, $workcenter->idWorkcenter) . '>' . $workcenter->code . '</option>';
        }
        $drop_down = $drop_down . '</select>';
        return $drop_down;
    }

}

if (!function_exists('storagesection_dropdown')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     * @param	string	the URI segments of the form destination
     * @param	array	a key/value pair of attributes
     * @param	array	a key/value pair hidden data
     * @return	string
     */
    function storagesection_dropdown($p_storagesectionlist, $p_name, $p_selectedstoragesection = null) {
       
        $drop_down = '<select id="' . $p_name . '" name="' . $p_name . '">';

        if ($p_selectedstoragesection != null) {
            foreach ($p_selectedstoragesection as $storagesection) {
                $drop_down = $drop_down . '<option value ="' . $storagesection->idStoragesection . '" ' . set_select($p_name, $storagesection->idStoragesection) . '>' . $storagesection->code . '</option>';
            }
        } else {
            $drop_down = $drop_down . '<option></option>';
        }

        foreach ($p_storagesectionlist as $storagesection) {
            $drop_down = $drop_down . '<option value ="' . $storagesection->idStoragesection . '" ' . set_select($p_name, $storagesection->idStoragesection) . '>' . $storagesection->code . '</option>';
        }
        $drop_down = $drop_down . '</select>';
        return $drop_down;
    }

}

if (!function_exists('uom_dropdown')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     * @param	string	the URI segments of the form destination
     * @param	array	a key/value pair of attributes
     * @param	array	a key/value pair hidden data
     * @return	string
     */
    function uom_dropdown($p_uomlist, $p_name, $p_selecteduom = null) {
       
        $drop_down = '<select id="' . $p_name . '" name="' . $p_name . '">';

        if ($p_selecteduom != null) {
            foreach ($p_selecteduom as $uom) {
                $drop_down = $drop_down . '<option value ="' . $uom->idunidadesmedida . '" ' . set_select($p_name, $uom->idunidadesmedida) . '>' . $uom->codigo . ' - '. $uom->descripcion .'</option>';
            }
        } else {
            $drop_down = $drop_down . '<option></option>';
        }

        foreach ($p_uomlist as $uom) {
            $drop_down = $drop_down . '<option value ="' . $uom->idunidadesmedida . '" ' . set_select($p_name, $uom->idunidadesmedida) . '>' . $uom->codigo . ' - '. $uom->descripcion .'</option>';
        }
        $drop_down = $drop_down . '</select>';
        return $drop_down;
    }

}

if (!function_exists('tipodato_dropdown')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     * @param	string	the URI segments of the form destination
     * @param	array	a key/value pair of attributes
     * @param	array	a key/value pair hidden data
     * @return	string
     */
    function tipodato_dropdown($p_tipodatolist, $p_name, $p_selectedtipodato = null) {
       
        $drop_down = '<select id="' . $p_name . '" name="' . $p_name . '">';

        if ($p_selectedtipodato != null) {
            $tipodato = $p_selectedtipodato;
                $drop_down = $drop_down . '<option value ="' . $tipodato . '" ' . set_select($p_name, $tipodato) . '>' . $tipodato .'</option>';
            
        } else {
            $drop_down = $drop_down . '<option></option>';
        }

        foreach ($p_tipodatolist as $tipodato) {
            $drop_down = $drop_down . '<option value ="' . $tipodato . '" ' . set_select($p_name, $tipodato) . '>' . $tipodato .'</option>';
        }
        $drop_down = $drop_down . '</select>';
        return $drop_down;
    }

}

if (!function_exists('type_dropdown')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     * @param	string	the URI segments of the form destination
     * @param	array	a key/value pair of attributes
     * @param	array	a key/value pair hidden data
     * @return	string
     */
    function type_dropdown($p_tipolist, $p_name, $p_selectedtipo = null, $p_disable = null) {
       
        $drop_down = '<select id="' . $p_name . '" name="' . $p_name . '">';
        
        if($p_disable != null){
          $drop_down = '<select id="' . $p_name . '" name="' . $p_name . '" disabled="disabled">';  
        }
        
        if ($p_selectedtipo != null) {
            foreach ($p_selectedtipo as $tipo) {
                $drop_down = $drop_down . '<option value ="' . $tipo->idtype . '" ' . set_select($p_name, $tipo->idtype) . '>' . $tipo->code . ' - '. $tipo->description .'</option>';
            }
        } else {
            $drop_down = $drop_down . '<option></option>';
        }

        foreach ($p_tipolist as $tipo) {
            $drop_down = $drop_down . '<option value ="' . $tipo->idtype . '" ' . set_select($p_name, $tipo->idtype) . '>' . $tipo->code . ' - '. $tipo->description .'</option>';
        }
        $drop_down = $drop_down . '</select>';
        return $drop_down;
    }

}

if (!function_exists('property_dropdown')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     * @param	string	the URI segments of the form destination
     * @param	array	a key/value pair of attributes
     * @param	array	a key/value pair hidden data
     * @return	string
     */
    function property_dropdown($p_propertylist, $p_name, $p_selectedproperty = null) {
       
        $drop_down = '<select id="' . $p_name . '" name="' . $p_name . '">';

        if ($p_selectedproperty != null) {
            foreach ($p_selectedproperty as $property) {
                $drop_down = $drop_down . '<option value ="' . $property->idproperties . '" ' . set_select($p_name, $property->idproperties) . '>' . $property->code . ' - '. $property->description .'</option>';
            }
        } else {
            $drop_down = $drop_down . '<option></option>';
        }

        foreach ($p_propertylist as $property) {
            $drop_down = $drop_down . '<option value ="' . $property->idproperties . '" ' . set_select($p_name, $property->idproperties) . '>' . $property->code . ' - '. $property->description .'</option>';
        }
        $drop_down = $drop_down . '</select>';
        return $drop_down;
    }

}