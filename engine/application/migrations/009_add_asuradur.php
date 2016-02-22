<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_asuradur
 *
 * @author marwansaleh
 */
class Migration_add_asuradur extends MY_Migration {
    protected $_table_name = 'ref_asuradur';
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
        'alamat'    => array(
            'type' => 'VARCHAR',
            'constraint' => 254
        ),
        'kota'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'telepon'    => array(
            'type' => 'VARCHAR',
            'constraint' => 12
        ),
        'fax'    => array(
            'type' => 'VARCHAR',
            'constraint' => 12
        ),
        'contact_person'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'email'    => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'account_id'   => array(
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'null' => false
        ),
        'calc_ppn'   => array(
            'type'  => 'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'calc_pph'   => array(
            'type'  => 'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'is_active'   => array(
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
 * filename : 009_add_asuradur.php
 * location : /application/migrations/009_add_asuradur.php
 */
