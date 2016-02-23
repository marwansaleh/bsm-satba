<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_marketing_polis_attachment
 *
 * @author marwansaleh
 */
class Migration_add_manual_user extends MY_Migration {
    protected $_table_name = 'ref_manual_user';
    protected $_primary_key = 'id';
    protected $_index_keys = array('caption','title');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'parent'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'default' => 0
        ),
        'caption'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'null' => FALSE
        ),
        'title'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 254,
            'null' => TRUE
        ),
        'content'    => array (
            'type'  => 'TEXT',
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
                'id'            => 1,
                'parent'        => 0,
                'caption'       => 'INTRODUCTION',
                'title'         => 'Introduction',
                'content'       => '<p>Aplikasi ini adalah core system PT. BSM untuk membantu aktifitas produksi dan penyusunan neraca keuangan</p>',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 2,
                'parent'        => 0,
                'caption'       => 'MODUL MARKETING',
                'title'         => 'Modul Marketing',
                'content'       => '<p>Modul marketing berisikan sub modul antara lain</p>',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'id'            => 3,
                'parent'        => 0,
                'caption'       => 'MODUL KEUANGAN',
                'title'         => 'Modul Keuangan',
                'content'       => '<p>Modul keuangan berisikan sub modul antara lain</p>',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
        ));
    }
}

/*
 * filename : 027_add_manual_user.php
 * location : /application/migrations/027_add_manual_user.php
 */
