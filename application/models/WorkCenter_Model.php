<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WorkCenter_Model
 *
 * @author 60044723
 */
class WorkCenter_Model extends CI_Model {
    
    
    public $code;
    public $name;
    public $warehousenumber;
    public $status;
    public $creation_date;
    public $creation_user;
    public $modification_date;
    public $modification_user;
    
    public function get_workcenter(){
        $this->db->select('idWorkcenter,code,workcenter.name,warehouse.warehousenumber,status,creation_date,
                          creation_user,modification_user,modification_date,idwarehouse');
        $this->db->from('workcenter');
        $this->db->join('warehouse','workcenter.warehousenumber = warehouse.idwarehouse');
         $query = $this->db->get();
         return $query->result();
    }
    
    public function insert_workcenter(){
        
        $this->code               = $_POST['code'];
        $this->name               = $_POST['name'];
        $this->warehousenumber    = $_POST['warehousenumber'];
        $this->status             = $_POST['status'];
        $this->creation_date      = $_POST['creation_date'];
        $this->creation_user      = $_POST['creation_user'];
        
        return $this->db->insert('workcenter',$this);
        
    }
    
    public function find_by_id($p_workcenterid){
        
        $query = $this->db->get_where('workcenter', array('idworkcenter' => $p_workcenterid));
         
        return $query->row_array();
    }
    
    public function get_workcenter_fields($p_fields, $p_warehouse = null) {

        $this->db->select($p_fields);
        if ($p_warehouse != null) {
            $this->db->where('warehousenumber', $p_warehouse);
        }
        $query = $this->db->get('workcenter');
        return $query->result();
    }
    
    public function update_workcenter(){
         
         $idworkcenter = $_POST['idworkcenter'];
         $this->code   = $_POST['code'];
         $this->name   = $_POST['name'];
         $this->warehousenumber = $_POST['warehousenumber'];
         $this->status = $_POST['status'];
         $this->creation_date = $_POST['creation_date'];
         $this->creation_user = $_POST['creation_user'];
         $this->modification_date = $_POST['modification_date'];
         $this->modification_user = $_POST['modification_user'];
        
         $this->db->update('workcenter',$this,array('idWorkcenter'=>$idworkcenter));
    }
    
    public function delete_workcenter($p_idworkcenters){
        $this->db->where_in('idWorkcenter', $p_idworkcenters);
        $this->db->delete('workcenter');
    }
    
    

}
