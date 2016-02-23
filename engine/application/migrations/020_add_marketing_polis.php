<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_marketing_polis
 *
 * @author marwansaleh
 */
class Migration_add_marketing_polis extends MY_Migration {
    protected $_table_name = 'rel_marketing_polis';
    protected $_primary_key = 'id';
    protected $_index_keys = array('nomor_polis');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'bulan_laporan' => array(
            'type' => 'INT',
            'constraint' => 2,
            'null' => FALSE
        ),
        'tahun_laporan' => array(
            'type' => 'INT',
            'constraint' => 4,
            'null' => FALSE
        ),
        'sumber_bisnis' => array (
            'type'  => 'INT',
            'constraint' => 11,
            'default' => 1
        ),
        'nomor_polis'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 15,
            'null' => FALSE
        ),
        'nomor_polis_lama'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'default' => 0,
            'null' => TRUE
        ),
        'tertanggung'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'okupasi'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 30,
            'null' => FALSE
        ),
        'jenis_asuransi'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'periode_mulai'    => array (
            'type'  => 'DATE',
            'null' => FALSE
        ),
        'periode_akhir'    => array (
            'type'  => 'DATE',
            'null' => FALSE
        ),
        'mata_uang'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'biaya_lain' => array (
            'type'  => 'NUMERIC',
            'constraint' => '10,2',
            'default' => 0.00
        ),
        'biaya_lain_idr' => array (
            'type'  => 'NUMERIC',
            'constraint' => '10,2',
            'default' => 0.00
        ),
        'total_premi_idr' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
            'default' => 0.00
        ),
        'total_pertanggungan_idr' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
            'default' => 0.00
        ),
        'persetujuan' => array(
            'type' => 'ENUM("pusat","cabang")',
            'default' => 'pusat'
        ),
        'sales' => array(
            'type' => 'INT',
            'constraint' => 11,
            'null' => FALSE
        ),
        'komisi_kembali' => array (
            'type'  => 'NUMERIC',
            'constraint' => '15,2',
            'default' => 0.00
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
    
}

/*
 * filename : 020_add_marketing_polis.php
 * location : /application/migrations/020_add_marketing_polis.php
 */
