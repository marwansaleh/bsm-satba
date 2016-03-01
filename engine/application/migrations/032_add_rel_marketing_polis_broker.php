<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_marketing_polis_broker
 *
 * @author marwansaleh
 */
class Migration_add_rel_marketing_polis_broker extends MY_Migration {
    protected $_table_name = 'rel_marketing_polis_broker';
    protected $_primary_key = 'id';
    protected $_index_keys = array('polis');
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
        'broker'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'leader' => array(
            'type' =>'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'persentase'    => array (
            'type'  => 'NUMERIC',
            'constraint' => '6,3',
            'default' => 0.000
        ),
        'komisi' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
            'default' => 0.00
        )
    );
    
}

/*
 * filename : 032_add_rel_marketing_polis_broker.php
 * location : /application/migrations/032_add_rel_marketing_polis_broker.php
 */
