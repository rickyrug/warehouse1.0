<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of ProductProperties
 *
 * @author 60044723
 */
class ProductProperties extends CI_Controller{
   
    public function index() {}
     public function add() {
              
      
         
     }
     public function delete($p_ProductPropertiess) {}
     public function edit($p_Product) {
         
      $data['action'] = 'edit';
        
      $this->load->model('Product_Model','',TRUE);
      $this->load->model('Type_Model','',TRUE);
        
       $result = $this->Product_Model->find_by_id($p_Product);
       
       $data['idproduct']            = $result[0]->idProduct;
       $data['code']                 = $result[0]->code;
       $data['name']                 = $result[0]->name;
       $data['type'] = $this->Type_Model->find_by_id($result[0]->idtype);
       $data['typelist'] = $this->Type_Model->find_by_group('PRO','idtype,code,description');
       $data['progress'] = '60%'; 
       $this->load->helper(array('form', 'url', 'dropdown', 'date'));
       $this->load->library('form_validation');
        
       
       
       
       
        $this->load->view('general/header');
        $this->load->view('general/product/productprogressconfiguration',$data);
        $this->load->view('productproperties/form', $data);
        $this->load->view('general/footer');
         
     }
     public function update() {}
     public function ajax_call_dropdown() {}
     
     private function properties_builder(){
         
     }
}
