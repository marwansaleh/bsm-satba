<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_okupasi_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_okupasi_m extends MY_Model {
    protected $_table_name = 'ref_okupasi';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'kode';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'kode', 
                'label' => 'Kode okupasi', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'kode', 
                'label' => 'Kode okupasi', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function save($data, $id = NULL) {
        //check if username exists
        if (isset($data['kode'])){
            if ($id){
                if ($this->get_count(array('kode'=>$data['kode'], 'id!='=>$id))){
                    $this->_last_message = 'Kode okupasi "'.$data['kode'].'" sudah ada di database';
                    return FALSE;
                }
            }else{
                if ($this->get_count(array('kode'=>$data['kode']))){
                    $this->_last_message = 'Kode okupasi "'.$data['kode'].'" sudah ada di database';
                    return FALSE;
                }
            }
        }
        return parent::save($data, $id);
    }
}

/*
 * file location: /application/models/mtr_okupasi_m.php
 */
