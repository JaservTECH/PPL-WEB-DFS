<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');
class Dataacaracontrol extends CI_Controller{
    public function getDataAcara($id=null){
        $this->load->model('dataacara');
        $this->load->helper('date');
        $temp = null;
        if($id==null){
            $this->dataacara->setActiveFunction('read');
            $this->dataacara->getProceedActive();
            $i = 0;
            while($this->dataacara->getCursorNext()){
                $temp[$i]['id'] = $this->dataacara->getId();
                $temp[$i]['tanggal'] = $this->dataacara->getTanggal();
                $temp[$i]['jam'] = $this->dataacara->getJam();
                $temp[$i]['nama_acara'] = $this->dataacara->getNamaAcara();
                $temp[$i]['penyelenggara'] = $this->dataacara->getPenyelenggara();
                $i++;
            }
            return $temp;
        }else{
            if(nice_date($id) == "Invalid Date"){
                $this->dataacara->setId($id);
                $this->dataacara->setActiveFunction('read');
                $this->dataacara->getProceedActive();
                if($this->dataacara->getCursorNext())
                return array(
                "id" => $this->dataacara->getId(),
                "tanggal" => $this->dataacara->getTanggal(),
                "jam" => $this->dataacara->getJam(),
                "nama_acara" => $this->dataacara->getNamaAcara(),
                "penyelenggara" => $this->dataacara->getPenyelenggara(),
                );
                else{
                    return array(
                        "id" => "Tidak ada",
                        "tanggal" => "Tidak ada",
                        "jam" => "Tidak ada",
                        "nama_acara" => "Tidak ada",
                        "penyelenggara" => "Tidak ada"
                    );
                }   
            }else{
                $this->dataacara->setTanggal($id);
                $this->dataacara->setActiveFunction('read');
                $this->dataacara->getProceedActive();
                $i = 0;
                while($this->dataacara->getCursorNext()){
                    $temp[$i]['id'] = $this->dataacara->getId();
                    $temp[$i]['tanggal'] = $this->dataacara->getTanggal();
                    $temp[$i]['jam'] = $this->dataacara->getJam();
                    $temp[$i]['nama_acara'] = $this->dataacara->getNamaAcara();
                    $temp[$i]['penyelenggara'] = $this->dataacara->getPenyelenggara();
                    $i++;
                }
                return $temp;
            } 
        }
    }
    public function menambahDataAcara(){
        
    }
    public function menghapusDataAcara(){
        
    }
    public function mengubahDataAcara(){
        
    }
}