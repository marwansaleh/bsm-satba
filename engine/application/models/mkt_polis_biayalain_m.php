<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mkt_polis_biayalain_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mkt_polis_biayalain_m extends MY_Model {
    protected $_table_name = 'rel_marketing_polis_biayalain';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'polis, nama';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'polis', 
                'label' => 'Nomor polis', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'polis', 
                'label' => 'Nomor polis', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
}

/*
 * file location: /application/models/mkt_polis_biayalain_m.php
 */
