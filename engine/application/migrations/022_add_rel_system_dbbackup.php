<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_system_dbbackup
 *
 * @author marwansaleh
 */
class Migration_add_rel_system_dbbackup extends MY_Migration {
    protected $_table_name = 'ref_sys_dbbackup';
    protected $_primary_key = 'id';
    protected $_index_keys = array('name');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'name'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'null' => true
        ),
        'size'    => array (
            'type'  => 'FLOAT',
            'constraint' => 10,2,
            'default' => 0.00
        ),
        'created'   => array(
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'default' => 0
        ),
        'created_by'   => array(
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'default' => 0
        )
    );
    
}

/*
 * filename : 022_add_rel_system_dbbackup.php
 * location : /application/migrations/022_add_rel_system_dbbackup.php
 */
