<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_marketing_polis_premi
 *
 * @author marwansaleh
 */
class Migration_add_rel_marketing_polis_premi extends MY_Migration {
    protected $_table_name = 'rel_marketing_polis_premi';
    protected $_primary_key = 'id';
    protected $_index_keys = array('tipe_premi');
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
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'suku_premi'    => array (
            'type'  => 'NUMERIC',
            'constraint' => '6,3',
            'default' => 0.000
        ),
        'tipe_premi' => array(
            'type' => 'ENUM("prosen","promil")',
            'default' => 'prosen',
            'null' => FALSE
        ),
        'premi_dasar' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
            'default' => 0.00
        ),
        'premi_dasar_idr' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
            'default' => 0.00
        )
    );
    
}

/*
 * filename : 030_add_rel_marketing_polis_premi.php
 * location : /application/migrations/030_add_rel_marketing_polis_premi.php
 */
