<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Characteristic_Model
 *
 * @author 60044723
 */
class Characteristic_Model extends CI_Model{
    
    public $code;
    public $description;
    public $requiered;
    public $property;
   
    public function get_Characteristic_Model(){
        
         $this->db->select('characteristic.idcharacteristic,characteristic.code,characteristic.description,
                            characteristic.requiered,properties.code as property, properties.idproperties');
        $this->db->from('characteristic');
        $this->db->join('properties','characteristic.property = properties.idproperties');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_Characteristic_Model_fields($p_fields) {
       
        $this->db->select($p_fields);
        $this->db->from('characteristic');
        $this->db->join('properties','characteristic.property = properties.idproperties');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function find_by_id($p_Characteristic_Modelid){
        
        $this->db->select('characteristic.idcharacteristic,characteristic.code,characteristic.description,
                            characteristic.requiered,properties.code as property, properties.idproperties');
        $this->db->from('characteristic');
        $this->db->join('properties','characteristic.property = properties.idproperties');
         $this->db->where('idcharacteristic' , $p_Characteristic_Modelid);
        $query = $this->db->get();
        return $query->result();
    
    }
    
    public function find_by_property($p_Characteristic_Modelproperty){
        
        $this->db->select('characteristic.idcharacteristic,characteristic.code,characteristic.description,
                            characteristic.requiered,properties.code as property, properties.idproperties');
        $this->db->from('characteristic');
        $this->db->join('properties','characteristic.property = properties.idproperties');
         $this->db->where('property' , $p_Characteristic_Modelproperty);
        $query = $this->db->get();
        return $query->result();
    
    }
    
    public function insert_Characteristic_Model(){
        
        $this->code        = $_POST['code'];
        $this->description = $_POST['description'];
        $this->requiered   = $_POST['requiered'];
        $this->property    = $_POST['property'];
        
        return $this->db->insert('characteristic',$this);
    }
    
    public function update_Characteristic_Model(){
        
        $idcharacteristic  = $_POST['idcharacteristic'];
        $this->code        = $_POST['code'];
        $this->description = $_POST['description'];
        $this->requiered   = $_POST['requiered'];
        $this->property    = $_POST['property'];
        
        $this->db->update('characteristic',$this,array('idcharacteristic'=>$idcharacteristic));
    }
    
    public function delete_Characteristic_Model($p_idCharacteristic_Model){
        
        $this->db->where_in('idcharacteristic', $p_idCharacteristic_Model);
        $this->db->delete('characteristic');
        
    }
}
