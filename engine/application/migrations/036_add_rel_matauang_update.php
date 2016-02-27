<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_matauang_update
 *
 * @author marwansaleh
 */
class Migration_add_rel_matauang_update extends MY_Migration {
    protected $_table_name = 'rel_matauang_update';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'lastupdate'    => array (
            'type'  => 'DATE',
            'constraint' => 11,
            'default' => 0
        )
    );
    
    public function up(){
        parent::up();
        //Need seeding ?
        $this->_seed(array(
            array(
                'last_update'   => date('Y-m-d')
            )
        ));
    }
}

/*
 * filename : 036_add_rel_matauang_update.php
 * location : /application/migrations/036_add_rel_matauang_update.php
 */
