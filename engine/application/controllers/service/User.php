<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of User
 *
 * @author marwansaleh 1:31:58 PM
 */
class User extends REST_Api {
    private $_remap_fields = array(
        'id'                => 'id',
        'name'              => 'name',
        'group_id'          => 'group_id',
        'group_name'        => 'group_name',
        'username'          => 'username',
        'last_login'        => 'last_login',
        'last_ip'           => 'last_ip',
        'last_url'          => 'last_url',
        'created'           => 'created',
        'created_dt'        => 'created_dt',
        'created_by'        => 'created_by',
        'created_by_name'   => 'created_by_name',
        'modified'          => 'modified',
        'modified_dt'       => 'modified_dt',
        'modified_by'       => 'modified_by',
        'modified_by_name'  => 'modified_by_name',
        
    );
    
    function __construct($config = 'rest') {
        parent::__construct($config);
        
        $this->load->model(array('auth_user_m','auth_group_m'));
    }
    
    function index_get($id=NULL){
        if ($id){
            //manipulate result item before return
            $result = $this->remap_fields($this->_remap_fields, $this->_proccess_item($this->menu_m->get($id)));
        } else {
            $page = $this->get('page') ? $this->get('page') : 1;
            $limit = $this->get('limit') ? $this->get('limit') : 100;
            
            $totalRecords = $this->auth_user_m->get_count();
            $totalPages = ceil($totalRecords / $limit);
            
            $result = array('draw' => $page, 'recordsTotal'=>$totalRecords, 'totalPages' => $totalPages, 'items'=>array());
            
            if ($totalRecords > 0){
                $offset = ($page-1) * $limit;
                //apply offset and limit of data
                $this->db->offset($offset)->limit($limit);
                $query_result = $this->auth_user_m->get();
                if ($query_result){
                    $items = array();
                    foreach ($query_result as $item){
                        //manipulate result item before return
                        $items [] = $this->_proccess_item($item);
                    }
                    //manipulate result item before return
                    $result['items'] = $this->remap_fields($this->_remap_fields, $items);
                }
            }
        }
        //sleep(1);
        $this->response($result);
        
    }
    
    private function _proccess_item($item=NULL){
        if ($item){
            $item->group_name = $this->auth_group_m->get_value('name', array('id'=>$item->group_id));
            $item->created_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->created_by));
            $item->created_dt = date('Y-m-d H:i:s', $item->created);
            $item->modified_dt = date('Y-m-d H:i:s', $item->modified);
            $item->modified_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->modified_by));
        }
        
        return $item;
    }
}

/**
 * Filename : user.php
 * Location : application/controllers/service/user.php
 */
