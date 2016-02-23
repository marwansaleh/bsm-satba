<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanual extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['page_title'] = 'Manual';
        
        $this->load->model(array('manual_user_m'));
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Penggunaan Aplikasi';
        
        $this->data['manuals'] = $this->_get_manual_list();
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Manual', get_action_url('manual/usermanual'), TRUE);
        
        $this->data['subview'] = 'manual/usermanual/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function detail($id=NULL)
    {
        $manual = $this->manual_user_m->get($id);
        $this->data['manual'] = $manual;
        
        $this->data['page_subtitle'] =  $manual->title;
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Manual', get_action_url('manual/usermanual'), TRUE);
        breadcumb_add($this->data['breadcumb'], $manual->caption, NULL, TRUE);
        
        $this->data['index_url'] = get_action_url('manual/usermanual');
        $this->data['next_url'] = get_action_url('manual/usermanual/detail/'.$id);
        $this->data['prev_url'] = get_action_url('manual/usermanual/detail/'.$id);
        
        $this->data['subview'] = 'manual/usermanual/detail';
        $this->load->view('_layout_main', $this->data);
    }
    
    private function _get_manual_list(){
        $all_manual = $this->manual_user_m->get();
        
        $manuals = array('parents' => array(), 'items'=>array());
        foreach ($all_manual as $manual){
            $manuals['parents'][$manual->parent][] = $manual->id;
            $manuals['items'][$manual->id] = $manual;
        }
        
        return $this->_hierarchy_manual($manuals, 0);
    }
    
    private function _hierarchy_manual($manuals, $parent=0){
        $menulist = array();
        if (isset($manuals['parents'][$parent])){
            
            //get menu item for each id where parent = $parent
            foreach ($manuals['parents'][$parent] as $menu_id){
                $menuitem = $manuals['items'][$menu_id];
                //does menu has submenu ?
                if (isset($manuals['parents'][$menuitem->id])){
                    $menuitem->children = $this->_hierarchy_menus($manuals, $menuitem->id);
                }else{
                    $menuitem->children = NULL;
                }
                
                
                $menulist[] = $menuitem;
            }
        }
        
        return $menulist;
    }
}

/*
 * Filename: Usermanual.php
 * Location: application/controllers/manual/Usermanual.php
 */
