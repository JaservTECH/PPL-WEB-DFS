<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this site');
class Logincontroladmin extends CI_Controller{
    public function validasiAdmin(){
        $this->load->library('session');
        if($this->session->has_userdata('login-admin'))
            exit("1Valid");
        $username;
        $password;
        //exit("0".$this->input->post('username')." ".$this->input->post('password'));
        if($this->input->post('username') == null)
            exit('0username cannot be blank');
        if($this->input->post('password') == null)
            exit('0password cannot be blank');
        $username = htmlentities(htmlspecialchars($this->input->post('username')));
        $password = htmlentities(htmlspecialchars($this->input->post('password')));
        $this->load->model('admin');
        if($username != $this->admin->getUsername())
            exit('0Username cannot be found');
        if($password != $this->admin->getPassword())
            exit('0Password did not match'.$this->admin->getPassword());
        $this->session->set_userdata('login-admin',true);
        exit('1Valid');
    }
    public function logout(){
        $this->load->library('session');
        if(!$this->session->has_userdata('login-admin'))
            exit("0Failed");
        $this->session->unset_userdata('login-admin');
        exit("1succes");
    }
}