<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->has_access($this->get_roleid_by_url())){
            redirect('error/unauthorize');
        }
        $this->data['page_title'] = 'Dashboard';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Display important parameters';
        $this->data['subview'] = 'dashboard/index';
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Dashboard', get_action_url('dashboard'), TRUE);
        
        $this->load->view('_layout_main', $this->data);
    }
}

/*
 * Filename: Dashboard.php
 * Location: application/controllers/Dashboard.php
 */