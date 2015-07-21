<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Properties
 *
 * @author 60044723
 */
class Properties extends CI_Controller{
   
    public function index() {
        
        $this->load->model('Properties_Model', '', TRUE);
        $results = $this->Properties_Model->get_Properties_Model();
        $data['results'] = $results;

        $this->load->helper(array('form', 'url','dropdown'));
        $this->load->library('form_validation');

        $this->load->view('general/header');
        $this->load->view('properties/list', $data);
        $this->load->view('general/footer');

        if (isset($_POST['action'])) {

            switch ($_POST['action']) {

                case'add':
                    redirect('configuration/properties/add', 'refresh');
                    break;
                case'edit';
                    if (isset($_POST['idproperties']) && count($_POST['idproperties']) == 1) {
                        $idproperties = $_POST['idproperties'];
                        redirect('configuration/properties/edit/' . $idproperties[0], 'refresh');
                    } else {
                        echo 'Solamente puede editar una Propiedad';
                    }
                    break;
                case'delete':
                    if (isset($_POST['idproperties'])) {
                        $this->delete($_POST['idproperties']);
                    }
                    break;
            }
        }
        
    }
     public function add() {

        $this->load->model('Type_Model', '', TRUE);

        $this->load->helper(array('form', 'url', 'dropdown'));
        $this->load->library('form_validation');

        $data['action'] = 'add';
        $data['typelist'] = $this->Type_Model->get_Type_Model_fields('idtype,code,description');

        $this->form_validation->set_rules('code', 'Property code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('description', 'Property description', 'required');
        $this->form_validation->set_rules('requiered', 'requiered', 'required');
        $this->form_validation->set_rules('type', 'Property Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('properties/form', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('Properties_Model', '', TRUE);
            $this->Properties_Model->insert_Properties_Model();
            redirect('configuration/Properties', 'refresh');
        }
    }

    public function delete($p_Propertiess) {
        
        $this->load->model('Properties_Model','',TRUE);
        $this->Properties_Model->delete_Properties_Model($p_Propertiess);
        redirect('configuration/properties', 'refresh');
        
    }
     
    public function edit($p_Properties) {

        $data['action'] = 'edit';

        $this->load->model('Properties_Model', '', TRUE);
        $this->load->model('Type_Model', '', TRUE);

        $result = $this->Properties_Model->find_by_id($p_Properties);

        $data['idproperties'] = $result[0]->idproperties;
        $data['code'] = $result[0]->code;
        $data['description'] = $result[0]->description;
        $data['requiered'] = $result[0]->requiered;
        $data['type'] = $this->Type_Model->find_by_id($result[0]->idtype);
        $data['typelist'] = $this->Type_Model->get_Type_Model_fields('idtype,code,description');

        $this->load->helper(array('form', 'url', 'dropdown', 'date'));
        $this->load->library('form_validation');

        $this->load->view('general/header');
        $this->load->view('properties/form', $data);
        $this->load->view('general/footer');
    }

    public function update() {
        
        $data['action'] = 'update';
        $this->load->helper(array('form', 'url','dropdown','date'));
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('code', 'Property code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('description', 'Property description', 'required');
        $this->form_validation->set_rules('requiered', 'requiered', 'required');
        $this->form_validation->set_rules('type', 'Property Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('properties/form', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('Properties_Model','',TRUE);
            $this->Properties_Model->update_Properties_Model();
            
            redirect('configuration/Properties', 'refresh');
        }
        
    }
     public function ajax_call_dropdown() {}
}
