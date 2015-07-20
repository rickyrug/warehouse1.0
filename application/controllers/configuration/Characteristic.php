<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Characteristic
 *
 * @author 60044723
 */
class Characteristic extends CI_Controller{
   
    public function index() {
        
          $this->load->model('Characteristic_Model', '', TRUE);
        $results = $this->Characteristic_Model->get_Characteristic_Model();
        $data['results'] = $results;

        $this->load->helper(array('form', 'url','dropdown'));
        $this->load->library('form_validation');

        $this->load->view('general/header');
        $this->load->view('characteristic/list', $data);
        $this->load->view('general/footer');

        if (isset($_POST['action'])) {

            switch ($_POST['action']) {

                case'add':
                    redirect('configuration/characteristic/add', 'refresh');
                    break;
                case'edit';
                    if (isset($_POST['idcharacteristic']) && count($_POST['idcharacteristic']) == 1) {
                        $idcharacteristic = $_POST['idcharacteristic'];
                        redirect('configuration/characteristic/edit/' . $idcharacteristic[0], 'refresh');
                    } else {
                        echo 'Solamente puede editar una Characteristic';
                    }
                    break;
                case'delete':
                    if (isset($_POST['idcharacteristic'])) {
                        $this->delete($_POST['idcharacteristic']);
                    }
                    break;
            }
        }
        
    }
     public function add() {
         
         $this->load->model('Properties_Model', '', TRUE);

        $this->load->helper(array('form', 'url', 'dropdown'));
        $this->load->library('form_validation');

        $data['action'] = 'add';
        $data['propertylist'] = $this->Properties_Model->get_Properties_Model_fields('idproperties,properties.code,properties.description');

        $this->form_validation->set_rules('code', 'Characteristic code', 'required|max_length[4]');
        $this->form_validation->set_rules('description', 'Characteristic description', 'required');
        $this->form_validation->set_rules('requiered', 'requiered', 'required');
        $this->form_validation->set_rules('property', 'Property', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('characteristic/form', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('Characteristic_Model', '', TRUE);
            $this->Characteristic_Model->insert_Characteristic_Model();
            redirect('configuration/Characteristic', 'refresh');
        }
         
     }
     public function delete($p_Characteristics) {

        $this->load->model('Characteristic_Model', '', TRUE);
        $this->Characteristic_Model->delete_Characteristic_Model($p_Characteristics);
        redirect('configuration/Characteristic', 'refresh');
    }

    public function edit($p_Characteristic) {
        
        $data['action'] = 'edit';
        
        $this->load->model('Characteristic_Model','',TRUE);
        $this->load->model('Properties_Model','',TRUE);
        
       $result = $this->Characteristic_Model->find_by_id($p_Characteristic);
       
       $data['idcharacteristic']     = $result[0]->idcharacteristic;
       $data['code']                 = $result[0]->code;
       $data['description']          = $result[0]->description;
       $data['requiered']            = $result[0]->requiered;
       $data['property'] = $this->Properties_Model->find_by_id($result[0]->idproperties);
       $data['propertylist'] = $this->Properties_Model->get_Properties_Model_fields('idproperties,properties.code,properties.description');
       
       $this->load->helper(array('form', 'url', 'dropdown', 'date'));
       $this->load->library('form_validation');
        
        $this->load->view('general/header');
        $this->load->view('characteristic/form', $data);
        $this->load->view('general/footer');
    }
     public function update() {
         
         $data['action'] = 'update';
        $this->load->helper(array('form', 'url', 'dropdown', 'date'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('code', 'Characteristic code', 'required|max_length[4]');
        $this->form_validation->set_rules('description', 'Characteristic description', 'required');
        $this->form_validation->set_rules('requiered', 'requiered', 'required');
        $this->form_validation->set_rules('property', 'Property', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('characteristic/form', $data);
            $this->load->view('general/footer');
        } else {

            $this->load->model('Characteristic_Model', '', TRUE);
            $this->Characteristic_Model->update_Characteristic_Model();
            redirect('configuration/Characteristic', 'refresh');
        }
    }
     public function ajax_call_dropdown() {}
}
