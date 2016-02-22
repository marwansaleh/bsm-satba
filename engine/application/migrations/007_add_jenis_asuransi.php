<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_jenis_asuransi
 *
 * @author marwansaleh
 */
class Migration_add_jenis_asuransi extends MY_Migration {
    protected $_table_name = 'ref_asuransi';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'category'    => array(
            'type' => 'ENUM("general","eben")',
            'default' => 'general',
            'null' => FALSE
        ),
        'is_permil'    => array(
            'type' => 'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'fee_bri'    => array(
            'type' => 'DECIMAL',
            'constraint' => '6,4',
            'default' => 0.0000
        ),
        'captive_piutang' => array(
            'type'  => 'VARCHAR',
            'constraint' => 15,
            'null' => FALSE
        ),
        'captive_pendapatan' => array(
            'type'  => 'VARCHAR',
            'constraint' => 15,
            'null' => FALSE
        ),
        'non_captive_piutang' => array(
            'type'  => 'VARCHAR',
            'constraint' => 15,
            'null' => FALSE
        ),
        'non_captive_pendapatan' => array(
            'type'  => 'VARCHAR',
            'constraint' => 15,
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
 * filename : 007_add_jenis_asuransi.php
 * location : /application/migrations/007_add_jenis_asuransi.php
 */
