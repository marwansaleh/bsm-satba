<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['page_title'] = 'Manajemen User';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Daftar user';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Manajemen User', get_action_url('usermgt/user'), TRUE);
        
        $this->data['subview'] = 'usermgt/user/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit($id=NULL)
    {
        $this->data['page_subtitle'] = $id ? 'Edit user':'Create user';
        
        //load model user if not loaded
        if (!(isset($this->auth_user_m)) || !isset($this->auth_group_m)){
            $this->load->model(array('auth_user_m', 'auth_group_m'));
        }
        $item = $id ? $this->auth_user_m->get($id) : $this->auth_user_m->get_new();
        $this->data['item'] = $item;
        
        //suporting data
        $this->data['user_groups'] = $this->auth_group_m->get();
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Manajemen User', get_action_url('usermgt/user'));
        breadcumb_add($this->data['breadcumb'], 'Edit', NULL, TRUE);
        
        $this->data['submit_url'] = get_action_url('usermgt/user/edit_save/'.$id);
        $this->data['back_url'] = get_action_url('usermgt/user/');
        
        $this->data['subview'] = 'usermgt/user/edit';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit_save($id=NULL){
        if (!(isset($this->auth_user_m)) || !isset($this->auth_group_m)){
            $this->load->model(array('auth_user_m', 'auth_group_m'));
        }
        $rules = $id ? $this->auth_user_m->rules['edit'] : $this->auth_user_m->rules['create'];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() !== FALSE){
            //save data
            $data = $this->auth_user_m->array_from_post(array('name','username','group_id','password'));
            if (!$id){
                $data['created_by'] = $this->userlib->get_userid();
            }else{
                $data['modified_by'] = $this->userlib->get_userid();
            }
            
            //change password
            if ($data['password']){
                $data['password'] = $this->userlib->hash($data['password']);
            }else{
                unset($data['password']);
            }
            
            if ($this->auth_user_m->save($data, $id)){
                $this->session->set_flashdata('message', 'User '.($id?'dengan id:'.$id:'baru').' berhasil disimpan di database');
                $this->session->set_flashdata('message_type', 'success');
                
                //create log
                $this->log_create(CT_MODULE_USERMGT, ($id?'Merubah':'Menambah').' record user dengan nama:'.$data['name'].' username:'.$data['username'], $id?CT_LOG_EDIT:CT_LOG_CREATE);
                
                redirect(get_action_url('usermgt/user/edit/'.$id));
            }else{
                $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: '.$this->auth_user_m->get_last_message());
                $this->session->set_flashdata('message_type', 'error');
                
                redirect(get_action_url('usermgt/user/edit/'.$id));
            }
        }else{
            $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: <br>'.  validation_errors());
            $this->session->set_flashdata('message_type', 'error');
            
            redirect(get_action_url('usermgt/user/edit/'.$id));
        }
    }
}

/*
 * Filename: User.php
 * Location: application/controllers/usermgt/User.php
 */