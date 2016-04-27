<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');
class Ds_admin extends CI_Model {
    private $TABLE_NAME;
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->TABLE_NAME = 'ds_admin';
        $this->load->database();
    }
    public function getAccount($username,$password){
        return $this->db->query("SELECT * FROM ".$this->TABLE_NAME." WHERE a_username='".$username."' AND a_password='".$password."'")->row_array();
    }
}