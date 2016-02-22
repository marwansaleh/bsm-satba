<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['module_active'] = 'error';
    }
    
    public function page_missing()
    {
        $this->data['page_title'] = '<i class="fa  fa-exclamation-circle"></i> Page Not Found';
        $this->data['page_subtitle'] = 'Halaman tidak ditemukan';
        
        //get mainmenu root only
        $this->data['menus'] = $this->get_user_menu();
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Error', NULL, TRUE);
        
        $this->data['subview'] = 'error/page_missing';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function unauthorize(){
        $this->data['page_title'] = '<i class="fa  fa-exclamation-circle"></i> Not Authorized Access';
        $this->data['page_subtitle'] = 'Tidak ada akses';
        
        //get mainmenu root only
        $this->data['menus'] = $this->get_user_menu();
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Error', NULL, TRUE);
        
        $this->data['subview'] = 'error/unauthorize';
        $this->load->view('_layout_main', $this->data);
    }
}

/*
 * Filename: Error.php
 * Location: application/controllers/Error.php
 */
