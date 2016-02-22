<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends Admin_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->has_access($this->get_roleid_by_url())){
            redirect('error/unauthorize');
        }
        $this->data['page_title'] = 'Manajemen Grup User';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Daftar group user';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Manajemen Grup', get_action_url('usermgt/group'), TRUE);
        
        $this->data['subview'] = 'usermgt/group/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit($id=NULL)
    {
        $this->data['page_subtitle'] = $id ? 'Edit group':'Create group';
        
        //load model user if not loaded
        if (!isset($this->auth_group_m)){
            $this->load->model(array('auth_group_m'));
        }
        $item = $id ? $this->auth_group_m->get($id) : $this->auth_group_m->get_new();
        $this->data['item'] = $item;
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Manajemen Grup', get_action_url('usermgt/group'), TRUE);
        breadcumb_add($this->data['breadcumb'], 'Edit', NULL, TRUE);
        
        $this->data['submit_url'] = get_action_url('usermgt/group/edit_save/'.$id);
        $this->data['back_url'] = get_action_url('usermgt/group');
        
        $this->data['subview'] = 'usermgt/group/edit';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit_save($id=NULL){
        if (!isset($this->auth_group_m)){
            $this->load->model(array('auth_group_m'));
        }
        $rules = $id ? $this->auth_group_m->rules['edit'] : $this->auth_group_m->rules['create'];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() !== FALSE){
            //save data
            $data = $this->auth_group_m->array_from_post(array('name','removable'));
            if (!$id){
                $data['created_by'] = $this->userlib->get_userid();
            }else{
                $data['modified_by'] = $this->userlib->get_userid();
            }
            if (!$data['removable']){
                $data['removable'] = 0;
            }
            
            if ($this->auth_group_m->save($data, $id)){
                $this->session->set_flashdata('message', 'Grup '.($id?'dengan id:'.$id:'baru').' berhasil disimpan di database');
                $this->session->set_flashdata('message_type', 'success');
                
                //create log
                $this->log_create(CT_MODULE_USERMGT, ($id?'Merubah':'Menambah').' record grup user dengan nama:'.$data['name'], $id?CT_LOG_EDIT:CT_LOG_CREATE);
                
                redirect(get_action_url('usermgt/group/edit/'.$id));
            }else{
                $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: '.$this->auth_group_m->get_last_message());
                $this->session->set_flashdata('message_type', 'error');
                
                redirect(get_action_url('usermgt/group/edit/'.$id));
            }
        }else{
            $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: <br>'.  validation_errors());
            $this->session->set_flashdata('message_type', 'error');
            
            redirect(get_action_url('usermgt/group/edit/'.$id));
        }
    }
    
    public function privilege($group_id){
        $this->load->model(array('auth_group_m','auth_role_m','auth_group_privilege_m'));
        
        $this->data['group'] = $this->auth_group_m->get($group_id);
        
        //background
        $this->data['bg'] = array('default','success','info','warning','danger','error');
        
        //get all roles
        $roles = $this->mainmenu_m->group_by_module();
        $this->data['roles'] = $roles;
//        $group_set = array();
//        //if not admin, get its privileges
//        if (!$this->userlib->is_admin($group_id)){
//            $group_priv_db = $this->auth_group_privilege_m->get_by(array('group_id'=>$group_id));
//            foreach ($group_priv_db as $gpd){
//                $group_set[$gpd->role_id] = $gpd->granted==1 ? TRUE:FALSE;
//            }
//        }
//        
//        $privileges = array();
//        foreach ($roles as $role){
//            if (!$this->userlib->is_admin($group_id)){
//                $role->granted = isset($group_set[$role->id]) ? $group_set[$role->id] : FALSE;
//            }else{
//                $role->granted = TRUE;
//            }
//            $privileges [] = $role;
//        }
        $privileges = $this->userlib->get_group_privileges($group_id);
        $this->data['privileges'] = $privileges;
        
        $this->load->view('usermgt/group/privilege', $this->data);
    }
    
    public function set_privilege(){
        $this->load->model('auth_group_privilege_m');
        $user_id = $this->userlib->get_userid();
        $group_id = $this->input->get('group_id', TRUE);
        $role_id = $this->input->get('role_id', TRUE);
        $granted = $this->input->get('granted', TRUE);
        
        $is_group_admin = $this->userlib->is_admin($group_id);
        
        if (!$is_group_admin){
            foreach (explode(',', $role_id) as $roleid){
                $privilege = $this->auth_group_privilege_m->get_by(array('group_id'=>$group_id, 'role_id'=>$roleid), TRUE);
                if ($privilege){
                    $this->auth_group_privilege_m->save(array('granted'=>$granted,'modified_by'=> $user_id),$privilege->id);
                }else{
                    $this->auth_group_privilege_m->save(array('group_id'=>$group_id,'role_id'=>$roleid,'granted'=>$granted,'created_by'=> $user_id));
                }
            }
            
            $granted = (bool)$granted;
            
            //create log
            $this->log_create(CT_MODULE_SYSTEM, 'Merubah record akses grup id:'.$group_id.' dan role id:'.$role_id.' menjadi '. ($granted?'memiliki akses':'tidak mempunyai akses'), CT_LOG_EDIT);
        }else{
            $granted = TRUE;
        }
        
        echo json_encode(array('granted'=>$granted, 'is_admin'=>$is_group_admin));
    }
}

/*
 * Filename: Group.php
 * Location: application/controllers/usermgt/Group.php
 */