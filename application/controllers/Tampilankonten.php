<?php
if(!defined('BASEPATH'))
    exit('You dont have permission on this url');
  class Tampilankonten {
      public function tampil(){
        if(!function_exists('base_url')){
            function base_url(){
                return "http://localhost/DS-FSM/";
            }; 
        }
        require_once BASEPATH."libraries/Session/Session.php";
        $session = new CI_Session();
        if($session->has_userdata('login-admin'))
            exit("0");
        echo "1";
        require_once APPPATH.'/views/Template_login.php';
      }
  }