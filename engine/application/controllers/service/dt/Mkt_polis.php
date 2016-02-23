<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Mkt_polis
 *
 * @author marwansaleh 1:31:58 PM
 */
class Mkt_polis extends REST_Api {
    private $_remap_fields = array(
        'no_urut'           => 'no_urut',
        'id'                => 'id',
        'nomor_polis'       => 'nomor_polis',
        'nama_tertanggung'  => 'nama_tertanggung',
        'okupasi'           => 'okupasi',
        'jenis_asuransi'    => 'jenis_asuransi',
        'jenis_asuransi_label' => 'jenis_asuransi_label',
        'periode'           => 'periode',
        'nama_sales'        => 'nama_sales',
        'sumber_bisnis_label' => 'sumber_bisnis_label',
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
        
        $this->load->model(array('auth_user_m','mkt_polis_m','mtr_tertanggung_m','mtr_jenisasuransi_m','mtr_sales_m','mtr_sumberbisnis_m'));
    }
    
    function index_get(){
        $draw = $this->get('draw') ? $this->get('draw') : 1;
        $length = $this->get('length') ? $this->get('length') : 10;
        $search = $this->get('search') ? $this->get('search') : NULL;
        $start = $this->get('start') ? $this->get('start') : 0;
        
        $totalRecords = $this->mkt_polis_m->get_count();
        
        //set filtered if any
        if ($search && $search['value']){
            $this->db->like('nomor_polis', $search['value']);
        }
        //get filtered count
        $totalFiltered = $this->mkt_polis_m->get_count();
        
        $result = array('draw' => $draw, 'start'=>$start, 'recordsTotal'=>$totalRecords, 'recordsFiltered'=>$totalFiltered, 'items'=>array());

        if ($totalRecords > 0){
            //set filtered if any
            if ($search && $search['value']){
                $this->db->like('nomor_polis', $search['value']);
            }
            //apply offset and limit of data
            $this->db->offset($start)->limit($length);
            
            $query_result = $this->mkt_polis_m->get();
            if ($query_result){
                $items = array();
                foreach ($query_result as $item){
                    $item->no_urut = ($start+1);
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
            $item->nama_tertanggung = $this->mtr_tertanggung_m->get_value('nama_lengkap',array('id'=>$item->tertanggung));
            $item->jenis_asuransi_label = $this->mtr_jenisasuransi_m->get_count(array('id'=>$item->jenis_asuransi));
            $item->periode = $item->periode_mulai .' s/d ' . $item->periode_akhir;
            $item->nama_sales = $this->mtr_sales_m->get_value(array('nama','id'=>$item->sales));
            $item->sumber_bisnis_label = $this->mtr_sumberbisnis_m->get_value('nama',array('id'=>$item->sales));
            $item->created_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->created_by));
            $item->created_dt = date('Y-m-d H:i:s', $item->created);
            $item->modified_dt = date('Y-m-d H:i:s', $item->modified);
            $item->modified_by_name = $this->auth_user_m->get_value('name',array('id'=>$item->modified_by));
        }
        
        return $item;
    }
}

/**
 * Filename : Auth_group.php
 * Location : application/controllers/service/dt/Auth_group.php
 */
