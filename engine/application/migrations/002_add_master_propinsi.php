<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_propinsi
 *
 * @author marwansaleh
 */
class Migration_add_master_propinsi extends MY_Migration {
    protected $_table_name = 'ref_propinsi';
    protected $_primary_key = 'id';
    protected $_index_keys = array('nama');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 2,
            'null' => FALSE
        ),
        'nama' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'null' => FALSE
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
 * filename : 002_add_master_propinsi.php
 * location : /application/migrations/002_add_master_propinsi.php
 */
