<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Placingslip extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['page_title'] = 'Placing Slip';
        //$this->data['module_active'] = 'marketing';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Produksi placing slip';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Placing Slip', get_action_url('marketing/placingslip'), TRUE);
        
        $this->data['subview'] = 'marketing/placingslip/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit($id=NULL)
    {
        $this->data['page_subtitle'] = $id ? 'Edit placing slip':'Create placing slip';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Placing Slip', get_action_url('marketing/placingslip'));
        breadcumb_add($this->data['breadcumb'], 'Edit', get_action_url('dashboard'), TRUE);
        
        $this->data['subview'] = 'marketing/placingslip/edit';
        $this->load->view('_layout_main', $this->data);
    }
}

/*
 * Filename: Placingslip.php
 * Location: application/controllers/marketing/Placingslip.php
 */