<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_sales
 *
 * @author marwansaleh
 */
class Migration_add_master_sales extends MY_Migration {
    protected $_table_name = 'ref_sales_marketing';
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
        'marketing_group_id'   => array(
            'type'  => 'INT',
            'constraint' => 11,
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
 * filename : 014_add_master_sales.php
 * location : /application/migrations/014_add_master_sales.php
 */
