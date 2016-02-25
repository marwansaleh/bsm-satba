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
                'nama'          => 'PT. BRIngin Sejahtera Makmur',
                'sort'          => 0,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Gelora Karya Jasatama',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Caraka Mulia',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Krida Upaya Tunggal',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Bina Sentra Purna',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Mitra Iswara & Rorimpandey',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Sedgwick Dharmala',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Insurance Broking Service',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Sino Broker',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Tugu Broker',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Jardine Broker Insurance',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. AON Lippo',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'Fred M. Sabini',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Cipta Uni Jasa',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'Manunggal Megah',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Marsh Indonesia',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Indosurance',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Vitasia Indojaya',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'Kali Besar Raya Utama',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Antara Aliansi Jasatama',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'Oscar Consultana Jaya',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Manunggal Bhakti Suci',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Antara Intermediary Brokers',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Anserv Prima Pacific',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. VIG Indonesia Brokers',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Talisman Insurance Brokers',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'Fresnel Insurance Brokers',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. RIB',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PT. Multi Asih Pratama',
                'sort'          => 1,
                'created'       => time(),
                'created_by'    => 1,
                'modified'      => time(),
                'modified_by'   => 1
            ),
            array(
                'nama'          => 'PAIN Brokers',
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
