<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IData extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Resepsionis");
		$this->load->model("StatusKehadiran");
		$this->load->helper("url_helper");
	}
	
	public function isResepsionis(){
		
		header('Content-Type: application/json');
		$jsonPost = json_decode(file_get_contents("php://input"));
		if($jsonPost === null){
			return;
		}
		$username = $jsonPost->{"username"};
		$password = md5($jsonPost->{"password"});
		$resepsionis = new Resepsionis($username,$password);
		$resepsionis->getLogin();
	}
	
	public function setStatusKehadiran(){
		$jsonPost = json_decode(file_get_contents("php://input"));
		if($jsonPost === null){
			return;
		}
		foreach($jsonPost as $row){
			$this->StatusKehadiran->setData($row);
		}
		echo "Set Berhasil";
	}
	
	public function getStatusKehadiran(){
		$statusKehadiran = new StatusKehadiran;
		$statusKehadiran->getAllData();
	}
}
