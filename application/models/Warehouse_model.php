<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Warehouse_model
 *
 * @author 60044723
 */
class Warehouse_model extends CI_Model{

    public $warehousenumber;
    public $name;
    public $adress;
//    public $idwarehouse;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_warehouses(){
        
        $query = $this->db->get('warehouse');
        return $query->result();
        
    }
    
    public function get_warehouses_fields($p_fields) {

        $this->db->select($p_fields);
        $query = $this->db->get('warehouse');
        return $query->result();
    }

    
    
    public function insert_warehouse(){
        
        $this->warehousenumber = $_POST['number'];
        $this->name            = $_POST['name'];
        $this->adress          = $_POST['adress'];
        return $this->db->insert('warehouse',$this);
        
    }
    
    public function update_warehouse(){
        
        $idwarehouse           = $_POST['idwarehouse'];
        $this->warehousenumber = $_POST['number'];
        $this->name            = $_POST['name'];
        $this->adress          = $_POST['adress'];
        
         $this->db->update('warehouse',$this,array('idwarehouse'=>$idwarehouse));
    }
    
    public function find_by_id($p_warehouseid){
        
        $query = $this->db->get_where('warehouse', array('idwarehouse' => $p_warehouseid));
         
        return $query->result();
    }
    
    public function validate_warehousenumber($p_warehousenumber){
        
        $sql = "SELECT * FROM warehouse WHERE warehousenumber = ?";
        $this->db->from('warehouse');
        $this->db->where('warehousenumber',$p_warehousenumber);
        return $this->db->count_all_results();
        
    }
    
    public function delete_warehouses($p_idwarehouses){
       
        $this->db->where_in('idwarehouse', $p_idwarehouses);
        $this->db->delete('warehouse');
    }
    
    
}
