<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_broker_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_broker_m extends MY_Model {
    protected $_table_name = 'ref_broker_asuransi';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'sort';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'nama', 
                'label' => 'Nama', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'nama', 
                'label' => 'Nama', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function save($data, $id = NULL) {
        //check if username exists
        if (isset($data['nama'])){
            if ($id){
                if ($this->get_count(array('nama'=>$data['nama'], 'id!='=>$id))){
                    $this->_last_message = 'Nama broker "'.$data['nama'].'" sudah ada di database';
                    return FALSE;
                }
            }else{
                if ($this->get_count(array('nama'=>$data['nama']))){
                    $this->_last_message = 'Nama broker "'.$data['nama'].'" sudah ada di database';
                    return FALSE;
                }
            }
        }
        return parent::save($data, $id);
    }
}

/*
 * file location: /application/models/mtr_broker_m.php
 */
