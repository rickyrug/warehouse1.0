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
class UOM extends CI_Controller{
 
    private $tipodato = ['FLOAT','TEXT','BOOLEAN'];
    
    public function index() {
         $this->load->model('UOM_Model','',TRUE);
         $results  = $this->UOM_Model->get_UOM();
         $data['results'] = $results;
         
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         
          $this->load->view('general/header');
          $this->load->view('UOM/list',$data);
          $this->load->view('general/footer');
                           
         if(isset($_POST['action'])){
             
             switch ($_POST['action']){
                 
                 case'add':
                    redirect('configuration/uom/add', 'refresh');
                 break;
                 case'edit';
                    if(isset($_POST['idunidadesmedida']) && count($_POST['idunidadesmedida'])== 1){
                        $idunidadesmedida = $_POST['idunidadesmedida'];
                     redirect('configuration/uom/edit/'.$idunidadesmedida[0], 'refresh');                        
                    }else{
                        echo 'Solamente puede editar un Unidad de medida';
                    }
                 break;
                 case'delete':
                     if(isset($_POST['idunidadesmedida'])){
                       $this->delete($_POST['idunidadesmedida']);
                     }
                     break;
                 
             }
             
         }
 
    }
     public function add() {
        
        $data['action'] = 'add';
        $data['tipodatolist'] = $this->tipodato;
        $this->load->helper(array('form', 'url','dropdown'));
        $this->load->library('form_validation');
       

        $this->form_validation->set_rules('codigo', 'UOM codigo', 'required|max_length[4]');
        $this->form_validation->set_rules('descripcion', 'UOM description', 'required');
        $this->form_validation->set_rules('tipodato', 'Tipo de dato', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('UOM/form',$data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('UOM_Model','',TRUE);
           echo $this->UOM_Model->insert_UOM();
            
           redirect('configuration/uom', 'refresh');
        }
     }
     
     public function delete($p_UOMs) {
         
        $this->load->model('UOM_Model','',TRUE);
        $this->UOM_Model->delete_UOM($p_UOMs);
        redirect('configuration/uom', 'refresh');
 
     }
     
     public function edit($p_UOM) {
         
        $data['action'] = 'edit';
        $data['tipodatolist'] = $this->tipodato;
        $this->load->model('UOM_Model','',TRUE);
        $results  = $this->UOM_Model->find_by_id($p_UOM);
        $result = $results[0];
        $data['idunidadesmedida']     = $result->idunidadesmedida;
        $data['codigo']               = $result->codigo;
        $data['descripcion']          = $result->descripcion;
        $data['tipodato']             = $result->tipodato;
        $this->load->helper(array('form', 'url','dropdown'));
        $this->load->library('form_validation');
        
        $this->load->view('general/header');
        $this->load->view('uom/form', $data);
        $this->load->view('general/footer');
     }
     public function update() {
         
        $data['action'] = 'update';
        $this->load->helper(array('form', 'url','dropdown'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('codigo', 'UOM codigo', 'required|max_length[4]');
        $this->form_validation->set_rules('descripcion', 'UOM description', 'required');
        $this->form_validation->set_rules('tipodato', 'Tipo de dato', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('uom/form', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('UOM_Model','',TRUE);
            echo $this->UOM_Model->update_UOM();

            redirect('configuration/uom', 'refresh');
        }
    }
     public function ajax_call_dropdown() {
         
         if ($_POST) {

            $iduom    = $_POST['idunidadesmedida'];

            $this->load->helper(array('dropdown', 'form'));
            $this->load->model('UOM_Model', '', TRUE);
            $list = $this->UOM_Model->get_UOM_fields('idunidadesmedida,codigo',  $iduom);
            echo storagesection_dropdown($list, 'idunidadesmedida');
        }
     }
}
