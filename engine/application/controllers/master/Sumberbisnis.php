<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumberbisnis extends Admin_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->has_access($this->get_roleid_by_url())){
            redirect('error/unauthorize');
        }
        $this->data['page_title'] = 'Sumber Bisnis';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Daftar sumber bisnis';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Sumber Bisnis', get_action_url('master/sumberbisnis'), TRUE);
        
        $this->data['subview'] = 'master/sumberbisnis/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit($id=NULL)
    {
        $this->data['page_subtitle'] = $id ? 'Edit sumber bisnis':'Create sumber bisnis';
        
        //load model 
        $this->load->model(array('mtr_sumberbisnis_m','mtr_wilayah_m'));
        
        $item = $id ? $this->mtr_sumberbisnis_m->get($id) : $this->mtr_sumberbisnis_m->get_new();
        $this->data['item'] = $item;
        
        //support
        $this->data['wilayah_opts'] = $this->mtr_wilayah_m->get();
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Sumber Bisnis', get_action_url('master/sumberbisnis'), TRUE);
        breadcumb_add($this->data['breadcumb'], 'Edit', NULL, TRUE);
        
        $this->data['submit_url'] = get_action_url('master/sumberbisnis/edit_save/'.$id);
        $this->data['back_url'] = get_action_url('master/sumberbisnis');
        
        $this->data['subview'] = 'master/sumberbisnis/edit';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit_save($id=NULL){
        if (!isset($this->mtr_sumberbisnis_m)){
            $this->load->model(array('mtr_sumberbisnis_m'));
        }
        $rules = $id ? $this->mtr_sumberbisnis_m->rules['edit'] : $this->mtr_sumberbisnis_m->rules['create'];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() !== FALSE){
            //save data
            $data = $this->mtr_sumberbisnis_m->array_from_post(array('nama','is_captive','wilayah'));
            if (!$id){
                $data['created_by'] = $this->userlib->get_userid();
            }else{
                $data['modified_by'] = $this->userlib->get_userid();
            }
            
            if ($this->mtr_sumberbisnis_m->save($data, $id)){
                $this->session->set_flashdata('message', 'Sumber bisnis '.($id?'dengan id:'.$id:'baru').' berhasil disimpan di database');
                $this->session->set_flashdata('message_type', 'success');
                
                //create log
                $this->log_create(CT_MODULE_MASTER, ($id?'Merubah':'Menambah').' record sumber bisnis dengan nama:'.$data['nama'], $id?CT_LOG_EDIT:CT_LOG_CREATE);
                
                redirect(get_action_url('master/sumberbisnis/edit/'.$id));
            }else{
                $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: '.$this->mtr_sumberbisnis_m->get_last_message());
                $this->session->set_flashdata('message_type', 'error');
                
                redirect(get_action_url('master/sumberbisnis/edit/'.$id));
            }
        }else{
            $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: <br>'.  validation_errors());
            $this->session->set_flashdata('message_type', 'error');
            
            redirect(get_action_url('master/sumberbisnis/edit/'.$id));
        }
    }
}

/*
 * Filename: Sumberbisnis.php
 * Location: application/controllers/master/sumberbisnis.php
 */