<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Sys_log
 *
 * @author marwansaleh 1:31:58 PM
 */
class Sys_log extends REST_Api {
    private $_remap_fields = array(
        'id'   => 'id',
        'user_id'  => 'user_id',
        'user_name' => 'user_name',
        'group_name' => 'group_name',
        'user_ip' => 'user_ip',
        'date_time' => 'date_time',
        'module' => 'module',
        'event_type'   => 'event_type',
        'event_name'   => 'event_name'
        
    );
    
    function __construct($config = 'rest') {
        parent::__construct($config);
        
        $this->load->model(array('sys_log_m'));
    }
    
    function index_get(){
        $draw = $this->get('draw') ? $this->get('draw') : 1;
        $length = $this->get('length') ? $this->get('length') : 10;
        $search = $this->get('search') ? $this->get('search') : NULL;
        $start = $this->get('start') ? $this->get('start') : 0;
        
        $totalRecords = $this->sys_log_m->get_count();
        
        //set filtered if any
        if ($search && $search['value']){
            $this->db->like('user_name', $search['value']);
            $this->db->or_like('group_name', $search['value']);
            $this->db->or_like('module', $search['value']);
            $this->db->or_like('event_type', $search['value']);
        }
        //get filtered count
        $totalFiltered = $this->sys_log_m->get_count();
        
        $result = array('draw' => $draw, 'start'=>$start, 'recordsTotal'=>$totalRecords, 'recordsFiltered'=>$totalFiltered, 'items'=>array());

        if ($totalRecords > 0){
            //set filtered if any
            if ($search && $search['value']){
                $this->db->like('user_name', $search['value']);
                $this->db->or_like('group_name', $search['value']);
                $this->db->or_like('module', $search['value']);
                $this->db->or_like('event_type', $search['value']);
            }
            //apply offset and limit of data
            $this->db->offset($start)->limit($length);
            
            $query_result = $this->sys_log_m->get();
            if ($query_result){
                $items = array();
                foreach ($query_result as $item){
                    //manipulate result item before return
                    $items [] = $item;
                }
                //manipulate result item before return
                $result['items'] = $this->remap_fields($this->_remap_fields, $items);
            }
        }
        $this->response($result);
        
    }
    
    function user_get($user_id){
        $draw = $this->get('draw') ? $this->get('draw') : 1;
        $length = $this->get('length') ? $this->get('length') : 10;
        $search = $this->get('search') ? $this->get('search') : NULL;
        $start = $this->get('start') ? $this->get('start') : 0;
        
        $condition = array('user_id'=>$user_id);
        $totalRecords = $this->sys_log_m->get_count($condition);
        
        //set filtered if any
        if ($search && $search['value']){
            $this->db->like('module', $search['value']);
            $this->db->or_like('event_type', $search['value']);
        }
        //get filtered count
        $totalFiltered = $this->sys_log_m->get_count($condition);
        
        $result = array('draw' => $draw, 'start'=>$start, 'recordsTotal'=>$totalRecords, 'recordsFiltered'=>$totalFiltered, 'items'=>array());

        if ($totalRecords > 0){
            //set filtered if any
            if ($search && $search['value']){
                $this->db->like('module', $search['value']);
                $this->db->or_like('event_type', $search['value']);
            }
            //apply condition
            $this->db->where($condition);
            //apply offset and limit of data
            $this->db->offset($start)->limit($length);
            
            $query_result = $this->sys_log_m->get();
            if ($query_result){
                $items = array();
                foreach ($query_result as $item){
                    //manipulate result item before return
                    $items [] = $item;
                }
                //manipulate result item before return
                $result['items'] = $this->remap_fields($this->_remap_fields, $items);
            }
        }
        $this->response($result);
        
    }
    
    private function _proccess_item($item=NULL){
        if ($item){
            
            $item->created_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->created_by));
            $item->created_dt = date('Y-m-d H:i:s', $item->created);
            $item->modified_dt = date('Y-m-d H:i:s', $item->modified);
            $item->modified_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->modified_by));
        }
        
        return $item;
    }
}

/**
 * Filename : Sys_log.php
 * Location : application/controllers/service/dt/Sys_log.php
 */
