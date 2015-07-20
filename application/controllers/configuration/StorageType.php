<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StorageType
 *
 * @author 60044723
 */
class StorageType extends CI_Controller {

    public function index() {

        $this->load->model('StorageType_Model', '', TRUE);
        $results = $this->StorageType_Model->get_storagetype();
        $data['results'] = $results;

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $this->load->view('general/header');
        $this->load->view('storagetype/storagetypelist', $data);
        $this->load->view('general/footer');

        if (isset($_POST['action'])) {

            switch ($_POST['action']) {

                case'add':
                    redirect('configuration/storagetype/add', 'refresh');
                    break;
                case'edit';
                    if (isset($_POST['idstoragetype']) && count($_POST['idstoragetype']) == 1) {
                        $idstoragetype = $_POST['idstoragetype'];
                        redirect('configuration/storagetype/edit/' . $idstoragetype[0], 'refresh');
                    } else {
                        echo 'Solamente puede editar un Storagetype';
                    }
                    break;
                case'delete':
                    if (isset($_POST['idstoragetype'])) {
                        $this->delete($_POST['idstoragetype']);
                    }
                    break;
            }
        }
    }

    public function add() {

        $this->load->model('Warehouse_model', '', TRUE);
        $results = $this->Warehouse_model->get_warehouses_fields('idwarehouse,warehousenumber');

        $data['action'] = 'add';
        $data['warehouselist'] = $results;

        $this->load->helper(array('form', 'url', 'dropdown', 'date'));
        $this->load->library('form_validation');


        $this->form_validation->set_rules('code', 'Work Center code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('name', 'Work Center name', 'required');
        $this->form_validation->set_rules('warehousenumber', 'Warehouse number', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('storagetype/storagetypeform', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('StorageType_Model', '', TRUE);
            $this->StorageType_Model->insert_storagetype();

            redirect('configuration/StorageType', 'refresh');
        }
    }

    public function delete($p_storagetypes) {
        $this->load->model('StorageType_Model', '', TRUE);
        $this->StorageType_Model->delete_storagetype($p_storagetypes);
        redirect('configuration/StorageType', 'refresh');
    }

    public function edit($p_storagetype) {
        $data['action'] = 'edit';
        $this->load->model('StorageType_Model', '', TRUE);
        $this->load->model('Warehouse_model', '', TRUE);

        $results = $this->StorageType_Model->find_by_id($p_storagetype);

        $data['code'] = $results[0]->code;
        $data['name'] = $results[0]->name;
        $data['warehousenumber'] = $this->Warehouse_model->find_by_id($results[0]->warehousenumber);

        $data['idstoragetype'] = $results[0]->idstoragetype;
        $data['warehouselist'] = $this->Warehouse_model->get_warehouses_fields('idwarehouse,warehousenumber');


        $this->load->helper(array('form', 'url', 'dropdown', 'date'));
        $this->load->library('form_validation');
        
        $this->load->view('general/header');
        $this->load->view('storagetype/storagetypeform', $data);
        $this->load->view('general/footer');
    }

    public function update() {

        $data['action'] = 'update';
        $this->load->helper(array('form', 'url', 'dropdown', 'date'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('code', 'Work Center code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('name', 'Work Center name', 'required');
        $this->form_validation->set_rules('warehousenumber', 'Warehouse number', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('storagetype/storagetypeform', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('Storagetype_Model', '', TRUE);
            echo $this->Storagetype_Model->update_storagetype();

            redirect('configuration/StorageType', 'refresh');
        }
    }

    public function ajax_call_dropdown() {
        if ($_POST) {
            $warehousenumber = $_POST['warehousenumber'];
            $this->load->helper(array('dropdown', 'form'));
            $this->load->model('StorageType_Model', '', TRUE);
            $list = $this->StorageType_Model->get_storagetypes_fields('idstoragetype,code', $warehousenumber);
            echo storagetype_dropdown($list, 'idstoragetype');
        }
    }

}
