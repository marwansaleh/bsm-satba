<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_sales
 *
 * @author marwansaleh
 */
class Migration_add_master_sales extends MY_Migration {
    protected $_table_name = 'ref_sales_marketing';
    protected $_primary_key = 'id';
    protected $_index_keys = array('nama');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'nama'   => array(
            'type'  => 'VARCHAR',
            'constraint' => 50,
            'null' => FALSE
        ),
        'marketing_group_id'   => array(
            'type'  => 'INT',
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
                'nama'                  => 'Benny Gumanda',
                'marketing_group_id'    => 0,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'NA. Kholig',
                'marketing_group_id'    => 1,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Rachmad Koharudin',
                'marketing_group_id'    => 1,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Arie Andryamsyah',
                'marketing_group_id'    => 1,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Robby Cahyadi',
                'marketing_group_id'    => 1,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Dina',
                'marketing_group_id'    => 1,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Gusti Nurlam Witono S',
                'marketing_group_id'    => 2,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Yadi Suryadi',
                'marketing_group_id'    => 2,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Habsari Panaringrum',
                'marketing_group_id'    => 2,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Deallia Y.',
                'marketing_group_id'    => 2,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Daniar P.',
                'marketing_group_id'    => 2,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Lucky Mardiah',
                'marketing_group_id'    => 3,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Sartiningsih',
                'marketing_group_id'    => 3,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Hasanuddin',
                'marketing_group_id'    => 3,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Dimas Aditia',
                'marketing_group_id'    => 3,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Yayuk',
                'marketing_group_id'    => 3,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Gayatri P. Wardani',
                'marketing_group_id'    => 4,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Fera Indah Susanti',
                'marketing_group_id'    => 4,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Siti Rahma',
                'marketing_group_id'    => 4,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Agung Dwi Lukito',
                'marketing_group_id'    => 4,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Sri Riasuciati',
                'marketing_group_id'    => 4,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            ),
            array(
                'nama'                  => 'Tatang',
                'marketing_group_id'    => 4,
                'created'               => time(),
                'created_by'            => 1,
                'modified'              => time(),
                'modified_by'           => 1
            )
       ));
    }
}

/*
 * filename : 014_add_master_sales.php
 * location : /application/migrations/014_add_master_sales.php
 */
