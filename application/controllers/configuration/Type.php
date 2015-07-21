<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Type
 *
 * @author 60044723
 */
class Type extends CI_Controller{
   
    public function index() {
        
         $this->load->model('Type_Model','',TRUE);
         $results  = $this->Type_Model->get_Type_model();
         $data['results'] = $results;
         
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         
          $this->load->view('general/header');
          $this->load->view('type/list',$data);
          $this->load->view('general/footer');
                           
         if(isset($_POST['action'])){
             
             switch ($_POST['action']){
                 
                 case'add':
                    redirect('configuration/type/add', 'refresh');
                 break;
                 case'edit';
                    if(isset($_POST['idtype']) && count($_POST['idtype'])== 1){
                        $idtype = $_POST['idtype'];
                     redirect('configuration/type/edit/'.$idtype[0], 'refresh');                        
                    }else{
                        echo 'Solamente puede editar un Type';
                    }
                 break;
                 case'delete':
                     if(isset($_POST['idtype'])){
                       $this->delete($_POST['idtype']);
                     }
                     break;
                 
             }
         }
    }
    
     public function add() {
        $data['action'] = 'add';
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
       

        $this->form_validation->set_rules('code', 'Type code', 'required|max_length[4]');
        $this->form_validation->set_rules('description', 'Type description', 'required');
        $this->form_validation->set_rules('group', 'Type Group', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('type/form',$data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('Type_Model','',TRUE);
           echo $this->Type_Model->insert_Type_Model();
            
            redirect('configuration/type', 'refresh');
        }
         
     }
     public function delete($p_Types) {
         
         $this->load->model('Type_Model','',TRUE);
        $this->Type_Model->delete_Type_Model($p_Types);
        redirect('configuration/type', 'refresh');
         
     }
     
     public function edit($p_Type) {
        
        $data['action'] = 'edit';
        
        $this->load->model('Type_Model','',TRUE);
        $results  = $this->Type_Model->find_by_id($p_Type);
        $result = $results[0];
        $data['idtype']               = $result->idtype;
        $data['code']                 = $result->code;
        $data['description']          = $result->description;
        $data['group']                = $result->group;
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $this->load->view('general/header');
        $this->load->view('type/form', $data);
        $this->load->view('general/footer');
     }
     public function update() {
        $data['action'] = 'update';
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('code', 'Type code', 'required|max_length[4]');
        $this->form_validation->set_rules('description', 'Type description', 'required');
        $this->form_validation->set_rules('group', 'Type Group', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('type/form', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('Type_Model','',TRUE);
            echo $this->Type_Model->update_Type_Model();

            redirect('configuration/type', 'refresh');
        }
     }
     
     
     
     public function ajax_call_dropdown() {
         
         if ($_POST) {

            $group = $_POST['group'];

            $this->load->helper(array('dropdown', 'form'));
            $this->load->model('Type_Model','',TRUE);
            $list = $this->Type_Model->find_by_group($group,'idtype,code,description');
            echo tipo_dropdown($list, 'idtype');
        }
     }
}
