<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');
class Informasiakademik extends CI_Model {
    private $id;
    private $judul;
    private $isi;
    private $tanggal;
    private $gambar;
    
    public function __CONSTRUCTOR(){
        parent::__CONSTRUCTOR();
        
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setJudul($judul){
        $this->judul = $judul;
    }
    public function setIsi($isi){
        $this->isi = $isi;
    }
    public function setGambar($gambar){
        $this->gambar = $gambar;
    }
    public function setTanggal($tanggal){
        $this->tanggal = $tanggal;
    }
    public function getId($id){
        return $this->id;
    }
    public function getJudul($judul){
        return $this->judul;
    }
    public function getIsi($isi){
        return $this->isi;
    }
    public function getGambar($gambar){
        return $this->gambar;
    }
    public function getanggal($tanggal){
        return $this->tanggal;
    }
    public function hapusInformasiAkademik(){
        $this->setId(null);
        $this->setJudul(null);
        $this->setTanggal(null);
        $this->setIsi(null);
        $this->setGambar(null);
    }
}