<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_sales_group
 *
 * @author marwansaleh
 */
class Migration_add_master_sales_group extends MY_Migration {
    protected $_table_name = 'ref_sales_group';
    protected $_primary_key = 'id';
    protected $_index_keys = array('nama');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'nama'   => array(
            'type'  => 'VARCHAR',
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
 * filename : 013_add_master_sales_group.php
 * location : /application/migrations/013_add_master_sales_group.php
 */
