<?php
if(!defined('BASEPATH'))
    exit();
class Datavideocontrol extends CI_Controller {
    function __construct() {
        parent::__construct();
    
        $this->load->library('session');
        $this->load->model('datavideo');
    }
    public function menggantiVideo(){
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        $namafoto = "";
        $namF = 'defaultvideo';
        $config['upload_path'] = 'video/';
        $config['allowed_types'] = 'mp4';
        $config['max_size']     = '1048576';
        $config['file_name'] = $namF;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file-video')){
            if($this->upload->display_errors('|','|') != "|You did not select a file to upload.|")
                exit("0hanya format mp4 dan max 1gb");
        }else
            $namafoto = $this->upload->data('file_name');
        if($namafoto == "")
            exit("0file kosong ");
        if($this->datavideo->setVideo($namafoto))
            echo "1Valid";
        else
            echo '0terjadi kesalahan';
    }
    public function getDataVideo(){
        return $this->datavideo->getVideo();
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

