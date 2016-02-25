<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_marketing_quotation
 *
 * @author marwansaleh
 */
class Migration_add_rel_marketing_debitnote extends MY_Migration {
    protected $_table_name = 'rel_marketing_debitnote';
    protected $_primary_key = 'id';
    //protected $_index_keys = array();
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
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
 * filename : 026_add_rel_marketing_debitnote.php
 * location : /application/migrations/026_add_rel_marketing_debitnote.php
 */
