<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class MY_Controller inherit from CI_Controller 
 * which will be the base controller for all controllers used
 * in this application
 *
 * @author marwansaleh 5:42:25 PM
 */
class MY_Controller extends CI_Controller {
    public $data = array();
    protected $userlib = NULL;
    
    function __construct() {
        parent::__construct();
        if (!isset($this->session)){
            $this->load->library('session');
        }
        
        $this->load->model(array('sys_log_m'));
        
        $this->userlib = Userlib::getInstance();
    }
    
    protected function log_create($module,$event_name,$event_type='other'){
        $me = $this->userlib->me();
        $data = array(
            'user_id'   => $me->id,
            'user_name' => $me->username,
            'group_name'=> $me->group_name,
            'user_ip'   => $this->input->ip_address(),
            'date_time' => date('Y-m-d H:i:s'),
            'module'    => is_numeric($module) ? module_name($module) : $module,
            'event_type'=> $event_type,
            'event_name'=> $event_name
        );
        
        $this->sys_log_m->save($data);
    }
}

class Admin_Controller extends MY_Controller {
    private static $_menu_level_deep = 0;
    private static $_menu_level_base_parent = 0;
    
    function __construct() {
        parent::__construct();
        
        if (!$this->userlib->isLoggedin()){
            redirect(get_action_url('auth'));
            exit;
        }
        
        //load neccessary models
        $this->load->model(array('auth_user_m','mainmenu_m'));
        //store user loggedin detail
        $this->data['me'] = $this->userlib->me();
        //load helper
        $this->load->library('form_validation');
        //set default active module
        $this->data['module_active'] = $this->get_active_module_by_url();
        $this->data['class_active'] = $this->get_active_class_by_url();
        //init breadcumb
        $this->data['breadcumb'] = array();
        //set mainmenu
        $this->data['mainmenus'] = $this->get_user_menu();
        //echo json_encode($this->data['mainmenus']);exit;
    }
    
    protected function get_active_module_by_url(){
        $url_array = explode('/', uri_string());
        
        //find modul id from url array
        if (isset($url_array[0])){
            return $url_array[0];
        }
        return module_name(CT_MODULE_OTHER);
    }
    
    protected function get_active_class_by_url(){
        if (!isset($this->mtr_module_m)){
            $this->load->model('mtr_module_m');
        }
        $url_array = explode('/', uri_string());
        
        //find class from url array
        if (count($url_array)>1){
            return $url_array[1];
        }else{
            return $url_array[0];
        }
        return module_name(CT_MODULE_OTHER);
    }
    
    protected function get_user_menu(){
        
        $result = $this->userlib->get_user_menu();
        if ($result){
            $menu_array = array('parents' => array(),'items' => array());
            foreach ($result as $menu_item){
                if (!$menu_item->granted){
                    continue;
                }
                $menu_array['parents'][$menu_item->parent][] = $menu_item->id;
                $menu_array['items'][$menu_item->id] = $menu_item;
            }
            
            return $this->_hierarchy_menus($menu_array); //start level deep from 0
        }else{
            return NULL;
        }
    }
    
    protected function get_menu($parent=0,$deep=TRUE, $level_deep=0){
        
        $result = $this->mainmenu_m->get_all($parent, $deep);
        if ($result){
            $menu_array = array('parents' => array(),'items' => array());
            foreach ($result as $menu_item){
                //remove un-accesible menu based on user privilege
                if (!$this->userlib->has_access($menu_item->id)){
                    continue;
                }
                $menu_array['parents'][$menu_item->parent][] = $menu_item->id;
                $menu_array['items'][$menu_item->id] = $menu_item;
            }
            
            //set maximum level deep if set more than 0
            if ($level_deep>0){
                self::$_menu_level_deep = $level_deep;
                self::$_menu_level_base_parent = $parent;
            }
            return $this->_hierarchy_menus($menu_array, $parent, 1); //start level deep from 0
        }else{
            return NULL;
        }
    }
    
    private function _hierarchy_menus($menus, $parent=0, $level_deep=0){
        $menulist = array();
        if (isset($menus['parents'][$parent])){
            
            //get menu item for each id where parent = $parent
            foreach ($menus['parents'][$parent] as $menu_id){
                $menuitem = $menus['items'][$menu_id];
                //jika parent sama dengan base, kembalikan level ke 0
                if (self::$_menu_level_deep > 0 && $menuitem->parent == self::$_menu_level_base_parent){
                    $level_deep = 1;
                }
                //apakah sudah sampai pada level yang diinginkan
                if (self::$_menu_level_deep > 0 && $level_deep >= self::$_menu_level_deep){
                    //echo 'level:'.$level_deep.' counter:'.self::$menu_level_deep;exit;
                    $menuitem->children = NULL;
                }else{
                    //does menu has submenu ?
                    if (isset($menus['parents'][$menuitem->id])){
                        $menuitem->children = $this->_hierarchy_menus($menus, $menuitem->id, ($level_deep+1));
                    }else{
                        $menuitem->children = NULL;
                    }
                }
                
                
                $menulist[] = $menuitem;
            }
        }
        
        return $menulist;
    }
}

/**
 * Filename : MY_Controller.php
 * Location : applications/core/MY_Controller.php
 */
