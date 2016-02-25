<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_marketing_polis_broker
 *
 * @author marwansaleh
 */
class Migration_add_rel_marketing_polis_broker extends MY_Migration {
    protected $_table_name = 'rel_marketing_polis_broker';
    protected $_primary_key = 'id';
    protected $_index_keys = array('nomor_polis');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'nomor_polis'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 15,
            'null' => FALSE
        ),
        'broker'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'persentase'    => array (
            'type'  => 'NUMERIC',
            'constraint' => '6,3',
            'default' => 0.000
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
 * filename : 032_add_rel_marketing_polis_broker.php
 * location : /application/migrations/032_add_rel_marketing_polis_broker.php
 */
