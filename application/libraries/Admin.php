<?php
if(!defined('BASEPATH'))
exit('You dont have permision on this url');
require_once "Libraystandardhelper.php";
class Admin extends Libraystandardhelper {
    function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->setLibrary('session');
    }
    public function isAdminLogin(){
        if(!$this->session->has_userdata('status'))
            return false;
        if(!$this->session->has_userdata('username'))
            return false;
        if(!$this->session->has_userdata('encode'))
            return false;
        if($this->session->userdata('encode') != $this->session->userdata('username')."isA".$this->session->userdata('status'))
            return false;
        return true;
    }
}