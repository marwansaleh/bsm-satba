<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['page_title'] = 'Manajemen Menu';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Daftar menu';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Manajemen Menu', get_action_url('system/menu'), TRUE);
        
        $this->data['subview'] = 'system/menu/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit($id=NULL)
    {
        $this->data['page_subtitle'] = $id ? 'Edit menu':'Create menu';
        
        //load model user if not loaded
        $this->load->model(array('mainmenu_m','mtr_module_m'));
        $item = $id ? $this->mainmenu_m->get($id) : $this->mainmenu_m->get_new();
        $this->data['item'] = $item;
        
        //suported data
        //$this->data['menu_parents'] = $this->mainmenu_m->group_by_module();
        //get distinct module
        $this->data['modules'] = $this->mtr_module_m->get();
        //icon list
        $this->data['icons'] = array('fa-bar-chart-o','fa-bell-o','fa-bookmark-o','fa-bolt', 'fa-dashboard','fa-dollar',
            'fa-building','fa-users','fa-cog','fa-cogs','fa-cloud','fa-cloud-download','fa-comment','fa-comments','fa-comment-o',
                'fa-credit-card','fa-desktop',' fa-laptop','fa-download','fa-dot-circle-o','fa-envelope','fa-envelope-o','fa-exchange',
            'fa-fire','fa-flag','fa-fighter-jet','fa-eye','fa-eye-slash','fa-lock','fa-unlock','fa-briefcase');
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Manajemen Menu', get_action_url('system/menu'), TRUE);
        breadcumb_add($this->data['breadcumb'], 'Edit', NULL, TRUE);
        
        $this->data['submit_url'] = get_action_url('system/menu/edit_save/'.$id);
        $this->data['back_url'] = get_action_url('system/menu');
        
        $this->data['subview'] = 'system/menu/edit';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function select_parent_menu($module){
        if (!isset($this->mainmenu_m)){
            $this->load->model('mainmenu_m');
        }
        
        $menus = $this->mainmenu_m->get_select_where('id,caption',array('module'=>$module));
        
        echo json_encode(array(
            'module_name' => strtoupper(module_name($module)),
            'items' => $menus
        ));
    }
    
    public function edit_save($id=NULL){
        if (!isset($this->mainmenu_m)){
            $this->load->model(array('mainmenu_m'));
        }
        $rules = $id ? $this->mainmenu_m->rules['edit'] : $this->mainmenu_m->rules['create'];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() !== FALSE){
            //save data
            $data = $this->mainmenu_m->array_from_post(array('parent','caption','module','title','icon','link','sort','hidden'));
            if (!$id){
                $data['created_by'] = $this->userlib->get_userid();
            }else{
                $data['modified_by'] = $this->userlib->get_userid();
            }
            
            if ($data['link']){
                $data['link'] = rtrim($data['link'],'/');
            }
                
            
            if ($this->mainmenu_m->save($data, $id)){
                $this->session->set_flashdata('message', 'Menu '.($id?'dengan id:'.$id:'baru').' berhasil disimpan di database');
                $this->session->set_flashdata('message_type', 'success');
                
                //create log
                $this->log_create(CT_MODULE_SYSTEM, ($id?'Merubah':'Menambah').' record menu dengan caption:'.$data['caption'], $id?CT_LOG_EDIT:CT_LOG_CREATE);
                
                redirect(get_action_url('system/menu/edit/'.$id));
            }else{
                $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: '.$this->mainmenu_m->get_last_message());
                $this->session->set_flashdata('message_type', 'error');
                
                redirect(get_action_url('system/menu/edit/'.$id));
            }
        }else{
            $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: <br>'.  validation_errors());
            $this->session->set_flashdata('message_type', 'error');
            
            redirect(get_action_url('system/menu/edit/'.$id));
        }
    }
}

/*
 * Filename: Menu.php
 * Location: application/controllers/system/Menu.php
 */