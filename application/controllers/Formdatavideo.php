<?php
if(!defined('BASEPATH'))
    exit();


function base_url(){
    return "http://localhost/DS-FSMRebuild/";
}
class Formdatavideo {
    public function __CONSTRUCT(){
        require_once BASEPATH."libraries/Session/Session.php";
        $this->session = new CI_Session();
        
    }
    public function tampilVideo(){
        $edit = false;
        
        $login = false;
        if($this->session->has_userdata('login-admin')){
            $login = true;
            echo "1";
        }else echo "0";
        $temp = "";
        $this->session = null;
        require_once APPPATH.'controllers/Datavideocontrol.php';
        $this->datavideocontrol = new Datavideocontrol();
        $videoName = $this->datavideocontrol->getDataVideo();
        //require_once BASEPATH.'helpers/url_helper.php';
        require_once APPPATH."views/Template_video.php";
        
    }
    public function tampilPeviewVideo(){
        
    }
    public function submit(){
        
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

