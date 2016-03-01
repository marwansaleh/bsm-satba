<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mkt_polis_broker_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mkt_polis_broker_m extends MY_Model {
    protected $_table_name = 'rel_marketing_polis_broker';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';
    protected $_timestamps = FALSE;
    
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
 * file location: /application/models/mkt_polis_broker_m.php
 */
