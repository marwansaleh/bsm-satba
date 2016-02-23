<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_module_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_jenisasuransi_m extends MY_Model {
    protected $_table_name = 'ref_asuransi';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'kategori,nama';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'kategori', 
                'label' => 'Kategori', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'nama', 
                'label' => 'Nama', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'kategori', 
                'label' => 'Kategori', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'nama', 
                'label' => 'Nama', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function save($data, $id = NULL) {
        //check if username exists
        if (isset($data['name'])){
            if ($id){
                if ($this->get_count(array('nama'=>$data['nama'], 'id!='=>$id))){
                    $this->_last_message = 'Jenis asuransi "'.$data['nama'].'" sudah ada di database';
                    return FALSE;
                }
            }else{
                if ($this->get_count(array('nama'=>$data['nama']))){
                    $this->_last_message = 'Jenis asuransi "'.$data['nama'].'" sudah ada di database';
                    return FALSE;
                }
            }
        }
        return parent::save($data, $id);
    }
}

/*
 * file location: /application/models/mtr_jenisasuransi_m.php
 */
