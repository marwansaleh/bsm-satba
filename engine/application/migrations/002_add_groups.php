<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_groups
 *
 * @author marwansaleh
 */
class Migration_add_groups extends MY_Migration {
    protected $_table_name = 'ref_auth_groups';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'name'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'removable' => array(
            'type'  => 'TINYINT',
            'constraint' => 1,
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
                'id'            => CT_USERTYPE_ROOT,
                'name'          => 'Superadmin',
                'removable'     => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 2,
                'name'          => 'Marketing',
                'removable'     => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 3,
                'name'          => 'Keuangan',
                'removable'     => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 4,
                'name'          => 'SDM',
                'removable'     => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            )
        ));
    }
    
}

/*
 * filename : 002_add_groups.php
 * location : /application/migrations/002_add_groups.php
 */
