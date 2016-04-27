<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');
class Logincontroladmin extends CI_Controller{
    function __construct(){
        parent::__construct();
		$this->load->library('session');
        $this->load->library('admin');
    }
    public function validasiAdmin(){
        //$username = $this->isNullPost('username',"Username harus diisi");
        //$password = $this->isNullPost('password',"Password wajib diisi");
        $username = 'ADMIN-DS-FSM';
        $password = 'adminDSfsm453';
        $this->load->model('ds_admin');
        $rest = $this->ds_admin->getAccount($username,$password);
        if(count($rest) <= 0){
            exit("0Account cannot be found");
        }
        if($username != $rest['a_username']){
            exit("0Username not match, case sensitive");
        }
        if($password != $rest['a_password']){
            exit("0Password not match, case sensitive");
        }
        $this->session->set_userdata('status',$rest['a_cat']);
        $this->session->set_userdata('username',$rest['a_username']);
        $this->session->set_userdata('encode',$rest['a_username']."isA".$rest['a_cat']);
        if(!$this->admin->isAdminLogin()){
            $this->session->unset_userdata('status');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('encode');
            exit('0Failed to authenticate');
        }
        exit("1Success login, please wait");
    }
    public function logout(){
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('encode');
    }
    /*
    */
    protected function isNullPost($a,$message){
        if($this->input->post($a) === null)
            exit("0".$message);
        return htmlspecialchars($this->input->post($a));
    }
}