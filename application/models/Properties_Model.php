<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Properties_Model
 *
 * @author 60044723
 */
class Properties_Model extends CI_Model{
    
    public $code;
    public $description;
    public $requiered;
    public $type;
   
    public function get_Properties_Model(){
        
        $this->db->select('properties.idproperties, properties.code, properties.description, '
                . '        properties.requiered, type.code as type');
        $this->db->from('properties');
        $this->db->join('type','properties.type = type.idtype');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_Properties_Model_fields($p_fields) {
        
        $this->db->select($p_fields);
        $this->db->from('properties');
        $this->db->join('type','properties.type = type.idtype');
        $query = $this->db->get();
        return $query->result();
            
    }
    
    public function find_by_id($p_Properties_Modelid){
        
        $this->db->select('properties.idproperties, properties.code, properties.description, '
                . '        properties.requiered, type.code as type, idtype');
        $this->db->from('properties');
        $this->db->join('type','properties.type = type.idtype');
        $this->db->where('idproperties' , $p_Properties_Modelid);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function find_by_code($p_Product_Modelid,$p_fields) {
        
       $this->db->select('p.idproperties, p.code, p.description, p.requiered, t.code as type');
        $this->db->from('properties');
        $this->db->join('type','properties.type = type.idtype');
        $this->db->where('properties.code' , $p_Product_Modelid);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function find_by_type($p_Product_ModelType) {
        
       $this->db->select('properties.idproperties, properties.code, properties.description, '
                       . 'properties.requiered, type.code as type');
        $this->db->from('properties');
        $this->db->join('type','properties.type = type.idtype');
        $this->db->where('properties.type' , $p_Product_ModelType);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function insert_Properties_Model(){
        
        $this->code        = $_POST['code'];
        $this->description = $_POST['description'];
        $this->requiered   = $_POST['requiered'];
        $this->type        = $_POST['type'];
        
        return $this->db->insert('properties',$this);
    }
    
    public function update_Properties_Model(){
        
        $this->code        = $_POST['code'];
        $this->description = $_POST['description'];
        $this->requiered   = $_POST['requiered'];
        $this->type        = $_POST['type'];
        $idproperties      = $_POST['idproperties'];
        
        $this->db->update('properties',$this,array('idproperties'=>$idproperties));
    }
    
    public function delete_Properties_Model($p_idProperties_Model){
        
        $this->db->where_in('idproperties', $p_idProperties_Model);
        $this->db->delete('properties');
    }
}
