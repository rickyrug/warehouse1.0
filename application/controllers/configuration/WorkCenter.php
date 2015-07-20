<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WorkCenter
 *
 * @author 60044723
 */
class WorkCenter extends CI_Controller{
   
    public function index(){
        
         $this->load->model('WorkCenter_Model','',TRUE);
         $results  = $this->WorkCenter_Model->get_workcenter();
         $data['results'] = $results;
         
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         $this->load->view('general/header');
         $this->load->view('workcenter/workcenterlist',$data);
         $this->load->view('general/footer');
         
         if(isset($_POST['action'])){
             
             switch ($_POST['action']){
                 
                 case'add':
                    redirect('configuration/workcenter/add', 'refresh');
                 break;
                 case'edit';
                    if(isset($_POST['idworkcenter']) && count($_POST['idworkcenter'])== 1){
                        $idworkcenter = $_POST['idworkcenter'];
                     redirect('configuration/workcenter/edit/'.$idworkcenter[0], 'refresh');                        
                    }else{
                        echo 'Solamente puede editar un Workcenter';
                    }
                 break;
                 case'delete':
                     if(isset($_POST['idworkcenter'])){
                       $this->delete($_POST['idworkcenter']);
                     }
                     break;
                 
             }
             
         } 
    }
    
    public function add(){
        
        $this->load->model('Warehouse_model','',TRUE);
        $results = $this->Warehouse_model->get_warehouses_fields('idwarehouse,warehousenumber');
        
        $data['action']  = 'add';
        $data['warehouselist'] = $results;
        $data['creation_user']    = 1;
        $data['modification_user']    = ' ';
        
        $this->load->helper(array('form', 'url','dropdown','date'));
        $this->load->library('form_validation');
       

        $this->form_validation->set_rules('code', 'Work Center code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('name', 'Work Center name', 'required');
        $this->form_validation->set_rules('warehousenumber', 'Warehouse number', 'required');
        $this->form_validation->set_rules('status', 'Work Center status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('workcenter/workcenterform', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('WorkCenter_Model', '', TRUE);
            $this->WorkCenter_Model->insert_workcenter();

            redirect('configuration/WorkCenter', 'refresh');
        }
    }
    
    public function edit($p_idworkcenter){
        $data['action'] = 'edit';
        $this->load->model('WorkCenter_Model','',TRUE);
        $this->load->model('Warehouse_model','',TRUE);

        $results  = $this->WorkCenter_Model->find_by_id($p_idworkcenter);
        $data['code']              = $results['code'];
        $data['name']              = $results['name'];
        $data['warehousenumber']   = $this->Warehouse_model->find_by_id($results['warehousenumber']); 
        $data['status']            = $results['status'];
        $data['creation_date']     = $results['creation_date'];
        $data['creation_user']     = $results['creation_user'];
        $data['modification_date'] = $results['modification_date'];
//        $data['modification_user'] = $results['modification_user'];
        $data['modification_user'] = 1;
        $data['idworkcenter']      = $results['idWorkcenter'];
        $data['warehouselist']     = $this->Warehouse_model->get_warehouses_fields('idwarehouse,warehousenumber');
       
       
       $this->load->helper(array('form', 'url','dropdown','date'));
       $this->load->library('form_validation');
      
       $this->load->view('general/header');
       $this->load->view('workcenter/workcenterform', $data);
       $this->load->view('general/footer');
    }
    
    public function update(){
        $data['action'] = 'update';
        $this->load->helper(array('form', 'url','dropdown','date'));
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('code', 'Work Center code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('name', 'Work Center name', 'required');
        $this->form_validation->set_rules('warehousenumber', 'Warehouse number', 'required');
        $this->form_validation->set_rules('status', 'Work Center status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('workcenter/workcenterform', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('WorkCenter_Model','',TRUE);
           echo $this->WorkCenter_Model->update_workcenter();
            
            redirect('configuration/WorkCenter', 'refresh');
        }
    }
    
    public function delete($p_workcenters){
         $this->load->model('WorkCenter_Model','',TRUE);
         $this->WorkCenter_Model->delete_workcenter($p_workcenters);
         redirect('configuration/WorkCenter', 'refresh');
    }
    
    public function ajax_call_dropdown() {
        if ($_POST) {
            $warehousenumber = $_POST['warehousenumber'];
            $this->load->helper(array('dropdown','form'));
            $this->load->model('WorkCenter_Model','',TRUE);
            $workcenterlist = $this->WorkCenter_Model->get_workcenter_fields('idWorkcenter,code',$warehousenumber);
//            var_dump($workcenterlist);
         echo workcenter_dropdown($workcenterlist, 'idworkcenter');
            
             
        }
    }
   
}
