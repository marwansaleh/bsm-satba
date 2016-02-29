<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['page_title'] = 'Tertanggung';
    }
    
    public function by_province_json($propinsi){
        if (!isset($this->mtr_kabupaten_m)){
            $this->load->model('mtr_kabupaten_m');
        }
        
        $result = $this->mtr_kabupaten_m->get_select_where('id,nama as text',array('propinsi'=>$propinsi));
        $kabupaten = array();
        foreach ($result as $item){
            
            $kabupaten [] = $item;
        }
        
        echo json_encode($kabupaten);
    }
}

/*
 * Filename: Tertanggung.php
 * Location: application/controllers/master/tertanggung.php
 */
