<?php
if(!defined('BASEPATH'))
exit('You dont have permission on tis url');
class Forminformasiakademik {
    public function __CONSTRUCT(){
        require_once BASEPATH."libraries/Session/Session.php";
        $this->session = new CI_Session();
        require_once APPPATH."controllers/Informasiakademikcontrol.php";
        $this->informasiakademikcontrol = new Informasiakademikcontrol();
        require_once BASEPATH."core/Input.php";
        $this->input = new CI_Input();
        require_once BASEPATH.'helpers/url_helper.php';
        
    }
    public function tampilInformasiAkademik(){
        $edit = false;
        
        $login = false;
        if($this->session->has_userdata('login-admin')){
            $login = true;
            echo "1";
        }else echo "0";
        $temp = $this->informasiakademikcontrol->getInformasiAkademik();//date("Y-m-d")
        $this->session = null;
        require_once APPPATH."views/Template_event.php";
    }
    public function tampilPreviewInformasiAkademik(){
        
        if($this->input->post('CODE') != null){
            if($this->input->post('CODE') != 'JASERVTECH')
                exit("0anda melakukan debuging");
        }else{
            exit('0anda melakukan debugging');            
        }
         
        if(!$this->session->has_userdata('login-admin'))
            return $this->tampilDataAcara();
        $this->session = null;
        $temp = $this->informasiakademikcontrol->getInformasiAkademik();
        $com = "";
        if(count($temp)>0){
            foreach ($temp as $key => $value) {
                # code...
                $com .= "<tr><td>";
                if($value['nama_foto'] != '')
                    $com .= "<img  class='damn-you'  src='".  base_url()."resource/img/".$value['nama_foto']."'></td><td  class='font-automa' >";
                else
                    $com .= "</td><td class='font-automa' >";
                $com .= $value['tanggal']."</td><td class='font-automa' style='word-wrap : break-word;max-width : 100px;'>";
                $com .= $value['judul']."</td><td class='font-automa' style='word-wrap : break-word; max-width : 100px;'>";
                $com .= $value['isi']."</td><td class='font-automa' style='word-wrap : break-word; max-width : 100px;'>";
                $com .=  
                "<span class='icon-pencil pointer' onclick='editInfo(".$value['id'].",this)' style='margin-right : 10px;'></span>
                 <span class='icon-trash pointer' onclick='dropInfo(".$value['id'].")' style='margin-left : 10px;'></span>
                 ";
                $com .= "</td></tr>";
            }
        }else{
            # code...
            $com .= "<tr><td>";
            $com .= "Tidak ada</td><td>";
            $com .= "-</td><td>";
            $com .= "-</td><td>";
            $com .= "-</td><td>";
            $com .=  
            "<span class='icon-pencil' style='margin-right : 10px;'></span>
             <span class='icon-trash' style='margin-left : 10px;'></span>
             ";
            $com .= "</td></tr>";
        }
        echo "1"."<table>".$com."</table>";
        //$this->input;
    }
    public function submit(){
        
    } 
    
}