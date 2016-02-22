<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Sys_config_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Sys_config_m extends MY_Model {
    protected $_table_name = 'ref_sys_configuration';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'var_name';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'var_name', 
                'label' => 'Nama variable', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'var_name', 
                'label' => 'Nama variable', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function save($data, $id = NULL) {
        //check if username exists
        if (isset($data['var_name'])){
            if ($id){
                if ($this->get_count(array('var_name'=>$data['var_name'], 'id!='=>$id))){
                    $this->_last_message = 'Nama variabel "'.$data['var_name'].'" sudah ada di database';
                    return FALSE;
                }
            }else{
                if ($this->get_count(array('var_name'=>$data['var_name']))){
                    $this->_last_message = 'Nama variabel "'.$data['var_name'].'" sudah ada di database';
                    return FALSE;
                }
            }
        }
        return parent::save($data, $id);
    }
}

/*
 * file location: /application/models/sys_config_m.php
 */
