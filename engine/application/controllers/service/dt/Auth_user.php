<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Auth_user
 *
 * @author marwansaleh 1:31:58 PM
 */
class Auth_user extends REST_Api {
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
        $draw = $this->get('draw') ? $this->get('draw') : 1;
        $length = $this->get('length') ? $this->get('length') : 10;
        $search = $this->get('search') ? $this->get('search') : NULL;
        $start = $this->get('start') ? $this->get('start') : 0;
        
        $totalRecords = $this->auth_user_m->get_count();
        
        //set filtered if any
        if ($search && $search['value']){
            $this->db->like('name', $search['value']);
            $this->db->or_like('username', $search['value']);
        }
        //get filtered count
        $totalFiltered = $this->auth_user_m->get_count();
        
        $result = array('draw' => $draw, 'start'=>$start, 'recordsTotal'=>$totalRecords, 'recordsFiltered'=>$totalFiltered, 'items'=>array());

        if ($totalRecords > 0){
            //set filtered if any
            if ($search && $search['value']){
                $this->db->like('name', $search['value']);
                $this->db->or_like('username', $search['value']);
            }
            //apply offset and limit of data
            $this->db->offset($start)->limit($length);
            
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
        $this->response($result);
        
    }
    
    private function _proccess_item($item=NULL){
        if ($item){
            $item->last_login = $item->last_login ? date('d-M-Y H:i', $item->last_login) : 'never';
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
 * Filename : Auth_user.php
 * Location : application/controllers/service/dt/Auth_user.php
 */
