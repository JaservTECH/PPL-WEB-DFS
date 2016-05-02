<?php
if(!defined('BASEPATH'))
exit('You dont have permission to this url');
class Admin extends CI_Model {
    private $username;
    private $password;
    private $name;
    function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->database();
        $temp = $this->db->query("SELECT * FROM admin")->result_object();
        $this->username = $temp[0]->username;
        $this->password = $temp[0]->password;
        $this->name = $temp[0]->nama;
    }
    public function getUsername(){
        $temp = $this->username;
        return $temp;
    }
    public function getPassword(){
        $temp = $this->password;
        return $temp;
    }
    public function getName(){
        $temp = $this->name;
        return $temp;
    }
}