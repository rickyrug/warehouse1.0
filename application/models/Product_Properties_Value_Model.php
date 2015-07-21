<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Product_Properties_Value_Model
 *
 * @author 60044723
 */
class Product_Properties_Value_Model extends CI_Model{
    
    public $valuename;
    public $value;
    public $characteristic;
    public $product_property;
   
    public function get_Product_Properties_Value_Model(){}
    
    public function get_Product_Properties_Value_Model_fields($p_fields) {}
    
    public function find_by_id($p_Product_Properties_Value_Modelid){}
    
    public function insert_Product_Properties_Value_Model($p_valuename, $p_value, 
                                                          $p_characteristic,$p_product_property){
        $this->valuename        = $p_valuename;
        $this->value            = $p_value;
        $this->characteristic   = $p_characteristic;
        $this->product_property = $p_product_property;
        
        return $this->db->insert('product_properties_values',$this);
    }
    
    public function update_Product_Properties_Value_Model(){}
    
    public function delete_Product_Properties_Value_Model($p_idProduct_Properties_Value_Model){}
}
