<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Product_Properties
 *
 * @author 60044723
 */
class Product_Properties_Model extends CI_Model{
    
    public $idproduct;
    public $characteristic;
    public $UOM;
   
    public function get_Product_Properties($p_productid){
     
    }
    
    public function get_Product_Properties_fields($p_fields,$p_productid) {}
    
    public function find_by_id($p_Product_Propertiesid){}
    
    public function find_by_product_characteristic($p_idproduct, $p_characteristica){
      
        $this->db->select('idproduct_properties');
        $this->db->from('product_properties');
        $this->db->where('idproduct' ,      $p_idproduct);
        $this->db->where('characteristic' , $p_characteristica);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insert_Product_Properties($p_idproduct,$p_characteristic,
                                              $p_idvalue = null, $p_uom=null){
        
        $this->idproduct      = $p_idproduct;
        $this->characteristic = $p_characteristic;
        
        return $this->db->insert('product_properties',$this);
    }
    
    public function update_Product_Properties(){}
    
    public function delete_Product_Properties($p_idProduct_Properties){}
}
