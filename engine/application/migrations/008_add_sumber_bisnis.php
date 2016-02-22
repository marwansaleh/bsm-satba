<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_submer_bisnis
 *
 * @author marwansaleh
 */
class Migration_add_sumber_bisnis extends MY_Migration {
    protected $_table_name = 'ref_sumber_bisnis';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 7
        ),
        'nama'    => array(
            'type' => 'VARCHAR',
            'constraint' => '50',
            'null' => FALSE
        ),
        'is_captive'    => array(
            'type' => 'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'wilayah_id'    => array(
            'type' => 'INT',
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
 * filename : 008_add_sumber_bisnis.php
 * location : /application/migrations/008_add_sumber_bisnis.php
 */
