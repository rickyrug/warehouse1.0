<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of InboundDeliveryhdr
 *
 * @author 60044723
 */
class InboundDeliveryhdr_Model extends CI_Model{
   
    public $warehousenumber;
    public $inbound_delivery_number;
    public $purchase_order_number;
    public $status;
    public $creation_date;
    public $creation_user;
    public $modification_date;
    public $modification_user;
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function get_InboundDeliveryhdr(){
        
        $query = $this->db->get('inbounddeliveryhdr');
        return $query->result();
        
    }
    
    public function get_InboundDeliveryhdr_fields($p_fields) {
        
        $this->db->select($p_fields);
        $query = $this->db->get('inbounddeliveryhdr');
        return $query->result();
        
    }
    
    public function find_by_id($p_InboundDeliveryhdrid){
         $query = $this->db->get_where('inbounddeliveryhdr', array('inbounddeliveryhdr' => $p_InboundDeliveryhdrid));
         return $query->result();
    }
    
    public function insert_InboundDeliveryhdr(){
        $this->creation_date           = $_POST['creation_date'];
        $this->creation_user           = $_POST['creation_user'];
        $this->inbound_delivery_number = $_POST['inbound_delivery_number'];
        $this->purchase_order_number   = $_POST['purchase_order_number'];
        $this->status                  = $_POST['status'];
        $this->warehousenumber         = $_POST['warehousenumber'];
        return $this->db->insert('inbounddeliveryhdr',$this);
    }
    
    public function update_InboundDeliveryhdr(){
        $this->creation_date          = $_POST['creation_date'];
        $this->creation_user           = $_POST['creation_user'];
        $this->inbound_delivery_number = $_POST['inbound_delivery_number'];
        $this->purchase_order_number   = $_POST['purchase_order_number'];
        $this->status                  = $_POST['status'];
        $this->warehousenumber         = $_POST['warehousenumber'];
        $this->modification_date       = $_POST['modification_date'];
        $this->modification_user       = $_POST['modification_user'];
        $idInboundDelivery             = $_POST['idInboundDelivery'];
        
    }
    
    public function delete_InboundDeliveryhdr($p_idInboundDeliveryhdr){
        
    }
    
    public function get_max_delivery_number($p_warehouse){
        
        $this->db->select_max('inbound_delivery_number');
        $this->db->where('warehousenumber',$p_warehouse);
        $query = $this->db->get('inbounddeliveryhdr'); 
        return $query->result();
    }
}
