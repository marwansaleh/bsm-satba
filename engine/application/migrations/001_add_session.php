<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_Add_session
 *
 * @author marwansaleh
 */
class Migration_Add_session extends MY_Migration {
    protected $_table_name = 'sessions';
    protected $_primary_key = 'id';
    protected $_index_keys = array('timestamp');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 40,
            'NULL' => FALSE
        ),
        'ip_address'    => array(
            'type' => 'VARCHAR',
            'constraint' => 45,
            'NULL' => FALSE
        ),
        'timestamp' => array(
            'type'  => 'INT',
            'constraint' => 10,
            'unsigned' => TRUE,
            'default' => 0,
            'NULL' => FALSE
        ),
        'data' => array(
            'type' => 'BLOB',
            'NULL' => FALSE
        )
    );
}

/*
 * filename : 001_add_session.php
 * location : /application/migrations/001_add_session.php
 */
