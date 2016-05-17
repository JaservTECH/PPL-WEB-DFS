<?php
if(!defined('BASEPATH'))
exit('You dont have permission on tis url');
class Formdataacara {
    public function __CONSTRUCT(){
        require_once BASEPATH."libraries/Session/Session.php";
        $this->session = new CI_Session();
        require_once APPPATH."controllers/Dataacaracontrol.php";
        $this->dataacaracontrol = new Dataacaracontrol();
        require_once BASEPATH."core/Input.php";
        $this->input = new CI_Input();
        
    }
    public function tampilDataAcara(){
        $edit = false;
        
        $login = false;
        if($this->session->has_userdata('login-admin')){
            $login = true;
            echo "1";
        }else echo "0";
        $temp = $this->dataacaracontrol->getDataAcara(date("Y-m-d"));
        $this->session = null;
        require_once APPPATH."views/Template_acara.php";
    }
    public function tampilPreviewDataAcara(){
        
        if($this->input->post('CODE') != null){
            if($this->input->post('CODE') != 'JASERVTECH')
                exit("0anda melakukan debuging");
        }else{
            exit('0anda melakukan debugging');            
        }
        if(!$this->session->has_userdata('login-admin'))
            return $this->tampilDataAcara();
        $this->session = null;
        $temp = $this->dataacaracontrol->getDataAcara();
        $com = "";
        if(count($temp) > 0){
            foreach ($temp as $key => $value) {
                # code...
                $com .= "<tr><td>";
                $com .= $value['tanggal']."</td><td>";
                $com .= $value['jam']."</td><td>";
                $com .= $value['nama_acara']."</td><td>";
                $com .= $value['penyelenggara']."</td><td>";
                $com .=  
                "<span class='icon-pencil pointer' onclick='editEvent(".$value['id'].",this)' style='margin-right : 10px;'></span>
                 <span class='icon-trash pointer' onclick='dropEvent(".$value['id'].")' style='margin-left : 10px;'></span>
                 ";
                $com .= "</td></tr>";
            }
            
        }else{
            $com .= "<tr><td>";
            $com .= "-</td><td>";
            $com .= "-</td><td>";
            $com .= "-</td><td>";
            $com .= "-</td><td>";
            $com .=  
            "<span class='icon-pencil' style='margin-right : 10px;'></span>
             <span class='icon-trash' style='margin-left : 10px;'></span>
             ";
            $com .= "</td></tr>";
        }
        echo "1".$com;
        $this->input;
    }
    public function submit(){
        
    } 
    
}