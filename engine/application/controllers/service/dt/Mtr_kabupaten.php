<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Mtr_kabupaten
 *
 * @author marwansaleh 1:31:58 PM
 */
class Mtr_kabupaten extends REST_Api {
    private $_remap_fields = array(
        'id'                => 'id',
        'propinsi'          => 'propinsi',
        'propinsi_nama'     => 'propinsi_nama',
        'nama'              => 'nama',
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
        
        $this->load->model(array('auth_user_m','mtr_kabupaten_m','mtr_propinsi_m'));
    }
    
    function index_get($id=NULL){
        if ($id){
            //manipulate result item before return
            $result = $this->remap_fields($this->_remap_fields, $this->_proccess_item($this->mtr_kabupaten_m->get($id)));
        } else {
            $draw = $this->get('draw') ? $this->get('draw') : 1;
            $length = $this->get('length') ? $this->get('length') : 10;
            $search = $this->get('search') ? $this->get('search') : NULL;
            $start = $this->get('start') ? $this->get('start') : 0;

            $totalRecords = $this->mtr_kabupaten_m->get_count();

            //set filtered if any
            if ($search && $search['value']){
                $this->db->like('nama', $search['value']);
            }
            //get filtered count
            $totalFiltered = $this->mtr_kabupaten_m->get_count();

            $result = array('draw' => $draw, 'start'=>$start, 'recordsTotal'=>$totalRecords, 'recordsFiltered'=>$totalFiltered, 'items'=>array());

            if ($totalRecords > 0){
                //set filtered if any
                if ($search && $search['value']){
                    $this->db->like('nama', $search['value']);
                }
                //apply offset and limit of data
                $this->db->offset($start)->limit($length);

                $query_result = $this->mtr_kabupaten_m->get();
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
    
    public function byprovince_get($propinsi){
        $kabupaten = $this->mtr_kabupaten_m->get_by(array('propinsi'=>$propinsi));
        $result = array();
        foreach ($kabupaten as $item){
            $result [] = $this->_proccess_item($item);
        }
        
        if (count($result)){
            $result= $this->remap_fields($this->_remap_fields, $result);
        }
        
        $this->response($result);
    }
    
    private function _proccess_item($item=NULL){
        if ($item){
            $item->propinsi_nama = $this->mtr_propinsi_m->get_value('nama', array('id'=>$item->propinsi));
            $item->created_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->created_by));
            $item->created_dt = date('Y-m-d H:i:s', $item->created);
            $item->modified_dt = date('Y-m-d H:i:s', $item->modified);
            $item->modified_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->modified_by));
        }
        
        return $item;
    }
}

/**
 * Filename : Mtr_kabupaten.php
 * Location : application/controllers/service/dt/Mtr_kabupaten.php
 */
