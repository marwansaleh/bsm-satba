<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_asuradur
 *
 * @author marwansaleh
 */
class Migration_add_master_asuradur extends MY_Migration {
    protected $_table_name = 'ref_asuradur';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 7,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'nama'    => array(
            'type' => 'VARCHAR',
            'constraint' => '50',
            'null' => FALSE
        ),
        'alamat'    => array(
            'type' => 'VARCHAR',
            'constraint' => 254,
            'null' => TRUE
        ),
        'kota'    => array(
            'type' => 'VARCHAR',
            'constraint' => 4,
            'null' => FALSE
        ),
        'telepon'    => array(
            'type' => 'VARCHAR',
            'constraint' => 12,
            'null' => TRUE
        ),
        'fax'    => array(
            'type' => 'VARCHAR',
            'constraint' => 12,
            'null' => TRUE
        ),
        'contact_person'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'null' => TRUE
        ),
        'email'    => array(
            'type' => 'VARCHAR',
            'constraint' => 30,
            'null' => TRUE
        ),
        'is_active'   => array(
            'type'  => 'TINYINT',
            'constraint' => 1,
            'default' => 1
        ),
        'sort' => array(
            'type' => 'INT',
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
                'nama'          => 'PT. BRINS General Insurance',
                'sort'          => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'Berdikari Insurance Company',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'Ramayana',
                'sort'          => 2,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'Wahana Tata',
                'sort'          => 3,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'Parolamas',
                'sort'          => 4,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            )
       ));
    }
}

/*
 * filename : 010_add_master_asuradur.php
 * location : /application/migrations/010_add_master_asuradur.php
 */
