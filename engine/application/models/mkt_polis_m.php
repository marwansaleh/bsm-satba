<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_module_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mkt_polis_m extends MY_Model {
    protected $_table_name = 'rel_marketing_polis';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'tahun desc, bulan desc';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'nomor_polis', 
                'label' => 'Nomor polis', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'nomor_polis', 
                'label' => 'Nomor polis', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function save($data, $id = NULL) {
        //check if username exists
        if (isset($data['nomor_polis'])){
            if ($id){
                if ($this->get_count(array('nomor_polis'=>$data['nomor_polis'], 'id!='=>$id))){
                    $this->_last_message = 'Nomor polis "'.$data['nomor_polis'].'" sudah ada di database';
                    return FALSE;
                }
            }else{
                if ($this->get_count(array('nomor_polis'=>$data['nomor_polis']))){
                    $this->_last_message = 'Nomor polis "'.$data['nomor_polis'].'" sudah ada di database';
                    return FALSE;
                }
            }
        }
        return parent::save($data, $id);
    }
}

/*
 * file location: /application/models/mkt_polis_m.php
 */
