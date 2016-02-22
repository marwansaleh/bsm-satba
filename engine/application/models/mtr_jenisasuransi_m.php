<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_module_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_module_m extends MY_Model {
    protected $_table_name = 'ref_module';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'title';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'name', 
                'label' => 'Nama module', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'title', 
                'label' => 'Nama lengkap module', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'name', 
                'label' => 'Nama module', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'title', 
                'label' => 'Nama lengkap module', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function save($data, $id = NULL) {
        //check if username exists
        if (isset($data['name'])){
            if ($id){
                if ($this->get_count(array('name'=>$data['name'], 'id!='=>$id))){
                    $this->_last_message = 'Nama module "'.$data['name'].'" sudah ada di database';
                    return FALSE;
                }
            }else{
                if ($this->get_count(array('name'=>$data['name']))){
                    $this->_last_message = 'Nama module "'.$data['name'].'" sudah ada di database';
                    return FALSE;
                }
            }
        }
        return parent::save($data, $id);
    }
}

/*
 * file location: /application/models/mtr_module_m.php
 */
