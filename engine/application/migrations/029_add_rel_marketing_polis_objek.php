<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_marketing_polis_objek
 *
 * @author marwansaleh
 */
class Migration_add_rel_marketing_polis_objek extends MY_Migration {
    protected $_table_name = 'rel_marketing_polis_objek';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('nomor_polis');
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
        'objek'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'null' => FALSE
        ),
        'mata_uang'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'jumlah_pertanggungan' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
            'default' => 0.00,
            'null' => FALSE
        ),
        'jumlah_pertanggungan_idr' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
            'default' => 0.00,
            'null' => FALSE
        )
    );
    
}

/*
 * filename : 029_add_rel_marketing_polis_objek.php
 * location : /application/migrations/029_add_rel_marketing_polis_objek.php
 */
