<?php
	class Resepsionis extends CI_Model{
		
		private $username;
		private $password;
		private $name;
		
		public function __construct($username="Anonymouse",$password="Anonymouse"){
			$this->load->database();
			$this->username = $username;
			$this->password = $password;
		}
		
		public function getLogin(){
			$query = $this->db->query("SELECT username, password, nama FROM resepsionis WHERE username = '".$this->username."' AND password = '".$this->password."'");
			if($query->num_rows() === 1){
				$row = $query->row();
				$json['isResepsionis'] = true;
				$json['nama'] = $row->nama;
			}else{
				$json['isResepsionis'] = false;
			}
			echo json_encode($json);
		}
	}