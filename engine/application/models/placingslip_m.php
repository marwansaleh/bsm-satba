<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Placingslip_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Placingslip_m extends MY_Model {
    protected $_table_name = 'rel_placingslip';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'category,sort';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
}

/*
 * file location: /application/models/placingslip_m.php
 */
