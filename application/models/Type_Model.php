<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Type_Model
 *
 * @author 60044723
 */
class Type_Model extends CI_Model{
   
    public $code;
    public $description;
    public $group;
    
    public function get_Type_Model(){
        $this->db->from('type');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_Type_Model_fields($p_fields) {
        $this->db->select($p_fields);
        $this->db->from('type');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function find_by_id($p_Type_Modelid){
        
        $query = $this->db->get_where('type', array('idtype' => $p_Type_Modelid));
         
        return $query->result();
                       
    }
    
    public function find_by_group($p_Type_group,$p_fields){
        $this->db->select($p_fields);
        $this->db->from('type');
        $this->db->where('group',$p_Type_group);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function insert_Type_Model(){
        $this->code        = $_POST['code'];
        $this->description = $_POST['description'];
        $this->group       = $_POST['group'];
        
        return $this->db->insert('type',$this);
    }
    
    public function update_Type_Model() {

        $this->code = $_POST['code'];
        $this->description = $_POST['description'];
        $this->group = $_POST['group'];
        $idtype = $_POST['idtype'];
        $this->db->update('type', $this, array('idtype' => $idtype));
    }

    public function delete_Type_Model($p_idType_Model){
        
        $this->db->where_in('idtype', $p_idType_Model);
        $this->db->delete('type');
        
    }
}
