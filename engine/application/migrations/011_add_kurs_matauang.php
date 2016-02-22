<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_matauang
 *
 * @author marwansaleh
 */
class Migration_add_kurs_matauang extends MY_Migration {
    protected $_table_name = 'rel_kurs_matauang';
    protected $_primary_key = 'id';
    protected $_index_keys = array('matauang_id');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'tanggal'    => array(
            'type' => 'DATE',
            'null' => FALSE
        ),
        'matauang_id'   => array(
            'type'  => 'VARCHAR',
            'constraint' => 3,
            'null' => FALSE
        ),
        'kurs'   => array(
            'type'  => 'DECIMAL',
            'constraint' => '8,2',
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
 * filename : 011_add_kurs_matauang.php
 * location : /application/migrations/011_add_kurs_matauang.php
 */
