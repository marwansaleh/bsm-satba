<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_groups
 *
 * @author marwansaleh
 */
class Migration_add_roles extends MY_Migration {
    protected $_table_name = 'ref_auth_roles';
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
            'constraint' => 30
        ),
        'description' => array(
            'type' => 'VARCHAR',
            'constraint' => 254
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
                'name'          => 'USER_CREATE',
                'description'   => 'Menambah akun user baru',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'name'          => 'USER_UPDATE',
                'description'   => 'Merubah akun user',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'name'          => 'USER_DELETE',
                'description'   => 'Menghapus akun user',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'name'          => 'GROUP_CREATE',
                'description'   => 'Menambah grup user baru',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'name'          => 'GROUP_UPDATE',
                'description'   => 'Merubah data grup user',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'name'          => 'GROUP_DELETE',
                'description'   => 'Menghapus data grup user',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
        ));
    }
}

/*
 * filename : 004_add_roles.php
 * location : /application/migrations/004_add_roles.php
 */
