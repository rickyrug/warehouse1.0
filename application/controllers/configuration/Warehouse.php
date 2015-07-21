<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Warehouse
 *
 * @author 60044723
 */
    class Warehouse extends CI_Controller {



    
    public function index() {
         $this->load->model('Warehouse_model','',TRUE);
         $results  = $this->Warehouse_model->get_warehouses();
         $data['results'] = $results;
         
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         
          $this->load->view('general/header');
          $this->load->view('warehouse/warehouselist',$data);
          $this->load->view('general/footer');
                           
         if(isset($_POST['action'])){
             
             switch ($_POST['action']){
                 
                 case'add':
                    redirect('configuration/warehouse/add', 'refresh');
                 break;
                 case'edit';
                    if(isset($_POST['idwarehouse']) && count($_POST['idwarehouse'])== 1){
                        $idwarehouse = $_POST['idwarehouse'];
                     redirect('configuration/warehouse/edit/'.$idwarehouse[0], 'refresh');                        
                    }else{
                        echo 'Solamente puede editar un Warehouse';
                    }
                 break;
                 case'delete':
                     if(isset($_POST['idwarehouse'])){
                       $this->delete($_POST['idwarehouse']);
                     }
                     break;
                 
             }
             
         }
     
         
         
    }
      public function add() {
        $data['action'] = 'add';
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
       

        $this->form_validation->set_rules('number', 'Warehouse number', 'required|min_length[4]|max_length[4]|callback_validate_number');
        $this->form_validation->set_rules('name', 'Warehouse name', 'required');
        $this->form_validation->set_rules('adress', 'Warehouse adress', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('warehouse/warehouseform',$data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('Warehouse_model','',TRUE);
           echo $this->Warehouse_model->insert_warehouse();
            
            redirect('configuration/Warehouse', 'refresh');
        }
        
    }
    
    public function validate_number($p_number){
         $this->load->model('Warehouse_model','',TRUE);

         if($this->Warehouse_model->validate_warehousenumber($p_number) > 0){
             $this->form_validation->set_message('validate_number', 'The %s field already exists!');
	    return FALSE;
         }else{
             return TRUE;
         }
        
    }
    
    public function edit($p_number){
        $data['action'] = 'edit';
        $this->load->model('Warehouse_model','',TRUE);
        $results  = $this->Warehouse_model->find_by_id($p_number);
        $result = $results[0];
        $data['number']          = $result->warehousenumber;
        $data['name']            = $result->name;
        $data['adress']          = $result->adress;
        $data['idwarehouse']     = $result->idwarehouse;
       
       
       
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $this->load->view('general/header');
        $this->load->view('warehouse/warehouseform', $data);
        $this->load->view('general/footer');
    }
    
    public function update(){
        $data['action'] = 'update';
         $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
       

        $this->form_validation->set_rules('number', 'Warehouse number', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('name', 'Warehouse name', 'required');
        $this->form_validation->set_rules('adress', 'Warehouse adress', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('warehouse/warehouseform', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('Warehouse_model', '', TRUE);
            echo $this->Warehouse_model->update_warehouse();

            redirect('configuration/Warehouse', 'refresh');
        }
    }
    
    public function delete($p_idwarehouses){

        $this->load->model('Warehouse_model','',TRUE);
        $this->Warehouse_model->delete_warehouses($p_idwarehouses);
        redirect('configuration/Warehouse', 'refresh');
    }
    
   
    
}
