<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StorageSection
 *
 * @author 60044723
 */
class StorageSection extends CI_Controller{
    
     public function index() {

        $this->load->model('StorageSection_Model', '', TRUE);
        $results = $this->StorageSection_Model->get_storagesection();
        $data['results'] = $results;

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->view('general/header');
        $this->load->view('storagesection/storagesectionlist', $data);
        $this->load->view('general/footer');

        if (isset($_POST['action'])) {

            switch ($_POST['action']) {

                case'add':
                    redirect('configuration/storagesection/add', 'refresh');
                    break;
                case'edit';
                    if (isset($_POST['idstoragesection']) && count($_POST['idstoragesection']) == 1) {
                        $idstoragesection = $_POST['idstoragesection'];
                        redirect('configuration/storagesection/edit/' . $idstoragesection[0], 'refresh');
                    } else {
                        echo 'Solamente puede editar un Storage Section';
                    }
                    break;
                case'delete':
                    if (isset($_POST['idstoragesection'])) {
                        $this->delete($_POST['idstoragesection']);
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
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('storagesection/storagesectionform',$data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('StorageSection_Model','',TRUE);
           echo $this->StorageSection_Model->insert_storagesection();
            redirect('configuration/StorageSection', 'refresh');
           
        }
    }
    
     public function delete($p_storagesections) {
        
        $this->load->model('StorageSection_Model', '', TRUE);
        $this->StorageSection_Model->delete_storagesection($p_storagesections);
        redirect('configuration/StorageSection', 'refresh');
     }
     
     public function edit($p_storagetype) {
        $data['action'] = 'edit';
        
        $this->load->model('StorageSection_Model','',TRUE);
        $this->load->model('StorageType_Model', '', TRUE);
        $this->load->model('Warehouse_model', '', TRUE);
        
       $result = $this->StorageSection_Model->find_by_id($p_storagetype);
       
       $data['idstoragesection'] = $result[0]->idStoragesection;
       $data['code'] = $result[0]->code;
       $data['name'] = $result[0]->name;
       $data['warehousenumber']   = $this->Warehouse_model->find_by_id($result[0]->idwarehouse);
       $data['storagetypenumber'] = $this->StorageType_Model->find_by_id($result[0]->idstoragetype) ;
//       $data['idstoragetype']   = $result[0]->storagetypenumber;
       $data['warehouselist']     =  $this->Warehouse_model->get_warehouses_fields('idwarehouse,warehousenumber');
       $data['storagetypelist']   =  $this->StorageType_Model->get_storagetypes_fields('idstoragetype','code');
        $this->load->helper(array('form', 'url', 'dropdown', 'date'));
        $this->load->library('form_validation');
        
        $this->load->view('general/header');
        $this->load->view('storagesection/storagesectionform', $data);
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
     

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('storagesection/storagesectionform', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('StorageSection_Model','',TRUE);
            echo $this->StorageSection_Model->update_storagesection();

            redirect('configuration/storagesection', 'refresh');
        }
    }

    public function ajax_call_dropdown() {
        
        if ($_POST) {

            $storagetype     = $_POST['storagetypenumber'];

            $this->load->helper(array('dropdown', 'form'));
            $this->load->model('StorageSection_Model', '', TRUE);
            $list = $this->StorageSection_Model->get_storagesection_fields('idStoragesection,code',  $storagetype);
            echo storagesection_dropdown($list, 'idstoragesection');
        }
//        
    }
}
