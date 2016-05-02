<?php
if(!defined('BASEPATH'))
exit('You dont have permission on tis url');
class Formdataacara {
    public function tampilDataAcara(){
        $edit = false;
        require_once APPPATH."controllers/Dataacaracontrol.php";
        $dataacaracontrol = new Dataacaracontrol();
        require_once BASEPATH."libraries/Session/Session.php";
        $session = new CI_Session();
        $login = false;
        if($session->has_userdata('login-admin')){
            $login = true;
            echo "1";
        }else echo "0";
        $temp = $dataacaracontrol->getDataAcara(date("Y-m-d"));
        
        require_once APPPATH."views/Template_acara.php";
    }
    public function tampilPreviewDataAcara(){
        if(!isset($_SESSION['login-admin']))
            return $this->tampilDataAcara();
        $edit = true;
        require_once APPPATH."views/Template_acara.php";
    }
    public function submit(){
        
    } 
    
}