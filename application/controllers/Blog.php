<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Blog
 *
 * @author 60044723
 */
class Blog extends CI_Controller{
    
    public function index(){
        $data['title'] = 'My blogs';
        $data['heading'] = 'Welcome';
        $this->load->view('blogview',$data);
    }
   
    public function comments(){
        
        echo 'popo';
    }
    
    public function add_comment($user,$comment){
        
        echo $user;
        echo $comment;
        
    }
    
    public function test(){
       $this->load->helper(array('form', 'url'));
       $this->load->view('general/header');
        $this->load->view('general/view');
        $this->load->view('general/footer');
  
    }
    
    public function display_warehouse(){
        
        
        $this->load->model('Warehouse_model','',TRUE);
         
        $data['title'] = 'My blogs';
        $data['heading'] = 'Welcome';
        $data['results']= $this->Warehouse_model->get_last_warehouses();
        $this->load->view('blogview',$data);
    }
}
