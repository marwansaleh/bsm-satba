<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class of Userlib
 * Handle management of user, group and privileges
 *
 * @author marwansaleh 11:13:40 PM
 */
class Userlib extends Library {
    private static $objInstance;
    
    private $_prefix_session_access = '_ACC_';
    private $_role_session = '_ROLE_SESSION_';
    
    private $_table_user = 'ref_auth_users';
    private $_table_roles = 'ref_auth_roles'; //un-used since we use mainmenu table as role
    private $_table_access_group = 'rel_auth_group_privileges';
    private $_table_access_user = 'rel_auth_user_privileges';
    private $_table_groups = 'ref_auth_groups';
    
    function __construct() {
        parent::__construct();
        
        //load user model
        $this->ci->load->model('auth_user_m');
        
        $this->_update_session();
    }
    
    public static function getInstance(  ) { 
            
        if(!self::$objInstance){ 
            self::$objInstance = new Userlib();
        } 
        
        return self::$objInstance; 
    }
    
    public function get_name(){
        return $this->ci->session->userdata($this->_prefix_session_access.'name');
    }
    
    public function get_userid(){
        return $this->ci->session->userdata($this->_prefix_session_access.'id');
    }
    /**
     * Check if user is loggedin
     * @return boolean
     */
    public function isLoggedin(){
        if ($this->ci->session->userdata($this->_prefix_session_access . 'isloggedin')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    /**
     * Try to guess wheather user is online
     * @param string $session_id
     * @return boolean
     */
    public function is_online($session_id){
        $session_table = $this->ci->config->item('sess_table_name') ? $this->ci->config->item('sess_table_name'):'sessions';
        $this->ci->db->select('COUNT(*) AS found')->from($session_table)->where('id',$session_id);
        $row = $this->ci->db->get()->row();
        
        if ($row){
            return $row->found > 0;
        }
        
        return FALSE;
    }
    
    /**
     * Try login using username and password
     * @param string $user_name
     * @param string $password
     * @return boolean FALSE if failed, or return user object if success
     */
    public function login($user_name, $password){
        //get user specific
        $user = $this->ci->auth_user_m->get_by(array('username'=>$user_name), TRUE);
        
        if ($user){
            if ($user->password == $this->hash($password)){
                //create user loggedin session
                $this->create_login_session($user);
                //create user privileges session
                $this->_set_user_access_session($user->id, $user->group_id);
                
                return $user;
            }else{
                $this->_error_message = 'Password tidak sesuai';
            }
        }else{
            $this->_error_message = 'Username dan password tidak sesuai';
        }
        
        return FALSE;
    }
    
    /**
     * User logout / end session
     * @param type $user_id USER ID(optional) if omitted, userID will be taken from session
     */
    public function logout($user_id=NULL){
        if (!$user_id){
            if ($this->isLoggedin()){
                $user_id = $this->get_userid();
            }
        }
        
        //Update database
        if ($user_id){
            $this->ci->auth_user_m->save(array(
                'session_id'=> NULL
            ),$user_id);
        }
        
        $this->ci->session->sess_destroy();
    }
    
    
    
    /**
     * Check for access privileges for a specific role
     * @param string $role_name
     * @return boolean
     */
    public function has_access($role_id){
        $role_session = $this->ci->session->userdata($this->_role_session);
        return isset($role_session[$role_id]) ? $role_session[$role_id] : FALSE;
    }
    
    /**
     * Check group is admin group
     * @param int $group_id
     * @return boolean
     */
    public function is_admin($group_id=NULL){
        if (!$group_id){
            return ($this->ci->session->userdata($this->_prefix_session_access.'group_id')==CT_USERTYPE_ROOT);
        }else{
            return ($group_id == CT_USERTYPE_ROOT);
        }
    }
    
    /**
     * Get admin group ID
     * @return int
     */
    public function get_admin_groupID(){
        return CT_USERTYPE_ROOT;
    }
    
    /**
     * Generate password
     * @return string
     */
    public function generate_password($length=6){
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
    
    /**
     * Get full url avatar
     * @param string $avatar
     * @return string
     */
    public function get_avatar_url($avatar=NULL){
        if (!$avatar){
            $avatar = $this->ci->session->userdata($this->_prefix_session_access.'avatar');
        }
        if (strpos($avatar, 'http')!==FALSE){
            return $avatar;
        }else{
            $base_avatar_path = '';
            if (strpos($avatar, $this->ci->config->item('avatar'))===FALSE){
                $base_avatar_path = $this->ci->config->item('avatar');
            }
            
            return userfiles_baseurl($base_avatar_path . $avatar);
        }
    }
    
    public function get_default_avatars(){
        $sub_folder = 'default/';
        $list = array();
        $avatar_def_path = userfiles_basepath ($this->ci->config->item('avatar') .$sub_folder);
        foreach (glob($avatar_def_path . '*.*') as $avatar){
            $list [] = $sub_folder . basename($avatar);
        }
        
        return $list;
    }
    
    public function get_my_avatars(){
        $list = array();
        
        //get user's avatar path
        $user_avatar_path = $this->get_userid();
        if ($user_avatar_path){
            $user_avatar_path .= '/';
            $avatar_path = $this->ci->config->item('avatar') .$user_avatar_path;
            foreach (glob($avatar_path . '*.*') as $avatar){
                $list [] = $user_avatar_path . basename($avatar);
            }
        }
        
        return $list;
    }
    
    public function me($session=TRUE){
        if ($session){
            $user = new stdClass();
            $user->id = $this->ci->session->userdata($this->_prefix_session_access.'id');
            $user->name = $this->ci->session->userdata($this->_prefix_session_access.'name');
            $user->group_id = $this->ci->session->userdata($this->_prefix_session_access.'group_id');
            $user->group_name = $this->ci->session->userdata($this->_prefix_session_access.'group_name');
            $user->is_administrator = $this->ci->session->userdata($this->_prefix_session_access.'is_administrator');
            $user->username = $this->ci->session->userdata($this->_prefix_session_access.'username');
            $user->avatar = $this->ci->session->userdata($this->_prefix_session_access.'avatar');
            
        }else {
            $user = $this->ci->auth_user_m->get($this->get_userid());
            $user->group_name = $this->_get_group_name($user->group_id);
            $user->is_administrator = $this->is_admin($user->group_id);
        }
        
        return $user;
    }
    
    
    /**
     * Create session for a user
     * @param mixed $user user record object
     */
    public function create_login_session($user=NULL, $update_login_info=TRUE){
        if (!$user){
            $user = $this->ci->auth_user_m->get($this->get_userid());
        }
        if ($update_login_info){
            //Update database
            $this->ci->auth_user_m->save(array(
                'last_login'    => time(),
                'last_ip'       => $this->ci->input->ip_address(),
                'session_id'    => $this->ci->session->userdata('session_id')

            ), $user->id);
        }
        
        //create session for detail user
        $user_session = array(
            $this->_prefix_session_access.'isloggedin'      => TRUE,
            $this->_prefix_session_access.'id'              => $user->id,
            $this->_prefix_session_access.'username'        => $user->username,
            $this->_prefix_session_access.'name'            => $user->name,
            $this->_prefix_session_access.'group_id'        => $user->group_id,
            $this->_prefix_session_access.'group_name'      => $this->_get_group_name($user->group_id),
            $this->_prefix_session_access.'is_administrator'=> $this->is_admin($user->group_id),
            $this->_prefix_session_access.'last_login'      => $user->last_login>0 ? $user->last_login : time(),
            $this->_prefix_session_access.'avatar'          => $user->avatar ? $user->avatar : $this->ci->config->item('avatar') .'default/default.jpg'
        );
        
        $this->ci->session->set_userdata($user_session);
    }
    
    public function get_user_privileges($user_id, $group_id=NULL){
        if (!$group_id){
            $group_id = $this->ci->auth_user_m->get_value('group_id',array('id'=>$user_id));
        }
        
        if (!$group_id){
            return FALSE;
        }
        
        $user_privileges = array();
        
        $group_access = array();
        $user_access = array();
        if (!$this->is_admin($group_id)){
            //get access for its group
            $group_access_db = $this->_get_group_access($group_id);
            foreach ($group_access_db as $g_role){
                $group_access [$g_role->role_id] = $g_role->granted == 1?TRUE:FALSE;
            }
            
            //get access for this specific user if any
            $user_access_db = $this->_get_users_access($user_id);
            foreach ($user_access_db as $u_role){
                $user_access [$u_role->role_id] = $u_role->granted == 1?TRUE:FALSE;
            }
        }
        
        //start looping for making user access
        //get all roles
        $all_roles = $this->_get_all_roles();
        //set the roles
        foreach($all_roles as $role){
            if ($this->is_admin($group_id)){
                $role->granted = TRUE;
            }else{
                $role->granted = isset($user_access[$role->id]) ? $user_access[$role->id] : (isset($group_access[$role->id]) ? $group_access[$role->id] : FALSE);
            }
            
            $user_privileges [] = $role;
        }
        
        return $user_privileges;
    }
    
    public function get_group_privileges($group_id){
        //get roles defined for this group
        if (!$this->is_admin($group_id)){
            $group_roles = array();
            foreach ($this->_get_group_access($group_id) as $g_role){
                $group_roles [$g_role->role_id] = $g_role->granted == 1?TRUE:FALSE;
            }
        }
        
        //get all roles
        $access_roles = array();
        //get all role a.k.a mainmenu table
        foreach ($this->_get_all_roles() as $role){
            if ($this->is_admin($group_id)){
                $access_roles[$role->id] = TRUE;
            }else{
                $access_roles[$role->id] = isset($group_roles[$role->id]) ? $group_roles[$role->id] : FALSE;
            }
        }
        
        return $access_roles;
    }
    
    public function get_user_menu(){
        return $this->ci->session->userdata($this->_role_session);
    }
    
    /**
     * Update loggedin user session in database
     */
    private function _update_session(){
        if ($this->isLoggedin()){
            $this->ci->auth_user_m->save(array('session_id'=>  $this->ci->session->userdata('session_id')), $this->get_userid());
        }
    }
    
    /**
     * Set user privileges
     * @param int $user_id
     * @param int $group_id
     */
    private function _set_user_access_session($user_id, $group_id){
        
        $access_roles = $this->get_user_privileges($user_id, $group_id);
        
        $this->ci->session->set_userdata($this->_role_session,$access_roles);
    }
    
    /**
     * Get all roles from database
     * @return mixed
     */
    private function _get_all_roles(){
        if (!isset($this->ci->mainmenu_m)){
            $this->ci->load->model('mainmenu_m');
        }
        $all_menu = $this->ci->mainmenu_m->get_all();
        
        return $all_menu;
    }
    
    /**
     * Get group privileges
     * @param int $group_id
     * @return mixed
     */
    private function _get_group_access($group_id){
        return $this->ci->db->select('*')->from($this->_table_access_group)->where('group_id', $group_id)->get()->result();
    }
    
    /**
     * Get user privileges
     * @param int $user_id
     * @return mixed
     */
    private function _get_users_access($user_id){
        return $this->ci->db->select('*')->from($this->_table_access_user)->where('user_id', $user_id)->get()->result();
    }
    
    private function _get_group_name($group_id){
        $this->ci->load->model('auth_group_m');
        
        return $this->ci->auth_group_m->get_value('name', array('id'=>$group_id));
    }
}

/**
 * Filename : Userlib.php
 * Location : application/libraries/Userlib.php
 */
