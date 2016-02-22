<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['page_title'] = 'Wilayah';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Daftar wilayah';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Wilayah', get_action_url('master/wilayah'), TRUE);
        
        $this->data['subview'] = 'master/wilayah/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit($id=NULL)
    {
        $this->data['page_subtitle'] = $id ? 'Edit wilayah':'Create wilayah';
        
        //load model 
        $this->load->model(array('mtr_wilayah_m'));
        
        $item = $id ? $this->mtr_wilayah_m->get($id) : $this->mtr_wilayah_m->get_new();
        $this->data['item'] = $item;
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Wilayah', get_action_url('master/wilayah'), TRUE);
        breadcumb_add($this->data['breadcumb'], 'Edit', NULL, TRUE);
        
        $this->data['submit_url'] = get_action_url('master/wilayah/edit_save/'.$id);
        $this->data['back_url'] = get_action_url('master/wilayah');
        
        $this->data['subview'] = 'master/wilayah/edit';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit_save($id=NULL){
        if (!isset($this->mtr_wilayah_m)){
            $this->load->model(array('mtr_wilayah_m'));
        }
        $rules = $id ? $this->mtr_wilayah_m->rules['edit'] : $this->mtr_wilayah_m->rules['create'];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() !== FALSE){
            //save data
            $data = $this->mtr_wilayah_m->array_from_post(array('wilayah'));
            if (!$id){
                $data['created_by'] = $this->userlib->get_userid();
            }else{
                $data['modified_by'] = $this->userlib->get_userid();
            }
            
            if ($this->mtr_wilayah_m->save($data, $id)){
                $this->session->set_flashdata('message', 'Wilayah '.($id?'dengan id:'.$id:'baru').' berhasil disimpan di database');
                $this->session->set_flashdata('message_type', 'success');
                
                //create log
                $this->log_create(CT_MODULE_MASTER, ($id?'Merubah':'Menambah').' record master wilayah dengan nama:'.$data['wilayah'], $id?CT_LOG_EDIT:CT_LOG_CREATE);
                
                redirect(get_action_url('master/wilayah/edit/'.$id));
            }else{
                $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: '.$this->mtr_wilayah_m->get_last_message());
                $this->session->set_flashdata('message_type', 'error');
                
                redirect(get_action_url('master/wilayah/edit/'.$id));
            }
        }else{
            $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: <br>'.  validation_errors());
            $this->session->set_flashdata('message_type', 'error');
            
            redirect(get_action_url('master/wilayah/edit/'.$id));
        }
    }
}

/*
 * Filename: Sumberbisnis.php
 * Location: application/controllers/master/sumberbisnis.php
 */