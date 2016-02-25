<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_group_privileges
 *
 * @author marwansaleh
 */
class Migration_add_rel_group_privileges extends MY_Migration {
    protected $_table_name = 'rel_auth_group_privileges';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'group_id'    => array(
            'type' => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'role_id'    => array(
            'type' => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'granted'    => array(
            'type' => 'TINYINT',
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
 * filename : 019_add_rel_group_privileges.php
 * location : /application/migrations/019_add_rel_group_privileges.php
 */
