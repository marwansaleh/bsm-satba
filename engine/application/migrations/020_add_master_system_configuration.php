<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_module
 *
 * @author marwansaleh
 */
class Migration_add_master_system_configuration extends MY_Migration {
    protected $_table_name = 'ref_sys_configuration';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'var_name'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'default' => 0
        ),
        'var_value'    => array (
            'type'  => 'TEXT',
            'null' => TRUE
        ),
        'var_type'    => array (
            'type'  => 'ENUM("string", "integer", "float", "boolean")',
            'default' => 'string',
            'null' => FALSE
        ),
        'is_list'   => array(
            'type'  => 'TINYINT',
            'constraint' => 1,
            'default' => 0
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
        ),
        'modified'   => array(
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'default' => 0
        ),
        'modified_by'   => array(
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'default' => 0
        )
    );
    
}

/*
 * filename : 020_add_master_system_configuration.php
 * location : /application/migrations/020_add_master_system_configuration.php
 */
