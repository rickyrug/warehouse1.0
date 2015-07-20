<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StorageBin_Model
 *
 * @author 60044723
 */
class StorageBin_Model extends CI_Model {
    
    public $code;
    public $name;
    public $warehousenumber;
    public $storagetypenumber;
    public $storagesectionnumer;

    public function get_StorageBin() {
        
        $this->db->select('storagebin.idstoragebin, storagebin.code,storagebin.name,warehouse.warehousenumber,
                           storagetype.code as storagetypenumber, storagesection.code as storagesectionnumber,
                           storagebin.warehousenumber as idwarehouse, storagebin.storagetypenumber as idstoragetype,
                           storagebin.storagesectionnumer as idstoragesection ');
        $this->db->from('storagebin');
        $this->db->join('warehouse','storagebin.warehousenumber = warehouse.idwarehouse');
        $this->db->join('storagetype','storagebin.storagetypenumber = storagetype.idstoragetype');
        $this->db->join('storagesection','storagebin.storagesectionnumer = storagesection.idStoragesection');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_StorageBin_Model_fields($p_fields) {
        
    }

    public function find_by_id($p_StorageBin_id) {
        $this->db->select('storagebin.idstoragebin, storagebin.code,storagebin.name,warehouse.warehousenumber,
                           storagetype.code as storagetypenumber, storagesection.code as storagesectionnumber,
                           storagebin.warehousenumber as idwarehouse, storagebin.storagetypenumber as idstoragetype,
                           storagebin.storagesectionnumer as idstoragesection ');
        $this->db->from('storagebin');
        $this->db->join('warehouse','storagebin.warehousenumber = warehouse.idwarehouse');
        $this->db->join('storagetype','storagebin.storagetypenumber = storagetype.idstoragetype');
        $this->db->join('storagesection','storagebin.storagesectionnumer = storagesection.idStoragesection');
        $this->db->where('idstoragebin',$p_StorageBin_id);
        $query = $this->db->get();
        return $query->result();
        
    }

    public function insert_storagebin() {
        
        $this->code                 = $_POST['code'];
        $this->name                 = $_POST['name'];
        $this->warehousenumber      = $_POST['warehousenumber'];
        $this->storagetypenumber    = $_POST['idstoragetype'];
        $this->storagesectionnumer = $_POST['idstoragesection'];
        
        return $this->db->insert('storagebin',$this);
        
    }

    public function update_StorageBin() {
        
        $this->code                 = $_POST['code'];
        $this->name                 = $_POST['name'];
        $this->warehousenumber      = $_POST['warehousenumber'];
        $this->storagetypenumber    = $_POST['idstoragetype'];
        $this->storagesectionnumer  = $_POST['idstoragesection'];
        $idstoragebin               = $_POST['idstoragebin'];
        
        $this->db->update('storagebin',$this,array('idstoragebin'=>$idstoragebin));
    }

    public function delete_storagebin($p_idstoragebins) {
        
         $this->db->where_in('idstoragebin', $p_idstoragebins);
         $this->db->delete('storagebin');
        
    }

    public function get_max(){
        
        $this->db->select_max('idstoragebin');
        $this->db->from('storagebin');
        $query = $this->db->get();
        return $query->result();
    }
}
