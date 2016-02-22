<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Auth_user_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Auth_user_m extends MY_Model {
    protected $_table_name = 'ref_auth_users';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'username', 
                'label' => 'Username', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'name', 
                'label' => 'Nama', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'group_id', 
                'label' => 'Group access', 
                'rules' => 'trim|greater_than[0]|required'
            ),
            array(
                'field' => 'password', 
                'label' => 'Password', 
                'rules' => 'trim|min_length[2]|required'
            ),
        ),
        'edit' => array(
            array(
                'field' => 'name', 
                'label' => 'Nama', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'username', 
                'label' => 'Username', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'group_id', 
                'label' => 'Group access', 
                'rules' => 'trim|greater_than[0]|required'
            )
        ),
        'login' => array(
            array(
                'field' => 'username', 
                'label' => 'Username', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'password', 
                'label' => 'Password', 
                'rules' => 'trim|required'
            ),
        ),
        'update_profile' => array(
            array(
                'field' => 'name', 
                'label' => 'Nama', 
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'username', 
                'label' => 'Username', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function save($data, $id = NULL) {
        //check if username exists
        if (isset($data['username'])){
            if ($id){
                if ($this->get_count(array('username'=>$data['username'], 'id!='=>$id))){
                    $this->_last_message = 'Username "'.$data['username'].'" sudah ada di database';
                    return FALSE;
                }
            }else{
                if ($this->get_count(array('username'=>$data['username']))){
                    $this->_last_message = 'Username "'.$data['username'].'" sudah ada di database';
                    return FALSE;
                }
            }
        }
        return parent::save($data, $id);
    }
}

/*
 * file location: /application/models/auth_user_m.php
 */
