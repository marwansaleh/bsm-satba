<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Sys_dbbackup_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Sys_dbbackup_m extends MY_Model {
    protected $_table_name = 'ref_sys_dbbackup';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'created desc';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created');
    
}

/*
 * file location: /application/models/sys_dbbackup_m.php
 */
