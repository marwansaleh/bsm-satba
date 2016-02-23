<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manual_user_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Manual_user_m extends MY_Model {
    protected $_table_name = 'ref_manual_user';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'parent, caption';
    protected $_timestamps = FALSE;
    
}

/*
 * file location: /application/models/manual_user_m.php
 */
