<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');
class Dataacaracontrol extends CI_Controller{
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->library('session');
    }
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
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        
        $tanggal = $this->isNullPost('tanggal');
        $jam = $this->isNullPost('jam');
        $nama = $this->isNullPost('namaacara');
        $penyelenggara = $this->isNullPost('penyelenggara');
        //exit("0".$tanggal." ".$jam." ".$nama." ".$penyelenggara);
        /*
        $tanggal = "2016-05-03";
        $jam = "12:30:45";
        $nama = "Reyhan";
        $penyelenggara = "Reyha";
        */
        $this->load->helper('date');
        if(nice_date($tanggal,"Y-m-d") == 'Invalid Date')
            exit("0tanggal format year-month-day");
        if(nice_date($jam,"h:i:s") == 'Invalid Date')
            exit("0jam format hour:minute:second");
        $tanggal = nice_date($tanggal,"Y-m-d");
        $jam = nice_date($jam,"h:i:s");
        $nama = htmlspecialchars(htmlentities($nama));
        $penyelenggara = htmlspecialchars(htmlentities($penyelenggara));
        $this->load->model('dataacara');
        $this->dataacara->setTanggal($tanggal);
        $this->dataacara->setJam($jam);
        $this->dataacara->setNamaAcara($nama);
        $this->dataacara->setPenyelenggara($penyelenggara);
        $this->dataacara->setActiveFunction();
        if($this->dataacara->getProceedActive()){
            exit("1valid");
        }else {
            exit("0failed to input data");
        }
    }
    public function menghapusDataAcara(){
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        
    }
    public function mengubahDataAcara(){
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        
    }
    protected function isNullPost($a){
        if($this->input->post($a) == null){
            exit("0Check your input");
        }
        return htmlspecialchars(htmlentities($this->input->post($a)));
    }
}