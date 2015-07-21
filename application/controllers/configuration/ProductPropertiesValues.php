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
         echo $_POST['nombre'];
         $nombre = $_POST['nombre'];
         echo $nombre;
     }
     public function delete($p_ProductPropertiesValuess) {}
     public function edit($p_ProductPropertiesValues) {}
     public function update() {}
     public function ajax_call_dropdown() {}
}
