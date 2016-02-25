<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_module
 *
 * @author marwansaleh
 */
class Migration_add_master_broker extends MY_Migration {
    protected $_table_name = 'ref_broker_asuransi';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'nama'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'default' => 0
        ),
        'sort'    => array (
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
                'id'            => 1,
                'nama'          => 'PT. BRIngin Sejahtera Makmur',
                'sort'          => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 2,
                'nama'          => 'PT. Tugu Broker',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            )
        ));
    }
}

/*
 * filename : 011_add_master_broker.php
 * location : /application/migrations/011_add_master_broker.php
 */
