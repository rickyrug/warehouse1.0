<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of InboundDelivery
 *
 * @author 60044723
 */
class InboundDelivery extends CI_Controller{
   
     public function index() {
        $this->load->model('InboundDeliveryhdr_Model', '', TRUE);
        $results = $this->InboundDeliveryhdr_Model->get_InboundDeliveryhdr();
        $data['results'] = $results;

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->view('general/header');
        $this->load->view('inbounddelivery/list', $data);
        $this->load->view('general/footer');

        if (isset($_POST['action'])) {

            switch ($_POST['action']) {

                case'add':
                    redirect('inbound/InboundDelivery/add', 'refresh');
                    break;
                case'edit';
                    if (isset($_POST['idInboundDelivery']) && count($_POST['idInboundDelivery']) == 1) {
                        $idInboundDelivery = $_POST['idInboundDelivery'];
                        redirect('inbound/InboundDelivery/edit/' . $idInboundDelivery[0], 'refresh');
                    } else {
                        echo 'Solamente puede editar un Inbound delivery';
                    }
                    break;
                case'delete':
                    if (isset($_POST['idInboundDelivery'])) {
                        $this->delete($_POST['idInboundDelivery']);
                    }
                    break;
            }
        }
    }

    public function add() {
        
         $v_warehouse =$this->session->userdata['warehousenumber'];
        $this->load->helper(array('form', 'url','dropdown','date'));
        $this->load->library('form_validation');
        $this->load->model('Warehouse_model','',TRUE);
      
        $data['warehousenumber'] = $v_warehouse[0]->warehousenumber;
        $data['action']  = 'add';
        $data['creation_date'] = now_24();
        $data['creation_user'] = $this->session->userdata['username'];
        $data['status']        = 'AC';
        $data['inbound_delivery_number'] = $this->generate_number($v_warehouse[0]->idwarehouse);

        $this->form_validation->set_rules('warehousenumber', 'Warehouse number', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('inbound_delivery_number', 'Inbound delivery number', 'required');
        $this->form_validation->set_rules('purchase_order_number', 'Purchase order', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('creation_date', 'Creation Date', 'required');
        $this->form_validation->set_rules('creation_user', 'Creation user', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('inbounddelivery/form',$data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('InboundDeliveryhdr_Model','',TRUE);
           echo $this->InboundDeliveryhdr_Model->insert_warehouse();
            
            
        }
        
    }
     public function delete($p_InboundDeliverys) {}
     public function edit($p_InboundDelivery) {}
     public function update() {}
     public function ajax_call_dropdown() {}
     
     public function generate_number($p_warehouse){
         $number = 0;
         $year = date("Y");
         $nextnumber = '';
         $len_year = 0;
         $len_num  = 0;
         $len_zero = 11;
                  
         $this->load->model('InboundDeliveryhdr_Model','',TRUE);
         $result = $this->InboundDeliveryhdr_Model->get_max_delivery_number($p_warehouse);
         
         if($result[0]->inbound_delivery_number == null){
             
             $number = $number + 1;
             $len_year   = strlen($year);
             $len_num    = strlen($number);
             $len_zero   = $len_zero - ($len_year + $len_num);
             $nextnumber = str_pad($year,$len_zero+$len_year,"0",STR_PAD_RIGHT);
             $nextnumber = $nextnumber.$number;
             
             
         }else{
             $data_baseyear = ''; 
             $number = $result[0]->inbound_delivery_number;
             $data_baseyear  = substr($number, 0,4);
             
             if($year != $data_baseyear){
                 
             $number = 1;
             $len_year   = strlen($year);
             $len_num    = strlen($number);
             $len_zero   = $len_zero - ($len_year + $len_num);
             $nextnumber = str_pad($year,$len_zero+$len_year,"0",STR_PAD_RIGHT);
             $nextnumber = $nextnumber.$number;
                 
             }else{
                  $nextnumber = $result[0]->inbound_delivery_number + 1;
             }
             
         }
         
         return $nextnumber;
        
         
     }
}
