<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['page_title'] = 'System Log';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Daftar log';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Sistem Log', get_action_url('system/log'), TRUE);
        
        $this->data['subview'] = 'system/log/index';
        $this->load->view('_layout_main', $this->data);
    }
}

/*
 * Filename: Menu.php
 * Location: application/controllers/system/Log.php
 */
