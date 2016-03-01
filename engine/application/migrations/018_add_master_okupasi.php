<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_okupasi
 *
 * @author marwansaleh
 */
class Migration_add_master_okupasi extends MY_Migration {
    protected $_table_name = 'ref_okupasi';
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
        'deskripsi'   => array(
            'type'  => 'TEXT',
            'null' => FALSE
        ),
        'tarif' => array(
            'type'  => 'NUMERIC',
            'constraint' => '6,3',
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

//    public function up(){
//        parent::up();
//        //Need seeding ?
//        $this->_seed(array(
//            array(
//                'kode'          => '',
//                'deskripsi'     => '',
//                'created'       => time(),
//                'created_by'    => 1,
//                'modified'      => time(),
//                'modified_by'   => 1
//            )
//        ));
//    }
}

/*
 * filename : 018_add_master_okupasi.php
 * location : /application/migrations/018_add_master_okupasi.php
 */
