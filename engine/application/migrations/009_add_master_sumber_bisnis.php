<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_submer_bisnis
 *
 * @author marwansaleh
 */
class Migration_add_master_sumber_bisnis extends MY_Migration {
    protected $_table_name = 'ref_sumber_bisnis';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'kode'    => array(
            'type' => 'VARCHAR',
            'constraint' => 7,
            'null' => FALSE
        ),
        'nama'    => array(
            'type' => 'VARCHAR',
            'constraint' => '50',
            'null' => FALSE
        ),
        'is_captive'    => array(
            'type' => 'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'wilayah_id'    => array(
            'type' => 'INT',
            'constraint' => 11,
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
                'kode'          => 'A000001',
                'nama'          => 'Cabang Bandung',
                //'sort'          => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kode'          => 'A000002',
                'nama'          => 'Cabang Semarang',
                //'sort'          => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kode'          => 'A000003',
                'nama'          => 'Cabang Malang',
                //'sort'          => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            )
        ));
    }
}

/*
 * filename : 009_add_master_sumber_bisnis.php
 * location : /application/migrations/009_add_master_sumber_bisnis.php
 */
