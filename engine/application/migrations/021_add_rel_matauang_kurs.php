<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_matauang_kurs
 *
 * @author marwansaleh
 */
class Migration_add_rel_matauang_kurs extends MY_Migration {
    protected $_table_name = 'rel_kurs_matauang';
    protected $_primary_key = 'id';
    protected $_index_keys = array('matauang_id');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'bulan'    => array(
            'type' => 'INT',
            'constraint' => 2,
            'null' => FALSE
        ),
        'tahun'    => array(
            'type' => 'INT',
            'constraint' => 4,
            'null' => FALSE
        ),
        'matauang_id'   => array(
            'type'  => 'VARCHAR',
            'constraint' => 3,
            'null' => FALSE
        ),
        'kurs'   => array(
            'type'  => 'NUMERIC',
            'constraint' => '8,2',
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
    
    public function up(){
        parent::up();
        //Need seeding ?
        $this->_seed(array(
            array(
                'bulan'         => date('m'),
                'tahun'         => date('Y'),
                'matauang_id'   => 'USD',
                'kurs'          => 13500,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'bulan'         => date('m'),
                'tahun'         => date('Y'),
                'matauang_id'   => 'AUD',
                'kurs'          => 9633.42,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'bulan'         => date('m'),
                'tahun'         => date('Y'),
                'matauang_id'   => 'CNY',
                'kurs'          => 2126.71,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'bulan'         => date('m'),
                'tahun'         => date('Y'),
                'matauang_id'   => 'EUR',
                'kurs'          => 15021.21,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'bulan'         => date('m'),
                'tahun'         => date('Y'),
                'matauang_id'   => 'GBP',
                'kurs'          => 19364.99,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'bulan'         => date('m'),
                'tahun'         => date('Y'),
                'matauang_id'   => 'HKD',
                'kurs'          => 1750.73,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'bulan'         => date('m'),
                'tahun'         => date('Y'),
                'matauang_id'   => 'JPY',
                'kurs'          => 121.19,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'bulan'         => date('m'),
                'tahun'         => date('Y'),
                'matauang_id'   => 'SGD',
                'kurs'          => 9605.97,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
        ));
    }
}

/*
 * filename : 021_add_rel_matauang_kurs.php
 * location : /application/migrations/021_add_rel_matauang_kurs.php
 */
