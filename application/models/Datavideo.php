<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');
class Datavideo extends CI_Model {
    private $video;
    public function __CONSTRUCTOR(){
        parent::__CONSTRUCTOR();
        
    }
    public function setVideo($video){
        $this->video = $video;
    }
    public function getVideo(){
        return $this->video;
    }
}