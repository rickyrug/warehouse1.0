<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('logged_in')) {
    
    function logged_in($p_session){
       
        if(!isset($p_session->userdata['logged_in'])|| !$p_session->userdata['logged_in']){    
            redirect('Login','refresh');
        }
        
    }
    
}

if (!function_exists('get_username')) {
    
    function get_username($p_session){
       
        return $p_session->userdata['username'];
        
    }
    
}

if (!function_exists('get_warehousenumber')) {
    
    function get_warehousenumber($p_session){
       $v_warehouse =$p_session->userdata['warehousenumber'];
        
       return $v_warehouse[0]->warehousenumber;
        
    }
    
}