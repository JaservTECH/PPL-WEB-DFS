<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');
class Ds_event extends CI_Model {
    private $TABLE_NAME;
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->TABLE_NAME = 'ds_event';
        $this->load->database();
    }
    public function getAllData($date=null){
        if($date == null)
            return $this->db->query("SELECT * FROM ".$this->TABLE_NAME)->result_array();
        return $this->db->query("SELECT * FROM ".$this->TABLE_NAME." WHERE e_date='".$date."' ")->result_array();
    }
}