<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product_Model
 *
 * @author 60044723
 */
class Product_Model extends CI_Model {
    
    public $code;
    public $name;
    public $type;

    public function get_product() {

        $this->db->select('product.code, product.name, idProduct, type.code as type, idtype');
        $this->db->from('product');
        $this->db->join('type','product.type = type.idtype');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_Product_Model_fields($p_fields) {
        
        $this->db->select($p_fields);
         $query = $this->db->get('product');
        return $query->result();
    }

    public function find_by_id($p_Product_Modelid) {
        
        $this->db->select('product.code, product.name, idProduct, type.code as type, idtype');
        $this->db->from('product');
       $this->db->join('type','product.type = type.idtype');
        $this->db->where('idProduct' , $p_Product_Modelid);
        $query = $this->db->get();
        return $query->result();
        
    }
    
   public function find_by_code($p_Product_Modelcode,$p_fields) {
        
        $this->db->select($p_fields);
        $this->db->from('product');
        $this->db->join('type','product.type = type.idtype');
        $this->db->where('product.code' , $p_Product_Modelcode);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function find_by_name($p_Product_Modelid,$p_fields) {
        
        $this->db->select($p_fields);
        $this->db->from('product');
       $this->db->join('type','product.type = type.idtype');
        $this->db->like('name', $p_Product_Modelid,'after');
        $query = $this->db->get();
        return $query->result();
        
    }
     public function find_like_code($p_Product_Modelid,$p_fields) {
        
        $this->db->select($p_fields);
        $this->db->from('product');
       $this->db->join('type','product.type = type.idtype');
        $this->db->like('code', $p_Product_Modelid,'after');
        $query = $this->db->get();
        return $query->result();
        
    }

    public function insert_Product() {
        
        $this->code        = $_POST['code'];
        $this->name        = $_POST['name'];
        $this->type        = $_POST['type'];
        
        return $this->db->insert('product',$this);
        
    }

    public function update_Product_Model() {
        
        $this->code        = $_POST['code'];
        $this->name        = $_POST['name'];
        $this->type        = $_POST['type'];
        $idproduct         = $_POST['idproduct'];  
        
        $this->db->update('product',$this,array('idProduct'=>$idproduct));
    }

    public function delete_Product_Model($p_idProduct_Model) {
        
        $this->db->where_in('idProduct', $p_idProduct_Model);
        $this->db->delete('product');
    }

}
