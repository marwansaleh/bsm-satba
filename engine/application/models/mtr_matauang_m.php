<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_wilayah_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_matauang_m extends MY_Model {
    protected $_table_name = 'ref_matauang';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'sort';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'id', 
                'label' => 'Kode mata uang', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'nama', 
                'label' => 'Nama mata uang', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'id', 
                'label' => 'Kode mata uang', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'nama', 
                'label' => 'Nama mata uang', 
                'rules' => 'trim|required'
            )
        )
    ); 
}

/*
 * file location: /application/models/mtr_matauang_m.php
 */
