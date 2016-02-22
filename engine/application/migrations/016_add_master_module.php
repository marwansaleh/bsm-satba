<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_module
 *
 * @author marwansaleh
 */
class Migration_add_master_module extends MY_Migration {
    protected $_table_name = 'ref_module';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'name'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'default' => 0
        ),
        'title'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 100,
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
                'id'            => CT_MODULE_DASHBOARD,
                'name'          => 'dashboard',
                'title'         => 'Dashboard',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => CT_MODULE_MARKETING,
                'name'          => 'marketing',
                'title'         => 'Marketing & Bisnis',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => CT_MODULE_KEUANGAN,
                'name'          => 'keuangan',
                'title'         => 'Keuangan & Akuntansi',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => CT_MODULE_MASTER,
                'name'          => 'master',
                'title'         => 'Master Data',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => CT_MODULE_SYSTEM,
                'name'          => 'system',
                'title'         => 'System Configuration',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => CT_MODULE_USERMGT,
                'name'          => 'usermgt',
                'title'         => 'User Management',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => CT_MODULE_MANUAL,
                'name'          => 'manual',
                'title'         => 'Application mannual',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => CT_MODULE_REPORTING,
                'name'          => 'report',
                'title'         => 'Marketting & Financial Reports',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
        ));
    }
}

/*
 * filename : 016_add_master_module.php
 * location : /application/migrations/016_add_master_module.php
 */
