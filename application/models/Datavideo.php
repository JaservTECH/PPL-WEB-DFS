<?php
if(!defined('BASEPATH'))
    exit();
class Datavideo extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->video = null;
    }
    private $video;
    public function setVideo($video=null){
        if($video == null)
            return false;
        if($video == "")
            return false;
        $temp = $this->db->query("SELECT * from datavideo")->result_object();
        $id = $temp[0]->video;
        $this->db->where('video',$id);
        $this->db->update("datavideo",array(
            "video" => $video
        ));
        $this->video = null;
        return true;
    }
    public function getVideo(){
        if($this->video == null)
        {
            $temp = $this->db->query("SELECT * from datavideo")->result_object();
            if(count($temp)>0)
            $this->video = $temp[0]->video;
            else $this->video = "";
        }
        $video = $this->video;    
        return $video;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

