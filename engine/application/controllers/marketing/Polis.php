<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polis extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['page_title'] = 'Polis General';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Daftar Polis';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Polis General', get_action_url('marketing/polis'), TRUE);
        
        $this->data['subview'] = 'marketing/polis_general/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit($id=NULL)
    {
        $this->data['page_subtitle'] = $id ? 'Edit polis':'Create Polis';
        
        //load model user if not loaded
        $this->load->model(array('mkt_polis_m','mtr_sumberbisnis_m','mtr_jenisasuransi_m','mkt_objek_pertanggungan_m','mtr_matauang_m'));
        
        if ($id){
            $item = $this->mkt_polis_m->get($id);
            $item->objek_pertanggungan = $this->mkt_objek_pertanggungan_m->get_by(array('polis'=>$item->id));
        }else{
            $item = $this->mkt_polis_m->get_new();
            $item->mata_uang = 'IDR';
            $item->biaya_lain = 0.00;
            $item->komisi_kembali = 0.00;
            $item->objek_pertanggungan = NULL;
        }
        $this->data['item'] = $item;
        
        //suported data
        $this->data['sumber_bisnis'] = $this->mtr_sumberbisnis_m->get();
        $this->data['jenis_asuransi'] = $this->mtr_jenisasuransi_m->get();
        $this->data['mata_uang'] = $this->mtr_matauang_m->get();
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Polis General', get_action_url('marketing/polis'), TRUE);
        breadcumb_add($this->data['breadcumb'], 'Edit', NULL, TRUE);
        
        $this->data['submit_url'] = get_action_url('marketing/polis/edit_save/'.$id);
        $this->data['back_url'] = get_action_url('marketing/polis');
        
        $this->data['subview'] = 'marketing/polis_general/edit';
        $this->load->view('_layout_main', $this->data);
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
