<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of ProductPropertiesValues
 *
 * @author 60044723
 */
class ProductPropertiesValues extends CI_Controller{
   
    public function index() {}
     public function add() {
        $this->load->model('Product_Properties_Model','',TRUE);
        $this->load->model('Product_Properties_Value_Model','',TRUE);
        
         $nombre           = $_POST['nombre'];
         $valor            = $_POST['valor'];
         $idproduct        = $_POST['idproduct'];
         $idcharacteristic = $_POST['idcharacteristic'];
         
       $results = $this->Product_Properties_Model->find_by_product_characteristic($idproduct,$idcharacteristic);
       $idproduct_properties = $results[0]->idproduct_properties; 
       
       $this->Product_Properties_Value_Model->insert_Product_Properties_Value_Model($nombre, $valor, 
                                                          $idcharacteristic,$idproduct_properties);
       
        echo json_encode(array('nombre'=>$nombre,'valor'=>$valor,
                         'idproduct'=>$idproduct,'idcharacteristic'=>$idcharacteristic));
     }
     public function delete($p_ProductPropertiesValuess) {}
     public function edit($p_ProductPropertiesValues) {}
     public function update() {}
     public function ajax_call_dropdown() {}
}
