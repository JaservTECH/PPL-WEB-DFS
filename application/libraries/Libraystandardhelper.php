<?php
defined('BASEPATH') OR exit('What Are You Looking For ?');
class Libraystandardhelper{
	protected $CI;
	public function setModel($a){
		$this->CI->load->model($a);
		$this->$a = $this->CI->$a;
	}
	public function setHelper($a){
		$this->CI->load->helper($a);
		
	}
	public function setLibrary($a){
		$this->CI->load->library($a);
		$this->$a = $this->CI->$a;
	}
	function __construct(){
		$this->CI = &get_instance();
	}
	/*lock public*/
}