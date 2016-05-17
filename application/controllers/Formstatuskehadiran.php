<?php
if(!defined('BASEPATH'))
    exit();


function base_url(){
    return "http://localhost/DS-FSMRebuild/";
}
class Tempsme extends CI_Controller{
    function __CONSTRUCT(){
        parent::__CONSTRUCT();
       // $this->load->model('statuskehadiran');
    }
    function getModel($key){
        $this->load->model($key);
        return $this->$key;
    }
}
class Formstatuskehadiran {
    public function __CONSTRUCT(){
        
    }
    public function tampilStatusKehadiran(){
        //require_once BASEPATH.'core/Model.php';
        //require_once APPPATH.'models/Statuskehadiran.php';
        //$statuskehadiran = new Statuskehadiran();
        
        $temp = new Tempsme();
        $statuskehadiran = $temp->getModel('Statuskehadiran');
        $statuskehadiran->getData();
        //require_once BASEPATH.'helpers/url_helper.php';
        require_once APPPATH."views/Template_dekan.php";
        
    }
    public function updateStatusKehadiran(){
        
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

