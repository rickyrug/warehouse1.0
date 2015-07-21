<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StorageType_Model
 *
 * @author 60044723
 */
class StorageType_Model extends CI_Model{
  
    public $code;
    public $name;
    public $warehousenumber;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_storagetype(){
       $this->db->select('idstoragetype, code, storagetype.name, warehouse.warehousenumber, warehouse.idwarehouse');
        $this->db->from('storagetype');
        $this->db->join('warehouse','storagetype.warehousenumber = warehouse.idwarehouse');
         $query = $this->db->get();
         return $query->result();
    }
    
    public function get_storagetypes_fields($p_fields, $p_warehouse = null) {

        $this->db->select($p_fields);
        if ($p_warehouse != null) {
            $this->db->where('warehousenumber', $p_warehouse);
        }
        $query = $this->db->get('storagetype');
        return $query->result();
    }
    
     public function find_by_id($p_idstoragetype){
        
        $query = $this->db->get_where('storagetype', array('idstoragetype' => $p_idstoragetype));
         
        return $query->result();
    }
    
    public function insert_storagetype(){
        
        $this->code            = $_POST['code'];
        $this->name            = $_POST['name'];
        $this->warehousenumber = $_POST['warehousenumber'];
        return $this->db->insert('storagetype',$this);
        
    }
    
    public function update_storagetype(){
       
        $idstoragetype          = $_POST['idstoragetype'];
        $this->code            = $_POST['code'];
        $this->name            = $_POST['name'];
        $this->warehousenumber = $_POST['warehousenumber'];
        
         $this->db->update('storagetype',$this,array('idstoragetype'=>$idstoragetype));
    }
    
    public function delete_storagetype($p_idstoragetypes){
       
        $this->db->where_in('idstoragetype', $p_idstoragetypes);
        $this->db->delete('storagetype');
    }
}
