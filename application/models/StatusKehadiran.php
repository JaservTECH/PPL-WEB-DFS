<?php
	class StatusKehadiran extends CI_Model{
		
		private $nip;
		private $status;
		
		public function __construct($nip=null, $nama=null){
			$this->load->database();
			$this->load->helper('array');
			$this->nip = $nip;
			$this->nama = $nama;
		}
		
		public function getAllData(){
			$data = array();
			$query = $this->db->get("statuskehadiran");
			foreach($query->result() as $row){
				$data = $query->result_array();
			}
			$statuskehadiran = array("statuskehadiran" => $data);
			echo json_encode($statuskehadiran);
		}
		
		public function setData($row){
			$nip = $row['nip'];
			$this->db->where('nip',$nip);
			$this->db->update('statuskehadiran',$row);
		}
	}