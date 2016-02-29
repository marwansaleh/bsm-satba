<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_marketing_polis_penanggung
 *
 * @author marwansaleh
 */
class Migration_add_rel_marketing_polis_penanggung extends MY_Migration {
    protected $_table_name = 'rel_marketing_polis_penanggung';
    protected $_primary_key = 'id';
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
        'asuradur'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'leader'    => array (
            'type'  => 'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'persentase_share'    => array (
            'type'  => 'NUMERIC',
            'constraint' => '6,3',
            'default' => 0.000
        ),
        'persentase_komisi' => array (
            'type'  => 'NUMERIC',
            'constraint' => '6,3',
            'default' => 0.00
        ),
        'komisi_idr' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
            'default' => 0.00
        )
    );
    
}

/*
 * filename : 031_add_rel_marketing_polis_penanggung.php
 * location : /application/migrations/031_add_rel_marketing_polis_penanggung.php
 */
