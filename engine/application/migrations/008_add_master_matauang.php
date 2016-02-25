<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_matauang
 *
 * @author marwansaleh
 */
class Migration_add_master_matauang extends MY_Migration {
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
        'sort'   => array(
            'type'  => 'INT',
            'constraint' => 3,
            'default' => 0
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
                'sort'          => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 'USD',
                'nama'          => 'US Dollar',
                'is_active'     => 1,
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 'HKD',
                'nama'          => 'Hongkong Dollar',
                'is_active'     => 1,
                'sort'          => 2,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 'SGD',
                'nama'          => 'SIngapore Dollar',
                'is_active'     => 1,
                'sort'          => 3,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 'YEN',
                'nama'          => 'Yen Japan',
                'is_active'     => 1,
                'sort'          => 4,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 'EUR',
                'nama'          => 'Euro',
                'is_active'     => 1,
                'sort'          => 5,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            )
        ));
    }
}

/*
 * filename : 008_add_master_matauang.php
 * location : /application/migrations/008_add_master_matauang.php
 */
