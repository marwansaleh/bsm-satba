<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['page_title'] = 'User Profile';
        
        if (!(isset($this->auth_user_m))){
            $this->load->model(array('auth_user_m'));
        }
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'My Profile';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'User profile', get_action_url('usermgt/profile'), TRUE);
        
        $item = $this->auth_user_m->get($this->userlib->get_userid());
        $this->data['item'] = $item;
        
        $this->data['submit_url'] = get_action_url('usermgt/profile/edit_save');
        
        $this->data['subview'] = 'usermgt/profile/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit_save(){
        $rules = $this->auth_user_m->rules['update_profile'];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() !== FALSE){
            //save data
            $data = $this->auth_user_m->array_from_post(array ('name','username','password'));
            $data['modified_by'] = $this->userlib->get_userid();
            
            if (!$data['password']){
                unset($data['password']);
            }else{
                $data['password'] = $this->userlib->hash($data['password']);
            }
            if ($this->auth_user_m->save($data, $id)){
                $this->session->set_flashdata('message', 'Perubahan profile berhasil disimpan di database');
                $this->session->set_flashdata('message_type', 'success');
                
                redirect(get_action_url('usermgt/profile/index'));
            }else{
                $this->session->set_flashdata('message', 'Gagal menyimpan perubahan dengan pesan: '.$this->auth_user_m->get_last_message());
                $this->session->set_flashdata('message_type', 'error');
                
                redirect(get_action_url('usermgt/profile/index'));
            }
        }else{
            $this->session->set_flashdata('message', 'Pastikan data yang anda masukkan sudah lengkap: <br>'.  validation_errors());
            $this->session->set_flashdata('message_type', 'error');
            
            redirect(get_action_url('usermgt/profile/index'));
        }
    }
}

/*
 * Filename: Profile.php
 * Location: application/controllers/usermgt/Profile.php
 */