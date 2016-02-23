<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_sales_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_sales_m extends MY_Model {
    protected $_table_name = 'ref_sales_marketing';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
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
 * file location: /application/models/mtr_sales_m.php
 */
