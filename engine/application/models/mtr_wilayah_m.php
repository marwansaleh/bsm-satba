<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_wilayah_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_wilayah_m extends MY_Model {
    protected $_table_name = 'ref_wilayah';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'wilayah';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'wilayah', 
                'label' => 'Wilayah', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'wilayah', 
                'label' => 'Wilayah', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
}

/*
 * file location: /application/models/mtr_wilayah_m.php
 */
