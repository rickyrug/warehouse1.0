<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StorageBin
 *
 * @author 60044723
 */
class StorageBin extends CI_Controller {

    public function index() {
        
         $this->load->model('StorageBin_Model', '', TRUE);
        $results = $this->StorageBin_Model->get_StorageBin();
        $data['results'] = $results;

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->view('general/header');
        $this->load->view('storagebin/list', $data);
        $this->load->view('general/footer');

        if (isset($_POST['action'])) {

            switch ($_POST['action']) {

                case'add':
                    redirect('configuration/storagebin/add', 'refresh');
                    break;
                case'edit';
                    if (isset($_POST['idstoragebin']) && count($_POST['idstoragebin']) == 1) {
                        $idstoragebin = $_POST['idstoragebin'];
                        redirect('configuration/storagebin/edit/' . $idstoragebin[0], 'refresh');
                    } else {
                        echo 'Solamente puede editar un Storage Bin';
                    }
                    break;
                case'delete':
                    if (isset($_POST['idstoragebin'])) {
                        $this->delete($_POST['idstoragebin']);
                    }
                    break;
            }
        }
        
    }

    public function add() {
         
         $this->load->model('Warehouse_model','',TRUE);
         $this->load->helper(array('form', 'url','dropdown'));
         $this->load->library('form_validation');
         $results = $this->Warehouse_model->get_warehouses_fields('idwarehouse,warehousenumber');
        
        $data['action']  = 'add';
        $data['warehouselist'] = $results;

        $this->form_validation->set_rules('code', 'Storage section code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('name', 'Storage section name', 'required');
        $this->form_validation->set_rules('warehousenumber', 'Warehouse number', 'required');
        $this->form_validation->set_rules('idstoragetype', 'Storage type number', 'required');
        $this->form_validation->set_rules('idstoragesection', 'Storage section number', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('storagebin/form',$data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('StorageBin_Model','',TRUE);          
            $this->StorageBin_Model->insert_storagebin();
            redirect('configuration/StorageBin', 'refresh');
           
        }
    }

    public function delete($p_StorageBins) {
        
        $this->load->model('StorageBin_Model', '', TRUE);
        $this->StorageBin_Model->delete_storagebin($p_StorageBins);
        redirect('configuration/StorageBin', 'refresh');
        
    }

    public function edit($p_StorageBin) {
        
        $data['action'] = 'edit';
        
        $this->load->model('StorageBin_Model','',TRUE);
        $this->load->model('StorageSection_Model','',TRUE);
        $this->load->model('StorageType_Model', '', TRUE);
        $this->load->model('Warehouse_model', '', TRUE);
        
       $result = $this->StorageBin_Model->find_by_id($p_StorageBin);
       
       $data['idstoragebin'] = $result[0]->idstoragebin;
       $data['code']                 = $result[0]->code;
       $data['name']                 = $result[0]->name;
       $data['warehousenumber']      = $this->Warehouse_model->find_by_id($result[0]->idwarehouse);
       $data['storagetypenumber']    = $this->StorageType_Model->find_by_id($result[0]->idstoragetype) ;
       $data['storagesectionnumber'] = $this->StorageSection_Model->find_by_id($result[0]->idstoragesection);

       $data['warehouselist']        = $this->Warehouse_model->get_warehouses_fields('idwarehouse,warehousenumber');
       $data['storagetypelist']      = $this->StorageType_Model->get_storagetypes_fields('idstoragetype','code');
       $data['storagesectionlist']   = $this->StorageSection_Model->get_storagesection_fields('idstoragesection','code'); 
       $this->load->helper(array('form', 'url', 'dropdown', 'date'));
        $this->load->library('form_validation');
        
        $this->load->view('general/header');
        $this->load->view('storagebin/form', $data);
        $this->load->view('general/footer');
        
    }

    public function update() {
        $data['action'] = 'update';
        $this->load->helper(array('form', 'url', 'dropdown', 'date'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('code', 'Storage section code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('name', 'Storage section name', 'required');
        $this->form_validation->set_rules('warehousenumber', 'Warehouse number', 'required');
        $this->form_validation->set_rules('idstoragetype', 'Storage type number', 'required');
        $this->form_validation->set_rules('idstoragesection', 'Storage section number', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('storagebin/form', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('StorageBin_Model','',TRUE);
            echo $this->StorageBin_Model->update_StorageBin();

            redirect('configuration/storagebin', 'refresh');
        }
    }

    public function ajax_call_dropdown() {
        
    }

}
