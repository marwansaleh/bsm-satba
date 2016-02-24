<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_marketing_polis
 *
 * @author marwansaleh
 */
class Migration_add_marketing_polis_biayalain extends MY_Migration {
    protected $_table_name = 'rel_marketing_polis_biayalain';
    protected $_primary_key = 'id';
    protected $_index_keys = array('polis');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'polis' => array(
            'type' => 'INT',
            'constraint' => 2,
            'null' => FALSE
        ),
        'nama' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'null' => FALSE
        ),
        'mata_uang' => array (
            'type'  => 'INT',
            'constraint' => 11,
            'default' => 1
        ),
        'biaya_lain' => array (
            'type'  => 'NUMERIC',
            'constraint' => '10,2',
            'default' => 0.00
        ),
        'biaya_lain_idr' => array (
            'type'  => 'NUMERIC',
            'constraint' => '10,2',
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
 * filename : 029_add_marketing_polis_biayalain.php
 * location : /application/migrations/029_add_marketing_polis_biayalain.php
 */
