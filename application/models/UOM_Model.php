<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of UOM
 *
 * @author 60044723
 */
class UOM_Model extends CI_Model{
   
    public $codigo;
    public $descripcion;
    public $tipodato;
    
    public function get_UOM(){
        $query = $this->db->get('unidadesmedida');
        return $query->result();
    }
    
    public function get_UOM_fields($p_fields) {
        
        $this->db->select($p_fields);
        $this->db->from('unidadesmedida');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function find_by_id($p_UOMid){
        
        $query = $this->db->get_where('unidadesmedida', array('idunidadesmedida' => $p_UOMid));
         
        return $query->result();
        
    }
    
    public function insert_UOM(){
        
        $this->codigo      = $_POST['codigo'];
        $this->descripcion = $_POST['descripcion'];
        $this->tipodato    = $_POST['tipodato'];
        return $this->db->insert('unidadesmedida',$this);
    }
    
    public function update_UOM(){
        
        $this->codigo      = $_POST['codigo'];
        $this->descripcion = $_POST['descripcion'];
        $idunidadesmedida  = $_POST['idunidadesmedida'];
        $this->tipodato    = $_POST['tipodato'];
        $this->db->update('unidadesmedida',$this,array('idunidadesmedida'=>$idunidadesmedida));
        
    }
    
    public function delete_UOM($p_idUOM){
        
        $this->db->where_in('idunidadesmedida', $p_idUOM);
        $this->db->delete('unidadesmedida');
    }
}
