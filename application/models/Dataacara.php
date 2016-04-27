<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');
class Dataacara extends CI_Model {
    private $id;
    private $tanggal;
    private $jam;
    private $nama_acara;
    private $penyelenggara;
    
    public function __CONSTRUCTOR(){
        parent::__CONSTRUCTOR();
        
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setJam($jam){
        $this->id = $jam;
    }
    public function setTanggal($tanggal){
        $this->tanggal = $tanggal;
    }
    public function setNamaAcara($nama_acara){
        $this->nama_acara = $nama_acara;
    }
    public function setPenyelenggara($penyelenggara){
        $this->penyelenggara = $penyelenggara;
    }
    public function getId($id){
        $this->id = $id;
    }
    public function getJam($jam){
        $this->id = $jam;
    }
    public function getTanggal($tanggal){
        $this->tanggal = $tanggal;
    }
    public function getNamaAcara($nama_acara){
        $this->nama_acara = $nama_acara;
    }
    public function getPenyelenggara($penyelenggara){
        $this->penyelenggara = $penyelenggara;
    }
    public function hapusDataAcara(){
        $this->setId(null);
        $this->setJam(null);
        $this->setTanggal(null);
        $this->setNamaAcara(null);
        $this->setPenyelenggara(null);
    }
}