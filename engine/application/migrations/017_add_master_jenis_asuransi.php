<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_jenis_asuransi
 *
 * @author marwansaleh
 */
class Migration_add_master_jenis_asuransi extends MY_Migration {
    protected $_table_name = 'ref_asuransi';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'kategori'    => array(
            'type' => 'ENUM("general","eben")',
            'default' => 'general',
            'null' => FALSE
        ),
        'nama'    => array(
            'type' => 'VARCHAR',
            'constraint' => 30,
            'null' => FALSE
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
                'kategori'      => 'general',
                'nama'          => 'Fire',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Fire Special Risk/Consortium',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Marine Cargo',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Marine Hull',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Motor Vehicle',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'CIT/CIS/CICB',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'eben',
                'nama'          => 'Personal Accident',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Engineering',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Public Liability',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Fidelity Guarantee',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Burglary Insurance',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Property All Risk',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Loss of Gross Rentall',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Business Interuption',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Earthquake',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Crops Insurance',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Comprehensive General Liability',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Aviation',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Billboard Insurance',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Terrorism & Sabotage',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Hole in One',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'eben',
                'nama'          => 'Health Insurance',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Bonding',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Credit Insurance',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'kategori'      => 'general',
                'nama'          => 'Oil & Gas Insurance',
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            )
        ));
    }
}

/*
 * filename : 017_add_master_jenis_asuransi.php
 * location : /application/migrations/017_add_master_jenis_asuransi.php
 */
