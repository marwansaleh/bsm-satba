<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Mtr_sumberbisnis
 *
 * @author marwansaleh 1:31:58 PM
 */
class Mtr_wilayah extends REST_Api {
    private $_remap_fields = array(
        'id'                => 'id',
        'wilayah'           => 'wilayah',
        'sumberbisnis_count'=> 'sumberbisnis_count',
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
        
        $this->load->model(array('mtr_sumberbisnis_m','mtr_wilayah_m','auth_user_m'));
    }
    
    function index_get(){
        $draw = $this->get('draw') ? $this->get('draw') : 1;
        $length = $this->get('length') ? $this->get('length') : 10;
        $search = $this->get('search') ? $this->get('search') : NULL;
        $start = $this->get('start') ? $this->get('start') : 0;
        
        $totalRecords = $this->mtr_wilayah_m->get_count();
        
        //set filtered if any
        if ($search && $search['value']){
            $this->db->like('wilayah', $search['value']);
        }
        //get filtered count
        $totalFiltered = $this->mtr_wilayah_m->get_count();
        
        $result = array('draw' => $draw, 'start'=>$start, 'recordsTotal'=>$totalRecords, 'recordsFiltered'=>$totalFiltered, 'items'=>array());

        if ($totalRecords > 0){
            //set filtered if any
            if ($search && $search['value']){
                $this->db->like('wilayah', $search['value']);
            }
            //apply offset and limit of data
            $this->db->offset($start)->limit($length);
            
            $query_result = $this->mtr_wilayah_m->get();
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
            $item->sumberbisnis_count = $this->mtr_sumberbisnis_m->get_count(array('wilayah_id'=>$item->id));
            $item->created_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->created_by));
            $item->created_dt = date('Y-m-d H:i:s', $item->created);
            $item->modified_dt = date('Y-m-d H:i:s', $item->modified);
            $item->modified_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->modified_by));
        }
        
        return $item;
    }
}

/**
 * Filename : Mtr_wilayah.php
 * Location : application/controllers/service/dt/Mtr_wilayah.php
 */
