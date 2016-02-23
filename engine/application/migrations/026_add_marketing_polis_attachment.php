<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_marketing_polis_attachment
 *
 * @author marwansaleh
 */
class Migration_add_marketing_polis_attachment extends MY_Migration {
    protected $_table_name = 'rel_polis_attachment';
    protected $_primary_key = 'id';
    //protected $_index_keys = array();
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'polis'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'nama_file'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 254,
            'null' => FALSE
        ),
        'deskripsi'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 254,
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
 * filename : 026_add_marketing_polis_attachment.php
 * location : /application/migrations/026_add_marketing_polis_attachment.php
 */
