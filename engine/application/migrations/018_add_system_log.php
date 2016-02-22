<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_system_log
 *
 * @author marwansaleh
 */
class Migration_add_system_log extends MY_Migration {
    protected $_table_name = 'ref_sys_log';
    protected $_primary_key = 'id';
    protected $_index_keys = array('user_name','group_name','event_type');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'user_id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => TRUE,
            'default' => 0
        ),
        'user_name'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'null' => true
        ),
        'group_name'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'null' => true
        ),
        'user_ip'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 16,
            'null' => TRUE
        ),
        'date_time'    => array (
            'type'  => 'DATETIME',
            'null' => TRUE
        ),
        'module'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 30,
            'null' => true
        ),
        'event_type' => array(
            'type' => 'ENUM("create","edit","delete","other")', //check constant CT_LOG_CREATE, CT_LOG_EDIT, CT_LOG_DELETE, CT_LOG_OTHER
            'default' => 'other'
        ),
        'event_name'    => array (
            'type'  => 'TEXT',
            'null' => TRUE
        ),
    );
    
}

/*
 * filename : 018_add_system_log.php
 * location : /application/migrations/018_add_system_log.php
 */
