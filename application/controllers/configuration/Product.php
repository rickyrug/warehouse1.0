<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author 60044723
 */
class Product extends CI_Controller {

    public function index() {
        
         $this->load->model('Product_Model', '', TRUE);
        $results = $this->Product_Model->get_Product();
        $data['results'] = $results;

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->view('general/header');
        $this->load->view('product/list', $data);
        $this->load->view('general/footer');

        if (isset($_POST['action'])) {

            switch ($_POST['action']) {

                case'add':
                    redirect('configuration/product/add', 'refresh');
                    break;
                case'edit';
                    if (isset($_POST['idproduct']) && count($_POST['idproduct']) == 1) {
                        $idproduct = $_POST['idproduct'];
                        redirect('configuration/product/edit/' . $idproduct[0], 'refresh');
                    } else {
                        echo 'Solamente puede editar un Producto';
                    }
                    break;
                case'delete':
                    if (isset($_POST['idproduct'])) {
                        $this->delete($_POST['idproduct']);
                    }
                    break;
            }
        }
        
    }

    public function add() {
        
         $this->load->model('Type_Model','',TRUE);
        
         $this->load->helper(array('form', 'url','dropdown'));
         $this->load->library('form_validation');
         
        $data['action']  = 'add';
        $data['typelist'] = $this->Type_Model->find_by_group('PRO','idtype,code,description');
        $data['progress'] = '20%';        
        $this->form_validation->set_rules('code', 'Product code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('name', 'Product name', 'required');
        $this->form_validation->set_rules('type', 'Tipo', 'required');
       
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('general/product/productprogressconfiguration',$data);
            $this->load->view('product/form',$data);
            $this->load->view('general/footer');
        } else {
           
            $this->load->model('Product_Model','',TRUE);      
            $this->load->model('Product_Properties_Model','',TRUE); 
            
            $this->Product_Model->insert_product();
            
            $var_product_code = $this->Product_Model->code;
            
            $properties_skeleton = $this->build_skeleton($var_product_code,$this->Product_Model->type);
            
            $data['skeleton'] = $properties_skeleton;
            
            $var_product = $this->Product_Model->find_by_code($var_product_code, 'idproduct');
            
//            $this->add_product_characteritics($var_product[0]->idproduct, $properties_skeleton);
            
            
            $this->load->view('general/header');
            $this->load->view('general/product/productprogressconfiguration',$data);
            $this->load->view('productproperties/form',$data);
            $this->load->view('general/footer');
//            var_dump($properties_skeleton);
//            redirect('configuration/Product', 'refresh');
           
        }
    }

    public function delete($p_Products) {
        
        $this->load->model('Product_Model','',TRUE);
        $this->Product_Model->delete_Product_Model($p_Products);
        redirect('configuration/Product', 'refresh');
    }

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
       
       $this->load->helper(array('form', 'url', 'dropdown', 'date'));
       $this->load->library('form_validation');
        
        $this->load->view('general/header');
        $this->load->view('product/form', $data);
        $this->load->view('general/footer');
    }

    public function update() {

        $data['action'] = 'update';
        $this->load->helper(array('form', 'url', 'dropdown', 'date'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('code', 'Product code', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('name', 'Product name', 'required');
        $this->form_validation->set_rules('type', 'Tipo', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('general/header');
            $this->load->view('product/form', $data);
            $this->load->view('general/footer');
        } else {
            $this->load->model('Product_Model', '', TRUE);
            $this->Product_Model->update_Product_Model();
            
            redirect('configuration/Product', 'refresh');
        }
    }

    public function ajax_call_dropdown() {
        
    }
    
     public function ajax_call_list($p_query) {
    
          $this->load->model('Product_Model','',TRUE);
          $product_list = Array();
          $var_iscode = true;
          
         if($p_query!=NULL && strlen($p_query) > 2){ 
          
           if (strlen($p_query) <= 4 && $var_iscode) {

            $resultado = $this->Product_Model->find_by_code($p_query, 'code,name');

            if (count($resultado) == 1) {
                $product_list = $this->convert_to_array($resultado);
            } else {
                $resultado = $this->Product_Model->find_like_code($p_query, 'code,name');
                
                if (count($resultado) == 0) {
                    $var_iscode = false;
                } else {
                    $product_list = $this->convert_to_array($resultado);
                }
            }
        } 
        
        if ( !$var_iscode) {

            $resultado = $this->Product_Model->find_by_name($p_query, 'code,name');
            $product_list = $this->convert_to_array($resultado);
        }


        echo json_encode($product_list);
         }
    }

    
    private function convert_to_array($p_arrayobject){
       
        $var_concat = "";
        $var_product_list = array();
        
        foreach ($p_arrayobject as $product){
              
              $var_concat = $product->code . ' - '.$product->name;
              array_push($var_product_list, $var_concat);
          
              
          }
        return $var_product_list;
    }
    
    private function build_skeleton($p_product_code,$p_product_type){

         $this->load->model('Properties_Model', '', TRUE);
         $this->load->model('Characteristic_Model', '', TRUE);
         
         $var_relatedproperties = $this->Properties_Model->find_by_type($p_product_type);
         $var_properties = Array();
         $var_characteristics = Array();
         
         foreach ($var_relatedproperties as $var_property){
             
             $var_properties[$var_property->code] = array();
             $var_characteristics =  $this->Characteristic_Model->find_by_property($var_property->idproperties);
             
           foreach ($var_characteristics as $characteristic){
                  
               array_push($var_properties[$var_property->code], $characteristic);
                
           }
         }
         return $var_properties;
    }
    
    private function add_product_characteritics($p_idproduct,$properties_skeleton){
        
        $var_idproduct = $p_idproduct;
            foreach ($properties_skeleton as $property) {

                foreach ($property as $characteristic) {

                    $this->Product_Properties_Model->insert_Product_Properties($var_idproduct, $characteristic->idcharacteristic);
                }
            }
        
    }
}
