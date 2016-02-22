<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Auth_group_privilege_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Auth_group_privilege_m extends MY_Model {
    protected $_table_name = 'rel_auth_group_privileges';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'role_id,group_id';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
}

/*
 * file location: /application/models/auth_group_privilege_m.php
 */
