<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_users
 *
 * @author marwansaleh
 */
class Migration_add_users extends MY_Migration {
    protected $_table_name = 'ref_auth_users';
    protected $_primary_key = 'id';
    protected $_index_keys = array('username','group_id');
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
        'group_id' => array(
            'type'  => 'INT',
            'constraint' => 11
        ),
        'username' => array(
            'type'  => 'VARCHAR',
            'constraint' => 30,
            'null' => FALSE
        ),
        'password' => array(
            'type'  => 'VARCHAR',
            'constraint' => 48,
            'null' => FALSE
        ),
        'last_login' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE
        ),
        'last_ip' => array(
            'type'  => 'VARCHAR',
            'constraint' => 15,
            'null' => TRUE
        ),
        'last_url' => array(
            'type' => 'VARCHAR',
            'constraint' => 254,
            'null' => TRUE
        ),
        'session_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 40,
            'null' => TRUE
        ),
        'avatar' => array(
            'type' => 'VARCHAR',
            'constraint' => 254,
            'null' => TRUE
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
                'name'          => 'Superadmin',
                'group_id'      => CT_USERTYPE_ROOT,
                'username'      => 'root',
                'password'      => '6faac5916d1cd931ada00f508e126e13', //check userlib to make hash
                'last_login'    => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            )
        ));
    }
    
}

/*
 * filename : 003_add_users.php
 * location : /application/migrations/003_add_users.php
 */
