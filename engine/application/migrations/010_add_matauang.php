<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_matauang
 *
 * @author marwansaleh
 */
class Migration_add_matauang extends MY_Migration {
    protected $_table_name = 'ref_matauang';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 3
        ),
        'nama'    => array(
            'type' => 'VARCHAR',
            'constraint' => '50',
            'null' => FALSE
        ),
        'is_active'   => array(
            'type'  => 'TINYINT',
            'constraint' => 1,
            'default' => 1
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
                'id'            => 'IDR',
                'nama'          => 'Rupiah',
                'is_active'     => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 'USD',
                'nama'          => 'US Dollar',
                'is_active'     => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 'HKD',
                'nama'          => 'Hongkong Dollar',
                'is_active'     => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            )
        ));
    }
}

/*
 * filename : 010_add_matauang.php
 * location : /application/migrations/010_add_matauang.php
 */
