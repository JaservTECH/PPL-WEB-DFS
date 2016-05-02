<?php
if(!defined('BASEPATH'))
    exit('Yoou dont have permission to this url');
class Tampilancontrol extends CI_Controller {
    public function tampilanKonten(){
        $this->load->helper('url');
        $this->load->view('template_konten');
    }
}