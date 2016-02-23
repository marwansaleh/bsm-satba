<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_marketing_polis_penanggung
 *
 * @author marwansaleh
 */
class Migration_add_marketing_polis_penanggung extends MY_Migration {
    protected $_table_name = 'rel_marketing_polis_penanggung';
    protected $_primary_key = 'id';
    protected $_index_keys = array('nomor_polis');
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
        'asuradur'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'persentase'    => array (
            'type'  => 'NUMERIC',
            'constraint' => '6,3',
            'default' => 0.000
        ),
        'premi' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
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
 * filename : 022_marketing_polis_penanggung.php
 * location : /application/migrations/022_marketing_polis_penanggung.php
 */
