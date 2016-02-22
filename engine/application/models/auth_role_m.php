<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Auth_role_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Auth_role_m extends MY_Model {
    protected $_table_name = 'ref_auth_roles';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'name', 
                'label' => 'Nama role', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'name', 
                'label' => 'Nama role', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function save($data, $id = NULL) {
        //check if username exists
        if (isset($data['name'])){
            if ($id){
                if ($this->get_count(array('name'=>$data['name'], 'id!='=>$id))){
                    $this->_last_message = 'Nama role "'.$data['name'].'" sudah ada di database';
                    return FALSE;
                }
            }else{
                if ($this->get_count(array('name'=>$data['name']))){
                    $this->_last_message = 'Nama role "'.$data['name'].'" sudah ada di database';
                    return FALSE;
                }
            }
        }
        return parent::save($data, $id);
    }
}

/*
 * file location: /application/models/auth_role_m.php
 */
