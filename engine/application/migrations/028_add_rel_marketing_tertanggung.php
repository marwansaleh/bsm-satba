<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_marketing_polis_broker
 *
 * @author marwansaleh
 */
class Migration_add_rel_marketing_tertanggung extends MY_Migration {
    protected $_table_name = 'rel_tertanggung';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('nama_lengkap','nama_depan');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'nama_lengkap'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 90,
            'null' => FALSE
        ),
        'nama_depan'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 30,
            'null' => FALSE
        ),
        'nama_tengah'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 30,
            'null' => TRUE
        ),
        'nama_belakang'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 30,
            'null' => TRUE
        ),
        'alamat'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 254,
            'null' => TRUE
        ),
        'kota'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'default' => 0
        ),
        'propinsi'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'default' => 0
        ),
        'kode_pos'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 7,
            'null' => TRUE
        ),
        'telepon'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 11,
            'null' => TRUE
        ),
        'mobile'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 14,
            'null' => TRUE
        ),
        'fax'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 11,
            'null' => TRUE
        ),
        'email'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'null' => TRUE
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
 * filename : 028_add_rel_marketing_tertanggung.php
 * location : /application/migrations/028_add_rel_marketing_tertanggung.php
 */
