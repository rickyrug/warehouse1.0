<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author 60044723
 */
class Login extends CI_Controller {

    public function index() {
        $this->load->model('Warehouse_model', '', TRUE);
        $data['warehouselist'] = $this->Warehouse_model->get_warehouses_fields('idwarehouse,warehousenumber');
        $this->load->helper(array('form', 'url', 'dropdown'));
        $this->load->library('form_validation');


        $this->form_validation->set_rules('username', 'User', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('warehousenumber', 'Warehouse ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login/form', $data);
          
        } else {
            if ($this->check_credentials()) {
                
                $data_user = array(
                    'warehousenumber' => $this->Warehouse_model->find_by_id($_POST['warehousenumber']), 
                    'username'        => $_POST['username'], 
                    'logged_in'       => TRUE,
               );

                $this->session->set_userdata($data_user);
                redirect('MainController');
            } else {

                $this->load->view('login/form', $data);

            }
        }
    }

    public function logoff(){
        $this->session->sess_destroy();
        redirect('MainController', 'refresh');
    }
    
    private function check_credentials() {

        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->load->model('Login_Model', '', TRUE);
            $result = $this->Login_Model->check_login($username, $password);
            if (count($result) == 1) {

                return true;
            } else {

                return false;
            }
        }
    }

}
