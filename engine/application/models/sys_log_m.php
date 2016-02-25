<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Sys_log_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Sys_log_m extends MY_Model {
    protected $_table_name = 'rel_sys_log';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'date_time desc';
    protected $_timestamps = FALSE;
    
}

/*
 * file location: /application/models/sys_log_m.php
 */
