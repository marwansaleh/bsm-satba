<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_tertanggung_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_tertanggung_m extends MY_Model {
    protected $_table_name = 'rel_tertanggung';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'nama_lengkap,nama_depan';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'nama_depan', 
                'label' => 'Nama depan', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'nama_depan', 
                'label' => 'Nama depan', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function save($data, $id = NULL) {
        $nama_lengkap = (isset($data['nama_depan']) ? $data['nama_depan'] : '') 
            . (isset($data['nama_tengah']) ? ' ' .$data['nama_tengah'] : '')
            . (isset($data['nama_belakang']) ? ' ' .$data['nama_belakang'] : '');
        
        if (strlen($nama_lengkap)>0){
            $data['nama_lengkap'] = $nama_lengkap;
        }
        
        return parent::save($data, $id);
    }
}

/*
 * file location: /application/models/mtr_tertanggung_m.php
 */
