<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Login_Model
 *
 * @author 60044723
 */
class Login_Model extends CI_Model{
   
   public function check_login($p_user, $p_password){
       $this->db->select('username');
       $this->db->from('users');
       $this->db->where('username',$p_user);
       $this->db->where('password',$p_password);
       $query = $this->db->get();
       return $query->result();
   }
}
