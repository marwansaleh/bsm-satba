<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_kabupaten_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_kabupaten_m extends MY_Model {
    protected $_table_name = 'ref_kabupaten';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'nama';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'nama', 
                'label' => 'Nama sales', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'nama', 
                'label' => 'Nama sales', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
}

/*
 * file location: /application/models/mtr_kabupaten_m.php
 */
