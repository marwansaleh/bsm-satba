<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mainmenu_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_sumberbisnis_m extends MY_Model {
    protected $_table_name = 'ref_sumber_bisnis';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'nama';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'nama', 
                'label' => 'Nama sumber bisnis', 
                'rules' => 'trim|required|min_length[2]'
            ),
            array(
                'field' => 'wilayah', 
                'label' => 'Wilayah', 
                'rules' => 'greater_than[0]'
            ),
            array(
                'field' => 'is_captive', 
                'label' => 'Is Captive', 
                'rules' => 'required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'nama', 
                'label' => 'Nama sumber bisnis', 
                'rules' => 'trim|required|min_length[2]'
            ),
            array(
                'field' => 'wilayah', 
                'label' => 'Wilayah', 
                'rules' => 'required|greater_than[0]'
            ),
            array(
                'field' => 'is_captive', 
                'label' => 'Is Captive', 
                'rules' => 'required'
            )
        )
    ); 
    
}

/*
 * file location: /application/models/mtr_sumberbisnis_m.php
 */
