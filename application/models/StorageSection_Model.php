<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StorageSection_Model
 *
 * @author 60044723
 */
class StorageSection_Model extends CI_Model{
   
    public $code;
    public $name;
    public $warehousenumber;
    public $storagetypenumber;
    
    public function get_storagesection(){
        $this->db->select('idStoragesection,storagesection.code, storagesection.name,warehouse.warehousenumber,storagetype.code as storagetypenumber,
                            warehouse.idwarehouse, storagetype.idstoragetype');
        $this->db->from('storagesection');
        $this->db->join('warehouse','storagesection.warehousenumber = warehouse.idwarehouse');
        $this->db->join('storagetype','storagesection.storagetypenumber = storagetype.idstoragetype');
         $query = $this->db->get();
        return $query->result();
    }
    
    public function get_storagesection_fields($p_fields,  $p_storagetype = null) {
        
        $this->db->select($p_fields);
        $this->db->from('storagesection');
        $this->db->where('storagetypenumber',$p_storagetype);
        $query = $this->db->get();
        return $query->result();
    }
        
        
    
    
    public function find_by_id($p_storagesectionid){
        $this->db->select('idStoragesection,storagesection.code, storagesection.name,warehouse.warehousenumber,storagetype.code as storagetypenumber,
                            warehouse.idwarehouse, storagetype.idstoragetype');
        $this->db->from('storagesection');
        $this->db->join('warehouse','storagesection.warehousenumber = warehouse.idwarehouse');
        $this->db->join('storagetype','storagesection.storagetypenumber = storagetype.idstoragetype');
        $this->db->where('idStoragesection' , $p_storagesectionid);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insert_storagesection(){
        
        $this->code                     = $_POST['code'];
        $this->name                     = $_POST['name'];
        $this->warehousenumber          = $_POST['warehousenumber'];
        $this->storagetypenumber        = $_POST['idstoragetype'];
        return $this->db->insert('storagesection',$this);
        
    }
    
    public function update_storagesection(){
        $this->code                     = $_POST['code'];
        $this->name                     = $_POST['name'];
        $this->warehousenumber          = $_POST['warehousenumber'];
        $this->storagetypenumber        = $_POST['idstoragetype'];
        $idstoragesection               = $_POST['idstoragesection'];
        
        $this->db->update('storagesection',$this,array('idstoragesection'=>$idstoragesection));
    }
    
    public function delete_storagesection($p_idstoragesection){
         $this->db->where_in('idstoragesection', $p_idstoragesection);
         $this->db->delete('storagesection');
    }
}
